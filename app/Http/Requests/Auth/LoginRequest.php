<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'userID' => ['required', 'string'],  // Replacing 'email' with 'userID'
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Attempt to authenticate using userID, which could be sNumber or tID
        if (! Auth::attempt($this->credentials(), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'userID' => trans('auth.failed'),  // Adjust error to refer to 'userID'
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Get the credentials for the authentication attempt.
     *
     * This dynamically determines whether to authenticate as a student or teacher.
     */
    public function credentials(): array
    {
        $login = $this->input('userID');

        // Check if the user is a student (sNumber) or teacher (tID)
        if (str_starts_with($login, 'S')) {
            return ['sNumber' => $login, 'password' => $this->input('password')];
        }

        return ['tID' => $login, 'password' => $this->input('password')];
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'userID' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        // Use userID for throttling instead of email
        return Str::transliterate(Str::lower($this->input('userID')).'|'.$this->ip());
    }
}

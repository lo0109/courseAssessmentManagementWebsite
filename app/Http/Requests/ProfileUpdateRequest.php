<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'userID' => ['required', 'string', 'max:255', 'unique:'.($this->user()->isStudent() ? 'students' : 'teachers')], // Assuming a method to check student or teacher
            'password' => ['nullable', 'confirmed', 'min:8'], // Add password confirmation rule
        ];
    }
}

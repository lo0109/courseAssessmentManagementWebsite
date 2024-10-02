<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\Student;
use App\Models\Teacher;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the login input
        $credentials = $request->validate([
            'userID' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Determine whether userID is for student (starts with "S") or teacher (starts with "T")
        $userType = substr($credentials['userID'], 0, 1);

        if ($userType === 'S') {
            // Authenticate against students table
            $student = Student::where('sNumber', $credentials['userID'])->first();

            if ($student && \Hash::check($credentials['password'], $student->password)) {
                Auth::login($student);
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        } elseif ($userType === 'T') {
            // Authenticate against teachers table
            $teacher = Teacher::where('tID', $credentials['userID'])->first();

            if ($teacher && \Hash::check($credentials['password'], $teacher->password)) {
                Auth::login($teacher);
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }

        // If authentication fails, throw an error
        throw ValidationException::withMessages([
            'userID' => __('auth.failed'),
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
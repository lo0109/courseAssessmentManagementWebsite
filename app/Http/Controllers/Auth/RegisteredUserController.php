<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Student;
use App\Models\Teacher;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Determine whether the user is a student or teacher by the prefix of userID
        $isStudent = str_starts_with($request->userID, 'S');
        $isTeacher = str_starts_with($request->userID, 'T');

        // Ensure that userID starts with either 'S' or 'T'
        if (!($isStudent || $isTeacher)) {
            return redirect()->back()->withErrors(['userID' => 'Invalid userID. Must start with S (student) or T (teacher).']);
        }

        // Validation rules (unique validation applied to respective table)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'userID' => [
                'required', 
                'string', 
                'max:255', 
                'unique:' . ($isStudent ? 'students' : 'teachers') . ',sNumber',  // Check uniqueness in the respective table
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Insert into either students or teachers based on the prefix
        if ($isStudent) {
            $user = Student::create([
                'name' => $request->name,
                'sNumber' => $request->userID, // Use sNumber for students
                'password' => Hash::make($request->password),
            ]);
        } else if ($isTeacher) {
            $user = Teacher::create([
                'name' => $request->name,
                'tID' => $request->userID, // Use tID for teachers
                'password' => Hash::make($request->password),
            ]);
        }
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}

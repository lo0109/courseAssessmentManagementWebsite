<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        // Validate the input to use userID instead of email
        $request->validate([
            'userID' => 'required|string',  // Validate using userID
        ]);

        // Send password reset link using userID
        $status = Password::sendResetLink(
            $request->only('userID')  // Use userID for password reset
        );

        if ($status !== Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'userID' => __($status),
            ]);
        }

        return back()->with(['status' => __($status)]);
    }
}
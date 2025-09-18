<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    /**
     * Mailde gelen linkten açılan formu gösterir.
     * /reset-password?token=...&email=...
     */
    public function showResetForm(Request $request)
    {
        // Link bozuksa erkenden yakala
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
        ]);

        return view('auth.reset', [
            'token' => $request->token,
            'email' => $request->email,
        ]);
    }

    /**
     * Yeni şifreyi kaydeder.
     */
    public function update(Request $request)
    {
        $request->validate([
            'token'    => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'confirmed', PasswordRule::min(8)],
        ]);

        // Laravel Password Broker ile sıfırla
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}

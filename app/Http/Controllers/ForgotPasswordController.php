<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon; // istersen altta \Carbon\Carbon da kullanabilirsin
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // 1) Doğru: form view'i göster
    public function ShowLinkEmailForm()
    {
        // NOT: burası mail şablonu değil!
        return view('auth.forgot');  // <-- BUNU değiştiriyoruz
    }

    // 2) Maili gönder
    public function sendResetLinkEmail(Request $request)
    {

    
        
        $email = trim(strtolower($request->email));
        $user  = \App\Models\User::whereRaw('LOWER(email) = ?', [$email])->first();

        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('success', 'Eğer kayıtlıysanız, sıfırlama linki e-postanıza gönderildi.');
}


        $token = Password::createToken($user);

        $resetUrl = route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]);

        $expires = \Carbon\Carbon::now()->addMinutes(60);

        Mail::send('email.reset', [ // bu mail ŞABLONU, sayfa değil
            'resetUrl' => $resetUrl,
            'expires'  => $expires,
        ], function (Message $message) use ($request) {
            $message->to($request->email)->subject('Mail Şifre Sıfırlama');
        });

        return back()->withSuccess('Şifre sıfırlama maili gönderildi.');
    }

    
}

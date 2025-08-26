<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request){ 
                \Log::info(message: $request);


        if ($request->isMethod('get')) {
        return view('auth.landing');
    }
                \Log::info(message: $request);

    // POST ise giriş yapmayı dene
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
                \Log::info(message: $request);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
                \Log::info(message: 'Login form POST edildi 5959');

        $request->session()->regenerate();
                    return redirect('/customers');

    }

    return back()->with('login', 'fail')
                 ->withInput($request->only('email'));
         
        /*if($request->method() == 'GET'){
            return view('auth.landing');
        }
      
          else if($request->method() == 'POST'){
            echo 'asdfg';
          $data = $request->only('email', 'password');
          $remember = $request->boolean('remember');
       
        if(Auth::attempt($data, $remember)){
           
            $request->session()->regenerate();
            return redirect(route('customers'))->with('login','success');
        }else{

            
            return redirect()->with('login','fail')->withInput();
        }*/


    }
    
    public function register(Request $request){

         return view('auth.register');
    }

    // POST /register
    public function registerPost(Request $request)
    {
        // 1. Doğrulama
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'], 
            // confirmed -> "password_confirmation" alanı ile eşleşmeli
        ]);

        // 2. Kullanıcı oluştur
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']), // şifreyi hashle
        ]);

        // 3. Yeni kullanıcıyı otomatik giriş yap
        Auth::login($user);

        // 4. Dashboard'a yönlendir
        return redirect()->route('login')->with('status', 'Registration successful! You can now log in.');

}
}

<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;





/*Route::get('/', function () {
    return view('customers_index', compact('customers'));



});*/
Route::get('/customers', action: [CustomerController::class, 'index']);

Route::resource('customers', CustomerController::class);

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');


/*Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create'); // formu göster
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');        // formu kaydet
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');         // liste (geri dönmek için)*/

// routes/web.php
use Illuminate\Support\Facades\Auth;

Route::get('/auth', function () {
    // Kullanıcı zaten giriş yaptıysa direkt dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    // Misafire login & register butonlu açılış sayfası
    return view('auth.landing');
})->name('home');

Route::get('/', function() {
    if (!Auth::check()) {
        return redirect('/auth');
    }

});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::get('register',  [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');






Route::middleware('guest')->group(function () {
    Route::get('/forgot-password',  [ForgotPasswordController::class, 'ShowLinkEmailForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password',   [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password',  [ResetPasswordController::class, 'update'])->name('password.update');
});

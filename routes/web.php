<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;



/*Route::get('/', function () {
    return view('customers_index', compact('customers'));



});*/
Route::get('/customers', action: [CustomerController::class, 'index']);

Route::resource('customers', CustomerController::class);

/*Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create'); // formu göster
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');        // formu kaydet
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');         // liste (geri dönmek için)*/

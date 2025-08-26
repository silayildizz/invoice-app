<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthController;


/*Route::get('/', function () {
    return view('customers_index', compact('customers'));



});*/
//Route::get('/customers', action: [CustomerController::class, 'index']);
Route::resource('customers', CustomerController::class);
Route::resource('invoices', InvoiceController::class);

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

use App\Http\Controllers\Auth\LoginController;


Route::get('/dashboard',function() {
    return view('dashboard');
})->middleware(['auth'])->name ('dashboard');



/*oute::get('/invoices', action: [InvoiceController::class , 'index'])->name('invoices.index');
Route::get('/invoices/{$id}', action: [InvoiceController::class , 'show'])->name('invoices.show');
Route::post('/invoices/create', action: [InvoiceController::class , 'create'])->name('invoices.create');
Route::get('invoices', action: [InvoiceController::class, 'store'])->name('invoices.store');
/*Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create'); // formu göster
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');        // formu kaydet
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');         // liste (geri dönmek için)*/



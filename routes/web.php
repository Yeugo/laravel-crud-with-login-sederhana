<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CustomerController::class, 'getCustomers'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Create
Route::get('/create-customer', [CustomerController::class, 'createCustomer'])->name('create');
Route::post('/insert-customer', [CustomerController::class, 'insertCustomer'])->name('insert');

// Read
Route::get('/', [CustomerController::class, 'getCustomers'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [CustomerController::class, 'getCustomers'])->middleware(['auth'])->name('dashboard');

// Update
Route::patch('/save-customer/{customer_id}', [CustomerController::class, 'updateCustomer'])->name('save');
Route::get('/update-customer/{customer_id}', [CustomerController::class, 'showFormUpdate'])->name('update');

// Delete
Route::delete('/delete-customer/{customer_id}', [CustomerController::class, 'deleteCustomer'])->name('delete');

require __DIR__.'/auth.php';

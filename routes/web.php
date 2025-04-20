<?php

use App\Http\Controllers\DataHandleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customer', [DataHandleController::class, 'index'])->name('customer.index');
    Route::get('/customer/edit/{user}', [DataHandleController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{user}', [DataHandleController::class, 'update'])->name('customer.update');
    Route::post('/customer/store', [DataHandleController::class, 'store'])->name('customer.store');

    Route::get('/customer/delete', [DataHandleController::class, 'delete'])->name('customer.delete');



});

require __DIR__.'/auth.php';

<?php

use App\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;

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


});

Route::get('/shoppingcart', function () {
    return view('shoppingcart');
})->name('shoppingcart');

require __DIR__.'/auth.php';

// routes/web.php
// Route::get('/shoppingcart', \App\Livewire\ShoppingCart::class)
//     ->name('shoppingcart'); // Set the layout here as well

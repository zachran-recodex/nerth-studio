<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Main Routes
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/product/{slug}', [MainController::class, 'product'])->name('product');

Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{id}', [MainController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [MainController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [MainController::class, 'removeFromCart'])->name('remove.from.cart');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('carts', CartController::class)->middleware('role:customer');
    Route::post('/carts/add/{productId}', [CartController::class, 'store'])->middleware('role:customer')->name('carts.store');

    Route::resource('orders', OrderController::class)->middleware('role:admin|customer');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('products', ProductController::class)->middleware('role:admin');

    });
});

require __DIR__.'/auth.php';

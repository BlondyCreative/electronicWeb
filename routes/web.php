<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;

Route::get('/', [AuthController::class, 'showSignupForm'])->name('products.signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('products.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {
Route::get('/products/addtocard', [CartController::class, 'show'])->name('addtocard');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('each.product');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/search/search', [SearchController::class, 'search'])->name('search.search');
Route::get('/search/{id}', [SearchController::class, 'show'])->name('search.show');

});

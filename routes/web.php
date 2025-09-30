<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementsController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/add-user', [UserController::class, 'createUser'])->name('addUser');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'storeUser'])->name('storeUser');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-product', [ProductController::class, 'index'])->name('addProduct');
    Route::post('/add-product', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/list-product', [ProductController::class, 'list'])->name('listProduct');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('dashboard');
    // Route::get('/add-user', [UserController::class, 'createUser'])->name('addUser');
    // Route::get('/register', [UserController::class, 'register'])->name('register');
    // Route::post('/register', [UserController::class, 'storeUser'])->name('storeUser');

    Route::get('/list-customer', [CustomerController::class, 'list'])->name('listCustomer');
    Route::get('/add-customer', [CustomerController::class, 'create'])->name('createCustomer');
    Route::post('/add-customer', [CustomerController::class, 'store'])->name('storeCustomer');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

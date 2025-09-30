<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/login', [UserController::class, 'loginNormal'])->name('loginNormal');
Route::post('/login', [UserController::class, 'loginNormalUser'])->name('loginNormalUser');
Route::get('/add-user', [UserController::class, 'createUser'])->name('addUser');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'storeUser'])->name('storeUser');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/add-product', [ProductController::class, 'index'])->name('addProduct');
    Route::post('/admin/add-product', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/admin/list-product', [ProductController::class, 'list'])->name('productList');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('editProduct');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/admin/list-customer', [CustomerController::class, 'list'])->name('listCustomer');
    Route::get('/admin/add-customer', [CustomerController::class, 'create'])->name('createCustomer');
    Route::post('/admin/add-customer', [CustomerController::class, 'store'])->name('storeCustomer');

    Route::get('/admin/order-list', [OrderController::class, 'list'])->name('orderList');
});

// site url
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['role:user'])->group(function () {

    Route::get('cart/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


    Route::get('orders/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/create', [OrderController::class, 'createOrder'])->name('orders.create');
    Route::get('/checkout', [PaymentController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/checkout', [PaymentController::class, 'checkoutPayment'])->name('checkout.payment');
    Route::post('/razorpay/callback', [PaymentController::class, 'callback'])->name('razorpay.callback');
});

<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth', 'canGate:all-access'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-project', [ProductController::class, 'index'])->name('addProduct');
    Route::post('/add-project', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/list-project', [ProductController::class, 'list'])->name('listProduct');
    Route::get('/stock-in', [StockMovementsController::class, 'stockIn'])->name('stockIn');
    Route::get('/add-stock-in', [StockMovementsController::class, 'addStockIn'])->name('addStockIn');
    Route::post('/add-stock-in', [StockMovementsController::class, 'createStockIn'])->name('createStockIn');

    Route::get('/list-stock-out', [StockMovementsController::class, 'listStockOut'])->name('listStockOut');
    Route::get('/add-stock-out', [StockMovementsController::class, 'addStockOut'])->name('addStockOut');
    Route::post('/add-stock-out', [StockMovementsController::class, 'storeStockOut'])->name('storeStockOut');

    Route::get('/add-supplier', [SupplierController::class, 'index'])->name('addSupplier');
    Route::post('/add-supplier', [SupplierController::class, 'create'])->name('createSupplier');

    Route::get('/stock-movement', [StockMovementController::class, 'index'])->name('stockMovement');
});

Route::middleware(['auth', 'canGate:admin-access'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    // Route::get('/add-user', [UserController::class, 'createUser'])->name('addUser');
    // Route::get('/register', [UserController::class, 'register'])->name('register');
    // Route::post('/register', [UserController::class, 'storeUser'])->name('storeUser');

    Route::get('/list-customer', [CustomerController::class, 'list'])->name('listCustomer');
    Route::get('/add-customer', [CustomerController::class, 'create'])->name('createCustomer');
    Route::post('/add-customer', [CustomerController::class, 'store'])->name('storeCustomer');
});

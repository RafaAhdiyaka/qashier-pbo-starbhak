<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registration', function () {
    return view('auth.registration');
});

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/add-category',[CategoryController::class, 'create'])->name('add-category');
Route::post('/insert-category',[CategoryController::class, 'store'])->name('insert-category');
Route::get('/form-edit-category/{id}',[CategoryController::class, 'edit'])->name('form-edit-category');
Route::put('/update-category/{id}',[CategoryController::class, 'update'])->name('update-category');
Route::get('/delete-category/{id}',[CategoryController::class, 'destroy'])->name('delete-category');

// Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/add-menu',[MenuController::class, 'create'])->name('add-menu');
Route::post('/insert-menu',[MenuController::class, 'store'])->name('insert-menu');
Route::get('/form-edit-menu/{id}',[MenuController::class, 'edit'])->name('form-edit-menu');
Route::put('/update-menu/{id}',[MenuController::class, 'update'])->name('update-menu');
Route::get('/delete-menu/{id}',[MenuController::class, 'destroy'])->name('delete-menu');

// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/add-transaction',[TransactionController::class, 'create'])->name('add-transaction');
Route::post('/insert-transaction',[TransactionController::class, 'store'])->name('insert-transaction');
Route::get('/form-edit-transaction/{id}',[TransactionController::class, 'edit'])->name('form-edit-transaction');
Route::put('/update-transaction/{id}',[TransactionController::class, 'update'])->name('update-transaction');
Route::get('/delete-transaction/{id}',[TransactionController::class, 'destroy'])->name('delete-transaction');
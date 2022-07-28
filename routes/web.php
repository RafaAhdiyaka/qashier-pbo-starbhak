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

Route::get('/activity-log', function () {
    return view('admin.activity-log');
});

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/add',[CategoryController::class, 'create'])->name('add-category');
Route::post('/category/insert',[CategoryController::class, 'store'])->name('insert-category');
Route::get('/category/form-edit/{id}',[CategoryController::class, 'edit'])->name('form-edit-category');
Route::put('/category/update/{id}',[CategoryController::class, 'update'])->name('update-category');
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('delete-category');

// Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/add',[MenuController::class, 'create'])->name('add-menu');
Route::post('/menu/insert',[MenuController::class, 'store'])->name('insert-menu');
Route::get('/menu/form-edit/{id}',[MenuController::class, 'edit'])->name('form-edit-menu');
Route::put('/menu/update/{id}',[MenuController::class, 'update'])->name('update-menu');
Route::get('/menu/delete/{id}',[MenuController::class, 'destroy'])->name('delete-menu');

// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/add',[TransactionController::class, 'create'])->name('add-transaction');
Route::post('/transaction/insert',[TransactionController::class, 'store'])->name('insert-transaction');
Route::get('/transaction/form-edit/{id}',[TransactionController::class, 'edit'])->name('form-edit-transaction');
Route::put('/transaction/update/{id}',[TransactionController::class, 'update'])->name('update-transaction');
Route::get('/transaction/delete/{id}',[TransactionController::class, 'destroy'])->name('delete-transaction');
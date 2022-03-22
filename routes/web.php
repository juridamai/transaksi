<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\Superadmin\DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\Superadmin\DashboardController::class, 'index'])->name('superadmin.dashboard.index');

//RouteKategori
Route::get('/kategori', [App\Http\Controllers\Superadmin\CategoryController::class, 'index'])->name('superadmin.kategori.index');
Route::get('/kategori/add', [App\Http\Controllers\Superadmin\CategoryController::class, 'add'])->name('superadmin.kategori.add');
Route::post('/kategori/store', [App\Http\Controllers\Superadmin\CategoryController::class, 'store'])->name('superadmin.kategori.store');
Route::get('/kategori/edit/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'edit'])->name('superadmin.kategori.edit');
Route::post('/kategori/update', [App\Http\Controllers\Superadmin\CategoryController::class, 'update'])->name('superadmin.kategori.update');
Route::get('/kategori/delete/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'delete'])->name('superadmin.kategori.delete');

//Routecustomer
Route::get('/customer', [App\Http\Controllers\Superadmin\CustomerController::class, 'index'])->name('superadmin.customer.index');
Route::get('/customer/add', [App\Http\Controllers\Superadmin\CustomerController::class, 'add'])->name('superadmin.customer.add');
Route::post('/customer/store', [App\Http\Controllers\Superadmin\CustomerController::class, 'store'])->name('superadmin.customer.store');
Route::get('/customer/edit/{id}', [App\Http\Controllers\Superadmin\CustomerController::class, 'edit'])->name('superadmin.customer.edit');
Route::post('/customer/update', [App\Http\Controllers\Superadmin\CustomerController::class, 'update'])->name('superadmin.customer.update');
Route::get('/customer/delete/{id}', [App\Http\Controllers\Superadmin\CustomerController::class, 'delete'])->name('superadmin.customer.delete');


//RouteProduct
Route::get('/produk', [App\Http\Controllers\Superadmin\ProductController::class, 'index'])->name('superadmin.produk.index');
Route::get('/produk/add', [App\Http\Controllers\Superadmin\ProductController::class, 'add'])->name('superadmin.produk.add');
Route::post('/produk/store', [App\Http\Controllers\Superadmin\ProductController::class, 'store'])->name('superadmin.produk.store');


//RouteTransaction
Route::get('/transaction', [App\Http\Controllers\Superadmin\TransactionController::class, 'index'])->name('superadmin.transaction.index');
Route::get('/transaction/add', [App\Http\Controllers\Superadmin\TransactionController::class, 'add'])->name('superadmin.transaction.add');
Route::get('/transaction/detail/{id}', [App\Http\Controllers\Superadmin\TransactionController::class, 'detail'])->name('superadmin.transaction.detail');
Route::post('/transaction/store', [App\Http\Controllers\Superadmin\TransactionController::class, 'store'])->name('superadmin.transaction.store');
Route::get('/transaction/print/{id}', [App\Http\Controllers\Superadmin\TransactionController::class, 'print'])->name('superadmin.transaction.print');


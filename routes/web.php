<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('home');
});

Route::get('register', function () {
        return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Routes Product
Route::get('/product',[App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
Route::get('/product/create',[App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product',[App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{product}',[App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{product}',[App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}',[App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
// Routes Supplier
Route::get('/supplier',[App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.list');
Route::get('/supplier/create',[App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier',[App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/edit/{supplier}',[App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/update/{supplier}',[App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
Route::get('/supplier/show/{supplier}',[App\Http\Controllers\SupplierController::class, 'show'])->name('supplier.show');
Route::delete('/supplier/{supplier}',[App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');
// Routes Orders
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders',[App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
// Route::get('/order',[App\Http\Controllers\OrderController::class, 'createo'])->name('order');

//Route Reception
Route::get('/reception', [OrderController::class, 'reception'])->name('order.reception');

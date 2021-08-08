<?php

use App\Http\Controllers\ProductController;
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

Route::get('/list',[App\Http\Controllers\ProductController::class, 'index'])->name('list');

Route::get('/order',[App\Http\Controllers\ProductController::class, 'order'])->name('order');
// Routes Supplier
Route::get('/supplier',[App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.list');
Route::get('/supplier/create',[App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier',[App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/edit/{supplier}',[App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/update/{supplier}',[App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
Route::get('/supplier/show/{supplier}',[App\Http\Controllers\SupplierController::class, 'show'])->name('supplier.show');
Route::delete('/supplier{supplier}',[App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');

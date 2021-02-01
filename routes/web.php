<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/admin', function () {
    return view('admin/admin');
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function(){
    return view('/about');
});

Route::get('/departments', function(){
    return view('/departments');
});

Route::group(['middleware', AdminMiddleware::class], function(){
    Route::resource('/product', ProductsController::class);
    Route::resource('/supplier', SuppliersController::class);
    Route::get('/sups', [SuppliersController::class, 'sendSuppliers']);
});


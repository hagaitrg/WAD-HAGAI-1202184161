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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('product', [ProductsController::class, '']);

Route::get('/insert', function () {
    return view('insert');
});

Route::post('/proses_product', [ProductsController::class, '']);

Route::get('/update/{id}', [ProductsController::class, '']);

Route::patch('/edit/{id}', [ProductsController::class, '']);

Route::delete('/delete/{id}', [ProductsController::class, '']);

Route::get('/proses/{id}', [OrdersController::class, '']);

Route::post('/prosesOrder', [OrdersController::class, '']);

Route::get('/history', [OrdersController::class, '']);

Route::get('/order', [OrdersController::class, '']);

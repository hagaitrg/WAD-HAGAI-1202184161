<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
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

Route::get('product', [ProductsController::class, 'index']);

Route::get('/insert', function () {
    return view('insert');
});

Route::post('/proses_product', [ProductsController::class, 'insert']);

Route::get('/update/{id}', [ProductsController::class, 'edit']);

Route::patch('/edit/{id}', [ProductsController::class, 'update']);

Route::delete('/delete/{id}', [ProductsController::class, 'destroy']);

Route::get('/proses/{id}', [OrdersController::class, 'show']);

Route::post('/prosesOrder', [OrdersController::class, 'create']);

Route::get('/history', [OrdersController::class, 'history']);

Route::get('/order', [OrdersController::class, 'index']);

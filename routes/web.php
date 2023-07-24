<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Clients\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can <regist></regist>er web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ================================================== User ================================================== */

Route::get('/', function () {
    return view('clients.home.index');
});
Route::get('/products', function () {
    return view('clients.products.index');
});
Route::get('/product-detail', function () {
    return view('clients.product-detail.index');
});


/* ================================================== Admin ================================================== */
Route::middleware('checkpermission')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

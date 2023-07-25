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

/* ================================================== Account ================================================== */

Route::get('/login', function () {
    return view('account.login.index');
});
Route::get('/register', function () {
    return view('account.register.index');
});
Route::profile('/profile', function () {
    return view('clients.profile.index');
});

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
Route::get('/cart', function () {
    return view('clients.cart.index');
});
Route::get('/blogs', function () {
    return view('clients.blogs.index');
});
Route::get('/blog-detail', function () {
    return view('clients.blog-detail.index');
});
Route::get('/why', function () {
    return view('clients.why.index');
});
Route::get('/about', function () {
    return view('clients.about.index');
});
Route::get('/cart', function () {
    return view('clients.cart.index');
});
Route::get('/error', function () {
    return view('clients.error.index');
});
Route::get('/check-out', function () {
    return view('clients.check-out.index');
});
Route::get('/check-success', function () {
    return view('clients.check-success.index');
});


/* ================================================== Admin ================================================== */
Route::middleware('checkpermission')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

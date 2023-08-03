<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\clients\UProductDetailController;
use App\Http\Controllers\clients\UProductsController;
use App\Http\Controllers\Clients\UBlogsController;
use App\Http\Controllers\clients\UCartController;
use App\Http\Controllers\Clients\ULoginController;
use App\Http\Controllers\Clients\URegisterController;

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
Route::get('/processLogin', [ULoginController::class, 'processLogin']);


Route::get('/register', function () {
    return view('account.register.index');
});
Route::get('/processRegister', [URegisterController::class, 'processRegister']);


Route::post('/profile', function () {
    return view('clients.profile.index');
});


/* ================================================== User ================================================== */

Route::get('/', function () {
    return view('clients.home.index');
});


Route::get('/products', [UProductsController::class, 'index']);
Route::get('/product-detail/{id}', [UProductsController::class, 'showProductDetail']);
Route::get('/cart/{userId}', [UCartController::class, 'showCartList']);
Route::get('/cart', [UCartController::class, 'index']);


Route::get('/blogs', [UBlogsController::class, 'index']);
Route::get('/blog/{id}', [UBlogsController::class, 'showBlogDetail']);

Route::get('/why', function () { // HomeController
    return view('clients.why.index');
});
Route::get('/about', function () { // HomeController
    return view('clients.about.index');
});
Route::get('/error', function () {
    return view('error.index');
});
Route::get('/checkout', function () {
    return view('clients.check-out.index');
});
Route::get('/checkout-success', function () {
    return view('clients.check-out-success.index');
});
Route::get('/checkout-processing', function () {
    return view('clients.check-processing.index');
});


/* ================================================== Admin ================================================== */
// Route::middleware('checkpermission')
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/', [HomeController::class, 'index']);
//     });

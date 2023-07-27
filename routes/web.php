<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;

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
Route::post('/profile', function () {
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
Route::get('/blog-detail', function () { // HomeController
    return view('clients.blog-detail.index');
});
Route::get('/why', function () { // HomeController
    return view('clients.why.index');
});
Route::get('/about', function () { // HomeController
    return view('clients.about.index');
});
Route::get('/error', function () {
    return view('clients.error.index');
});
Route::get('/checkout', function () {
    return view('clients.checkout.index');
});
Route::get('/checkout-success', function () {
    return view('clients.checkout-success.index');
});
Route::get('/checkout-processing', function () {
    return view('clients.checkout-processing.index');
});


/* ================================================== Admin ================================================== */
// Route::middleware('checkpermission')
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/', [HomeController::class, 'index']);
//     });
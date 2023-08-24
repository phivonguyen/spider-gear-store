<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\clients\UProductDetailController;
use App\Http\Controllers\clients\UProductsController;
use App\Http\Controllers\Clients\UBlogsController;
use App\Http\Controllers\clients\UCartController;
use App\Http\Controllers\clients\UCheckOutController;
use App\Http\Controllers\Clients\UCheckProcessingController;
use App\Http\Controllers\clients\UCheckSuccessController;
use App\Http\Controllers\clients\UHomeController;
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

Route::get('/', [UHomeController::class, 'index']);

// group products
Route::get('/products', [UProductsController::class, 'index']);
Route::get('/products/{categoryName}', [UProductsController::class, 'filterCategory']);
// group product-detail
Route::get('/product-detail/{id}', [UProductDetailController::class, 'showProductDetail']);
Route::post('/postComment', [UProductDetailController::class, 'postComment']);

// group cart
// Route::get('/cart', [UCartController::class, 'index']);
Route::get('/cart/{userId}', [UCartController::class, 'index']);
Route::post('/add/{id}', [UCartController::class, 'addToCart']);
Route::get('/delete/{id}', [UCartController::class, 'deleteItem']);
Route::get('/update', [UCartController::class, 'updateQty']);



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

// Checkout
Route::get('/checkout', [UCheckOutController::class, 'index']);
Route::post('/checkout/add', [UCheckOutController::class, 'addOrder']);
Route::get('/checkout/vnPayCheck', [UCheckOutController::class, 'vnPayCheck']);
Route::get('/checkout/applyVoucher', [UCheckOutController::class, 'applyVoucher']);
Route::get('/checkout/deleteVoucher/{code}', [UCheckOutController::class, 'deleteVoucher']);

Route::get('/checkout-success', [UCheckSuccessController::class, 'index']);

Route::get('/checkoutProcessing',[UCheckProcessingController::class, 'index']);
Route::get('/checkoutProcessing/{orderID}',[UCheckProcessingController::class, 'updateOrderStatus']);

/* ================================================== Admin ================================================== */
// Route::middleware('checkpermission')
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/', [HomeController::class, 'index']);
//     });

Route::get('/admin/order', [OrderController::class, 'index']);
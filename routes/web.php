<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminBlogsController;
use App\Http\Controllers\Admin\AdminBlogCommentController;
use App\Http\Controllers\Admin\AdminBlogCategoriesController;
use App\Http\Controllers\clients\UProductDetailController;
use App\Http\Controllers\clients\UProductsController;
use App\Http\Controllers\Clients\UBlogsController;
use App\Http\Controllers\clients\UCartController;
use App\Http\Controllers\Clients\URegisterController;
use App\Http\Controllers\Services\CommentController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\ProductManagerController;
use App\Http\Controllers\Admin\UserManagerController;
use App\Http\Controllers\Client\ChangePasswordController;
use App\Http\Controllers\Client\ForgotPasswordController;
use App\Http\Controllers\Client\LoginController as UserLogin;
use App\Http\Controllers\Client\OrderProcessController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ResetPasswordController;
use App\Models\Cart;

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

Route::get('/', [HomeController::class, 'index'])->name('user/home');
Route::get('/login', [UserLogin::class, 'index'])->name('user/login/get');
Route::post('/login', [UserLogin::class, 'login'])->name('user/login/post');
Route::get('/register', [RegisterController::class, 'index'])->name('user/register/get');
Route::post('/register', [RegisterController::class, 'register'])->name('user/register/post');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('user/forgot-password/get');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('user/forgot-password/post');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('user/reset-password/get');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('user/reset-password/post');

Route::middleware(['hasUserRole'])->group(function () {
    Route::get('/logout', [UserLogin::class, 'logout'])->name('user/logout');

    Route::get('/profile', [ProfileController::class, 'index'])->name('user/profile/get');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('user/profile/post');

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('user/change-password/get');
    Route::post('/change-password', [ChangePasswordController::class, 'updateProfile'])->name('user/change-password/post');

    Route::get('/cart', [CartController::class, 'index'])->name('user/cart');
    Route::get('/order-process', [OrderProcessController::class, 'index'])->name('user/order-process');
    Route::get('/payment', [PaymentController::class, 'index'])->name('user/payment');
});

/* ================================================== User ================================================== */

Route::get('/', function () {

    return view('clients.home.index');
});


Route::get('/products', [UProductsController::class, 'index']);
Route::get('/product-detail/{id}', [UProductsController::class, 'showProductDetail']);
Route::get('/cart/{userId}', [UCartController::class, 'showCartList']);
Route::get('/cart', [UCartController::class, 'index']);
Route::get('/product-comments/{id}', [CommentController::class, 'createComments'])->name('comments.create');
Route::post('/product-comments/{id}', [CommentController::class, 'storeComments'])->name('comments.store');


Route::post('/blog-comments/{id}', [UBlogsController::class, 'blogComment'])->name('blogComments.store');
Route::controller(UBlogsController::class)->group(function(){
    // Route::get('/', 'showBlogCategories');
    Route::get('/blogs', 'index');
    Route::get('/blog-detail/{id}', 'showBlogDetail')->name('blog-detail');
    Route::get('/blog-comments/{id}','createBlogComments')->name('blogComments.create');
});

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

Route::resource('/blog-list', AdminBlogsController::class);
Route::resource('/comment-list', AdminBlogCommentController::class);
Route::resource('/category-list', AdminBlogCategoriesController::class);



/* ================================================== Admin ================================================== */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLogin::class, 'index'])->name('admin/login/get');
    Route::post('/login', [AdminLogin::class, 'login'])->name('admin/login/post');

    Route::group(['middleware' => 'hasAdminRole'], function () {
        Route::get('/logout', [AdminLogin::class, 'logout'])->name('admin/logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');
        Route::get('/products', [ProductManagerController::class, 'index'])->name('admin/products');

        Route::get('/users', [UserManagerController::class, 'index'])->name('admin/users');
        Route::post('/update-status/{id}/{status}', [UserManagerController::class, 'updateStatus'])->name('admin/update-status');
        Route::post('/delete-user/{id}', [UserManagerController::class, 'remove'])->name('admin/delete');
    });
});

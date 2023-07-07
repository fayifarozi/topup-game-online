<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HeroProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [HomeController::class, 'pagehome']);
Route::get('/about', [HomeController::class, 'pageAbout']);
Route::get('/topup/{path}', [HomeController::class, 'gamePath']);

Route::get('/checkout-search', [CheckoutController::class, 'index']);
Route::post('/checkout-search', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/checkout-detail/{order}', [CheckoutController::class, 'checkoutDetails'])->name('checkDetail');

Route::get('/payments/finish?{payment}', [PaymentController::class, 'finish']);
Route::get('/payments/unfinish?{payment}', [PaymentController::class, 'unfinish']);
Route::get('/payments/failed?{payment}', [PaymentController::class, 'failed']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['is_login'])->group(function () {
    Route::prefix('/master')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('master');
        Route::resource('/admin', AdminController::class);
        Route::resource('/hero-product', HeroProductController::class);
        Route::post('/hero-product/update-status', [HeroProductController::class,'updateStatus'])->name('hero-product.updateStatus');
        Route::resource('/product', ProductController::class);
        Route::resource('/order', OrderController::class);
        Route::get('/order/{order}/detail', [OrderController::class, 'detail']);
        Route::get('/payment', [OrderController::class, 'notifpayment']);
        Route::get('/export', [AdminController::class, 'export']);
    });
});
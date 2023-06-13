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
use App\Http\Middleware\LoginMiddleware;

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


Route::get('/1', [HeroProductController::class, 'pagehome']);
Route::post('/test/create', [HeroProductController::class, 'store']);
Route::get('/test/{path}', [HeroProductController::class, 'gamePath']);

// Route::get('/', [HomeController::class, 'home']);
// Route::get('/hero-product', [HomeController::class, 'product']);
// Route::get('/about', [HomeController::class, 'about']);

Route::get('/', [HeroProductController::class, 'pagehome']);
Route::get('/about', [HeroProductController::class, 'pageAbout']);

Route::get('/mobile-legends', [CheckoutController::class, 'mlbb']);
Route::get('/genshin-impact', [CheckoutController::class, 'genshin']);
Route::get('/pubg-mobile', [CheckoutController::class, 'pubg']);
Route::get('/free-fire', [CheckoutController::class, 'freefire']);
Route::get('/valorant', [CheckoutController::class, 'valorant']);

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

Route::get('/master', [DashboardController::class, 'index'])->middleware([LoginMiddleware::class]);

Route::prefix('/master')->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/order/{order}/detail', [OrderController::class, 'detail']);
    Route::get('/payment', [OrderController::class, 'notifpayment']);
    Route::get('/export', [AdminController::class, 'export']);
})->middleware([LoginMiddleware::class]);
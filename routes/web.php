<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\LoginMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [HomeController::class,'home']);
Route::get('/hero-product', [HomeController::class,'product']);
Route::get('/about', [HomeController::class,'about']);

Route::get('/mobile-legends', [CheckoutController::class,'mlbb']);
Route::get('/genshin-impact', [CheckoutController::class,'genshin']);
Route::get('/pubg-mobile', [CheckoutController::class,'pubg']);
Route::get('/free-fire',[CheckoutController::class,'freefire']);
Route::get('/valorant',[CheckoutController::class,'valorant']);

Route::get('/checkout-search', [CheckoutController::class,'index']);
Route::post('/checkout-search', [CheckoutController::class,'index']);
Route::post('/checkout', [CheckoutController::class,'checkout']);
Route::get('/checkout-detail/{order}', [CheckoutController::class,'checkoutDetails'])->name('checkDetail');

Route::get('/payments/finish?{payment}',[PaymentController::class,'finish']);
Route::get('/payments/unfinish?{payment}',[PaymentController::class,'unfinish']);
Route::get('/payments/failed?{payment}',[PaymentController::class,'failed']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/master',[DashboardController::class,'index'])->middleware([LoginMiddleware::class]);

Route::resource('/master/admin',AdminController::class)->middleware([LoginMiddleware::class]);
Route::resource('/master/product',ProductController::class)->middleware([LoginMiddleware::class]);
Route::resource('/master/order',OrderController::class)->middleware([LoginMiddleware::class]);
Route::get('/master/order/{order}/detail', [OrderController::class,'detail'])->middleware([LoginMiddleware::class]);
Route::get('/master/payment',[OrderController::class,'notifpayment'])->middleware([LoginMiddleware::class]);
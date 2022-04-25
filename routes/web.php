<?php

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




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::resource('/cart', \App\Http\Controllers\CartController::class);

Route::get('/order/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

Route::group(['middleware' => ['auth', 'isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
   
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::post('categories/images', [\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('sessions')->group(function () {
//     Route::get('products', [\App\Http\Controllers\HomeController::class, 'getProducts']);
//     Route::post('carts', [\App\Http\Controllers\CartController::class, 'store']);
//     Route::get('carts', [\App\Http\Controllers\CartController::class, 'show']);
// });
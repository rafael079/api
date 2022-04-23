<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
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


Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
Route::get('stores/{id}', [StoreController::class, 'show'])->name('stores.show');

Route::post('stores', [StoreController::class, 'store'])->name('stores.store');
Route::put('stores/{id}', [StoreController::class, 'update'])->name('stores.update');
Route::delete('stores/{id}', [StoreController::class, 'delete'])->name('stores.delete');

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('products', [ProductController::class, 'store'])->name('products.post');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'delete'])->name('products.delete');
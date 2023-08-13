<?php
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\CategoryController;
use Modules\Product\Http\Controllers\BrandController;
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

Route::middleware(['auth:admin'])->prefix("admin")->name("admin.")->group(function () {

    Route::resource('product',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product-attribute',ProductAttributeController::class);
    Route::post('product-attribute-value', [ProductController::class, 'storeValue'])->name('product.attribute.value');
});

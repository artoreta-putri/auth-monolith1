<?php

use Illuminate\Support\Facades\Route;
use Modules\Products\Controllers\ProductController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('products', ProductController::class);

Route::post(
    '/products/{product}/reduce-stock/{quantity}',
    [ProductController::class, 'reduceStock']
)->name('products.reduceStock');
});
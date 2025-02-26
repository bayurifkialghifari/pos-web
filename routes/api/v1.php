<?php

use Illuminate\Support\Facades\Route;

// Welcome message
Route::get('/', fn () => response()->json(['message' => 'Welcome to the API v1']), 200)->name('welcome');

Route::middleware('auth.api-key')->group(function () {
    // Me
    Route::get('/me', function() {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => auth()->user(),
        ], 200);
    })->name('me');

    // Product Category
    Route::get('/product-category', [App\Http\Controllers\Api\V1\ProductCategoryController::class, 'index'])->name('product-category.index');
    Route::get('/product-category/{id}', [App\Http\Controllers\Api\V1\ProductCategoryController::class, 'show'])->name('product-category.show');

    // Product Merk
    Route::get('/product-merk', [App\Http\Controllers\Api\V1\ProductMerkController::class, 'index'])->name('product-merk.index');
    Route::get('/product-merk/{id}', [App\Http\Controllers\Api\V1\ProductMerkController::class, 'show'])->name('product-merk.show');
});

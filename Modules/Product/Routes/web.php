<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Size\Http\Controllers\Controller as SizeController;
use Modules\Product\Http\Controllers\FileController;
use Modules\Product\Http\Controllers\GalleryController;

Route::group(['prefix' => 'dashboard', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {

        Route::GET('products/{product_id}/gallery/{color_id?}', [ProductController::class, 'gallery'])->name('products.gallery');
        Route::POST('products/{product_id}/gallery/{color_id?}', [ProductController::class, 'post_gallery'])->name('products.gallery');
        Route::POST('products/change-most-popular/{product}', [ProductController::class, 'changeMostPopular'])->name('change_most_popular');
        Route::post('products/change-most-selling/{id}', [ProductController::class, 'changeMostSelling'])->name('products.changeMostSelling');
        Route::post('products/change-new-collection/{id}', [ProductController::class, 'changeNewCollection'])->name('products.changeNewCollection');

        // Get subCategories by ajax
        Route::GET('products/get-sub-sizes/', [ProductController::class, 'getSubSizes'])->name('getSubSizes');

        Route::GET('products/{product_id}/sizes/{size_id?}', [SizeController::class, 'getSizes'])->name('products.getSizes');
        Route::POST('products/{product_id}/sizes/{size_id?}', [SizeController::class, 'setSizes'])->name('products.setSizes');

        Route::resources(['products' => ProductController::class]);
        Route::resources(['product.gallery' => GalleryController::class]);
        Route::resources(['product.sizes' => SizeController::class]);
        // Route::resources(['product.color.images' => ColorImageController::class]);
        Route::POST('file-upload', [FileController::class, 'store'])->name('file.upload');
        Route::POST('file-remove', [FileController::class, 'destroy'])->name('file.remove');
    });
});

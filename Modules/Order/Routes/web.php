<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Controller;

Route::group(['prefix' => 'dashboard', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::any('/order_status', [Controller::class, 'changeStatus'])->name('orders.status');
        Route::GET('/orders/{method?}', [Controller::class, 'index'])->name('orders');
        Route::resources(['orders' => Controller::class]);
    });
});

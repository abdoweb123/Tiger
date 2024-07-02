<?php

use App\Http\Controllers\Client\AddressController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Middleware\ForceSSL;
use App\Http\Middleware\Localization;
use App\Http\Middleware\SetUserLocale;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

Route::group(['as' => 'Client.', 'middleware' => [Localization::class, ForceSSL::class]], function () {
    
    
    Route::GET('/', [HomeController::class, 'home'])->name('home');



    // filter
    Route::get('/filter-products', [HomeController::class, 'priceFilter'])->name('priceFilter');

    Route::GET('/new-collection', [HomeController::class, 'newCollection'])->name('newCollection');
    Route::GET('/offers', [HomeController::class, 'offers'])->name('offers');
    Route::POST('/filter-products', [HomeController::class, 'filterProducts'])->name('filterProducts');
    Route::POST('/filter-products-offers', [HomeController::class, 'filterProductsOffers'])->name('filterProductsOffers');
    Route::POST('/get-subcategories', [HomeController::class, 'getSubcategories'])->name('getSubcategories');


    Route::get('/categories/{id}/subcategories', [HomeController::class, 'getSubcategories'])->name('subcategoriesFilter');

    // filter

    Route::GET('/device/{device_id?}/{color_id?}', [HomeController::class, 'device'])->name('device');
    Route::GET('/build-your-device/{device_id?}/{color_id}', [HomeController::class, 'BuildYourDevice'])->name('BuildYourDevice');
    Route::GET('/shoping-cart', [HomeController::class, 'cart'])->name('cart');
    Route::POST('/check-out/{delivery_id?}', [HomeController::class, 'confirm'])->name('confirm');
    Route::POST('place-order', [HomeController::class, 'submit'])->name('submit');
    Route::get('change/country/{id}', [HomeController::class, 'changeCountry'])->name('changeCountry');


    // Category's Product
    Route::any('/categories/{category}/{search?}', [CategoryController::class, 'categoryProducts'])->name('categoryProducts');
    Route::any('/products/shop/{search?}', [CategoryController::class, 'shop'])->name('shop');
    //search ajax
    Route::any('/products/search', [HomeController::class, 'searchProducts'])->name('searchProducts');
    // product details
    Route::any('/product-details/{product}', [HomeController::class, 'productDetails'])->name('productDetails');


    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'getWishlist'])->name('getWishlist');
   
    // Cart
    Route::GET('add-to-cart/', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('cart', [CartController::class, 'getCart'])->name('getCart');
    Route::GET('update-cart/', [CartController::class, 'updateCart'])->name('updateCart');
    Route::GET('/cart/delete', [CartController::class, 'deleteCart'])->name('deleteCart');

    // Address
    Route::GET('/update-address-shipping', [AddressController::class, 'updateAddressShipping'])->name('updateAddressShipping');
    Route::get('/get-regions-of-country', [AddressController::class, 'fetchRegionsForCountry'])->name('fetchRegionsForCountry');
    Route::post('getRigons', [AddressController::class, 'getRigons'])->name('getRigons');

    // checkout
    Route::post('/checkout-post', [CheckoutController::class, 'checkoutPost'])->name('checkoutPost');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/save-checkout', [CheckoutController::class, 'saveCheckout'])->name('saveCheckout');

    // place order final checkout
    Route::POST('getInailDeliveryCost', [HomeController::class, 'getInailDeliveryCost'])->name('getInailDeliveryCost');
    Route::POST('getTotalBeforShipping', [HomeController::class, 'getTotalBeforShipping'])->name('getTotalBeforShipping');
    Route::POST('getDeliveryCost', [HomeController::class, 'getDeliveryCost'])->name('getDeliveryCost');
    Route::POST('applayCode', [HomeController::class, 'applayCode'])->name('applayCode');
    Route::POST('place-order', [HomeController::class, 'submit'])->name('submit');

    Route::get('success/{id}', [HomeController::class, 'success'])->name('success');
    // make order
    Route::get('/submit-order/{id}', [CheckoutController::class, 'submitOrder'])->name('submitOrder');
    Route::view('/successful-order', 'Client.success-page')->name('successfulOrder');

    Route::POST('/cart-delete', [HomeController::class, 'deleteitem'])->name('deleteitem');
    Route::POST('/cart-plus', [HomeController::class, 'plus'])->name('plus');
    Route::POST('/cart-minus', [HomeController::class, 'minus'])->name('minus');

    Route::view('/services', 'Client.services')->name('services');
    Route::get('/faqs', [HomeController::class,'getFaqs'])->name('faqs');
    Route::get('/our-stores', [HomeController::class,'getStores'])->name('getStores');
    Route::view('/terms-conditions', 'Client.terms-conditions')->name('terms');
    Route::view('/privacy', 'Client.privacy')->name('privacy');

    Route::any('/report/{device_id}/{size_id}/{color_id}/{specification_id}', [HomeController::class, 'report'])->name('report');
    Route::POST('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

    // For client guest
    Route::group(['middleware' => ['guest:client']], function () {
        // Route::get('/login', [AuthController::class ,'loginView'])->name('login');
        Route::view('/login', 'client.login.login')->name('login');
        Route::POST('/login', [AuthController::class, 'login'])->name('login');

        // Route::view('/register', 'client.register')->name('register');
        Route::POST('/register', [AuthController::class, 'register'])->name('register');

        Route::view('/forgot-password', 'Client.lost-password')->name('password_request');
        Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('sendResetLinkEmail');


        Route::view('/forget', 'Client.forget')->name('forget');
        Route::POST('/forget', [AuthController::class, 'forget'])->name('forget');

        // otp
        Route::get('/otpPage/{id}', [AuthController::class, 'otpPage'])->name('otpPage');
        Route::post('/sendOtp', [AuthController::class, 'sendOtp'])->name('sendOtp');
        Route::get('/restPasswordPage/{id}', [AuthController::class, 'restPasswordPage'])->name('restPasswordPage');
        Route::post('/restPassword', [AuthController::class, 'restPassword'])->name('restPassword');
        Route::post('resend', [AuthController::class, 'Resend'])->name('resend');
    });


    Route::group(['middleware' => ['auth:client']], function () {
        // language
        Route::post('/update-language', [AuthController::class, 'updateLanguage'])->name('update.language');

        Route::get('/add-address',[AddressController::class,'createAddress'])->name('createAddress');
        Route::post('/add-address',[AddressController::class,'storeAddress'])->name('storeAddress');

        Route::get('/edit-address/{id}',[AddressController::class,'editAddress'])->name('editAddress');
        Route::post('/edit-address/{id}',[AddressController::class,'updateAddress'])->name('updateAddress');


        // wishlist
        Route::POST('/toggle-wishlist', [WishlistController::class, 'ToggleWishlist'])->name('ToggleWishlist');
        Route::post('/wishlist/delete', [WishlistController::class, 'deleteWishlist'])->name('deleteWishlist');
    
        // rating
        Route::get('/client-review/{id}',[HomeController::class, 'reviewView'])->name('reviewView');
        Route::POST('/client-review', [HomeController::class, 'ClientReview'])->name('ClientReview');

        Route::get('/my-account/{type?}', [AuthController::class,'getAccountPage'])->name('account');
        Route::POST('/my-account', [AuthController::class, 'account'])->name('account');
        Route::POST('/update-account', [AuthController::class, 'updateAccountDetails'])->name('updateAccountDetails');
        Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::POST('orderView', [AuthController::class, 'orderView'])->name('orderView');
        Route::POST('/update-shipping-address', [AddressController::class, 'updateShippingAddress'])->name('updateShippingAddress');
    });

    // Route::group(['middleware' => [CheckAuth::class]], function () {
    //     Route::any('toggle-fav', [HomeController::class, 'ToggleFav'])->name('toggle-fav');
    //     Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    //     Route::get('edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    //     Route::get('orderDetails', [ProfileController::class, 'orderDetails'])->name('orderDetails');
    //     Route::POST('orderView', [ProfileController::class, 'orderView'])->name('orderView');

    //     // Route::view('/edit-profile', 'Client.edit-profile')->name('edit-profile');
    //     Route::POST('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::POST('/client-review', [HomeController::class, 'ClientReview'])->name('ClientReview');
    //     Route::resource('/address', AddressController::class);
    //     // Route::resource('/profile', ProfileController::class);
    //     Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
    //     Route::get('changePassword', [ProfileController::class, 'changePassword'])->name('change.password');
    //     Route::put('updatePassword', [ProfileController::class, 'updatePassword'])->name('update.password');

    // });

    // Route::get('check-out', [HomeController::class, 'confirm'])->name('confirm');


    // Get sizes by color (ajax) in productDetails page
    Route::GET('products/sizes/by-color/', [HomeController::class, 'getSizesByColor'])->name('getSizesByColor');

    // get item by color, size (ajax)
    Route::GET('get/item/by-color-size/', [HomeController::class, 'getItemByColorSize'])->name('getItemByColorSize');

});

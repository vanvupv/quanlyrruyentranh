<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CheckoutController;

Route::group(['prefix' => '/checkout'],

    function () {
        Route::post('/checkout',
            [CheckoutController::class,'onlineCheckout']
        )->name('checkout');

        Route::get('/thanks',
            [CheckoutController::class,'store']
        )->name('checkout.store');

    }
);

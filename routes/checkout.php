<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CheckoutController;

Route::group(['prefix' => '/checkout'],

    function () {
        // Checkout prepare, from screen cart to check out
        Route::post('/checkout-prepare',
            [CheckoutController::class,'prepareCheckout']
        )->name('checkout.prepare');

        // Checkout screen - Giao dien Thanh toan
        Route::get('/checkout.html',
            [CheckoutController::class,'getCheckout']
        )->name('checkout');

        // Checkout shipping - Giao hang
        Route::post('/checkout/shipping',
            [CheckoutController::class,'getShipping']
        )->name('checkout.shipping');

        // Checkout coupon - Ma giam gia
        Route::post('/checkout/coupon',
            [CheckoutController::class,'getCoupon']
        )->name('checkout.coupon');

        // Checkout remove coupon - Ma giam gia
        Route::post('/checkout/remove-discount',
            [CheckoutController::class,'removeCoupon']
        )->name('checkout.removeCoupon');

        // Checkout process, from screen checkout to check out confirm
        Route::post('/checkout-process',
            [CheckoutController::class,'processCheckout']
        )->name('checkout.process');

        // Checkout confirm screen - Giao dien xac nhan thanh toan, from screen checkout confirm to order
        Route::get('/confirm.html',
            [CheckoutController::class,'getCheckoutConfirmFront']
        )->name('checkout.confirm');

        // Payment
        Route::post('/checkout',
            [CheckoutController::class,'onlineCheckout']
        )->name('checkout.checkout');

        Route::get('/thanks',
            [CheckoutController::class,'store']
        )->name('checkout.store');

        // Add order
        Route::post('/order-add', [CheckoutController::class,'addOrder'])
            ->name('order.add');

        // Order Success
        Route::get('/order-add.html', [CheckoutController::class,'orderSuccessProcessFront'])
            ->name('order.success');
    }
);


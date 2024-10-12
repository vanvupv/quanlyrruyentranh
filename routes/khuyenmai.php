<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\discount\DiscountController;

Route::group(['prefix' => 'admin/discount'],

    function () {
        // Coupon
        Route::get('/', [DiscountController::class,'index'])->name('khuyenmai');

        // Coupon Add
        Route::get('/create', [DiscountController::class,'create'])->name('khuyenmai.add');
        Route::post('/create/store', [DiscountController::class,'store'])->name('khuyenmai.store');

        // Coupon Edit
        Route::get('/edit/{id}', [DiscountController::class,'edit'])->name('khuyenmai.edit');
        Route::post('/edit/{id}', [DiscountController::class,'update'])->name('khuyenmai.postedit');

        // Coupon Apply

    }
);


//Route::group(['prefix' => 'admin/khuyenmai'],
//
//    function () {
//        // Coupon
//        Route::get('/', [KhuyenmaiController::class,'index'])->name('khuyenmai');
//
//        // Coupon Add
//        Route::get('/create', [KhuyenmaiController::class,'create'])->name('khuyenmai.add');
//        Route::post('/create/store', [KhuyenmaiController::class,'store'])->name('khuyenmai.store');
//
//        // Coupon Edit
//        Route::get('/edit/{id}', [KhuyenmaiController::class,'edit'])->name('khuyenmai.edit');
//        Route::post('/edit/{id}', [KhuyenmaiController::class,'postedit'])->name('khuyenmai.postedit');
//
//    }
//);

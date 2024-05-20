<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\khuyenmai\KhuyenmaiController;

Route::group(['prefix' => 'admin/khuyenmai'],

    function () {
        // Coupon
        Route::get('/',
            [KhuyenmaiController::class,'index']
        )->name('khuyenmai');

        // Coupon Add
        Route::get('/create',
            [KhuyenmaiController::class,'create']
        )->name('khuyenmai.add');

        Route::post('/create/store',
            [KhuyenmaiController::class,'store']
        )->name('khuyenmai.store');

        // Coupon Edit
        Route::get('/edit/{id}',
            [KhuyenmaiController::class,'edit']
        )->name('khuyenmai.edit');

    }
);

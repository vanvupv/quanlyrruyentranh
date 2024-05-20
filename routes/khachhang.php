<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\khachhang\KhachhangController;

Route::group(['prefix' => 'admin/khachhang'],

    function () {
        // Khachhang
        Route::get('/',
            [KhachhangController::class,'index']
        )->name('khachhang');

        // Customer Create
        Route::get('/create',
            [KhachhangController::class,'create']
        )->name('khachhang.add');

        Route::post('/create/store',
            [KhachhangController::class,'store']
        )->name('khachhang.store');

        // Customer Detail
        Route::get('/detail/{id}',
            [KhachhangController::class,'edit']
        )->name('khachhang.detail');

        // Customer Edit
        Route::get('/edit/{id}',
            [KhachhangController::class,'edit']
        )->name('khachhang.edit');



    }
);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\donhang\DonhangController;

Route::group(['prefix' => 'admin/order'],

    function () {
        // Order
        Route::get('/',
            [DonhangController::class,'index']
        )->name('order');

        // Order Add
        Route::get('/create',
            [DonhangController::class,'create']
        )->name('order.create');

        Route::post('/create/store',
            [DonhangController::class,'store']
        )->name('order.store');

        // Order Edit
        Route::get('/edit/{id}',
            [DonhangController::class,'detail']
        )->name('order.edit');

    }
);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\giaohang\ShippingController;

Route::group(['prefix' => 'admin/giaohang'],

    function () {
        // Shipping
        Route::get('/', [ShippingController::class,'index'])->name('giaohang');

        // Shipping Add
        Route::get('/create', [ShippingController::class,'create'])->name('giaohang.add');
        Route::post('/create/store', [ShippingController::class,'store'])->name('giaohang.store');

        // Shipping Edit
        Route::get('/edit/{id}', [ShippingController::class,'edit'])->name('giaohang.edit');
        Route::post('/edit/{id}', [ShippingController::class,'update'])->name('giaohang.postedit');

        // Shipping Delete
        Route::delete('/delete/{id}', [ShippingController::class,'delete'])->name('giaohang.delete');
    }
);

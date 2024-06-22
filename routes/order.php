<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\donhang\DonhangController;

Route::group(['prefix' => 'admin/order'],

    function () {
        // Order
        Route::get('/', [DonhangController::class,'index'])->name('order');
        // Order Details
        Route::get('/detail/{id}', [DonhangController::class,'detail'])->name('order.detail');
        // Order Add
        Route::get('/create', [DonhangController::class,'create'])->name('order.create');
        Route::post('/create/store', [DonhangController::class,'store'])->name('order.store');

        // Order Edit
        Route::get('/update/{id}', [DonhangController::class,'edit'])->name('order.edit');

        // Order Delete
        Route::post('/delete', [DonhangController::class,'edit'])->name('order.delete');

        // //
        Route::get('/product_info', [DonhangController::class,'getInfoProduct'])->name('order.product_info');

        // // updateTotal
        Route::get('/updateTotal', [DonhangController::class,'updateTotal'])->name('order.updateTotal');

    }
);

//Route::get('/', $nameSpaceAdminOrder.'\AdminOrderController@index')->name('admin_order.index');   -- Danh sách
//Route::get('/detail/{id}', $nameSpaceAdminOrder.'\AdminOrderController@detail')->name('admin_order.detail');  -- Chi tiết
//Route::get('create', $nameSpaceAdminOrder.'\AdminOrderController@create')->name('admin_order.create');    -- Tạo mới đơn hàng
//Route::post('/create', $nameSpaceAdminOrder.'\AdminOrderController@postCreate')->name('admin_order.create');  -- Lưu vào db

//Route::post('/add_item', $nameSpaceAdminOrder.'\AdminOrderController@postAddItem')->name('admin_order.add_item'); -- Thêm sản phẩm
//Route::post('/edit_item', $nameSpaceAdminOrder.'\AdminOrderController@postEditItem')->name('admin_order.edit_item');  -- Sửa sản phẩm
//Route::post('/delete_item', $nameSpaceAdminOrder.'\AdminOrderController@postDeleteItem')->name('admin_order.delete_item');    -- Xóa sản phẩm

//Route::post('/update', $nameSpaceAdminOrder.'\AdminOrderController@postOrderUpdate')->name('admin_order.update'); -- Cập nhật đơn hàng

//Route::post('/delete', $nameSpaceAdminOrder.'\AdminOrderController@deleteList')->name('admin_order.delete');  -- Xóa đơn hàng

//Route::get('/product_info', $nameSpaceAdminOrder.'\AdminOrderController@getInfoProduct')->name('admin_order.product_info');   -- Thông tin sản phẩm

//Route::get('/user_info', $nameSpaceAdminOrder.'\AdminOrderController@getInfoUser')->name('admin_order.user_info');    -- Thông tin khách hàng

//Route::get('/invoice', $nameSpaceAdminOrder.'\AdminOrderController@invoice')->name('admin_order.invoice');    -- Hóa đơn



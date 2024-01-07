<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\LoaisanphamController;
use App\Http\Controllers\Permission\PermissionController;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomesanphamController;

// Views User
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\RegisterController;

// Views
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login User
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::get('/logout',[LoginController::class,'index'])->name('logout');

// Register User
Route::get('/register',[RegisterController::class,'viewRegister'])->name('register');
Route::post('/register/store',[RegisterController::class,'storeRegister'])->name('register.store');

// Product
Route::get('/',[HomeController::class,'viewHome'])->name('home');
Route::get('/shop',[ShopController::class,'viewShop'])->name('home.shop');
Route::get('/detail/{detail}',[DetailController::class,'viewDetail'])->name('home.detail');

// Cart
Route::get('/cart',[CartController::class,'viewCart'])->name('cart');
Route::post('/cart/store',[CartController::class,'addCart'])->name('cart.store');
Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update');
Route::delete('/cart/remove',[CartController::class,'removeCart'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');

//// Role
//Route::get('/permission/role',[PermissionController::class,'viewRoles']);


//Route::get('/admin/main',[MainController::class,'index'])->name('admin')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main',[MainController::class,'index'])->name('admin');

        // Quan Ly San Pham
        Route::prefix('sanpham')->group(function () {
            Route::get('add',[SanphamController::class,'create'])->name('AddSanpham');
            Route::post('add/store',[SanphamController::class,'store'])->name('AddSanPham.store');
            Route::get('list',[SanphamController::class,'list']);
            Route::get('edit/{sanpham}',[SanphamController::class,'edit']);
            Route::post('edit/{sanpham}',[SanphamController::class,'postedit'])->name('EditSanPham');
            Route::DELETE('delete',[SanphamController::class,'delete']);
        });

        // Quan Ly Loai San Pham
        Route::prefix('loaisanpham')->group(function () {
            Route::get('addType',[LoaisanphamController::class,'create']);
            Route::post('addType/store',[LoaisanphamController::class,'store']);
            Route::get('listType',[LoaisanphamController::class,'list']);
            Route::get('editType/{loaisanpham}',[LoaisanphamController::class,'edit']);
            Route::post('editType/{loaisanpham}',[LoaisanphamController::class,'postedit'])->name('EditType');
            Route::DELETE('delete',[LoaisanphamController::class,'delete']);
        });

        // Quan Ly Anh
        Route::prefix('fileImage')->group(function () {
            Route::get('addImage',[ImageController::class,'create'])->name('AddImg');
            Route::post('addImage/store',[ImageController::class,'addImage'])->name('AddImg.store');
            Route::get('listImage',[ImageController::class,'list'])->name('listImage');
//    Route::get('edit/{sanpham}',[SanphamController::class,'edit']);
//    Route::post('edit/{sanpham}',[SanphamController::class,'postedit'])->name('EditSanPham');
            Route::DELETE('deleteImage',[ImageController::class,'deleteImages'])->name('DeleteImage');
        });
    });
});




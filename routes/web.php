<?php

// Admin
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SanphamController;

// Admin - Product
use App\Http\Controllers\Admin\LoaisanphamController;
use App\Http\Controllers\Admin\TacgiaController;
use App\Http\Controllers\Admin\NhaxuatbanController;
use App\Http\Controllers\Admin\VitriController;

//
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;

//
use Illuminate\Support\Facades\Route;

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

// Login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::get('/logout',[LoginController::class,'index'])->name('logout');

// Register
Route::get('/register',[RegisterController::class,'viewRegister'])->name('register');
Route::post('/register/store',[RegisterController::class,'storeRegister'])->name('register.store');

// Product
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('home.shop');
Route::get('/detail/{detail}',[DetailController::class,'viewDetail'])->name('home.detail');

// Cart
Route::get('/cart',[CartController::class,'viewCart'])->name('cart');
Route::post('/cart/store',[CartController::class,'addCart'])->name('cart.store');
Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update');
Route::delete('/cart/remove',[CartController::class,'removeCart'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');

// Image Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Auth
Route::middleware(['auth','permission'])->group(function () {
    Route::prefix('admin')->group(function () {

        //
        Route::get('/',[MainController::class,'index'])->name('admin');

        // Quan Ly San Pham
        Route::prefix('sanpham')->middleware(['permission:check,allow,deny'])->group(function () {
            Route::get('/',[SanphamController::class,'index'])->name('sanpham');
            Route::get('add',[SanphamController::class,'create'])->name('sanpham.add');
            Route::post('add/store',[SanphamController::class,'store'])->name('sanpham.store');
            Route::get('detail/{id}',[SanphamController::class,'detail'])->name('sanpham.detail');
            Route::get('edit/{id}',[SanphamController::class,'edit'])->name('sanpham.edit');
            Route::post('edit/{id}',[SanphamController::class,'postedit'])->name('sanpham.postedit');
            Route::delete('delete/{id}',[SanphamController::class,'delete'])->name('sanpham.delete');
        });

        // Quan Ly Loai San Pham
        Route::prefix('loaisanpham')->group(function () {
            Route::get('/',[LoaisanphamController::class,'list'])->name('theloai');
            Route::get('add',[LoaisanphamController::class,'create'])->name('theloai.add');
            Route::post('add/store',[LoaisanphamController::class,'store'])->name('theloai.store');
            Route::get('/detail/{id}', [LoaisanphamController::class,'view'])->name('theloai.detail');
            Route::get('edit/{id}',[LoaisanphamController::class,'edit'])->name('theloai.edit');
            Route::post('edit/{id}',[LoaisanphamController::class,'postedit'])->name('theloai.postedit');
            Route::delete('delete',[LoaisanphamController::class,'delete'])->name('theloai.delete');
        });

        // Quan Ly Tac Gia
        Route::prefix('tacgia')->group(function () {
            Route::get('/', [TacgiaController::class,'list'])->name('tacgia');
            Route::get('/add', [TacgiaController::class,'add'])->name('tacgia.add');
            Route::post('/add/store', [TacgiaController::class,'store'])->name('tacgia.store');
            Route::get('/view/{id}', [TacgiaController::class,'view'])->name('tacgia.detail');
            Route::get('/edit/{id}', [TacgiaController::class,'edit'])->name('tacgia.edit');
            Route::post('/edit/{id}', [TacgiaController::class,'postedit'])->name('tacgia.postedit');
            Route::delete('/delete/{id}', [TacgiaController::class,'delete'])->name('tacgia.delete');
        });

        // Quan Ly Nha Xuat Ban
        Route::prefix('nhaxuatban')->group(function () {
            Route::get('/', [NhaxuatbanController::class,'list'])->name('nhaxuatban');
            Route::get('/add', [NhaxuatbanController::class,'add'])->name('nhaxuatban.add');
            Route::post('/add/store', [NhaxuatbanController::class,'store'])->name('nhaxuatban.store');
            Route::get('/view/{id}', [NhaxuatbanController::class,'view'])->name('nhaxuatban.detail');
            Route::get('/edit/{id}', [NhaxuatbanController::class,'edit'])->name('nhaxuatban.edit');
            Route::post('/edit/{id}', [NhaxuatbanController::class,'postedit'])->name('nhaxuatban.postedit');
            Route::delete('/delete/{id}', [NhaxuatbanController::class,'delete'])->name('nhaxuatban.delete');
        });

        // Quan Ly Vi Tri
        Route::prefix('vitri')->group(function () {
            Route::get('/', [VitriController::class,'list'])->name('vitri');
            Route::get('/add', [VitriController::class,'add'])->name('vitri.add');
            Route::post('/add/store', [VitriController::class,'store'])->name('vitri.store');
            Route::get('/view/{id}', [VitriController::class,'view'])->name('vitri.detail');
            Route::get('/edit/{id}', [VitriController::class,'edit'])->name('vitri.edit');
            Route::post('/edit/{id}', [VitriController::class,'postedit'])->name('vitri.postedit');
            Route::delete('/delete/{id}', [VitriController::class,'delete'])->name('vitri.delete');
        });
    });
});




<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manhanvien');
            $table->unsignedBigInteger('makhachhang');
            $table->double('tienhang');
            $table->double('tiengiaohang');
            $table->double('giamgia');
            $table->integer('trangthaithanhtoan');
            $table->integer('trangthaigiaohang');
            $table->integer('trangthai');
            $table->double('tienthue');
            $table->double('tongtien');

            $table->string('hoten');
            $table->string('diachi');
            $table->string('sodienthoai');
            $table->string('email');
            $table->string('ghichu');
            $table->string('phuongthucthanhtoan');
            $table->string('phuongthucgiaohang');

            $table->timestamps();

            // Khóa ngoại
            $table->foreign('manhanvien')->references('id')->on('users');
            $table->foreign('makhachhang')->references('id')->on('khachhang');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donhang');
    }
};


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
            $table->double('tongtien');
            $table->string('trangthai', 55);
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


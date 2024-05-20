<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachhang')->nullable();
            $table->string('sodienthoai', 10)->nullable();
            $table->boolean('trangthaihoatdong')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};

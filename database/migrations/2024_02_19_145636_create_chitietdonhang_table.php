<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedBigInteger('madonhang');
            $table->unsignedBigInteger('masanpham');
            $table->string('name');

            $table->double('giatien');
            $table->integer('soluong');
            $table->double('tongtien');

            $table->double('thue');
            $table->string('sku');

            $table->timestamps();

            // Khóa ngoại
            $table->foreign('madonhang')->references('id')->on('donhang');
            $table->foreign('masanpham')->references('id')->on('sanphams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
};


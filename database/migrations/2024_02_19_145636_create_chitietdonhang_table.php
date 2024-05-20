<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedBigInteger('madonhang')->default(1);
            $table->unsignedBigInteger('masanpham')->default(1);
            $table->integer('soluong')->default(1);
            $table->double('giatien')->default(1);
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


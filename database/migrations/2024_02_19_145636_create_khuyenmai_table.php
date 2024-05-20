<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenmaiTable extends Migration
{
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->double('reward');
            $table->string('type');
            $table->text('desc');
            $table->integer('limit');
            $table->unsignedBigInteger('productExclude');
            $table->unsignedBigInteger('productApply');
            $table->unsignedBigInteger('categoryExclude');
            $table->unsignedBigInteger('categoryApply');
            $table->date('expires');
            $table->string('status');
            $table->timestamps();

            // Khóa ngoại
//            $table->foreign('madonhang')->references('id')->on('donhang');
//            $table->foreign('masanpham')->references('id')->on('sanphams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
};


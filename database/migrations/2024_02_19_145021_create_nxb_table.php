<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNxbTable extends Migration
{
    public function up()
    {
        Schema::create('nxb', function (Blueprint $table) {
            $table->id();
            $table->string('tennxb',50);
            $table->text('motanxb');
            $table->text('anh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nxb');
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitriTable extends Migration
{
    public function up()
    {
        Schema::create('vitri', function (Blueprint $table) {
            $table->id();
            $table->string('tenvitri');
            $table->text('motavitri');
            $table->text('anh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vitri');
    }
};

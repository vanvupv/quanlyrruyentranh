<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheloaiTable extends Migration
{
    public function up()
    {
        Schema::create('theloai', function (Blueprint $table) {
            $table->id();
            $table->string('tentl');
            $table->text('motatheloai');
            $table->text('anh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('theloai');
    }
};

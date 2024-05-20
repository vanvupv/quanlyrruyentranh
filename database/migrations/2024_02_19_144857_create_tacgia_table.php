<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacgiaTable extends Migration
{
    public function up()
    {
        Schema::create('tacgia', function (Blueprint $table) {
            $table->id();
            $table->string('tentacgia');
            $table->text('motatacgia');
            $table->text('anh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tacgia');
    }
};

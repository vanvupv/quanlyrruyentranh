<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensanpham', 60);
            $table->string('sku', 10);
            $table->text('mota');
            $table->integer('soluong');
            $table->integer('gianhap')->default(0);
            $table->integer('giaban')->default(0);
            $table->integer('matheloai');
            $table->text('anhbia');
            // Uncomment the following line if you want to add foreign key constraint
            $table->foreign('matheloai')->references('id')->on('loaisanpham');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};


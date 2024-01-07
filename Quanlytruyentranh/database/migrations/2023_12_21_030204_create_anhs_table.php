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
        Schema::create('anhs', function (Blueprint $table) {
            $table->bigIncrements('IDImage');
            $table->unsignedBigInteger('IDSanPham');
            $table->string('address', 50);
            $table->string('title', 50);
            $table->timestamps();

            // Khóa chính tự tăng
//            $table->primary('IDImage');

            // Khóa ngoại
            $table->foreign('IDSanPham')->references('IDSanPham')->on('sanphams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anhs');
    }
};

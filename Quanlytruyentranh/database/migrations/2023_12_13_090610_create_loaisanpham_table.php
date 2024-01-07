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
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->id('MaLoaiSP');
            $table->string('TenLoai', 60);
            $table->string('MoTa', 255)->default('ko co');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaisanpham');
    }
};

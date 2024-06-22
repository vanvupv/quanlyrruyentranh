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
            $table->id();
            $table->string('parent_id',60);
            $table->string('tenloai', 60);
            $table->string('mota', 255)->default('ko co');
            $table->text('anhbia');
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

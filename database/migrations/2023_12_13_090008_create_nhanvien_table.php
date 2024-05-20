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
        Schema::create('nhanviens', function (Blueprint $table) {
            $table->id('MaNhanVien');
            $table->string('TenNhanVien', 80);
            $table->string('DiaChi', 255)->nullable();
            $table->string('SoDienThoai', 11)->nullable();
            $table->boolean('GioiTinh')->default(0);
            $table->string('ChucVu', 30);
            $table->date('NgaySinh');
            $table->date('NgayVaoLam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};

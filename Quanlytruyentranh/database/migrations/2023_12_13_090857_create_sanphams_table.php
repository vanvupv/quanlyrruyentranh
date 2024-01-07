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
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id('IDSanPham');
            $table->string('MaSP', 10);
            $table->string('TenSP', 60);
            $table->integer('SoLuong')->default(1);
            $table->string('DonViTinh', 15)->nullable();
            $table->integer('GiaNhap')->default(0);
            $table->integer('GiaBan')->default(0);
            $table->integer('MaLoaiSP');
            $table->string('MoTa', 255)->nullable();
            // Uncomment the following line if you want to add foreign key constraint
            $table->foreign('MaLoaiSP')->references('MaLoaiSP')->on('loaisanpham');

//            $table->check('GiaBan > GiaNhap');
//            $table->check('GiaNhap >= 0');
//            $table->check('SoLuong >= 0');
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

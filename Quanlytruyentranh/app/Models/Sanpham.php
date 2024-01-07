<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanphams'; // Tên Bảng
    protected $primaryKey = 'IDSanPham'; // Tên cột khóa chính
    protected $fillable = [
        'TenSP',
        'MaSP',
        'SoLuong',
        'DonViTinh',
        'GiaBan',
        'AnhBia',
        'MaLoaiSP',
    ];
}


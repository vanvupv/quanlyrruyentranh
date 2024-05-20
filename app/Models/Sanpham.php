<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table = 'sanphams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'masanpham',
        'tensanpham',
        'SKU',
        'donvitinh',
        'mota',
        'soluong',
        'giagoc',
        'giaban',
        'giatotnhat',
        'anhbia',
        'matacgia',
        'manhaxuatban',
        'matheloai',
        'mavitri',
        'trangthai',
    ];

    public function loaisanpham() {
        return $this->belongsTo(Loaisanpham::class, 'MaLoaiSP');
    }
}


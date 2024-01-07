<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    use HasFactory;

    // Khai bao cac thuoc tinh
    protected $table = 'loaisanpham';

    protected $primaryKey = 'MaLoaiSP';

    protected $fillable = [
        'TenLoai',
    ];
}

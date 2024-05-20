<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    use HasFactory;

    // Khai bao cac thuoc tinh
    protected $table = 'loaisanpham';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tenloai',
        'mota',
        'anhbia',
    ];

    //
    public static function theloaiExists($theloai)
    {
        return self::where('tenloai', $theloai)->exists();
    }
}

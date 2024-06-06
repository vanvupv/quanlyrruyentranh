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

    // Kiểm tra tên loại đã tồn tại chưa khi thực hiện cập nhật
    public static function checkTenloai($id, $tenloai): bool {
        if($id && $tenloai) {
            return self::where('tenloai', $tenloai)->where('id', '<>', $id)->exists();
        } else
            return false;
    }

    //
    public static function theloaiExists($theloai)
    {
        return self::where('tenloai', $theloai)->exists();
    }
}

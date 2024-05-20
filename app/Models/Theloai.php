<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;
    protected $table = 'theloai'; // Tên Bảng

    protected $primaryKey = 'id';

    protected $fillable = [
        'tentl',
        'motatheloai',
        'anh',
    ];

    //
    public static function theloaiExists($theloai)
    {
        return self::where('tentl', $theloai)->exists();
    }

}

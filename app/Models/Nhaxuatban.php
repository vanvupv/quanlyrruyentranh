<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhaxuatban extends Model
{
    use HasFactory;

    protected $table = 'nxb';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tennxb',
        'motanxb',
        'anh',
    ];

    //
    public static function nxbExists($nhaxuatban)
    {
        return self::where('tennxb', $nhaxuatban)->exists();
    }
}

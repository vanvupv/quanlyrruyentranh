<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'madonhang',
        'masanpham',
        'soluong',
        'giatien',
    ];

    public function donhang() {
        return $this->belongsTo(Donhang::class, 'madonhang');
    }

    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'masanpham');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected  $table = 'donhang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'manhanvien',
        'makhachhang',
        'tongtien',
        'trangthai',
    ];

    //
    public function chitietdonhang() {
        return $this->hasMany(Chitietdonhang::class, 'madonhang');
    }

    public function nhanvien()
    {
        return $this->belongsTo(User::class, 'manhanvien');
    }

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'makhachhang');
    }

}

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

    //
    public function checkSKU($id, $sku): bool {
        $check = self::where('SKU', $sku);

        if ($id) {
            $check = $check->where('id', '<>', $id);
        }

        $check = $check->first();

        if ($check) {
            return false;
        } else {
            return true;
        }
    }

    // Kiểm tra ma san pham
    public static function masanpham($id, string $masanpham): bool {
        return self::where('masanpham', $masanpham)->where('id', '<>', $id)->exists();
    }

    // Kiểm tra sku
    public static function sku($id, string $sku): bool {
        return self::where('sku', $sku)->where('id', '<>', $id)->exists();
    }

    public function loaisanpham() {
        return $this->belongsTo(Loaisanpham::class, 'MaLoaiSP');
    }


    /*
    Upate stock, sold
    */
    public static function updateStock($product_id, $qty_change)
    {
        $item = self::find($product_id);
        if ($item) {
            $item->soluong = $item->soluong - $qty_change;
            $item->save();
        }
    }


}


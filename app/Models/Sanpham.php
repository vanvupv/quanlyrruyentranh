<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    protected $primaryKey = 'id';

    protected $fillable = [
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

    public function loaisanpham() {
        return $this->belongsTo(Loaisanpham::class, 'matheloai');
    }

    /*
     *
     * */


    /*
     * Upate stock, sold
     * */
    public static function updateStock($product_id, $qty_change)
    {
        // Tìm sản phẩm trong Cơ sở dữ liệu
        $item = self::find($product_id);

        if ($item) {
            $item->soluong = $item->soluong - $qty_change;
            $item->save();
        }
    }

}


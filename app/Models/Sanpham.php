<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    // Khai báo các kiểu sản phẩm mặc định
    const TYPE_SIMPLE = 'simple';     // Sản phẩm đơn giản
    const TYPE_VARIABLE = 'variable'; // Sản phẩm biến thể
    const TYPE_DIGITAL = 'digital';   // Sản phẩm số
    const TYPE_SUBSCRIPTION = 'subscription'; // Sản phẩm đăng ký

    protected $table = 'sanpham';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tensanpham',
        'sku',
        'mota',
        'soluong',
        'gianhap',
        'giaban',
        'anhbia',
        'matheloai',
        'trangthai',
    ];

    /*
     *
     * */
    public static function getProductTypes()
    {
        return [
            self::TYPE_SIMPLE => 'Sản phẩm đơn giản',
            self::TYPE_VARIABLE => 'Sản phẩm biến thể',
            self::TYPE_DIGITAL => 'Sản phẩm số',
            self::TYPE_SUBSCRIPTION => 'Sản phẩm đăng ký',
        ];
    }

    /*
     * Kiểm tra ràng buộc duy nhất của sku
     * */
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

    /*
     *
     * */
    public function loaisanpham() {
        return $this->belongsTo(Loaisanpham::class, 'matheloai');
    }

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


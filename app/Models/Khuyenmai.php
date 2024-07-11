<?php

namespace App\Models;

use App\Http\Controllers\Admin\SanphamController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    use HasFactory;

    protected $table = 'khuyenmai';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code', // 1
        'reward', // 2
        'type', // 3
        'desc', // 4
        'limit', // 5
        'productExclude', // 6
        'productApply', // 7
        'categoryExclude', // 8
        'categoryApply', // 9
        'expires', // 10
        'status', // 11
    ];

    protected $casts = [
        'productExclude' => 'array',
        'productApply' => 'array',
        'categoryExclude' => 'array',
        'categoryApply' => 'array',
    ];

    // Phương thức để lấy tên sản phẩm từ productExclude
    public function getProductNamesAttribute()
    {
        $productIds = json_decode($this->productExclude, true);

        return Sanpham::whereIn('id', $productIds)->pluck('tensanpham')->toArray();
    }
}

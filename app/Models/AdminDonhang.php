<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Donhang;

class AdminDonhang extends Donhang
{
    use HasFactory;

    public static $mapStyleStatus = [
        '1' => 'info', //New
        '2' => 'primary', //Processing
        '3' => 'warning', //Hold
        '4' => 'danger', //Cancel
        '5' => 'success', //Success
        '6' => 'default', //Failed
    ];

    /**
     *
     *
     * */
    public static function getOrderAdmin($id, $storeId = null)		// Lấy chi tiết đơn hàng với tham số đầu vào $id là mã đơn hàng, $storeId là mã cửa hàng
    {
        $data  = self::with(['chitietdonhang'])->where('id', $id);
//        if ($storeId) {
//            $data = $data->where('store_id', $storeId);
//        }
        return $data->first();
    }

}

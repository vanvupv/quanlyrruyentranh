<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//
use DB;

class Donhang extends Model
{
    use HasFactory;

    const NEW = 'new';
    const PROCESSING = 'processing';
    const HOLD = 'hold';
    const CANCELED = 'canceled';
    const DONE = 'done';
    const FAILED = 'failed';

    protected  $table = 'donhang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'manhanvien',
        'makhachhang',
        'tienhang',
        'tiengiaohang',
        'giamgia',
        'trangthaithanhtoan',
        'trangthaigiaohang',
        'trangthai',
        'tienthue',
        'tongtien',
        'hoten',
        'diachi',
        'sodienthoai',
        'email',
        'ghichu',
        'phuongthucthanhtoan',
        'phuongthucgiaohang',
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

    /*
     *
     *
     * */
    public function createOrder($dataOrder, $arrCartDetail) {
        try {
            DB::connection('mysql')->beginTransaction();

            $uID = $dataOrder['makhachhang'] ?? 0;
            $adminID = $dataOrder['manhanvien'] ?? 0;
//            unset($dataOrder['manhanvien']);

            // Insert order
            $order = Donhang::create($dataOrder);
            $orderID = $order->id;
            // End insert order

            // Order detail
            foreach ($arrCartDetail as $cartDetail) {
                $pID = $cartDetail['masanpham'];
                $product = Sanpham::find($pID);

                $cartDetail['madonhang'] = $orderID;

                $this->addOrderDetail($cartDetail);

                //Update stock and sold
                Sanpham::updateStock($pID, $cartDetail['soluong']);
            }
            //End order detail

            DB::connection('mysql')->commit();

            $return = ['error' => 0, 'orderID' => $orderID, 'msg' => "", 'detail' => $order];
        } catch (\Throwable $e) {
            DB::connection('mysql')->rollBack();
            $return = ['error' => 1, 'msg' => $e->getMessage()];
        }
        return $return;
    }

    /**
     * Add order detail
     * @param [type] $dataDetail [description]
     */
    public function addOrderDetail($dataDetail)
    {
        return Chitietdonhang::create($dataDetail);
    }
}

<?php

namespace App\Http\Controllers\Admin\donhang;

use App\Http\Controllers\Controller;
use App\Models\AdminDonhang;
use App\Models\Chitietdonhang;
use App\Models\Donhang;
use App\Models\Khachhang;
use App\Models\Sanpham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonhangController extends Controller
{
    public $statusPayment;
    public $statusOrder;
    public $statusShipping;
    public $statusOrderMap;
    public $statusShippingMap;
    public $statusPaymentMap;
    public $currency;
    public $country;
    public $countryMap;

    /**
     *
     *
     *
     * */
    public function index () {
        $donhangs = Donhang::all();

        $customer = Auth::user();

        if(!$customer) {
            return redirect()->route('login')->with('error','Yêu cầu đăng nhập tài khoản');
        }

        return view('admin.donhang.danhsachdonhang',[
            'donhangs' => $donhangs,
        ]);
    }

    /**
     *
     *
     *
     * */
    public function detail($id) {
        $order = AdminDonhang::getOrderAdmin($id);

        if (!$order) {
            return redirect()->route('order')->with(['url' => url()->full()]);
        }

        $paymentMethod = [];
        $shippingMethod = [];

        return view('admin.donhang.chitietdonhang', [
            'order' => $order,
        ]);
    }

    /**
     *
     *
     *
     * */
    public function create() {

        $docgias = Khachhang::all();
        $user = User::all();
        $products = Sanpham::all();

        return view('admin.donhang.taodonhang', [
            'title' => 'Tạo đơn hàng',
            'docgias' => $docgias,
            'sanphams' => $products,
        ]);
    }

    /**
     *
     *
     * */
    public function store(Request $request) {
        // Kiểm tra trạng thái đăng nhập
        $customer = auth()->user();

        if ( !$customer) {
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập');
        }

        $quantities = $request->all(); // Lấy tất cả dữ liệu từ request

        $skuArr = [];
        foreach ($quantities as $key => $value) {
            if (strpos($key, 'qty-') === 0) {
                $sku = substr($key, 4); // Lấy mã SKU từ tên của input
                $skuArr[$sku] = $value;
            }
        }
        $skuArray = array_keys($skuArr);

        $products = Sanpham::whereIn('sku',$skuArray)->get();

        // Tạo mảng chứa danh sách sản phẩm với các thông tin cần thiết
        $productList = [];
        foreach ($products as $product) {
            $sku = $product->sku;
            if (isset($skuArr[$sku])) {
                $productList[] = [
                    'id' => $product->id,
                    'tensanpham' => $product->tensanpham,
                    'quantity' => $skuArr[$sku],
                    'giaban' => $product->giaban
                ];
            }
        }

//        $shippingAddress = session('shippingAddress') ?? [];    // Địa chỉ giao hàng
//        $paymentMethod   = session('paymentMethod') ?? '';      // Phương thức thanh toán
//        $shippingMethod  = session('shippingMethod') ?? '';     // Phương thức giao hàng
//        $dataCheckout    = session('dataCheckout') ?? '';       // Danh sách sản phẩm đơn hàng

        // Khởi tạo mảng giá trị đơn hàng
        $uID = $customer->id ?? 0;

        $dataOrder['manhanvien']     = $uID;    // mã nhân viên
        $dataOrder['makhachhang']     = $uID;   // mã khách hàng
        $dataOrder['tienhang']        = 10000;  // tổng tiền
        $dataOrder['tiengiaohang']     = 0;    // trạng thái
        $dataOrder['giamgia']     = 0;    // trạng thái
        $dataOrder['trangthaithanhtoan']     = 1;
        $dataOrder['trangthaigiaohang']     = 0;
        $dataOrder['trangthai']     = 0;    //
        $dataOrder['tienthue']     = 0;    //
        $dataOrder['tongtien']     = 0;    //
        $dataOrder['hoten']     = $quantities['first_name'];    //
        $dataOrder['diachi']     = $quantities['address'];    //
        $dataOrder['sodienthoai']     = $quantities['phone'];    //
        $dataOrder['email']     = $quantities['email'];    //
        $dataOrder['ghichu']     = $quantities['comment'];    //
        $dataOrder['phuongthucthanhtoan']     = $quantities['shippingMethod'];    //
        $dataOrder['phuongthucgiaohang']     = $quantities['paymentMethod'];    //

        // Khởi tạo mảng giá trị chi tiết đơn hàng
        $arrCartDetail = [];
        foreach ($productList as $cartItem) {
            $arrDetail['masanpham'] = $cartItem['id'];
            $arrDetail['tensanpham'] = $cartItem['tensanpham'];
            $arrDetail['giatien'] = $cartItem['giaban'];
            $arrDetail['soluong'] = $cartItem['quantity'];
            $arrDetail['tongtien'] = $cartItem['giaban'] * $cartItem['quantity'];
            $arrDetail['thue'] = 0;
            $arrCartDetail[] = $arrDetail;
        }

        //Set session info order
        session(['dataOrder' => $dataOrder]);
        session(['arrCartDetail' => $arrCartDetail]);

        // Khởi tạo đơn hàng
        $newOrder = (new Donhang)->createOrder($dataOrder, $arrCartDetail);

        // Kiem tra don hang da tao thanh cong chua
        if ($newOrder['error'] == 1) {
            return redirect()->route('cart')->with(['error' =>'Tao don hang that bai']);
        }

        // Set session orderID
        session(['orderID' => $newOrder['orderID']]);

        //
        return (new DonhangController())->completeOrder();
    }

    /**
     *
     *
     *
     * */
    public function edit($id) {


        return view('a');
    }

    /**
     *
     *
     * */
    public function getInfoProduct(Request $request) {
        $id = $request->all();
        $product = Sanpham::find($id);

        if ($product) {
            return response()->json([
                'data' => $product,
                'message' => 'success',
            ]);
        }
    }

    /**
     *
     *
     * */
    public function updateTotal(Request $request) {

    }

    /**
     *
     *
     *
     * */
    public function completeOrder() {

        return redirect()->back()->with(['success' => 'Tao don hang thanh cong']);
    }
}

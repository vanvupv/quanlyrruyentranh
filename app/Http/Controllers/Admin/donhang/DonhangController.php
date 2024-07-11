<?php

namespace App\Http\Controllers\Admin\donhang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//
use App\Models\AdminDonhang;
use App\Models\Donhang;
use App\Models\Khachhang;
use App\Models\Khuyenmai;
use App\Models\Sanpham;
use App\Models\User;

//
use Cart;

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
        $donhangs = Donhang::with(['khachhang','nhanvien'])->get();

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

        Cart::instance('order')->destroy();

        $this->clearSession();

        return view('admin.donhang.taodonhang', [
            'title' => 'Tạo đơn hàng',
            'docgias' => $docgias,
            'sanphams' => $products,
        ]);
    }

    /*
     * Kiểm tra request được gửi lên từ giỏ hàng
     *
     *
     * */
    public function prepareCheckout() {
        // kiểm tra đăng nhập
        $customer = Auth::user();

        if(!$customer) {
            return redirect()->route('login');
        }

        $data = request()->all();

        // Kiểm tra giỏ hàng có rỗng không
//        $cartDetail = DB::table('shoppingcart')
//            ->where('identifier', $customer)
//            ->where('instance', 'cart')
//            ->first();
        $cartItems = Cart::instance('order')->content();

        if(!$cartItems) {
            return redirect()->back()->with('error','Ban chua them san pham vao gio hang');
        }

        //Set session - Thiết lập phiên lưu trữ thông tin giỏ hàng
        session(['dataCheckout' => $cartItems]);

        //Set session shippingMethod
        session(['shippingMethod' => request('shippingMethod')]);

        //Set session paymentMethod
        session(['paymentMethod' => request('paymentMethod')]);

        //Set session address process
        session(['address_process' => request('address_process')]);

        //Set session shippingAddressshippingAddress
        session(
            [
                'shippingAddress' => [
                    'first_name'      => request('first_name'),
                    'last_name'       => request('last_name'),
                    'email'           => request('email'),
                    'country'         => request('country'),
                    'address'         => request('address'),
                    'phone'           => request('phone'),
                    'comment'         => request('comment'),
                ],
            ]
        );

        // Set session dataTotal
        $dataSubTotal = Cart::instance('order')->subtotal();
        $dataTax = Cart::instance('order')->tax();
        $dataTotal = Cart::instance('order')->total();

        //
        session(['dataSubTotal' => $dataSubTotal]);
        session(['dataTax' => $dataTax]);
        session(['dataTotal' => $dataTotal]);

        //
        return redirect()->route('order.checkout');
    }

    /*
     *
     *
     * */
    public function checkout() {
        // Address Shipping
        $shippingAddress = session('shippingAddress') ?? '';

        // Shipping method
        $shippingMethod = session('shippingMethod') ?? '';

        // Payment method
        $paymentMethod = session('paymentMethod') ?? '';

        //
        $dataSubTotal = session('dataSubTotal') ?? '';

        //
        $dataTax = session('dataTax') ?? '';

        //
        $dataTotal = session('dataTotal') ?? '';

        //
        return view('admin.donhang.checkout', [
            'title'              => 'checkout.page_title',
            'data'               => session('dataCheckout'),
            'paymentMethodData'  => $shippingMethod,
            'shippingMethodData' => $paymentMethod,
            'shippingAddress'    => $shippingAddress,
            'dataSubTotal'       => $dataSubTotal,
            'dataTax'            => $dataTax,
            'dataTotal'          => $dataTotal,
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

        $data = request()->all();

        if (!$data) {
            return redirect()->route('order');
        } else {
            $shippingAddress = session('shippingAddress') ?? [];    // Địa chỉ giao hàng
            $paymentMethod   = session('paymentMethod') ?? '';      // Phương thức thanh toán
            $shippingMethod  = session('shippingMethod') ?? '';     // Phương thức giao hàng
            $productList     = session('dataCheckout') ?? '';       // Danh sách sản phẩm đơn hàng
            $dataSubTotal    = session('dataSubTotal') ?? '';       // Thông tin tổng tiền hàng
            $dataTax         = session('dataTax') ?? '';            // Thông tin tổng tiền thuế
            $dataTotal       = session('dataTotal') ?? '';          // Thông tin tổng tiền phải thanh toán

        }

        // Khởi tạo mảng giá trị đơn hàng
        $uID = $customer->id ?? 0;

        $dataOrder['manhanvien']     = $uID;    // Mã nhân viên
        $dataOrder['makhachhang']     = $uID;   // Mã khách hàng
        $dataOrder['tienhang']        =  filter_var($dataSubTotal, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Tổng tiền hàng
        $dataOrder['tiengiaohang']     = 0;    // Tiền giao hàng
        $dataOrder['giamgia']     = 0;    // Mã giảm giá
        $dataOrder['trangthaithanhtoan']     = 1; //
        $dataOrder['trangthaigiaohang']     = 0; //
        $dataOrder['trangthai']     = 'new'; // Trạng thái đơn hàng
        $dataOrder['tienthue']     = filter_var($dataTax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);    // Tiền thuế
        $dataOrder['tongtien']     = filter_var($dataTotal, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);    // Tổng tiền
        $dataOrder['hoten']     = $shippingAddress['first_name'];    //
        $dataOrder['diachi']     = $shippingAddress['address'];    //
        $dataOrder['sodienthoai']     = $shippingAddress['phone'];    //
        $dataOrder['email']     = $shippingAddress['email'];    //
        $dataOrder['ghichu']     = $shippingAddress['comment'];    //
        $dataOrder['phuongthucthanhtoan']     = $paymentMethod;    //
        $dataOrder['phuongthucgiaohang']     = $shippingMethod;    //

        // Khởi tạo mảng giá trị chi tiết đơn hàng
        $arrCartDetail = [];
        foreach ($productList as $cartItem) {
            $arrDetail['masanpham'] = $cartItem->id;
            $arrDetail['tensanpham'] = $cartItem->name;
            $arrDetail['giatien'] = $cartItem->price;
            $arrDetail['soluong'] = $cartItem->qty;
            $arrDetail['tongtien'] = $cartItem->total;
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
            return redirect()->route('order')->with(['error' =>'Tao don hang that bai']);
        }

        // Set session orderID
        session(['orderID' => $newOrder['orderID']]);

        //
        return (new DonhangController())->completeOrder();
    }

    /*
     *
     *
     * */
    public function completeOrder() {
        // Clear cart store
        $this->clearCartStore();

        // Lấy phiên đơn hàng vừa tạo
        $orderID = session('orderID') ?? 0;

        if ($orderID == 0) {
            return redirect()->route('home', ['error' => 'Error Order ID!']);
        }

        // Process after order compled: send mail, data response ...				// Quá trình sau khi đơn hàng đã được xác nhận
        $dataResponse = $this->processAfterOrderSuccess($orderID);				// b4. Gọi đến hàm processAfterOrderSuccess ở dòng 1145

        return redirect()->route('order.success')->with($dataResponse);
    }

    /*
     *
     *
     * */
    private function clearCartStore() {
        // b1. Kiểm tra dữ liệu trong phiên dataCheckout
        $dataCheckout = session('dataCheckout') ?? '';

        if ($dataCheckout) {
            foreach ($dataCheckout as $key => $row) {
                Cart::instance('order')->remove($row->rowId);    			// b2. Xóa sản phẩm trong giỏ hàng
            }
        }
    }

    /*
     *
     *
     * */
    private function processAfterOrderSuccess (string $orderID)
    {
        //Clear session
        $this->clearSession();
        return $orderID;
    }

    /*
     *
     *
     * */
    private function clearSession()
    {
        session()->forget('paymentMethod'); //destroy paymentMethod
        session()->forget('shippingMethod'); //destroy shippingMethod		// b02. Xoá phiên chứa dữ liệu về phương thức giao hàng
        session()->forget('totalMethod'); //destroy totalMethod			// b03. Xoá phiên chứa dữ liệu về phương thức tổng
        session()->forget('otherMethod'); //destroy otherMethod			// b04. Xoá phiên chứa dữ liệu về một số phương thức khác
        session()->forget('dataTotal'); //destroy dataTotal 			// b05. Xoá phiên chứa dữ liệu về Total
        session()->forget('dataCheckout'); //destroy dataCheckout		// b06. Xoá phiên chứa dữ liệu về Thông tin thanh toán
        session()->forget('storeCheckout'); //destroy storeCheckout		// b07. Xoá phiên chứa dữ liệu về Cửa hàng thanh toán
        session()->forget('dataOrder'); //destroy dataOrder			// b08. Xoá phiên chứa dữ liệu về đơn hàng
        session()->forget('arrCartDetail'); //destroy arrCartDetail		// b09. Xoá phiên chứa dữ liệu về Danh sách sản phẩm trong giỏ hàng
        // session()->forget('orderID'); //destroy orderID				// b10. Xoá phiên chứa dữ liệu về Đơn hàng được tạo
    }

    /**
     *
     *
     * */
    public function getInfoProduct() {
        $id = request()->all();
//        $product = Sanpham::find($id);
        $product = Sanpham::find($id)->first();

        if ($product) {
            $orderItem = Cart::instance('order')->add($product->id, $product->tensanpham, 1, $product->giaban)
                ->associate('App\Models\Sanpham');

            $orderItem->total = $orderItem->qty * $orderItem->price;

            $subTotal = Cart::instance('order')->subtotal();
            $tax = Cart::instance('order')->tax();
            $total = Cart::instance('order')->total();

            return response()->json([
                'data' => $orderItem,
                'subtotal' => $subTotal,
                'tax' => $tax,
                'total' => $total,
                'message' => 'success',
            ]);
        }
    }

    /**
     *
     *
     * */
    public function updateTotal() {
        $data = request()->all();
        $idProduct = $data['id'];

        $product = Sanpham::find($idProduct);

        $id = substr($data['name'], 4);

        if($data['value'] == 0) {
            return response()->json([
                'data' => '',
                'message' => 'Số lượng sản phẩm đã giảm đến mức tối thiểu',
            ]);
        }

        if($data['value'] > $product->soluong) {
            return response()->json([
                'data' => '',
                'qty' => $data['value'],
                'message' => 'Số lượng sản phẩm đã đạt đến giới hạn',
            ]);
        }

        $product = Cart::instance('order')->update($id, $data['value']);

        $product->total = $product->qty * $product->price;

        $subTotal = Cart::instance('order')->subtotal();
        $tax = Cart::instance('order')->tax();
        $total = Cart::instance('order')->total();

        return response()->json([
            'data' => $product,
            'subtotal' => $subTotal,
            'tax' => $tax,
            'total' => $total,
            'message' => 'success',
        ]);
    }

    /**
     *
     *
     * */
    public function deleteItem() {
        $data = request()->all();

        $id = substr($data['name'], 4);

        $product = Cart::instance('order')->remove($id);

        $subTotal = Cart::instance('order')->subtotal();

        $tax = Cart::instance('order')->tax();

        $total = Cart::instance('order')->total();

        return response()->json([
            'data' => true,
            'subtotal' => $subTotal,
            'tax' => $tax,
            'total' => $total,
            'message' => 'success',
        ]);
    }

    /**
     *
     *
     * */
    public function couponApply() {
        $data = request()->all();

        $coupon = Khuyenmai::where('code',$data['code'])->first();
        $total = Cart::instance('order')->total();
        $total = str_replace(',', '', $total); // Loại bỏ dấu phẩy
        $totalValue = (double) $total; // Chuyển đổi thành số thực

        if($coupon && $coupon->type == '%') {
            $totalValue -= $totalValue * (int) $coupon->reward / 100;
        }

        return response()->json([
            'data' => $coupon,
            'total' => number_format($totalValue, 2, '.', ','),
            'message' => 'Success',
        ]);
    }

    /*
     *
     *
     * */
    public function statusOrder() {
        $data = request()->all();

        $id = $data['idOrder'];

        $order = Donhang::find($id);

        if($order && $data['statusOrder'] == 'new') {
            $order->update(['trangthai' =>'processing']);
        }
                       
        return redirect()->back();
    }
}

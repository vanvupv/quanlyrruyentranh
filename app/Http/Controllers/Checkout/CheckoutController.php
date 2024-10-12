<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

// Models
use Cart;
use App\Models\Donhang;
use App\Models\Shipping;
use mysql_xdevapi\Session;

class CheckoutController extends Controller
{

    /*
     * Hiển thị trang thanh toán (Checkout)
     *
     * */
    public function getCheckout() {

        // Lấy thông tin giỏ hàng từ phiên để kiểm tra giỏ hàng
        $cartItems = Cart::instance('cart')->content();

//        $dataCheckout = session('dataCheckout') ?? '';
//
//        if(!$dataCheckout) {
//            return redirect()->route('cart')->with('error', 'Giỏ hàng rỗng');
//        }

        $grandTotal = Cart::subtotal(2, '.', '');
        $total = Cart::instance('cart')->total(2, '.', '');

        // Shipping
        $shippings = Shipping::all();

        // Apply Discount Here
        if (session()->has('code')) {
            $code = session()->get('code');

            if ($code->type == 'percent') {
                $discount = ($code->discount_amount / 100) * $grandTotal;
                $total = $total - $discount;
            } else {
                $discount = $code->discount_amount;
                $total = $total - $discount;
            }
        }

        // Payment

        // Shipping address
        $customer = Auth::user();

        if(!$customer) {
            return redirect()->route('cart')->with('error', 'Bạn chưa đăng nhập. Vui lòng đăng nhập hoăc đăng ký để tiếp tục sử dụng!');
        }

        // Data response
        return view('checkout', [
            'title' => "Thanh toan",
            'cartItems' => $cartItems,
            'shippings' => $shippings,
            'discount' => isset($discount) ? number_format($discount, 2) : 0,
            'total' => number_format($total,2)
        ]);
    }

    /*
     * Tính tiền giao hàng
     *
     * */
    public function getShipping(Request $request) {

        $id = $request->id;

        $shipping = Shipping::find($id);

        $grandTotal = Cart::instance('cart')->total(2,'.','') + $shipping->price;

        // Coupon - Ma giam gia
        $grandTotal = Cart::instance('cart')->subtotal(2,'.','');
        $discount = 0;

        // Apply Discount here
        if (session()->has('code')) {
            $code = session()->get('code');

            if ($code->type == 'percent') {
                $discount = ($code->discount_amount / 100) * $grandTotal;
            } else {
                $discount = $code->discout_amount;
            }
        }

        return response()->json([
            'status' => true,
            'data' => number_format($shipping->price, 2),
            'discount' => $discount,
            'total' => number_format($grandTotal,2)
        ]);
    }

    /*
     * Hiển thị trang thanh toán (Checkout)
     *
     * */
    public function getOrderSummery(Request $request) {

        // Coupon - Ma giam gia
        $grandTotal = Cart::instance('cart')->subtotal(2,'.','');
        $total = Cart::instance('cart')->total(2,'.','');
        $discount = 0;
        $discountHtml = '';

        // Apply Discount here
        if (session()->has('code')) {
            $code = session()->get('code');

            if ($code->type == 'percent') {
                $discount = ($code->discount_amount / 100) * $grandTotal;
                $total = $total - $discount;
            } else {
                $discount = $code->discount_amount;
                $total = $total - $discount;
            }

            $discountHtml = '<div class="input-group mt-4" id="discount-response">
                    <strong>'.session()->get('code')->code.'</strong>
                    <a class="btn btn-sm btn-danger">
                        <i class="fa fa-times" id="remove-discount"></i>
                    </a>
                </div>';

            return response()->json([
                'status' => true,
                'discount' => $discount,
                'discountHtml' => $discountHtml,
                'total' => number_format($total,2)
            ]);
        } else {
            return response()->json([
                'status' => true,
                'discount' => number_format($discount, 2),
                'discountHtml' => $discountHtml,
                'total' => number_format($total,2)
            ]);
        }
    }

    /*
     * Tinh tien khuyen mai
     *
     * */
    public function getCoupon(Request $request) {

        $code = $request->code;

        $codeCoupon = Discount::where('code', $code)->first();

        if ($codeCoupon == null) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid discount coupon'
            ]);
        }

        // Check if coupon start date is valid or not
        $now = Carbon::now();

        if ($codeCoupon->starts_at != "") {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $codeCoupon->starts_at);

            if ($now->lt($startDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon start'
                ]);
            }
        }

        // Check if coupon end date is valid or not
        if ($codeCoupon->expires_at != "") {
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $codeCoupon->expires_at);

            if ($now->gt($endDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon end'
                ]);
            }
        }

        // Max Uses Coupon Check
        if ($codeCoupon->max_uses > 0) {
            $couponUser = Donhang::where('giamgia', $codeCoupon->id)->count();

            if ($couponUser >= $codeCoupon->max_uses) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon'
                ]);
            }
        }

        // Max Uses User Check
        if ($codeCoupon->max_uses_user > 0) {
            $couponUsedByUser = Donhang::where(['giamgia' => $codeCoupon->id,'makhachhang' => Auth::user()->id])->count();

            if ($couponUsedByUser >= $codeCoupon->max_uses_user) {
                return response()->json([
                    'status' => false,
                    'message' => 'You already used this coupon code'
                ]);
            }
        }

        $subTotal = Cart::subtotal(2, '.', '');
        
        // Min amount condition check
        if ($codeCoupon->min_amount > 0) {
            if ($subTotal < $codeCoupon->min_amount) {
                return response()->json([
                    'status' => false,
                    'message' => 'Your min amount be $'.$codeCoupon->min_amount,
                ]);
            }
        }

        // Apply success
        session()->put('code', $codeCoupon);

        return $this->getOrderSummery($request);
    }

    /*
     *
     *
     * */
    public function removeCoupon(Request $request) {
        session()->forget('code');

        return $this->getOrderSummery($request);
    }

    /*
     * Kiểm tra request được gửi lên từ giỏ hàng
     *
     * */
    public function prepareCheckout(Request $request) {
        // kiểm tra đăng nhập
        $customer = Auth::user();

        if(!$customer) {
            return redirect()->route('login');
        }

        $data = $request->all();

        $cartItems = Cart::instance('cart')->content();

        if(!$cartItems) {
            return redirect()->route('cart');
        }

//        $cartItems = unserialize($cartDetail->content);

        // Kiểm tra số lượng của từng sản phẩm

        //Set session - Thiết lập phiên lưu trữ thông tin giỏ hàng
        session(['dataCheckout' => $cartItems]);

        return redirect()->route('checkout');
    }

    /*
     *
     *
     * */
    public function processCheckout(Request $request) {
        // Kiem tra gio hang rong
        $dataCheckout  = session('dataCheckout') ?? '';

        if (!$dataCheckout) {
            return redirect()->route('cart')->with(['error' => 'Gio hang rong']);
        }

        // Kiem tra khach hang phai dang nhap
        $customer = auth()->user();

        if (!$customer) {
            return redirect()->route('login')->with('error', 'Yêu cầu đăng nhập');
        }

        $data = request()->all();

        // Validate dữ liệu đầu vào

        //Set session shippingMethod
        session(['shippingMethod' => request('shippingMethod')]);

        //Set session paymentMethod
        session(['paymentMethod' => request('paymentMethod')]);

        //Set session address process
        session(['address_process' => request('address_process')]);

        //Set session shippingAddress
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

        return redirect()->route('checkout.confirm');
    }

    /*
     * Hiển thị giao diện xác nhận thanh toán
     *
     *
     * */
    public function getCheckoutConfirmFront() {
        // Address Shipping
        $shippingAddress = session('shippingAddress') ?? '';

        // Shipping method
        $shippingMethod = session('shippingMethod') ?? '';

        // Payment method
        $paymentMethod = session('paymentMethod') ?? '';

        //


        //
        return view('checkoutConfirm', [
            'title'              => 'checkout.page_title',
            'cart'               => session('dataCheckout'),
            'paymentMethodData'  => $shippingMethod,
            'shippingMethodData' => $paymentMethod,
            'shippingAddress'    => $shippingAddress,
        ]);
    }

    /*
     *
     *
     * */
    public function onlineCheckout() {
        //
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl =  route('checkout.store');  // "http://127.0.0.1:8000/admin/phieuphat/";
        $vnp_TmnCode = "YSX38442";  //Mã website tại VNPAY
        $vnp_HashSecret = "UFUPVCJHQOHAXNCZZNHKJPKNYGDJZGAH"; //Chuỗi bí mật
        //
        $vnp_TxnRef =  rand(00, 9999);  // $_POST['order_id'] Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
//        $vnp_TxnRef = $_POST['order_id'];
        $vnp_OrderInfo = "Noi dung thanh toan"; // $_POST['order_desc']
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = ((int)$_POST['money']) * 1000;

        dd($vnp_Amount);
        //
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
//        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
//        $vnp_Bill_Email = $_POST['txt_billing_email'];
//        $fullName = trim($_POST['txt_billing_fullname']);
//        if (isset($fullName) && trim($fullName) != '') {
//            $name = explode(' ', $fullName);
//            $vnp_Bill_FirstName = array_shift($name);
//            $vnp_Bill_LastName = array_pop($name);
//        }
//        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
//        $vnp_Bill_City = $_POST['txt_bill_city'];
//        $vnp_Bill_Country = $_POST['txt_bill_country'];
//        $vnp_Bill_State = $_POST['txt_bill_state'];
//        // Invoice
//        $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
//        $vnp_Inv_Email = $_POST['txt_inv_email'];
//        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
//        $vnp_Inv_Address = $_POST['txt_inv_addr1'];
//        $vnp_Inv_Company = $_POST['txt_inv_company'];
//        $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
//        $vnp_Inv_Type = $_POST['cbo_inv_type'];
        //
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

            //
//            "vnp_ExpireDate" => $vnp_ExpireDate,
//            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
//            "vnp_Bill_Email" => $vnp_Bill_Email,
//            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
//            "vnp_Bill_LastName" => $vnp_Bill_LastName,
//            "vnp_Bill_Address" => $vnp_Bill_Address,
//            "vnp_Bill_City" => $vnp_Bill_City,
//            "vnp_Bill_Country" => $vnp_Bill_Country,
//            "vnp_Inv_Phone" => $vnp_Inv_Phone,
//            "vnp_Inv_Email" => $vnp_Inv_Email,
//            "vnp_Inv_Customer" => $vnp_Inv_Customer,
//            "vnp_Inv_Address" => $vnp_Inv_Address,
//            "vnp_Inv_Company" => $vnp_Inv_Company,
//            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
//            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
//        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
//        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    /*
     * Tạo đơn hàng
     *
     *  */
    public function addOrder() {
        // Kiểm tra trạng thái đăng nhập
        $customer = auth()->user();

        if ( !$customer) {
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập');
        }

        // Kiểm tra phiên lưu giỏ hàng
        if (count(session('dataCheckout', [])) == 0) {
            return redirect()->route('home')->with('error', 'Giỏ hàng rỗng');
        }

        $data = request()->all();

        if (!$data) {
            return redirect()->route('cart');
        } else {
            $shippingAddress = session('shippingAddress') ?? [];    // Địa chỉ giao hàng
            $paymentMethod   = session('paymentMethod') ?? '';      // Phương thức thanh toán
            $shippingMethod  = session('shippingMethod') ?? '';     // Phương thức giao hàng
            $dataCheckout    = session('dataCheckout') ?? '';       // Danh sách sản phẩm đơn hàng
        }

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
        $dataOrder['hoten']     = $shippingAddress['first_name'];    //
        $dataOrder['diachi']     = $shippingAddress['address'];    //
        $dataOrder['sodienthoai']     = $shippingAddress['phone'];    //
        $dataOrder['email']     = $shippingAddress['email'];    //
        $dataOrder['ghichu']     = $shippingAddress['comment'];    //
        $dataOrder['phuongthucthanhtoan']     = $paymentMethod;    //
        $dataOrder['phuongthucgiaohang']     = $shippingMethod;    //

        // Khởi tạo mảng giá trị chi tiết đơn hàng
        $arrCartDetail = [];
        foreach ($dataCheckout as $cartItem) {
            $arrDetail['masanpham'] = $cartItem->id;
            $arrDetail['tensanpham'] = $cartItem->name;
            $arrDetail['giatien'] = $cartItem->price;
            $arrDetail['soluong'] = $cartItem->qty;
            $arrDetail['tongtien'] = $cartItem->price * $cartItem->qty;
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

        // Ngược lại gọi đến hàm completeOrder() ở dòng 1018
        return (new CheckoutController())->completeOrder();

    }

    /*
     *
     *
     * */
    public function orderSuccessProcessFront()
    {
        // b01. Nếu đơn hàng tạo thất bại
        if (!session('orderID')) {
            return redirect()->route('home');
        }

        // b03. Lấy đơn hàng kèm chi tiết đơn hàng
        $orderInfo = Donhang::with('chitietdonhang')->find(session('orderID'))->toArray();

        session()->forget('orderID');

        return view('order-success', [
                'title'       => '',
                'orderInfo'   => $orderInfo,
            ]
        );
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
                // b2. Xóa sản phẩm trong giỏ hàng
                Cart::instance('cart')->remove($row->rowId);
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
}

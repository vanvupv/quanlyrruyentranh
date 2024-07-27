@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
           {{session('message')}}
        </div>
    @endif

    <h2>CHI TIẾT ĐƠN HÀNG</h2>
    <!-- -->
    <!-- Order -->
    <div class="mb-4 row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN ĐƠN HÀNG</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="h6">Mã đơn hàng:</span>
                                <span>{{$order->id}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Ngày tạo đơn:</span>
                                <span>{{\Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Ghi chú:</span>
                                <span>{{$order->ghichu}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Phương thức Giao hàng:</span>
                                <span>{{$order->phuongthucgiaohang}}</span>
                            </li>
                            <li>
                                <span class="h6">Phương thức Thanh toán:</span>
                                <span>{{$order->phuongthucthanhtoan}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN KHÁCH HÀNG</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="h6">Mã Khách hàng:</span>
                                <span>{{$order->khachhang->id}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Tên khách hàng:</span>
                                <span>{{$order->khachhang->tenkhachhang}}</span>
                            </li>

                            <li class="mb-2">
                                <span class="h6">Status:</span>
                                <span class="badge bg-label-success rounded-pill">{{$order->khachhang->trangthaihoatdong}}</span>
                            </li>
                            <li>
                                <span class="h6">Địa chỉ Email:</span>
                                <span>{{$order->khachhang->email}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Order -->

    <!-- DetailTable -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">CHI TIẾT ĐƠN HÀNG</h5>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr class="border-bottom">
                        <th>STT</th>
                        <th>SKU</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order->chitietdonhang as $id => $item)
                    <tr>
                        <td>
                            {{ ++$id }}
                        </td>
                        <td>
                            {{$item->sanpham->sku}}
                        </td>
                        <td>
                            {{$item->sanpham->tensanpham}}
                        </td>
                        <td>
                            {{$item->soluong}}
                        </td>
                        <td>
                            {{number_format($item->giatien)}}
                        </td>
                        <td>
                            {{number_format($item->tongtien)}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- / DetailTable -->

    <!-- Detail Shipping -->
    <div class="mb-4 row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN GIAO HÀNG</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="h6">Mã đơn hàng:</span>
                                <span>{{$order->id}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Ngày tạo đơn:</span>
                                <span>{{\Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Ghi chú:</span>
                                <span>{{$order->ghichu}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Phương thức Giao hàng:</span>
                                <span>{{$order->phuongthucgiaohang}}</span>
                            </li>
                            <li>
                                <span class="h6">Phương thức Thanh toán:</span>
                                <span>{{$order->phuongthucthanhtoan}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN THANH TOÁN</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="h6">Mã Khách hàng:</span>
                                <span>{{$order->khachhang->id}}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Tên khách hàng:</span>
                                <span>{{$order->khachhang->tenkhachhang}}</span>
                            </li>

                            <li class="mb-2">
                                <span class="h6">Status:</span>
                                <span class="badge bg-label-success rounded-pill">{{$order->khachhang->trangthaihoatdong}}</span>
                            </li>
                            <li>
                                <span class="h6">Địa chỉ Email:</span>
                                <span>{{$order->khachhang->email}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Detail Shipping -->

    <!-- Total Order -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">TỔNG TIỀN</h5>
        </div>
        <hr class="m-0">
        <div class="card-body">
            <div class="info-container">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <span class="h6">Tổng tiền hàng:</span>
                        <span>{{number_format($order->tienhang) }}</span>
                    </li>
                    <li class="mb-2">
                        <span class="h6">Tiền giao hàng:</span>
                        <span>{{number_format($order->tiengiaohang)}}</span>
                    </li>
                    <li class="mb-2">
                        <span class="h6">Giảm giá:</span>
                        <span>{{$order->giamgia}}</span>
                    </li>
                    <li class="mb-2">
                        <span class="h6">Thuế:</span>
                        <span>{{number_format($order->tienthue)}}</span>
                    </li>
                    <li>
                        <span class="h6">Tổng tiền:</span>
                        <span>{{number_format($order->tongtien)}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Total Order -->

    <!-- -->
    <div class="mb-4">
        @if ($order->trangthai == \App\Models\Donhang::DONE && $order->trangthai == \App\Models\Donhang::CANCELED)
            <div>
                Đơn hàng đã hoàn thành
            </div>
        @elseif($order->trangthai == \App\Models\Donhang::CANCELED)
            <div class="">
                Đơn hàng đã hủy thành công
            </div>
        @else
            @if ($order->trangthai != \App\Models\Donhang::NEW && $order->trangthai != \App\Models\Donhang::DONE)
                <a href="{{ route('order.status', $order->id) }}?status={{ \App\Models\Donhang::DONE }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc hành động này là gì?')"> Hoàn thành </a>
                <a href="{{ route('order.status', $order->id) }}?status={{ \App\Models\Donhang::CANCELED }}" class="btn btn-warning" onclick="return confirm('Bạn có chắc hành động này là gì?')">Hủy</a>
            @elseif($order->trangthai == \App\Models\Donhang::NEW )
                <a href="{{ route('order.status', $order->id) }}?status={{ \App\Models\Donhang::PROCESSING }}" class="btn btn-warning" onclick="return confirm('Bạn có chắc hành động này là gì?')"> Xác Nhận </a>
                <a href="{{ route('order.status', $order->id) }}?status={{ \App\Models\Donhang::CANCELED }}" class="btn btn-warning" onclick="return confirm('Bạn có chắc hành động này là gì?')"> Hủy </a>
            @else
                <div>
                    DON HANG DA HOAN THANH
                </div>
            @endif
        @endif
    </div>
    <!-- / -->
@endsection


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
        <!-- Card Phiếu Mượn -->
        <div class="col-12 col-lg-8">
            <!-- Card Thông Tin Phiếu -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN ĐƠN HÀNG</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="row mb-3">
                        <!-- Mã Phiếu -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" name="tentheloai" class="form-control" id="maphieu_phieumuon" value="{{$order->id}}" disabled>
                                <label for="tentheloai">Mã đơn hàng</label>
                            </div>
                        </div>
                        <!-- / Mã Phiếu -->
                        <!-- Ngày Tạo -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" name="ngaytao" class="form-control" value="{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}">
                                <label for="ngaytao">Ngày Tạo</label>
                            </div>
                        </div>
                        <!-- / Ngày Tạo -->
                    </div>
                    <!-- Ghi Chú -->
                    <div class="col-12 mb-4">
                        <div class="col-md-12">
                            <label for="ghichu">Ghi chú:</label>
                            <textarea  class="form-control" name="ghichu" id="ghichu">{{ $order->ghichu }}</textarea>
                        </div>
                    </div>
                    <!-- / Ghi Chú -->
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN KHÁCH HÀNG</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="info-container">
                                <input type="hidden" name="Idkhachhang" id="Idkhachhang" value="{{$order->manhanvien}}">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <span class="h6">Username:</span>
                                        <span>{{$order->khachhang->tenkhachhang}}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6">Mã Độc Giả:</span>
                                        <span>{{$order->khachhang->id}}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="h6">Status:</span>
                                        <span class="badge bg-label-success rounded-pill">{{$order->khachhang->trangthaihoatdong}}</span>
                                    </li>
                                    <li>
                                        <span class="h6">Role:</span>
                                        <span>Reader</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="user-avatar-section">
                                <div class=" d-flex align-items-center flex-column">
{{--                                    <img class="img-fluid rounded mb-4" src="{{asset('assets/images/Image_Chandung.jpg')}}" height="120" width="120"--}}
{{--                                         alt="User avatar">--}}
                                    <div class="user-info text-center">
                                        <h5>{{$order->khachhang->tenkhachhang}}</h5>
                                        <span class="badge bg-label-danger rounded-pill">Reader</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <hr class="m-0">
        <div class="card-body p-0 m-0">
            <table class="table">
                <thead>
                    <tr>
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

    <!-- Total Order -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">TỔNG TIỀN</h5>
        </div>
        <hr class="m-0">
        <div class="card-body p-0 m-0">
          <div>
              {{ number_format($order->tienhang) }}
          </div>
            <div>
                {{ number_format($order->tiengiaohang) }}
            </div>
            <div>
                {{ $order->giamgia }}
            </div>
            <div>
                {{ number_format($order->tienthue) }}
            </div>
            <div>
                {{ number_format($order->tongtien) }}
            </div>
        </div>
    </div>
    <!-- /Total Order -->

    <!-- Status Order -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">TỔNG TIỀN</h5>
        </div>
        <hr class="m-0">
        <div class="card-body p-0 m-0">
            <div>
                Trang thai giao hang: {{ $order->trangthaigiaohang }}
            </div>
            <div>
                Trang thai thanhtoan: {{ $order->trangthaithanhtoan }}
            </div>
          <div>
                Trang thai don hang: {{ $order->trangthai }}
          </div>
        </div>
    </div>
    <!-- / -->

    <!-- -->
    <form action="{{route('order.status')}}" method="POST">
        @csrf
        <div>
            <input type="hidden" name="idOrder" value="{{ $order->id }}">
            <input type="hidden" name="statusOrder" value="{{ $order->trangthai }}">
            <input type="submit" value="Xac nhan don hang" class="btn btn-warning">
        </div>
        <div>
            <input type="submit" value="Huy don hang" class="btn btn-danger">
        </div>
    </form>
    <!-- / -->


@endsection


@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
           {{session('message')}}
        </div>
    @endif

    <h2>Chi Tiết Phiếu Mượn</h2>
    <!-- -->
    <div class="mb-4 row">
        <!-- Card Phiếu Mượn -->
        <div class="col-12 col-lg-8">
            <!-- Card Thông Tin Phiếu -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN PHIẾU MƯỢN</h5>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="row mb-3">
                        <!-- Mã Phiếu -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" name="tentheloai" class="form-control" id="maphieu_phieumuon" value="" disabled>
                                <label for="tentheloai">Mã Phiếu Mượn</label>
                            </div>
                        </div>
                        <!-- / Mã Phiếu -->
                        <!-- Ngày Tạo -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" name="ngaytao" class="form-control"  value="">
                                <label for="ngaytao">Ngày Tạo</label>
                            </div>
                        </div>
                        <!-- / Ngày Tạo -->
                    </div>
                    <!-- Ghi Chú -->
                    <div class="col-12 mb-4">
                        <div class="col-md-12">
                            <label for="ghichu">Ghi chú:</label>
                            <textarea  class="form-control" name="ghichu" id="ghichu" >  </textarea>
                        </div>
                    </div>
                    <!-- / Ghi Chú -->
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">THÔNG TIN ĐỘC GIẢ</h5>
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

    <!-- DetailTable -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">THÔNG TIN SÁCH MƯỢN</h5>
        </div>
        <hr class="m-0">
        <div class="card-body p-0 m-0">
            <table class="table">
                <thead>
                <tr>
                    <th>SKU</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Vị Tính</th>
                    <th>Mô tả</th>
                    <th>Số lượng</th>
                    <th> Giá tiền </th>
                    <th> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->chitietdonhang as $id => $item)
                    <tr>
                        <td>
                            {{$item->sanpham->SKU}}
                        </td>
                        <td>
                            {{$item->sanpham->tensanpham}}
                        </td>
                        <td>
                            {{$item->sanpham->donvitinh}}
                        </td>
                        <td>
                            {{$item->sanpham->mota}}
                        </td>
                        <td>
                            {{$item->soluong}}
                        </td>
                        <td>
                            {{$item->giatien}}
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="renewDetailBook btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="modal" data-bs-target="#detailRenewModal">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="renewBookBook btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="modal" data-bs-target="#detailModal">
                                <i class="bi bi-backpack4"></i>
                            </a>
                        </td>
                        <input type="hidden" name="phieumuonID" data-id="{{$item->madonhang}}">
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- / DetailTable -->

    <!-- Route -->
{{--    <input type="hidden" name="routeDetail" data-value="{{route('renewal.info')}}">--}}
{{--    <input type="hidden" name="routeBorrowDetail" data-value="{{route('borrow.details')}}">--}}
{{--    <input type="hidden" name="routeRenewBook" data-value="{{route('phieumuon.renew')}}">--}}
    <!-- / Route -->

    <!-- Modal Thông Tin Phiếu Mượn -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Thông Tin Gia Hạn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body detailRenewModal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="closeRenew btn btn-secondary" data-bs-dismiss="modal"> Đóng </button>
                    <button type="button" class="saveRenew btn btn-secondary" data-bs-dismiss="modal"> Gia hạn </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Chi Tiết Phiếu Mượn -->
    <div class="modal fade" id="detailRenewModal" tabindex="-1" aria-labelledby="detailRenewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailRenewModalLabel">CHI TIẾT GIA HẠN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body detailRenewBookModal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="closeRenew btn btn-secondary" data-bs-dismiss="modal"> Đóng </button>
                </div>
            </div>
        </div>
    </div>
@endsection


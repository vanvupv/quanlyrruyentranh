@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header">Danh Sách Đầu Sách</h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('sanpham.add')}}" class="btn btn-primary waves-effect waves-light" >
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Add New Book </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table id="BookTable" class="listTable__table table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Vị Tính</th>
                        <th>Giá Bán</th>
                        <th>Ảnh</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($sanphams)
                        @foreach($sanphams as $index => $item)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$item->masanpham}}</td>
                                <td>{{$item->tensanpham}}</td>
                                <td>
                                    @if($item->soluong > 0)
                                        {{$item->soluong}}
                                    @else
                                        <span class="badge rounded-pill bg-label-danger">Hết Hàng</span>
                                    @endif
                                </td>
                                <td>{{$item->DonViTinh}}</td>
                                <td>{{$item->GiaBan}}</td>
                                <td>
                                    <div class="avatarImg">
                                        <img src="{{asset($item->anhbia)}}" alt="{{$item->tensach}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="actionFunc">
                                        <a href="{{route('sanpham.detail',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Preview">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{route('sanpham.edit',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="{{route('sanpham.delete',['id' => $item->id])}}" data-route="{{route('sanpham.delete',['id' => $item->id])}}"  data-id-book="{{$item->id}}" class="deleteBookList btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a href="{{route('sanpham.detail',['id' => $item->id])}}" class="dropdown-item view-record">
                                                <i class="bi bi-eye"></i>
                                                <span>View</span>
                                            </a>
                                            <a href="{{route('sanpham.edit',['id' => $item->id])}}" class="dropdown-item edit-record">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a href="#" class="dropdown-item delete-record">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Danh Sách Khách Hàng </h5>
    <hr class="my-0">
    <div class="listTable__add add-new">
        <a href="{{route('khachhang.add')}}" class="btn btn-primary waves-effect waves-light" >
            <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
            <span class="d-none d-sm-inline-block"> Add New Customer </span>
        </a>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <div class="card-datatable text-nowrap">
            <table id="CustomerTable" class="listTable__table table table-bordered">
                <thead>
                <tr>
                    <th>Mã Độc Giả</th>
                    <th>Tên Độc Giả</th>
                    <th>Số Điện Thoại</th>
                    <th>Trạng Thái</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($khachhangs)
                    @foreach($khachhangs as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->tenkhachhang}}</td>
                            <td>{{$item->sodienthoai}}</td>
                            <td>
                                @if($item->trangthaihoatdong === 1)
                                    <span class="badge rounded-pill bg-label-info">Active</span>
                                @else
                                    <span class="badge rounded-pill bg-label-danger">No Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="actionFunc">
                                    <a data-id-category="{{$item->id}}" class="detailCategoryModal btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect"
                                       data-bs-toggle="modal"  data-bs-target="#detailCategoryModal_{{$item->id}}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('khachhang.edit',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{route('khachhang.edit',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                        <a href="{{route('khachhang.detail',['id' => $item->id])}}" class="dropdown-item view-record">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                        <a href="{{route('khachhang.edit',['id' => $item->id])}}" class="dropdown-item edit-record">
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
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


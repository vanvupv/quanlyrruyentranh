@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> Danh Sách Khuyến Mại </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('khuyenmai.add')}}" class="btn btn-primary waves-effect waves-light" >
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Add New Coupon </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table id="Coupon-table" class="listTable__table table table-bordered">
                    <thead>
                    <tr>
                        <th> Mã Khuyến Mại </th>
                        <th> Tên </th>
                        <th> Mô tả </th>
                        <th> Số lần dùng tối đa </th>
                        <th> Số người dùng tối đa </th>
                        <th> Kiểu </th>
                        <th> Giá giảm </th>
                        <th> Giá thấp nhất </th>
                        <th> Ngày bắt đầu </th>
                        <th> Ngày kết thúc </th>
                        <th> Trạng thái </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($discounts->isNotEmpty())
                        @foreach($discounts as $item)
                            <tr>
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->desc}}</td>
                                <td>{{$item->max_uses}}</td>
                                <td>{{$item->max_uses_user}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->discount_amount}}</td>
                                <td>{{$item->min_amount}}</td>
                                <td>{{$item->starts_at}}</td>
                                <td>{{$item->expires_at}}</td>
                                <td>
                                    @if($item->status === 1)
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
                                        <a href="{{route('khuyenmai.edit', $item->id)}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('khuyenmai.edit', $item->id)}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a href="{{route('khuyenmai.edit', $item->id)}}" class="dropdown-item view-record">
                                                <i class="bi bi-eye"></i>
                                                <span>View</span>
                                            </a>
                                            <a href="{{route('khuyenmai.edit', $item->id)}}" class="dropdown-item edit-record">
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


@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> DANH SÁCH NHÀ XUẤT BẢN </h5>

        <div class="listTable__add add-new">
            <a class="addCategoryModal btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Thêm Nhà Xuất Bản </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table id="BookTable" class="listTable__table table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th> Tên Nhà Xuất Bản </th>
                        <th>Mô Tả</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($nhaxuatbans)
                        @foreach($nhaxuatbans as $id => $nhaxuatban)
                            <tr>
                                <td>{{++$id}}</td>
                                <td>{{$nhaxuatban->tennxb}}</td>
                                <td>{!! $nhaxuatban->gioithieunxb !!}</td>
                                <td>
                                    <div class="actionFunc">
                                        <a data-id-category="{{$nhaxuatban->id}}" href="{{route('nhaxuatban.detail',['id' => $nhaxuatban->id])}}" class="detailCategoryModal btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect"
                                           data-bs-toggle="modal"  data-bs-target="#detailCategoryModal_{{$nhaxuatban->id}}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{route('nhaxuatban.edit',['id' => $nhaxuatban->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('nhaxuatban.delete',['id' => $nhaxuatban->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a href="{{route('nhaxuatban.detail',['id' => $nhaxuatban->id])}}" class="dropdown-item view-record">
                                                <i class="bi bi-eye"></i>
                                                <span>View</span>
                                            </a>
                                            <a href="{{route('nhaxuatban.edit',['id' => $nhaxuatban->id])}}" class="dropdown-item edit-record">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a href="{{route('nhaxuatban.delete',['id' => $nhaxuatban->id])}}" class="dropdown-item delete-record">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- -->

                            <div class="modal fade" id="detailCategoryModal_{{$nhaxuatban->id}}" tabindex="-1" aria-labelledby="detailCategoryModalLabel_{{$nhaxuatban->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailCategoryModalLabel_{{$nhaxuatban->id}}"> Chi Tiết Nhà Xuất Bản </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="info-container">
                                                <ul class="list-unstyled mb-6">
                                                    <li class="mb-2">
                                                        <span class="h6"> Mã Nhà Xuất Bản: </span>
                                                        <span>{{$nhaxuatban->id}}</span>
                                                    </li>
                                                    <li class="mb-2">
                                                        <span class="h6"> Tên Nhà Xuất Bản: </span>
                                                        <span>{{$nhaxuatban->tennxb}}</span>
                                                    </li>
                                                    <li class="mb-2">
                                                        <span class="h6"> Mô tả: </span>
                                                        <span>{!! $nhaxuatban->gioithieunxb !!}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="closeTheLoai btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Modal Detail -->
                            <!-- -->
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('nhaxuatban.store')}}" method="POST" id="quickForm" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel"> Thêm Nhà Xuất Bản </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('share.error')
                        <div class="card-body mt-2">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" name="tennxb" class="form-control" id="tennxb" placeholder="Nhập tên Nhà Xuất Bản...">
                                <label for="tennxb"> Tên Nhà Xuất Bản </label>
                            </div>
                            <div class="form-group">
                                <label for="mota" class="mb-2"> Mô Tả </label>
                                <textarea name="mota" id="mota" rows="10" cols="50"> </textarea>
                                <script>
                                    CKEDITOR.replace( 'mota' );
                                </script>
                            </div>
                        </div>
                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closeBook btn btn-secondary" data-bs-dismiss="modal"> Đóng </button>
                        <button type="submit" class="saveBook btn btn-primary"> Thêm Mới </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


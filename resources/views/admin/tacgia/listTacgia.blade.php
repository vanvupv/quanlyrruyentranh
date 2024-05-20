@extends('admin.main')
@section('content')

<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> DANH SÁCH TÁC GIẢ </h5>

    <div class="listTable__add add-new">
        <a class="addCategoryModal btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
            <span class="d-none d-sm-inline-block"> Thêm Tác Giả </span>
        </a>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <div class="card-datatable text-nowrap">
            <table id="BookTable" class="listTable__table table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tác Giả</th>
                    <th>Mô Tả</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($tacgias)
                    @foreach($tacgias as $id => $tacgia)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$tacgia->hotentg}}</td>
                            <td>{!! $tacgia->gioithieu !!}</td>
                            <td>
                                <div class="actionFunc">
                                    <a data-id-category="{{$tacgia->id}}" href="{{route('tacgia.detail',['id' => $tacgia->id])}}" class="detailCategoryModal btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect"
                                       data-bs-toggle="modal"  data-bs-target="#detailCategoryModal_{{$tacgia->id}}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('tacgia.edit',['id' => $tacgia->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{route('tacgia.delete',['id' => $tacgia->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                        <a href="{{route('tacgia.detail',['id' => $tacgia->id])}}" class="dropdown-item view-record">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                        <a href="{{route('tacgia.edit',['id' => $tacgia->id])}}" class="dropdown-item edit-record">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a href="{{route('tacgia.delete',['id' => $tacgia->id])}}" class="dropdown-item delete-record">
                                            <i class="bi bi-trash"></i>
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- -->
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailCategoryModal_{{$tacgia->id}}" tabindex="-1" aria-labelledby="detailCategoryModalLabel_{{$tacgia->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailCategoryModalLabel_{{$tacgia->id}}"> Chi Tiết Tác Giả </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="info-container">
                                            <ul class="list-unstyled mb-6">
                                                <li class="mb-2">
                                                    <span class="h6"> Mã Tác Giả: </span>
                                                    <span>{{$tacgia->id}}</span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6"> Tên Tác Giả: </span>
                                                    <span>{{$tacgia->hotentg}}</span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6"> Mô tả: </span>
                                                    <span>{!! $tacgia->gioithieu !!}</span>
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

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('tacgia.store')}}" method="POST" id="quickForm" novalidate="novalidate" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel"> Thêm Tác Giả </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body mt-2">
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" name="tentacgia" class="form-control" id="tentacgia" placeholder="Nhập tên Tác giả...">
                            <label for="tentacgia"> Tên Tác Giả </label>
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
                    <button type="button" class="closeTacgiaBook btn btn-secondary" data-bs-dismiss="modal"> Đóng </button>
                    <button type="submit" class="saveTacgiaBook btn btn-primary">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



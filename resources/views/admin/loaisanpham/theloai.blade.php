@extends('admin.main')
@section('content')

    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> DANH SÁCH THỂ LOẠI </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a class="addCategoryBtn btn btn-primary waves-effect waves-light" data-href="{{route('theloai.store')}}" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Thêm Mới </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table id="category-table" class="listTable__table table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh bìa</th>
                        <th>Tên Thể Loại</th>
                        <th>thể loại cha</th>
                        <th>Mô Tả</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($theloais)
                        @foreach($theloais as $id => $theloai)
                            <tr>
                                <td>{{++$id}}</td>
                                <td>
                                    <img src="{{$theloai->anhbia}}" alt="{{$theloai->tenloai}}" class="w-50">
                                </td>
                                <td>{{$theloai->tenloai}}</td>
                                <td>
                                    @if($theloai->parent_id == 0)
                                        {{"ROOT"}}
                                    @else
                                        {{$theloai->parentCategory->tenloai}}
                                    @endif
                                </td>
                                <td>{!! $theloai->mota !!}</td>
                                <td>
                                    <div class="actionFunc">
                                        <a data-id-category="{{$theloai->id}}" href="{{route('theloai.detail',['id' => $theloai->id])}}" class="detailCategoryModal btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect"
                                           data-bs-toggle="modal"  data-bs-target="#addCategoryModal">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a data-href="{{route('theloai.edit',['id' => $theloai->id])}}"
                                           class="categoryEdit btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect"
                                           data-bs-toggle="modal"  data-bs-target="#addCategoryModal" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{route('theloai.delete',['id' => $theloai->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a href="{{route('theloai.detail',['id' => $theloai->id])}}" class="dropdown-item view-record">
                                                <i class="bi bi-eye"></i>
                                                <span>View</span>
                                            </a>
                                            <a href="{{route('theloai.edit',['id' => $theloai->id])}}" class="dropdown-item edit-record">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a href="{{route('theloai.delete',['id' => $theloai->id])}}" class="dropdown-item delete-record">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- -->
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add Category -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addCategoryForm" novalidate="novalidate" enctype="multipart/form-data" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel"> THÊM THỂ LOẠI </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="addCategoryModal card-body mt-2">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" name="tentheloai" class="form-control" id="tentheloai" placeholder="Nhập tên Thể loại... ">
                                <label for="tentheloai">Tên Thể Loại</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-3">
                                <select name="parent_category" id="parent_category">
                                    @if($danhmucs)
                                        <option value="0"> ROOT </option>
                                        @foreach($danhmucs as $id => $theloai)
                                            <option value={{$id}}>{{$theloai}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="motatheloai" class="mb-2"> Mô Tả </label>
                                <textarea name="motatheloai" id="motatheloai" rows="10" cols="50"> </textarea>
                                <script>
                                    CKEDITOR.replace( 'motatheloai' );
                                </script>
                            </div>

                            <!-- Media -->
                            <div class="imageEdit card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 card-title">Product Image</h5>
                                    <a href="javascript:void(0);" class="fw-medium" id="lfm" data-input="thumbnail" data-preview="holder">Add media from URL</a>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <div id="holder" style="margin-top:15px;max-height:100px;">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                    <input id="thumbnail" class="form-control" type="hidden" name="anhbia">
                                    <p class="h4 needsclick my-2 text-center">Drag and drop your image here</p>
                                    <small class="text-muted d-block fs-6 my-2 text-center">or</small>
                                    <div class="d-flex justify-content-center">
                                        <span class="needsclick btn btn-sm btn-outline-primary waves-effect" id="btnBrowse">Browse image</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Include File Manager JS -->
                            <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
                            <script>
                                // Initialize the file manager button
                                $('#lfm').filemanager('image');
                            </script>
                            <!-- /Media -->
                        </div>
                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closeTheloaiBook btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="saveTheloaiBook btn btn-primary">Thêm Mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Category -->
    <div class="modal fade" id="detailCategoryModal" tabindex="-1" aria-labelledby="detailCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailCategoryModalLabel"> Chi Tiết Thể Loại </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detailCategoryModal info-container">
                        <!-- -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="closeTheLoai btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal Detail -->
@endsection




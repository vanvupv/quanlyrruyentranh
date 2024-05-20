@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{session('message')}}
        </div>
    @endif
<div id="lapphieuCard" class="lapphieumuon">
    <h1 class="text-center mb-4"> LẬP PHIẾU MƯỢN SÁCH </h1>
    <form id="lapphieumuon" name="lapphieumuon" action="{{route('phieumuon.store')}}" method="POST">
        <div class="row mb-4">
            <div class="col-12 col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">THÔNG TIN PHIẾU MƯỢN</h5>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" name="maphieumuon" class="form-control" id="maphieumuon" value="{{$maphieumuon}}" disabled>
                                    <input type="hidden" name="maphieumuon" class="form-control" id="maphieumuon" value="{{$maphieumuon}}">
                                    <label for="maphieumuon">Mã Phiếu Mượn</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" name="ngaytao" class="form-control" id="ngaytao" value="{{ date('Y-m-d') }}">
                                    <label for="ngaytao">Ngày Tạo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="col-md-12">
                                <label for="ghichu">Ghi chú:</label>
                                <textarea  class="form-control" name="ghichu" id="ghichu" rows="2" cols="3"> </textarea>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">THÔNG TIN ĐỘC GIẢ</h5>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="searchReader">
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-3">
                                    <select class="form-select" name="madocgia" id="madocgia">
                                            <option value="">Vui lòng nhập mã độc giả</option>
                                        @foreach($docgias as $docgia)
                                            <option value="{{$docgia->madocgia}}">{{$docgia->madg}} - {{$docgia->tendocgia}}</option>
                                        @endforeach
                                    </select>
                                    <label for="madocgia">Mã Độc Giả</label>
                                </div>
                            </div>
                        </div>
                        <div class>
                            <div class="infoReaderSearch row">
                               <!-- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title mb-0">THÔNG TIN NHÂN VIÊN</h5>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body">
                        <div class="user-avatar-section mb-3">
                            <div class=" d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mb-4" src="{{asset('theme/assets/img/avatars/Manga.jpg')}}" height="120" width="120"
                                     alt="User avatar">
                                <div class="user-info text-center">
                                    <h5>{{$nhanviens->name}}</h5>
                                    <span class="badge bg-label-danger rounded-pill">{{$nhanviens->role->role_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-container">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <span class="h6">Email:</span>
                                    <span>{{$nhanviens->email}}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="h6">Status:</span>
                                    <span class="badge bg-label-success rounded-pill">Active</span>
                                </li>
                                <li>
                                    <span class="h6">Role:</span>
                                    <span>{{$nhanviens->role->role_name}}</span>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="manhanvien" value="{{$nhanviens->id}}">
                    </div>
                </div>
            </div>
        </div>

        <button disabled type="button" id="themsach" class="themsachBtn btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Thêm Sách Mượn
        </button>

        <div class="card mb-3">
            <h5 class="card-header">Danh Sách Sách Mượn</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <!-- Header -->
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Sách</th>
                        <th>Tên Sách</th>
                        <th>Ảnh</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="bookListTable" class="table-border-bottom-0">
                        <!-- -->
                    </tbody>
                </table>
            </div>
        </div>

        <input type="hidden" name="masachList" id="masachList" class="" value="">
        @csrf
        <!-- Submit -->
        <button type="submit" class="createPhieumuon btn btn-success mb-5" disabled>LẬP PHIẾU</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">THÊM SÁCH</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 container mb-3">
                    <form id="selectBookCode">
                        <select name="masach" class="form-control" id="masach">
                            <option value="" selected>Nhập Mã Sách</option>
                            @foreach($dausachs as $dausach)
                                <option value="{{$dausach->id}}">{{$dausach->masach}} - {{$dausach->tensach}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="modal-title">
                    <h6 class="modal-title">CHI TIẾT SÁCH MƯỢN</h6>
                </div>
                <hr class="mt-0">
                <div id="bookDetail">
                    <!-- -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="closeBook btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBook btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

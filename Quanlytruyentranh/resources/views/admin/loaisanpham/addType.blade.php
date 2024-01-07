{{--  --}}
@extends('admin.main')
@section('content')
    <form action="/admin/loaisanpham/addType/store" method="POST" id="quickForm" novalidate="novalidate" enctype="multipart/form-data">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Loại:</label>
                <input type="text" name="TenLoai" class="form-control" id="TenLoai" placeholder="Nhập tên loại... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh bìa:</label>
                <input type="file" name="AnhBia" class="form-control" id="AnhBia" placeholder="Chọn ảnh bìa... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <textarea name="MoTa" id="mota" rows="10" cols="80">

                </textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        @csrf
    </form>
@endsection



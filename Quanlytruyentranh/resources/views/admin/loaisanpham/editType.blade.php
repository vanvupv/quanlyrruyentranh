
@extends('admin.main')
@section('content')
    <form action={{ route('EditType', ['loaisanpham' => $loaisanpham->MaLoaiSP]) }} method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Loại </label>
                <input type="text" value="{{$loaisanpham->TenLoai}}" name="TenLoai" class="form-control" id="TenLoai" placeholder="Nhập tên loại... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <textarea name="MoTa" id="mota" rows="10" cols="80">
                {{$loaisanpham->MoTa}}
                </textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        @csrf
    </form>
@endsection



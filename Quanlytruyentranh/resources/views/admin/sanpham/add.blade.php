
@extends('admin.main')
@section('content')
    <form action="{{route('AddSanPham.store')}}" method="POST" id="quickForm" novalidate="novalidate" enctype="multipart/form-data">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Sản Phẩm :</label>
                <input  type="text" name="MaDM" class="form-control" id="MaDM" placeholder="Nhập mã sản phẩm...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm:</label>
                <input type="text" name="TenDM" class="form-control" id="TenDM" placeholder="Nhập tên sản phẩm... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số Lượng:</label>
                <input type="number" min="0" name="SoLuong" class="form-control" id="SoLuong" placeholder="Nhập số lượng... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Đơn Vị Tính:</label>
                <input type="text" name="DonViTinh" class="form-control" id="DonViTinh" placeholder="Nhập Đơn Vị Tính... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá Bán:</label>
                <input type="number" min="0" name="GiaBan" class="form-control" id="GiaBan" placeholder="Giá Bán... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh bìa:</label>
                <input type="file" name="AnhBia" class="form-control" id="AnhBia" placeholder="Chọn ảnh bìa... ">
            </div>
            <div class="form-group">
                <label for="MaLoaiSP">Mã Loại Sản Phẩm:</label>
                <select name="MaLoaiSP" id="MaLoaiSP" class="form-control">
                    @foreach ($maLoaiSanPhamLists as $id => $maLoai)
                        <option value="{{ $id }}">{{ $maLoai }}</option>
                    @endforeach
                </select>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection


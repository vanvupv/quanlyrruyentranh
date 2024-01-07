@extends('admin.main')
@section('content')
    <form action={{ route('EditSanPham',['sanpham' => $sanpham->IDSanPham]) }} method="post" id="quickForm" novalidate="novalidate">
        @include('share.error')
        <div class="card-body">
{{--            @dd($sanpham);--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Sản Phẩm :</label>
                <input readonly type="text" value="{{$sanpham->MaSP}}" name="MaDM" class="form-control" id="MaDM" placeholder="Nhập mã sản phẩm...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm:</label>
                <input type="text" value="{{$sanpham->TenSP}}" name="TenDM" class="form-control" id="TenDM" placeholder="Nhập tên sản phẩm... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số Lượng:</label>
                <input type="number" min="0" value="{{$sanpham->SoLuong}}" name="SoLuong" class="form-control" id="SoLuong" placeholder="Nhập số lượng... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Đơn Vị Tính:</label>
                <input type="text" value="{{$sanpham->DonViTinh}}" name="DonViTinh" class="form-control" id="DonViTinh" placeholder="Nhập Đơn Vị Tính... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá Nhập:</label>
                <input type="text" value="{{$sanpham->GiaNhap}}" name="GiaNhap" class="form-control" id="GiaNhap" placeholder="Giá Nhập... ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá Bán:</label>
                <input type="text" value="{{$sanpham->GiaBan}}" name="GiaBan" class="form-control" id="GiaBan" placeholder="Giá Bán... ">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputEmail1">Mã Loại Sản Phẩm:</label>--}}
{{--                <input type="text" value="{{$sanpham->MaLoaiSP}}" name="MaLoaiSP" class="form-control" id="MaLoaiSP" placeholder="Nhập Mã Loại... ">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="MaLoaiSP">Mã Loại Sản Phẩm:</label>
                <select name="MaLoaiSP" id="MaLoaiSP" class="form-control">
                    @foreach ($maLoaiSanPhamLists as $id => $maLoai)
                        <option @if ( (int)$id == (int)$sanpham->MaLoaiSP) selected @endif value="{{ $id }}" >{{ $maLoai }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <textarea name="MoTa" id="mota" rows="10" cols="80">
                {{$sanpham->MoTa}}
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


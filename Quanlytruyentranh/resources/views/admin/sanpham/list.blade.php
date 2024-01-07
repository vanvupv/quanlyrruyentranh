
@extends('admin.main')
@section('content')
    <style>
        .active {
            background-color: red;
            border: 1px solid red;
        }

        .image-wrapper {
            width: 100px;
            height: 100px;
            overflow: hidden;
            text-align: center;
        }

        .image-wrapper img {
            max-width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Đơn Vị Tính</th>
            <th>Giá Bán</th>
            <th>Ảnh bìa</th>
            <th>Loại Sản Phẩm</th>
            <th>Mô Tả</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sanphams as $sanpham)
            <tr>
                <td>{{$sanpham->IDSanPham}}</td>
                <td>{{$sanpham->MaSP}}</td>
                <td>{{$sanpham->TenSP}}</td>
                <td>{{$sanpham->SoLuong}}</td>
                <td>{{$sanpham->DonViTinh}}</td>
                <td>{{$sanpham->GiaBan}}</td>
                <td>
                    <div class="image-wrapper">
                        <img src="{{asset('/images/'.$sanpham->AnhBia)}}" alt="">
                    </div>
                </td>
                @foreach($maLoaiSanPhamLists as $id => $maLoai)
                    @if($sanpham->MaLoaiSP == $id)
                        <td>{{$maLoai}}</td>
                        @break
                    @endif
                @endforeach
                <td>{!! $sanpham->MoTa !!}</td>
                <td><a class="btn btn-primary mr-3" href="/admin/sanpham/edit/{{$sanpham->IDSanPham}}"><i class="fa fa-edit "></i></a>
                <a class="btn btn-danger" href="#" onclick="Delete({{$sanpham->IDSanPham}},'/admin/sanpham/delete')"><i class = "fa fa-trash"></i></a>
                </td>
            </tr
        @endforeach
        </tbody>
    </table>
    {{ $sanphams->links() }}
@endsection


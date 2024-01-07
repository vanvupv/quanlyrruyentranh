
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
            <th>Mã Loại</th>
            <th>Tên Loại</th>
            <th>Ảnh </th>
            <th>Mô Tả</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loaisanphams as $loaisanpham)
            <tr>
                <td>{{$loaisanpham->MaLoaiSP}}</td>
                <td>{{$loaisanpham->TenLoai}}</td>
                <td>
                    <div class="image-wrapper">
                        <img src="{{asset($loaisanpham->AnhBia)}}" alt="">
                    </div>
                </td>
                <td>{!!$loaisanpham->MoTa!!}</td>
                <td><a class="btn btn-primary mr-3" href="/admin/loaisanpham/editType/{{$loaisanpham->MaLoaiSP}}"><i class="fa fa-edit "></i></a>
                <a class="btn btn-danger" href="#" onclick="Delete({{$loaisanpham->MaLoaiSP}},'/admin/loaisanpham/delete')"><i class = "fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $loaisanphams->links() }}
@endsection



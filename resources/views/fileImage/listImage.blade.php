
@extends('admin.main')
@section('content')
    <style>
        .active {
            background-color: red;
            border: 1px solid red;
        }

        .image-wrapper {
            width: 100%;
            height: 200px; 
            overflow: hidden;
            text-align: center;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div style="padding: 12px">
        <button class="btn btn-danger">
            <a href="{{ route('AddImg') }}">Add Images</a>
        </button>
    </div>

    <form action="{{ route('DeleteImage') }}" method="post">
        @method('DELETE') <!-- Add this line to override the form method -->
        @csrf
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID Sách</th>
                <th>Danh sách ảnh</th>
            </tr>
            </thead>
            <tbody>

            @foreach($groupedImages as $IDSanPham => $images)

                <tr>
                    <td>{{ $IDSanPham }}</td>
                    <td>
                        <div class="row p-0 m-0">
                        @foreach($images as $image)
                            <div class="col-2 p-2 m-0 image-wrapper">
                                <img src="{{asset($image->address)}}" alt="">
                                <input type="checkbox" name="selectedImages[]" value="{{ $image->IDImage }}">
                            </div>
                        @endforeach
                        </div>
                    </td>
                    <td>
                        <!-- Add a checkbox for each image with the corresponding ID -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit">Xóa ảnh đã chọn</button>
    </form>
@endsection



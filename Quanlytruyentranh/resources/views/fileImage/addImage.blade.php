<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Trang Home</title>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <!-- // Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="./assets/css/main.css"/>
    <link rel="stylesheet" href="./assets/css/home.css"/>

    <!-- CSS -->
    <link
        rel="stylesheet"
        type="text/css"
        href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
</head>
<body>
@extends('admin.main')
@section('content')

    <style>
        #image-preview {
            display: none;
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>

    <form action="{{ route('AddImg.store') }}" method="POST" id="quickForm" novalidate="novalidate" enctype="multipart/form-data">
        @include('share.error')
        <div>
            <button class="btn btn-primary">
                <a href="{{ route('listImage') }}" style="color: red">Danh sach Anh</a>
            </button>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="formFile" class="btn btn-danger form-label">Choose To Add Images</label>
                <input
                    class="form-control"
                    type="file"
                    id="formFile"
                    name="formFile[]"
                    multiple onchange="previewImage()"
                    hidden="true"
                >
            </div>

            <div id="image-preview"></div>

            <style>
                /* Add some basic styling for the search input */
                #searchInput {
                    margin-top: 10px;
                    padding: 5px;
                }
            </style>
                <label for="cars">Choose a car:</label>
                <select name="cars" id="cars">
                    @foreach($danhsachSanphams as $Sanpham)
                    <option value="{{ $Sanpham->IDSanPham }}">{{ $Sanpham->TenSP }}</option>
                    @endforeach
                </select>

                <!-- Add an input for dynamic search -->
                <input type="text" id="searchInput" placeholder="Search...">

            <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>

    <script>
        function previewImage() {
            let input = document.getElementById('formFile');
            let preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        let image = document.createElement('img');
                        image.src = e.target.result;
                        image.style.maxWidth = '100%';
                        image.style.maxHeight = '100px'; // Adjust the height as needed
                        preview.appendChild(image);
                    };

                    reader.readAsDataURL(input.files[i]);
                }

                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }
    </script>

    <script>
        // Add an event listener to the search input for real-time filtering
        document.getElementById('searchInput').addEventListener('input', function () {
            let filter, options, option, i, txtValue;
            filter = this.value.toUpperCase();
            console.log(filter);

            options = document.getElementById('cars').options;
            let selectElement = document.getElementById('cars');
            selectElement.size = filter.trim() !== '' ? 5 : 1;

            console.log(options);

            for (i = 0; i < options.length; i++) {
                option = options[i];
                txtValue = option.text || option.textContent;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option.style.display = '';  // Hiển thị tùy chọn
                    option.selected = true;  // Chọn tùy chọn
                } else {
                    option.style.display = 'none';  // Ẩn tùy chọn
                    option.selected = false;  // Bỏ chọn tùy chọn
                }
            }
        });
    </script>
@endsection


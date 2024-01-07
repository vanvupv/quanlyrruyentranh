<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- -->
{{--    <title>{{$title}}</title>--}}

    <!-- -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Surfside Media">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Surfside Media">
    <meta name="keywords" content="Surfside Media">
    <meta name="author" content="Surfside Media">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>ShopTruyenTranh</title>

    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/theme/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- BST 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <!-- BST 5 - Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/theme/dist/css/adminlte.min.css')}}">

    <!--  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />

    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
    <!-- Ckeditor -->
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>


</head>


<style>
    header .profile-dropdown ul li {
        display: block;
        padding: 5px 20px;
        border-bottom: 1px solid #ddd;
        line-height: 35px;
    }

    header .profile-dropdown ul li:last-child {
        border-color: #fff;
    }

    header .profile-dropdown ul {
        padding: 10px 0;
        min-width: 250px;
    }


    .name-usr {
        background: #e87316;
        padding: 8px 12px;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        line-height: 24px;
    }

    .name-usr span {
        margin-right: 10px;
    }

    @media (max-width:600px) {
        .h-logo {
            max-width: 150px !important;
        }

        i.sidebar-bar {
            font-size: 22px;
        }

        .mobile-menu ul li a svg {
            width: 20px;
            height: 20px;
        }

        .mobile-menu ul li a span {
            margin-top: 0px;
            font-size: 12px;
        }

    }
    .h-logo {
        max-width: 185px !important;
    }

    .f-logo {
        max-width: 220px !important;
    }

    @media only screen and (max-width: 600px) {
        .h-logo {
            max-width: 110px !important;
        }
    }
    .short-name .label-tag .btn-close {
        padding-top: 12px;
    }

</style>





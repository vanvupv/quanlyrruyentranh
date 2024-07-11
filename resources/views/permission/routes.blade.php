@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> Danh Sách Route </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('permission_route.add')}}" class="btn btn-primary waves-effect waves-light" >
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Add New Route </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Route Title </th>
                        <th> Route Name </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($routeList as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item->route_title }}</td>
                            <td>{{$item->route_name}}</td>
                            <td>
                                <a class="btn mr-3" style="display: block !important;" href="{{ route('permission_route.edit', ['id' => $item->id]) }}">Setting</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




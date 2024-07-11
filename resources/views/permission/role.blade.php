@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> Danh Sách Vai Trò </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('permission_role.add')}}" class="btn btn-primary waves-effect waves-light" >
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Add New Role </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Tên Role </th>
                        <th> Slug Role </th>
                        <th> Permission </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roleLists as $roleList)
                        <tr>
                            <td>{{$roleList->id}}</td>
                            <td>{{$roleList->role_name}}</td>
                            <td>{{$roleList->role_slug}}</td>
                            <td>{{$roleList->role_slug}}</td>
                            <td>
                                <a class="btn mr-3" style="display: block !important;" href="{{ route('permission_role.edit', ['id' => $roleList->id]) }}">Setting</a>
                            </td>
                        </tr
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




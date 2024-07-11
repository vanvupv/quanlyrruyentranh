@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> Danh Sách Người dùng </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('permission_user.add')}}" class="btn btn-primary waves-effect waves-light" >
                <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
                <span class="d-none d-sm-inline-block"> Add New User </span>
            </a>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <div class="card-datatable text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Tên Người Dùng </th>
                        <th> Email </th>
                        <th> Roles </th>
                        <th> Permissions </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                @foreach($item->roles as $role)
                                    {{$role->role_name}} __
                                @endforeach
                            </td>
                            <td>
                                @foreach($item->permissions as $permission)
                                    {{$permission->name}} --
                                @endforeach
                            </td>
                            <td>
                                <a class="btn mr-3" style="display: block !important;" href="{{ route('permission_user.edit', ['id' => $item->id]) }}">Setting</a>
                            </td>
                        </tr
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




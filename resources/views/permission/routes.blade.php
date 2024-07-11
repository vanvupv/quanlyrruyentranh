@extends('admin.main')
@section('content')
    <div class="card listTable">
        @include('share.error')
        <h5 class="card-header"> Danh Sách Route </h5>
        <hr class="my-0">
        <div class="listTable__add add-new">
            <a href="{{route('permission_role.add')}}" class="btn btn-primary waves-effect waves-light" >
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
                    @foreach($permissionList as $roleList)
                        <tr>
                            <td>{{$roleList['route_id']}}</td>
                            <td>{{ $roleList['route_title'] }}</td>
                            <td>{{$roleList['route_name']}}</td>
                            <td>{{$role_id}}</td>
                            <td>
                                <select name="" class="form-control" id=""
                                        onchange="updatePermission(this, {{ $roleList['route_id'] }}, {{ $role_id }})">
                                    <option value="0" {{ $roleList['status'] == 0 ? 'selected' : '' }} >Disable</option>
                                    <option value="1" {{ $roleList['status'] == 1 ? 'selected' : '' }}>Enable</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
                    <script>

                        function updatePermission(that, routeID, roleID) {
                            let statusNow = $(that).val();

                            $.post('{{ route('permission_save') }}', {
                                '_token': '{{ csrf_token() }}',
                                'route_id' : routeID,
                                'role_id': roleID,
                                'status' : statusNow
                            }, function (data) {
                                // Xử lý dữ liệu sau khi gửi POST nếu cần
                            });
                        }
                    </script>
                </table>
            </div>
        </div>
    </div>
@endsection




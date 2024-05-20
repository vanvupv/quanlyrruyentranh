

    <style>
        .active {
            background-color: red;
            border: 1px solid red;
        }
        .btn{
            padding: 20px;
            border: none;
            background-color: red;
            color: black;
        }
    </style>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roleLists as $roleList)
            <tr>
                <td>{{$roleList->id}}</td>
                <td>{{$roleList->role_name}}</td>
                <td>
                    <a class="btn mr-3" style="display: block !important;" href="{{ route('permission_setting', ['id' => $roleList->id]) }}">Setting</a>
                </td>
            </tr
        @endforeach
        </tbody>
    </table>



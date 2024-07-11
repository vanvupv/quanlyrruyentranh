@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Cập Nhật Người Dùng </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action="{{route('permission_user.postedit',['id'=> $user->id])}}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2  control-label">User name</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="text" id="username" name="username" value="{{$user->name}}" class="form-control username" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control email" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2  control-label">Password</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="password" id="password" name="password" value="" class="form-control password" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group  row ">
                    <label for="password" class="col-sm-2  control-label">Confirmation password</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control password_confirmation" placeholder="">
                        </div>
                    </div>
                </div>

                {{-- select roles --}}
                <div class="form-group row {{ $errors->has('roles') ? ' text-red' : '' }}">
                    @php
                        $listRoles = [];
                            $old_roles = old('roles',($user)?$user->roles->pluck('id')->toArray():'');
                            if(is_array($old_roles)){
                                foreach($old_roles as $value){
                                    $listRoles[] = (int)$value;
                                }
                            }
                    @endphp
                    <label for="roles" class="col-sm-2  control-label"> Danh sách Vai trò </label>
                    <div class="col-sm-8">

                        @if (isset($user['id']) && in_array($user['id'], [0]))
                            @if (count($listRoles))
                                @foreach ($listRoles as $role)
                                    {!! '<span class="">'.($roles[$role]??'').'</span>' !!}
                                @endforeach
                            @endif
                        @else
                            <select class="form-control roles select2"  multiple="multiple" data-placeholder="danh sách vai trò" style="width: 100%;" name="roles[]" >
                                <option value=""></option>
                                @foreach ($roles as $k => $v)
                                    <option value="{{ $k }}" {{ (count($listRoles) && in_array($k, $listRoles))?'selected':'' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('roles'))
                                <span class="form-text"> {{ $errors->first('roles') }} </span>
                            @endif
                        @endif
                    </div>
                </div>
                {{-- //select roles --}}

                {{-- select permission --}}
                <div class="form-group row {{ $errors->has('permission') ? ' text-red' : '' }}">
                    @php
                        $listPermission = [];
                        $old_permission = old('permission',($user?$user->permissions->pluck('id')->toArray():''));
                            if(is_array($old_permission)){
                                foreach($old_permission as $value){
                                    $listPermission[] = (int)$value;
                                }
                            }
                    @endphp
                    <label for="permission" class="col-sm-2  control-label"> Danh sách Quyền </label>
                    <div class="col-sm-8">
                        @if (isset($user['id']) && in_array($user['id'], [0]))
                            @if (count($listPermission))
                                @foreach ($listPermission as $p)
                                    {!! '<span class="">'.($permissions[$p]??'').'</span>' !!}
                                @endforeach
                            @endif
                        @else
                            <select class="form-control permission select2"  multiple="multiple" data-placeholder="Danh sách quyền" style="width: 100%;" name="permission[]" >
                                <option value=""></option>
                                @foreach ($permissions as $k => $v)
                                    <option value="{{ $k }}"  {{ (count($listPermission) && in_array($k, $listPermission))?'selected':'' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('permission'))
                                <span class="form-text">{{ $errors->first('permission') }}</span>
                            @endif
                        @endif
                    </div>
                </div>
                {{-- //select permission --}}
            </div>

            <div class="card-footer row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="btn-group float-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="btn-group float-left">
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


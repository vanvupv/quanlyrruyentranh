@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Cap Nhat Vai Tro </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action="{{route('permission_role.postedit',['id' => $role->id])}}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="fields-group">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" id="name" name="name" value="{{$role->role_name}}" class="form-control name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-sm-2  control-label">Slug</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" id="slug" name="slug" value="{{$role->role_slug}}" class="form-control slug" placeholder="">
                            </div>
                        </div>
                    </div>

                    {{-- select permission --}}
                    @php
                        $listPermission = [];
                        $old_permission = old('permission',($role?$role->permissions->pluck('id')->toArray():''));
                            if(is_array($old_permission)){
                                foreach($old_permission as $value){
                                    $listPermission[] = $value;
                                }
                            }
                    @endphp
                    <div class="form-group row {{ $errors->has('permission') ? ' text-red' : '' }}">
                        <label for="permission" class="col-sm-2  control-label"> Danh sách quyền </label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm permission select2"  multiple="multiple" data-placeholder="Danh sách quyền" style="width: 100%;" name="permission[]" >
                                <option value=""></option>
                                @foreach ($permission as $k => $v)
                                    <option value="{{ $k }}"  {{ (count($listPermission) && in_array($k, $listPermission))?'selected':'' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('permission'))
                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('permission') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- //select permission --}}

                    {{-- select administrators --}}
                    @php
                        $listadministrators = [];
                        $roleCheck = $role ? $role->administrators->pluck('name', 'id')->all():[];
                        $old_administrators = old('administrators',array_keys($roleCheck));
                    @endphp
                    <div class="form-group row {{ $errors->has('administrators') ? ' text-red' : '' }}">
                        <label for="administrators" class="col-sm-2  control-label"> Danh sách người dùng </label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm administrators select2"  multiple="multiple" data-placeholder="Danh sách người dùng" style="width: 100%;" name="administrators[]" >
                                <option value=""></option>
                                @foreach ($userList as $k => $v)
                                    <option value="{{ $k }}"  {{ (in_array($k, $old_administrators))?'selected':'' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('administrators'))
                                <span class="form-text"> {{ $errors->first('administrators') }} </span>
                            @endif
                        </div>
                    </div>
                    {{-- //select administrators --}}
                </div>
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


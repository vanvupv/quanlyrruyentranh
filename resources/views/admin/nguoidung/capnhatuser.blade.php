@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Thêm Người Dùng </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action="{{route('permission_user.store')}}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2  control-label">User name</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="text" id="username" name="username" value="" class="form-control username" placeholder="">
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
                            <input type="text" id="email" name="email" value="" class="form-control email" placeholder="">
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

                <div class="form-group row ">
                    <label for="roles" class="col-sm-2  control-label">Select roles</label>
                    <div class="col-sm-8">
                        <select class="form-control roles" multiple="" data-placeholder="Select roles" style="width: 100%;" name="roles[]" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value=""></option>
                            @foreach($dataRoles as $ind => $item)
                                <option value={{$item->id}}>{{$item->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="permission" class="col-sm-2  control-label">Add permission</label>
                    <div class="col-sm-8">
                        <select class="form-control permission" multiple="" data-placeholder="Add permission" style="width: 100%;" name="permission[]" data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option value=""></option>
                            @foreach($dataPermissions as $ind => $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
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


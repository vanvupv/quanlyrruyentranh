@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Cap Nhat Quyen </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action="{{route('permission.postedit',['id' => $permission->id])}}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="fields-group">
                    <div class="form-group row  ">
                        <label for="name" class="col-sm-2  control-label">Name</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" id="name" name="name" value="{{ $permission->name }}" class="form-control name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  ">
                        <label for="slug" class="col-sm-2  control-label">Slug</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" id="slug" name="slug" value="{{ $permission->slug }}" class="form-control slug" placeholder="">
                            </div>
                        </div>
                    </div>

                    {{-- select http_method --}}
                    <div class="form-group row {{ $errors->has('http_uri') ? ' text-red' : '' }}">
                        @php
                            $old_http_uri = old('http_uri',($permission)?explode(',', $permission->http_uri):[]);
                        @endphp
                        <label for="http_uri" class="col-sm-2  control-label"> Danh sách Đường dẫn </label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm http_uri select2"  multiple="multiple" data-placeholder="danh sách đường dẫn" style="width: 100%;" name="http_uri[]" >
                                <option value=""></option>
                                @foreach ($routeAdmin as  $route)
                                    <option value="{{ $route['id'] }}"  {{ in_array($route['id'], $old_http_uri)?'selected':'' }}  >{{ $route['route_name']?$route['method'].'::'.$route['route_name']:$route['uri'] }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('http_uri'))
                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> {{ $errors->first('http_uri') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- //select http_uri --}}

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


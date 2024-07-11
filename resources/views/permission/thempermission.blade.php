@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Them Quyen </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action="{{route('permission.store')}}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
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
                                <input type="text" id="name" name="name" value="" class="form-control name" placeholder="">
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
                                <input type="text" id="slug" name="slug" value="" class="form-control slug" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="http_uri" class="col-sm-2  control-label">Select http uri</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm http_uri" multiple="" data-placeholder="Permission detail" style="width: 100%;" name="http_uri[]" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value=""></option>
                                @foreach($route as $item)
                                    <option value={{$item->id}}> {{ $item->route_title }}</option>
                                @endforeach
                            </select>
                        </div>
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


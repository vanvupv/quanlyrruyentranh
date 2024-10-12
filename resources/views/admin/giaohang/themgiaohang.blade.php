@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Thêm Khuyến Mại </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action={{route('giaohang.store')}} method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="fields-group">
                    <div class="card-body">
                        <div class="fields-group">
                            <div class="form-group  row">
                                <label for="code" class="col-sm-2 control-label"> Tên phương thức </label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                                        </div>
                                        <input type="text" id="name_shipping" name="name_shipping" value="" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Only characters in the group: "A-Z", "a-z", "0-9" and ".-_"
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label for="reward" class="col-sm-2  control-label"> Giá </label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                        </div>
                                        <input type="text" id="price" name="price" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer row" id="card-footer">
                        <div class="col-md-8">
                            <div class="btn-group float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="btn-group float-left">
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


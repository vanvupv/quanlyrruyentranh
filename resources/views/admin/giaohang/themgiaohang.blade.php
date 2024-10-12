@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Thêm Khuyến Mại </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action={{route('khuyenmai.store')}} method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="fields-group">
                    <div class="card-body">
                        <div class="fields-group">
                            <div class="form-group  row">
                                <label for="code" class="col-sm-2 control-label"> Code </label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                                        </div>
                                        <input type="text" id="code" name="code" value="" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Only characters in the group: "A-Z", "a-z", "0-9" and ".-_"
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label for="reward" class="col-sm-2  control-label">Reward</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                        </div>
                                        <input type="text" id="reward" name="reward" value="" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="type" class="col-sm-2  control-label">Type</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <label class="radio-inline"><input type="radio" name="type" value="point"> Point</label>
                                        &nbsp;
                                        <label class="radio-inline"><input type="radio" name="type" value="percent"> Percent (%)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="data" class="col-sm-2  control-label">Description</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="data" name="data" value="" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Description of discount code
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="limit" class="col-sm-2  control-label">Limit</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" id="limit" name="limit" value="1" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Total number of times that can use the discount code
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="user_limit" class="col-sm-2  control-label">Limit per user</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" id="user_limit" name="user_limit" value="0" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> 0 - unlimit (use only when user login)
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="product_exclude" class="col-sm-2 col-form-label">Product exclude</label>
                                <div class="col-sm-8">
                                    <select class="form-control" multiple="" data-placeholder="Product exclude" name="product_exclude[]">
                                        @foreach($sanphams as $ind => $item)
                                            <option value={{$ind}}> {{$item}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="product_apply" class="col-sm-2 col-form-label">Product apply</label>
                                <div class="col-sm-8">
                                    <select class="form-control" multiple="" data-placeholder="Product apply" name="product_apply[]">
                                        @foreach($sanphams as $index => $item1)
                                            <option value={{$index}}> {{$item1}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="category_exclude" class="col-sm-2 col-form-label">Category exclude</label>
                                <div class="col-sm-8">
                                    <select class="form-control" multiple="" data-placeholder="Category exclude" name="category_exclude[]">
                                        @foreach($danhmucs as $index => $item1)
                                            <option value={{$index}}> {{$item1}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="category_apply" class="col-sm-2 col-form-label">Category apply</label>
                                <div class="col-sm-8">
                                    <select class="form-control" multiple="" data-placeholder="Category apply"  name="category_apply[]">
                                        @foreach($danhmucs as $ind => $item)
                                            <option value={{$ind}}> {{$item}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <span style="color:red;font-weight:bold">Priority:
                                </span> <i>Product exclude &gt; Product apply &gt; Category exclude &gt; Category apply</i>
                            </div>
                            <hr>
                            <div class="form-group  row ">
                                <label for="login" class="col-sm-2  control-label">Login require</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="checkbox" id="login" name="login" placeholder="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="expires_at" class="col-sm-2  control-label">Expires</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                        <input type="text" id="expires_at" name="expires_at" value="" class="form-control date_time hasDatepicker" placeholder="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="shop_store" class="col-sm-2 col-form-label">Select store</label>
                                <div class="col-sm-8">
                                    <select class="form-control" data-placeholder="Select store" name="shop_store">
                                        <option value="" data-select2-id="150"></option>
                                        <option value="S-5106w-eH8YR">demo-store2
                                        </option>
                                        <option value="1">s-cart
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                        <input type="hidden" name="status" value="0">
                                        <input class="checkbox" type="checkbox" name="status" id="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#status').on('change', function() {
                                if ($(this).is(':checked')) {
                                    $(this).val('1');
                                } else {
                                    $(this).val('0');
                                }
                            });
                        });
                    </script>

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


@extends('admin.main')
@section('content')
<div class="card listTable">
    @include('share.error')
    <h5 class="card-header"> Cập nhật thông tin Khuyến Mại </h5>
    <hr class="my-0">
    <div class="card-body">
        <form action={{route('khuyenmai.postedit', $coupon->id)}} method="post" accept-charset="UTF-8" class="form-horizontal" id="discountForm" enctype="multipart/form-data">
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
                                        <input type="text" id="code" name="code" value="{{ $coupon->code }}" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Only characters in the group: "A-Z", "a-z", "0-9" and ".-_"
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label for="reward" class="col-sm-2  control-label"> Name </label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" value="{{ $coupon->name }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="type" class="col-sm-2  control-label">Type</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="type" value="fixed" @if($coupon->type == 'fixed') checked @endif> Point
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="type" value="percent" @if($coupon->type == 'percent') checked @endif> Percent (%)
                                        </label>
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
                                        <input type="text" id="desc" name="desc" value="{{ $coupon->desc }}" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Description of discount code
                                </div>
                            </div>
                            <div class="form-group  row ">
                                <label for="limit" class="col-sm-2  control-label">max_uses</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" id="max_uses" name="max_uses" value="{{ $coupon->max_uses }}" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> Total number of times that can use the discount code
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_limit" class="col-sm-2  control-label">max_uses_user</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" id="max_uses_user" name="max_uses_user" value="{{ $coupon->max_uses_user }}" class="form-control" placeholder="">
                                    </div>
                                    <i class="fa fa-info-circle"></i> 0 - unlimit (use only when user login)
                                </div>
                            </div>

                            <div class="form-group  row ">
                                <label for="expires_at" class="col-sm-2  control-label">discount_amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                        <input type="text" id="discount_amount" name="discount_amount" value="{{ $coupon->discount_amount }}" class="form-control date_time hasDatepicker" placeholder="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  row ">
                                <label for="expires_at" class="col-sm-2  control-label">min_amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                        <input type="text" id="min_amount" name="min_amount" value="{{ $coupon->min_amount }}" class="form-control date_time hasDatepicker" placeholder="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  row ">
                                <label for="expires_at" class="col-sm-2  control-label">starts_at</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span>
                                        </div>
                                        <input type="date" id="starts_at" name="starts_at" value="{{ $coupon->starts_at }}" class="form-control date_time hasDatepicker" placeholder="yyyy-mm-dd">
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
                                        <input type="date" id="expires_at" name="expires_at" value="{{ $coupon->expires_at }}" class="form-control date_time hasDatepicker" placeholder="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                        <input type="hidden" name="status" value="{{ $coupon->status }}">
                                        <input class="checkbox" type="checkbox" name="status" id="status" value="{{ $coupon->status }}" @if($coupon->status == 1) checked @endif>
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


<script>
    $('#discountForm').submit(function (event) {
        event.preventDefault();

        var element = $(this);

        $.ajax({
            url: `{{ route('khuyenmai.postedit', $coupon->id) }}`,
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success: function (response) {
                if (response['status'] == true) {
                    window.location.href = "{{ route('khuyenmai') }}";
                }
            }
        });
    });
</script>



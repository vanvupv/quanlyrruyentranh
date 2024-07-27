
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

<!-- Lib jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Lib jQuery Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Lib Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Lib Datatable -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

<!-- -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>


<!-- Lib Laravel File Manager -->
{{--<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>--}}
{{--<script>--}}
{{--    $('#lfm').filemanager('image');--}}
{{--</script>--}}


<!-- Admin JS -->
<script src="{{asset('theme/dist/js/adminlte.js')}}"></script>
<script src="{{asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('theme/assets/vendor/js/menu.js')}}"></script>
<script src="{{asset('theme/assets/js/main.js')}}"></script>

<!-- Admin Customize -->
<script src="{{asset('theme/assets/js/datatable-customize.js')}}"></script>

<!-- Customize -->
<script src="{{asset('assets/js/main-customize.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables-advanture.js')}}"></script>

<!-- Add Multiple Records -->
{{--<script src="{{asset('assets/js/change.js')}}"></script>--}}

<!-- -->
<script>
    $('select[name=addProduct]').select2();
    $('select[name=addProduct]').on('change', function () {
        var valueSelect = $(this).val();

        if(valueSelect) {
            var href =  $('form#addProduct').attr('action');

            var contentProductHtml = function (data) {
                return `<tr class="productRow">
                            <td>${data.id}</td>
                            <td>${data.rowId}</td>
                            <td>${data.name}</td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <!-- -->
                                        <input type="number" data-id=${data.id} onchange="updateQuantity(this)"
                                               class="item-qty form-control stepper-input" name="qty-${data.rowId}" value=${data.qty} min="1">
                                    </div>
                                </div>
                            </td>
                            <td class="priceProduct">${data.price}</td>
                            <td class="totalPrice">${parseInt(data.qty * data.price)}</td>
                            <td>
                                <button type="button" onclick="deleteItem(this)" class="btn btn-danger btn-md btn-flat" data-title="Delete">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>`
            };

            $.ajax({
                url: href,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    id: valueSelect,
                },
                //
                success: function (response) {
                    console.log(response.data);

                    var data = response.data;

                    let tableProduct = $('form[name=productDetail]').find('tbody').find('tr.productRow');

                    if(tableProduct.length > 0) {

                        var listProduct = tableProduct.find('input.item-qty');

                        var productExists = false;

                        listProduct.each(function() {

                            var productId = $(this).data('id');

                            if (productId == data.id) {
                                productExists = true;

                                // Lấy giá trị hiện tại và tăng lên 1
                                var currentValue = $(this).val();
                                var newValue = parseInt(currentValue) + 1;
                                $(this).val(newValue);
                                $(this).closest('tr').find('.totalPrice').text(data.total);

                                return false;
                            }
                        });

                        // Kiểm tra kết quả
                        if (productExists) {
                            console.log('Sản phẩm có mã ' + data.id + ' tồn tại trong danh sách.');
                        } else {
                            tableProduct.last().after(contentProductHtml(data));
                        }

                    } else {
                        $('form[name=productDetail]').find('tbody.listProduct_content').html(contentProductHtml(data));
                    }

                    //
                    $('#subtotal').text(response.subtotal);
                    $('#tax').text(response.tax);
                    $('#total').text(response.total);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                },
            });
        } else {
            console.log(">>> Du lieu rong");
        }
    })

    function updateQuantity(element) {
        var newQuantity = parseInt($(element).val());

        var name = $(element).attr('name');
        var id = $(element).data('id');

        console.log(">>> Check name:", name, newQuantity);

        //
        $.ajax({
            url: `{{ route('order.updateTotal') }}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                name: name,
                id: id,
                value: newQuantity,
            },
            //
            success: function (response) {
                console.log(response);
                $(element).closest('tr').find('.totalPrice').text(response.data.total);

                //
                $('#subtotal').text(response.subtotal);
                $('#tax').text(response.tax);
                $('#total').text(response.total);
            },

            error: function (xhr, status, error) {
                console.error(error);
            },
        });

        // $(this).parent().parent().remove()
    }

    //
    function deleteItem(element) {
        // Lấy hàng chứa phần tử được nhấn
        var deleteRow = $(element).closest('tr');

        // Lấy giá trị từ thẻ input có class item-qty
        var valueDeleteItem = deleteRow.find('input.item-qty');
        var rowID = valueDeleteItem.attr('name');

        //
        $.ajax({
            url: `{{ route('order.deleteItem') }}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                name: rowID,
            },
            //
            success: function (response) {
                console.log(response);
                if(response.data == true) {
                    $(element).parent().parent().remove();
                }

                //
                $('#subtotal').text(response.subtotal);
                $('#tax').text(response.tax);
                $('#total').text(response.total);
            },
            //
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    //
    $('#coupon-button').on('click', function () {
       var couponValue = $('#coupon-value').val();
       console.log(">>> Check Coupon Value: ", couponValue);

        //
        $.ajax({
            url: `{{ route('order.couponApply') }}`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                code: couponValue,
            },
            //
            success: function (response) {
                console.log(response);

                $('#subtotal').text(response.subtotal);
                $('#tax').text(response.tax);
                $('#total').text(response.total);

            },
            //
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    });
</script>

</body>
</html>


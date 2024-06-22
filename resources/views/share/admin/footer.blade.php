<!-- Lib jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Lib jQuery Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Lib Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Lib Datatable -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

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
                            <td>${data.sku}</td>
                            <td>${data.tensanpham}</td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <!-- -->
                                        <input type="number" data-id=${data.sku} onchange="updateQuantity(this)"
                                               class="item-qty form-control stepper-input" name="qty-${data.sku}" value=${data.soluong}>
                                    </div>
                                </div>
                            </td>
                            <td class="priceProduct">${data.giaban}</td>
                            <td class="totalPrice">${parseInt(data.soluong * data.giaban)}</td>
                            <td>
                                <button onclick="$(this).parent().parent().remove();" class="btn btn-danger btn-md btn-flat" data-title="Delete">
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
                    console.log(response);
                    var data = response.data[0];

                    let tableProduct = $('form[name=productDetail]').find('tbody').find('tr.productRow');

                    if(tableProduct.length > 0) {

                        var listProduct = tableProduct.find('input.item-qty');

                        var productExists = false;

                        listProduct.each(function() {

                            var productId = $(this).data('id');

                            if (productId == data.sku) {
                                productExists = true;

                                // Lấy giá trị hiện tại và tăng lên 1
                                var currentValue = $(this).val();
                                var newValue = parseInt(currentValue) + 1;
                                $(this).val(newValue);

                                return false;
                            }
                        });

                        // Kiểm tra kết quả
                        if (productExists) {
                            console.log('Sản phẩm có mã ' + data.sku + ' tồn tại trong danh sách.');
                        } else {
                            tableProduct.last().after(contentProductHtml(data));
                        }

                    } else {
                        $('form[name=productDetail]').find('tbody.listProduct_content').html(contentProductHtml(data));
                    }
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

        var row = $(element).closest('tr');

        var priceProduct = parseFloat(row.find('.priceProduct').text());

        var totalPrice = newQuantity * priceProduct;

        row.find('.totalPrice').text(totalPrice);
    }
</script>
</body>
</html>


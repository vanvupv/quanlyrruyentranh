$(function () {
    console.log("DAX THEM FILE XU LY");
    // Field validation error tips
    $(document.body) // Sự kiện wc_add_error_tip là sự kiện tùy chỉnh của woocommerce
        // Sự kiện thêm thông báo lỗi
        .on("wc_add_error_tip", function (e, element, error_type) {
            // Lấy vị trí hiện tại của phần tử
            var offset = element.position();

            // Kiểm tra xem phần từ thông báo lỗi đã tồn tại chưa
            if (element.parent().find(".wc_error_tip").length === 0) {
                // Thêm phần tử thông báo lỗi vào đằng sau
                element.after(
                    '<div class="wc_error_tip ' +
                    error_type +
                    '">' +
                  "LỖI XẢY RA" +
                    "</div>"
                );

                // Thiết lập css và hiệu ứng cho phần tử thông báo lỗi
                element
                    .parent()
                    .find(".wc_error_tip")
                    .css(
                        "left",
                        offset.left +
                        element.width() -
                        element.width() / 2 -
                        $(".wc_error_tip").width() / 2
                    )
                    .css("top", offset.top + element.height())
                    .fadeIn("100");
            }
        })

        // sự kiện hủy bỏ thông báo lỗi
        .on("wc_remove_error_tip", function (e, element, error_type) {
            element
                .parent()
                .find(".wc_error_tip." + error_type)
                .fadeOut("100", function () {
                    $(this).remove();
                });
        })

        // Sự kiện hủy bỏ thông báo lỗi
        .on("click", function () {
            $(".wc_error_tip").fadeOut("100", function () {
                $(this).remove();
            });
        })

        // Sự kiện hủy bỏ thông báo lỗi
        .on(
            "blur",
            ".wc_input_decimal[type=text], .wc_input_price[type=text], .wc_input_country_iso[type=text]",
            function () {
                $(".wc_error_tip").fadeOut("100", function () {
                    $(this).remove();
                });
            }
        )

        // XỬ LÝ ĐỊNH DẠNG CỦA GIÁ TIỀN -- CHỦ ĐỀ TIỀN TRONG SẢN PHẨM
        // regular price & sale price
        // Sự kiện thay đổi -- on change
        .on(
            "change",
            ".wc_input_price[type=text], .wc_input_decimal[type=text], .wc-order-totals #refund_amount[type=text], " +
            ".wc_input_variations_price[type=text]",
            function () {
                var regex,
                    decimalRegex,
                    // Gán mặc định cho giá tiền là dấu `,`
                    decimailPoint = ",";

                // Kiểm tra đối tượng có class hay không
                if (
                    $(this).is(".wc_input_price") ||
                    $(this).is(".wc_input_variations_price") ||
                    $(this).is("#refund_amount")
                ) {
                    decimailPoint = ",";
                }

                // Đối tượng Regex
                regex = new RegExp(
                    "[^-0-9%\\" + decimailPoint + "]+",
                    "gi"
                );

                // Đối tượng Regex
                decimalRegex = new RegExp("\\" + decimailPoint + "+", "gi");

                // Lấy giá trị của price (regular & sale)
                var value = $(this).val();

                // Tạo dữ liệu mới với việc kiểm tra regex
                var newvalue = value
                    .replace(regex, "")
                    .replace(decimalRegex, decimailPoint);

                // Kiểm tra nếu giá trị mới khác giá trị cũ
                if (value !== newvalue) {
                    // Thiết lập giá trị mới cho giá tiền
                    $(this).val(newvalue);
                }
            }
        )

        // XỬ LÝ ĐỊNH DẠNG CỦA GIÁ TIỀN -- CHỦ ĐỀ TIỀN TRONG SẢN PHẨM
        // regular price & sale price
        // Sự kiện bàn phím -- on keyup
        .on(
            "keyup",
            // eslint-disable-next-line max-len
            ".wc_input_price[type=text], .wc_input_decimal[type=text], .wc_input_country_iso[type=text], .wc-order-totals #refund_amount[type=text], .wc_input_variations_price[type=text]",
            function () {
                //
                var regex, error, decimalRegex;

                // Kiểm tra số có thỏa mãn không
                var checkDecimalNumbers = false;
                if (
                    $(this).is(".wc_input_price") ||
                    $(this).is(".wc_input_variations_price") ||
                    $(this).is("#refund_amount")
                ) {
                    //
                    checkDecimalNumbers = true;

                    // Đối tượng Regex
                    regex = new RegExp(
                        "[^-0-9%\\" +
                        "," +
                        "]+",
                        "gi"
                    );

                    // Đối tượng Regex
                    decimalRegex = new RegExp(
                        "[^\\" + "," + "]",
                        "gi"
                    );

                    // Class của lỗi
                    error = "i18n_mon_decimal_error";
                }
                // Kiểm tra mã iso của đất nước
                else if ($(this).is(".wc_input_country_iso")) {
                    regex = new RegExp("([^A-Z])+|(.){3,}", "im");
                    error = "i18n_country_iso_error";
                }
                //
                else {
                    checkDecimalNumbers = true;
                    regex = new RegExp(
                        "[^-0-9%\\" +
                        "," +
                        "]+",
                        "gi"
                    );
                    decimalRegex = new RegExp(
                        "[^\\" + "," + "]",
                        "gi"
                    );
                    error = "i18n_decimal_error";
                }

                // Lấy giá trị hiện tại
                var value = $(this).val();

                // Gía trị mới bằng giá trị cũ đã được xử lý
                var newvalue = value.replace(regex, "");

                // Check if newvalue have more than one decimal point.
                // Kiểm tra nếu độ dài lớn hơn 1
                if (
                    checkDecimalNumbers &&
                    1 < newvalue.replace(decimalRegex, "").length
                ) {
                    newvalue = newvalue.replace(decimalRegex, "");
                }

                // Kiểm tra nếu giá trị mới khác giá trị ban đầu
                if (value !== newvalue) {
                    // Kích hoạt sự kiện khi thực hiện thêm các ký tự lạ
                    $(document.body).triggerHandler("wc_add_error_tip", [
                        $(this),
                        error,
                    ]);
                    // console.log(">>> KIỂM TRA GIÁ TRỊ MỚI");
                } else {
                    $(document.body).triggerHandler("wc_remove_error_tip", [
                        $(this),
                        error,
                    ]);
                }
            }
        )

        // XỬ LÝ SỰ KIỆN GIÁ TIỀN TRÊN GIÁ GIẢM -- GIÁ GIẢM (Sale Price)
        // Sự kiện thay đổi
        .on(
            "change",
            "#_sale_price.wc_input_price[type=text], .wc_input_price[name^=variable_sale_price]",
            function () {
                // Lấy đối tượng sale price
                var sale_price_field = $(this),
                    regular_price_field;

                // Tìm kiếm từ khóa variable trong thuộc tính name -- Nếu tìm thấy
                if (
                    sale_price_field.attr("name").indexOf("variable") !== -1
                ) {
                    regular_price_field = sale_price_field
                        .parents(".variable_pricing")
                        .find(
                            ".wc_input_price[name^=variable_regular_price]"
                        );
                }
                // Nếu không tìm thấy
                else {
                    // Lấy đối tượng sale price thông qua ID
                    regular_price_field = $("#_regular_price");
                }

                // Định dạng giá trị của sale price
                var sale_price = parseFloat(
                    // gọi đến thư viện accounting.js, sau đó gọi đến hàm unformat
                    window.accounting.unformat(
                        // lấy giá trị của sale price
                        sale_price_field.val(),
                        ","
                    )
                );

                // Định dạng giá trị của regular price
                var regular_price = parseFloat(
                    window.accounting.unformat(
                        regular_price_field.val(),
                        ","
                    )
                );

                // Kiểm tra nếu giá sale lớn hơn giá gốc thì thiết lập giá trị về rỗng
                if (sale_price >= regular_price) {
                    $(this).val("");
                }
            }
        )

        // XỬ LÝ SỰ KIỆN GIÁ TIỀN TRÊN GIÁ GIẢM -- GIÁ GIẢM (Sale Price)
        // Điều kiện: Giá giảm không được lớn hơn giá thông thường
        // Sự kiện keyup -- on keyup
        .on(
            "keyup",
            "#_sale_price.wc_input_price[type=text], .wc_input_price[name^=variable_sale_price]",
            function () {
                // lấy đối tượng sale price
                var sale_price_field = $(this),
                    regular_price_field;

                if (
                    sale_price_field.attr("name").indexOf("variable") !== -1
                ) {
                    regular_price_field = sale_price_field
                        .parents(".variable_pricing")
                        .find(
                            ".wc_input_price[name^=variable_regular_price]"
                        );
                } else {
                    // lấy đối tượng giá thông thường
                    regular_price_field = $("#_regular_price");
                }

                // Định dạng giá hiện tại
                var sale_price = parseFloat(
                    window.accounting.unformat(
                        sale_price_field.val(),
                        ","
                    )
                );

                // Định dạng giá hiện tại
                var regular_price = parseFloat(
                    window.accounting.unformat(
                        regular_price_field.val(),
                        ","
                    )
                );

                // Nếu giá bán lớn hơn giá thông thường
                if (sale_price >= regular_price) {
                    // Thông báo lỗi
                    $(document.body).triggerHandler("wc_add_error_tip", [
                        $(this),
                        "i18n_sale_less_than_regular_error",
                    ]);
                } else {
                    $(document.body).triggerHandler("wc_remove_error_tip", [
                        $(this),
                        "i18n_sale_less_than_regular_error",
                    ]);
                }
            }
        )
})

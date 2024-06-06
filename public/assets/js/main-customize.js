$(document).ready(function () {
   // ----------- THE LOAI ------------ //
    $(".addCategoryBtn").on('click', function (event) {
       event.preventDefault();
       let href = $(this).data('href');
       $("#addCategoryForm").attr('action', href);
    });

    //
    $('#category-table .categoryEdit').on('click', function (event) {
        event.preventDefault();
        let href = $(this).data('href');

        $("#addCategoryForm").attr('action', href);

        //
        $.ajax({
            url: href,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {},
            //
            success: function (response) {
                console.log(response);

                if(response.status == 200) {
                    let data = response.data;

                    let addCategory = $('#addCategoryModal .addCategoryModal');

                    addCategory.find("input[name=tentheloai]").val(data.tenloai);

                    let imageEdit = addCategory.find(".imageEdit");
                    imageEdit.find("#holder > img").attr({'src':data.anhbia, 'alt': data.tenloai});
                    imageEdit.find("input[name=anhbia]").val(data.anhbia);

                    CKEDITOR.instances.motatheloai.setData(data.mota);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    });
    // ----------- END THE LOAI ------------ //

    // ----------- SAN PHAM ----------- //

});



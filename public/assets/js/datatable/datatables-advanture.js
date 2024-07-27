// -- DataTables
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('.listTable #OrderTable thead tr').clone(true).appendTo( '#OrderTable thead' );
    $('.listTable #OrderTable thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search '+title+'" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

    var table = $('.listTable #OrderTable').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
    });

    //
    var dtLayout = $('#OrderTable_wrapper .dt-layout-row');
    dtLayout.first().addClass('p-3');
    dtLayout.last().addClass('p-3');
});

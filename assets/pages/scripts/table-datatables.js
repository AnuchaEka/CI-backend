var TableDatatablesManaged = function () {


    var initTable2 = function () {

        var table = $('#sample_2');

        table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "ไม่มีข้อมูล",
                "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบรายการ",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First",
                    "page": "หน้า",
                    "pageOf": "จาก"
                }
            },
            "bStateSave": true,
            "pagingType": "bootstrap_extended",
            "ordering": false,
            "lengthChange": false,
            "searching": false,
            "pageLength": 20,
            "columnDefs": [{ 
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ]
        });

        var tableWrapper = jQuery('#sample_2_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).prop("checked", true);
                } else {
                    $(this).prop("checked", false);
                }
            });
        });
    }

  

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable2();
       
        }

    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
}
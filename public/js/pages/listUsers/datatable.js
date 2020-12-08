"use strict";
var KTDatatablesBasicBasic = function() {

    var initTable = function() {

        // begin first table
        var table = $('#kt_datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,

            // DOM Layout settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            lengthMenu: [5, 10, 25, 50],
            pageLength: 25,
            searchDelay: 500,
            order: [[1, 'asc']],

            language: {
                "url": "/json/dataTables.portuguese.lang.json"
            },

            ajax: {
                url: "/api/users/list",
                type: 'POST',
                data: {
                    columnsDef: ['privilege'],
                },
            },

            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'privilege', name: 'privilege'},
                {data: 'email', name: 'email'},
                {data: 'date', name: 'date'},
                {data: 'id', name: 'id'},
            ],

            columnDefs: [
                {
                    targets: 5,
                    className: "dt-center",
                    render: function(data) {
                        return `<div class="d-flex justify-content-center">\
                            <a href="/perfil/${data}" class="btn btn-sm btn-primary btn-icon">\
                                <i class="fa fa-info-circle fa-md"></i>\
                            </a>\
                        </div>`;
                    },
                },
            ],
        });

        $('#kt_search').on('click', function(e) {
            e.preventDefault();

            var params = {};
            $('.datatable-input').each(function() {

                var i = $(this).data('col-index');

                if (params[i]) {
                    params[i] += '|' + $(this).val();
                }
                else {
                    params[i] = $(this).val();
                }

            });

            $.each(params, function(i, val) {

                table.column(i).search(val ? val : '', false, false);

            });
            table.table().draw();
        });

    };

    return {

        //main function to initiate the module
        init: function() {
            initTable();
        }
    };
}();

jQuery(document).ready(function() {
    KTDatatablesBasicBasic.init();
    $('.kt-selectpicker').selectpicker();
});
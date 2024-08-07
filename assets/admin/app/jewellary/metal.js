$(document).ready(function() {
    var dataTable = $('#metal-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'get-jewellary-metals',
            'type': 'POST'
        },
        'columns': [
            { data: null, render: function(data, type, row, meta) { return meta.row + 1; }, title: 'Sr No' },
            { data: 'metal_name' },
            { data: 'making_charge' },
            { data: 'density' },
            { data: 'rate_as_per_api' },
            { data: 'manual_date' },
            { data: 'manual_rate' },
            { 
                data: 'use_api_rate',
                render: function(data) {
                    return `<input type="checkbox" disabled ${data === 'Yes' ? 'checked' : ''}>`;
                }
            },
            { 
                data: 'use_manual_rate',
                render: function(data) {
                    return `<input type="checkbox" disabled ${data === 'Yes' ? 'checked' : ''}>`;
                }
            },
            { data: 'metal_id', className: "text-center", render: function(data) { return actionMenu(data); } }
        ]
    });

    $.validate({ form: '#registration-form' });

    $(document).on('submit', '#registration-form', function(event) {
        event.preventDefault();
        if ($(this).isValid()) {
            var params = {
                metal_name: $('#metal_name').val(),
                making_charge: $('#making_charge').val(),
                density: $('#density').val(),
                rate_as_per_api: $('#rate_as_per_api').val(),
                manual_date: $('#manual_date').val(),
                manual_rate: $('#manual_rate').val(),
                use_api_rate: $('#use_api_rate').is(':checked') ? 'Yes' : 'No',
                use_manual_rate: $('#use_manual_rate').is(':checked') ? 'Yes' : 'No',
                metal_id: $('#metal_id').val() || ''
            };

            $.Utility.postData('set-jewellary-metal', params, function(response) {
                response = JSON.parse(response);
                if (response.state) {
                    $.Utility.notify(response);
                    toggleView(); // Show the table and hide the form
                    dataTable.ajax.reload(); // Refresh DataTable
                } else {
                    var message = typeof response.message === 'object' ? Object.values(response.message)[0] : response.message;
                    $.Utility.notify({ message: message });
                    if (response.redirect) {
                        setTimeout(function() { window.location = response.redirect; }, 3000);
                    }
                }
            });
        }
    });

    $(document).on('click', '.toggle-form', function() {
        toggleView();
    });

    function actionMenu(metal_id) {
        return `
            <div class="action">
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="metal-${metal_id}" title="Edit">Edit</a> |
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="metal-${metal_id}" title="Delete">Delete</a>
            </div>
        `;
    }

    $('#metal-table').on('click', 'tbody .menu-item', function(event) {
        event.preventDefault();
        var metalId = $(this).data('id').split('-')[1];
        var action = $(this).data('action');
        performActions(metalId, action);
    });

    function performActions(metalId, action) {
        switch (action) {
            case 'edit':
                getMetal(metalId);
                break;
            case 'delete':
                deleteMetal(metalId);
                break;
        }
    }

    function getMetal(metalId) {
        $.Utility.getData('get-jewellary-metal', { metal_id: metalId }, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                var data = response.data;
                $('#metal_id').val(data.metal_id);
                $('#metal_name').val(data.metal_name);
                $('#making_charge').val(data.making_charge);
                $('#density').val(data.density);
                $('#rate_as_per_api').val(data.rate_as_per_api);
                $('#manual_date').val(data.manual_date);
                $('#manual_rate').val(data.manual_rate);
                $('#use_api_rate').prop('checked', data.use_api_rate === 'Yes');
                $('#use_manual_rate').prop('checked', data.use_manual_rate === 'Yes');
                toggleView(); // Show the form
            } else {
                var message = typeof response.message === 'object' ? Object.values(response.message)[0] : response.message;
                $.Utility.notify({ message: message });
            }
        });
    }

    function deleteMetal(metalId) {
        bootbox.confirm({
            title: "Delete Metal",
            message: "Do you want to delete this metal?",
            onEscape: false,
            backdrop: 'static',
            centerVertical: true,
            className: "user-delete-modal",
            buttons: {
                confirm: { label: 'Yes', className: 'btn-square btn-primary' },
                cancel: { label: 'No', className: 'btn-square btn-danger' }
            },
            callback: function(result) {
                if (result) {
                    $.Utility.postData('delete-jewellary-metal', { metal_id: metalId }, function(response) {
                        response = JSON.parse(response);
                        if (response.state) {
                            $.Utility.notify(response);
                            dataTable.ajax.reload(); // Refresh DataTable
                        } else {
                            var message = typeof response.message === 'object' ? Object.values(response.message)[0] : response.message;
                            $.Utility.notify({ message: message });
                        }
                    });
                }
            }
        });
    }

    // Ensure only one checkbox is checked at a time
    $('#use_api_rate').on('change', function() {
        if ($(this).is(':checked')) {
            $('#use_manual_rate').prop('checked', false);
        }
    });

    $('#use_manual_rate').on('change', function() {
        if ($(this).is(':checked')) {
            $('#use_api_rate').prop('checked', false);
        }
    });
});

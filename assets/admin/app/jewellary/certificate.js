$(document).ready(function() {
    var dataTable = $('#certificate-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'get-jewellary-certificates',
            'type': 'POST'
        },
        'columns': [
            { data: null, render: function(data, type, row, meta) { return meta.row + 1; }, title: 'Sr No' },
            { data: 'institute_name' },
            { data: 'minimum_for_123_carat' },
            { data: 'minimum_for_x_diamond_wt' }, // Updated column for new field
            { data: 'rate_per_carat' },
            { data: 'total' },
            { 
                data: 'certificate_id', className: "text-center", render: function(data) { return actionMenu(data); } 
            }
        ]
    });

    $.validate({ form: '#certificate-form' });

    $(document).on('submit', '#certificate-form', function(event) {
        event.preventDefault();
        if ($(this).isValid()) {
            var params = {
                institute_name: $('#institute_name').val(),
                minimum_for_123_carat: $('#minimum_for_123_carat').val(),
                minimum_for_x_diamond_wt: $('#minimum_for_x_diamond_wt').val(), // Include new field
                rate_per_carat: $('#rate_per_carat').val(),
                total: $('#total').val(),
                certificate_id: $('#certificate_id').val() || ''
            };

            $.Utility.postData('set-jewellary-certificate', params, function(response) {
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

    function actionMenu(certificate_id) {
        return `
            <div class="action">
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="certificate-${certificate_id}" title="Edit">Edit</a> |
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="certificate-${certificate_id}" title="Delete">Delete</a>
            </div>
        `;
    }

    $('#certificate-table').on('click', 'tbody .menu-item', function(event) {
        event.preventDefault();
        var certificateId = $(this).data('id').split('-')[1];
        var action = $(this).data('action');
        performActions(certificateId, action);
    });

    function performActions(certificateId, action) {
        switch (action) {
            case 'edit':
                getCertificate(certificateId);
                break;
            case 'delete':
                deleteCertificate(certificateId);
                break;
        }
    }

    function getCertificate(certificateId) {
        $.Utility.getData('get-jewellary-certificate', { certificate_id: certificateId }, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                var data = response.data;
                $('#certificate_id').val(data.certificate_id);
                $('#institute_name').val(data.institute_name);
                $('#minimum_for_123_carat').val(data.minimum_for_123_carat);
                $('#minimum_for_x_diamond_wt').val(data.minimum_for_x_diamond_wt); // Populate new field
                $('#rate_per_carat').val(data.rate_per_carat);
                $('#total').val(data.total);
                toggleView(); // Show the form
            } else {
                var message = typeof response.message === 'object' ? Object.values(response.message)[0] : response.message;
                $.Utility.notify({ message: message });
            }
        });
    }

    function deleteCertificate(certificateId) {
        bootbox.confirm({
            title: "Delete Certificate",
            message: "Do you want to delete this certificate?",
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
                    $.Utility.postData('delete-jewellary-certificate', { certificate_id: certificateId }, function(response) {
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
});

$(document).ready(function() {
    var dataTable = $('#certificate-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'get-metal-platings',
            'type': 'POST'
        },
        'columns': [
            { data: null, render: function(data, type, row, meta) { return meta.row + 1; }, title: 'Sr No' },
            { data: 'metal_plate_name' },
            { 
                data: 'metal_plate_image', 
                render: function(data) { 
                    var imagePath = './assets/uploads/metal_platings/' + data; 
                    return `<img src="${imagePath}" style="width: 100px;">`; 
                }, 
                title: 'Image'
            },
            { 
                data: 'metal_plate_id', className: "text-center", render: function(data) { return actionMenu(data); } 
            }
        ]
    });

    // Ensure the form validation library is included and properly configured
    $.validate({ form: '#metal-plating-form' });

    $(document).on('submit', '#metal-plating-form', function(event) {
        event.preventDefault();
        if ($(this).isValid()) {
            var formData = new FormData(this);
            $.ajax({
                url: 'set-metal-plating',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.state) {
                        $.Utility.notify(response);
                        toggleView(); // Show the table and hide the form
                        dataTable.ajax.reload(); // Refresh DataTable
                    } else {
                        $.Utility.notify({ message: response.message });
                        if (response.redirect) {
                            setTimeout(function() { window.location = response.redirect; }, 3000);
                        }
                    }
                }
            });
        }
    });

    $(document).on('click', '.toggle-form', function() {
        $('#metal_plate_image_preview').hide();
        $('#card-title-metal-plating').text('Add Metal Plating');
        toggleView();
    });

    function actionMenu(metal_plate_id) {
        return `
            <div class="action">
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="metal_plate-${metal_plate_id}" title="Edit">Edit</a> |
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="metal_plate-${metal_plate_id}" title="Delete">Delete</a>
            </div>
        `;
    }

    $('#certificate-table').on('click', 'tbody .menu-item', function(event) {
        event.preventDefault();
        var metalPlateId = $(this).data('id').split('-')[1];
        var action = $(this).data('action');
        performActions(metalPlateId, action);
    });

    function performActions(metalPlateId, action) {
        switch (action) {
            case 'edit':
                getMetalPlating(metalPlateId);
                break;
            case 'delete':
                deleteMetalPlating(metalPlateId);
                break;
        }
    }

    // Handle file input change to show image preview
    $('#metal_plate_image').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#metal_plate_image_preview').attr('src', e.target.result).show();
            };

            reader.readAsDataURL(file);
        } else {
            $('#metal_plate_image_preview').hide();
        }
    });
    
    function getMetalPlating(metalPlateId) {
        $.Utility.getData('get-metal-plating', { metal_plate_id: metalPlateId }, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                $('#card-title-metal-plating').text('Edit Metal Plating');
                var data = response.data;
                $('#metal_plate_id').val(data.metal_plate_id);
                $('#metal_plate_name').val(data.metal_plate_name);
    
                // Set the image source for preview
                if (data.metal_plate_image) {
                    var imagePath = './assets/uploads/metal_platings/' + data.metal_plate_image;
                    $('#metal_plate_image_preview').attr('src', imagePath).show(); // Show image preview
                } else {
                    $('#metal_plate_image_preview').hide(); // Hide image preview if no image
                }
    
                toggleView(); // Show the form
            } else {
                $.Utility.notify({ message: response.message });
            }
        });
    }
    
    function deleteMetalPlating(metalPlateId) {
        bootbox.confirm({
            title: "Delete Metal Plating",
            message: "Do you want to delete this metal plating?",
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
                    $.Utility.postData('delete-metal-plating', { metal_plate_id: metalPlateId }, function(response) {
                        response = JSON.parse(response);
                        if (response.state) {
                            $.Utility.notify(response);
                            dataTable.ajax.reload(); // Refresh DataTable
                        } else {
                            $.Utility.notify({ message: response.message });
                        }
                    });
                }
            }
        });
    }
});
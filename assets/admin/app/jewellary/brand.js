$(document).ready(function(){
    $.validate({form : '#brand-form'});
    var brandFormElem = document.getElementById('brand-form');
    
    $(brandFormElem).on('submit', function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        var formValid =  $(event.currentTarget).isValid();
        if(formValid){
            var brand_id = $('#brand_id').val();
            var endpoint  = 'set-jewellary-brand'; // Update endpoint

            var params = {
                brandName             : $('#brandName').val(),
                brandHomePageURL      : $('#brandHomePageURL').val(),
                brand_id              : (brand_id !== '' || brand_id !== undefined)?brand_id:''
            }

            $.Utility.postData(endpoint, params, function(response){
                response = JSON.parse(response);
                if(response.state){
                    $.Utility.notify(response);
                    toggleView();
                    initTable();
                } else {
                    if (typeof response.message === 'object') {
                        for (var key in response.message) {
                            response.message = response.message[key];
                            $.Utility.notify(response);
                        }
                    } else {
                        $.Utility.notify(response);
                    }

                    if (response.redirect !== undefined) {
                        setTimeout(function() {
                            window.location = response.redirect;
                        }, 3000);
                    }
                }
            });
        }
    });

    initTable();
    function initTable(){
        var tableDom = document.getElementById('brand-table');
        var dataTable = $(tableDom).DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'destroy': true,
            'ordering': false,
            'ajax': {
                'url': 'get-jewellary-brands' // Update endpoint
            },
            'columns': [
                { data: 'brand_id' },
                { data: 'brandName' },
                { data: 'brandHomePageURL' },
                { data: 'brand_id',
                  className: "text-center", 
                  render: function ( data, type, row, meta ) {
                      return actionMenu(data);
                  }
                },
            ],
        });

        $(tableDom).on('click', 'tbody .menu-item', function(event){
            event.stopImmediatePropagation();
            event.preventDefault();
            var brandId = $(this).data('id').split('-')[1];
            var action = $(this).data('action');
            performActions(brandId, action);
        });

        $('.toggle-form').on('click', function(){
            toggleView();
        });
    }

    function actionMenu(brand_id){
        var menus = `
            <div class="action">
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="brand-${brand_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="brand-${brand_id}" title="Delete">Delete</a>
            </div>
        `;
        return menus;
    }

    function deleteBrand(brandId){
        bootbox.confirm({ 
            title: "Delete Brand",
            message: "Do you want to delete this brand?",
            onEscape: false,
            backdrop: 'static',
            centerVertical: true,
            className: "user-delete-modal",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-square btn-primary'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-square btn-danger'
                }
            },
            callback: function (result) {
               if(result){
                    var params = {
                        brand_id: brandId,
                    }
                    $.Utility.postData('delete-jewellary-brand', params, function(response){
                        response = JSON.parse(response);
                        if(response.state){
                            $.Utility.notify(response);
                            initTable();
                        } else {
                            if (typeof response.message === 'object') {
                                for (var key in response.message) {
                                    response.message = response.message[key];
                                    $.Utility.notify(response);
                                }
                            } else {
                                $.Utility.notify(response);
                            }
                        }
                    });
               }
            }
        });
    }

    function getBrand(brandId){
        var endpoint = 'get-jewellary-brand'; // Update endpoint
        var params = {
            brand_id: brandId,
        }
        $.Utility.getData(endpoint, params, function(response){
            response = JSON.parse(response);
            if(response.state){
                var data = response.data;
                $('#brand_id').val(data.brand_id);
                $('#brandName').val(data.brandName);
                $('#brandHomePageURL').val(data.brandHomePageURL);
                toggleView();
            } else {
                if (typeof response.message === 'object') {
                    for (var key in response.message) {
                        response.message = response.message[key];
                        $.Utility.notify(response);
                    }
                } else {
                    $.Utility.notify(response);
                }
            }
        });
    }

    function performActions(brandId, action){
        switch(action){
            case 'edit':
                getBrand(brandId);
            break;
            case 'delete':
                deleteBrand(brandId);
            break; 
        }
    }
});

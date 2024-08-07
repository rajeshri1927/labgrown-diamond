$(document).ready(function(){
    $.validate({form : '#celebrity-form'});
    var celebrityFormElem = document.getElementById('celebrity-form');
    
    $(celebrityFormElem).on('submit', function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        var formValid = $(event.currentTarget).isValid();
        if(formValid){
            var celebrity_id = $('#celebrity_id').val();
            var endpoint  = 'set-jewellary-celebrity'; // Update endpoint

            var params = {
                celebrities_name    : $('#celebrities_name').val(),
                text_content_for_seo: $('#text_content_for_seo').val(),
                link                : $('#link').val(),
                celebrity_id        : (celebrity_id !== '' || celebrity_id !== undefined)?celebrity_id:''
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
        var tableDom = document.getElementById('celebrity-table');
        var dataTable = $(tableDom).DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'destroy': true,
            'ordering': false,
            'ajax': {
                'url': 'get-jewellary-celebrities' // Update endpoint
            },
            'columns': [
                { data: 'celebrity_id' },
                { data: 'celebrities_name' },
                { data: 'text_content_for_seo' },
                { data: 'link' },
                { data: 'celebrity_id',
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
            var celebrityId = $(this).data('id').split('-')[1];
            var action = $(this).data('action');
            performActions(celebrityId, action);
        });

        $('.toggle-form').on('click', function(){
            toggleView();
        });
    }

    function actionMenu(celebrity_id){
        var menus = `
            <div class="action">
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="celebrity-${celebrity_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="celebrity-${celebrity_id}" title="Delete">Delete</a>
            </div>
        `;
        return menus;
    }

    function deleteCelebrity(celebrityId){
        bootbox.confirm({ 
            title: "Delete Celebrity",
            message: "Do you want to delete this celebrity?",
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
                        celebrity_id: celebrityId,
                    }
                    $.Utility.postData('delete-jewellary-celebrity', params, function(response){
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

    function getCelebrity(celebrityId){
        var endpoint = 'get-jewellary-celebrity'; // Update endpoint
        var params = {
            celebrity_id: celebrityId,
        }
        $.Utility.getData(endpoint, params, function(response){
            response = JSON.parse(response);
            if(response.state){
                var data = response.data;
                $('#celebrity_id').val(data.celebrity_id);
                $('#celebrities_name').val(data.celebrities_name);
                $('#text_content_for_seo').val(data.text_content_for_seo);
                $('#link').val(data.link);
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

    function performActions(celebrityId, action){
        switch(action){
            case 'edit':
                getCelebrity(celebrityId);
            break;
            case 'delete':
                deleteCelebrity(celebrityId);
            break; 
        }
    }
});

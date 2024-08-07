$(document).ready(function(){
	$.validate({form : '#overtone-form'});
	var overtoneFormElem = document.getElementById('overtone-form');
	$(overtoneFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var overtone_id = $('#overtone_id').val();
			var endpoint 	= 'set-overtone-details';
			
			var params 		= {
				overtone_name			: $('#overtone_name').val(),
				overtone_desc			: $('#overtone_desc').val(),
				display					: 'Y',
				overtone_id 			: (overtone_id !== '' || overtone_id !== undefined)?overtone_id:''
			}

			$.Utility.postData(endpoint,params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					toggleView();
					location.reload();
					initTable();
				}else{
					if(typeof response.message === 'object'){
						for(var key in response.message ){
							response.message = response.message[key];
							$.Utility.notify(response);
						}
					}else{
						$.Utility.notify(response);
					}

					if(response.redirect !== undefined){
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
		var tableDom 	= document.getElementById('overtone-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-overtones'
	  		},
	  		'columns': [
				{ 	data: 'overtone_id' },
	     		{ 	data: 'overtone_name' },
	     		{ 	data: 'overtone_desc' },
                {   data: 'display',
                 className: "text-center",
                 render: function (data, type, row, meta) {
                     return `
                         <label class="switch switch-default switch-pill switch-primary">
                             <input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.overtone_id}">
                             <span class="switch-label"></span>
                             <span class="switch-handle"></span>
                         </label>`;
                 }
                },
	    	 	{ 	data: 'overtone_id',
	    	 		className: "text-center", 
	    	 		render: function ( data, type, row, meta ) {
	    	 			return actionMenu(data);
    				}
	    	 	},
	  		],
		});

		$(tableDom).on('click','tbody .menu-item', function(event){
			event.stopImmediatePropagation();
			event.preventDefault();
			var overtoneId 	= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(overtoneId, action);
		});
           
        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  = $(e.currentTarget);
			let overtone_id    = currentTarget.data('id');
			let params = {
				overtone_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-overtone-display',params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					initTable();
				}else{
					if(typeof response.message === 'object'){
						for(var key in response.message ){
							$.Utility.notify(response);
						}
					}else{
						$.Utility.notify(response);
					}
				}
			});
		});

		$('.toggle-form').on('click', function(){
			toggleView();
		})
	}

	function actionMenu(overtone_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="overtone-${overtone_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="overtone-${overtone_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteOvertone(overtoneId){
		bootbox.confirm({ 
		    title  			: "Delete Overtone",
		    message			: "Do you watn to delete overtone?",
		    onEscape		: false,
		    backdrop 		: 'static',
		    centerVertical 	: true,
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
		       			overtone_id : overtoneId,
		       		}
		       		$.Utility.postData('delete-overtone',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							initTable();
						}else{
							if(typeof response.message === 'object'){
								for(var key in response.message ){
									response.message = response.message[key];
									$.Utility.notify(response);
								}
							}else{
								$.Utility.notify(response);
							}
						}
					});
		       	}
		    }
		});
	}

	function getOvertone(overtoneId){
		var endpoint 	= 'get-overtone';
        console.log(overtoneId);
		var params 		= {
			overtone_id : overtoneId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#overtone_id').val(data.overtone_id);
				$('#overtone_name').val(data.overtone_name);
				$('#overtone_desc').val(data.overtone_desc);
				toggleView();
			} else {
				if(typeof response.message === 'object'){
					for(var key in response.message ){
						response.message = response.message[key];
						$.Utility.notify(response);
					}
				}else{
					$.Utility.notify(response);
				}
			}
		})
	}

	function performActions(overtoneId, action){
		switch(action){
			case 'edit':
				getOvertone(overtoneId);
			break;
			case 'delete':
				deleteOvertone(overtoneId);
			break; 
		}
	}
});
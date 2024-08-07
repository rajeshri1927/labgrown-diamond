$(document).ready(function(){
	$.validate({form : '#role-form'});
	var roleFormElem = document.getElementById('role-form');
	$(roleFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var role_id     = $('#role_id').val();
			var endpoint 	= 'set-role';
			
			var params 		= {
				role_title			: $('#role_title').val(),
				role_desc			: $('#role_desc').val(),
				display				: 'Y',
				role_id 			: (role_id !== '' || role_id !== undefined)?role_id:''
			}

			$.Utility.postData(endpoint,params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					toggleView();
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
		var tableDom 	= document.getElementById('role-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-roles'
	  		},
	  		'columns': [
				{ 	data: 'role_id' },
	     		{ 	data: 'role_title' },
	     		{ 	data: 'role_desc' },
				{ 
					data: 'display',
					className: "text-center",
					render: function (data, type, row, meta) {
						return `
							<label class="switch switch-default switch-pill switch-primary">
								<input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.role_id}">
								<span class="switch-label"></span>
								<span class="switch-handle"></span>
							</label>`;
					}
				},
	    	 	{ 	data: 'role_id',
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
			var roleId 		= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(roleId, action);
		});

		$(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  	= $(e.currentTarget);
			let role_id 		= currentTarget.data('id');
			let params = {
				role_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-role-display',params,function(response){
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

	function actionMenu(role_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="role-${role_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="role-${role_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteRole(roleId){
		bootbox.confirm({ 
		    title  			: "Delete Role",
		    message			: "Do you watn to delete role?",
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
		       			role_id : roleId,
		       		}
		       		$.Utility.postData('delete-role',params,function(response){
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

	function getRole(roleId){
		var endpoint 	= 'get-role';
		var params 		= {
			role_id : roleId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#role_id').val(data.role_id);
				$('#role_title').val(data.role_title);
				$('#role_desc').val(data.role_desc);
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

	function performActions(roleId, action){
		switch(action){
			case 'edit':
				getRole(roleId);
			break;
			case 'delete':
				deleteRole(roleId);
			break; 
		}
	}
});
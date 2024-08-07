$(document).ready(function(){
	getSubAdmin();
	let form_view = document.getElementById('form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getSubAdminFrom()
		}
	});

    function getSubAdminFrom(user_id = null){
    	let endpoint = 'get-subadmin-form-view';
    	let formdata = {
    		user_id : (user_id != null)?user_id:''
    	};
    	
    	$.Utility.getData(endpoint,formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				let subadmin_form   = document.getElementById('subadmin-form');
				
				$.validate({
        			form : '#subadmin-form',
        			modules : 'security'
    			});

    			if(user_id != null){
    				$('#card-title').text('Update Subadmin');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Subadmin');
    				$('.btn-form-submit').text('Save');
    			}
    			subadmin_form.addEventListener('submit', setRoleDetails);
				$('.toggle-form').on('click', function(){
					if ($('.form-view').is(':visible')) {
						$('.form-view').css('display','none');
						$('.list-view').css('display','flex');
						form_view.innerHTML = '';
					} 
				});
    		}
    	});
    }

	function setRoleDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-user-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			setTimeout(() => {
				$.Utility.postMultipartData(endpoint, formData, (response) => {
					$.Utility.enableBtn('.btn-primary');
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							$('.form-view').css('display','none');
							$('.list-view').css('display','flex');
							form_view.innerHTML = '';
							getSubAdmin();
						}, 2000);
					} else {
						if(typeof response.message === 'object'){
							$.each(response.message, (key, value)=>{
								let errorRes = {
									title: key,
									message: value,
									type: 'error'
								};
								$.Utility.notify(errorRes);
							});
						} else {
							$.Utility.notify(response);
						}
					}
				});
			}, 20);
		}
	}

	function getSubAdmin(){
		let table_body          = document.getElementById('table-body');
		let subadmin_list_table = document.getElementById('subadmin-list'); 
		let endpoint = 'get-all-subadmin';
    	let formdata = {};
    	let tbl_body = '';
		if ($.fn.DataTable.isDataTable(subadmin_list_table)) {
			$(subadmin_list_table).DataTable().destroy();
		}
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.user_id}</td>
							<td class="text-center">${element.first_name}</td>
							<td class="text-center">${element.last_name}</td>
							<td class="text-center">${element.role_title}</td>
							<td class="text-center">${element.email}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.user_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.user_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.user_id}"> Delete </a>
							</td>
						</tr>
    				`
    			});
    			if (table_body !== null) {
        			table_body.innerHTML = tbl_body;
        			$(table_body).on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let action 			= currentTarget.data('action');
        				let user_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editSubAdmin(user_id);
        				} else {
        					deleteSubAdmin(user_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let user_id 		= currentTarget.data('id');
        				let params = {
        					user_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-subadmin-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getSubAdmin();
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
    		 	}
    		 setTimeout(() => {
                $(subadmin_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="7">
								<strong>There are no subadmin added yet.</strong>
							</td>
						</tr>
    				`
				table_body.innerHTML = tbl_body;

    		}
    	});
	}

	function deleteSubAdmin(userId){
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
		       			user_id : userId,
		       		}
		       		$.Utility.postData('delete-subadmin',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getSubAdmin();
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

	function editSubAdmin(userId){
		getSubAdminFrom(userId);
	}
});
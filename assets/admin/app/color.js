(($) => {
	let form_view = document.getElementById('form-view'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getColorFrom()
		}
	});

    function getColorFrom(color_id = null){
    	let endpoint = 'get-color-form-view';
    	let formdata = {
    		color_id : (color_id!= null)?color_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let color_form  = document.getElementById('registration-form');
    			let color_image = document.getElementById('color_image');
				
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    		
    			if(color_id!= null){
    				$('#card-title').text('Update Color');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Color');
    				$('.btn-form-submit').text('Save');
    			}
				color_image.addEventListener('change', uploadPreview);
				color_form.addEventListener('submit', setColorDetails);

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

    function uploadPreview(event){
		let input = event.target;
	  	if (input.files && input.files[0]) {
	    	var reader = new FileReader();
	    	reader.onload = function(e) {
	      	 	$('#color_image_placeholder').attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}
	
	function setColorDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-color-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('color_image', $('#color_image')[0].files[0]); 
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
							getColor();
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

	function getColor(){
		let table_body         = document.getElementById('table-body');
		let color_list_table   = document.getElementById('color-list'); 
		let endpoint = 'get-color';
    	let formdata = {};
    	let tbl_body = '';
    	$(color_list_table).DataTable().clear();
        $(color_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
                            <td><div>${element.color_id}</div></td>
							<td><div>${element.color_name}</div></td>
    					    <td class="text-center"><img alt="Lab Grown Diamond" class="img-responsive" src="./assets/uploads/color/${element.system_file_name}" title="Lab Grown Diamond Admin Panel" style="height: 40px;"></td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.color_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.color_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.system_file_name}" data-id="${element.color_id}"> Delete </a>
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
        				let color_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editColor(color_id);
        				} else {
        					let color_image = currentTarget.data('image');
        					deleteColor(color_id, color_image);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let color_id 		= currentTarget.data('id');
        				let params = {
        					color_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-color-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getColor();
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
                $(color_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="6">
								<strong>There are no color added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editColor(color_id){
		getColorFrom(color_id);
	}

	function deleteColor(color_id, color_image){
		bootbox.confirm({ 
		    title  			: "Delete Color",
		    message			: "Do you watn to Color?",
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
		       		let params = {
                        color_image,
                        color_id
		       		}
		       		$.Utility.postData('delete-color',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getColor();
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
		       	}
		    }
		});
	}

    getColor();
})(jQuery);
(($) => {
	let form_view = document.getElementById('form-view'); 
    	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getFancyColorFrom()
		}
	});

    function getFancyColorFrom(fancy_color_id = null){
    	let endpoint = 'get-fancy-color-form-view';
    	let formdata = {
    		fancy_color_id : (fancy_color_id!= null)?fancy_color_id:''
    	};
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let fancy_color_form  = document.getElementById('registration-form');
    			let fancy_color_image = document.getElementById('fancy_color_image');
				
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    		
    			if(fancy_color_id!= null){
    				$('#card-title').text('Update Color');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Color');
    				$('.btn-form-submit').text('Save');
    			}
				fancy_color_image.addEventListener('change', uploadPreview);
				fancy_color_form.addEventListener('submit', setFancyColorDetails);

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
	      	 	$('#fancy_color_image_placeholder').attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}
	
	function setFancyColorDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-fancy-color-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('fancy_color_image', $('#fancy_color_image')[0].files[0]); 
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
							getFancyColor();
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

	function getFancyColor(){
		let table_body             = document.getElementById('table-body');
		let fancy_color_list_table = document.getElementById('fancy-color-list'); 
		let endpoint = 'get-fancy-color';
    	let formdata = {};
    	let tbl_body = '';
    	$(fancy_color_list_table).DataTable().clear();
        $(fancy_color_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
                            <td><div>${element.fancy_color_id}</div></td>
							<td><div>${element.fancy_color_name}</div></td>
    					    <td class="text-center"><img alt="Lab Grown Diamond" class="img-responsive" src="./assets/uploads/fancycolor/${element.system_file_name}" title="Lab Grown Diamond Admin Panel" style="height: 40px;"></td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.fancy_color_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.fancy_color_id}"> Edit </a> |
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.system_file_name}" data-id="${element.fancy_color_id}"> Delete </a>
							</td>
						</tr>`
    			});
    			if (table_body !== null) {
        			table_body.innerHTML = tbl_body;
        			$(table_body).on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let action 			= currentTarget.data('action');
        				let fancy_color_id  = currentTarget.data('id');
        				if(action === 'edit'){
        					editFancyColor(fancy_color_id);
        				} else {
        					let fancy_color_image = currentTarget.data('image');
        					deleteFancyColor(fancy_color_id, fancy_color_image);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let fancy_color_id 	= currentTarget.data('id');
        				let params = {
        					fancy_color_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-fancy-color-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getFancyColor();
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
                $(fancy_color_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="6">
								<strong>There are no fancy color added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editFancyColor(fancy_color_id){
		getFancyColorFrom(fancy_color_id);
	}

	function deleteFancyColor(fancy_color_id, fancy_color_image){
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
                        fancy_color_image,
                        fancy_color_id
		       		}
		       		$.Utility.postData('delete-fancy-color',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getFancyColor();
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
    getFancyColor();
})(jQuery);
(($) => {
	let form_view = document.getElementById('form-view'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getShapeFrom()
		}
	});

    function getShapeFrom(shape_id = null){
    	let endpoint = 'get-shape-form-view';
    	let formdata = {
    		shape_id : (shape_id != null)?shape_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let shape_form  = document.getElementById('registration-form');
    			let shape_image = document.getElementById('shape_image');
				
				$.validate({
        			form : '#registration-form',
        			modules :'security'
    			});
    		
    			if(shape_id!= null){
    		 	$('#card-title').text('Update Product');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Product');
    				$('.btn-form-submit').text('Save');
    			}
				shape_image.addEventListener('change', uploadPreview);
				shape_form.addEventListener('submit', setShapeDetails);

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
	      	 	$('#shape_image_placeholder').attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}
	
	function setShapeDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-shape-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('shape_image', $('#shape_image')[0].files[0]); 
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
							getShapes();
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

	function getShapes(){
		let table_body         = document.getElementById('table-body');
		let shape_list_table   = document.getElementById('shape-list'); 
		let endpoint = 'get-shape';
    	let formdata = {};
    	let tbl_body = '';
    	$(shape_list_table).DataTable().clear();
        $(shape_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
                            <td><div>${element.shape_id}</div></td>
							<td><div>${element.shape_name}</div></td>
    					    <td class="text-center">
							<img alt="Lab Grown Diamond" class="img-responsive" src="./assets/uploads/shapes/${element.system_file_name}" title="Lab Grown Diamond Admin Panel" style="height: 40px;"></td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.shape_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.shape_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.shape_image}" data-id="${element.shape_id}"> Delete </a>
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
        				let shape_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editShape(shape_id);
        				} else {
        					let shape_image = currentTarget.data('image');
        					deleteShape(shape_id, shape_image);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let shape_id 	    = currentTarget.data('id');
        				let params = {
        					shape_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-shape-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getShapes();
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
                $(shape_list_table).DataTable({
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

	function editShape(shape_id){
		getShapeFrom(shape_id);
	}

	function deleteShape(shape_id, shape_image){
		bootbox.confirm({ 
		    title  			: "Delete shape",
		    message			: "Do you watn to shape?",
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
                        shape_image,
						shape_id
		       		}
		       		$.Utility.postData('delete-shape',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getShapes();
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

    getShapes();
})(jQuery);
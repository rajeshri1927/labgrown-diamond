(($) => {
	let form_view = document.getElementById('form-view'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getClerityFrom()
		}
	});

    function getClerityFrom(clarity_id = null){
    	let endpoint = 'get-clarity-form-view';
    	let formdata = {
    		clarity_id : (clarity_id != null)?clarity_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let clarity_form  = document.getElementById('registration-form');
    			let clarity_image = document.getElementById('clarity_image');
				let clarity_video = document.getElementById('clarity_video');
				
				$.validate({
        			form : '#registration-form',
        			modules :'security'
    			});
    		
    			if(clarity_id!= null){
    		 	$('#card-title').text('Update Clarity');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Clarity');
    				$('.btn-form-submit').text('Save');
    			}
				clarity_image.addEventListener('change', uploadPreview);
				clarity_video.addEventListener('change', uploadPreview);
				clarity_form.addEventListener('submit', setClarityDetails);

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

    // function uploadPreview(event){
	// 	let input = event.target;
	//   	if (input.files && input.files[0]) {
	//     	var reader = new FileReader();
	//     	reader.onload = function(e) {
	//       	 	$('#clarity_video_placeholder').attr('src', e.target.result);
	// 			$('#clarity_image_placeholder').attr('src', e.target.result);
	//       	 	$('.custom-file-label').html(input.files[0].name);
	//     	}
	//     	reader.readAsDataURL(input.files[0]); // convert to base64 string
	//   	}
	// }
	
	function uploadPreview(event) {
		let input = event.target;
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				if (input.files[0].type.startsWith('image/')) {
					// Preview image file
					$('#clarity_image_placeholder').attr('src', e.target.result);
				} else if (input.files[0].type.startsWith('video/')) {
					// Preview video file
					$('#clarity_video_placeholder').attr('src', e.target.result);
				}
				$('.custom-file-label').html(input.files[0].name);
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
	
	function setClarityDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-clarity-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('clarity_image', $('#clarity_image')[0].files[0]); 
			formData.append('clarity_video', $('#clarity_video')[0].files[0]); 
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
							getClarity();
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

	function getClarity(){
		let table_body         = document.getElementById('table-body');
		let shape_list_table   = document.getElementById('clarity-list'); 
		let endpoint = 'get-clarity';
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
                            <td><div>${element.clarity_id}</div></td>
							<td><div>${element.clarity_name}</div></td>
    					    <td class="text-center"><img alt="Lab Grown Diamond" class="img-responsive" src="./assets/uploads/clarity/${element.system_file_name}" title="Lab Grown Diamond Admin Panel" style="height: 40px;"></td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.clarity_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.clarity_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.clarity_image}" data-id="${element.clarity_id}"> Delete </a>
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
        				let clarity_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editClarity(clarity_id);
        				} else {
        					let clarity_image = currentTarget.data('image');
        					deleteClarity(clarity_id, clarity_image);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  = $(e.currentTarget);
        				let clarity_id 	   = currentTarget.data('id');
        				let params = { 
        					clarity_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-clarity-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getClarity();
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

	function editClarity(clarity_id){
		getClerityFrom(clarity_id);
	}

	function deleteClarity(clarity_id, clarity_image){
		bootbox.confirm({ 
		    title  			: "Delete clarity",
		    message			: "Do you watn to clarity?",
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
                        clarity_image,
						clarity_id
		       		}
		       		$.Utility.postData('delete-clarity',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getClarity();
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

    getClarity();
})(jQuery);
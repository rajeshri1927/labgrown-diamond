$(document).ready(function(){

	let form_view = document.getElementById('testimonial-form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getTestimonialFrom()
		}
	});

	function getTestimonialFrom(testimonial_id = null){
    	let endpoint = 'testimonial-form-view';
    	
    	let formdata = {
    		testimonial_id : (testimonial_id != null)?testimonial_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				setTimeout(()=>{
					let testimonial_form  		= document.getElementById('testimonial-form');
	    			let testimonial_image  		= document.getElementById('testimonial_image');
	    			let testimonial_feedback 	= document.getElementById('testimonial_feedback');
	    			let maxlength 				= document.getElementById('maxlength');
					
					$.validate({
	        			form : '#testimonial_form',
	    			});

	    			$(testimonial_feedback).restrictLength($(maxlength));

	    			if(testimonial_id != null){
	    				$('#card-title').text('Update Testimonial');
	    				$('.btn-form-submit').text('Update');
	    			} else {
	    				$('#card-title').text('Add Testimonial');
	    				$('.btn-form-submit').text('Save');
	    			}
	    			
					testimonial_image.addEventListener('change', uploadPreview);
					testimonial_form.addEventListener('submit', setTestimonialDetails);

					$('.toggle-form').on('click', function(){
						if ($('.form-view').is(':visible')) {
							$('.form-view').css('display','none');
							$('.list-view').css('display','flex');
							form_view.innerHTML = '';
						} 
					});
				}, 50);
    		}
    	});
    }

    function uploadPreview(event){
		let input = event.target;
		let testimonial_image 	= document.getElementById('testimonial_image_placeholder');
	  	if (input.files && input.files[0]) {
	    	var reader = new FileReader();
	    	reader.onload = function(e) {
	      	 	$(testimonial_image).attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}

	function setTestimonialDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-or-get-testimonial';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('testimonial_image', $('#testimonial_image')[0].files[0]); 

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
							getTestimonials();
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

	function getTestimonials(testimonial_id = null){
		let endpoint 		= 'set-or-get-testimonial';
		let testimonialBody = document.getElementById('testimonial-body');
		let params 			= {
			testimonial_id : (testimonial_id != null)?testimonial_id:''
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				let data = response.data;
				let testimonials = '';
				if(data.length > 0){
					data.forEach((element) => {
						testimonials += `
							<tr>
								<td width="15%" class="text-center">
									<div class="avatar">
		                    	    	<img src="./assets/uploads/testimonials/${element.system_file_name}" class="img-avatar" alt="${element.testimonial_name}">
		                      		</div>
								</td>
								<td width="25%">${element.testimonial_name}</td>
								<td width="40%">${element.testimonial_feedback}</td>
								<td width="20%" class="text-center">
									<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.system_file_name}" data-id="${element.testimonial_id}"> Delete </a>
								</td>
							</tr>
						`;
					});
				} else {
					testimonials = `
						<tr>
							<td colspan="4" class="text-center"> No testimonials available. </td>
						</tr>
					`
				}
				
				setTimeout(()=>{
					testimonialBody.innerHTML = testimonials;
					$(testimonialBody).on('click', '.btn-action', (e)=>{
	    				e.stopImmediatePropagation();
	    				e.preventDefault();
	    				let currentTarget  	 	= $(e.currentTarget);
	    				let testimonial_id 		= currentTarget.data('id');
    					let testimonia_image 	= currentTarget.data('image');
    					deleteProduct(testimonial_id, testimonia_image);
	    			});
				}, 50);

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

	function deleteProduct(testimonial_id, testimonial_image){
		bootbox.confirm({ 
		    title  			: "Delete Testimonial",
		    message			: "Do you watn to delete testimonial?",
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
		       			testimonial_id,
		       			testimonial_image
		       		}
		       		$.Utility.postData('delete-testimonial',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getTestimonials();
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
	getTestimonials();
});
$(document).ready(function(){

	let form_view = document.getElementById('banner-form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getBannerForm()
		}
	});

	function getBannerForm(banner_id = null){
    	let endpoint = 'banner-form-view';
    	
    	let formdata = {
    		banner_id : (banner_id != null)?banner_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				setTimeout(()=>{
					let banner_form  			= document.getElementById('banner-form');
	    			let banner_background  		= document.getElementById('banner_background');
	    			let banner_foreground  		= document.getElementById('banner_foreground');
	    			let banner_message 			= document.getElementById('banner_message');
	    			let maxlength 				= document.getElementById('maxlength');
					
					$.validate({
	        			form : '#banner_form',
	    			});

	    			$(banner_message).restrictLength($(maxlength));

	    			if(banner_id != null) {
	    				$('#card-title').text('Update banner');
	    				$('.btn-form-submit').text('Update');
	    			} else {
	    				$('#card-title').text('Add banner');
	    				$('.btn-form-submit').text('Save');
	    			}
	    			
					banner_background.addEventListener('change', uploadBackgroundPreview);
					banner_foreground.addEventListener('change', uploadForegroundPreview);
					banner_form.addEventListener('submit', setBannerDetails);

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

    function uploadBackgroundPreview(event){
		let input = event.target;
		let banner_image 	= document.getElementById('banner_background_placeholder');
	  	if (input.files && input.files[0]) {
	    	var reader = new FileReader();
	    	reader.onload = function(e) {
	      	 	$(banner_image).attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}

	function uploadForegroundPreview(event){
		let input = event.target;
		let banner_image 	= document.getElementById('banner_foreground_placeholder');
	  	if (input.files && input.files[0]) {
	    	var reader = new FileReader();
	    	reader.onload = function(e) {
	      	 	$(banner_image).attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}

	function setBannerDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-or-get-banner';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('banner_background', $('#banner_background')[0].files[0]);
			formData.append('banner_foreground', $('#banner_foreground')[0].files[0]);

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
							getBanners();
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

	function getBanners(banner_id = null){
		let endpoint 		= 'set-or-get-banner';
		let bannerBody = document.getElementById('banner-body');
		let params 			= {
			banner_id : (banner_id != null)?banner_id:''
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				let data = response.data;
				let banners = '';
				if(data.length > 0){
					data.forEach((element) => {
						banners += `
							<tr>
								<td width="25%" class="text-center thumbnails">
									<div class="thumbnail">
										<img src="./assets/uploads/banners/${element.banner_background}" alt="banner background" class="img-thumbnail"/>
		                      		</div>
		                      		<div class="thumbnail">
										<img src="./assets/uploads/banners/${element.banner_foreground}" alt="banner foreground" class="img-thumbnail"/>
		                      		</div>
								</td>
								<td width="55%">
									<div>${element.banner_title}</div>
									<div>${element.banner_message}</div>
								</td>
								<td width="20%" class="text-center">
									<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-backgroud-image="${element.banner_background}" data-foreground-image="${element.banner_foreground}" data-id="${element.banner_id}"> Edit </a>
									<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-backgroud-image="${element.banner_background}" data-foreground-image="${element.banner_foreground}" data-id="${element.banner_id}"> Delete </a>
								</td>
							</tr>
						`;
					});
				} else {
					banners = `
						<tr>
							<td colspan="4" class="text-center"> No banners available. </td>
						</tr>
					`
				}
				
				setTimeout(()=>{
					bannerBody.innerHTML = banners;
					$(bannerBody).on('click', '.btn-action', (e)=>{
	    				e.stopImmediatePropagation();
	    				e.preventDefault();
	    				let currentTarget  	 	= $(e.currentTarget);
	    				let banner_id 			= currentTarget.data('id');
    					let backgroud_image 	= currentTarget.data('backgroud-image');
    					let foreground_image 	= currentTarget.data('foreground-image');
    					let action 				= currentTarget.data('action');
    					if(action  === 'delete'){
    						let deleteObj = {
    							backgroud_image,
    							foreground_image,
    							banner_id
    						}
    						deleteBanner(deleteObj);
    					} else {
    						editBanner(banner_id);
    					}
	    			});
				}, 50);

			} else {
				if(typeof response.message === 'object'){
					for(var key in response.message ){
						response.message = response.message[key];
						$.Utility.notify(response);
					}
				}else{
					//$.Utility.notify(response);
					banners = `
						<tr>
							<td colspan="4" class="text-center"> No banners available. </td>
						</tr>
					`
					bannerBody.innerHTML = banners;
				}
			}
		})
	}

	function editBanner(banner_id){
		getBannerForm(banner_id);
	}

	function deleteBanner(deleteObj){
		bootbox.confirm({ 
		    title  			: "Delete banner",
		    message			: "Do you watn to delete banner?",
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
		       		let params = deleteObj;
		       		$.Utility.postData('delete-banner',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getBanners();
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
	getBanners();
});
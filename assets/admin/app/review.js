(($) => {
	let form_view = document.getElementById('form-view'); 
	let product_list_table = document.getElementById('product-list'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getProductFrom()
		}
	});

    function getProductFrom(product_id = null){
    	let endpoint = 'get-product-form-view';
    	
    	let formdata = {
    		product_id : (product_id != null)?product_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let review_form  = document.getElementById('registration-form');
				
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});

    			$('#product_description').restrictLength($('#maxlength'));

    			if(product_id != null){
    				$('#card-title').text('Update Product');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Product');
    				$('.btn-form-submit').text('Save');
    			}
    			
				// product_image.addEventListener('change', uploadPreview);
				// review_form.addEventListener('submit', setProductDetails);
				var options = {
				  placeholder: 'Compose an epic...',
				 // readOnly: false,
				 	theme: 'snow'
				};
				
				// editor = new Quill(product_description, options);

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

//     function uploadPreview(event){
// 		let input = event.target;
// 	  	if (input.files && input.files[0]) {
// 	    	var reader = new FileReader();
// 	    	reader.onload = function(e) {
// 	      	 	$('#product_image_placeholder').attr('src', e.target.result);
// 	      	 	$('.custom-file-label').html(input.files[0].name);
// 	    	}
// 	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
// 	  	}
// 	}
	
// 	function setProductDetails(event){
// 		event.preventDefault();
// 		let endpoint 	= 'set-product-details';
// 		let formArray 	= $(event.target).serializeArray();
// 		let formData 	= new FormData();

// 		if($(event.currentTarget).isValid()){
// 			$.Utility.disableBtn('.btn-primary');
			
// 			formArray.forEach((element)=>{
// 				formData.append(element.name, element.value);
// 			});
// 			setTimeout(() => {
// 				$.Utility.postMultipartData(endpoint, formData, (response) => {
// 					$.Utility.enableBtn('.btn-primary');
// 					response = JSON.parse(response);
// 					if(response.state){
// 						$.Utility.notify(response);
// 						setTimeout(() => {
// 							$('.form-view').css('display','none');
// 							$('.list-view').css('display','flex');
// 							form_view.innerHTML = '';
// 							getReviews();
// 						}, 2000);
// 					} else {
// 						if(typeof response.message === 'object'){
// 							$.each(response.message, (key, value)=>{
// 								let errorRes = {
// 									title: key,
// 									message: value,
// 									type: 'error'
// 								};
// 								$.Utility.notify(errorRes);
// 							});
// 						} else {
// 							$.Utility.notify(response);
// 						}
// 					}
// 				});
// 			}, 20);
// 		}
// 	}

	function getReviews(){
		let table_body         = document.getElementById('table-body');
		let product_list_table = document.getElementById('product-list'); 
		let endpoint = 'get-review';
    	let formdata = {};
    	let tbl_body = '';
    	$(product_list_table).DataTable().clear();
        $(product_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    	    console.log(response);
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.cust_name}</td>
							<td class="text-center">${element.cust_email}</td>
							<td class="text-center">${element.cust_review}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.review_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.review_id}"> Delete </a>
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
        				let review_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editProduct(review_id);
        				} else {
        					deleteProduct(review_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let review_id 		= currentTarget.data('id');
        				let params = {
        					review_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-review-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getReviews();
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
                $(product_list_table).DataTable({
                    "aaSorting": [
                        [0, 'desc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="6">
								<strong>There are no products added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editProduct(review_id){
		getProductFrom(review_id);
	}

	function deleteProduct(review_id){
		bootbox.confirm({ 
		    title  			: "Delete Product",
		    message			: "Do you watn to delete product?",
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
		       			review_id
		       		}
		       		$.Utility.postData('delete-review',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getReviews();
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
    getReviews();
})(jQuery);
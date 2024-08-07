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
				
				let product_form  		= document.getElementById('registration-form');
    			let product_image 		= document.getElementById('product_image');
    			let product_description = document.getElementById('product_description');
    			let product_tags        = document.getElementById('product_tags');
				
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});

    			$('#product_description').restrictLength($('#maxlength'));

				$('#product_category').on('change', function() {
                    var category_id = $(this).val();
                    var subcategory_id = '';
                    let formdata = {
                        category_id: category_id
                    };
                
                    var endpoint = 'get-sub-category-dropdown';
                    $.Utility.getData(endpoint, formdata, (response) => {
						try {
                        response = JSON.parse(response);
                        if (response.state) {
							if (Array.isArray(response.data)) {
                            response.data.forEach((element) => {
                                subcategory_id += `<option value="${element.sub_category_id}">${element.sub_category_title}</option>`;
                            });
                            $('#product_sub_category').html('<option value="">Select sub category</option>' + subcategory_id);
                        } else {
								handleErrorResponse();
                        }
					} else {
						handleErrorResponse();
					}
				} catch (error) {
					console.error('Error parsing JSON response:', error);
					handleErrorResponse();
				}
			});
		
			function handleErrorResponse() {
				$('#product_sub_category').html('<option value=""No sub categories</option>');
			}
			}); 

			$('#product_sub_category').on('change', function() {
				var sub_category_id = $(this).val();
				var subsubcategory_id = '';
			
				let formdata = {
					sub_category_id: sub_category_id
				};
			
				var endpoint = 'get-sub-sub-category-dropdown';
				$.Utility.getData(endpoint, formdata, (response) => {
					try {
						response = JSON.parse(response);
			
						if (response.state) {
							if (Array.isArray(response.data)) {
								response.data.forEach((element) => {
									subsubcategory_id += `<option value="${element.sub_sub_category_id}">${element.sub_sub_category_title}</option>`;
								});
								$('#product_sub_sub_category').html('<option value="">Select sub sub category</option>' + subsubcategory_id);
							} else {
								handleErrorResponse();
							}
						} else {
							handleErrorResponse();
						}
					} catch(error){
						console.error('Error parsing JSON response:', error);
						handleErrorResponse();
					}
				});
			
				function handleErrorResponse() {
					$('#product_sub_sub_category').html('<option value="">No sub sub categories</option>');
				}
			});
				
				// $('#product_sub_category').on('change', function() {
                //     var sub_category_id = $(this).val();
                //     var subsubcategory_id = '';
                //     let formdata = {
                //         sub_category_id: sub_category_id
                //     };
                
                //     var endpoint = 'get-sub-sub-category-dropdown';
                //     $.Utility.getData(endpoint, formdata, (response) => {
                //         response = JSON.parse(response);
                //         if (response.state) {
                //             response.data.forEach((element) => {
                //                 console.log(element);
                //                 subsubcategory_id += `<option value="${element.sub_sub_category_id}">${element.sub_sub_category_title}</option>`;
                //             });
				// 			$('#product_sub_sub_category').html('Select sub sub category');
                //             $('#product_sub_sub_category').append(subsubcategory_id);
                //         } else {
                //             $('#product_sub_sub_category').html(subsubcategory_id);
                //         }
                //     });
                // });

    			if(product_id != null){
    				$('#card-title').text('Update Product');
    				$('.btn-form-submit').text('Update');
    			}else {
    				$('#card-title').text('Add Product');
    				$('.btn-form-submit').text('Save');
    			}
    			
				product_image.addEventListener('change', uploadPreview);
				product_form.addEventListener('submit', setProductDetails);
				var options = {
				  placeholder: 'Compose an epic...',
				 // readOnly: false,
				 	theme: 'snow'
				};
				editor = new Quill(product_description, options);
				editor = new Quill(product_tags, options);
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
	      	 	$('#product_image_placeholder').attr('src', e.target.result);
	      	 	$('.custom-file-label').html(input.files[0].name);
	    	}
	    	reader.readAsDataURL(input.files[0]); // convert to base64 string
	  	}
	}
	
	function setProductDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-product-details';
		let formArray 	= $(event.target).serializeArray();
		let formData 	= new FormData();

		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-primary');
			
			formArray.forEach((element)=>{
				formData.append(element.name, element.value);
			});
			formData.append('product_image', $('#product_image')[0].files[0]); 
			formData.append('product_description', $('#product_description .ql-editor').html());
			formData.append('product_tags', $('#product_tags .ql-editor').html());
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
							getProducts();
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

	function getProducts(){
		let table_body         = document.getElementById('table-body');
		let product_list_table = document.getElementById('product-list'); 
		let endpoint = 'get_permanent_product_page_list';
    	let formdata = {};
    	let tbl_body = '';
    	$(product_list_table).DataTable().clear();
        $(product_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
			alert(response);
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
    					    <td>  ${element.permanent_product_page_Id}</td>
							<td>
								<strong>${element.	permanent_product_page_title}</strong>
								<div>${element.permanent_product_page_tpl}</div>
							</td>
							<td class="text-center">${element.permanent_product_page_metatitle}<br/><hr/>
							   ${element.permanent_product_page_metadetails}<br/><hr/>
							   ${element.permanent_product_page_keyword}<br/>
							
							</td>; 
							<td class="text-center">${element.permanent_product_page_filter1_lbl} : ${element.permanent_product_page_filter1}<br/>
                                ${element.permanent_product_page_filter2_lbl} : ${element.permanent_product_page_filter2}<br/>
								${element.permanent_product_page_filter3_lbl} : ${element.permanent_product_page_filter3}<br/>
								${element.permanent_product_page_filter4_lbl} : ${element.permanent_product_page_filter4}<br/>
								${element.permanent_product_page_filter5_lbl} : ${element.permanent_product_page_filter5}<br/>
								${element.permanent_product_page_filter6_lbl} : ${element.permanent_product_page_filter6}<br/>

							</td>
							<td class="text-center">${element.permanent_product_page_url}
							   <label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.product_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
							    </label> 
							</td>
							<td class="text-center">
							    <a href='get_permanent_product_page_details/${element.permanent_product_page_Id}' class="" target=_blank > View </a> 
								<!-- <a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.product_id}"> view </a>  -->
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.product_id}"> Edit... </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.system_file_name}" data-id="${element.product_id}"> Delete </a>
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
        				let product_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editProduct(product_id);
        				} else {
        					let product_image = currentTarget.data('image');
        					deleteProduct(product_id, product_image);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let product_id 		= currentTarget.data('id');
        				let params = {
        					product_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-product-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getProducts();
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

	function editProduct(product_id){
		getProductFrom(product_id);
	}

	function deleteProduct(product_id, product_image){
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
		    callback: function (result){
		       if(result){
		       		let params = {
		       			product_image,
		       			product_id
		       		}
		       		$.Utility.postData('delete-product',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getProducts();
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

	$('#product_excel').on('click',(e)=>{
		e.stopImmediatePropagation();
		e.preventDefault();
		// let currentTarget  	= $(e.currentTarget);
		//let action 			= currentTarget.data('action');
		//let product_id 		= currentTarget.data('id');
		uploadProductExcel();
	});

	function uploadProductExcel(){
		alert("Hiiiiiii");
		let endpoint = 'upload-Permanent-Product-Page-excel';
		let formArray = $('input[name="product_upload_excel"]').serializeArray();
		let formData = new FormData();
	
		formArray.forEach((element) => {
			formData.append(element.name, element.value);
		});
	
		var modalContent = '<div class="mb-3">' +
			'<label for="product_upload_excel">Upload File:</label>' +
			'<input type="file" id="product_upload_excel" accept=".csv" name="product_upload_excel" class="form-control">' +
			'</div>';
	
		bootbox.confirm({
			title: "Upload Permanent Product Page Excel",
			message: modalContent,
			onEscape: false,
			backdrop: 'static',
			centerVertical: true,
			className: "product-upload-excel-modal",
			buttons: {
				confirm: {
					label: 'Submit',
					className: 'btn-square btn-primary'
				},
				cancel: {
					label: 'Cancel',
					className: 'btn-square btn-danger'
				}
			},
			callback: function (result){
				if (result) {
					// Access the uploaded file using file input ID
					var uploadedFile = $('#product_upload_excel')[0].files[0];
					formData.append('product_upload_excel', uploadedFile);
	
					$.Utility.postMultipartData(endpoint, formData, (response) => {
						 alert(response);
						response = JSON.parse(response);
						if (response.state) {
							$.Utility.notify(response);
							// Additional logic after successful upload
						} else {
							if (typeof response.message === 'object'){
								for (var key in response.message){
									$.Utility.notify(response.message[key]);
								}
							} else {
								$.Utility.notify(response.message);
							}
						}
					});
				}
			}
		});
	}
	
    getProducts();
})(jQuery);
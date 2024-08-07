(($) => {
	let form_view = document.getElementById('form-view'); 
	let product_list_table = document.getElementById('product-list'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getProductFrom()
		}
	});

     
 
	 

	function getProducts(){
		let table_body         = document.getElementById('table-body');
		let product_list_table = document.getElementById('product-list'); 
		let endpoint = 'get_rapaport_page_list';
    	let formdata = {};
    	let tbl_body = '';
    	$(product_list_table).DataTable().clear();
        $(product_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) =>{
			alert(response);
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
    					    <td>${element.stone_id}</td>
							<td>${element.stone_shape}</td>
							<td class="text-center"> ${element.stone_clarity}</td>
							<td class="text-center"> ${element.stone_color}</td>
							<td class="text-center"> ${element.stone_weight_frm}</td> 
							<td class="text-center">${element.stone_weight_to}</td>
							<td class="text-center">${element.stone_amt}   </td>
							<td class="text-center">${element.stone_post_date}   </td> 
						</tr>
    				`
    			});
    			if (table_body !== null){
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
		//alert("rap - Hiiiiiii");
		let endpoint = 'upload-rapaport-rate-excel';
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
			title: "Upload Rapaport Rate Excel",
			message: modalContent,
			onEscape: false,
			backdrop: 'static',
			centerVertical: true,
			className: "product-upload-excel-modal",
			buttons: {
				confirm:{
					label: 'Submit',
					className: 'btn-square btn-primary'
				},
				cancel:{
					label: 'Cancel',
					className: 'btn-square btn-danger'
				}
			},
			callback: function (result){
				if (result){
					// Access the uploaded file using file input ID
					var uploadedFile = $('#product_upload_excel')[0].files[0];
					formData.append('product_upload_excel', uploadedFile);
	
					$.Utility.postMultipartData(endpoint, formData, (response) =>{
						alert(response);
						response = JSON.parse(response);
						
						if (response.state){
							$.Utility.notify(response);
							// Additional logic after successful upload
						} else {
							if(typeof response.message === 'object'){
								for (var key in response.message){
									$.Utility.notify(response.message[key]);
								}
							}else{
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
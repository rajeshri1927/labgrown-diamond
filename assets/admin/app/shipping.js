$(document).ready(function(){
	getShipping();
	let form_view = document.getElementById('shipping-form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getShippingFrom()
		}
	});

    function getShippingFrom(shipping_id = null){
    	let endpoint = 'get-shipping-form-view';
    	let formdata = {
    		shipping_id : (shipping_id != null)? shipping_id:''
    	};
    	
    	$.Utility.getData(endpoint,formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				let shipping_form   = document.getElementById('shipping-form');
				$.validate({
        			form : '#shipping-form',
        			modules : 'security'
    			});

    			if(shipping_id!= null){
    				$('#card-title').text('Update Shipping');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Shipping');
    				$('.btn-form-submit').text('Save');
    			}
    			shipping_form.addEventListener('submit', setShippingDetails);
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

	function setShippingDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-shipping-details';
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
							getShipping();
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

	function getShipping(){
		let table_body      = document.getElementById('table-body');
		let shipping_list   = document.getElementById('shipping-table'); 
		let endpoint = 'get-shippings';
    	let formdata = {};
    	let tbl_body = '';
		if ($.fn.DataTable.isDataTable(shipping_list)) {
			$(shipping_list).DataTable().destroy();
		}
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.shipping_id}</td>
							<td class="text-center">${element.country_name}</td>
							<td class="text-center">${element.color_name}</td>
							<td class="text-center">${element.clarity_name}</td>
							<td class="text-center">${element.gst}</td>
							<td class="text-center">${element.shipping}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.shipping_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.shipping_id}"> Edit </a> |
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.shipping_id}"> Delete </a>
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
        				let shipping_id     = currentTarget.data('id');
        				if(action === 'edit'){
        					editShipping(shipping_id);
        				} else {
        					deleteShipping(shipping_id);
        				}
        			});

        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let shipping_id     = currentTarget.data('id');
        				let params = {
        					shipping_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-shipping-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getShipping();
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
                $(shipping_list).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="7">
								<strong>There are no shipping added yet.</strong>
							</td>
						</tr>
    				`
				table_body.innerHTML = tbl_body;

    		}
    	});
	}

	function deleteShipping(shipping_id){
		bootbox.confirm({ 
		    title  			: "Delete Shipping",
		    message			: "Do you watn to delete Shipping?",
		    onEscape		: false,
		    backdrop 		: 'static',
		    centerVertical 	: true,
		    className: "shipping-delete-modal",
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
						shipping_id : shipping_id,
		       		}
		       		$.Utility.postData('delete-shipping',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getShipping();
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

	function editShipping(shipping_id){
		getShippingFrom(shipping_id);
	}

});
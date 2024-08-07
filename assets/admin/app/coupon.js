(($) => {
	let form_view = document.getElementById('form-view'); 
	// let coupon_list_table = document.getElementById('coupon-list'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getCouponFrom()
		}
	});
	
    function getCouponFrom(coupon_id = null){
    	let endpoint = 'get-coupon-form-view';
    	let formdata = {
    		coupon_id : (coupon_id != null)?coupon_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				
				let coupon_form  = document.getElementById('registration-form');
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    			
    			if(coupon_id != null){
    				$('#card-title').text('Update Product');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Product');
    				$('.btn-form-submit').text('Save');
    			}
				coupon_form.addEventListener('submit', setProductDetails);
				var options = {
				  placeholder: 'Compose an epic...',
				 // readOnly: false,
				 	theme: 'snow'
				};
				
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
	
	function setProductDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-coupon-details';
		var coupon_id   = $('#coupon_id').val();
		let params 			= {
				coupon_unique_id	: $('#coupon_unique_id').val(),
				product_category	: $('#product_category').val(),
				coupon_id 			: (coupon_id !== '' || coupon_id !== undefined)?coupon_id:'',
				inserted_datetime	: $('#inserted_datetime').val(),
				expired_datetime	: $('#expired_datetime').val()
			};
				$.Utility.postData(endpoint, params, (response) => {
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							$('.form-view').css('display','none');
							$('.list-view').css('display','flex');
							form_view.innerHTML = '';
							getCoupons();
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
	}

	function getCoupons(){
		let table_body         = document.getElementById('table-body');
		let coupon_list_table  = document.getElementById('coupon-list'); 
		let endpoint = 'get-coupon';
    	let formdata = {};
    	let tbl_body = '';
    	$(coupon_list_table).DataTable().clear();
        $(coupon_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    	    console.log(response);
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td>
								<strong>${element.coupon_unique_id}</strong>
							</td>
							<td>
								${element.inserted_datetime}
							</td>
							<td>
								${element.expired_datetime}
							</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.coupon_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.coupon_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.coupon_id}"> Delete </a>
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
        				let coupon_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editCoupon(coupon_id);
        				} else {
        					deleteCoupon(coupon_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let coupon_id 		= currentTarget.data('id');
        				let params = {
        					coupon_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-coupon-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getCoupons();
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
                $(coupon_list_table).DataTable({
                    "aaSorting": [
                        [0, 'desc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="5">
								<strong>There are no products added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editCoupon(coupon_id){
		getCouponFrom(coupon_id);
	}

	function deleteCoupon(coupon_id){
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
		       			coupon_id
		       		}
		       		$.Utility.postData('delete-coupon',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getCoupons();
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
	
    getCoupons();
    
})(jQuery);
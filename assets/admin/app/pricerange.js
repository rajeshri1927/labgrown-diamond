(($) => {
	let form_view = document.getElementById('form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getPriceRangeFrom()
		}
	});
	
    function getPriceRangeFrom(price_range_id = null){
    	let endpoint = 'get-price-range-form-view';	
    	let formdata = {
    		price_range_id : (price_range_id != null)?price_range_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML  = response.data;
				let price_range_form = document.getElementById('registration-form');
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    			
    			if(price_range_id != null){
    				$('#card-title').text('Update Quality');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Quality');
    				$('.btn-form-submit').text('Save');
    			}
				price_range_form.addEventListener('submit', setPriceRangeDetails);

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
	
	function setPriceRangeDetails(event){
		event.preventDefault();
		let endpoint 	    = 'set-price-range-details';
		var price_range_id  = $('#price_range_id').val();
		let params 		= {
                price_range	        : $('#price_range').val(),
				price_range_id 		: (price_range_id !== '' || price_range_id !== undefined)?price_range_id:'',
			};
        $.Utility.postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if(response.state){
                $.Utility.notify(response);
                setTimeout(() => {
                    $('.form-view').css('display','none');
                    $('.list-view').css('display','flex');
                    form_view.innerHTML = '';
                    getPriceRange();
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

	function getPriceRange(){
		let table_body            = document.getElementById('table-body');
		let pricerange_list_table = document.getElementById('price-range-list'); 
		let endpoint  = 'get-price-range';
    	let formdata  = {};
    	let tbl_body  = '';
    	$(pricerange_list_table).DataTable().clear();
        $(pricerange_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td>
								${element.price_range_id}
							</td>
							<td class="text-center">
								${element.price_range}
							</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.price_range_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.price_range_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.price_range_id}"> Delete </a>
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
        				let price_range_id  = currentTarget.data('id');
        				if(action === 'edit'){
        					editPriceRange(price_range_id);
        				} else {
        					deletePriceRange(price_range_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  = $(e.currentTarget);
        				let price_range_id = currentTarget.data('id');
        				let params = {
        					price_range_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-price-range-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getPriceRange();
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
                $(pricerange_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="8">
								<strong>There are no quality added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editPriceRange(price_range_id){
		getPriceRangeFrom(price_range_id);
	}

	function deletePriceRange(price_range_id){
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
						price_range_id
		       		}
		       		$.Utility.postData('delete-price-range',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getPriceRange();
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
	
    getPriceRange();
    
})(jQuery); 
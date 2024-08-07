(($) => {
	let form_view = document.getElementById('form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getCaratWeightFrom()
		}
	});
	
    function getCaratWeightFrom(carat_weight_id = null){
    	let endpoint = 'get-carat-weight-form-view';	
    	let formdata = {
    		carat_weight_id : (carat_weight_id != null)?carat_weight_id:''
    	};	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML   = response.data;
				let carat_weight_form = document.getElementById('registration-form');
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    			
    			if(carat_weight_id!= null){
    				$('#card-title').text('Update Carat Weight');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Carat Weight');
    				$('.btn-form-submit').text('Save');
    			}
				carat_weight_form.addEventListener('submit', setCaratWeightDetails);

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
	
	function setCaratWeightDetails(event){
		event.preventDefault();
		let endpoint 	     = 'set-carat-weight-details';
		var carat_weight_id  = $('#carat_weight_id').val();
		let params 		= {
                carat_weight	  : $('#carat_weight').val(),
				carat_weight_id   : (carat_weight_id !== '' || carat_weight_id !== undefined)?carat_weight_id:'',
			};
        $.Utility.postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if(response.state){
                $.Utility.notify(response);
                setTimeout(() => {
                    $('.form-view').css('display','none');
                    $('.list-view').css('display','flex');
                    form_view.innerHTML = '';
                    getCaratWeight();
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

	function getCaratWeight(){
		let table_body             = document.getElementById('table-body');
		let caratweight_list_table = document.getElementById('carat-weight-list'); 
		let endpoint  = 'get-carat-weight';
    	let formdata  = {};
    	let tbl_body  = '';
    	$(caratweight_list_table).DataTable().clear();
        $(caratweight_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td>
								${element.carat_weight_id}
							</td>
							<td class="text-center">
								${element.carat_weight}
							</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.carat_weight_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.carat_weight_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.carat_weight_id}"> Delete </a>
							</td>
						</tr>`
    			});
    			if (table_body !== null) {
        			table_body.innerHTML = tbl_body;
        			$(table_body).on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	 = $(e.currentTarget);
        				let action 			 = currentTarget.data('action');
        				let carat_weight_id  = currentTarget.data('id');
        				if(action === 'edit'){
        					editCaratWeight(carat_weight_id);
        				} else {
        					deleteCaratWeight(carat_weight_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget   = $(e.currentTarget);
        				let carat_weight_id = currentTarget.data('id');
        				let params = {
        					carat_weight_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-carat-weight-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getCaratWeight();
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
                $(caratweight_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="4">
								<strong>There are no carat weight added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function editCaratWeight(carat_weight_id){
		getCaratWeightFrom(carat_weight_id);
	}

	function deleteCaratWeight(carat_weight_id){
		bootbox.confirm({ 
		    title  			: "Delete Carat Weight",
		    message			: "Do you watn to carat weight?",
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
						carat_weight_id
		       		}
		       		$.Utility.postData('delete-carat-weight',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getCaratWeight();
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
	
    getCaratWeight();
    
})(jQuery); 
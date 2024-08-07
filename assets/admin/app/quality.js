(($) => {
	let form_view = document.getElementById('form-view'); 
	let coupon_list_table = document.getElementById('quality-list'); 
 	
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getQualityFrom()
		}
	});
	
    function getQualityFrom(quality_id = null){
    	let endpoint = 'get-quality-form-view';	
    	let formdata = {
    		quality_id : (quality_id != null)?quality_id:''
    	};
    	
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');

    			form_view.innerHTML = response.data;
				let quality_form     = document.getElementById('registration-form');
				$.validate({
        			form : '#registration-form',
        			modules : 'security'
    			});
    			
    			if(quality_id != null){
    				$('#card-title').text('Update Quality');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add Quality');
    				$('.btn-form-submit').text('Save');
    			}
				quality_form.addEventListener('submit', setQualityDetails);
				var options = {
				  placeholder: 'Compose an epic...',
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
	
	function setQualityDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-quality-details';
		var quality_id  = $('#quality_id').val();
		let params 		= {
                quality_name	    : $('#quality_name').val(),
				quality_color_from	: $('#quality_color_from').val(),
				quality_id 			: (quality_id !== '' || quality_id !== undefined)?quality_id:'',
				quality_color_to	: $('#quality_color_to').val(),
				quality_clarity_from: $('#quality_clarity_from').val(),
                quality_clarity_to  : $('#quality_clarity_to').val()
			};
        $.Utility.postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if(response.state){
                $.Utility.notify(response);
                setTimeout(() => {
                    $('.form-view').css('display','none');
                    $('.list-view').css('display','flex');
                    form_view.innerHTML = '';
                    getQuality();
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

	function getQuality(){
		let table_body         = document.getElementById('table-body');
		let quality_list_table = document.getElementById('quality-list'); 
		let endpoint  = 'get-quality';
    	let formdata  = {};
    	let tbl_body  = '';
    	$(quality_list_table).DataTable().clear();
        $(quality_list_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    	    console.log(response);
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td>
								${element.quality_id}
							</td>
							<td>
								${element.quality_name}
							</td>
							<td>
								${element.quality_color_from}
							</td>
							<td>
								${element.quality_color_to}
							</td>
							<td>
								${element.quality_clarity_from}
							</td>
							<td>
								${element.quality_clarity_to}
							</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.quality_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.quality_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.quality_id}"> Delete </a>
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
        				let quality_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editQuality(quality_id);
        				} else {
        					deleteQuality(quality_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  = $(e.currentTarget);
        				let quality_id 	   = currentTarget.data('id');
        				let params = {
        					quality_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-quality-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getQuality();
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
                $(quality_list_table).DataTable({
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

	function editQuality(quality_id){
		getQualityFrom(quality_id);
	}

	function deleteQuality(quality_id){
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
						quality_id
		       		}
		       		$.Utility.postData('delete-quality',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getQuality();
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
	
    getQuality();
    
})(jQuery);
$(document).ready(function(){
	getHomeApiData();
	let form_view = document.getElementById('home-api-form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getHomeApiDataFrom()
		}
	});

    function getHomeApiDataFrom(home_api_id = null){
    	let endpoint = 'get-home-api-form-view';
    	let formdata = {
    		home_api_id : (home_api_id != null)? home_api_id:''
    	};
    	
    	$.Utility.getData(endpoint,formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				let home_page_form  = document.getElementById('home-api-form');
				
				$.validate({
        			form : '#home-api-form',
        			modules :'security'
    			});
    			home_page_form.addEventListener('submit', getInputRequestDetails);
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

	function getInputRequestDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-home-api-response';
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
					console.log(response);
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							$('.form-view').css('display','none');
							$('.list-view').css('display','flex');
							form_view.innerHTML = '';
							//getHomeApiData();
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

	function getHomeApiData(){
		let table_body              = document.getElementById('table-body');
		let home_api_list   = document.getElementById('home-api-table'); 
		let endpoint = 'get-home-api';
    	let formdata = {};
    	let tbl_body = '';
		if ($.fn.DataTable.isDataTable(home_api_list)) {
			$(home_api_list).DataTable().destroy();
		}
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.home_api_id}</td>
                            <td class="text-center">${element.shape}</td>
                            <td class="text-center">${element.quality}</td>
							<td class="text-center">${element.color_from}</td>
							<td class="text-center">${element.color_to}</td>
							<td class="text-center">${element.clarity_from}</td>
                            <td class="text-center">${element.clarity_to}</td>
							<td class="text-center">${element.size_from}</td>
							<td class="text-center">${element.size_to}</td>
							<td class="text-center">${element.price_from}</td>
							<td class="text-center">${element.price_to}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.home_api_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.home_api_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.home_api_id}"> Delete </a>
							</td>
						</tr>
    				`
    			});
    			if (table_body !== null) {
        			table_body.innerHTML = tbl_body;
        			$(table_body).on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	    = $(e.currentTarget);
        				let action 			    = currentTarget.data('action');
        				let home_api_id = currentTarget.data('id');
        				if(action === 'edit'){
        					editHomeApiData(home_api_id);
        				} else {
        					deleteHomeApiData(home_api_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	    = $(e.currentTarget);
        				let home_api_id         = currentTarget.data('id');
        				let params = {
        					home_api_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-home-api-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getHomeApiData();
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
                $(home_api_list).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="13">
								<strong>There are no  api data added yet.</strong>
							</td>
						</tr>
    				`
				table_body.innerHTML = tbl_body;

    		}
    	});
	}

	function deleteHomeApiData(home_api_id){
		bootbox.confirm({ 
		    title  			: "Delete Home API Record",
		    message			: "Do you watn to delete Home API Record?",
		    onEscape		: false,
		    backdrop 		: 'static',
		    centerVertical 	: true,
		    className: "home-api-delete-modal",
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
						home_api_id : home_api_id,
		       		}
		       		$.Utility.postData('delete-home-api',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getHomeApiData();
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

	function editHomeApiData(home_api_id){
		getHomeApiDataFrom(home_api_id);
	}

});
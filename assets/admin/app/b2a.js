$(document).ready(function(){
	getB2A();
	let form_view = document.getElementById('form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getB2Aform()
		}
	});

    function getB2Aform(user_id = null){
    	let endpoint = 'get-b2a-form-view';
    	let formdata = {
    		user_id : (user_id != null) ? user_id:''
    	};
    	
    	$.Utility.getData(endpoint,formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
				$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
				form_view.innerHTML= response.data;
				let b2a_form   = document.getElementById('b2a-form');			
				let country_code   = document.getElementById('country_code');
				if(country_code){
			        country_code.addEventListener('change', updateStates);
			    }					
				$.validate({
        			form : '#b2a-form',
        			modules : 'security'
    			});

    			if(user_id != null){
    				$('#card-title').text('Update B2A');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title').text('Add B2A');
    				$('.btn-form-submit').text('Save');
    			}
    			b2a_form.addEventListener('submit', setRoleDetails);
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

	function setRoleDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-user-details';
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
							getB2A();
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

	function getB2A(){
		let table_body     = document.getElementById('table-body');
		let b2a_list_table = document.getElementById('b2a-list'); 
		let endpoint = 'get-all-b2a';
    	let formdata = {};
    	let tbl_body = '';
		if ($.fn.DataTable.isDataTable(b2a_list_table)) {
			$(b2a_list_table).DataTable().destroy();
		}
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.user_id}</td>
							<td class="text-center">${element.first_name}</td>
							<td class="text-center">${element.last_name}</td>
							<td class="text-center">${element.role_title}</td>
							<td class="text-center">${element.email}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.user_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.user_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.user_id}"> Delete </a>
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
        				let user_id 		= currentTarget.data('id');
        				if(action === 'edit'){
        					editB2A(user_id);
        				} else {
        					deleteB2A(user_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let user_id 		= currentTarget.data('id');
        				let params = {
        					user_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-b2a-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getB2A();
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
                $(b2a_list_table).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="7">
								<strong>There are no B2A added yet.</strong>
							</td>
						</tr>
    				`
				table_body.innerHTML = tbl_body;

    		}
    	});
	}

	function updateStates(e){
        console.log(e);
        let country_state = document.getElementById('state');	
        var country_id    =  e.currentTarget.value;
        var country_name  = e.target.options[e.target.selectedIndex].text.split(' ')[0];
        var endpoint      = 'get-states';
        var params = {
            country_id  
        }
        $('#country').val(country_name).prop("disabled", true);
        getData(endpoint, params, (response) => {
            // response = JSON.parse(response);
            if(response.state){
                var options = '';
                options += '<option value="">Select State</option>';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].state_id + '">' + response.data[i].state_name + '</option>';
                }
                country_state.innerHTML = options;
                country_state.addEventListener('change', updateCities);
            } else {
                if(typeof response.message === 'object'){
                    $.each(response.message, (key, value)=>{
                        let errorRes = {
                            title: key,
                            message: value,
                            type: 'error'
                        };
                        notify(errorRes);
                    });
                } else {
                    notify(response);
                }
            }
        });
    }

    function updateCities(e){
        var state_id   =  e.currentTarget.value;
        var endpoint     = 'get-cities';
        var params = {
            state_id    
        }
        getData(endpoint, params, (response) => {
            // response = JSON.parse(response);
            if(response.state){
                var options = '';
                options += '<option value="">Select City</option>';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].city_id + '">' + response.data[i].city_name + '</option>';
                }
                $('select#city').html(options);
            } else {
                if(typeof response.message === 'object'){
                    $.each(response.message, (key, value)=>{
                        let errorRes = {
                            title: key,
                            message: value,
                            type: 'error'
                        };
                        notify(errorRes);
                    });
                } else {
                    notify(response);
                }
            }
        });
    }

	function deleteB2A(userId){
		bootbox.confirm({ 
		    title  			: "Delete Role",
		    message			: "Do you watn to delete role?",
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
		       		var params = {
		       			user_id : userId,
		       		}
		       		$.Utility.postData('delete-b2a',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getB2A();
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

	function editB2A(userId){
		getB2Aform(userId);
	}

	function postData(endpoint, params, callback, headers) {
        $.ajax({
                url: endpoint,
                type: 'POST',
                data: params,
                headers: headers
            })
            .done(function(response) {
                callback(response)
            })
            .fail(function(response) {
                callback(response)
            })
            .always(function() {
                console.log("complete");
            });
    }

    function getData(endpoint, params, callback) {
        $.ajax({
                url: endpoint,
                type: 'GET',
                data: params,
            })
            .done(function(response) {
                callback(response)
            })
            .fail(function(response) {
                callback(response)
            })
            .always(function() {
                console.log("complete");
            });
    }	

});
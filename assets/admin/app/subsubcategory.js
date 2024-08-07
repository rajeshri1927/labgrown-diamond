$(document).ready(function(){
	getSubSubCategory();
	let form_view = document.getElementById('sub-sub-category-form-view'); 
	$('.toggle-form').on('click', function(){
		if (!$('.form-view').is(':visible')) {
			getSubSubCategoryFrom()
		}
	});

    function getSubSubCategoryFrom(sub_sub_category_id = null){
    	let endpoint = 'get-sub-sub-category-form-view';
    	let formdata = {
    		sub_sub_category_id : (sub_sub_category_id != null)? sub_sub_category_id:''
    	};
    	
    	$.Utility.getData(endpoint,formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			$('.form-view').css('display','flex');
				$('.list-view').css('display','none');
    			form_view.innerHTML = response.data;
				let subadmin_form   = document.getElementById('sub-sub-category-form');
				
				$.validate({
        			form : '#sub-sub-category-form',
        			modules : 'security'
    			});

                $('.product_category').on('change', function() {
                    var category_id = $(this).val();
                    var subcategory_id = '';
                    let formdata = {
                        category_id: category_id
                    };
                
                    var endpoint = 'get-sub-category-dropdown';
                    $.Utility.getData(endpoint, formdata, (response) => {
                        response = JSON.parse(response);
                        if (response.state) {
                            response.data.forEach((element) => {
                                console.log(element);
                                subcategory_id += `<option value="${element.sub_category_id}">${element.sub_category_title}</option>`;
                            });
                            $('#sub_category_id').html(subcategory_id);
                        } else {
                            $('#sub_category_id').html(subcategory_id);
                        }
                    });
                });                

    			if(sub_sub_category_id!= null){
    				$('#card-title-sub-sub-category').text('Update Sub Sub Category');
    				$('.btn-form-submit').text('Update');
    			} else {
    				$('#card-title-sub-sub-category').text('Add Sub Sub Category');
    				$('.btn-form-submit').text('Save');
    			}
    			subadmin_form.addEventListener('submit', setSubSubCategoryDetails);
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

	function setSubSubCategoryDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-sub-sub-category';
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
							getSubSubCategory();
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

	function getSubSubCategory(){
		let table_body              = document.getElementById('table-body');
		let sub_sub_category_list   = document.getElementById('sub-sub-category-table'); 
		let endpoint = 'get-sub-sub-categories';
    	let formdata = {};
    	let tbl_body = '';
		if ($.fn.DataTable.isDataTable(sub_sub_category_list)) {
			$(sub_sub_category_list).DataTable().destroy();
		}
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.sub_sub_category_id}</td>
                            <td class="text-center">${element.category_title}</td>
                            <td class="text-center">${element.sub_category_title}</td>
							<td class="text-center">${element.sub_sub_category_title}</td>
							<td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.sub_sub_category_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="edit" data-id="${element.sub_sub_category_id}"> Edit </a> 
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.sub_sub_category_id}"> Delete </a>
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
        				let sub_sub_category_id = currentTarget.data('id');
        				if(action === 'edit'){
        					editsubSubCategory(sub_sub_category_id);
        				} else {
        					deleteSubSubCategory(sub_sub_category_id);
        				}
        			});
    
        			$(table_body).on('change', '.switch-input', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	    = $(e.currentTarget);
        				let sub_sub_category_id = currentTarget.data('id');
        				let params = {
        					sub_sub_category_id,
        					display: (currentTarget.prop('checked'))?'Y':'N',
        				}
        				$.Utility.postData('set-sub-sub-category-display',params,function(response){
    						response = JSON.parse(response);
    						if(response.state){
    							$.Utility.notify(response);
    							getSubSubCategory();
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
                $(sub_sub_category_list).DataTable({
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });
            }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="7">
								<strong>There are no sub category added yet.</strong>
							</td>
						</tr>
    				`
				table_body.innerHTML = tbl_body;

    		}
    	});
	}

	function deleteSubSubCategory(sub_sub_category_id){
		bootbox.confirm({ 
		    title  			: "Delete Sub Category",
		    message			: "Do you watn to delete sub Sub Category?",
		    onEscape		: false,
		    backdrop 		: 'static',
		    centerVertical 	: true,
		    className: "sub-sub-category-delete-modal",
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
						sub_sub_category_id : sub_sub_category_id,
		       		}
		       		$.Utility.postData('delete-sub-sub-category',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getSubSubCategory();
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

	function editsubSubCategory(sub_sub_category_id){
		getSubSubCategoryFrom(sub_sub_category_id);
	}

});
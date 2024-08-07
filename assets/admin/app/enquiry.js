(($) => {

    $('.toggle-form').on('click', function(){
        if (!$('.form-view').is(':visible')) {
            $('.form-view').css('display','flex');
            $('.list-view').css('display','none');
        } else {
            $('.form-view').css('display','none');
            $('.list-view').css('display','flex');
        }
    });

	let form_view     = document.getElementById('form-view');

	function getEnquiry(){
        let table_enquiry       = document.getElementById('enquiry-list');
		let table_body          = document.getElementById('table-body');
		let endpoint            = 'get-enquiry';
    	let formdata            = {};
    	let tbl_body            = '';
    	$(table_enquiry).DataTable().clear();
        $(table_enquiry).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.first_name}</td>
							<td class="text-center">
                                ${element.last_name} 
                            </td>
                            <td class="text-center">
                                ${element.contact_no} 
                            </td>
                            <td class="text-center">
                                ${element.email} 
                            </td>
                            <td class="text-center">
                                ${element.message}
                            </td>
                            <td class="text-center">
								<label class="switch switch-default switch-pill switch-primary">
                    				<input type="checkbox" class="switch-input" ${(element.display==='Y')?'checked="checked"':''} data-id="${element.enquiry_id}">
                    				<span class="switch-label"></span>
                    				<span class="switch-handle"></span>
                  				</label>
							</td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.enquiry_id}">Delete</a>  
                            </td>
						</tr>
    				`
    			});
    			table_body.innerHTML = tbl_body;
    			$(table_body).on('click', '.btn-action', (e)=>{
    				e.stopImmediatePropagation();
    				e.preventDefault();
    				let currentTarget  	= $(e.currentTarget);
    				let action 			= currentTarget.data('action');
    				let enquiry_id 		= currentTarget.data('id');
    				if(action === 'delete'){
    					deleteEnquiry(enquiry_id);
    				}
    			});
    			$(table_body).on('change', '.switch-input', (e)=>{
    				e.stopImmediatePropagation();
    				e.preventDefault();
    				let currentTarget  	= $(e.currentTarget);
    				let enquiry_id 		= currentTarget.data('id');
    				let params = {
    					enquiry_id,
    					display: (currentTarget.prop('checked'))?'Y':'N',
    				}
    				$.Utility.postData('set-enquiry-display',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getEnquiry();
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
                setTimeout(()=>{
                    $(table_enquiry).DataTable({
                        "aaSorting": [ [0,'desc'] ]
                    });
                }, 100);
    		} else {
    			tbl_body += `
    					<tr>
							<td class="text-center" colspan="7">
								<strong>There are no Orders added yet.</strong>
							</td>
						</tr>
    				`
    			table_body.innerHTML = tbl_body;
    		}
    	});
	}

	function getEnquirydetails(enquiry_id){
		getEnquiry(enquiry_id);
	}
    
    function deleteEnquiry(enquiry_id){
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
		       			enquiry_id
		       		}
		       		$.Utility.postData('delete-enquiry',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							getEnquiry();
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
    // function getEnquiry(enquiry_id){
    //     let endpoint = 'get-order-invoice';
    //     let formdata = {
    //         enquiry_id
    //     };
    //     let tbl_body = '';
    //     $.Utility.getData(endpoint, formdata, (response) => {
    //         $('.form-view').css('display','flex');
    //         $('.list-view').css('display','none');
    //         response = JSON.parse(response);
    //         if(response.state){
    //             form_view.innerHTML = response.data;
    //             $(form_view).on('click', '#btn-back', (e) => {
    //                 $('.form-view').css('display','none');
    //                 $('.list-view').css('display','flex');
    //                 form_view.innerHTML = '';
    //             });
    //             $(form_view).on('click', '#btn-back', (e) => {
    //                 $('.form-view').css('display','none');
    //                 $('.list-view').css('display','flex');
    //                 form_view.innerHTML = '';
    //             });
    //         } else {
    //             tbl_body += `
    //                     <tr>
    //                         <td class="text-center" colspan="3">
    //                             <strong>There are no products added yet.</strong>
    //                         </td>
    //                     </tr>
    //                 `
    //             table_body.innerHTML = tbl_body;
    //         }
    //     });
    // }
	getEnquiry();
})(jQuery);
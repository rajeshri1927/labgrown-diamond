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

	function getOrders(){
        let order_table    = document.getElementById('order-table');
		let table_body     = document.getElementById('table-body');
		let endpoint = 'get-orders';
    	let formdata = {};
    	let tbl_body = '';
    	$(order_table).DataTable().clear();
        $(order_table).DataTable().destroy();
    	$.Utility.getData(endpoint, formdata, (response) => {
    		response = JSON.parse(response);
    		if(response.state){
    			response.data.forEach((element)=>{
    				tbl_body += `
    					<tr>
							<td class="text-center">${element.order_unique_id}</td>
							<td>
                                <div><strong>Name</strong>:  ${element.first_name} ${element.last_name} </div>
                                <div><strong>Email</strong>:  ${element.email} </div> 
                                <div><strong>Mobile</strong>: ${element.contact_no} </div>
                            </td>
                            <td class="text-center">
                                <div>${element.address}</div>
                                <div>${element.address_line_1}</div>
                                <div>${element.address_line_2}</div>
                                <div>Pincode: ${element.postcode}</div>
                            </td>
                            <td class="text-right">${element.product_total_price}/-</td>
                            <td class="text-center">
                               ${(element.order_payment_type === "online-payment")?'cash on delivery':'online'}
                               ${(element.order_payment_type === "online-payment")?(element.order_status === "C")?'<span class="badge badge-success">Confirmed</span>':'<span class="badge badge-warning">Pending</span>':''}
                            </td>
							<td class="text-center">
								<a href="javascript:void(0);" class="btn btn-link btn-action" data-action="view" data-id="${element.order_id}">View</a> |  
							    <a href="generate-order-pdf/${element.order_id}" class="btn btn-link" target="_blank">Print</a>
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
    				let order_id 		= currentTarget.data('id');
    				if(action === 'view'){
    					getOrderedProducts(order_id);
    				}
    			});
                setTimeout(()=>{
                    $(order_table).DataTable({
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

	function getOrderedProducts(order_id){
		getProducts(order_id);
	}

    function getProducts(order_id){
        let endpoint = 'get-order-invoice';
        let formdata = {
            order_id
        };
        let tbl_body = '';
        $.Utility.getData(endpoint, formdata, (response) => {
            $('.form-view').css('display','flex');
            $('.list-view').css('display','none');
            response = JSON.parse(response);
            if(response.state){
                form_view.innerHTML = response.data;
                $(form_view).on('click', '#btn-back', (e) => {
                    $('.form-view').css('display','none');
                    $('.list-view').css('display','flex');
                    form_view.innerHTML = '';
                });
                $(form_view).on('click', '#btn-back', (e) => {
                    $('.form-view').css('display','none');
                    $('.list-view').css('display','flex');
                    form_view.innerHTML = '';
                });
            } else {
                tbl_body += `
                        <tr>
                            <td class="text-center" colspan="3">
                                <strong>There are no products added yet.</strong>
                            </td>
                        </tr>
                    `
                table_body.innerHTML = tbl_body;
            }
        });
    }
	getOrders();
})(jQuery);
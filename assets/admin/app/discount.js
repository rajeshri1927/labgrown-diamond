$(document).ready(function(){
	$.validate({form : '#discount-form'});
	var DiscountFormElem = document.getElementById('discount-form');
	$(DiscountFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var discount_id = $('#discount_id').val();
			var endpoint 	= 'set-discount-details';
			
			var params 		= {
				item_name			: $('#item_name').val(),
				discount_percent	: $('#discount_percent').val(),
				discount	        : $('#discount').val(),
				display				: 'Y',
				discount_id 		: (discount_id !== '' || discount_id !== undefined)?discount_id:''
			}

			$.Utility.postData(endpoint,params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					toggleView();
					location.reload();
					initTable();
				}else{
					if(typeof response.message === 'object'){
						for(var key in response.message ){
							response.message = response.message[key];
							$.Utility.notify(response);
						}
					}else{
						$.Utility.notify(response);
					}

					if(response.redirect !== undefined){
						setTimeout(function() {
							window.location = response.redirect;
						}, 3000);
					}
				}
			});
		}
	});

	initTable();
	function initTable(){
		var tableDom 	= document.getElementById('discount-table');
		var dataTable   = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-discounts'
	  		},
	  		'columns': [
				{ 	data: 'discount_id' ,className: "text-center",},
	     		{ 	data: 'item_name' ,className: "text-center",},
	     		{ 	data: 'discount_percent' ,className: "text-center",},
				{   data :'discount' ,className: "text-center",},
                {   data: 'display',
                 className: "text-center",
                 render: function (data, type, row, meta) {
                     return `
                         <label class="switch switch-default switch-pill switch-primary">
                             <input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.discount_id}">
                             <span class="switch-label"></span>
                             <span class="switch-handle"></span>
                         </label>`;
                 }
                },
	    	 	{ 	data: 'discount_id',
	    	 		className: "text-center", 
	    	 		render: function ( data, type, row, meta ) {
	    	 			return actionMenu(data);
    				}
	    	 	},
	  		],
		});

		$(tableDom).on('click','tbody .menu-item', function(event){
			event.stopImmediatePropagation();
			event.preventDefault();
			var discountId 	= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(discountId, action);
		});
           
        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  = $(e.currentTarget);
			let discount_id    = currentTarget.data('id');
			let params = {
				discount_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-discount-display',params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					initTable();
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

		$('.toggle-form').on('click', function(){
			toggleView();
		})
	}

	function actionMenu(discount_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="discount-${discount_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="discount-${discount_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteDiscount(discountId){
		bootbox.confirm({ 
		    title  			: "Delete Discount",
		    message			: "Do you watn to delete discount?",
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
		       			discount_id : discountId,
		       		}
		       		$.Utility.postData('delete-discount',params,function(response){
						response = JSON.parse(response);
						if(response.state){
							$.Utility.notify(response);
							initTable();
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

	function getDiscount(discountId){
		var endpoint 	= 'get-discount';
		var params 		= {
			discount_id : discountId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#discount_id').val(data.discount_id);
				$('#item_name').val(data.item_name);
				$('#discount_percent').val(data.discount_percent);
				$('#discount').val(data.discount);
				toggleView();
			} else {
				if(typeof response.message === 'object'){
					for(var key in response.message ){
						response.message = response.message[key];
						$.Utility.notify(response);
					}
				}else{
					$.Utility.notify(response);
				}
			}
		})
	}

	function performActions(DiscountId, action){
		switch(action){
			case 'edit':
				getDiscount(DiscountId);
			break;
			case 'delete':
				deleteDiscount(DiscountId);
			break; 
		}
	}

	document.getElementById('discount_percent').addEventListener('keypress', function(event) {
		// Get the input value
		var input = event.target.value + String.fromCharCode(event.keyCode);
		// Validate the input
		if (!validatePercentage(input)) {
			// Display error message
			document.getElementById('errormsg').style.display = 'block';
			event.preventDefault();
		} else {
			// Hide error message if a valid input is entered
			document.getElementById('errormsg').style.display = 'none';
		}
	});
	
	function validatePercentage(input) {
		// Check if the input is a valid number
		if (isNaN(input)) {
			return false;
		}
		
		// Convert input to a number
		var percentage = parseFloat(input);
		
		// Check if the number is within the range of 0 to 100
		if (percentage < 0 || percentage > 100) {
			return false;
		}
	
		// Input is valid
		return true;
	}
	

	document.getElementById('discount').addEventListener('keypress', function(event) {
		// Get the character code of the pressed key
		var charCode = (event.which) ? event.which : event.keyCode;
		// Allow only numbers (char codes 48 to 57)
		if (charCode < 48 || charCode > 57) {
		  // Display error message
		  document.getElementById('error').style.display = 'block';
		  event.preventDefault();
		} else {
		  // Hide error message if a number is entered
		  document.getElementById('error').style.display = 'none';
		}
	});
});
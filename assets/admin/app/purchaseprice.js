$(document).ready(function(){
	$.validate({form : '#price-form'});
	var PriceFormElem = document.getElementById('price-form');
	$(PriceFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var purchase_id = $('#purchase_id').val();
			var endpoint 	= 'set-purchase-price-details';
			
			var params 		= {
				country_name	        : $('#country_name').val(),
				transaction_name	    : $('#transaction_name').val(),
				purchase_item_name	    : $('#purchase_item_name').val(),
				purchase_percent		: $('#purchase_percent').val(),
				purchase_price	        : $('#purchase_price').val(),
				display					: 'Y',
				purchase_id 			: (purchase_id !== '' || purchase_id !== undefined)? purchase_id:''
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
		var tableDom 	= document.getElementById('price-table');
		var dataTable   = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-purchase-prices'
	  		},
	  		'columns': [
				{ 	data: 'purchase_id' ,className: "text-center",},
	     		{ 	data: 'country_name',className: "text-center" },
	     		{ 	data: 'transaction_name' ,className: "text-center" },
	     		{ 	data: 'purchase_item_name' ,className: "text-center" },
	     		{ 	data: 'purchase_percent' ,className: "text-center" },
				{   data :'purchase_price'  ,className: "text-center"},
                {   data: 'display',
                 className: "text-center",
                 render: function (data, type, row, meta) {
                     return `
                         <label class="switch switch-default switch-pill switch-primary">
                             <input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.purchase_id}">
                             <span class="switch-label"></span>
                             <span class="switch-handle"></span>
                         </label>`;
                 }
                },
	    	 	{ 	data: 'purchase_id',
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
			var purchaseId 	= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(purchaseId, action);
		});
           
        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  = $(e.currentTarget);
			let purchase_id    = currentTarget.data('id');
			let params = {
				purchase_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-purchase-price-display',params,function(response){
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

	function actionMenu(purchase_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="price-${purchase_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="price-${purchase_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deletePurchasePrice(purchaseId){
		bootbox.confirm({ 
		    title  			: "Delete Price",
		    message			: "Do you watn to delete price?",
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
						purchase_id : purchaseId,
		       		}
		       		$.Utility.postData('delete-purchase-price',params,function(response){
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

	function getPurchasePrice(purchaseId){
		var endpoint 	= 'get-purchase-price';
		var params 		= {
			purchase_id    : purchaseId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#purchase_id').val(data.purchase_id);
				$('#purchase_item_name').val(data.purchase_item_name);
				$('#purchase_percent').val(data.purchase_percent);
				$('#purchase_price').val(data.purchase_price);
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

	function performActions(purchaseId, action){
		switch(action){
			case 'edit':
				getPurchasePrice(purchaseId);
			break;
			case 'delete':
				deletePurchasePrice(purchaseId);
			break; 
		}
	}

	document.getElementById('purchase_percent').addEventListener('keypress', function(event) {
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
	
	document.getElementById('purchase_price').addEventListener('keypress', function(event) {
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
$(document).ready(function(){
	$.validate({form : '#offer-form'});
	var OfferFormElem = document.getElementById('offer-form');
	$(OfferFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var offer_id    = $('#offer_id').val();
			var endpoint 	= 'set-offer-details';
			
			var params 		= {
				offer_item_name			: $('#offer_item_name').val(),
				offer_percent			: $('#offer_percent').val(),
				offer	        		: $('#offer').val(),
				display					: 'Y',
				offer_id 			    : (offer_id !== '' || offer_id !== undefined)?offer_id:''
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
		var tableDom 	= document.getElementById('offer-table');
		var dataTable   = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-offers'
	  		},
	  		'columns': [
				{ 	data: 'offer_id' ,className: "text-center",},
	     		{ 	data: 'offer_item_name' ,className: "text-center" },
	     		{ 	data: 'offer_percent' ,className: "text-center" },
				{   data :'offer'  ,className: "text-center"},
                {   data: 'display',
                 className: "text-center",
                 render: function (data, type, row, meta) {
                     return `
                         <label class="switch switch-default switch-pill switch-primary">
                             <input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.offer_id}">
                             <span class="switch-label"></span>
                             <span class="switch-handle"></span>
                         </label>`;
                 }
                },
	    	 	{ 	data: 'offer_id',
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
			var offerId 	= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(offerId, action);
		});
           
        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  = $(e.currentTarget);
			let offer_id    = currentTarget.data('id');
			let params = {
				offer_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-offer-display',params,function(response){
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

	function actionMenu(offer_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="offer-${offer_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="offer-${offer_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteOffer(offerId){
		bootbox.confirm({ 
		    title  			: "Delete Offer",
		    message			: "Do you watn to delete offer?",
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
		       			offer_id : offerId,
		       		}
		       		$.Utility.postData('delete-offer',params,function(response){
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

	function getOffer(offerId){
		var endpoint 	= 'get-offer';
		var params 		= {
			offer_id    : offerId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#offer_id').val(data.offer_id);
				$('#offer_item_name').val(data.offer_item_name);
				$('#offer_percent').val(data.offer_percent);
				$('#offer').val(data.offer);
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

	function performActions(OfferId, action){
		switch(action){
			case 'edit':
				getOffer(OfferId);
			break;
			case 'delete':
				deleteOffer(OfferId);
			break; 
		}
	}

	document.getElementById('offer_percent').addEventListener('keypress', function(event) {
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
	

	document.getElementById('offer').addEventListener('keypress', function(event) {
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
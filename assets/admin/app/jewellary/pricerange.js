$(document).ready(function(){
	$.validate({form : '#pricerange-form'});
	var pricerangeFormElem = document.getElementById('pricerange-form');
	$(pricerangeFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			
			var pricerange_id = $('#pricerange_id').val();
			var endpoint 	= 'set-jewellary-pricerange';
			
			var params 		= {
				price_tablename			: $('#price_tablename').val(),
				PriceStart			: $('#PriceStart').val(),
				PriceEnd			: $('#PriceEnd').val(),
				display					: 'Y',
				pricerange_id 			: (pricerange_id !== '' || pricerange_id !== undefined)?pricerange_id:''
			}

			$.Utility.postData(endpoint,params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					toggleView();
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
		var tableDom 	= document.getElementById('pricerange-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-jewellary-priceranges'
	  		},
	  		'columns': [
				{ 	data: 'pricerange_id' },
				{ 	data: 'price_tablename' },
	     		{ 	data: 'PriceStart' },
	     		{ 	data: 'PriceEnd' },
	    	 	{ 	data: 'pricerange_id',
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
			var pricerangeId 		= $(this).data('id').split('-')[1];
			var action 			= $(this).data('action');
			performActions(pricerangeId, action);
		});

		$('.toggle-form').on('click', function(){
			toggleView();
		})
	}

	function actionMenu(pricerange_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="category-${pricerange_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="category-${pricerange_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deletePricerannge(pricerangeId){
		bootbox.confirm({ 
		    title  			: "Delete Pricerange",
		    message			: "Do you watn to delete Pricerange?",
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
						pricerange_id : pricerangeId,
		       		}
		       		$.Utility.postData('delete-jewellary-pricerange',params,function(response){
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

	function getpricerange(pricerangeId){
		var endpoint 	= 'get-jewellary-pricerange';
		var params 		= {
			pricerange_id : pricerangeId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#pricerange_id').val(data.pricerange_id);
				$('#price_tablename').val(data.price_tablename);
				$('#PriceStart').val(data.PriceStart);
				$('#PriceEnd').val(data.PriceEnd);
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

	function performActions(categoryId, action){
		switch(action){
			case 'edit':
				getpricerange(categoryId);
			break;
			case 'delete':
				deletePricerannge(categoryId);
			break; 
		}
	}
});
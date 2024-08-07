$(document).ready(function(){
	$.validate({form : '#category-form'});
	var categoryFormElem = document.getElementById('category-form');
	$(categoryFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var subcategory_id = $('#subcategory_id').val();
			var endpoint 	= 'set-jewellary-subcategory';
			
			var params 		= {
				categoryName			: $('#categoryName').val(),
				category_title			: $('#category_title').val(),
				category_desc			: $('#category_desc').val(),
				display					: 'Y',
				subcategory_id 			: (subcategory_id !== '' || subcategory_id !== undefined)?subcategory_id:''
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
		var tableDom 	= document.getElementById('category-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-jewellary-subcategories'
	  		},
	  		'columns': [
				{ 	data: 'subcategory_id' },
	     		{ 	data: 'category_title' },
	     		{ 	data: 'category_desc' },
				 { 	data: 'category_name' },
	    	 	{ 	data: 'subcategory_id',
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
			var categoryId 		= $(this).data('id').split('-')[1];
			var action 			= $(this).data('action');
			performActions(categoryId, action);
		});

		$('.toggle-form').on('click', function(){
			toggleView();
		})
	}

	function actionMenu(subcategory_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="category-${subcategory_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="category-${subcategory_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteCategory(categoryId){
		bootbox.confirm({ 
		    title  			: "Delete Category",
		    message			: "Do you watn to delete category?",
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
		       			subcategory_id : categoryId,
		       		}
		       		$.Utility.postData('delete-jewellary-subcategory',params,function(response){
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

	function getCategory(categoryId){
		var endpoint 	= 'get-jewellary-subcategory';
		var params 		= {
			subcategory_id : categoryId,
		}
		$.Utility.getData(endpoint, params, function(response){
			console.log(response);
			response = JSON.parse(response);
			if(response.state){
				var data = response.data.result;
				$('#categoryName').val(data.category_id);
				$('#subcategory_id').val(data.subcategory_id);
				$('#category_title').val(data.category_title);
				$('#category_desc').val(data.category_desc);
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
				getCategory(categoryId);
			break;
			case 'delete':
				deleteCategory(categoryId);
			break; 
		}
	}
});
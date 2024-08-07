$(document).ready(function(){
	$.validate({form : '#attribute-form'});
	var attributeFormElem = document.getElementById('attribute-form');
	$(attributeFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var attribute_id = $('#attribute_id').val();
			var endpoint 	= 'set-jewellary-attributes';
			
			var params 		= {
				subCategoryName			: $('#subCategoryName').val(),
				attribute_title			: $('#attribute_title').val(),
				display					: 'Y',
				attribute_id 			: (attribute_id !== '' || attribute_id !== undefined)?attribute_id:''
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
		var tableDom 	= document.getElementById('attribute-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-jewellary-attributes'
	  		},
	  		'columns': [
				{ 	data: 'attribute_id' },
	     		{ 	data: 'attribute_title' },
				 { 	data: 'sub_category_name' },
	    	 	{ 	data: 'attribute_id',
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
			var attributeId 		= $(this).data('id').split('-')[1];
			var action 			= $(this).data('action');
			performActions(attributeId, action);
		});

		$('.toggle-form').on('click', function(){
			toggleView();
		})
	}

	function actionMenu(attribute_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="category-${attribute_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="category-${attribute_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteAttribute(attributeId){
		bootbox.confirm({ 
		    title  			: "Delete Attribute",
		    message			: "Do you watn to delete Attribute?",
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
		       			attribute_id : attributeId,
		       		}
		       		$.Utility.postData('delete-jewellary-attribute',params,function(response){
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

	function getAttribute(attributeId){
		var endpoint 	= 'get-jewellary-attribute';
		var params 		= {
			attribute_id : attributeId,
		}
		$.Utility.getData(endpoint, params, function(response){
			console.log(response);
			response = JSON.parse(response);
			if(response.state){
				var data = response.data.result;
				$('#subCategoryName').val(data.subcategory_id);
				$('#attribute_id').val(data.attribute_id);
				$('#attribute_title').val(data.attribute_title);
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

	function performActions(attributeId, action){
		switch(action){
			case 'edit':
				getAttribute(attributeId);
			break;
			case 'delete':
				deleteAttribute(attributeId);
			break; 
		}
	}
});
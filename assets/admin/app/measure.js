$(document).ready(function(){
	$.validate({form : '#product-measurement-form'});
	var categoryFormElem = document.getElementById('product-measurement-form');
	$(categoryFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var measure_id  = $('#measure_id').val();
			var endpoint 	= 'set-product-measurement';
			
			var params 		= {
				measure_title		: $('#measure_title').val(),
				display				: 'Y',
				measure_id 			: (measure_id !== '' || measure_id !== undefined)? measure_id:''
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
		var tableDom 	= document.getElementById('measure-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-product-measurement'
	  		},
	  		'columns': [
				{  data: 'measure_id' },
	     		{  data: 'measure_title' },
                {  data: 'display',
					className: "text-center",
					render: function (data, type, row, meta) {
						return `
							<label class="switch switch-default switch-pill switch-primary">
								<input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.measure_id}">
								<span class="switch-label"></span>
								<span class="switch-handle"></span>
							</label>`;
					}
				},
	    	 	{ 	data: 'measure_id',
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
			var measureId 	= $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(measureId, action);
		});

        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget  = $(e.currentTarget);
			let measure_id 	   = currentTarget.data('id');
			let params = {
				measure_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-product-measure-display',params,function(response){
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

	function actionMenu(measure_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="product-${measure_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="product-${measure_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteProductMeasure(measureId){
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
		       			measure_id : measureId,
		       		}
		       		$.Utility.postData('delete-product-measure',params,function(response){
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

	function getProductMeasurement(measureId){
        console.log(measureId);
		var endpoint 	= 'get-measure';
		var params 		= {
			measure_id : measureId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
                $('#measure_id').val(data.measure_id);
				$('#measure_title').val(data.measure_title);
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

	function performActions(measureId, action){
		switch(action){
			case 'edit':
				getProductMeasurement(measureId);
			break;
			case 'delete':
				deleteProductMeasure(measureId);
			break; 
		}
	}
});
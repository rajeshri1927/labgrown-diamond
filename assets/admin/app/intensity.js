$(document).ready(function(){
	$.validate({form : '#intensity-form'});
	var overtoneFormElem = document.getElementById('intensity-form');
	$(overtoneFormElem).on('submit', function(event){
		event.stopImmediatePropagation();
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			var intensity_id = $('#intensity_id').val();
			var endpoint 	 = 'set-intensity-details';
			var params 		 = {
				intensity_name		: $('#intensity_name').val(),
				intensity_desc		: $('#intensity_desc').val(),
				display				: 'Y',
				intensity_id 		: (intensity_id !== '' || intensity_id !== undefined)?intensity_id:''
			}

			$.Utility.postData(endpoint,params,function(response){
				response = JSON.parse(response);
				if(response.state){
					$.Utility.notify(response);
					toggleView();
					initTable();
					location.reload();
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
		var tableDom 	= document.getElementById('intensity-table');
		var dataTable = $(tableDom).DataTable({
	  		'processing': true,
	  		'serverSide': true,
	  		'serverMethod': 'post',
	  		'destroy': true,
	  		'ordering': false,
	  		'ajax': {
	     		'url':'get-intensities'
	  		},
	  		'columns': [
				{ 	data: 'intensity_id' },
	     		{ 	data: 'intensity_name'},
	     		{   data: 'intensity_desc' },
                {   data: 'display',
                 className: "text-center",
                 render: function (data, type, row, meta) {
                     return `
                         <label class="switch switch-default switch-pill switch-primary">
                             <input type="checkbox" class="switch-input" ${(data === 'Y') ? 'checked="checked"' : ''} data-id="${row.intensity_id}">
                             <span class="switch-label"></span>
                             <span class="switch-handle"></span>
                         </label>`;
                 }
                },
	    	 	{ 	data: 'intensity_id',
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
			var intensityId = $(this).data('id').split('-')[1];
			var action 		= $(this).data('action');
			performActions(intensityId, action);
		});

        $(tableDom).on('change', '.switch-input', (e)=>{
			e.stopImmediatePropagation();
			e.preventDefault();
			let currentTarget   = $(e.currentTarget);
			let intensity_id    = currentTarget.data('id');
			let params = {
				intensity_id,
				display: (currentTarget.prop('checked'))?'Y':'N',
			}
			$.Utility.postData('set-intensity-display',params,function(response){
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

	function actionMenu(intensity_id){
		var menus = `
			<div class="action">
				<a href="javascript:void(0)" class="btn btn-link menu-item" data-action="edit" data-id="intensity-${intensity_id}" title="Edit">Edit</a> | 
                <a href="javascript:void(0)" class="btn btn-link menu-item" data-action="delete" data-id="intensity-${intensity_id}" title="Delete">Delete</a>
			</div>
		`;
		return menus;
	}

	function deleteIntensity(intensityId){
		bootbox.confirm({ 
		    title  			: "Delete Intensity",
		    message			: "Do you watn to delete Intensity?",
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
						intensity_id : intensityId,
		       		}
		       		$.Utility.postData('delete-intensity',params,function(response){
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

	function getIntensity(intensityId){
		var endpoint = 'get-intensity';
		var params 		= {
			intensity_id : intensityId,
		}
		$.Utility.getData(endpoint, params, function(response){
			response = JSON.parse(response);
			if(response.state){
				var data = response.data;
				$('#intensity_id').val(data.intensity_id);
				$('#intensity_name').val(data.intensity_name);
				$('#intensity_desc').val(data.intensity_desc);
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

	function performActions(intensityId, action){
		switch(action){
			case 'edit':
				getIntensity(intensityId);
			break;
			case 'delete':
				deleteIntensity(intensityId);
			break; 
		}
	}
});
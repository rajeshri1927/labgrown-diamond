(function($){
	"use strict";
	let tab_view = document.getElementById('custom-tab-view');
	openProfile();
// 	$('.custom-nav').on('click', '.nav-item', (event) => {
// 		event.stopImmediatePropagation();
// 		event.preventDefault();
// 		var tab = $(event.currentTarget).data('tab');
// 		console.log(tab);
// 		$('.custom-nav .nav-item').removeClass('active');
// 		if(tab == 'profile'){
// 			openProfile();
// 			$(event.currentTarget).addClass('active');
// 		} else {
			openOrders();
// 			$(event.currentTarget).addClass('active');
// 		}
// 	});

	function openProfile(){
		let endpoint = 'get-profile-view';
		getData(endpoint, {}, (response) => {
			response 	= JSON.parse(response);
			if(response.state){
				tab_view.innerHTML = response.data;
				let registrationFormElem = document.getElementById('registration-form');
				registrationFormElem.addEventListener('submit', setUserDetails);
			} else {
				notify(response);
			}
		});
	}

	function setUserDetails(event){
		event.preventDefault();
		let endpoint = 'set-user-details';
		if($(event.currentTarget).isValid()){
			var formdata = {};
			$.each($(event.currentTarget).serializeArray(), (i, field) => { formdata[field.name] = field.value; });
			formdata['city'] = $(event.currentTarget).find('#city').val();
			setTimeout(() => {
				postData(endpoint, formdata, (response) => {
					response = JSON.parse(response);
					if(response.state){
						notify(response);
					} else {
						if(typeof response.message === 'object'){
							$.each(response.message, (key, value)=>{
								let errorRes = {
									title: key,
									message: value,
									type: 'error'
								};
								notify(errorRes);
							});
						} else {
							notify(response);
						}
					}
				});
			}, 20);
		}
	}
	

	function openOrders(){
		let endpoint = 'get-cust-order-history';
		getData(endpoint, {}, (response) => {
			response 	= JSON.parse(response);
			if(response.state){
				tab_view.innerHTML = response.data;
			} else {
				notify(response);
			}
		});
	}

	function notify(notificationObj){
        $.toast({
		    text: notificationObj.message,
		    heading: notificationObj.title,
		    icon: notificationObj.type,
		    showHideTransition: 'fade',
		    allowToastClose: true,
		    hideAfter: 3000,
		    stack: 5,
		    position: 'bottom-right',
		    textAlign: 'left',
		    loader: false,
		});
    }

    function postData(endpoint, params, callback, headers){
        $.ajax({
            url   : endpoint,
            type  : 'POST',
            data  : params,
            headers : headers
        })
        .done(function(response) {
            callback(response)
        })
        .fail(function(response) {
            callback(response)
        })
        .always(function() {
            console.log("complete");
        });
    }

    function getData(endpoint, params, callback){
        $.ajax({
            url   : endpoint,
            type  : 'GET',
            data  : params,
        })
        .done(function(response) {
            callback(response)
        })
        .fail(function(response) {
            callback(response)
        })
        .always(function() {
            console.log("complete");
        });
    }

})(jQuery);
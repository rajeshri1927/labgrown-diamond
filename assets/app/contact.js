(function(){
	"use strict";
	let submit_enquiry 	= document.getElementById('submit_enquiry');
	submit_enquiry.addEventListener('submit', submitEnquiry);
	
	$.validate({ form : '#submit_enquiry' });

	function submitEnquiry(event){
		event.preventDefault();
		var formValid =  $(event.currentTarget).isValid();
		if(formValid){
			let endpoint 		= 'submit-enquiry-form';
			let params 			= {
				first_name			: $('#first_name').val(),
				last_name			: $('#last_name').val(),
				email				: $('#email').val(),
				contact_no 			: $('#contact_no').val(),
				message 			: $('#message').val(),
			};
			postData(endpoint, params, (response) => {
				response 	= JSON.parse(response);

				if(response.state){
					$('#submit_enquiry')[0].reset();
					swal({
					  	title: response.title,
					  	text: response.message,
					  	icon: response.type,
					  	button: "Continue Shopping",
					}).then((value) => {
	  					location.href = response.redirect;
					});
				}else{
					notify(response);
				}
			});
		}
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
})();
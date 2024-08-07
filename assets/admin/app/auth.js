(($) => {

	let registrationFormElem = document.getElementById('registration-form');
	let formName = registrationFormElem.getAttribute('name');
    let logoutElem = document.getElementById('logout');

    if (logoutElem != null) {
        logoutElem.addEventListener('click', logout);
    }
    
	if(formName === 'user-login'){
		registrationFormElem.addEventListener('submit', authenticateUser);
	} else if(formName === 'user-signup') {
		registrationFormElem.addEventListener('submit', setUserDetails);
	} else if (formName === 'user-reset-pass') {
        registrationFormElem.addEventListener('submit', resetPassword);
    }else if (formName === 'change-pass') {
        registrationFormElem.addEventListener('submit', adminChangePassword);
    }else {
		registrationFormElem.addEventListener('submit', setupForgotedPassword);
	}

	$.validate({
        form : '#registration-form',
        modules : 'security'
    });
	
	function setUserDetails(event){
		event.preventDefault();
		let endpoint = 'set-user-details';
		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-signup');
			var formdata = {};
			$.each($(event.currentTarget).serializeArray(), (i, field) => { formdata[field.name] = field.value; });

			setTimeout(() => {
				$.Utility.postData(endpoint, formdata, (response) => {
					$.Utility.enableBtn('.btn-signup');
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							window.location.href = 'admin/login';
						}, 2000);
					} else {
						if(typeof response.message === 'object'){
							$.each(response.message, (key, value)=>{
								let errorRes = {
									title: key,
									message: value,
									type: 'error'
								};
								$.Utility.notify(errorRes);
							});
						} else {
							$.Utility.notify(response);
						}
					}
				});
			}, 20);
		}
	}

	function authenticateUser(event) {
		event.preventDefault();
		let endpoint = 'authenticate-user';
		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-signup');
			var formdata = {};
			$.each($(event.currentTarget).serializeArray(), (i, field) => { formdata[field.name] = field.value; });
			
			setTimeout(() => {
				$.Utility.postData(endpoint, formdata, (response) => {
					$.Utility.enableBtn('.btn-signup');
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							window.location.href = 'admin/home';
						}, 2000);
					} else {
						if(typeof response.message === 'object'){
							$.each(response.message, (key, value)=>{
								let errorRes = {
									title: key,
									message: value,
									type: 'error'
								};
								$.Utility.notify(errorRes);
							});
						} else {
							$.Utility.notify(response);
						}
					}
				});
			}, 20);
		}
	}

	function setupForgotedPassword(event){
		event.preventDefault();
		let endpoint = 'send-reset-password-link';
		if($(event.currentTarget).isValid()){
			$.Utility.disableBtn('.btn-signup');
			var formdata = {};
			$.each($(event.currentTarget).serializeArray(), (i, field) => { formdata[field.name] = field.value; });
			setTimeout(() => {
				$.Utility.postData(endpoint, formdata, (response) => {
					$.Utility.enableBtn('.btn-signup');
					response = JSON.parse(response);
					if(response.state){
						$.Utility.notify(response);
						setTimeout(() => {
							window.location.href = 'admin/login';
						}, 2000);
					} else {
						if(typeof response.message === 'object'){
							$.each(response.message, (key, value)=>{
								let errorRes = {
									title: key,
									message: value,
									type: 'error'
								};
								$.Utility.notify(errorRes);
							});
						} else {
							$.Utility.notify(response);
						}
					}
				});
			}, 20);
		}
	}
	
	 function resetPassword(event) {
        event.preventDefault();
        let endpoint = 'reset-new-password';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                $.Utility.postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        $.Utility.notify(response);
                        setTimeout(() => {
                            window.location.href = 'admin/login';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
                                let errorRes = {
                                    title: key,
                                    message: value,
                                    type: 'error'
                                };
                                $.Utility.notify(errorRes);
                            });
                        } else {
                            $.Utility.notify(response);
                        }
                    }
                });
            }, 20);
        }
    }
	
	function adminChangePassword(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        let endpoint = 'reset_password';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                $.Utility.postData(endpoint, formdata, (response) => {
                    console.log(response);
                    response = JSON.parse(response);
                    if (response.state) {
                        $.Utility.notify(response);
						setTimeout(() => {
							logout();
							//window.location.href = 'admin/login';
						}, 1000);
                        // setTimeout(function() {
						// 	window.location.href = 'admin/login';
                        //     //window.location.href = response.redirect;
                        //     //logoutUser();
                        //     location.reload();
                        // }, 2500);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
                                let errorRes = {
                                    title: key,
                                    message: value,
                                    type: 'error'
                                };
                                $.Utility.notify(errorRes);
                            });
                        } else {
                            $.Utility.notify(response);
                        }
                    }
                });
            }, 20);
        }
    }
    
	function logout() {
        var endpoint = 'logout';
        var params = {
            login: true
        }
         $.Utility.postData(endpoint, params, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                $.Utility.notify(response);
                setTimeout(() => {
                    window.location.href = 'admin/login';
                }, 2000);
            } else {
                if (typeof response.message === 'object') {
                    $.each(response.message, (key, value) => {
                        let errorRes = {
                            title: key,
                            message: value,
                            type: 'error'
                        };
                         $.Utility.notify(errorRes);
                    });
                } else {
                       $.Utility.notify(response);
                }
            }
        });
    }
})(jQuery);
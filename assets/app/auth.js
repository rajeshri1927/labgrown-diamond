(($) => {
    let registrationFormElem = document.getElementById('registration-form');
    let country_code  = document.getElementById('country_code');
    let country_state = document.getElementById('state');
    let formName      = registrationFormElem.getAttribute('name');
    let logoutElem    = document.getElementById('logout');

    if (logoutElem != null) {
        logoutElem.addEventListener('click', logout);
    }
    let btnGoogleLogin   = document.getElementById('btn-google-login');
    let btnFbLogin       = document.getElementById('btn-fb-login');
    renderButton
    if (btnFbLogin) {
        btnFbLogin.addEventListener('click', fbLogin);
    }

    if(btnGoogleLogin !== null || typeof btnGoogleLogin !== 'undefined'){
        renderButton(btnGoogleLogin);
    }

    if (country_code) {
        country_code.addEventListener('change', updateStates);
    }

    if (formName === 'user-login') {
        registrationFormElem.addEventListener('submit', authenticateUser);
    } else if (formName === 'user-signup') {
        registrationFormElem.addEventListener('submit', setUserDetails);
    } else if (formName === 'user-reset-pass') {
        registrationFormElem.addEventListener('submit', resetPassword);
    } else if (formName === 'change-pass') {
        registrationFormElem.addEventListener('submit', changePassword);
    } else {
        registrationFormElem.addEventListener('submit', setupForgotedPassword);
    }

    $.validate({
        form    : '#registration-form',
        modules : 'security'
    });
	
    function updateStates(e) {
        console.log(e);
        var country_id = e.currentTarget.value;
        var country_name = e.target.options[e.target.selectedIndex].text.split(' ')[0];
        var endpoint = 'get-states';
        var params = {
            country_id
        }
        $('#country').val(country_name).prop("disabled", true);
        getData(endpoint, params, (response) => {
            // response = JSON.parse(response);
            if (response.state) {
                var options = '';
                options += '<option value="">Select State</option>';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].state_id + '">' + response.data[i].state_name + '</option>';
                }
                country_state.innerHTML = options;
                country_state.addEventListener('change', updateCities);
            } else {
                if (typeof response.message === 'object') {
                    $.each(response.message, (key, value) => {
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
    }

    function updateCities(e) {
        var state_id = e.currentTarget.value;
        var endpoint = 'get-cities';
        var params = {
            state_id
        }
        getData(endpoint, params, (response) => {
            // response = JSON.parse(response);
            if (response.state) {
                var options = '';
                options += '<option value="">Select City</option>';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].city_id + '">' + response.data[i].city_name + '</option>';
                }
                $('select#city').html(options);
            } else {
                if (typeof response.message === 'object') {
                    $.each(response.message, (key, value) => {
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
    }

    function setUserDetails(event) {
        event.preventDefault();
        let endpoint = 'set-user-details';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'login';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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
    
    function getUserFrom(user_id = null){
    	let endpoint = 'get-user-form-view';
    	let formdata = {
    		user_id : (user_id != null)?user_id:''
    	};
        postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        registrationFormElem.addEventListener('submit', setProductDetails);
                        notify(response);
                    }else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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
    }

    function editUser(user_id){
		getUserFrom(user_id);
	}
	
    function authenticateUser(event) {
        event.preventDefault();
        let endpoint = 'authenticate-user';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            formdata['login-from'] = 'site';
            console.log(formdata);
            setTimeout(() => {
                postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'home';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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

    function setupForgotedPassword(event) {
        event.preventDefault();
        let endpoint = 'send-reset-password-link';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'login';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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

    function resetPassword(event) {
        event.preventDefault();
        let endpoint = 'reset-new-password';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                postData(endpoint, formdata, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'login';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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

    function changePassword(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        let endpoint = 'reset_password';
        if ($(event.currentTarget).isValid()) {
            var formdata = {};
            $.each($(event.currentTarget).serializeArray(), (i, field) => {
                formdata[field.name] = field.value;
            });
            setTimeout(() => {
                postData(endpoint, formdata, (response) => {
                    // console.log(response);
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(function() {
                            logout();
                            location.reload(true);
                        }, 2500);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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

    function notify(notificationObj) {
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

    function postData(endpoint, params, callback, headers) {
        $.ajax({
                url: endpoint,
                type: 'POST',
                data: params,
                headers: headers
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

    function getData(endpoint, params, callback) {
        $.ajax({
                url: endpoint,
                type: 'GET',
                data: params,
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

    // Fetch the user profile data from facebook
    function getFbUserData() {
        FB.api('/me', {
            locale: 'en_US',
            fields: 'first_name,last_name,email'
        }, (response) => {
            let endpoint = 'login-with-facebook';
            let params = {
                email: response.email,
                first_name: response.first_name,
                last_name: response.last_name
            }
            postData(endpoint, params, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'home';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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
        });
    }

    function logout() {
        var endpoint = 'logout';
        var params = {
            login: true,
            site_id: 1
        }
        postData(endpoint, params, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                setTimeout(() => {
                    window.location.href = 'login';
                }, 2000);
            } else {
                if (typeof response.message === 'object') {
                    $.each(response.message, (key, value) => {
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
    }

    function renderButton(btnElement) {
        gapi.load('auth2', function(){
          auth2 = gapi.auth2.init({
            client_id: '781765255557-prng87a5pi81momoc703ppsk6p8gdp9f.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
          });
          attachSignin(btnElement);
        });
    }

    function attachSignin(element) {
        console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                let profile = googleUser.getBasicProfile();
                let name = profile.getName();
                var fullName = name.split(' ');
                let lastName = "";
                let firstName= "";
                if(fullName.length>1){
                   lastName  = fullName[1];
                   firstName = fullName[0];
                } else {
                   firstName = firstName[0];
                }
                let params = {
                    email: profile.getEmail(),
                    first_name: firstName,
                    last_name: lastName
                }
                let endpoint = 'login-with-facebook';
                postData(endpoint, params, (response) => {
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                        setTimeout(() => {
                            window.location.href = 'home';
                        }, 2000);
                    } else {
                        if (typeof response.message === 'object') {
                            $.each(response.message, (key, value) => {
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
            }, function(error) {
                let errorRes = {
                    title: 'Login Cancelled',
                    message: JSON.stringify(error, undefined, 2),
                    type: 'error'
                };
                //showToast(errorRes.type, errorRes.title, errorRes.message);
                notify(errorRes);
            });
    }

    function fbLogin() {
	    FB.login(function (response) {
	        if (response.authResponse) {
	            getFbUserData();
	        } else {
				let errorRes = {
					title: 'Login Cancelled',
					message: 'User cancelled login or did not fully authorize.',
					type: 'error'
				};
				notify(errorRes);
	        }
	    }, {scope: 'email'});
	}

	// Fetch the user profile data from facebook
	function getFbUserData(){
	    FB.api('/me', {
	    	locale: 'en_US', 
	    	fields: 'first_name,last_name,email'
	    }, (response) => {
	    	let endpoint = 'login-with-facebook';
	        let params = {
	       		email: response.email,
	       		first_name: response.first_name,
	       		last_name: response.last_name
	        }
	        postData(endpoint, params, function(response) {
					response = JSON.parse(response);
					console.log(response);
					if(response.state){
						notify(response);
						setTimeout(() => {
							window.location.href = 'home';
						}, 2000);
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
	    	});
	}
	
	function deleteAllCookies() {
	        var cookies = document.cookie.split(";");
	        if(cookies){
	            for (var i = 0; i < cookies.length; i++) {
	                var cookie = cookies[i];
	                var eqPos = cookie.indexOf("=");
	                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
	                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
	            }
	        }
	        
	    }
})(jQuery);
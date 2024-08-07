(function($){
    'use strict';

    let logoutElem = document.getElementById('logout');
	if(logoutElem != null){
		logoutElem.addEventListener('click', logoutUser);
	}
	
	function logoutUser(event){
		event.preventDefault();
		let endpoint = 'logout';

		var params = {
			login: true
		};

		$.Utility.postData(endpoint, params, (response) => {
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
	}
})(jQuery);

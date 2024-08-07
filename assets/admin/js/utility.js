!function ($) {
    "use strict";

    let Utility = function(){ };

    Utility.prototype.notify = (notificationObj) => {
        let device = getMobileOperatingSystem();
        $.toast({
        	heading: notificationObj.title,
		    text: notificationObj.message,
		    icon: notificationObj.type,
		    showHideTransition: 'fade',
		    allowToastClose: true,
		    hideAfter: 10000,
		    stack: 5,
		    position: (device === 'Android' || device === 'iOS')?'top-center':'bottom-right',
		    textAlign: 'left',
		    loader: false,
		});
    }

    Utility.prototype.postData = (endpoint, params, callback, headers) => {
        $.ajax({
            url   : endpoint,
            type  : 'POST',
            data  : params,
            headers : headers
        })
        .done((response) => {
            callback(response)
        })
        .fail((response) => {
            callback(response)
            console.log(response);
        })
        .always(() => {
            console.log("complete");
        });
    }

    Utility.prototype.getData = (endpoint, params, callback) => {
        $.ajax({
            url: endpoint,
            type: 'GET',
            data: params,
            headers : {
                "content-type": "application/x-www-form-urlencoded"
            },
        })
        .done((response) => {
            callback(response);
        })
        .fail(() => {
            console.log("error");
        })
        .always(() => {
            console.log("complete");
        });
    }

    Utility.prototype.postMultipartData = function(endpoint, params, callback, headers){
        $.ajax({
            url   : endpoint,
            type  : 'POST',
            data  : params,
            cache: false,
            contentType: false,
            processData: false,
            headers : headers
        })
        .done(function(response) {
            callback(response)
        })
        .fail(function(response) {
            callback(response)
            console.log(response);
        })
        .always(function() {
            console.log("complete");
        });
    }

    Utility.prototype.getMobileOperatingSystem = () => {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/android/i.test(userAgent)) {
            return "Android";
        }

        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }
        return "unknown";
    }

    Utility.prototype.lastHistoryPath = () => {
        return history.go(-2);
    }

    Utility.prototype.enableBtn  = (btnElement) => {
        $(btnElement).removeClass('disabled').css('pointer-events', 'auto');

    }

    Utility.prototype.disableBtn  = (btnElement) => {
        $(btnElement).addClass('disabled').css('pointer-events', 'none');
    }



    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/android/i.test(userAgent)) {
            return "Android";
        }

        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }
        return "unknown";
    }

    $.Utility = new Utility, $.Utility.Constructor = Utility;
}(window.jQuery);
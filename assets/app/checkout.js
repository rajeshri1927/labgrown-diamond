  $(document).on('click', '#different_address', function(event) {
       var checkbox = document.querySelector('input[type="checkbox"]');
        if(checkbox.checked===true){
            $('#billing').hide();
            $('#SecondPanel').show();
        
        }else{
            $('#billing').show();
            $('#SecondPanel').hide();
        }
    });
	
(function($){
	"use strict";
	let cart_count 			= document.getElementById('cart-count');
	let cart_content_items 	= document.getElementById('cart_product_info');
	let price_total_para 	= document.getElementById('price_total_para');
	let price_total_span 	= document.getElementById('price_total_span');
	let proceed_to_order 	= document.getElementById('proceed-to-order');
	let time_slot 			= document.getElementById('delivery-time-slot');
	let country_code 		= document.getElementById('country_code');
	let country_state 		= document.getElementById('state');
	let ship_country_code   = document.getElementById('ship_country_code');
	let ship_country_state  = document.getElementById('ship_state');
	
	if(country_code) {
		country_code.addEventListener('change', updateStates);
	}
	
    let coupon_code  = document.getElementById('coupon_code');
	
	if(coupon_code) {
		coupon_code.addEventListener('click', couponCode);
	}
    
	proceed_to_order.addEventListener('submit', proceedToOrder);

	let cart_total 			= null;
	
	//$.validate({form :'#proceed-to-order'});
    // $.validate({
    //     form : '#proceed-to-order',
    //     modules : 'security'
    // });
	
	function updateStates(e){
    	console.log(e);
    	var country_id   =  e.currentTarget.value;
    	var country_name = e.target.options[e.target.selectedIndex].text.split(' ')[0];
    	var endpoint	 = 'get-states';
    	var params = {
    		country_id	
    	}
    	$('#country').val(country_name).prop("disabled", true);
    	getData(endpoint, params, (response) => {
			if(response.state){
				var options = '';
	            options += '<option value="">Select State</option>';
	            for (var i = 0; i < response.data.length; i++) {
	                options += '<option value="' + response.data[i].state_id + '">' + response.data[i].state_name + '</option>';
	            }
	            country_state.innerHTML = options;
	            country_state.addEventListener('change', updateCities);
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
    }

    function updateCities(e){
    	var state_id   =  e.currentTarget.value;
    	var endpoint	 = 'get-cities';
    	var params = {
    		state_id	
    	}
    	getData(endpoint, params, (response) => {
			if(response.state){
				var options = '';
	            options += '<option value="">Select City</option>';
	            for (var i = 0; i < response.data.length; i++) {
	                options += '<option value="' + response.data[i].city_id + '">' + response.data[i].city_name + '</option>';
	            }
	            $('select#city').html(options);
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
    }

    if(ship_country_code) {
		ship_country_code.addEventListener('change', shipUpdateStates);
	}

    function shipUpdateStates(e){
    	var country_id   =  e.currentTarget.value;
    	var country_name = e.target.options[e.target.selectedIndex].text.split(' ')[0];
    	var endpoint	 = 'get-states';
    	var params = {
    		country_id	
    	}
    	$('#country').val(country_name).prop("disabled", true);
    	getData(endpoint, params, (response) => {
			if(response.state){
				var options = '';
	            options += '<option value="">Select State</option>';
	            for (var i = 0; i < response.data.length; i++) {
	                options += '<option value="' + response.data[i].state_id + '">' + response.data[i].state_name + '</option>';
	            }
	            ship_country_state.innerHTML = options;
	            ship_country_state.addEventListener('change', shipUpdateCities);
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
    }

    function shipUpdateCities(e){
    	var state_id   =  e.currentTarget.value;
    	var endpoint	 = 'get-cities';
    	var params = {
    		state_id	
    	}
    	getData(endpoint, params, (response) => {
			// response = JSON.parse(response);
			if(response.state){
				var options = '';
	            options += '<option value="">Select City</option>';
	            for (var i = 0; i < response.data.length; i++) {
	                options += '<option value="' + response.data[i].city_id + '">' + response.data[i].city_name + '</option>';
	            }
	            $('select#city-name').html(options);
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
    }

	getCartItems();
	function getCartItems(){
		let endpoint = 'get-cart-items';
		getData(endpoint, {
			user_details: true
		}, (response) => {
			response 	= JSON.parse(response);
			if(response.state){
				let cart_item = '';
				response.cart_products.forEach((cart_product)=>{
					console.log(cart_product);
					cart_item += `
					<div class="pro_check">
					<h6>3.50 Carat Emerald Cut With Round Band</h6>
					<b class="float-right">₹ 12345789 </b>
				  </div>
				  <div class="row pr-2 pl-2 check_detail">
					<div class="col-md-2">
					  <img src="assets/images/Round.jpg" class="img-fluid">
					  <b class="save_later d-md-none d-sm-block"> 
					  <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
					  <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
					  </b>
					</div>
					<div class="col-md-7">
					  <h5>Setting</h5>
					  <p><strong>SKU:</strong> L030OV-EN27-36E</p>
					  <p><strong>Type:</strong>Natural</p>
					  <p><strong>Shape:</strong>Oval</p>
					  <h5 class="mt-1">Side Stone Info</h5>
					  <p><strong>Carat:</strong>0.32</p>
					  <p><strong>Color:</strong>E</p>
					  <hr>
					  <p><strong>Price:</strong>₹ 12345789</p>
					  <p><strong>Appraisal:</strong>₹ 12345</p>
					</div>
					<div class="col-md-3">
					  <b class="save_later d-md-block d-sm-none d-none"> <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
					  <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
					  </b>
					</div>
					<div class="col-md-12 mt-2">
					  <div class="silver_buttons">
						<div class="input-group mb-3">
						  <button type="button" class="silvercz"><b>Silver and CZ replica</b></button>
						  <div class="input-group-append">
							<span class="input-group-text"><b>Add</b></span>
						  </div>
						</div>
						<button type="button" class="apprai">Appraisal (₹ 890) <i class="fa fa-times mr-1" aria-hidden="true" title=""></i></button>
					  </div>
					</div>
				  </div>
				  <hr>
					`;
				});
				$(".cart-count").text(response.cart_product_count);
				$(".cart-total").html(`<i class="fa fa-inr" aria-hidden="true"></i> ${response.cart_product_total}`);
			} else {
				let cart_item = '';
					cart_item += `
						<div class="food_img_price_des">
							<div class="cart-content" style="width:100%; text-align:center;">
								<h5>No product selected yet.</h5>
							</div>
						</div>
					`;
				$(".cart-count").text(0);
				//cart_content_items.innerHTML = cart_item;
				$('#cart_product_info').html(cart_item);
				price_total_para.innerText   = 0;
				price_total_span.innerText 	 = 0;
			}
		});
	}
	
	function proceedToOrder(event){
	    event.preventDefault();
        event.stopImmediatePropagation();
		let endpoint 		= 'proceed-to-order';
		var formdata = {};
		$.each($(event.currentTarget).serializeArray(), (i, field) => { formdata[field.name] = field.value; });
		console.log(formdata);
		postData(endpoint, formdata, (response) => {
			response 	= JSON.parse(response);
			if(response.state){
			  location.href = response.redirect;	
			}else{
				notify(response);
			}
		});
	}

    let discountedAmount = '00.00';
    $('#discount').text(discountedAmount);
    let discountCost = '00.00';
    function couponCode(){
        let endpoint             = 'get-coupon-code';
        let total_cost           = $('#total_cost').data('amount');
        let couponCode           = $('#coupon_unique_id').val();
        let res                  = couponCode.replace(/\D/g, "");
        let discountedAmount     = total_cost*res/100;
        let discountCost         = total_cost - discountedAmount;
        let categoryId           = [];
        $("input[name='category_id']").each(function() {
          categoryId.push($(this).val());
        });
        let shippingprice     = $('#shppingCost').text();
            shippingprice     = parseFloat(shippingprice);
        let param    = {
            coupon_unique_id:$('#coupon_unique_id').val(),
            category_id :$("#category_id").val(),
            discountCost,
            discountedAmount
        }
        postData(endpoint, param,(response) => {
		response 	= JSON.parse(response);
			if(response.valid){
               notify(response);
                let totalproductprice = total_cost ;//+ shippingprice;
                 $('#discount').text(discountedAmount);  
                let productPrice  = discountCost; //+ shippingprice;
                if(response.valid){
                  $('.total-cost-price').text(productPrice); 
                }else{
                $('.total-cost-price').text(totalproductprice);  
                }
			}else{
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

    $('#enable-address').on('click', (event) => {
    	let currentTarget = $(event.currentTarget);
    	if(currentTarget.prop('checked')){
    		$('#address').attr('disabled', false);
    		$('#pincode').attr('disabled', false);
    	} else{
    		$('#address').attr('disabled', true);
    		$('#pincode').attr('disabled', true);
    	}
    })

})(jQuery);
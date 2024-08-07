let cart_total = null;
(function($) {
    "use strict";
    let shop_cart_tbody         = document.getElementById('shop-cart-tbody');
    let proceed_to_checkout     = document.getElementById('proceed-to-checkout');
    let product_price           = document.getElementById("productPrice")
    let actual_product_price    = document.getElementById("actualProductPrice")
    let country_code            = document.getElementById('country_code');
    let country_state           = document.getElementById('state');
    let calculate_tax_btn       = document.getElementById('calculate-tax');
    if(country_code){
            country_code.addEventListener('change', updateStates);
    }
    
    getCartProducts();
    function getCartProducts() {
        let endpoint = 'get-cust-order-history';
        getData(endpoint, {}, (response) => {
            console.log(response);
            response = JSON.parse(response);
            if (response.state) {
                let wishlist_item = '';
                response.data.forEach((element) => {
                    wishlist_item += `<tr id="ProductTR">
                            <td style="padding-top: 20px;"><img  alt="LAB GROWN DIAMOND" class="img-responsive" src="./assets/uploads/products/${element.system_file_name}"  title="LAB GROWN DIAMOND" style="height: 100px;"></td>
                            <td style="padding-top: 20px;" class="cart-product-one">${element.product_title}</td>
                            <td style="padding-top: 20px;" class="total-col"><a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-image="${element.system_file_name}" data-id="${element.id}"> Print Invoice </a></td>
                        </tr>`;
                });
                //shop_cart_tbody.innerHTML = cart_item;
                // $("#shop-cart-tbody").html(wishlist_item);
                $("#shop-cart-tbody").on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let action 			= currentTarget.data('action');
        				let id 	            = currentTarget.data('id');
        				if(action === 'delete'){
        					let product_image = currentTarget.data('image');
        					deleteWishlistItem(id, product_image);
        				}
        		});
            } else {
                let wishlist_item = '';
                wishlist_item += `
						<tr>
							<td colspan="3" class="cart-content text-center">
								<h5>No product add in wishlist.</h5>
							</td>
						</tr>
					`;
            }
        });
    }

    function deleteWishlistItem(id,product_image) {
        let param = {
            id,
            product_image
        }
        console.log(param);
        let endpoint = 'delete-wishlist-item';
        postData(endpoint, param, (response) => {
            console.log(response);
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                getCartProducts();
            } else {
                notify(response);
            }
        });
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
})(jQuery);
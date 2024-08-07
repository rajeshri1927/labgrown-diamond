let wishlist_total = null;
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
        let endpoint = 'get-wishlist-items';
        getData(endpoint, {}, (response) => {
            response = JSON.parse(response);
            console.log(response);
            if (response.state) {
                let wishlist_item = '';
                response.data.forEach((element) => {
                    wishlist_item +=`  <div class="row add_cart mt-3">
                    <div class="col-md-2">
                      <img srcset="${element.product_image} 320w, ${element.product_image} 640w, ${element.product_image} 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="${element.product_image}" alt="Image" loading="lazy" class="img-fluid">
                    </div>
                    <div class="col-md-4">
                      <h5>${element.product_name}</h5>
                      <p><strong>Price:</strong>₹ ${element.product_price}</p>
                      <p><strong>Title:</strong>${element.product_type}</p>
                      <p><strong>Stock Id:</strong>${element.product_id}</p>
                    </div>
                    <div class="col-md-3 add-card">
                       <button type="button" data-product-name="${element.product_name}"  data-product-price="${element.product_price}" data-product-id="${element.product_id}" data-image="${element.product_image}" data-product-size="${element.size}" data-cert-url="${element.cert_url}" data-id="${element.id}" class=" btn add-cart"style="padding: 0 9px 0 5px;background-color: #ff8080;border-color: #ff8080;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-md-3">
                      <h5 class="float-right">
                        <button type="button" class="btn" style="padding: 0 9px 0 5px;"><a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.id}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </button>
                      </h5>
                    </div>
                  </div><hr>`;
                });
                wishlist_total = response.wishlist_count;
                $("#wishlist-count").text(wishlist_total);
                $('#wishlist-count-ds').text(wishlist_total);
                $("#shop-wishlist-tbody").html(wishlist_item);
                $("#shop-wishlist-tbody").on('click', '.btn-action', (e)=>{
        				e.stopImmediatePropagation();
        				e.preventDefault();
        				let currentTarget  	= $(e.currentTarget);
        				let action 			= currentTarget.data('action');
        				let id 	            = currentTarget.data('id');
        				if(action === 'delete'){
        					// let product_image = currentTarget.data('image');
        					deleteWishlistItem(id);
        				}
        		});
                $(".add-card").on('click', 'button.add-cart', (event) => {
                    console.log(event);
                    event.stopImmediatePropagation();
                    event.preventDefault();
                    addToCart(event);
                });
            } else {
                let wishlist_item = '';
                wishlist_item += `
					<div class="differ_view cart-content text-center" style="padding: 25px;">
                            <h2>No product add in wishlist.</h2>
                    </div>
					`;
            }
        });
    }

    function deleteWishlistItem(id) {
        let param = {
            id
        }
        let endpoint = 'delete-wishlist-item';
        getData(endpoint, param, (response) => {
            console.log(response);
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                getCartProducts();
                $("#wishlist-count").text(response.wishlist_count);
            } else {
                notify(response);
            }
        });
    }
	
    function addToCart(event) {
        let currentTarget = $(event.currentTarget);
        let qty = '1'; //$(currentTarget).parent().parent().find("#qty").val();
        let params = {
            product_id: currentTarget.data('product-id'),
            qty: qty,
            product_name: currentTarget.data('product-name'),
            product_weight: currentTarget.data('product-size'),
            product_price: currentTarget.data('product-price'),
            product_image: currentTarget.data('image'),
            cert_url : currentTarget.data('cert-url'),
            product_shape: currentTarget.data('product-shape'),
            product_color : currentTarget.data('product-color'),
            product_type : currentTarget.data('product-type'),
            product_clarity : currentTarget.data('product-clarity')
        }
        let endpoint = 'set-product-in-cart';
        postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                getCartProducts();  
                let wishlistProductId = currentTarget.data('id');
                deleteWishlistItem(wishlistProductId);
            }
            notify(response);
            setTimeout(() => {
                //window.location.href = response.redirect;
                window.location.href = 'cart-view';
            }, 2000);
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
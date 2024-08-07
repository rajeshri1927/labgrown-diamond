let wishlist_total = null;
(function($) {
    "use strict";
    let shop_menu_cnt_1 = document.getElementById('shop-menu-cnt-1');
    let shop_menu_cnt_2 = document.getElementById('shop-menu-cnt-2');
    let logoutElem      = document.getElementById('logout');
    
    if (logoutElem != null) {
        logoutElem.addEventListener('click', logoutUser);
    }

    // shop_menu_cnt_1.addEventListener('mouseover', getCartItems);
    // shop_menu_cnt_2.addEventListener('click', getCartItems);

    $(".add-card").on('click', 'button.btn', (event) => {
        event.stopImmediatePropagation();
        event.preventDefault();
        let currentTarget = $(event.currentTarget);
        let params = {
            product_id: currentTarget.data('product')
        }
        let endpoint = 'set-product-in-cart';
        postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                getCartItems();
            }
            notify(response);
        });
    });

    getCartItems();
    facebookAuthInit();
    function getCartItems() {
        let endpoint = 'get-cart-items';
        $('.cart-total').hide();
        getData(endpoint, {}, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                $('.cart-total').show();
                let cart_item = '';
                response.cart_products.forEach((cart_product) => {
                    cart_item += `
                        <li class="cart-item" data-product="${cart_product.id}">
                            <img src="./assets/uploads/products/${cart_product.options['product_image']}" alt="">
                            <div class="cart-content">
                                <h5>${cart_product.name}</h5>
                                <span class="cart-quantity">
                                    ${cart_product.qty} x ${cart_product.price}
                                </span>
                            </div>
                        </li>
                    `;
                });
                $(".shop-cart").html(cart_item);
                $(".cart-count").text(response.cart_product_count);
                $(".cart-total").html(`<strong>Sub Total: </strong>${response.cart_product_total}`);
            } else {
                $('.cart-total').hide();
                let cart_item = '';
                cart_item += `
                        <li class="cart-item">
                            <div class="cart-content">
                                <h5>No product selected yet.</h5>
                            </div>
                        </li>
                    `;

                $(".shop-cart").html(cart_item);
                $(".cart-count").text(0);
            }
        });
    }

    function logoutUser(event) {
        event.preventDefault();
        let endpoint = 'logout';
        let isFb     = $(event.currentTarget).data('fb');

        var params = {
            login: true,
            site_id: 1
        };

        postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                if (isFb === 'Y') {
                    FB.getLoginStatus(function(res) {
                        if (response.status === 'connected') {
                            FB.logout(function(resp) {
                                notify(response);
                                setTimeout(() => {
                                    window.location.href = 'home';
                                }, 2000);
                            });
                        } else {
                            setTimeout(() => {
                                window.location.href = 'home';
                            }, 2000);
                        }
                    });
                } else {
                    notify(response);
                    setTimeout(() => {
                        window.location.href = 'home';
                    }, 2000);
                }
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

    getwishlistProducts();
    function getwishlistProducts() {
        let endpoint = 'get-wishlist-items';
        getData(endpoint, {}, (response) => {
            response = JSON.parse(response);
            console.log(response);
            if (response.state) {
                let wishlist_item = '';
                response.data.forEach((element) => {
                    wishlist_item +=`<div class="row add_cart mt-3">
                    <div class="col-md-2">
                      <img srcset="${element.product_image} 320w, ${element.product_image} 640w, ${element.product_image} 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="${element.product_image}" alt="Image" loading="lazy" class="img-fluid">
                    </div>
                    <div class="col-md-4">
                      <h5>${element.product_name}</h5>
                      <p><strong>Price:</strong> $${element.product_price}</p>
                      <p><strong>Title:</strong> ${element.product_type.replace(/_/g, ' ').replace(/\b\w/g, function (char) {
                        return char.toUpperCase();
                        })}</p>                    
                      <p><strong>Stock Id:</strong>${element.product_id}</p>
                      <p><strong>Shape:</strong>${element.product_shape}</p>
                      <p><strong>Color:</strong>${element.product_color}</p>
                      <p><strong>Clarity:</strong>${element.product_clarity}</p>
                    </div>
                    <div class="col-md-3 add-card">
                    <button type="button" data-product-name="${element.product_name}"  data-product-price="${element.product_price}" data-product-id="${element.product_id}" data-image="${element.product_image}" data-product-size="${element.product_weight}" data-cert-url="${element.cert_url}" data-product-shape="${element.product_shape}" 
                    data-product-color="${element.product_color}" data-product-clarity="${element.product_clarity}" data-id="${element.id}" data-product-type="${element.product_type}" class="btn btn-primary add-cart" style="background-color: #ff8080;border-color: #ff8080;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-md-3">
                      <h5 class="float-right">
                        <button type="button" class="btn btn-primary" style="padding: 0 9px 0 5px;background-color: #ff8080;border-color: #ff8080;"><a href="javascript:void(0);" class="btn btn-link btn-action" data-action="delete" data-id="${element.id}" style="color:#fff;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </button>
                      </h5>
                    </div>
                  </div><hr>`;
                });
                // $("#shop-cart-tbody").html(wishlist_item);
                wishlist_total = response.wishlist_count;
                $("#wishlist-count").text(response.wishlist_count);
                $('#wishlist-count-ds').text(wishlist_total); 
                $("#shop-wishlist-tbody").html(wishlist_item);
                $("#shop-wishlist-tbody").on('click', '.btn-action', (e)=>{
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    let currentTarget   = $(e.currentTarget);
                    let action          = currentTarget.data('action');
                    let id              = currentTarget.data('id');
                    if(action === 'delete'){
                        let product_image = currentTarget.data('image');
                        deleteWishlistItem(id, product_image);
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
                $("#shop-wishlist-tbody").html(wishlist_item);
            }
        });
    }

    function deleteWishlistItem(wishlist_id) {
        let param    = { id: wishlist_id }
        let endpoint = 'delete-wishlist-item';
        getData(endpoint, param, (response) => {
            console.log(response);
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                getwishlistProducts();
                $("#wishlist-count").text(response.wishlist_count);
            } else {
                notify(response);
            }
        });
    }

    function deleteCheckoutItem(product_id){
        let param    = { id: product_id }
        let endpoint = 'delete-checkout-item';
        getData(endpoint, param, (response) => {
            console.log(response);
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                // getwishlistProducts();
                $("#wishlist-count").text(response.wishlist_count);
            } else {
                notify(response);
            }
        });
    }

    $(document).ready(function() {
        let wishlistButtons = document.querySelectorAll('.add-wishlist');
        wishlistButtons.forEach(function(button) {
            button.addEventListener('click', add_wishlist);
        });
    });
    
    function add_wishlist(event) {
        event.preventDefault(); 
        let product_id     = this.getAttribute('data-product-id');
        let user_id        = this.getAttribute('data-userid');
        let url            = this.getAttribute('data-url');
        let wishlist_id    = this.getAttribute('data-id');
        let product_name   = this.getAttribute('data-product-name');
        let product_shape  = this.getAttribute('data-product-shape');
        let product_color  = this.getAttribute('data-product-color');
        let product_clarity= this.getAttribute('data-product-clarity');
        let product_type   = this.getAttribute('data-product-type');
        let product_weight = this.getAttribute('data-product-size');
        let product_price  = this.getAttribute('data-product-price');
        let product_image  = this.getAttribute('data-image');
        let cert_url       = this.getAttribute('data-cert-url');
        let endpoint       = 'set-wish-list';
        let params = { 
            product_id,
            user_id,
            url,
            wishlist_id,
            product_name,
            product_shape,
            product_color,
            product_clarity,
            product_weight,
            product_type,
            product_price,
            product_image,
            cert_url
        }; 
        postData(endpoint, params, function(response) {
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                if (response.redirect !== undefined) {
                    setTimeout(function() {
                        getwishlistProducts();
                        deleteCheckoutItem(product_id);
                        //location.href = response.redirect;
                    }, 3000);
                } else {
                    location.href = 'home';
                }
            } else {
                deleteWishlistItem(wishlist_id);
            }
        });
    }

    function addToCart(event) {
        let currentTarget = $(event.currentTarget);
        let qty    = '1'; //$(currentTarget).parent().parent().find("#qty").val();
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
                getwishlistProducts();  
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

    function facebookAuthInit() {
        window.fbAsyncInit = function() {
            FB.init({
                apiKey: '12f3110682bb8ebc38ff135b1300830e',
                appId: '326180415766378',
                cookie: true,
                xfbml: true,
                version: 'v8.0'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }

})(jQuery);
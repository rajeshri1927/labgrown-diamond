let cart_total = null;
(function($) {
    "use strict";
    let shop_cart_tbody         = document.getElementById('shop-cart-view-tbody');
    let proceed_to_checkout     = document.getElementById('proceed-to-checkout');
    let proceed_checkout        = document.getElementById('proceed_checkout');
    let product_price           = document.getElementById("productPrice")
    let actual_product_price    = document.getElementById("actualProductPrice")
    let country_code            = document.getElementById('country_code');
    let country_state           = document.getElementById('state');
    let calculate_tax_btn       = document.getElementById('calculate-tax');
    let cart_view_model_item    = document.getElementById('my_cart');
    if(country_code){
        country_code.addEventListener('change', updateStates);
    }
    
    if (proceed_to_checkout) {
        proceed_to_checkout.addEventListener('click', proceedToCheckout);
    }

    if(proceed_checkout){
        proceed_checkout.addEventListener('click', Checkout);
    }
    
    if(calculate_tax_btn){
        calculate_tax_btn.addEventListener('click', showCalculateTax);
    }

    let calculateBtn = document.getElementById('calculate');
    
    if(calculateBtn){
        calculateBtn.addEventListener('click', BillFunction);
    }
    
    if (cart_view_model_item) {
        cart_view_model_item.addEventListener('click', getCartProducts);
    }
    
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'INR',
    });

    function updateStates(e){
        console.log(e);
        var country_id   =  e.currentTarget.value;
        var country_name = e.target.options[e.target.selectedIndex].text.split(' ')[0];
        var endpoint     = 'get-states';
        var params = {
            country_id  
        }
        $('#country').val(country_name).prop("disabled", true);
        getData(endpoint, params, (response) => {
            // response = JSON.parse(response);
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
        var endpoint     = 'get-cities';
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
    
    if (product_price && actual_product_price) {
        var ProductPriceDB1 = product_price.innerText;
        var ActualProductPriceDB1 = actual_product_price.innerText;
        product_price.innerText = formatter.format(ProductPriceDB1);
        actual_product_price.innerText = formatter.format(ActualProductPriceDB1);
    }
    $(".quantity-button").on("click", "span i", function(e) {
        var oldValue = document.getElementById("qty").value;
        if (e.currentTarget.id === 'priceMax') {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }

        var ProductPriceDB = parseFloat(ProductPriceDB1);
        var ActualProductPriceDB = parseFloat(ActualProductPriceDB1);

        var FianlPrice = (ProductPriceDB * newVal);
        var FianlPrice1 = (ActualProductPriceDB * newVal);

        product_price.innerHTML = formatter.format(FianlPrice);
        actual_product_price.innerHTML = "<del>" + formatter.format(FianlPrice1) + "</del>";
    });
    
    getCartProducts();
    function getCartProducts() {
        let endpoint = 'get-cart-items';
        getData(endpoint, {}, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                let cart_item = '';
                let cart_pop_item = '';
                response.cart_products.forEach((cart_product) => {
                    console.log(cart_product);
                cart_item+=`<div class="row add_cart mt-3">
                    <div class="col-md-2">
                      <img srcset="${cart_product.options['product_image']} 320w, ${cart_product.options['product_image']} 640w, ${cart_product.options['product_image']} 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="${cart_product.options['product_image']}" alt="${(cart_product.name) }" loading="lazy" class="img-fluid">
                      <b class="save_later d-md-none d-sm-block">
                      <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
                      <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
                      </b>
                    </div>
                    <div class="col-md-4 shopping-cart-price">
                      <h5>${(cart_product.name) }</h5>
                      <p><strong>Price:</strong><span class="CurrencyIcon"> ₹ ${(cart_product.price) } </span></p>
                      <p><strong>Title:</strong> ${(cart_product.options['product_type'] ? cart_product.options['product_type'].replace(/_/g, ' ').replace(/\b\w/g, function (char) {
                            return char.toUpperCase();
                        }) : '')}</p>
                      <p><strong>Shape:</strong>${cart_product.options['product_shape']}</p>
                      <p><strong>Size:</strong>${cart_product.options['product_weight'] . concat(" ", 'carat')}</p>
                      <p><strong>Stock Id:</strong>${(cart_product.id) }</p>
                      <p><strong>Color:</strong>${cart_product.options['product_color']}</p>
                      <p><strong>Clarity:</strong>${cart_product.options['product_clarity']}</p>
                      </div>
                    <div class="col-md-3">
                      <div class="input-group shopping-cart-quantity add-card-product">
                        <span class="input-group-btn quantity-button">
                        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" id="priceMin" name="priceMin" style="background:#ff8080;border: #ff8080;">
                            <span class="fa fa-minus"></span>
                        </button>
                        </span>
                       <input class="ClassQty5 form-control input-number" type="number" min="1" max="100" step="1" value="${cart_product.qty}" name="qty" readonly style="-webkit-appearance: none;
                              -moz-appearance: none;
                              appearance: none;
                              margin: 0;">
                        <span class="input-group-btn quantity-button">
                            <span class="input-span" data-rowid="${cart_product.rowid}" data-price="${cart_product.price}" data-cart="${cart_product.id}"></span>
                            <button type="button" class="btn btn-success btn-number mr-2" data-type="plus" data-field="quant[2]" style="background:#009578;border: #009578;">
                                <span class="fa fa-plus" id="priceMax" name="priceMax"></span>
                            </button>
                            <button type="button" class="btn btn-primary total-col" style="padding: 0 9px 0 5px;border:#6e7277;background:#6e7277;"><span class="remove-cart" data-rowid="${cart_product.rowid}"><i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </span> 
                      </div>
                    </div>
                    <div class="col-md-3 total-col">
                        <h5 class="float-right"><span class="total-cost"> ₹ ${(cart_product.qty * cart_product.price).toFixed(2)}</span></h5>
                    </div>
                  </div> <hr>`;

                // cart_pop_item+=`
                //     <div class="container mt-3">
                //        <div class="row add_cart mt-2">
                //         <div class="col-md-12">
                //           <p class="paracheck" style="display: block;cursor: pointer;">Product</p>
                //         </div>
                //         <div class="col-md-3">
                //          <img srcset="${cart_product.options['product_image']} 320w, ${cart_product.options['product_image']} 640w, ${cart_product.options['product_image']} 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="${cart_product.options['product_image']}" alt="${(cart_product.name) }" loading="lazy" class="img-fluid">
                //           <b class="save_later d-md-none d-sm-block">
                //             <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
                //             <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
                //           </b>
                //         </div>
                //         <div class="col-md-9">
                //           <h5>${(cart_product.name) }</h5>
                //           <p><strong>Price:</strong><span class="CurrencyIcon"> ₹ ${(cart_product.price) } </span></p>
                //           <p><strong>Title:</strong> ${(cart_product.options['product_type'] ? cart_product.options['product_type'].replace(/_/g, ' ').replace(/\b\w/g, function (char) {
                //                 return char.toUpperCase();
                //             }) : '')}</p>
                //           <p><strong>Shape:</strong>${cart_product.options['product_shape']}</p>
                //           <p><strong>Size:</strong>${cart_product.options['product_weight'] . concat(" ", 'carat')}</p>
                //           <p><strong>Stock Id:</strong>${(cart_product.id) }</p>
                //           <p><strong>Color:</strong>${cart_product.options['product_color']}</p>
                //           <p><strong>Clarity:</strong>${cart_product.options['product_clarity']}</p>
                //         </div>
                //         <div class="col-md-8">
                //           <p class="paracheck" style="display: block;cursor: pointer;">Quantity</p>
                //           <div class="input-group shopping-cart-quantity add-card-product">
                //             <span class="input-group-btn quantity-button">
                //             <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" id="priceMin" name="priceMin" style="background:#ff8080;border: #ff8080;">
                //                 <span class="fa fa-minus"></span>
                //             </button>
                //             </span>
                //            <input class="ClassQty5 form-control input-number" type="number" min="1" max="100" step="1" value="${cart_product.qty}" name="qty" readonly style="-webkit-appearance: none;
                //                   -moz-appearance: none;
                //                   appearance: none;
                //                   margin: 0;">
                //             <span class="input-group-btn quantity-button">
                //                 <span class="input-span" data-rowid="${cart_product.rowid}" data-price="${cart_product.price}" data-cart="${cart_product.id}"></span>
                //                 <button type="button" class="btn btn-success btn-number mr-2" data-type="plus" data-field="quant[2]" style="background:#009578;border: #009578;">
                //                     <span class="fa fa-plus" id="priceMax" name="priceMax"></span>
                //                 </button>
                //                 <button type="button" class="btn btn-primary total-col" style="padding: 0 9px 0 5px;border:#6e7277;background:#6e7277;"><span class="remove-cart" data-rowid="${cart_product.rowid}"><i class="fa fa-trash" aria-hidden="true"></i>
                //                 </button>
                //             </span> 
                //           </div>
                //     </div>
                //     <div class="col-md-4 text-md-right total-col">
                //         <p class="paracheck" style="display: block;cursor: pointer;">Price</p>
                //         <h5 class="float-right"><span class="total-cost"> ₹ ${(cart_product.qty * cart_product.price).toFixed(2)}</span></h5>
                //     </div>
                //   </div> <hr>`;
                });
                //shop_cart_tbody.innerHTML = cart_item;
                $("#shop-cart-view-tbody").html(cart_item);
                // $("#cart_view_products").html(cart_pop_item);
                cart_total = response.cart_product_total;
                $(".cart-count").text(response.cart_product_count);
                $('#cart_subtotal').text('₹' + cart_total.toFixed(2));
                $('#model_cart_subtotal').text('₹' + cart_total.toFixed(2));
                setTimeout(function() {
                    $('.shopping-cart-quantity').find(".quantity-button").on("click", "button span", function(e) {
                        e.stopImmediatePropagation();
                        e.preventDefault();
                        let quantityElem  = $(e.currentTarget).closest('.add-card-product'); 
                        let currentTblRow = quantityElem.parent().parent();
                        let priceElem     = currentTblRow.find('.shopping-cart-price .CurrencyIcon');
                        let totalCostElem = currentTblRow.find('.total-col .total-cost');
                        let oldValue      = quantityElem.find(".ClassQty5").val();
                        let rowid         = quantityElem.parent().find('.input-span').data('rowid');
                        if (e.currentTarget.id === 'priceMax') {
                            var newVal = parseFloat(oldValue) + 1;
                        } else {
                            if (oldValue > 1) {
                                var newVal = parseFloat(oldValue) - 1;
                            } else {
                                newVal = 1;
                            }
                        }
                        quantityElem.find(".ClassQty5").val(newVal);
                        let priceString = priceElem.text(); 
                        let ProductPriceDB = priceString.replace('₹', ''); 
                        let FinalPrice = ProductPriceDB * newVal;
                        totalCostElem.text(formatter.format(FinalPrice));
                        let cartObj = {
                            qty: newVal,
                            rowid
                        }
                        updateCart(cartObj);
                    });
                
                    $('.remove-cart').on('click', function(e) {
                        e.preventDefault();
                        if(confirm('Are You Delete Product?')){
                            deleteCartItem(e);
                        setTimeout(() => {
                            window.location.href = 'cart-view';
                            }, 100);
                        }else{
                            window.location.href = 'cart-view';
                        }
                    });
                
                    $(".add-card").on('click', 'button.add-cart', (event) => {
                        event.stopImmediatePropagation();
                        event.preventDefault();
                        addToCart(event);
                    });
                }, 100);
                
            } else {
                let cart_item = '';
                cart_item +=`No product in cart`;
                $("#show_empty_cart_view").css("display", "block");
                $("#product_disable").css("display", "none");
                $('#show_empty_cart').html(cart_item);
                setTimeout(() => {
                    $(".add-card").on('click', 'button.add-cart', (event) => {
                        event.stopImmediatePropagation();
                        event.preventDefault();
                        addToCart(event);
                    });
                }, 100);
            }
        });
    }

    $('#my_cart').on('click', function(e) {
        //e.stopImmediatePropagation();
        e.preventDefault();
        getCartPopupProducts();
    });
                
    //getCartPopupProducts();

    function getCartPopupProducts() {
        let endpoint = 'get-cart-items';
        getData(endpoint, {}, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                let cart_item = '';
                let cart_pop_item = '';
                response.cart_products.forEach((cart_product) => {
                console.log('pop', cart_product);
                cart_pop_item+=`
                    <div class="container mt-3">
                       <div class="row add_cart mt-2">
                        <div class="col-md-12">
                          <p class="paracheck" style="display: block;cursor: pointer;">Product</p>
                        </div>
                        <div class="col-md-3">
                         <img srcset="${cart_product.options['product_image']} 320w, ${cart_product.options['product_image']} 640w, ${cart_product.options['product_image']} 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="${cart_product.options['product_image']}" alt="${(cart_product.name) }" loading="lazy" class="img-fluid">
                          <b class="save_later d-md-none d-sm-block">
                            <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
                            <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
                          </b>
                        </div>
                        <div class="col-md-9 shopping-cart-price-popup">
                          <h5>${(cart_product.name) }</h5>
                          <p><strong>Price:</strong><span class="CurrencyIconPopup"> ₹ ${(cart_product.price) } </span></p>
                          <p><strong>Title:</strong> ${(cart_product.options['product_type'] ? cart_product.options['product_type'].replace(/_/g, ' ').replace(/\b\w/g, function (char) {
                                return char.toUpperCase();
                            }) : '')}</p>
                          <p><strong>Shape:</strong>${cart_product.options['product_shape']}</p>
                          <p><strong>Size:</strong>${cart_product.options['product_weight'] . concat(" ", 'carat')}</p>
                          <p><strong>Stock Id:</strong>${(cart_product.id) }</p>
                          <p><strong>Color:</strong>${cart_product.options['product_color']}</p>
                          <p><strong>Clarity:</strong>${cart_product.options['product_clarity']}</p>
                        </div>
                        <div class="col-md-8">
                          <p class="paracheck" style="display: block;cursor: pointer;">Quantity</p>
                          <div class="input-group shopping-cart-popup-quantity add-card-product-popup">
                            <span class="input-group-btn quantity-popup-button">
                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" id="priceMin" name="priceMin" style="background:#ff8080;border: #ff8080;">
                                <span class="fa fa-minus"></span>
                            </button>
                            </span>
                           <input class="ClassQtyPopup5 form-control input-number" type="number" min="1" max="100" step="1" value="${cart_product.qty}" name="qty" readonly style="-webkit-appearance: none;
                                  -moz-appearance: none;
                                  appearance: none;
                                  margin: 0;">
                            <span class="input-group-btn quantity-popup-button">
                                <span class="input-span" data-rowid="${cart_product.rowid}" data-price="${cart_product.price}" data-cart="${cart_product.id}"></span>
                                <button type="button" class="btn btn-success btn-number mr-2" data-type="plus" data-field="quant[2]" style="background:#009578;border: #009578;">
                                    <span class="fa fa-plus" id="priceMaxPopup" name="priceMaxPopup"></span>
                                </button>
                                <button type="button" class="btn btn-primary total-col-popup" style="padding: 0 9px 0 5px;border:#6e7277;background:#6e7277;"><span class="remove-cart" data-rowid="${cart_product.rowid}"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </span> 
                          </div>
                    </div>
                    <div class="col-md-4 text-md-right total-col-popup">
                        <p class="paracheck" style="display: block;cursor: pointer;">Price</p>
                        <h5 class="float-right"><span class="total-cost-popup"> ₹ ${(cart_product.qty * cart_product.price).toFixed(2)}</span></h5>
                    </div>
                  </div> <hr>`;
                });
                $("#cart_view_products").html(cart_pop_item);
                cart_total = response.cart_product_total;
                $(".cart-count").text(response.cart_product_count);
                $('#cart_subtotal').text('₹' + cart_total.toFixed(2));
                $('#model_cart_subtotal').text('₹' + cart_total.toFixed(2));
                setTimeout(function() {
                    $('.shopping-cart-popup-quantity').find(".quantity-popup-button").on("click", "button span", function(e) {
                        e.stopImmediatePropagation();
                        e.preventDefault();
                        let quantityElem  = $(e.currentTarget).closest('.add-card-product-popup'); 
                        let currentTblRow = quantityElem.parent().parent();
                        let priceElem     = currentTblRow.find('.shopping-cart-price-popup .CurrencyIconPopup');
                        let totalCostElem = currentTblRow.find('.total-col-popup .total-cost-popup');
                        let oldValue      = quantityElem.find(".ClassQtyPopup5").val();
                        let rowid         = quantityElem.parent().find('.input-span').data('rowid');
                        if (e.currentTarget.id === 'priceMaxPopup') {
                            var newVal = parseFloat(oldValue) + 1;
                        } else {
                            if (oldValue > 1) {
                                var newVal = parseFloat(oldValue) - 1;
                            } else {
                                newVal = 1;
                            }
                        }
                        quantityElem.find(".ClassQtyPopup5").val(newVal);
                        let priceString = priceElem.text(); 
                        let ProductPriceDB = priceString.replace('₹', ''); 
                        let FinalPrice = ProductPriceDB * newVal;
                        totalCostElem.text(formatter.format(FinalPrice));
                        let cartObj = {
                            qty: newVal,
                            rowid
                        }
                        updateCart(cartObj);
                    });
                
                    $('.remove-cart').on('click', function(e) {
                        e.preventDefault();
                        if(confirm('Are You Delete Product?')){
                            deleteCartItem(e);
                        setTimeout(() => {
                            window.location.href = 'cart-view';
                            }, 100);
                        }else{
                            window.location.href = 'cart-view';
                        }
                    });
                
                    $(".add-card").on('click', 'button.add-cart', (event) => {
                        event.stopImmediatePropagation();5
                        event.preventDefault();
                        addToCart(event);
                    });
                }, 100);
                
            } else {
                let cart_item = '';
                cart_item +=`No product in cart`;
                $("#show_empty_cart_view").css("display", "block");
                $("#product_disable").css("display", "none");
                $('#show_empty_cart').html(cart_item);
                setTimeout(() => {
                    $(".add-card").on('click', 'button.add-cart', (event) => {
                        event.stopImmediatePropagation();
                        event.preventDefault();
                        addToCart(event);
                    });
                }, 100);
            }
        });
    }

    function updateCart(cartObj) {
        let endpoint = 'update-cart-item';
        postData(endpoint, cartObj, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                cart_total = response.cart_product_total;
                $(".cart-count").text(response.cart_product_count);
                $('#cart_subtotal').text('₹' + cart_total.toFixed(2));
                $('#model_cart_subtotal').text('₹' + cart_total.toFixed(2));
            } else {
                $(".cart-count").text(0);
            }
            notify(response);
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
            product_shape : currentTarget.data('product-shape'),
            product_color : currentTarget.data('product-color'),
            product_type : currentTarget.data('product-type'),
            product_clarity : currentTarget.data('product-clarity')
        }
        console.log(params);
        let endpoint = 'set-product-in-cart';
        postData(endpoint, params, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                getCartProducts();  
            }
            notify(response);
            setTimeout(() => {
                //window.location.href = response.redirect;
                window.location.href = 'cart-view';
            }, 2000);
        });
    }

    function deleteCartItem(e) {
        let currentTarget = $(e.currentTarget);
        let rowid = currentTarget.data('rowid');
        let param = {
            rowid
        }
        let endpoint = 'delete-cart-item';
        postData(endpoint, param, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                cart_total = response.cart_product_total;
                $(".cart-count").text(response.cart_product_count);
                getCartProducts();
                notify(response);
            } else {
                notify(response);
            }
        });
    }

    function proceedToCheckout(e){
		e.preventDefault();
		let cartCount = $(".cart-count:visible").text();

		if(parseInt(cartCount) > 0){
			location.href = 'cart-checkout';
		}
	}

    function Checkout(e){
		e.preventDefault();
		let cartCount = $(".cart-count:visible").text();

		if(parseInt(cartCount) > 0){
			location.href = 'cart-checkout';
		}
	}
	
    function showCalculateTax(e) {
        $('.estimate_calculate').show();
    }

    function BillFunction() {
        let country       = document.getElementById("country_code").value;
        let state         = document.getElementById("state").value;
        let city          = document.getElementById("city").value;
        let qty           = $(".cart-count").text();
        let products      = document.querySelectorAll('tr.cart-product');
        let product_weight = null;
        let ShippingPriceDB1 = null;
        products.forEach((product) =>{
            let product_qty             = $(product).find('.ClassQty5').val(); 
            let product_weight_into_qty = ($(product).data('weight') * product_qty);
            product_weight += product_weight_into_qty;
        });
            if (product_weight <= 250)
            {
                ShippingPriceDB1 = 1;
            }else if (product_weight <=  500)
            {
                ShippingPriceDB1 = 150;
            }else if (product_weight <= 1000)
            {
                ShippingPriceDB1 = 225;
            }else if (product_weight <= 1500)
            {
                ShippingPriceDB1 = 300;
            }else if (product_weight <= 2000)
            {
                ShippingPriceDB1 = 375;
            }else if (product_weight <= 2500)
            {
                ShippingPriceDB1 = 450;
            }else if (product_weight <= 3000)
            {
                ShippingPriceDB1 = 525;
            }else if (product_weight <= 3500)
            {
                ShippingPriceDB1 = 600;
            }else if (product_weight <= 4000)
            {
                ShippingPriceDB1 = 675;
            }else if (product_weight <= 4500)
            {
                ShippingPriceDB1 = 750;
            }else if (product_weight <= 5000)
            {
                ShippingPriceDB1 = 825;
            }else if (product_weight <= 5500)
            {
                ShippingPriceDB1 = 900;
            }else if (product_weight <= 6000)
            {
                ShippingPriceDB1 = 975;
            }else if (product_weight <= 6500)
            {
                ShippingPriceDB1 = 1050;
            }else if (product_weight <= 7000)
            {
                ShippingPriceDB1 = 1125;
            }else if (product_weight <= 7500)
            {
                ShippingPriceDB1 = 1200;
            }else if (product_weight <= 8000)
            {
                ShippingPriceDB1 = 1275;
            }else if (product_weight <= 8500)
            {
                ShippingPriceDB1 = 1350;
            }else if (product_weight <= 9000)
            {
                ShippingPriceDB1 = 1425;
            }else if (product_weight <= 9500)
            {
                ShippingPriceDB1 = 1500;
            }else if (product_weight <= 10000)
            {
                ShippingPriceDB1 = 1575;
            }
            document.getElementById("SHIPPING").style.display = "block";
            document.getElementById("GRANDTOTAL").style.display = "block";
            document.getElementById("SUBTOTAL").style.display = "block";
            document.getElementById("ShippingWeight").value = product_weight;
            document.getElementById("TotalQty").value = qty;
            document.getElementById("SUBTOTAL1").value = cart_total;
            document.getElementById("SHIPPING1").value = ShippingPriceDB1;
            document.getElementById("GRANDTOTAL1").value = (+cart_total + +ShippingPriceDB1);
            document.getElementById("SUBTOTAL").innerHTML = '<i class="fa fa-rupee" style="font-size:15px"></i> ' + cart_total;
            document.getElementById("SHIPPING").innerHTML = '<i class="fa fa-rupee" style="font-size:15px"></i> ' + ShippingPriceDB1;
            document.getElementById("GRANDTOTAL").innerHTML = '<i class="fa fa-rupee" style="font-size:15px"></i> ' + (+cart_total + +ShippingPriceDB1);
            
            let param = {
                ShippingPriceDB1,
                cart_total
            }
            console.log(param);
            let endpoint = 'set-amount-shipping';
            var isValid = $(this).isValid();
            if (isValid) {
                postData(endpoint, param, (response) => {
                    console.log(response);
                    response = JSON.parse(response);
                    if (response.state) {
                        notify(response);
                    } else {
                        notify(response);
                    }
                });
            }
    }
    
    let review_form  		= document.getElementById('registration-form');
    review_form.addEventListener('submit', setReviewDetails);
    function setReviewDetails(event){
		event.preventDefault();
		let endpoint 	= 'set-review-details';
        let param = {
                comment_author	        : $('#comment_author').val(),
                comment_author_email	: $('#comment_author_email').val(),
                comment_content	        : $('#comment_content').val(),
                cust_product_url	    : $('#cust_product_url').val()
            }
		postData(endpoint, param, (response) => {
            response = JSON.parse(response);
            if (response.state) {
                notify(response);
                location.href = response.redirect;
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
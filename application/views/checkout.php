<?php 
 // include_once('layout/navbar.php');
  include_once('layout/header.html');
  //include_once('layout/filtermanu.php');
?>
<hr>
<div class="container-fluid">
<div class="row">
  <div class="col-md-8">
    <div class="cart_acor">
      <div id="accordion_1" class="accordion">
        <div class="card mb-0">
          <div class="card-header collapsed" data-toggle="collapse" href="#shoppingcart">
            <a class="card-title">
               <img src="assets/images/bag.png" alt="" class="icon_bag"> Shopping Cart Info
            </a>
          </div>
          <div id="shoppingcart" class="card-body collapse show" data-parent="#accordion_1">
            <div class="head_check">
              <h6><img src="assets/images/bag.png" alt="" class="icon_bag">Shopping Cart</h6>
              <p class="float-right">Review & edit your Product </p>
            </div>
            <div class="check_part">
              <p class="paracheck">Product</p>
              <p class="float-right paracheck">Price</p>
              <hr>
              <?php 
                if(isset($products_cart) && !empty($products_cart)){ 
                  foreach($products_cart as $index => $product) { 
                  $index = 0;
                  //print_r($product);//die;
              ?>
              <div class="pro_check">
                <h6><?php echo $product['name'];?></h6>
                <b class="float-right">₹ <?php echo $product['price'];?> </b>
              </div>
              <div class="row pr-2 pl-2 check_detail">
                <div class="col-md-2">
                  <img src="<?php echo $product['options']['product_image'];?>" class="img-fluid">
                  <b class="save_later d-md-none d-sm-block"> 
                  <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
                  <i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
                  </b>
                </div>
                <div class="col-md-7">
                  <h5>Setting</h5>
                  <p><strong>SKU:</strong><?php echo $product['id'];?></p>
                  <p><strong>Type:</strong> <?php echo ucwords(strtolower(str_replace('_', ' ', $product['options']['product_type']))); ?> </p>
                  <p><strong>Shape:</strong><?php echo $product['options']['product_shape'];?></p>
                  <h5 class="mt-1">Side Stone Info</h5>
                  <p><strong>Size:</strong><?php echo $product['options']['product_weight'].' '.'Carat';?></p>
                  <p><strong>Color:</strong><?php echo $product['options']['product_color'];?></p>
                  <p><strong>Clarity:</strong><?php echo $product['options']['product_clarity'];?></p>
                  <hr>
                  <!-- <p><strong id="total-cost" data-amount="<?php //echo $product['subtotal'];?>">Price:</strong>₹ <?php //echo $product['subtotal'];?></p><span id="total_cost" data-amount="<?php  //echo $product['subtotal'];?>"  class="color-setting CurrencyIcon total-cost-price final_cost"> -->
                  <p><strong>Appraisal:</strong><span id="total_cost" data-amount="<?php echo $product['subtotal'] ?>"  class="color-setting CurrencyIcon total-cost-price final_cost">
                  <strong><span id="total-cost-price"> <i class="fa fa-inr" style="font-size: 12px"></i><?php  echo $product['subtotal'];?></span>
                  </strong></span></p>
                </div>
                <div class="col-md-3">
                  <b class="save_later d-md-block d-sm-none d-none"> 
                  <?php 
                  if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id'])) { 
                     $current_url = $_SERVER['REQUEST_URI'];
                     $is_product_in_wishlist = false; // Flag to track if the product is in the wishlist
                     //echo "<pre>"; print_r($existing_wishlist);die;
                     if(isset($existing_wishlist) && !empty($existing_wishlist)){
                           foreach ($existing_wishlist as $product_id => $wishlist_data) {
                              // Check if the current product is in the wishlist
                              if($wishlist_data !== false && is_array($wishlist_data) && $wishlist_data['product_id'] == $product['id']) {
                                 $is_product_in_wishlist = true;
                                 break; // Exit the loop if the product is found in the wishlist
                              }
                           }
                     }
                     if ($is_product_in_wishlist) { // Display heart icon if the product is in the wishlist
                        ?>
                          <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;height:auto;" data-id="<?php echo $wishlist_data['id'];?>" data-url="<?php echo $current_url;?>" data-product="<?php echo $product['id'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $product['options']['product_shape'].' '. $product['options']['product_weight'] .' ct '. $product['options']['product_clarity'];?>" data-product-price="<?php echo $product['price']; ?>" data-product-id="<?php echo $product['id']; ?>" data-image="<?php echo $product['options']['product_image'];?>" data-product-size="<?php echo $product['options']['product_weight']; ?>" data-cert-url="<?php echo $product['options']['cert_url']; ?>" data-product-shape="<?php echo $product['options']['product_shape'];?>"  data-product-color="<?php echo $product['options']['product_color'];?>" data-product-clarity="<?php echo $product['options']['product_clarity'];?>" data-product-type ="<?php echo $product['options']['product_type'];?>" >
                           <i class="fa heart-icon fa-heart" style="color: rgb(255, 128, 128);" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } else { // Display default heart icon if the product is not in the wishlist ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;height:auto;" data-url="<?php echo $current_url;?>" data-product="<?php echo $product['id'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $product['options']['product_shape'].' '. $product['options']['product_weight'] .' ct '. 
                           $product['options']['product_clarity'];?>" data-product-price="<?php echo $product['price']; ?>" data-product-id="<?php echo $product['id']; ?>" data-image="<?php echo $product['options']['product_image'];?>" data-product-size="<?php echo $product['options']['product_weight']; ?>" data-cert-url="<?php echo $product['options']['cert_url']; ?>"
                           data-product-shape="<?php echo $product['options']['product_shape'];?>"  data-product-color="<?php echo $product['options']['product_color'];?>" data-product-clarity="<?php echo $product['options']['product_clarity'];?>" data-product-type ="<?php echo $product['options']['product_type'];?>" >
                              <i class="fa fa-heart-o heart-icon" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } 
                  } else { ?>
                           <a href="set-wish-list"><button id="add-wishlist" class="btn button btn-setting bd-color-setting bd-radius-5 like"> <i class="fa fa-heart-o heart-icon"></i> </button></a>
                  <?php } ?>  
                  <!-- <i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i> -->
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
                    <button type="button" class="apprai">Appraisal (₹  <?php  echo $product['subtotal'];?>) <i class="fa fa-times mr-1" aria-hidden="true" title=""></i></button>
                  </div>
                </div>
              </div>
              <hr>
              <?php } $index++;} ?>
            </div>
            <div class="promocode">
              <div class="coupon"  id="coupon_code" name="coupon_code">
                <p>Coupons/ discount</p>
                <div class="input-group mb-3">
                  <?php if(isset($products_cart) && !empty($products_cart)){ ?>
                  <?php 
                    foreach($products_cart as $product) { 
                  ?>
                  <input type="hidden" name="category_id" id="category_id" value="Diamond">
                  <?php } } ?>
                  <input type="text" placeholder="Enter Promo Code" name="coupon_unique_id" id="coupon_unique_id">
                  <div class="input-group-append">
                    <button type="button" name="button" id="coupon_code" class="input-group-text button btn-dark bd-color-dark bd-radius-50 btn_submit"><i class="fa fa-check"></i><b>Apply</b></button>
                    <!-- <span class="input-group-text"><i class="fa fa-check"></i><b>Apply</b></span> -->
                  </div>
                </div>
              </div>
              <hr>
              <div class="coupon">
                <p>Special Notes</p>
                <div class="input-group mb-3">
                  <small>Mention any special requirements • about product</small>
                  <input type="text" placeholder="Enter Promo Code">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-check"></i><b>Apply</b></span>
                  </div>
                </div>
              </div>
              <hr>
              <div class="shopcon">
                <a href="home"><button type="button" class="consho"><i class="fa fa-angle-double-left"></i>Continue Shopping</button></a>
                <a><button type="submit" class="float-right login">Proceed To Pay<i class="fa fa-sign-in" aria-hidden="true"></i></button></a>
              </div>
            </div>
          </div>
          <!-- <div class="card-header collapsed" data-toggle="collapse" href="#logininfo">
            <a class="card-title">
            <i class="fa fa-user" aria-hidden="true"></i>Login
            </a>
          </div>
          <div id="logininfo" class="card-body collapse" data-parent="#accordion">
            <div class="frame">
              <div class="row">
                <div class="col-md-6 border-right">
                  <span class="signup-inactive">If You Have Not Already registered then please Enter Your Details to
                  Register / Sign Up
                  </span>
                  <form class="form-signup" action="" method="post" name="form">
                    <div class="form-group name-group">
                      <div class="palceholder">
                        <label for="name">Name</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="name" required="">
                    </div>
                    <div class="form-group city-group">
                      <div class="palceholder">
                        <label for="city name">Enter City Name</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="city" required="">
                    </div>
                    <div class="form-group email-group">
                      <div class="palceholder">
                        <label for="email">Enter Email Id</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="email" required="">
                    </div>
                    <div class="form-group mobile-group">
                      <div class="palceholder">
                        <label for="mobile">Enter Mobile No</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="mobile" required="">
                    </div>
                    <div class="form-group password-group">
                      <div class="palceholder">
                        <label for="pwd">Enter Password</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="pwd" required="">
                    </div>
                    <div class="form-group pwd-group">
                      <div class="palceholder">
                        <label for="cpwd">Confirm Password</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="cpwd" required="">
                    </div>
                    <p>
                      (Please save this number (+91)9022223999 &amp; sent whattsapp "PW" immediately you will receive your
                      "Password" afterwards if required change "Password".)
                    </p>
                    <button type="submit" class="btn-signup">Register / Sign Up</button>
                  </form>
                </div>
                <div class="col-md-6">
                  <span class="signup-inactive">Existing Customer Please Log In / Sign In</span>
                  <form class="form-signin" action="" method="post" name="form">
                    <div class="form-group name-group">
                      <div class="palceholder">
                        <label for="user">User Name/Email Id/ Mobile No</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="name" required="">
                    </div>
                    <div class="form-group password-group">
                      <div class="palceholder">
                        <label for="password">Enter Password</label>
                        <span class="star">*</span>
                      </div>
                      <input type="text" class="form-control" id="pwd" required="">
                    </div>
                    <label class="letest_design">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    Keep me signed in</label>
                    <button type="submit" class="btn-signup">Sign In / Log In</button>
                    <div class="forgot">
                      <a href="forgot_password">Forgot your password?</a>
                    </div>
                    <div class="change">
                      <a href="change_password">Change password?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> -->
          <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion_1" href="#billinginfo">
            <a class="card-title">
              <i class="fa fa-plane" aria-hidden="true"></i>Billing Info
            </a>
          </div>
          <div id="billinginfo" class="card-body collapse" data-parent="#accordion_1">
          <form class="form-signup" action="" method="post" name="form">
                        <hr>
                      <div class="billing">
                      <div class="differ_view">
                      <h2>Billing Address</h2>
                      </div>
                      <hr>
                        <div class="address_group">
                          <div class="form-group name-group">
                            <div class="palceholder">
                              <label for="name">First Name</label>
                              <span class="star">*</span>
                            </div>
                            <input type="text" class="form-control" id="fname" required="">
                          </div>
                          <div class="form-group city-group">
                            <div class="palceholder">
                              <label for="city name">Last Name</label>
                              <span class="star">*</span>
                            </div>
                            <input type="text" class="form-control" id="lname" required="">
                          </div>
                        </div>
                          <div class="form-group email-group">
                            <div class="palceholder">
                               <label for="email">Address Line 1</label>
                              <span class="star">*</span>
                            </div>
                            <textarea rows="2" class="form-control"></textarea>
                          </div>
                          <div class="form-group email-group">
                            <div class="palceholder">
                              <label for="email">Address Line 2</label>
                              <span class="star">*</span>
                            </div>
                            <textarea rows="2" class="form-control"></textarea>
                          </div>
                          <div class="address_group">
                          <div class="form-group mobile-group">
                            <div class="palceholder">
                              <label for="mobile">City</label>
                              <span class="star">*</span>
                            </div>
                            <input type="text" class="form-control" id="city" required="">
                          </div>
                          <div class="form-group password-group">
                            <div class="palceholder">
                              <label for="pwd">Zip/Postal Code</label>
                              <span class="star">*</span>
                            </div>
                            <input type="text" class="form-control" id="pwd" required="">
                          </div>
        
                          <div class="form-group pwd-group">
                            <div class="palceholder">
                              <label for="cpwd">Mobile No</label>
                              <span class="star">*</span>
                            </div>
                            <input type="text" class="form-control" id="number" required="">
                          </div>
                          </div>
                          <label class="letest_design">
                            <input type="checkbox" id="sameAsBilling">
                            <span class="checkmark"></span>
                            Shipping Address Same as Billing Address
                          </label>
                          <hr>
                          <div class="form-group shipping">
                            <select>
                                <option>Shipping Method</option>
                                <option>Online Payment</option>
                                <option>G Pay</option>
                                <option>UPI</option>
                              </select>
                            </div>
                      </div>

                      <div class="shippinginfo" id="shippingAddress">
                        <div class="differ_view">
                        <h2>Shipping Address</h2>
                        </div>
                        <hr>
                          <div class="address_group">
                            <div class="form-group name-group">
                              <div class="palceholder">
                                <label for="name">First Name</label>
                                <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="fname" required="">
                            </div>
                            <div class="form-group city-group">
                              <div class="palceholder">
                                <label for="city name">Last Name</label>
                                <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="lname" required="">
                            </div>
                          </div>
                            <div class="form-group email-group">
                              <div class="palceholder">
                                 <label for="email">Address Line 1</label>
                                <span class="star">*</span>
                              </div>
                              <textarea rows="2" class="form-control"></textarea>
                            </div>
                            <div class="form-group email-group">
                              <div class="palceholder">
                                <label for="email">Address Line 2</label>
                                <span class="star">*</span>
                              </div>
                              <textarea rows="2" class="form-control"></textarea>
                            </div>
                            <div class="address_group">
                            <div class="form-group mobile-group">
                              <div class="palceholder">
                                <label for="mobile">City</label>
                                <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="city" required="">
                            </div>
                            <div class="form-group password-group">
                              <div class="palceholder">
                                <label for="pwd">Zip/Postal Code</label>
                                <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="pwd" required="">
                            </div>
          
                            <div class="form-group pwd-group">
                              <div class="palceholder">
                                <label for="cpwd">Mobile No</label>
                                <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="number" required="">
                            </div>
                            </div>
                        </div>
                            <button type="submit" class="float-right savenext">Save & Next</button>
                        </form>
                        <script>
                          var checkbox = document.getElementById('sameAsBilling');
                          var shippingAddress = document.getElementById('shippingAddress');
                          checkbox.addEventListener('click', function() {
                              shippingAddress.classList.toggle('shippinginfo');
                          });
                      </script>
          </div>
          <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion_1" href="#paymentinfo">
            <a class="card-title">
            <i class="fa fa-cc-mastercard" aria-hidden="true"></i> Payment
            </a>
          </div>
          <div id="paymentinfo" class="card-body collapse" data-parent="#accordion_1">
            <hr>
            <div class="hold_on">
              <p><span>Hold On</span>Hey , did you forget to add some details to any of your product? <a>Click Here to Customize them</a></p>
            </div>
            <hr>
            <div class="tabs">
              <nav class="tab-nav">
                <ul>
                  <li class="active"><span data-href="#upi">UPI Payment</span>
                  </li>
                  <li><span data-href="#paypal">Pay-Pal</span>
                  </li>
                  <li><span data-href="#gpay">G-Pay</span></li>
                </ul>
              </nav>
              <div class="tab active" id="upi">
                <img srcset="assets/images/payment_icon/upi.png 320w, assets/images/payment_icon/upi.png 640w, assets/images/payment_icon/upi.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/upi.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <div class="tab" id="paypal">
                <img srcset="assets/images/payment_icon/Pay_pal.png 320w, assets/images/payment_icon/Pay_pal.png 640w, assets/images/payment_icon/Pay_pal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/Pay_pal.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <div class="tab" id="gpay">
                <img srcset="assets/images/payment_icon/g_pay.png 320w, assets/images/payment_icon/g_pay.png 640w, assets/images/payment_icon/g_pay.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/g_pay.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="cart_summary border">
      <h5>Cart Summary</h5>
      <div class="pro_check">
        <h6>SubTotal</h6>
        <b class="float-right">₹ <?php echo $product['subtotal'];?> </b>
      </div>
      <button type="button" class="sum_info" onclick="toggleIcon()">Details 
      <i class="fa fa-angle-double-down float-right" id="toggleIcon" aria-hidden="true"></i></button>
      <div class="summary_info">
        <div class="float-left">
          <p>Product</p>
          <!-- <p>Engraving</p>
          <p>Appraisal</p>
          <p>Replica</p> -->
        </div>
        <div class="float-right">
          <p>₹ <?php echo $product['subtotal'];?> </p>
          <!-- <p>₹ 1234 </p>
          <p>₹ 1234 </p>
          <b>₹ 123456</b> -->
        </div>
      </div>
      <div class="dis_info">
        <div class="float-left">
          <p>Discount (-)</p>
          <p>Tax</p>
          <p>Shipping</p>
        </div>
        <div class="float-right">
          <p id="discount">₹ 0 </p>
          <p>₹ 0 </p>
          <p>₹ 0 </p>
        </div>
      </div>
      <hr>
      <div class="pro_check">
        <h6>Total</h6>
        <b class="float-right total-cost-price">₹ <?php echo $product['subtotal'];?> </b>
      </div>
      <hr>
    </div>
    <div class="cart_acor">
      <div id="accordion" class="accordion">
        <div class="card mb-0">
          <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
            <a class="card-title">
            Is the process of checkout safe and secure?
            </a>
          </div>
          <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
            <p>Taare & Sitare® we take special measures to ensure the security of the payment process and purchase details of the customers. We use safe encryption and fraud protection for all credit card as well as other methods of transactions. Using 256-bit Secure Socket Layers (SSL), all highly susceptible information is made secure.
            </p>
          </div>
          <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <a class="card-title">
            What is the return policy of an already purchased product?
            </a>
          </div>
          <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
            <p>Taare & Sitare® presents 30 days return policy within which if the purchased jewelry is returned, the worth of the merchandise will be credited back to your account that is full refund or exchange will be made provided the jewelry item is not marked with any wear and tear. However an amount of $ 20 will be deducted as the shipping charges when you return the purchased merchandise. For further details kindly visit Return Policy page at the bottom section of our website. We will be glad to be of any help so, kindly call us at 212-840- 1811 anytime at your convenience.
            </p>
          </div>
          <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <a class="card-title">
            Will the shipment be delivered safely?
            </a>
          </div>
          <div id="collapseThree" class="card-body collapse" data-parent="#accordion" >
            <p>Yes, severe safety precautions are maintained to ensure safe delivery of the jewelry. Until the diamond jewelry is received by you at your doorstep, the liability of the diamond or the jewelry falls upon Fascinating Diamonds®. To ensure strict security, Fascinating Diamonds provides and covers insurance on all jewelries that are to be shipped depending on the actual value of the purchased item. All deliveries and services are made to the valid home and office addresses only. As another act of prudence, we do require an adult signature to handover the package irrespective of its worth or value.
            </p>
          </div>
          <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
            <a class="card-title">
            Can I upgrade my diamond?
            </a>
          </div>
          <div id="collapseFour" class="card-body collapse" data-parent="#accordion" >
            <p>Yes, Taare & Sitare® offer lifetime upgrade offer under which any old GIA Certified diamonds can be interchanged for a new diamond of similar cut, color and clarity. For more details, you can contact us at 212-840- 1811 anytime, we are always happy to help.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-----Ring Size-------->  
<div class="modal show" id="myringsize" aria-modal="true" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Your Size</h4>
        <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
          <div class="ring_header border-bottom">
            <span class="ri_si">Ring size(Indian)</span>
            <span class="ri_si">Internal diameter, mm</span>
            <span class="ri_si">Circumference(In mm))</span>
            <span class="country_wise">
              <select>
                <option>UK</option>
                <option>EU</option>
                <option>IT</option>
                <option>JP</option>
              </select>
            </span>
          </div>
          <div class="mid_container">
            <ul class="option_list">
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                6
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                7
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                8
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                9
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                10
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                11
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                12
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                13
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                14
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                15
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                16
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                17
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                18
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                19
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                20
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
              <li class="ring_choice">
                <span class="ring_label">
                <input type="radio" name="Ring Size" value="6" class="radio_modal">
                <span class="size-na">
                21
                </span>
                <span class="size-dia">
                45.9
                </span>
                <span class="circum">
                47.1
                </span>
                <span class="country_size">
                47
                </span>
                </span>
              </li>
            </ul>
          </div>
          <button type="button" class="add_to">Add to Shopping Bag</button>
          <div class="size_accor">
            <div id="accordion" class="accordion">
              <div class="card mb-0">
                <div class="card-header collapsed" data-toggle="collapse" href="#avesize">
                  <a class="card-title">
                  What is average size
                  </a>
                </div>
                <div id="avesize" class="card-body collapse" data-parent="#accordion">
                  <div class="engrav_part">
                    <p>Your ring size depends on multiple factors, such as the shape of your finger, your weight and how you would like your ring to feel on your finger. The average ring size for most women is between size 6 and size 7. For men, it is usually between size 9 and size 10.</p>
                  </div>
                </div>
                <div class="card-header collapsed" data-toggle="collapse" href="#findrisi" aria-expanded="false">
                  <a class="card-title">
                  Find your ring size
                  </a>
                </div>
                <div id="findrisi" class="card-body collapse" data-parent="#accordion" 
                  style="">
                  <p class="para_size">If you don’t know your ring size, you may use one of our free tools to help find your ring size:
                  </p>
                  <div class="para_size_img">
                    <img src="assets/images/rings/ringsizer_new.png">
                    <p><b>1-</b> Ring Size Chart: If you need a quick reference, click here to print our ring size chart and follow the instructions to estimate your ring size.</p>
                    <p><b> 2- </b> GLAMIRA Ring Sizer: Our ring sizer is a great tool for an accurate sizing. Use our online form to order a free ring sizer and get it delivered to your address.</p>
                    <p>If you need further information on how to find your ring size, please click here to visit our <a href="ring_size_guide">Ring Size Guide.</a></p>
                  </div>
                </div>
                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#free_ring" aria-expanded="false">
                  <a class="card-title">
                  Order a free ring sizer
                  </a>
                </div>
                <div id="free_ring" class="card-body collapse" data-parent="#accordion" style="">
                  <p><a href="login">Login or register</a>to request a free ring sizer.
                  </p>
                </div>
                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#Worried_size" aria-expanded="false">
                  <a class="card-title">
                  Worried about getting the wrong ring size?
                  </a>
                </div>
                <div id="Worried_size" class="card-body collapse" data-parent="#accordion" style="">
                  <p>We offer a one-time complimentary resizing for all of our rings within 60 days of delivery.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Ring size----->

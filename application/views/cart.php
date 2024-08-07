<?php 
  include_once('layout/navbar.php');
  include_once('layout/header.html');
  include_once('layout/filtermanu.php');
?>
<div class="container mt-5">
  <hr>
  <div class="differ_view">
    <h2 class="center">Your Cart</h2>
  </div>
  <hr>
 <div id="product_disable">
    <div class="row">
      <div class="col-md-6">
        <p class="paracheck d-md-block d-none">Product</p>
      </div>
      <div class="col-md-4">
        <p class="paracheck d-md-block d-none">Quantity</p>
      </div>
      <div class="col-md-2">
        <p class="paracheck float-right d-md-block d-none">Price</p>
      </div>
    </div>
    <div class="pro_check border-top">
    </div>
    <div id="shop-cart-view-tbody">
    </div>
    <div class="additional_msg_1">
      <div class="row">
        <div class="col-md-4">
        <a href="home"><button type="button">Continue Shopping</button></a>
        </div>
        <div class="col-md-4">
          <label>Order Special Instruction</label>
          <div class="form-group email-group">
            <div class="palceholder" style="display: block;">
              <label for="email">Type Here</label>
              <span class="star">*</span>
            </div>
            <textarea rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-md-4">
          <p><b>Subtotal</b> :<strong  id="cart_subtotal">₹ 0 </strong></p>
          <br>
          <p>Tax Included. <a href="home" style="color:#ff8080;">Shipping</a> calculated at check out.</p>
          <br>
          <div class="text-right">
            <button type="submit" id="proceed-to-checkout" class="">Check Out</button>
            <button type="button" class="payment">
            <img srcset="assets/images/payment_icon/Pay_pal.png 320w, assets/images/payment_icon/Pay_pal.png 640w, assets/images/payment_icon/Pay_pal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/Pay_pal.png" alt="Image" loading="lazy" class="img-fluid">
            </button>
            <button type="button" class="payment">
            <img srcset="assets/images/payment_icon/g_pay.png 320w, assets/images/payment_icon/g_pay.png 640w, assets/images/payment_icon/g_pay.png 1280w" sizes="(max-width:640px) 100vw, 50vw" src="assets//images/payment_icon/g_pay.png" alt="Image" loading="lazy" class="img-fluid">
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="additional_msg_1"  id="show_empty_cart_view" style="display:none">
  <div class="row">
    <div class="col-md-4 d-flex align-items-center justify-content-center" style="margin-left:387px;">
      <h5 id="show_empty_cart"></h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 d-flex align-items-center justify-content-center" style="margin-left:387px;">
      <button type="button"><a href="home">Continue Shopping</a></button>
    </div>
  </div>
</div>
</div>
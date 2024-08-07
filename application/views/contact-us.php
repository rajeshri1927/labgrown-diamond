<?php 
  include_once('layout/navbar.php');
  include_once('layout/header.html');
  include_once('layout/filtermanu.php');
?>
<div class="container-fluid">
  <div class="bread">
    <ul  class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Contact Us
      </li>
    </ul>
  </div>
  <div class="contact_title">
    <hr>
    <span>"Your Dreams, Our Diamonds: Reach Out and Shine Together!"</span>
    <hr>
    <img src="assets/images/lb/contact_us.jpg" class="img-fluid">
  </div>
  <div class="contact_para">
    <p>Our Customers hold immense trust in us and hence would be glad to assist you at every step of your purchase. We are available for you 24 hours X 7 days a week to clear all your queries and help you in the best way possible.</p>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-5 mb-2 border-right">
      <div class="contact_title">
        <span>Contact Us 
        </span>
      </div>
      <form action methos="post">
        <div class="form-group">
          <div class="palceholder">
            <label for="name">Name</label>
            <span class="star">*</span>
          </div>
          <input type="text" class="form-control" id="name" required="">
        </div>
        <div class="form-group">
          <div class="palceholder">
            <label for="email">Email</label>
            <span class="star">*</span>
          </div>
          <input type="text" class="form-control" id="email" required="">
        </div>
        <div class="form-group">
          <div class="palceholder">
            <label for="phone">Phone</label>
            <span class="star">*</span>
          </div>
          <input type="text" class="form-control" id="phone" required="">
        </div>
        <div class="form-group">
          <div class="palceholder">
            <label for="Message">Message</label>
            <span class="star">*</span>
          </div>
          <textarea rows="2" class="form-control"></textarea>
        </div>
        <button type="submit" class="sned_message"><i class="fa fa-paper-plane" aria-hidden="true"></i>Send Message</button>
      </form>
    </div>
    <div class="col-md-7">
      <div class="how_appoint">
        <div class="contact_title">
          <span>Schedule A Virtual & Actual Visit Appointment:</span>
        </div>
        <p>Please call us at <b>212.840.1811</b> or <b>email us</b> at <b>taaresitaredesign@gmail.com</b> to schedule your personalized visit with a jewelry specialist at our NYC jewelry boutique. We recommend you make your appointment at least three business days in advance and specify the items that you would like to see during your visit.</p>
        <p>To schedule a virtual appointment less than 24 hours in advance, call us at 212.840.1811.</p>
        <p>Please note that the full Fascinating Diamonds® collection may not be available for view at our location.</p>
        <p><b>Call or leave a message on</b> :212.840.1811 and we will call you back.</p>
        <address>
          <b>Address</b>
          <p>TAARE & SITARE JEWELWORLD PVT LTD,</p>
          <p>Jewelworld Bldg, Zaveri Bazar,</p>
          <p>Mumbai 400002</p>
        </address>
        <p><b>Email Us</b> Mail us on <b>taaresitaredesign@gmail.com</b> and and we will revert back to you within 2 business days.</p>
      </div>
    </div>
  </div>
  <hr>
</div>
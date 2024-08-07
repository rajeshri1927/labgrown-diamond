<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
  <div class="container-fluid">
    <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
    <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand" href="#">
      <div class="logo">
        <a href="home"><img src="assets/images/logo.png" alt="taare Sitare Logo" title="TaareSitare Reliable and Reasonable Natural Diamond Manufacturer logo"></a>
        <div class="tare">for <span style="color:#ff8080;font-family: cursive;">Lab Grown Diamond </span></div>
      </div>
    </a>
    <ul class="navbar-nav ml-auto d-block d-md-none">
      <li class="nav-item">
        <a class="btn btn-link" href="wishlist"><i class="fa fa-heart" aria-hidden="true"></i> <span class="badge badge-danger" id="wishlist-count">0</span></a>
      </li>
      <li class="nav-item">
        <a class="btn btn-link" id="my_cart_mo"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span class="badge badge-danger cart-count"  id="cart-count">0</span></a>
      </li>
    </ul>
    <div class="collapse navbar-collapse">
     <!--<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
   <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="exo-menu">
            <?php 
               // $directoryURI = $_SERVER['REQUEST_URI'];
               // $path        = parse_url($directoryURI, PHP_URL_PATH);
               // $components  = explode('/', $path);
               // $first_part  = $components[1];
            ?>
            <li><a class="<?php //if ($first_part=="home") {echo "active"; } else  {echo "noactive";}?>" href="home"><i class="fa fa-home"></i> Home</a></li>
            <li><a class="<?php //if ($first_part=="about-us") {echo "active"; } else  {echo "noactive";}?>" href="about-us"><i class="fa fa-user"></i> About Us</a></li>
            <li><a class="<?php //if ($first_part=="contact-us") {echo "active"; } else  {echo "noactive";}?>" href="contact-us"><i class="fa fa-phone"></i>Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>-->                                                     
      <form class="form-inline my-2 my-lg-0 mx-auto">
        <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
        <button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-link" href="wishlist"><i class="fa fa-heart" aria-hidden="true"></i> <span class="badge badge-danger" id="wishlist-count-ds">0</span></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-link" id="my_cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i> 
          <span class="badge badge-danger cart-count"  id="cart-count">0</span></a>
        </li>
        <li class="nav-item ml-md-3">
          <div class="right">
            <div class="dropdown">
            <button class="dropbtn">
            <?php 
              if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {?>
                <span class="mr-2" title="Register to get latest design, offers/extra discounts"><?php if(isset($_SESSION['user']['first_name']) && !empty($_SESSION['user']['first_name'])): ?>
                <a class="check link-color" id="custom-nav"><?php echo $_SESSION['user']['first_name'].'  '.$_SESSION['user']['last_name']; ?></a></span>
              <div class="dropdown-content">
                <a href="#">Chat history</a>
                <a href="#">Compare list</a>
                <a href="wishlist">Wish list</a>
                <a href="#">Final selection list</a>
                <a href="#">Order status</a>
                <a href="#">Account status</a>
                <a href="#">Buyings (delivered items)</a>
                <a href="javascript:void(0)" id="logout">Log out</a>
              </div>
              <?php
                endif;
              }else{ ?>
            <span class="mr-2" title="Register to get latest design, offers/extra discounts"><i class="fa fa-user pr-md-2 pr-sm-0" aria-hidden="true"></i>Register / Log In</span>
            </button>
            <div class="dropdown-content">
                <a href="#" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Customer </a>
                <a href="#" data-toggle="modal" data-target="#myModal_2"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Associates/Affiliates</a>
            </div>
            <?php } ?>
            </div>
            <!-- <div class="dropdown">
              <button class="dropbtn">
              <span class="mr-2" title="Register to get latest design, offers/extra discounts"><i class="fa fa-user pr-md-2 pr-sm-0" aria-hidden="true"></i>Register / Log In</span>
              </button>
              <div class="dropdown-content">
                <a href="#" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Customer </a>
                <a href="#" data-toggle="modal" data-target="#myModal_2"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Associates/Affiliates</a>
                <a href="#">Chat history</a>
                <a href="#">Compare list</a>
                <a href="#">Wish list</a>
                <a href="#">Final selection list</a>
                <a href="#">Order status</a>
                <a href="#">Account status</a>
                <a href="#">Buyings (delivered items)</a>
                <a href="#">Log out</a>
              </div>
            </div> -->
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="search-bar d-block d-md-none">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form class="form-inline mb-3 mx-auto">
          <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
          <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Sidebar -->
<nav id="sidebar">
  <div class="sidebar-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-10 pl-0">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a class="btn btn-link" href="#"><i class="fa fa-heart" aria-hidden="true"></i> <span class="badge badge-danger">3</span></a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="btn btn-link" href="#"><img src="assets/images/bag.png" alt="" class="icon_bag"> <span class="badge badge-danger">3</span></a>
          </li> -->
          <li class="list-unstyled components links">
            <div class="right">
              <div class="dropdown">
              <button class="dropbtn">
                <?php 
                  if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {?>
                    <span class="mr-2" title="Register to get latest design, offers/extra discounts"><?php if(isset($_SESSION['user']['first_name']) && !empty($_SESSION['user']['first_name'])): ?>
                    <a class="check link-color" id="custom-nav"><?php echo $_SESSION['user']['first_name'].'  '.$_SESSION['user']['last_name']; ?></a></span>
                  <div class="dropdown-content">
                    <a href="#">Chat history</a>
                    <a href="#">Compare list</a>
                    <a href="wishlist">Wish list</a>
                    <a href="#">Final selection list</a>
                    <a href="#">Order status</a>
                    <a href="#">Account status</a>
                    <a href="#">Buyings (delivered items)</a>
                    <a href="javascript:void(0)" id="logout">Log out</a>
                  </div>
                  <?php
                    endif;
                  }else{ ?>
                <span class="mr-2" title="Register to get latest design, offers/extra discounts"><i class="fa fa-user pr-md-2 pr-sm-0" aria-hidden="true"></i>Register / Log In</span>
                </button>
                  <div class="dropdown-content">
                    <a href="#" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>Customer </a>
                    <a href="#" data-toggle="modal" data-target="#myModal_2"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Associates/Affiliates</a>
                  </div>
                  <?php } ?>
                </div>
                <!-- <div class="dropdown">
                  <button class="dropbtn">
                  <span class="mr-2" title="Register to get latest design, offers/extra discounts"><i class="fa fa-user pr-md-2 pr-sm-0" aria-hidden="true"></i>Register / Log In</span>
                  </button>
                  <div class="dropdown-content">
                    <a href="#" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>Customer </a>
                    <a href="#" data-toggle="modal" data-target="#myModal_2"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Associates/Affiliates</a>
                    <a href="#">Chat history</a>
                    <a href="#">Compare list</a>
                    <a href="#">Wish list</a>
                    <a href="#">Final selection list</a>
                    <a href="#">Order status</a>
                    <a href="#">Account status</a>
                    <a href="#">Buyings (delivered items)</a>
                    <a href="#">Log out</a>
                  </div>
                </div> -->
              </div>
          </li>
        </ul>
          <!-- <a class="btn" href="#"><i class="fa fa-user mr-1"></i> Log In</a> -->
        </div>
        <div class="col-2 text-left">
          <button type="button" id="sidebarCollapseX" class="btn btn-link">
          <i class="fa fa-times" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <ul class="list-unstyled components links">
    <li class="active">
      <a href="home"><i class="fa fa-home mr-3"></i> Home</a>
    </li>
    <li>
      <a href="about-us"><i class="fa fa-user mr-3"></i> About Us</a>
    </li>
    <li>
      <a href="contact-us"><i class="fa fa-phone mr-3"></i> Contact</a>
    </li>
  </ul>
  <ul class="social-icons">
    <li><a href="#" target="_blank" title=""><i class="fa fa-facebook-square"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fa fa-instagram"></i></a></li>
  </ul>
</nav>
<div class="my_cart pl-2 pr-2 pt-2" id="my_cart">
    <div class="border-bottom">
        <p>Your Cart
        <span class="float-right" id="close_cart">Back <i class="fa fa-arrow-right"></i></span>
      </p>
    </div>
    <div id="product_disable">
   <!--  <div class="row">
      <div class="col-md-12">
        <p class="paracheckc">Product</p>
      </div>
      <div class="col-md-4">
        <p class="paracheckc">Quantity</p>
      </div>
      <div class="col-md-2">
        <p class="paracheckc float-right">Price</p>
      </div>
    </div> -->
    <div class="pro_check border-top">
    </div>
    <div id="cart_view_products">
    </div>
    <div class="additional_msg">
      <div class="row">
        <div class="col-md-10">
        <a href="home"><button type="button">Continue Shopping </button></a>
        </div>
        <div class="col-md-12">
          <label>Order Special Instruction</label>
          <div class="form-group email-group">
            <div class="palceholder" style="display: block;">
              <label for="email">Type Here</label>
              <span class="star">*</span>
            </div>
            <textarea rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <p><b>Subtotal</b> : <strong  id="model_cart_subtotal" class="float-right"> ₹ 0 </strong></p>
          <br>
          <p>Tax Included. <a href="home" style="color:#ff8080;">Shipping</a> calculated at check out.</p>
          <br>
          <div class="text-right">
            <button type="submit" id="proceed_checkout">CheckOut</button>
            <button type="button" class="payment">
            <img srcset="assets/images/payment_icon/Pay_pal.png 320w, assets/images/payment_icon/Pay_pal.png 640w, assets/images/payment_icon/Pay_pal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/Pay_pal.png" alt="Image" loading="lazy" class="img-fluid">
            </button>
            <button type="button" class="payment">
            <img srcset="assets/images/payment_icon/g_pay.png 320w, assets/images/payment_icon/g_pay.png 640w, assets/images/payment_icon/g_pay.png 1280w" sizes="(max-width:640px) 100vw, 50vw" src="assets//images/payment_icon/g_pay.png" alt="Image" loading="lazy" class="img-fluid">
            </button>
          </div>
        </div>
        <p class="text-center w-100"><a href="cart-view">View Cart</a></p>
      </div>
    </div>
</div>
<div class="additional_msg"  id="show_empty_cart_view" style="display:none">
  <div class="row">
    <div class="col-md-6 d-flex align-items-center" style="margin-left:155px;">
      <h5 id="show_empty_cart"></h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 d-flex align-items-center" style="margin-left:155px;">
      <button type="button" style="width:100%!important"><a href="home">Continue Shopping</a></button>
    </div>
  </div>
</div>
</div>
<!--The Modal -->
<div class="modal" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">If you are direct customer & want to get special offers & discounts, then register
               and get Rs 5000 worth of discount coupon free.
            </h4>
            <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="container">
               <div class="frame">
                  <div class="row">
                     <!-- <div class="col-md-12">
                        <div class="d-md-flex mt-2 pr-2 pl-2 float-right">
                          <label class="letest_design affili"><a>Direct</a>
                          <input type="checkbox" id="directCheckbox">
                          <span class="checkmark"></span>
                          </label>
                          <label class="letest_design affili"><a>Associates/Affiliates Through</a>
                          <input type="checkbox" id="associatesCheckbox">
                          <span class="checkmark"></span>
                          </label>
                        </div>
                        <hr class="d-flex">
                        </div> -->
                     <div class="direct_cust">
                        <div class="col-md-6 border-right">
                           <span class="signup-inactive">If You Have Not  Already registered then please Enter Your Details to Register / Sign Up
                           </span>
                           <form class="form-signup form" name="user-signup" id="registration-form">
                              <input type="hidden" name="role_id" value="2">
                              <div class="form-group name-group">
                                 <div class="palceholder">
                                    <label for="name">Enter First Name</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="first_name" name="first_name" required="required">
                              </div>
                              <div class="form-group city-group">
                                 <div class="palceholder">
                                    <label for="city name">Enter Last Name</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" name="last_name" id="last_name" required="required">
                              </div>
                              <div class="form-group email-group">
                                 <div class="palceholder">
                                    <label for="email">Enter Email Id</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="email" name="email" required="required">
                              </div>
                              <div class="form-group mobile-group">
                                 <div class="palceholder">
                                    <label for="mobile">Enter Mobile No</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" minlength="10" maxlength="10" id="contact_no" name="contact_no" class="form-control" pattern="\d{10}" title="Please enter exactly 10 digits"  onkeypress="return isNumber(event)" required="required" />
                              </div>
                              <div class="form-group password-group">
                                 <div class="palceholder">
                                    <label for="pwd">Enter Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="password" class="form-control" id="password" name="password" required="required">
                              </div>
                              <div class="form-group pwd-group">
                                 <div class="palceholder">
                                    <label for="cpwd">Confirm Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                              </div>
                              <div class="form-group pwd-group">
                                  <div class="palceholder">
                                      <label for="country"></label>
                                      <span class="star">*</span>
                                  </div>
                                  <select title="Select Country" id="country_code" name="country_code" class="form-control" data-validation="required">
                                      <option value="<?php echo(isset($customer[0]['country']) && !empty($customer[0]['country']))?$customer[0]['country']:''; ?>"><?php echo(isset($customer[0]['country_name']) && !empty($customer[0]['country_name']))?$customer[0]['country_name']:'Select Country'; ?>
                                      <?php 
                                          foreach($countries as $country):?>
                                          <option data-countryCode="<?php echo $country['sortname'];?>" value="<?php echo $country['id'];?>"><?php echo $country['country_name'];?></option>
                                      <?php endforeach; ?> 
                                  </select>
                              </div>
                              <div class="form-group pwd-group">
                                 <div class="palceholder">
                                    <label for="state"></label>
                                    <span class="star">*</span>
                                 </div>
                                  <select class="form-control" name="state" id="state">
                                      <option value="">Select State</option>
                                  </select>
                              </div>
                              <div class="form-group pwd-group">
                                 <div class="palceholder">
                                    <label for="city"></label>
                                    <span class="star">*</span>
                                 </div>
                                  <select class="form-control" name="city" id="city">
                                    <option value="">Select city</option>
                                  </select>
                              </div>
                              <p>
                                 (Please save this number (+91)9022223999 & sent whattsapp "PW" immediately you will receive your
                                 "Password" afterwards if required change "Password".)
                              </p>
                              <button type="submit" id="submit" class="submit btn-signup">Register / Sign Up</button>
                           </form>
                           <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
                           <script>
                              $('#submit').click(function(event) {
                                event.preventDefault(); 
                                let endpoint = 'set-user-details';
                                let formdata = {};
                                $.each($('#registration-form').serializeArray(), (i, field) => {
                                  formdata[field.name] = field.value;
                                });
                                postData(endpoint, formdata, (response) => {
                                    response = JSON.parse(response);
                                    if (response.state) {
                                        notify(response);
                                        setTimeout(() => {
                                            window.location.href = 'home';
                                        }, 2000);
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
                              });
                              
                              function notify(notificationObj) {
                                  $.toast({
                                      text: notificationObj.message,
                                      heading: notificationObj.title,
                                      icon: notificationObj.type,
                                      showHideTransition: 'fade',
                                      allowToastClose: true,
                                      hideAfter: 3000,
                                      stack: 5,
                                      position: 'top-right',
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
                              
                              function isNumber(evt) {
                                evt = (evt) ? evt : window.event;
                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                if (charCode < 48 || charCode > 57) {
                                    evt.preventDefault();
                                }
                                return true;
                              }
                           </script>
                        </div>
                        <div class="col-md-6">
                           <span class="signup-inactive">Existing Customer Please Log In / Sign In</span>
                           <form class="form-signin" name="user-login" id="login-form">
                              <div class="form-group name-group">
                                 <div class="palceholder">
                                    <label for="user">User Name/Email Id/ Mobile No</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" name="email" id="email" required>
                              </div>
                              <div class="form-group password-group">
                                 <div class="palceholder">
                                    <label for="password">Enter Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="password" class="form-control" name="password" id="password" required>
                              </div>
                              <label class="letest_design">
                              <input type="checkbox" />
                              <span class="checkmark"></span>
                              Keep me signed in</label>
                              <button type="submit" id="login" class="btn-signup">Sign In / Log In</button>
                           </form>
                           <script>
                              $('#login').click(function(event) {
                                event.preventDefault(); 
                                let endpoint = 'authenticate-user';
                                //if ($(event.currentTarget).isValid()) {
                                    var formdata = {};
                                    $.each($('#login-form').serializeArray(), (i, field) => {
                                        formdata[field.name] = field.value;
                                    });
                                    formdata['login-from'] = 'site';
                                    postData(endpoint, formdata, (response) => {
                                    response = JSON.parse(response);
                                    if (response.state) {
                                        notify(response);
                                        setTimeout(() => {
                                            window.location.href = 'home';
                                        }, 2000);
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
                               // }
                              });
                           </script>
                            <div class="forgot">
                              <a href="">Forgot your password?</a>
                           </div>
                           <div class="change">
                              <a href="change-password">Change password?</a>
                           </div>
                        </div>
                     </div>
                   <!--   <div class="associate_through">
                        <div class="col-md-6 border-right">
                           <span class="signup-inactive">If You Have Not  Already registered then please Enter Your Details to Register / Sign Up
                           </span>
                            <form class="form-signup" name="b2b-signup" id="registration-b2b-form">
                              <input type="hidden" name="role_id" value="5">
                              <div class="form-group name-group">
                                 <div class="palceholder">
                                    <label for="name">Name</label>
                                    <span class="star">*</span>
                                  </div>
                                  <input type="text" class="form-control" id="first_name" name="first_name" required="required">                              
                              </div>
                              <div class="form-group name-group">
                                 <div class="palceholder">
                                    <label for="name">Associate/Affiliate Namebbbbbb</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="first_name" name="first_name" required="required">  
                                 <input type="text" class="form-control" id="name" required>
                              </div>
                              <div class="form-group city-group">
                                 <div class="palceholder">
                                    <label for="city name">Enter City Name</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="city" required>
                              </div>
                              <div class="form-group email-group">
                                 <div class="palceholder">
                                    <label for="email">Enter Email Id</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="email" required>
                              </div>
                              <div class="form-group mobile-group">
                                 <div class="palceholder">
                                    <label for="mobile">Enter Mobile No</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="mobile" required>
                              </div>
                              <div class="form-group password-group">
                                 <div class="palceholder">
                                    <label for="pwd">Enter Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="pwd" required>
                              </div>
                              <div class="form-group pwd-group">
                                 <div class="palceholder">
                                    <label for="cpwd">Confirm Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="cpwd" required>
                              </div>
                              <p>
                                 (Please save this number (+91)9022223999 & sent whattsapp "PW" immediately you will receive your
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
                                 <input type="text" class="form-control" id="name" required>
                              </div>
                              <div class="form-group password-group">
                                 <div class="palceholder">
                                    <label for="password">Enter Password</label>
                                    <span class="star">*</span>
                                 </div>
                                 <input type="text" class="form-control" id="pwd" required>
                              </div>
                              <label class="letest_design">
                              <input type="checkbox" />
                              <span class="checkmark"></span>
                              Keep me signed in</label>
                              <button type="submit" class="btn-signup">Sign In / Log In</button>
                           </form>
                           <div class="forgot">
                              <a href="">Forgot your password?</a>
                           </div>
                           <div class="change">
                              <a href="change-password">Change password?</a>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal" id="myModal_2">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">For Associates/Affiliates.</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="container">
               <div class="frame">
                  <div class="row">
                     <div class="col-md-6 border-right">
                        <span class="signup-inactive">If You Have Not Already registered then please Enter Your Details to
                        Register / Sign Up
                        </span>
                        <form class="form-signup" name="user-signup" id="registration-b2b-form" enctype="multipart/form-data">
                          <input type="hidden" name="role_id" value="5">
                          <input type="hidden" name="display" value="N">
                          <div class="form-group name-group">
                              <div class="palceholder">
                                 <label for="name">Associates/Affiliates Name</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="text" name="first_name" class="form-control" id="first_name" required="required">
                          </div>
                          <div class="form-group name-group">
                              <div class="palceholder">
                                 <label for="name">Last Name</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="text" name="last_name" class="form-control" id="last_name" required="required">
                           </div>
                           <div class="form-group city-group">
                              <div class="palceholder">
                                 <label for="city name">Enter City Name</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="text" name="city" class="form-control" id="city" required="required">
                           </div>
                           <div class="form-group email-group">
                              <div class="palceholder">
                                 <label for="email">Enter Email Id</label>
                                 <span class="star">*</span>
                              </div>
                              <!-- <input type="text" class="form-control" id="email" required=""> -->
                              <input type="text" name="email" class="form-control" id="email" required="required">
                           </div>
                           <div class="form-group mobile-group">
                            <div class="palceholder">
                               <label for="mobile">Enter Mobile No</label>
                               <span class="star">*</span>
                            </div>
                            <input type="text" minlength="10" maxlength="10" id="contact_no" name="contact_no" class="form-control" pattern="\d{10}" title="Please enter exactly 10 digits"  onkeypress="return isNumber(event)" required="required" />
                          </div>
                          <div class="form-group password-group">
                              <div class="palceholder">
                                 <label for="pwd">Enter Password</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="password" class="form-control" id="password" name="password" required="">
                           </div>
                           <div class="form-group pwd-group">
                              <div class="palceholder">
                                 <label for="cpassword">Confirm Password</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="password" class="form-control" id="cpassword" name="cpassword" required="">
                           </div>
                          <!--  <div class="form-group">
                              <div class="palceholder" style="display: block;">
                                 <label for="message">Background Details &amp; Images Upload</label>
                                 <span class="star">*</span>
                              </div>
                              <textarea rows="2" class="form-control"></textarea>
                           </div> -->
                           <div class="file-input">
                              <!-- <input type="file" name="profile_image" id="file_input" class="file_input__input"> -->
                              <input type="file" name="profile_image" id="profile_image">
                              <label class="file-input__label" for="file-input">
                              <span> <i class="fa fa-upload"></i> Upload Image</span></label>
                           </div>
                          <p>
                            Our Marketing executive will send you proposal and after approval will send you password within 24 working hours or contact Us. In meantime you can sign in as direct customer and view all design and prices.
                          </p>
                          <button type="submit" id="associates_submit"  class="btn-signup">Register / Sign Up</button>
                        </form>
                        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
                        <script>
                            // $('#associates_submit').click(function(event) {
                            //   event.preventDefault(); 
                            //   let endpoint = 'set-user-details';
                            //   let formdata = {};
                            //   let profileImageInput = $('#profile_image')[0];
                            //     // if (profileImageInput.files.length > 0) {
                            //     //     formData.append('profile_image', profileImageInput.files[0]);
                            //     // }
                            //   $.each($('#registration-b2b-form').serializeArray(), (i, field) => {
                            //     formdata[field.name] = field.value;
                            //     formdata.append('profile_image', profileImageInput.files[0]);
                            //   });
                            //   postData(endpoint, formdata, (response) => {
                            //       response = JSON.parse(response);
                            //       if (response.state) {
                            //           notify(response);
                            //           setTimeout(() => {
                            //             window.location.href = 'home';
                            //           }, 2000);
                            //       } else {
                            //           if (typeof response.message === 'object') {
                            //               $.each(response.message, (key, value) => {
                            //                   let errorRes = {
                            //                       title: key,
                            //                       message: value,
                            //                       type: 'error'
                            //                   };
                            //                   notify(errorRes);
                            //               });
                            //           } else {
                            //               notify(response);
                            //           }
                            //       }
                            //   });
                            // });
                            
                            $('#associates_submit').click(function(event) {
                                event.preventDefault(); 
                                let endpoint = 'set-user-details';
                                let formElement = $('#registration-b2b-form')[0];
                                let formData = new FormData(formElement);
                                // Include the image file input in the FormData
                                let profileImageInput = $('#profile_image')[0];
                                if (profileImageInput.files.length > 0) {
                                    formData.append('profile_image', profileImageInput.files[0]);
                                }
                                $.ajax({
                                    url: endpoint,
                                    type: 'POST',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        response = JSON.parse(response);
                                        if (response.state) {
                                            notify(response);
                                            setTimeout(() => {
                                                window.location.href = 'home';
                                            }, 2000);
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
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        // Handle errors here
                                        console.log(textStatus, errorThrown);
                                    }
                                });
                            });

                            function notify(notificationObj) {
                                $.toast({
                                    text: notificationObj.message,
                                    heading: notificationObj.title,
                                    icon: notificationObj.type,
                                    showHideTransition: 'fade',
                                    allowToastClose: true,
                                    hideAfter: 3000,
                                    stack: 5,
                                    position: 'top-right',
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
                            
                            function isNumber(evt) {
                              evt = (evt) ? evt : window.event;
                              var charCode = (evt.which) ? evt.which : evt.keyCode;
                              if (charCode < 48 || charCode > 57) {
                                  evt.preventDefault();
                              }
                              return true;
                            }
                        </script>
                     </div>
                     <div class="col-md-6">
                        <span class="signup-inactive">Existing Customer Please Log In / Sign In</span>
                       <!--  <form class="form-signin" name="user-login" id="login-form">
                           <div class="form-group name-group">
                              <div class="palceholder" style="display: block;">
                                 <label for="user">User Name/Email Id/ Mobile No</label>
                                 <span class="star">*</span>
                              </div>
                              <input type="text" class="form-control" id="name" required="">
                           </div>
                           <div class="form-group password-group">
                              <div class="palceholder" style="display: block;">
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
                              <a href="#">Forgot your password?</a>
                           </div>
                           <div class="change">
                              <a href="#">Change password?</a>
                           </div>
                        </form> -->
                        <form class="form-signin" name="user-login" id="login-b2b-form">
                            <div class="form-group name-group">
                               <div class="palceholder">
                                  <label for="user">User Name/Email Id/ Mobile No</label>
                                  <span class="star">*</span>
                               </div>
                               <input type="text" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group password-group">
                               <div class="palceholder">
                                  <label for="password">Enter Password</label>
                                  <span class="star">*</span>
                               </div>
                               <input type="password" class="form-control" name="password" id="password" required>
                               <input type="hidden" class="form-control" name="role_id" value="5" required>
                            </div>
                            <label class="letest_design">
                            <input type="checkbox" />
                            <span class="checkmark"></span>
                            Keep me signed in</label>
                            <button type="submit" id="login_b2b" class="btn-signup">Sign In / Log In</button>
                          </form>
                        <script>
                            $('#login_b2b').click(function(event) {
                              //alert('Hii');
                              event.preventDefault(); 
                              let endpoint = 'authenticate-user';
                              //if ($(event.currentTarget).isValid()) {
                                  var formdata = {};
                                  $.each($('#login-b2b-form').serializeArray(), (i, field) => {
                                      formdata[field.name] = field.value;
                                  });
                                  formdata['login-from'] = 'site';
                                  postData(endpoint, formdata, (response) => {
                                  response = JSON.parse(response);
                                  if (response.state) {
                                      notify(response);
                                      setTimeout(() => {
                                          window.location.href = 'home';
                                      }, 2000);
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
                             // }
                            });
                        </script>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!------modal end---------> 
<script type="text/javascript" src="assets/app/auth.js"></script>
<script>
$('.btn-number').click(function(e){
  e.preventDefault();
  fieldName = $(this).attr('data-field');
  type      = $(this).attr('data-type');
  var input = $("input[name='"+fieldName+"']");
  var currentVal = parseInt(input.val());
  if (!isNaN(currentVal)) {
      if(type == 'minus') {
  
          if(currentVal > input.attr('min')) {
              input.val(currentVal - 1).change();
          } 
          if(parseInt(input.val()) == input.attr('min')) {
              $(this).attr('disabled', true);
          }

      } else if(type == 'plus') {

          if(currentVal < input.attr('max')) {
              input.val(currentVal + 1).change();
          }
          if(parseInt(input.val()) == input.attr('max')) {
              $(this).attr('disabled', true);
          }

      }
  } else {
      input.val(0);
  }
});
$('.input-number').focusin(function(){
 $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
  minValue     =  parseInt($(this).attr('min'));
  maxValue     =  parseInt($(this).attr('max'));
  valueCurrent =  parseInt($(this).val());
  
  name = $(this).attr('name');
  if(valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
  } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
  }
  if(valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
  } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
  }
  
});

$(".input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
           // Allow: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) || 
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
});

//add to cart quantity
$(document).ready(function() {
    $('#my_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideDown("slow");
    });

    $('#close_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideUp("slow");
    });

    $(".my_cart").on("click", function (event) {
      event.stopPropagation();
    });

    $(document).on("click", function () {
      $(".my_cart").slideUp("slow");
    });
});

$(document).ready(function() {
    $('#my_cart_mo').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideDown("slow");
    });

    $('#close_cart').click(function(event) {
      event.stopPropagation();
      $(".my_cart").slideUp("slow");
    });

    $(".my_cart").on("click", function (event) {
      event.stopPropagation();
    });

    $(document).on("click", function () {
      $(".my_cart").slideUp("slow");
    });
  });
//cart view                                
$('#logout').click(function(event) {
    event.preventDefault(); 
    var endpoint = 'logout';
    var params = {
        login: true,
        site_id: 1
    }
    postData(endpoint, params, function(response) {
        response = JSON.parse(response);
        if (response.state) {
            notify(response);
            setTimeout(() => {
                window.location.href = 'home';
            }, 2000);
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
});
</script>
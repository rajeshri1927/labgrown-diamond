  <!-- The Modal -->
  <div class="my_cart pl-2 pr-2 pt-2">
	<div class="border-bottom">
	  <p>Your Cart
	  <span class="float-right" id="close_cart">Back <i class="fa fa-arrow-right"></i></span>
	</p>
	</div>
	<div class="container mt-3">
	  <div class="row add_cart mt-2">
		<div class="col-md-12">
		  <p class="paracheckc">Product</p>
		</div>
		<div class="col-md-3">
		  <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
		  <b class="save_later d-md-none d-sm-block">
			<i class="fa fa-heart mr-1" aria-hidden="true" title="Save For Later"></i>
			<i class="fa fa-times mr-1" aria-hidden="true" title=""></i>
		  </b>
		</div>
		<div class="col-md-9">
		  <h5>Round 0.34 E VS1</h5>
		  <p><strong>Price:</strong>₹ 12345789</p>
		  <p><strong>Title:</strong>Lab Grown Diamond</p>
		  <p><strong>Stock Id:</strong>66360190</p>
		  <p><strong>Certificate No:</strong>587318568</p>
		</div>
		<div class="col-md-7">
		  <p class="paracheckc">Quantity</p>
		  <div class="input-group">
			<span class="input-group-btn">
				<button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
				  <span class="fa fa-minus"></span>
				</button>
			</span>
			<input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
			<span class="input-group-btn">
				<button type="button" class="btn btn-success btn-number mr-2" data-type="plus" data-field="quant[2]">
					<span class="fa fa-plus"></span>
				</button>
				<button type="button" class="btn btn-primary" style="padding: 0 9px 0 5px;"><i class="fa fa-trash" aria-hidden="true"></i>
				</button>
			</span> 
		</div>
		</div>
		<div class="col-md-5 text-md-right">
		  <p class="paracheckc">Price</p>
		  <h5 class="float-md-right">₹ 12345789</h5>
		</div>
	  </div>
	  <hr>
	  <div class="row">
		<div class="additional_msg">
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
		  <p><b>Subtotal</b> : <strong>₹ 12345789</strong></p><br>
		  <p>Tax Included. <a href="shipping_policy.html" style="color:#ff8080;">Shipping</a> calculated at check out.</p><br>
		  <div class="text-right">
		  <button type="button" class="">Check Out</button>
		  <button type="button" class="payment">
			<img srcset="assets/images/payment_icon/Pay_pal.png 320w, assets/images/payment_icon/Pay_pal.png 640w, assets/images/payment_icon/Pay_pal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/payment_icon/Pay_pal.png" alt="Image" loading="lazy" class="img-fluid">
		  </button>
		  <button type="button" class="payment">
			<img srcset="assets/images/payment_icon/g_pay.png 320w, assets/images/payment_icon/g_pay.png 640w, assets/images/payment_icon/g_pay.png 1280w" sizes="(max-width:640px) 100vw, 50vw" src="assets//images/payment_icon/g_pay.png" alt="Image" loading="lazy" class="img-fluid">
		  </button>
		</div>
		</div>
		<p class="text-center w-100"><a href="add_to_cart.html">View Cart</a></p>
	  </div>
	  </div>
	</div>
  </div>

  <div class="modal" id="myModal">
	<div class="modal-dialog">
	  <div class="modal-content">
		<!-- Modal Header -->
		<div class="modal-header">
		  <h4 class="modal-title">If you are direct customer & want to get special offers & discounts, then register
			and get Rs 5000 worth of discount coupon free.</h4>
		  <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
		  <div class="container">
			<div class="frame">
			  <div class="row">
				<div class="col-md-12">
				  <div class="d-md-flex mt-2 pr-2 pl-2 float-right">
					<label class="letest_design affili"><a>Direct</a>
					  <input type="checkbox" id="directCheckbox">
					  <span class="checkmark"></span>
					</label>
					<label class="letest_design affili"><a>Through Associates/Affiliates</a>
					  <input type="checkbox" id="associatesCheckbox">
					  <span class="checkmark"></span>
					</label>
				  </div>
				  <hr class="d-flex">
				</div>
				<div class="direct_cust">
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
						  <label for="email">Enter Email Id (Optional)</label>
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
					  <p>
						(Please save this number (+91)9022223999 & sent whattsapp "PW" immediately you will receive your
						"Password" afterwards if required change "Password".)</p>
					  <div class="form-group password-group mt-2">
						<div class="palceholder">
						  <label for="pwd">Enter Password (As Above)</label>
						  <span class="star">*</span>
						</div>
						<input type="text" class="form-control" id="pwd" required>
					  </div>
					  <div class="change">
						<a href="change_password.html">Change password?</a>
					  </div>
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
					  <div class="forgot">
						<a href="forgot_password.html">Forgot your password?</a>
					  </div>
					  <div class="change">
						<a href="change_password.html">Change password?</a>
					  </div>
					</form>
				  </div>
				</div>

				<div class="associate_through">
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
						<input type="text" class="form-control" id="name" required>
					  </div>
					  <div class="form-group name-group">
						<div class="palceholder">
						  <label for="name">Associate/Affiliate Name</label>
						  <span class="star">*</span>
						</div>
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
						  <label for="email">Enter Email Id (Optional)</label>
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
					  <p>
						(Please save this number (+91)9022223999 & sent whattsapp "PW" immediately you will receive your
						"Password" afterwards if required change "Password".)</p>
					  <div class="form-group password-group mt-2">
						<div class="palceholder">
						  <label for="pwd">Enter Password (As Above)</label>
						  <span class="star">*</span>
						</div>
						<input type="text" class="form-control" id="pwd" required>
					  </div>
					  <div class="change">
						<a href="change_password.html">Change password?</a>
					  </div>
					  
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
					  <div class="forgot">
						<a href="forgot_password.html">Forgot your password?</a>          
					  </div>
					  <div class="change">
						<a href="change_password.html">Change password?</a>
					  </div>
					</form>
				  </div>
				</div>
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
				  <form class="form-signup" action="" method="post" name="form">
					<div class="form-group name-group">
					  <div class="palceholder">
						<label for="name">Associates/Affiliates Name</label>
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
						<label for="email">Enter Email Id (Optional)</label>
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
					<div class="file-input__input">
					  <input type="file" name="file-input" id="file-input" class="file-input__input">
					  <label class="file-input__label" for="file-input">
						<span> <i class="fa fa-upload"></i>Upload Image</span>
					  </label>
					</div>
					<div class="form-group">
					  <div class="palceholder">
						<label for="message">Background Details &amp; Images Upload</label>
						<span class="star">*</span>
					  </div>
					  <textarea rows="2" class="form-control"></textarea>
					</div>
					<p>
					  Our Marketing executive will send you approval within 24 working hours or contact Us
					  In meantime you can sign in as direct customer and view all design and prices.</p>
				   
					<button type="submit" class="btn-signup">Register / Sign Up</button>
				  </form>
				</div>
				<div class="col-md-6">
				  <span class="signup-inactive">Existing Customer Please Log In / Sign In</span>
				  <form class="form-signin" action="" method="post" name="form">
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
					  <a href="forgot_password.html">Forgot your password?</a>
					</div>
					<div class="change">
					  <a href="change_password.html">Change password?</a>
					</div>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!------modal end--------->		
	<div class="fix_text">
		<p id="blink">"<span class="animate-charcter">AFTER YOU BUY</span> LAB GROWN <span
			class="animate-charcter">DIAMOND,</span>WE MAKE BEAUTIFUL JEWELLERY FOR YOU AS PER YOUR OR ANY FAMOUS INTERNATIONAL BRANDS DESIGN AT ONLY RS 900 PER GRAM MAKING CHARGES AND GOLD / PLATINUM AT MARKET RATE + ONLY 1% GROSS PROFIT."
		</p>
	  </div>

   <div class="container-fluid">  
		<div class="product_part mt-2">
			 <div class="bread">
				<ul  class="breadcrumb">
					 <li class="breadcrumb-item">
						 <a href="taaresitare.html">Home</a>
					 </li>
						<li class="breadcrumb-item">
						 <a href="">Catelogue Page</a>
					    </li>
					<li class="breadcrumb-item active" aria-current="page">
					 Product Page
					</li>
				</ul>
			 </div>
			<div class="row product_height mt-2">
				<div class="col-md-5">
					<div class="d-flex">
					<h1>Ring Product</h1>
					</div>
					
					<div class="product_image">
						<div id="custCarousel" class="carousel slide" data-ride="carousel">
							<!-- slides -->
							<div class="carousel-inner">
							<?php
									// Array of images
									$images = [$main_image, $image_v1, $image_v2];

									// Loop through images to create carousel items
									foreach ($images as $index => $image) {
										// Check if image exists and is not empty
										if (!empty($image)) {
											$activeClass = ($index === 0) ? 'active' : '';
											?>
											<div class="carousel-item <?php echo $activeClass; ?>">
												<img src="<?php echo base_url('assets/uploads/jewellaryImages/' . $image); ?>" class="img-fluid">
											</div>
											<?php
										}
									}
									?>           
							</div>
						
					<div class="modal" id="myproreview">
						<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Review Your Design</h4>
								<button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<div class="container">
									<div class="proreview">
										<div class="row">
											<div class="col-md-2">
												 <h6>Setting</h6>
												 <img src="assets/images/product/product.jpg" class="img-fluid">
											</div>
											<div class="col-md-7 mt-3">
												<p>Solitaire Knife Edge Diamond Ring 14K Rose Gold</p>
											</div>
											<div class="col-md-3">
												<b> ₹ 12345789</b>
											</div>
											<hr>
											<div class="col-md-2">
												 <h6>Center Stone</h6>
												 <img src="aasets/images/Round.jpg" class="img-fluid">
											</div>
											<div class="col-md-7 mt-3">
												<p><strong>SKU:</strong> L030OV-EN27-36E</p>
												<p><strong>Type:</strong>Natural</p>
												<p><strong>Shape:</strong>Oval</p>
												<p><strong>Carat:</strong>0.32</p>
												<p><strong>Cut:</strong>Very Good</p>
												<p><strong>Color:</strong>E</p>
												<p><strong>Clarity:</strong>VS2</p>
											</div>
											<div class="col-md-3">
												<b> ₹ 12345789</b>
											</div>
											<hr>
											<div class="col-md-2">
											</div>
											<div class="col-md-7">
												<h6><strong>Total:</strong></h6>
											</div>
											<div class="col-md-3">
												<b> ₹ 12345789</b>
											</div>
											<hr>
										</div>
									</div>
								</div>
								<div class="modal-footer">
								<div class="btn-group">
								    <a href="checkout_1.html"><button type="button" class="btn-success">Proceed 
								    <i class="fa fa-share-square-o" aria-hidden="true"></i></button></a>
								    <button type="button" class="btn-danger">Cancel  <i class="fa fa-times" aria-hidden="true"></i></button>
								 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
					<!-- Carousel -->
					<div id="custCarousel" class="carousel slide" data-ride="carousel">
						<!-- Thumbnails -->
						<ol class="carousel-indicators list-inline">
							<a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
								<i class="fa fa-angle-double-left left_icon" aria-hidden="true"></i>
							</a>
							<!-- Dynamically generate carousel items -->
							<?php if (isset($main_image) && !empty($main_image)) { ?>
								<li class="list-inline-item">
									<a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
										<img src="<?php echo base_url('assets/uploads/jewellaryImages/' . $main_image); ?>" class="img-fluid">
									</a>
								</li>
							<?php } ?>
							<?php if (isset($image_v1) && !empty($image_v1)) { ?>
								<li class="list-inline-item">
									<a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
										<img src="<?php echo base_url('assets/uploads/jewellaryImages/' . $image_v1); ?>" class="img-fluid">
									</a>
								</li>
							<?php } ?>
							<?php if (isset($image_v2) && !empty($image_v2)) { ?>
								<li class="list-inline-item">
									<a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
										<img src="<?php echo base_url('assets/uploads/jewellaryImages/' . $image_v2); ?>" class="img-fluid">
									</a>
								</li>
							<?php } ?>
							<a class="carousel-control-next" href="#custCarousel" data-slide="next">
								<i class="fa fa-angle-double-right right_icon" aria-hidden="true" style="color: red;"></i>
							</a>
						</ol>
					</div>

						</div>
					</div>

					<p class="center">PRICES FOR ABOVE DESIGN IN BELOW DIAMONDS & METAL COLOR</p>
					<div class="row">
						<div class="col-md-12">
							<div class="shape_image_product">
								<div class="shape">
								  <div class="shape_shop" title="round">
									<img srcset="assets/images/shapes/Round.png 320w,assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
								  </div>
								  <span>Round Diamonds</span> 
								</div>
								<div class="shape">
								  <div class="shape_shop" title="Princess">
									<img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
								  </div>
								  <span>Blue Color</span>
								</div>
					 
								<div class="shape">
								  <div class="shape_shop mymultiplediv" title="Pear" id="carat">
									<img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
								  </div>
								  <div class="mydiv" id="divcarat">
									<div class="carat">
									  <img src="assets/images/lb/size_wise_diamond.jpg" class="img-fluid">
									</div>
								  </div>
								  <span>Diamond</span>
								</div>

								<div class="shape">
								  <div class="shape_shop" title="Shield">
									<img src="assets/images/metal_type/rose_gold.jpg" alt="Image" loading="lazy" class="img-fluid">
								  </div>
								  <span>Rose Gold</span>
								</div>
							  </div>
						</div>
					</div>

					<div class="flut mt-3">Possible Price Range</div>
						<table class="table-bordered table-responsive product_table">
							<thead>
								<tr>
									<th>Item
									</th>
									<th >Price
									</th>
									<th>Discount
									</th>
									<th class="red_color">You Pay After Discount
									</th>
								 </tr>
							</thead>
				
							<tbody>
								<tr>
									<td>
										<span class="has-tooltip_best">
											<small>JEWELRY W/O BD?</small>
											<span class="tooltip">
												<p>Catelogue Page 001</p>
											</span>
										</span>
									</td>
									<td>1234567</td>
									<td>1234567</td>
									<td class="pointer_td">
										<span class="has-tooltip_table_detailes">
											<small>12345678</small>
											<span class="tooltip">
												<table class="table-bordered mb-2">
													<thead>
														<tr>
															<th>NAME</th>
															<th>QUALITY</th>
															<th>WEIGHT (ORIGINAL) ( + - ?)</th>
															<th>RATE</th>
															<th>AMOUNT</th>
														</tr>
													</thead>
													<tbody> 
														<tr>
															<td>METAL </td>
															<td>1234567</td>
															<td>1234567</td>
															<td>1234567</td>
															<td>8976589</td>
														</tr>   

														<tr>
															<td>Big Diamonds
															</td>
															<td>256</td>
															<td>566</td>
															<td>899</td>
															<td>1234567</td>
														</tr> 

														<tr>
															<td>Small/Medium Diamond
															</td>
															<td>256</td>
															<td>566</td>
															<td>899</td>
															<td>1234567</td>
														</tr>

														<tr>
															<td>Others Gemstones</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>   
														<tr>
															<td>Making</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>
														<tr>
															<td>Certification</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr> 
														<tr>
															<td>Others</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr> 
														<tr>
															<td>Total</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>  
													</tbody>
												</table>
												<button type="button" class="button2 mb-2" data-toggle="modal" data-target="#myModalta">Details</button>
											</span>
										</span>
									</td>
								</tr>
								<tr class="highlight">
									<td>
										<span class="has-tooltip_recommend">
											<small>BIG  DIAMOND/s ?</small>
											<span class="tooltip">
												<p>Catelogue Page 002</p>
											</span>
										</span>
									</td>
									<td>256</td>
									<td>566</td>
									<td class="pointer_td">
										<span class="has-tooltip_table_detailes">
											<small>899</small>
											<span class="tooltip">
												<table class="table-bordered mb-2">
													<thead>
														<tr>
															<th>NAME</th>
															<th>QUALITY</th>
															<th>WEIGHT (ORIGINAL) ( + - ?)</th>
															<th>RATE</th>
															<th>AMOUNT</th>
														</tr>
													</thead>
													<tbody> 
														<tr>
															<td>METAL </td>
															<td>1234567</td>
															<td>1234567</td>
															<td>1234567</td>
															<td>8976589</td>
														</tr>   

														<tr>
															<td>Big Diamonds
															</td>
															<td>256</td>
															<td>566</td>
															<td>899</td>
															<td>1234567</td>
														</tr> 

														<tr>
															<td>Small/Medium Diamond
															</td>
															<td>256</td>
															<td>566</td>
															<td>899</td>
															<td>1234567</td>
														</tr>

														<tr>
															<td>Others Gemstones</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>   
														<tr>
															<td>Making</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>
														<tr>
															<td>Certification</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr> 
														<tr>
															<td>Others</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr> 
														<tr>
															<td>Total</td>
															<td>123</td>
															<td>456</td>
															<td>456</td>
															<td>1234567</td>
														</tr>  
													</tbody>
												</table>
												<button type="button" class="button2 mb-2" data-toggle="modal" data-target="#myModalre">Details</button>
											</span>
										</span>

									</td>
								</tr>
								<tr>
									<td class="red_color">TOTAL</td>
									<td>123</td>
									<td>456</td>
									<td>45689</td>
								</tr>							
							</tbody>
						</table>

	<!--table price modal-1 start--->
      <div class="modal" id="myModalta">
        <div class="modal-dialog_1">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <!-- <h4 class="modal-title">For B2B ie international /Indian jewellers.</h4> -->
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                  <div class="container">
                    <table class="table-bordered table_price mb-2 table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Origin, Category & Name</th>
                          <th>Quality</th>
                          <th>Weight (Original) ( + - ?)</th>
                          <th>Rate</th>
                          <th>Company Price</th>
                          <th>Promotional discount</th>
                          <th>Extra Discount by Affiliate</th>
                          <th>You Pay after discount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="modal_bg">METAL</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">GEMSTONES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">CENTRE/ BIG SIZE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G3 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G4 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">STRING/OTHERS </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;">Gemstones Total</strong></td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bg">MAKING</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">CERTIFICATE CHARGES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">TAXATIONS</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                       
                        <tr>
                          <td class="modal_bg">SHIPPING / INSURANCE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;;">Total</strong>  </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn-group float-right">
                       <button type="button">Share <i class="fa fa-share-alt" aria-hidden="true"></i></button>
                       <button type="button">Print <i class="fa fa-print" aria-hidden="true"></i></button>
                       <button type="button">Save To Exel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>

      <div class="modal" id="myModalre">
        <div class="modal-dialog_1">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <!-- <h4 class="modal-title">For B2B ie international /Indian jewellers.</h4> -->
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                  <div class="container">
                    <table class="table-bordered table_price mb-2 table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Origin, Category & Name</th>
                          <th>Quality</th>
                          <th>Weight (Original) ( + - ?)</th>
                          <th>Rate</th>
                          <th>Company Price</th>
                          <th>Promotional discount</th>
                          <th>Extra Discount by Affiliate</th>
                          <th>You Pay after discount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>METAL</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">GEMSTONES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">CENTRE/ BIG SIZE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G3 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G4 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">STRING/OTHERS </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;">Gemstones Total</strong></td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bg">MAKING</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">CERTIFICATE CHARGES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">TAXATIONS</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">EXPORT/IMPORT TAX </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bg">SHIPPING / INSURANCE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;;">Total</strong>  </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn-group float-right">
                       <button type="button">Share <i class="fa fa-share-alt" aria-hidden="true"></i></button>
                       <button type="button">Print <i class="fa fa-print" aria-hidden="true"></i></button>
                       <button type="button">Save To Exel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="modal" id="myModalav">
        <div class="modal-dialog_1">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <!-- <h4 class="modal-title">For B2B ie international /Indian jewellers.</h4> -->
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
              <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                  <div class="container">
                    <table class="table-bordered table_price mb-2 table-responsive">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Origin, Category & Name</th>
                          <th>Quality</th>
                          <th>Weight (Original) ( + - ?)</th>
                          <th>Rate</th>
                          <th>Company Price</th>
                          <th>Promotional discount</th>
                          <th>Extra Discount by Affiliate</th>
                          <th>You Pay after discount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="modal_bg">METAL</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">GEMSTONES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">CENTRE/ BIG SIZE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SIDE/ MEDIUM SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G1 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G2 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G3 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bh">SMALL SIZE Group Wise G4 </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bh">STRING/OTHERS </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;">Gemstones Total</strong></td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr>
                          <td class="modal_bg">MAKING</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">CERTIFICATE CHARGES </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">TAXATIONS</td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        
                        <tr>
                          <td class="modal_bg">SHIPPING / INSURANCE </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                        <tr style="background: #ff8080;color: white;">
                          <td style="background: #ff8080;"><strong style="text-transform: uppercase;;">Total</strong>  </td>
                          <td></td>
                          <td></td>
                          <td>123/CARAT/GRAMS </td>
                          <td>1234567</td>
                          <td>123456789</td>
                          <td>1234567 </td>
                          <td>1234567</td>
                          <td>123456789</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn-group float-right">
                       <button type="button">Share <i class="fa fa-share-alt" aria-hidden="true"></i></button>
                       <button type="button">Print <i class="fa fa-print" aria-hidden="true"></i></button>
                       <button type="button">Save To Exel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>      
<!--table price modal-1 end--->
				</div>
			<!----col-md-5 end-------->
			<div class="col-md-7">
			<table class="table-bordered">
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Header Label</th>
            <th>Actual Values</th>
            <th>Rates From Admin AS Per Quality</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $headers = [
            'design_images', 'different_view_1', 'different_view_2', 
            'SKU_ID_parent_image_file_name', 'SKU_ID_image_file_name_v1', 
            'SKU_ID_image_file_name_v2', 'parent_image_SKU_ID', 
            'children_PRODUCT_SKU_id', 'diamond_size_combination', 
            'pattern_and_style', 'historical_designs', 'modern_designs', 
            'natures_print', 'setting', 'approx_18kt_gold_wt', 
            'making_multiplier', 'no_of_big_stone', 'avg_wt_of_big_stone', 
            'approx_big_center_stone_total_wt', 'medium_size_side_stone_shape', 
            'approx_medium_size_diamond_pcs', 'approx_medium_size_diamond_each_pc_avg_wt', 
            'approx_medium_diamond_total_wt', 'small_size_shape', 
            'approx_small_diamond_no_of_pieces', 'approx_small_diamond_each_pc_avg_wt', 
            'approx_small_diamond_total_wt', 'template_no', 'our_URL', 
            'META_TITLE', 'META_DESCRIPTION', 'META_KEYWORD', 'ALT_TAG', 'H1', 
            'AUTO_SEO_CONTENT', 'CATEGORY', 'SUB_CATEGORY', 'SUB_SUB_CATEGORY', 
            'NEW_DIAMOND_SHAPE_NAME', 'NEW_DIAMOND_COLOR_NAME', 'NEW_CENTER_STONE_WT', 
            'METAL_NAME', 'NEW_METAL_PLATING', 'comment_if_any'
        ];

        foreach ($headers as $index => $header) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>';
            echo '<td>' . ucfirst(str_replace('_', ' ', $header)) . '</td>';
            echo '<td>' . (isset($permanent_product_page_details[$header]) ? $permanent_product_page_details[$header] : '') . '</td>';
            echo '<td></td>'; // This column seems to be empty
            echo '<td></td>'; // This column seems to be empty
            echo '</tr>';
        }
        ?>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
			</div>
		</div>
     </div>
<!-----------Product end------->
</div>
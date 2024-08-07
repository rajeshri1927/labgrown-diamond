<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add B2A</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form name="b2a-form-signup" id="b2a-form" class="form">
				<div class="card-body p-4">
					<div class="mt-4">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo(isset($b2a['user_id']) && !empty($b2a['user_id']))?$b2a['user_id']:''; ?>">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" placeholder="First Name" data-validation="required" autocomplete="off" value="<?php echo(isset($b2a['first_name']) && !empty($b2a['first_name']))?$b2a['first_name']:''; ?>">
						</div>
						<div class="form-group">
							<label>Last Name </label>
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" data-validation="required" autocomplete="off" value="<?php echo(isset($b2a['last_name']) && !empty($b2a['last_name']))?$b2a['last_name']:''; ?>">
						</div>
						<div class="form-group">
							<label class="form-label">Select Role</label>
							<select class="form-control" name="role_id" id="role_id" data-validation="required">
								<?php 
									if(isset($roles) && !empty($roles)) {
										echo "<option value='' disabled='disabled' selected='selected'>Select Role</option>";
										foreach ($roles as $role) { ?>
											<option value="<?php echo $role['role_id'] ?>" <?php echo(isset($b2a['role_id']) && !empty($b2a['role_id']) && $b2a['role_id'] ==  $role['role_id'])?'selected':''; ?>> <?php echo $role['role_title']; ?> </option>
										<?php }
									} else{
										echo "<option>No Role available</option>";
									}
								?>
							</select>
						</div>			
						<div class="form-group">
							<label>Email </label>
							<input type="email" class="form-control" name="email" placeholder="Email" data-validation="required email" data-validation-error-msg-email="Please enter valid email." autocomplete="off" value="<?php echo(isset($b2a['email']) && !empty($b2a['email']))?$b2a['email']:''; ?>">
						</div>
						<div class="form-group">
							<label>Password </label>
							<input type="<?php echo (isset($b2a['password']) && !empty($b2a['password'])) ? 'text' : 'password'; ?>"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" autocomplete="off" data-validation="required" value="<?php echo (isset($b2a['password']) && !empty($b2a['password'])) ?  $b2a['password']: ''; ?>">
						</div>
						<div class="form-group">
							<label>Confirm Password </label>
							<input type="<?php echo (isset($b2a['password']) && !empty($b2a['password'])) ? 'text' : 'password'; ?>" name="password" class="form-control" id="password" placeholder="Confirm Password" autocomplete="off" data-validation="required confirmation" data-validation-error-msg-confirmation="Confirm password not match with password." value="<?php echo(isset($b2a['password']) && !empty($b2a['password']))? $b2a['password']:''; ?>">
						</div>
						<div class="form-group mobile-group">
	                         <div class="palceholder">
	                            <label for="mobile">Enter Mobile No</label>
	                            <span class="star">*</span>
	                         </div>
	                         <input type="text" minlength="10" maxlength="10" id="contact_no" name="contact_no" class="form-control" pattern="\d{10}" placeholder="Enter mobile number" title="Please enter exactly 10 digits"  onkeypress="return isNumber(event)" required="required" />
                        </div>
						<div class="form-group">
						    <label class="form-label">Select Country</label>
						    <select title="Select Country" id="country_code" name="country_code" class="form-control" data-validation="required">
						        <option value="<?php echo (isset($b2a['country']) && !empty($b2a['country'])) ? $b2a['country'] : ''; ?>">
						            <?php echo (isset($b2a['country_name']) && !empty($b2a['country_name'])) ? $b2a['country_name'] : 'Select Country'; ?>
						        </option>
						        <?php foreach ($countries as $country): ?>
						            <option data-countryCode="<?php echo $country['sortname']; ?>" value="<?php echo $country['id']; ?>">
						                <?php echo $country['country_name']; ?>
						            </option>
						        <?php endforeach; ?>
						    </select>
						</div>
						<div class="form-group pwd-group">
	                     <label class="form-label">Select State</label>
	                      <select class="form-control" name="state" id="state">
	                      		<option value="<?php echo (isset($b2a['state']) && !empty($b2a['state'])) ? $b2a['state'] : ''; ?>">
						            <?php echo (isset($b2a['state_name']) && !empty($b2a['state_name'])) ? $b2a['state_name'] : 'Select State'; ?>
	                          	<option value="">Select State</option>
	                      </select>
	                  	</div>
	                  	<div class="form-group pwd-group">
	                      <label class="form-label">Select City</label>
	                      <select class="form-control" name="city" id="city">
	                      	<option value="<?php echo (isset($b2a['city']) && !empty($b2a['city'])) ? $b2a['city'] : ''; ?>">
						            <?php echo (isset($b2a['city_name']) && !empty($b2a['city_name'])) ? $b2a['city_name'] : 'Select City'; ?>
	                        <option value="">Select city</option>
	                      </select>
	                  	</div>
					</div>
				</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit btn-signup" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode < 48 || charCode > 57) {
            evt.preventDefault();
        }
        return true;
     }
</script>
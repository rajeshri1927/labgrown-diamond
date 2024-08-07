<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add Sub Admin</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form name="subadmin-form-signup" id="subadmin-form" class="form">
				<div class="card-body p-4">
					<div class="mt-4">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo(isset($subadmin['user_id']) && !empty($subadmin['user_id']))?$subadmin['user_id']:''; ?>">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" placeholder="First Name" data-validation="required" autocomplete="off" value="<?php echo(isset($subadmin['first_name']) && !empty($subadmin['first_name']))?$subadmin['first_name']:''; ?>">
						</div>
						<div class="form-group">
							<label>Last Name </label>
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" data-validation="required" autocomplete="off" value="<?php echo(isset($subadmin['last_name']) && !empty($subadmin['last_name']))?$subadmin['last_name']:''; ?>">
						</div>
						<div class="form-group">
							<label class="form-label">Select Role</label>
							<select class="form-control" name="role_id" id="role_id" data-validation="required">
								<?php 
									if(isset($roles) && !empty($roles)) {
										echo "<option value='' disabled='disabled' selected='selected'>Select Role</option>";
										foreach ($roles as $role) { ?>
											<option value="<?php echo $role['role_id'] ?>" <?php echo(isset($subadmin['role_id']) && !empty($subadmin['role_id']) && $subadmin['role_id'] ==  $role['role_id'])?'selected':''; ?>> <?php echo $role['role_title']; ?> </option>
										<?php }
									} else{
										echo "<option>No Role available</option>";
									}
								?>
							</select>
						</div>			
						<div class="form-group">
							<label>Email </label>
							<input type="email" class="form-control" name="email" placeholder="Email" data-validation="required email" data-validation-error-msg-email="Please enter valid email." autocomplete="off" value="<?php echo(isset($subadmin['email']) && !empty($subadmin['email']))?$subadmin['email']:''; ?>">
						</div>
						<div class="form-group">
							<label>Password </label>
							<input type="<?php echo (isset($subadmin['password']) && !empty($subadmin['password'])) ? 'text' : 'password'; ?>"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" autocomplete="off" data-validation="required" value="<?php echo (isset($subadmin['password']) && !empty($subadmin['password'])) ?  $subadmin['password']: ''; ?>">
						</div>
						<div class="form-group">
							<label>Confirm Password </label>
							<input type="<?php echo (isset($subadmin['password']) && !empty($subadmin['password'])) ? 'text' : 'password'; ?>" name="password" class="form-control" id="password" placeholder="Confirm Password" autocomplete="off" data-validation="required confirmation" data-validation-error-msg-confirmation="Confirm password not match with password." value="<?php echo(isset($subadmin['password']) && !empty($subadmin['password']))? $subadmin['password']:''; ?>">
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
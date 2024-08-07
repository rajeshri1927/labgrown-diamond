<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mx-4">
    				<div class="card-body p-4">
    					<h1>Change Password</h1>
        					<p class="text-muted">Enter your email</p>
        				 <form class="form input_form reset-form" name="change-pass" id="registration-form">
        				     <input type="hidden" name="role_id" id="role_id" value="1">
        					<div class="input-group mb-3">
        						<span class="input-group-addon"><i class="icon-user"></i></span>
        						<input type="password" id="password1" name="old_password" class="form-control " placeholder="Old Password" data-validation="required" autocomplete="off">
        					</div>
        					<div class="input-group mb-3">
        						<span class="input-group-addon"><i class="icon-user"></i></span>
        						<input type="password"  id="password2" name="new_password" class="form-control " placeholder="New Password" data-validation="required">
        					</div>
        					<div class="input-group mb-3">
        						<span class="input-group-addon"><i class="icon-user"></i></span>
        						<input type="password" name="confirm_new_password" id="password3" class="form-control " placeholder="Confirm New Password" data-validation="required">
        					</div>
        					<div class="forget-form-action clearfix">
        					    <a href="admin/home" class="btn btn-success pull-left blue-btn"><i class="icon-chevron-left"></i>&nbsp;&nbsp;Back  </a>
        					    <button type="submit" id="submit" name="submit" class="btn btn-success pull-right green-btn">Submit</button>
        				    </div>
        			    </form>
    			 </div>
				<div class="row">
					<div class="col-12 px-4 pb-4 text-right"> 
						<a href="admin/login" class="btn px-4 btn-link px-0">Back to Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
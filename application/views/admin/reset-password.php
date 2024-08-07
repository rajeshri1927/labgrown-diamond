<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mx-4">
    				<div class="card-body p-4">
    					<h1>Forgot Password</h1>
        				<p class="text-muted">Enter your new password</p>
        				 <form class="form input_form" name="user-reset-pass" id="registration-form">
        				     <input type="hidden" name="email" value="<?php echo $email; ?>">
        					<div class="input-group mb-3">
        						<span class="input-group-addon"><i class="icon-key icon-color"></i></span>
        						<input type="password" class="form-control " placeholder="Enter Password" id="password_confirmation" name="password_confirmation" autocomplete="off" data-validation="required">
        					</div>
        					<div class="input-group mb-3">
        						<span class="input-group-addon"><i class="icon-key icon-color"></i></span>
        						<input type="password" class="form-control " placeholder="Enter Confirm Password" id="password" name="password" autocomplete="off" data-validation="required confirmation" data-validation-error-msg-confirmation="Confirm password not match with password.">
        					</div>
        					<div class="forget-form-action clearfix">
        					    <a href="home" class="btn btn-success pull-left blue-btn"><i class="icon-chevron-left"></i>&nbsp;&nbsp;Back  </a>
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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
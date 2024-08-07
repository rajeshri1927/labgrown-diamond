<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add Coupon</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="coupon_id" 	id="coupon_id" value="<?php echo(isset($coupon['coupon_id']) && !empty($coupon['coupon_id']))?$coupon['coupon_id']:''; ?>">
				<div class="form-group">
					<label class="form-label">Coupon Code</label>
					<input type="text" class="form-control" id ="coupon_unique_id" name="coupon_unique_id" placeholder="Enter Coupon" value="<?php echo(isset($coupon['coupon_unique_id']) && !empty($coupon['coupon_unique_id']))?$coupon['coupon_unique_id']:''; ?>" data-validation="required">	
				</div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label">Product Category</label>
						<select class="form-control" name="product_category" id="product_category" data-validation="required">
							<?php 
								if(isset($categories) && !empty($categories)) {
									echo "<option value='' disabled='disabled' selected='selected'>Select Category</option>";
									foreach ($categories as $category) { ?>
										<option value="<?php echo $category['category_id'] ?>" <?php echo(isset($coupon['category_id']) && !empty($coupon['category_id']) && $coupon['category_id'] ==  $category['category_id'])?'selected':''; ?>> <?php echo $category['category_title']; ?> </option>
									<?php }
								} else{
									echo "<option>No category available</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="row">
				<div class="form-group col-lg-12 col-md-12">
                    <label>Coupon Start Date <span style="color: red">*</span></label>
                    <input class="nice-select form-control" type="date" id="inserted_datetime" name="inserted_datetime" value="<?php echo(isset($coupon['inserted_datetime']) && !empty($coupon['inserted_datetime']))?$coupon['inserted_datetime']:''; ?>">
                </div>
                </div>
                <div class="row">
                <div class="form-group col-lg-12 col-md-12">
                    <label>Coupon End Date <span style="color: red">*</span></label>
                    <input class="nice-select form-control"  type="date" id="expired_datetime" name="expired_datetime" value="<?php echo(isset($coupon['expired_datetime']) && !empty($coupon['expired_datetime']))?$coupon['expired_datetime']:''; ?>">
                </div>
                </div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
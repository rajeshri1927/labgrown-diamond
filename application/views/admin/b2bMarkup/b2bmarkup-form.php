<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-sub">Add B2B Discount </h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="sub-category-form" name="sub-category-form" action="javascript:void(0)">
			 <div class="card-body">
				<div class="form-group">
					<label class="form-label">Country</label>
					<select class="form-control" name="country_id" id="country_id" data-validation="required">
					    <option value="1" selected > India </option>
					</select>
					 </div>
				<div class="form-group">
					<label class="form-label">Price Range</label>
					<select class="form-control" name="PriceRange" id="PriceRange" data-validation="required">
						<?php 
							if(isset($priceRange) && !empty($priceRange)) {
								echo "<option value=''  >Select priceRange</option>";
								foreach ($priceRange as $price) { ?>
								<option value="<?php echo $price['price_range_id'] ?>" > <?php echo $price['price_range']; ?> </option>
								<?php }
							} else{
								echo "<option>No category available</option>";
							}
						?>
					</select>
				</div>				
				<div class="form-group">
					<label class="form-label">* Value</label>
					<select class="form-control" name="valueClass" id="valueClass" data-validation="required">
						<?php 
							 
							for($i=1; $i<10;$i++) { ?>
								<option value="<?php echo $i ?>" > <?php echo $i; ?> </option>
					    <?php } ?>
					</select> 
				</div>
				<div class="form-group">
					<label class="form-label">Discount  %</label>
					<input type="text" class="form-control" name="markup" />	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
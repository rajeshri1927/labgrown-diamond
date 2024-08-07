<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add Price Range</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form">Back</button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="price_range_id" 	id="price_range_id" value="<?php echo(isset($pricerange['price_range_id']) && !empty($pricerange['price_range_id']))?$pricerange['price_range_id']:''; ?>">
				<div class="form-group">
					<label class="form-label">Price Range</label>
					<input type="text" class="form-control" id ="price_range" name="price_range" placeholder="Enter Price Range Here" value="<?php echo(isset($pricerange['price_range']) && !empty($pricerange['price_range']))?$pricerange['price_range']:''; ?>" data-validation="required">	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>



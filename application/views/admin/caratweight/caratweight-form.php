<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add Carat Weight</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form">Back</button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="carat_weight_id" id="carat_weight_id" value="<?php echo(isset($caratweight['carat_weight_id']) && !empty($caratweight['carat_weight_id']))?$caratweight['carat_weight_id']:''; ?>">
				<div class="form-group">
					<label class="form-label">Carat Weight</label>
					<input type="text" class="form-control" id ="carat_weight" name="carat_weight" placeholder="Enter Carat Weight Here" value="<?php echo(isset($caratweight['carat_weight']) && !empty($caratweight['carat_weight']))?$caratweight['carat_weight']:''; ?>" data-validation="required">	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
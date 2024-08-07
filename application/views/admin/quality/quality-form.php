<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-coupon">Add Quality</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form">Back</button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="quality_id" 	id="quality_id" value="<?php echo(isset($quality['quality_id']) && !empty($quality['quality_id']))?$quality['quality_id']:''; ?>">
				<div class="form-group">
					<label class="form-label">Quality Name</label>
					<input type="text" class="form-control" id ="quality_name" name="quality_name" placeholder="Enter Quality Name" value="<?php echo(isset($quality['quality_name']) && !empty($quality['quality_name']))?$quality['quality_name']:''; ?>" data-validation="required">	
				</div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
					<label class="form-label"> Color From</label>
						<input type="text" class="form-control" id ="quality_color_from" name="quality_color_from" placeholder="Enter Quality color From" value="<?php echo(isset($quality['quality_name']) && !empty($quality['quality_color_from']))?$quality['quality_color_from']:''; ?>" data-validation="required">	
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label"> Color To</label>
						<input type="text" class="form-control" id ="quality_color_to" name="quality_color_to" placeholder="Enter Quality Color To" value="<?php echo(isset($quality['quality_color_to']) && !empty($quality['quality_color_to']))?$quality['quality_color_to']:''; ?>" data-validation="required">	
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label">Clarity From</label>
						<input type="text" class="form-control" id ="quality_clarity_from" name="quality_clarity_from" placeholder="Enter Clarity From" value="<?php echo(isset($quality['quality_clarity_from']) && !empty($quality['quality_clarity_from']))?$quality['quality_clarity_from']:''; ?>" data-validation="required">	
					</div>
                </div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label">Clarity To</label>
						<input type="text" class="form-control" id ="quality_clarity_to" name="quality_clarity_to" placeholder="Enter Clarity From" value="<?php echo(isset($quality['quality_clarity_to']) && !empty($quality['quality_clarity_to']))?$quality['quality_clarity_to']:''; ?>" data-validation="required">	
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



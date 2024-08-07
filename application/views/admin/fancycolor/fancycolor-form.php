<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Fancy Color</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="fancy_color_id" id="fancy_color_id" value="<?php echo(isset($fancycolor['fancy_color_id']) && !empty($fancycolor['fancy_color_id']))?$fancycolor['fancy_color_id']:''; ?>">
				<input type="hidden" name="fancycolor_old_image" id="fancycolor_old_image" value="<?php echo(isset($fancycolor['fancycolor_old_image']) && !empty($fancycolor['fancycolor_old_image']))?$fancycolor['fancycolor_old_image']:''; ?>">
				<div class="form-group">
					<label class="form-label">Fancy Color Name</label>
					<input type="text" class="form-control" id ="fancy_color_name" name="fancy_color_name" placeholder="Fancy Color Name" value="<?php echo(isset($fancycolor['fancy_color_name']) && !empty($fancycolor['fancy_color_name']))?$fancycolor['fancy_color_name']:''; ?>" data-validation="required">	
				</div>
				<div class="form-group">
	                <label class="form-label">Fancy Color Image</label>
	                <input type="file" class="form-control" name="fancy_color_image" id="fancy_color_image" placeholder="<?php echo(isset($fancycolor['fancy_color_image']) && !empty($fancycolor['fancy_color_image']))?$fancycolor['fancy_color_image']:'Choose file'; ?>">
	            </div>
	            <?php 
		    		if(isset($fancycolor['system_file_name']) && !empty($fancycolor['system_file_name'])){ ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="assets/uploads/fancycolor/<?php echo $fancycolor['system_file_name']; ?>" alt="<?php echo $fancycolor['fancy_color_image']; ?>" class="img-thumbnail" id="fancy_color_image_placeholder">
	            		</div>
		    		<?php } else { ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="fancy_color_image_placeholder">
	            		</div>
		    		<?php }
		    	?>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
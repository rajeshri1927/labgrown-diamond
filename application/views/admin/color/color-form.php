<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Product</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="color_id" id="color_id" value="<?php echo(isset($color['color_id']) && !empty($color['color_id']))?$color['color_id']:''; ?>">
				<input type="hidden" name="color_old_image" id="color_old_image" value="<?php echo(isset($color['color_old_image']) && !empty($color['color_old_image']))?$color['color_old_image']:''; ?>">
				<div class="form-group">
					<label class="form-label">Color Name</label>
					<input type="text" class="form-control" id ="color_name" name="color_name" placeholder="Color Name" value="<?php echo(isset($color['color_name']) && !empty($color['color_name']))?$color['color_name']:''; ?>" data-validation="required">	
				</div>
				<div class="form-group">
					<label class="form-label">Color Description</label>
					<input type="text" class="form-control" id ="color_desc" name="color_desc" placeholder="Color Description" value="<?php echo(isset($color['color_desc']) && !empty($color['color_desc']))?$color['color_desc']:''; ?>" data-validation="required">	
				</div>
				<div class="form-group">
	                <label class="form-label">Color Image</label>
	                <input type="file" class="form-control" name="color_image" id="color_image" placeholder="<?php echo(isset($color['color_image']) && !empty($color['color_image']))?$color['color_image']:'Choose file'; ?>">
	            </div>
	            <?php 
		    		if(isset($color['system_file_name']) && !empty($color['system_file_name'])){ ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="assets/uploads/color/<?php echo $color['system_file_name']; ?>" alt="<?php echo $color['color_image']; ?>" class="img-thumbnail" id="color_image_placeholder">
	            		</div>
		    		<?php } else { ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="color_image_placeholder">
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
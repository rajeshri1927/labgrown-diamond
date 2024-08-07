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
				<input type="hidden" name="shape_id" id="shape_id" value="<?php echo(isset($shape['shape_id']) && !empty($shape['shape_id']))?$shape['shape_id']:''; ?>">
				<input type="hidden" name="shape_old_image" id="shape_old_image" value="<?php echo(isset($shape['system_file_name']) && !empty($shape['system_file_name']))?$shape['system_file_name']:''; ?>">
				<div class="form-group">
					<label class="form-label">Shape Name</label>
					<input type="text" class="form-control" id ="shape_name" name="shape_name" placeholder="Shape Name" value="<?php echo(isset($shape['shape_name']) && !empty($shape['shape_name']))?$shape['shape_name']:''; ?>" data-validation="required">	
				</div>
				<div class="form-group">
	                <label class="form-label">Shape Image</label>
	                <input type="file" class="form-control" name="shape_image" id="shape_image" placeholder="<?php echo(isset($shape['shape_image']) && !empty($shape['shape_image']))?$shape['shape_image']:'Choose file'; ?>">
	            </div>
	            <?php 
		    		if(isset($shape['system_file_name']) && !empty($shape['system_file_name'])){ ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="assets/uploads/shapes/<?php echo $shape['system_file_name']; ?>" alt="<?php echo $shape['system_file_name']; ?>" class="img-thumbnail" id="shape_image_placeholder">
	            		</div>
		    		<?php } else { ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="shape_image_placeholder">
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
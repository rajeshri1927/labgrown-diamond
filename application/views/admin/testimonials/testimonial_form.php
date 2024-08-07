<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add testimonial</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="testimonial-form" name="testimonial-form" action="javascript:void(0)">
			<input type="hidden" name="testimonial_id" id="testimonial_id" value="<?php echo(isset($testimonial['testimonial_id']) && !empty($testimonial['testimonial_id']))?$testimonial['testimonial_id']:''; ?>">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Name</label>
					<input type="text" class="form-control" id="testimonial_name" name="testimonial_name" placeholder="Name" data-validation="required" value="<?php echo(isset($testimonial['testimonial_name']) && !empty($testimonial['testimonial_name']))?$testimonial['testimonial_name']:''; ?>">	
				</div>
				<div class="form-group">
					<label class="form-label">Location/Site/Profession</label>
					<input type="text" class="form-control" id="testimonial_location" name="testimonial_location" placeholder="Location/Site/Profession" data-validation="required" value="<?php echo(isset($testimonial['testimonial_name']) && !empty($testimonial['testimonial_name']))?$testimonial['testimonial_name']:''; ?>">	
				</div>

				<div class="form-group">
					<label class="form-label">Feedback</label>
					<textarea class="form-control" id="testimonial_feedback" name="testimonial_feedback" placeholder="Feedback" data-validation="required"><?php echo(isset($testimonial['testimonial_feedback']) && !empty($testimonial['testimonial_feedback']))?$testimonial['testimonial_feedback']:''; ?></textarea>	
					<div class="float-right">
						<span id="maxlength">250</span> characters left.
					</div>
				</div>
				<div class="form-group">
	                <label class="form-label">Profile</label>
	                <input type="file" class="form-control" name="testimonial_image" id="testimonial_image" data-validation="required" placeholder="<?php echo(isset($testimonial['original_file_name']) && !empty($testimonial['original_file_name']))?$testimonial['original_file_name']:'Choose file'; ?>">
	            </div>
	            <div class="row">
		            <?php 
			    		if(isset($testimonial['system_file_name']) && !empty($testimonial['system_file_name'])){ ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
		            			<img src="assets/uploads/testimonials/<?php echo $testimonial['system_file_name']; ?>" alt="<?php echo $testimonial['system_file_name']; ?>" class="img-thumbnail" id="testimonial_image_placeholder">
		            		</div>
			    		<?php } else { ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
		            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="testimonial_image_placeholder">
		            		</div>
			    		<?php }
			    	?>
			    </div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
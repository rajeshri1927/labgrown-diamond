<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Clarity</h5>
			</div>
			<button class="btn btn-primary float-right toggle-form"> Back </button>
		</div>
		<form id="registration-form" class="form">
			<div class="card-body">
				<input type="hidden" name="clarity_id" id="clarity_id" value="<?php echo(isset($clarity['clarity_id']) && !empty($clarity['clarity_id']))?$clarity['clarity_id']:''; ?>">
				<input type="hidden" name="clarity_old_image" id="clarity_old_image" value="<?php echo(isset($clarity['clarity_old_image']) && !empty($clarity['clarity_old_image']))?$clarity['clarity_old_image']:''; ?>">
				<div class="form-group">
					<label class="form-label">Clarity Name</label>
					<input type="text" class="form-control" id ="clarity_name" name="clarity_name" placeholder="Clarity Name" value="<?php echo(isset($clarity['clarity_name']) && !empty($clarity['clarity_name']))?$clarity['clarity_name']:''; ?>" data-validation="required">	
				</div>
				<div class="form-group">
					<label class="form-label">Clarity Title</label>
					<input type="text" class="form-control" id ="clarity_title" name="clarity_title" placeholder="Clarity Title" value="<?php echo(isset($clarity['clarity_title']) && !empty($clarity['clarity_title']))?$clarity['clarity_title']:''; ?>">	
				</div>
				<div class="form-group">
					<label class="form-label">Clarity Description</label>
					<input type="text" class="form-control" id ="clarity_desc" name="clarity_desc" placeholder="Clarity Description" value="<?php echo(isset($clarity['clarity_desc']) && !empty($clarity['clarity_desc']))?$clarity['clarity_desc']:''; ?>">	
				</div>
				<div class="form-group">
	                <label class="form-label">Clarity Video</label>
	                <input type="file" class="form-control" name="clarity_video" id="clarity_video" placeholder="<?php echo(isset($clarity['clarity_video']) && !empty($clarity['clarity_video']))?$clarity['clarity_video']:'Choose file'; ?>">
	            </div>
				<?php if (isset($clarity['system_file_video']) && !empty($clarity['system_file_video'])) { ?>
					<div class="col-md-4 col-lg-4 col-sm-12">
						<video width='100' height='150' controls>
							<source src="assets/uploads/clarity/<?php echo $clarity['system_file_video']; ?>" alt="<?php echo $clarity['system_file_video']; ?>" class="img-thumbnail" id="clarity_video_placeholder">
						</video>
					</div>
				<?php } else { ?>
					<div class="col-md-4 col-lg-4 col-sm-12">
						<video width='100' height='150' controls>
							<source src='./assets/admin/img/dummy-image.jpg' type='video/mp4' class="img-thumbnail" id="clarity_video_placeholder">
						</video>
					</div>
				<?php } ?>
				<div class="form-group">
	                <label class="form-label">Clarity Image</label>
	                <input type="file" class="form-control" name="clarity_image" id="clarity_image" placeholder="<?php echo(isset($clarity['clarity_image']) && !empty($clarity['clarity_image']))?$clarity['clarity_image']:'Choose file'; ?>">
	            </div>
	            <?php 
		    		if(isset($clarity['system_file_name']) && !empty($clarity['system_file_name'])){ ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="assets/uploads/clarity/<?php echo $clarity['system_file_name']; ?>" alt="<?php echo $clarity['system_file_name']; ?>" class="img-thumbnail" id="clarity_image_placeholder">
	            		</div>
		    		<?php } else { ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="clarity_image_placeholder">
	            		</div>
		    	<?php } ?>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square btn-form-submit" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
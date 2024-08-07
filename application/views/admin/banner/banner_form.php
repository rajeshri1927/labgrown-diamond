<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Banner</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="banner-form" name="banner-form" action="javascript:void(0)">
			<input type="hidden" name="banner_id" id="banner_id" value="<?php echo(isset($banner['banner_id']) && !empty($banner['banner_id']))?$banner['banner_id']:''; ?>">
			<input type="hidden" name="banner_old_background_image" id="banner_old_background_image" value="<?php echo(isset($banner['banner_background']) && !empty($banner['banner_background']))?$banner['banner_background']:''; ?>">
			<input type="hidden" name="banner_old_foreground_image" id="banner_old_foreground_image" value="<?php echo(isset($banner['banner_foreground']) && !empty($banner['banner_foreground']))?$banner['banner_foreground']:''; ?>">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Title</label>
					<input type="text" class="form-control" id="banner_title" name="banner_title" placeholder="Title" data-validation="required" value="<?php echo(isset($banner['banner_title']) && !empty($banner['banner_title']))?$banner['banner_title']:''; ?>">	
				</div>
				<div class="form-group">
					<label class="form-label">Message</label>
					<textarea class="form-control" id="banner_message" name="banner_message" placeholder="Message" data-validation="required"><?php echo(isset($banner['banner_message']) && !empty($banner['banner_message']))?$banner['banner_message']:''; ?></textarea>	
					<div class="float-right">
						<span id="maxlength">250</span> characters left.
					</div>
				</div>
				<div class="form-group">
	                <label class="form-label">Banner Background</label>
	                <input type="file" class="form-control" name="banner_background" id="banner_background" data-validation="required" placeholder="<?php echo(isset($banner['banner_background']) && !empty($banner['banner_background']))?$banner['banner_background']:'Choose file'; ?>">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Banner Foreground</label>
	                <input type="file" class="form-control" name="banner_foreground" id="banner_foreground" data-validation="required" placeholder="<?php echo(isset($banner['banner_foreground']) && !empty($banner['banner_foreground']))?$banner['banner_foreground']:'Choose file'; ?>">
	            </div>
	            <div class="row">
		            <?php 
			    		if(isset($banner['banner_background']) && !empty($banner['banner_background'])){ ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
			    				<div>Banner Background</div>
		            			<img src="assets/uploads/banners/<?php echo $banner['banner_background']; ?>" alt="<?php echo $banner['banner_background']; ?>" class="img-thumbnail" id="banner_background_placeholder">
		            		</div>
			    		<?php } else { ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
			    				<div>Banner Background</div>
		            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="banner_background_placeholder">
		            		</div>
			    		<?php }
			    	?>
			    	<?php 
			    		if(isset($banner['banner_foreground']) && !empty($banner['banner_foreground'])){ ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
			    				<div>Banner Foreground</div>
		            			<img src="assets/uploads/banners/<?php echo $banner['banner_foreground']; ?>" alt="<?php echo $banner['banner_foreground']; ?>" class="img-thumbnail" id="banner_foreground_placeholder">
		            		</div>
			    		<?php } else { ?>
			    			<div class="col-md-4 col-lg-4 col-sm-12">
			    				<div>Banner Foreground</div>
		            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="banner_foreground_placeholder">
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
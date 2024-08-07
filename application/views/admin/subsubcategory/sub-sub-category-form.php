<?php //print_r($subsubcategories);die;?>
<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-sub-sub-category">Sub Sub Add Category</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="sub-sub-category-form" name="sub-sub-category-form" action="javascript:void(0)">
			<input type="hidden" name="sub_sub_category_id" id="sub_sub_category_id"  value="<?php echo(isset($subsubcategories['sub_sub_category_id']) && !empty($subsubcategories['sub_sub_category_id']))? $subsubcategories['sub_sub_category_id']:''; ?>">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Sub Category Title</label>
					<input type="text" class="form-control" id="sub_sub_category_title" name="sub_sub_category_title" placeholder="Sub Sub Category Title" data-validation="required" value="<?php echo(isset($subsubcategories['sub_sub_category_title']) && !empty($subsubcategories['sub_sub_category_title']))? $subsubcategories['sub_sub_category_title']:''; ?>">	
				</div>
				<div class="form-group">
					<label class="form-label">Product Category</label>
					<select class="form-control product_category" name="category_id" id="category_id" data-validation="required">
						<?php 
							if(isset($categories) && !empty($categories)) {
								echo "<option value='' disabled='disabled' selected='selected'>Select Main Category</option>";
								foreach ($categories as $category) { ?>
								<option value="<?php echo $category['category_id'] ?>" <?php echo(isset($subsubcategories['category_id']) && !empty($subsubcategories['category_id']) && $subsubcategories['category_id'] ==  $category['category_id'])?'selected':''; ?>> <?php echo $category['category_title']; ?> </option>
								<?php }
							} else{
								echo "<option>No category available</option>";
							}
						?>
					</select>
				</div>	
				<div class="form-group">
					<label class="form-label">Product Sub Category</label>
					<select class="form-control" name="sub_category_id" id="sub_category_id" data-validation="required">
						<option value=" " disabled="disabled" selected="selected">Select Sub Category</option>
						<?php 
							if(isset($sub_categories) && !empty($sub_categories)) {
								foreach ($sub_categories as $sub_category) { ?>
								<option value="<?php echo $sub_category['sub_category_id'] ?>" <?php echo(isset($subsubcategories['category_id']) && !empty($subsubcategories['category_id']) && $subsubcategories['sub_category_id'] ==  $sub_category['sub_category_id'])?'selected':''; ?>> <?php echo $sub_category['sub_category_title']; ?> </option>
								<?php }
							} else{
								echo "<option>No sub category available</option>";
							}
						?>
					</select>
				</div>			
				<div class="form-group">
					<label class="form-label">Sub Category Description</label>
					<textarea class="form-control" id="sub_sub_category_desc" name="sub_sub_category_desc" placeholder="Sub Sub Category Description" data-validation="required"  value="<?php echo(isset($subsubcategories['sub_sub_category_desc']) && !empty($subsubcategories['sub_sub_category_desc']))?$subsubcategories['sub_sub_category_desc']:''; ?>"><?php echo(isset($subsubcategories['sub_sub_category_desc']) && !empty($subsubcategories['sub_sub_category_desc']))?$subsubcategories['sub_sub_category_desc']:''; ?></textarea>	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
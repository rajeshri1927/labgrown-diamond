<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Attribute</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="attribute-form" name="attribute-form" action="javascript:void(0)">
			<input type="hidden" name="attribute_id" id="attribute_id">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Category Title</label>
					<select name="subCategoryName" id="subCategoryName" class="form-control" data-validation="required">
						<option value="">Select Sub Category</option>
					   <?php 
					     foreach($subcategories as $category):?>
							  <option value="<?php echo $category['subcategory_id'];?>"><?php echo $category['category_title'];?></option>
						<?php endforeach; ?>
					  </select>
				</div>
				<div class="form-group">
					<label class="form-label">Attribute Title</label>
					<input type="text" class="form-control" id="attribute_title" name="attribute_title" placeholder="Category Title" data-validation="required">	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
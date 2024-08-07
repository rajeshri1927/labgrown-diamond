<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title">Add Category</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="category-form" name="category-form" action="javascript:void(0)">
			<input type="hidden" name="subcategory_id" id="subcategory_id">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Category Title</label>
					<select name="categoryName" id="categoryName" class="form-control" data-validation="required">
						<option value="">Select Category</option>
					   <?php 
					     foreach($categories as $category):?>
							  <option value="<?php echo $category['category_id'];?>"><?php echo $category['category_title'];?></option>
						<?php endforeach; ?>
					  </select>
				</div>
				<div class="form-group">
					<label class="form-label">SubCategory Title</label>
					<input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category Title" data-validation="required">	
				</div>
				<div class="form-group">
					<label class="form-label">Category Description</label>
					<textarea class="form-control" id="category_desc" name="category_desc" placeholder="Category Description" data-validation="required"></textarea>	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
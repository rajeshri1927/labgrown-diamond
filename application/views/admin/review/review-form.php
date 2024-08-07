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
				<input type="hidden" name="product_id" 	id="product_id" value="<?php echo(isset($product['product_id']) && !empty($product['product_id']))?$product['product_id']:''; ?>">
				<input type="hidden" name="product_old_image" id="product_old_image" value="<?php echo(isset($product['system_file_name']) && !empty($product['system_file_name']))?$product['system_file_name']:''; ?>">
				<div class="form-group">
					<label class="form-label">Product Title</label>
					<input type="text" class="form-control" id ="product_title" name="product_title" placeholder="Product Title" value="<?php echo(isset($product['product_title']) && !empty($product['product_title']))?$product['product_title']:''; ?>" data-validation="required">	
				</div>
				<div class="row">
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Category</label>
						<select class="form-control" name="product_category" id="product_category" data-validation="required">
							<?php 
								if(isset($categories) && !empty($categories)) {
									echo "<option value='' disabled='disabled' selected='selected'>Select Category</option>";
									foreach ($categories as $category) { ?>
										<option value="<?php echo $category['category_id'] ?>" <?php echo(isset($product['product_category']) && !empty($product['product_category']) && $product['product_category'] ==  $category['category_id'])?'selected':''; ?>> <?php echo $category['category_title']; ?> </option>
									<?php }
								} else{
									echo "<option>No category available</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Optional</label>
						<input type="text" class="form-control" id="product_optional" name="product_optional" placeholder="Product Optional Field" value="<?php echo(isset($product['product_optional']) && !empty($product['product_optional']))?$product['product_optional']:''; ?>">
					</div>				
				</div>
				<div class="row">
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Actual Price</label>
						<input type="text" class="form-control" id="product_actual_price" name="product_actual_price" placeholder="Product Actual Price" value="<?php echo(isset($product['product_actual_price']) && !empty($product['product_actual_price']))?$product['product_actual_price']:''; ?>" data-validation="required">	
					</div>
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Discount Price</label>
						<input type="text" class="form-control" id="product_discount_price" name="product_discount_price" placeholder="Product Discount Price" value="<?php echo(isset($product['product_discount_price']) && !empty($product['product_discount_price']))?$product['product_discount_price']:'';?>" data-validation="required">	
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Weight</label>
						<input type="text" class="form-control" id="product_weight" name="product_weight" placeholder="Product Weight" value="<?php echo(isset($product['product_weight']) && !empty($product['product_weight']))?$product['product_weight']:''; ?>" data-validation="required">	
					</div>
					<div class="form-group col-lg-6 col-md-6">
						<label class="form-label">Product Measure</label>
						<!--<input type="text" class="form-control"  name="product_measure" id="product_measure" value="gms" readonly data-validation="required">-->
						<select class="form-control" name="product_measure" id="product_measure" data-validation="required">
							<!--<option>Select Product Measure</option>-->
							<option value="<?php echo (isset($product['product_measure']) && !empty($product['product_measure']))?$product['product_measure']:''; ?>"><?php echo (isset($product['product_measure']) && !empty($product['product_measure']))?$product['product_measure']:'Select Product Measure'; ?></option>
							<option value="gms">Gms</option>
                            <option value="mg">Mg</option>
                            <option value="kg">Kg</option>
                            <option value="ml">Ml</option>
                            <option value="ltr">Ltr</option>
						</select> 
						<!-- <input type="text" class="form-control" id="product_discount_price" name="product_discount_price" placeholder="Product Discount Price" value="<?php //echo(isset($product['product_discount_price']) && !empty($product['product_discount_price']))?$product['product_discount_price']:'';?>" data-validation="required">	 -->
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Product Description</label>
					<div class="form-control" id="product_description" name="product_description"><?php echo(isset($product['product_description']) && !empty($product['product_description']))?$product['product_description']:''; ?></div>	
					<!-- <div class="float-right">
						<span id="maxlength">250</span> characters left.
					</div> -->
				</div>
				<div class="form-group">
	                <label class="form-label">Product Image</label>
	                <input type="file" class="form-control" name="product_image" id="product_image" placeholder="<?php echo(isset($product['original_file_name']) && !empty($product['original_file_name']))?$product['original_file_name']:'Choose file'; ?>">
	            </div>
	            <?php 
		    		if(isset($product['system_file_name']) && !empty($product['system_file_name'])){ ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="assets/uploads/products/<?php echo $product['system_file_name']; ?>" alt="<?php echo $product['system_file_name']; ?>" class="img-thumbnail" id="product_image_placeholder">
	            		</div>
		    		<?php } else { ?>
		    			<div class="col-md-4 col-lg-4 col-sm-12">
	            			<img src="./assets/admin/img/dummy-image.jpg" alt="dummy-image.jpg" class="img-thumbnail" id="product_image_placeholder">
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
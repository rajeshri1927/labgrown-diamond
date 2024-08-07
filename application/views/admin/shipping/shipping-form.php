<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-Shipping-discount"> Add Shipping </h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="shipping-form" name="shipping-form" action="javascript:void(0)">
			<input type="hidden" name="shipping_id" id="shipping_id"  value="<?php echo(isset($shippings['shipping_id']) && !empty($shippings['shipping_id']))? $shippings['shipping_id']:''; ?>">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Country Name</label>
					<select class="form-control product_category" name="country_id" id="country_id" data-validation="required">
						<?php 
							if(isset($countries) && !empty($countries)) {	
								echo "<option value='' disabled='disabled' selected='selected'>Select Country</option>";
								foreach ($countries as $country) { 
									//echo "<pre>";print_r($country);die;	
								?>
								<option value="<?php echo $country['id'] ?>" <?php echo(isset($shippings['id']) && !empty($shippings['id']) && $shippings['country_name'] ==  $country['country_name'])?'selected':''; ?>> <?php echo $country['country_name']; ?> </option>
								<?php }
							} else{
								echo "<option>No Country Available Here.</option>";
							}
						?>
					</select>
				</div>
				<!-- <div class="form-group">
					<label class="form-label">Discount</label>
					<input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount" data-validation="required" value="<?php //echo(isset($shippings['discount']) && !empty($shippings['discount']))? $shippings['discount']:''; ?>">	
				</div> -->
				<!-- <div class="form-group">
					<label class="form-label">Color</label>
					<select class="form-control product_category" name="color_id" id="color_id" data-validation="required"> -->
						<?php 
							// if(isset($colors) && !empty($colors)) {	
							// 	echo "<option value='' disabled='disabled' selected='selected'> Select Color </option>";
							// 	foreach ($colors as $color) { 	
								?>
								<!-- <option value="<?php //echo $color['color_id'] ?>" <?php //echo(isset($shippings['color_id']) && !empty($shippings['color_id']) && $shippings['color_id'] ==  $color['color_id'])?'selected':''; ?>> <?php //echo $color['color_name']; ?> </option> -->
								<?php 
								//}
							//} else{
								//echo "<option>No Color Available Here.</option>";
							//}
						?>
					<!-- </select>
				</div>	 -->
				<!-- <div class="form-group">
					<label class="form-label">Clarity</label>
					<select class="form-control product_category" name="clarity_id" id="clarity_id" data-validation="required"> -->
						<?php 
							// if(isset($clarities) && !empty($clarities)) {	
							// echo "<option value='' disabled='disabled' selected='selected'>Select Clarity</option>";
							// 	foreach ($clarities as $clarity) { 
									
							// 	?>
							 	<!-- <option value="<?php //echo $clarity['clarity_id'] ?>" <?php //echo(isset($shippings['clarity_id']) && !empty($shippings['clarity_id']) && $shippings['clarity_id'] ==  $clarity['clarity_id'])?'selected':''; ?>> <?php //echo $clarity['clarity_name']; ?> </option> -->
							<?php 
							//}
							// } else{
							// 	echo "<option>No Clarity Available Here.</option>";
							// }
						?>
				<!-- 	</select>
				</div> -->
				<div class="form-group">
					<label class="form-label">GST</label>
					<input type="text" class="form-control" id="gst" name="gst" placeholder="Enter Discount" data-validation="required" value="<?php echo(isset($shippings['gst']) && !empty($shippings['gst']))? $shippings['gst']:''; ?>">	
				</div>
				<div class="form-group">
					<label class="form-label">Shipping</label>
					<input type="text" class="form-control" id="shipping" name="shipping" placeholder="Shipping" data-validation="required" value="<?php echo(isset($shippings['shipping']) && !empty($shippings['shipping']))? $shippings['shipping']:''; ?>">	
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
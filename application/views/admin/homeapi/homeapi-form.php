<?php //echo "<pre>";print_r($homeapi);die;?>
<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-sub-sub-category">Home API Request</h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="home-api-form" name="home-api-form" action="javascript:void(0)">
			<input type="hidden" name="home_api_id" id="home_api_id"  value="<?php echo(isset($homeapi['home_api_id']) && !empty($homeapi['home_api_id']))? $homeapi['home_api_id']:''; ?>">
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Shape</label>
						<select class="form-control" name="shape" id="shape" data-validation="required">
							<?php 
								if(isset($shapes) && !empty($shapes)) {
									echo "<option value='' disabled='disabled' selected='selected'>Select Shape </option>";
									foreach ($shapes as $shape) { 
										
									?>
									<option value="<?php echo $shape['shape_name'] ?>" <?php echo(isset($homeapi['shape']) && !empty($homeapi['shape']) && $homeapi['shape'] ==  $shape['shape_name'])?'selected':''; ?>> <?php echo $shape['shape_name']; ?> </option>
									<?php }
								} else{
									echo "<option>No Shape Available</option>";
								}
							?>
						</select>
				</div>
				<div class="form-group">
					<label class="form-label">Carat Weight From</label>
						<select class="form-control" name="size_from" id="size_from" data-validation="required">
							<option value="">Select Size From</option>
							<?php 
							if(isset($caratweights)  &&  !empty($caratweights)){
								foreach($caratweights as $caratweight){
									$first_digit = substr($caratweight['carat_weight'], 0, 4);
							?>
							<option value="<?php echo $first_digit;?>"><?php echo $first_digit;?> </option>
							<?php
								}
							 }
							?>
						</select>
				</div>
				<div class="form-group">
					<label class="form-label">Carat Weight To</label>
						<select class="form-control" name="size_to" id="size_to" data-validation="required">
							<option value="">Select Size To</option>
							<?php 
							if(isset($caratweights)  &&  !empty($caratweights)){
								foreach($caratweights as $caratweight){
									$second_digit = substr($caratweight['carat_weight'], 8, 10); //die;
							?>
							<option value="<?php echo $second_digit;?>"><?php echo $second_digit;?> </option>
							<?php
								}
							 }
							?>
						</select>
				</div>
				<div class="form-group">
					<label class="form-label">Quality</label>
						<select class="form-control" name="quality" id="quality" data-validation="required">
							<option value="">Select Quality</option>
							<option value="good">Good</option>
							<option value="very good">very good</option>
							<option value="best">best</option>
						</select>
				</div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
					<label class="form-label"> Color From</label>
						<select class="form-control" name="color_from" id="color_from" data-validation="required">
							<option value="">Select Color From</option>
							<?php 
							if(isset($colors)  &&  !empty($colors)){
								foreach($colors as $color){
							?>
							<option value="<?php echo $color['color_name'];?>"><?php echo $color['color_name'];?> </option>
							<?php
								}
								}
							?>
						</select>
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label"> Color To</label>
						<select class="form-control" name="color_to" id="color_to" data-validation="required">
							<option value="">Select Color To</option>
							<?php 
							if(isset($colors)  &&  !empty($colors)){
								foreach($colors as $color){
							?>
							<option value="<?php echo $color['color_name'];?>"><?php echo $color['color_name'];?> </option>
							<?php
								}
								}
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label">Clarity From</label>
						<select class="form-control" name="clarity_from" id="clarity_from" data-validation="required">
							<option value="">Select Clarity From</option>
							<?php 
							if(isset($clarities)  &&  !empty($clarities)){
								foreach($clarities as $clarity){
							?>
							<option value="<?php echo $clarity['clarity_name'];?>"><?php echo $clarity['clarity_name'];?> </option>
							<?php
								}
								}
							?>
						</select>
					</div>
                </div>
				<div class="row">
					<div class="form-group col-lg-12 col-md-12">
						<label class="form-label">Clarity To</label>
						<select class="form-control" name="clarity_to" id="clarity_to" data-validation="required">
							<option value="">Select Clarity To</option>
							<?php 
							if(isset($clarities)  &&  !empty($clarities)){
								foreach($clarities as $clarity){
							?>
							<option value="<?php echo $clarity['clarity_name'];?>"><?php echo $clarity['clarity_name'];?> </option>
							<?php
								}
								}
							?>
						</select>
					</div>
                </div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
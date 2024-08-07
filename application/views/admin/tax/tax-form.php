<div class="col-lg-6 col-md-8 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<h5 id="card-title-sub">Add TAX </h5>
			</div>
			<button class="btn btn-secondary btn-square float-right toggle-form"> Back </button>
		</div>
		<form id="sub-category-form" name="sub-category-form" action="javascript:void(0)">
			 <div class="card-body">
				<div class="form-group">
					<label class="form-label">Country</label>
					<select class="form-control" name="country_id" id="country_id" data-validation="required">
					    <?php 
							if(isset($countryList) && !empty($countryList)){
								echo "<option value=''  >Select Country</option>";
								foreach ($countryList as $country) { ?>
								  <option value="<?php echo $country['id'] ?>" > <?php echo $country['country_name']; ?></option>
						<?php   }
							}  
						 ?>	
					</select>
					 </div>
				<div class="form-group">
					<label class="form-label">Import Tax(%)</label>
					 <input type="text" class="form-control" name="ImportTax" />
				</div>		
                <label class="form-label" style="width:100%">Local Tax-1</label>				
				<div class="form-group col-md-12">
					<input type="text" class="form-control   col-md-6" name="localTaxTitle1" style="float:left" placeholder="Local Tax Title"  />
					<input type="text" class="form-control col-md-5" name="localTaxValue1" style="float:left"  placeholder="Local Tax Rate(%)" /> 
				</div>
				<label class="form-label" style="width:100%">Local Tax-2</label>				
				<div class="form-group col-md-12">
					<input type="text" class="form-control   col-md-6" name="localTaxTitle2" style="float:left" placeholder="Local Tax Title"  />
					<input type="text" class="form-control col-md-5" name="localTaxValue2" style="float:left"  placeholder="Local Tax Rate(%)" /> 
				</div>
				<label class="form-label">Other Tax</label>
				<div class="form-group col-md-12" style="width:100%">
					<input type="text" class="form-control col-md-6" name="otherTaxTitle" style="float:left"  placeholder="Other Tax Title"  />
					<input type="text" class="form-control col-md-5" name="otherTaxVlue" style="float:left"  placeholder="Other Tax Title" />	
				</div>
				<div style="clear:both"></div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-primary btn-square" type="submit"> Save </button> &nbsp;
	    		<button class="btn btn-default btn-square" type="reset"> Reset </button>
	    	</div>
		</form>
	</div>
</div>
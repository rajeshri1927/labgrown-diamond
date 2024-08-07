
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
            <div class="float-left">
                <h5><i class="fa fa-align-justify"></i> Rapaport Page </h5>
            </div>
              <a href="<?php echo base_url()."admin/clear-rapaport-rate";?>">Clear</a>
			<button class="btn btn-success float-right" id="product_Rapaport_clear" onclick="del_rapaRae()" style="margin-right: 10px;">Clear</button>
            <button class="btn btn-success float-right" id="product_excel" style="margin-right: 10px;">Upload Rapaport Excel</button>
        </div>
		<div class="card-body p-0"> 
			<table class="table table-responsive-sm table-striped" id="product-list">
				<thead>
					<tr>
					    <th width="10%">Id</th>
						<th width="20%">Shape</th>
						<th width="10%" class="text-center">Clarity</th>
						<th width="10%"  class="text-center">Color</th>
						<th width="10%" class="text-center">Size from</th>
						<th width="15%" class="text-center">Size to</th>
						<th width="15%" class="text-center">Rate</th>
						<th width="20%" class="text-center">Post date</th>
					</tr>
				</thead>
				<tbody id="table-body"></tbody>
			</table>
		</div>
	</div>
</div>
<script>
 function del_rapaRae(){
		//alert("Inside Clear");
		 
		if(confirm('Clear Rapaport Rate? Pls confirm...')) {
           document.location="<?php echo base_url."admin/clear-rapaport-rate" ;?>";
        } else {
            
        }
	
	}
</script>
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Product</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
    	<div class="">
    		<div class="row justify-content-center form-view" id="form-view">
    			<?php $this->load->view('admin/product/product-list'); ?>
    		</div>
	    	<div class="row justify-content-center list-view" id="list-view">
	    		<?php $this->load->view('admin/product/order-list.html'); ?>
	    	</div>
    	</div>
    </div>
</div>
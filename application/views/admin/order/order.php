<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Orders</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
    	<div class="">
            <div class="row justify-content-center list-view" id="list-view">
               <?php $this->load->view('admin/order/order-list.html'); ?>
            </div>
    		<div class="row justify-content-center form-view" id="form-view">
    			<?php $this->load->view('admin/order/product-list.php'); ?>
    		</div>
    	</div>
    </div>
</div>
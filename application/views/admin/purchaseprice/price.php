<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Purchase Price</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="form-view">
           <?php $this->load->view('admin/purchaseprice/price-form.html'); ?>
        </div>
		<div class="row justify-content-center list-view" id="list-view">
			<?php $this->load->view('admin/purchaseprice/price-list.html'); ?>
		</div>
    </div>
</div>
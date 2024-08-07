<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Pricerange</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="pricerange-form-view">
           <?php $this->load->view('admin/jewellary/pricerange/pricerange-form.html'); ?>
        </div>
		<div class="row justify-content-center list-view" id="category-list-view">
			<?php $this->load->view('admin/jewellary/pricerange/pricerange-list.html'); ?>
		</div>
    </div>
</div>
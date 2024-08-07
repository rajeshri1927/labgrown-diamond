<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active"> Product Measure </li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="measure-form-view"> 
            <?php $this->load->view('admin/measure/measure-form.html'); ?>  
        </div>
		<div class="row justify-content-center list-view" id="measure-list-view">
			<?php $this->load->view('admin/measure/measure-list.html'); ?>
		</div>
    </div>
</div>
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Intensity</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="form-view">
           <?php $this->load->view('admin/Intensity/intensity-form.html'); ?>
        </div>
		<div class="row justify-content-center list-view" id="list-view">
			<?php $this->load->view('admin/Intensity/intensity-list.html'); ?>
		</div>
    </div>
</div>
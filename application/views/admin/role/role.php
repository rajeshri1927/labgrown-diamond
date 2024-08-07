<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Role</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="role-form-view">
           <?php $this->load->view('admin/role/role-form.html'); ?>
        </div>
		<div class="row justify-content-center list-view" id="role-list-view">
			<?php $this->load->view('admin/role/role-list.html'); ?>
		</div>
    </div>
</div>
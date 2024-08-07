<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Attributes</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="category-form-view">
           <?php $this->load->view('admin/jewellary/attribute/attribute-form.php', $subcategories); ?>
        </div>
		<div class="row justify-content-center list-view" id="category-list-view">
			<?php $this->load->view('admin/jewellary/attribute/attribute-list.html'); ?>
		</div>
    </div>
</div>
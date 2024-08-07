<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">SubCategories</li>
</ol>

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center form-view" id="category-form-view">
           <?php $this->load->view('admin/jewellary/subcategory/subcategory-form.php', $categories); ?>
        </div>
		<div class="row justify-content-center list-view" id="category-list-view">
			<?php $this->load->view('admin/jewellary/subcategory/subcategory-list.html'); ?>
		</div>
    </div>
</div>
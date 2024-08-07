<style>
    /* Hide the checkbox */
.dropdown-toggle {
    display: none;
}

/* Style the label to look like a button */
.dropdown-toggle + label {
    display: block;
    padding: 10px;
    background-color: #f8f9fa;
    cursor: pointer;
}

/* Hide the dropdown by default */
.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #ffffff;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Show the dropdown when the checkbox is checked */
.dropdown-toggle:checked + label + .dropdown-menu {
    display: block;
}

</style>
<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="admin/home"><i class="icon-speedometer"></i> Dashboard </a>
        </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="admin/product-categories"><i class="icon-tag"></i> Categories </a>
        </li> -->
        <ul class="nav">
            <li class="nav-item dropdown">
                <input type="checkbox" id="categoriesDropdown" class="dropdown-toggle">
                <label for="categoriesDropdown" class="nav-link">
                    <i class="icon-tag"></i> Categories
                </label>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="dropdown-item" href="admin/product-categories">Main Category </a></li>
                    <li class="nav-item"><a class="dropdown-item" href="admin/sub-categories">Sub Category</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="admin/sub-sub-categories">Sub Sub Category</a></li>
                </ul>
            </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="admin/quality"><i class="icon-social-dropbox"></i> Quality </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/price-range"><i class="icon-social-dropbox"></i> Price Range </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/carat-weight"><i class="icon-social-dropbox"></i> Carat Weight </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/shape"><i class="icon-social-dropbox"></i> Shape </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/color"><i class="icon-social-dropbox"></i> Color </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/clarity"><i class="icon-social-dropbox"></i> Clarity </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/fancycolor"><i class="icon-social-dropbox"></i>Fancy Color </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/overtone"><i class="icon-social-dropbox"></i>Overtone</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/intensity"><i class="icon-social-dropbox"></i>Intensity</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/purchase_price"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Purchase Price / MRP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/discount"><i class="icon-social-dropbox"></i>Discount</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/offer"><i class="icon-social-dropbox"></i>Offer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/shipping"><i class="icon-social-dropbox"></i>Shipping</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/products-measures"><i class="icon-social-dropbox"></i> Products Measure </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/products"><i class="icon-social-dropbox"></i> Products </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/orders"><i class="icon-basket"></i> Orders </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/coupon"><i class="fa fa-tag fa-lg"></i> Coupon </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/enquiry"><i class="icon-people"></i> Enquiry </a>
        </li>
        <?php 
        $admin_session  = $this->session->userdata('admin');
        // if($admin_session['role_id']==1){ ?>
        <li class="nav-item">
            <a class="nav-link" href="admin/role"><i class="icon-people"></i> Role </a>
        </li>
        <?php //} ?>
        <li class="nav-item">
            <a class="nav-link" href="admin/b2c"><i class="icon-people"></i> B2C Users </a>
        </li>   
        <li class="nav-item">
            <a class="nav-link" href="admin/b2a"><i class="icon-people"></i> B2A Users </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/subadmin"><i class="icon-people"></i> Sub Admin </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/banner"><i class="icon-people"></i> Web Banner </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/review"><i class="icon-picture"></i> Customer Review </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="admin/product-image-upload"><i class="icon-picture"></i> Image Upload </a>
        </li> -->
		<li class="nav-item">
            <a class="nav-link" href="admin/permanent-landing-page"><i class="icon-picture"></i> Permanent Landing Page</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="admin/permanent-city-page"><i class="icon-picture"></i> Permanent City Page</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="admin/permanent-product-page"><i class="icon-picture"></i> Permanent Product Page</a>
        </li>
    </ul>
</nav>
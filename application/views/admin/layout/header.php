<button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
	<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="admin/home"><img alt="Lab Grown Diamond" class="w-40" src="assets\images\logo.png" style="height: 45px;
    width: 105px;
}"></a>
<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
	<span class="navbar-toggler-icon"></span>
</button>
<ul class="nav navbar-nav ml-auto">
    <!-- <li class="nav-item d-md-down-none">-->
    <!--    <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item d-md-down-none">-->
    <!--    <a class="nav-link" href="#"><i class="icon-list"></i>cxzczxcxxzz</a>-->
    <!--</li>-->
    <!--<li class="nav-item d-md-down-none">-->
    <!--    <a class="nav-link" href="#"><i class="icon-location-pin">zccxcxx</i></a>-->
    <!--</li>-->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <?php if(isset($_SESSION['admin']['first_name']) && !empty($_SESSION['admin']['first_name'])): ?>
                <span> <?php echo $_SESSION['admin']['first_name']; ?> </span>
            <?php endif ?>

            <?php if(isset($_SESSION['admin']['last_name']) && !empty($_SESSION['admin']['last_name'])): ?>
                <span> <?php echo $_SESSION['admin']['last_name']; ?> </span>
            <?php endif ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="admin/change-password" id="reset-password"><i class="fa fa-lock"></i> Change password?</a>
            <a class="dropdown-item" href="#" id="logout"><i class="fa fa-lock"></i> Logout</a>
        </div>
    </li>
</ul>
&nbsp;&nbsp;
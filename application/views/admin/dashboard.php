<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
        <base href="<?php echo base_url(); ?>">
        <link rel="shortcut icon" href="assets/images/Lab Grown Diamond-favicon.png">
       	<title> <?php echo(isset($title) && !empty($title)?$title:'Admin | Home')?> </title>
        <!-- Icons -->
        <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css"/>
        <link href="assets/admin/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/admin/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
        <!-- Main styles for this application -->
        <link href="assets/admin/css/jquery.toast.min.css" rel="stylesheet">
        <link href="assets/admin/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/b-print-1.6.3/datatables.min.css"/>
        <!-- Styles required by this views -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    </head>
    <body class="app <?php echo (isset($_SESSION['admin']['isLoggedIn']) && $_SESSION['admin']['isLoggedIn'] == TRUE)?'header-fixed sidebar-fixed':'flex-row align-items-center'; ?>">
        <?php if(isset($_SESSION['admin']['isLoggedIn']) && $_SESSION['admin']['isLoggedIn'] == TRUE){ ?>
	    	<header class="app-header navbar">
	        	<?php $this->load->view('admin/layout/header'); ?>
	    	</header>
	        <div class="app-body">
	            <div class="daily-meat-sidebar sidebar">
	            	<?php $this->load->view('admin/layout/sidebar'); ?>
	            </div>
	            <main class="main">
	                <?php 
						if(isset($view) && !empty($view)){
							$this->load->view($view);
						}
					?>
	            </main>
	        </div>
	        <footer class="app-footer">
	            <span><a href="#" class="red-link">Lab Grown Diamond</a> © 2024.</span>
	            <span class="ml-auto">Powered by <a href="#" class="red-link">Lab Grown Diamond</a></span>
	        </footer>
	    <?php } else { ?>
	 		<?php 
				if(isset($view) && !empty($view)){
					$this->load->view($view);
				}
			?>
	    <?php } ?>
        <!-- Bootstrap and necessary plugins -->
        <script type="text/javascript" src="assets/admin/node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="assets/admin/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script type="text/javascript" src="assets/admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="assets/admin/node_modules/pace-progress/pace.min.js"></script> -->
        <script type="text/javascript" src='assets/admin/js/jquery.toast.min.js'></script>
        <script type="text/javascript" src="assets/admin/js/app.js"></script>
        <script type="text/javascript" src="assets/admin/js/utility.js"></script>
        <!-- <script type="text/javascript" src="assets/admin/js/utility.js"></script> -->
        <script type="text/javascript" src="assets/admin/js/views/main.js"></script>
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js'></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/b-print-1.6.3/datatables.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
 		<?php 
            if(isset($script) && !empty($script)){ ?>
                <script type="text/javascript" src='assets/admin/app/<?php echo $script; ?>'></script>
            <?php }
        ?>
    </body>
</html>
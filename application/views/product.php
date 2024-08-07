<?php 
include_once('layout/navbar.php');
include_once('layout/header.html');
include_once('layout/filtermanu.php');
?>              
<!-------tabs and----------> 
<div class="container-fluid">
   <div class="bread">
      <ul  class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="home">Home</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">
          <?php 
             if (isset($json_data['response']['body']['diamonds']) && !empty($json_data['response']['body']['diamonds'])) {
                $count_of_products = count($json_data['response']['body']['diamonds']);
            ?>
            <a href="get-products-quick-filter"> </a>Catalogue Page - Showing 1 - <?php echo $count_of_products; ?> results
            <?php }elseif(isset($api_response) && !empty($api_response)){
                $count_of_products = count($api_response);
            ?>
              <a href="get-products-quick-filter"> </a>Catalogue Page - Showing 1 - <?php echo $count_of_products; ?> results
            <?php } ?>
         </li>
      </ul>
      <div class="float-right">
         <div class="gia_view">
         <button type="button" data-view="list" title="If You Want to Modify Click on Quick or Advance Search">Modify Search</button>
          <button type="button" data-view="list" class="active">Listing View</button>
          <button type="button" data-view="certificate">Certificate View</button>
          <button type="button" data-view="image">Image View</button>
          <button type="button" data-view="video">Video View</button>

            <!-- <a href="#"><button type="button">Image View</button></a>
            <a href="#"><button type="button">Video View</button></a> -->
            <button type="button" data-view="list" id="sort">SORT <i class="fa fa-sort" aria-hidden="true"></i></button>
         </div>
         <div class="inptut_range float-right" id="input_range">
            <div class="sortin_select">
               <div class="sort_right">
               <a href="get-hight-to-low-price?price=high_to_low">
                  <label class="letest_design">PRICE HIGH TO LOW</label>
                </a>
                <a href="get-hight-to-low-price?price=low_to_high">
                  <label class="letest_design">PRICE LOW TO HIGH</label>
                </a>
                <a href="get-hight-discount-first">
                  <label class="letest_design"> HIGH DISCOUNT FIRST
                  <!-- <input type="checkbox">
                  <span class="checkmark"></span> -->
                  </label>
                </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!----------menu end------>
   <div id="sr-theader">
      <div class="pull-left mr-4">
        <strong>
          <?php 
            if (isset($json_data['response']['body']['diamonds']) && !empty($json_data['response']['body']['diamonds'])) {
              $count_of_products = count($json_data['response']['body']['diamonds']);
              $count_values = (isset($count_of_products) && !empty($count_of_products))?$count_of_products:'0';
              echo $count_values; 
          ?>
          diamonds found matching your criteria
        </strong>
        <strong>
          <?php }elseif(isset($api_response) && !empty($api_response)){
            $count_of_products = count($api_response);
            $count_values = (isset($count_of_products) && !empty($count_of_products))?$count_of_products:'0';
            echo $count_values; 
          ?>
            diamonds found matching your criteria
          <?php } ?>
        </strong>
      </div>
      <div id="boxThis">
                  <ul id="breadcrumb">
                    <li id="carat_1" style="display: inline;">0.20 TO 0.29 <i class="fa fa-times"></i></li>
                    <li id="average" style="display: inline;">Asscher<i class="fa fa-times"></i></li>
                  </ul>
      </div>
   </div>
    <script>
        // Function to show the specified view
        function showView(view, button) {
            var views = ['list', 'certificate', 'image', 'video'];

            // Hide all view elements
            for (var i = 0; i < views.length; i++) {
                var element = document.getElementById(views[i] + '_view');
                if (element) {
                    element.style.display = 'none';
                }
            }

            // Display the selected view element
            var selectedElement = document.getElementById(view + '_view');
            if (selectedElement) {
                selectedElement.style.display = 'block';
            }

            // Remove active class from all buttons
            var buttons = document.querySelectorAll('button');
            buttons.forEach(function(btn) {
                btn.classList.remove('active');
            });

            // Add active class to the clicked button
            button.classList.add('active');
        }

        // Show Listing View by default when the page loads
        window.onload = function() {
            showView('list', document.querySelector('button.active'));
        };

        // Add event listeners to each button to switch views
        document.querySelectorAll('button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var viewName = this.getAttribute('data-view');
                showView(viewName, this);
            });
        });
    </script>
    <div id="list_view" style="display: none;">
      <?php include('list_view.php'); ?>
    </div>   
    <div id="certificate_view" style="display: none;">
      <?php include('certificate_view.php'); ?>
    </div>
    <div id="image_view" style="display: none;">
      <?php include('image_view.php'); ?>
    </div> 
    <div id="video_view" style="display: none;">
      <?php include('video_view.php'); ?>
    </div>     
  </div>
  <script>
    (function () {
        window.onpageshow = function(event) {
           if (event.persisted) {
                 window.location.reload();
           }
        };
    })();
  </script>
</div>
<!----tabs end------->

<?php 
include_once('layout/navbar.php');
include_once('layout/header.html');
include_once('layout/filtermanu.php');
?>              
<!-------tabs and----------> 
   
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
        document.querySelectorAll('button').forEach(function(btn){
            btn.addEventListener('click', function() {
                var viewName = this.getAttribute('data-view');
                showView(viewName, this);
            });
        });
    </script>
    <?php
	   //echo "PermanantLandingPageee.......";
	?>
    <div id="image_view1" style="display: block;" >
      <?php 
	        
	      //print_r($landingPage_block_data);
		 include('stone_cateloguePageImage_view1.php'); ?>
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

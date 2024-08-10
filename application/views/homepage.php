<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo(isset($title) && !empty($title)?$title:'IGI Diamonds & Jewellery | Home')?> </title>
  <base href="<?php echo base_url();?>">
 <!--  <link rel="shortcut icon" href="assets/images/Favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1"/>
  <meta name="description" content="labgrown-diamond-jewelry.com - Buy Labgrown Diamond Online  from our online store. Best website for online Labgrown Diamonds."/>
  <meta name="keywords" content="lab-grown diamonds, cvd diamonds,fancy diamonds, ">
  <meta name="format-detection" content="telephone=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/extra.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="assets/css/flag.css" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/ms-dropdown@4.0.3/dist/js/dd.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/flag.css" type="text/css"> -->
    <link rel="SHORTCUT ICON" href="assets/images/Favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1"/>
    <meta name="description" content="labgrown-diamond-jewelry.com - Buy Labgrown Diamond Online  from our online store. Best website for online Labgrown Diamonds." />
    <meta name="keywords" content="lab-grown diamonds, cvd diamonds,fancy diamonds, ">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="https://labgrown-diamond-jewelry.com/" />  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/flag.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/ms-dropdown@4.0.3/dist/js/dd.min.js"></script>
    <script>
      window.addEventListener('load', function(){
        var loader = document.querySelector('.page-loader');
        loader.style.display = 'none';
      });

      $(document).ready(function() {

          $(".fa-search").click(function() {
              $(".wrap, .input").toggleClass("active");
              $("input[type='text']").focus();
          });

      });
      window.addEventListener('load', function() {
          var loader = document.querySelector('.page-loader');
          loader.style.display = 'none';
      });

      document.addEventListener('DOMContentLoaded', function() {
          var refreshIcon = document.getElementById('refresh-icon');
          var quickSearch = document.getElementById('quick');
          var jewelryDesign = document.getElementById('jewelry');

          if (refreshIcon && quickSearch && jewelryDesign) {
              refreshIcon.addEventListener('click', function() {
                  console.log('Refresh icon clicked');

                  // Swap the elements
                  var quickSearchNextSibling = quickSearch.nextElementSibling;
                  var jewelryDesignNextSibling = jewelryDesign.nextElementSibling;

                  quickSearch.parentNode.insertBefore(jewelryDesign, quickSearchNextSibling);
                  jewelryDesign.parentNode.insertBefore(quickSearch, jewelryDesignNextSibling);
                  console.log('Elements swapped');
              });
          } else {
              console.error('One or more elements not found');
          }
      });

      $(document).ready(function() {
          function setupCheckboxHandler(groupCheckboxId, subCheckboxClass) {
              $(`#${groupCheckboxId}`).click(function() {
                  $(`.${subCheckboxClass}`).prop('checked', this.checked);
              });

              $(`.${subCheckboxClass}`).change(function() {
                  var check = ($(`.${subCheckboxClass}`).filter(":checked").length === $(`.${subCheckboxClass}`).length);
                  $(`#${groupCheckboxId}`).prop("checked", check);
              });
          }

          // Set up checkbox handlers for each group
          setupCheckboxHandler('best-checkbox', 'sub-checkbox');
          setupCheckboxHandler('best1-checkbox', 'sub-checkbox1');
          setupCheckboxHandler('best2-checkbox', 'sub-checkbox2');
          setupCheckboxHandler('best3-checkbox', 'sub-checkbox3');
          setupCheckboxHandler('best4-checkbox', 'sub-checkbox4');
          setupCheckboxHandler('best5-checkbox', 'sub-checkbox5');
      }); 
  </script>
</head>
<body>
  <div class="page-loader">
    <img src="assets/images/diamond.gif" alt="loading...">
  </div>
  <!-- <div class="overlay"></div> -->
   <header id="header">
      <?php 
        $this->load->view('layout/navbar');
      ?>
    </header>
    <main>
      <?php 
        if(isset($view) && !empty($view)){
          $this->load->view($view);
        }
      ?>
    </main>
    <footer id="footer" class="mt-5">
      <?php 
          $this->load->view('layout/footer.html');
      ?>
    </footer>
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="assets/js/script.js" type=""></script>
    <script src="assets/js/home.js"></script>
    <script type="text/javascript" src="assets/js/image_upload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
    <script src="assets/js/script.js" type=""></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/script/custom.js"></script>
    <script type="text/javascript" src="assets/script/main.js"></script>
    <script type="text/javascript" src='assets/app/cart.js'></script>
    <?php 
        if(isset($script) && !empty($script)){ ?>
            <script type="text/javascript" src='assets/app/<?php echo $script; ?>'></script>
    <?php } ?>
  </body>
</html> 
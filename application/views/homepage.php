<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo(isset($title) && !empty($title)?$title:'IGI Diamonds & Jewellery | Home')?> </title>
  <base href="<?php echo base_url();?>">
  <link rel="shortcut icon" href="assets/images/Favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/flag.css" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/ms-dropdown@4.0.3/dist/js/dd.min.js"></script>
  <script>
  window.addEventListener('load', function(){
    var loader = document.querySelector('.page-loader');
    loader.style.display = 'none';
  });
  </script>
</head>
	<body>
  <div class="page-loader">
   <img src="assets/images/diamond.gif" alt="loading...">
  </div>
  
  <div class="overlay"></div>
  <div class="utility-nav">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex">
        <p class="small"><i class="fa fa-envelope"></i> info@taaresitare.com |   
        </p>
        <p class="small pl-md-0 pl-5"><i class="fa fa-whatsapp" aria-hidden="true"></i>+91-9022223999
        </p>
      </div>
      <div class="col-md-4 d-flex">
        <div class="select_button mr-2" id="open_menu">
		<?php $this->load->library('Currency_lib');?>
          <button type="button" class="btn"> -- <?php  echo $this->session->userdata('geo_countryName');?>-English--<?php  echo html_entity_decode($this->session->userdata('geo_currencyCode'))."/".$this->session->userdata('geo_currencySymbol_utf');?>-- <i class="fa fa-caret-down" aria-hidden="true" style="
            color: #ff8080;"></i>
          </button>
        </div>
       <style>
            /* Style for the select element */
            .select-data {
                padding-left: 25px; /* Adjust as needed */
            }

            /* Style for the option elements */
            .select-data option {
                background-repeat: no-repeat;
                background-size: 20px; /* Adjust as needed */
                padding-left: 25px; /* Adjust as needed */
            }
        </style>

       <!--  <script type="text/javascript">
          // JavaScript to update the background image of the select element based on the selected option
            document.getElementById("country").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var imageUrl = selectedOption.getAttribute("data-image");
                alert(imageUrl);
                this.style.backgroundImage = "url('" + imageUrl + "')";
            });
        </script> -->
        <div class="open_menu" id="sub_content">
          <div class="content mt-2">
            <script>
              $(document).ready(function() {
              $("#countries").msDropdown();
              })
            </script>
            <i class="fa fa-globe"></i>
            <span>Prices are inclusive of shipping, import/custom duty, local taxes etc and in currency of country as per
            your device location and language as per device settings. Please change if required.</span>
            <label for="country">Shipping To:</label>
              <div class="select">
                <select title="Select Country" class="form-control" data-validation="required">
                    <option value="<?php echo(isset($customer[0]['country']) && !empty($customer[0]['country']))?$customer[0]['country']:''; ?>"><?php echo(isset($customer[0]['country_name']) && !empty($customer[0]['country_name']))?$customer[0]['country_name']:'Select Country'; ?>
                    <?php 
                        foreach($getshipcountries as $getshipcountry):?>
                        <option data-countryCode="<?php echo $getshipcountry['sortname'];?>" value="<?php echo $getshipcountry['id'];?>"><?php echo $getshipcountry['country_name'];?></option>
                    <?php endforeach; ?> 
                </select>
               
              </div>

            <label for="country">Language:</label>
            <div class="select">
              <select name="language" id="language" class="select-data">
                <option value="">Select Language</option>
               <?php 
                  foreach($language as $lang):?>
                      <option data-countryCode="<?php echo $lang['sortname'];?>" value="<?php echo $lang['id'];?>"><?php echo $lang['language_name'];?></option>
                <?php endforeach; ?>
                <!-- <option value="">Select Language</option>
                <option>English</option>
                <option>15 Most Spoken International Languages</option>
                <option>Chinese (Simplified)(中文（简体)</option>
                <option>Chinese (Traditional)(中文（繁體）)</option>
                <option>Spanish (Español)</option>
                <option>Arabic (عربية )</option>
                <option>Portuguese (Português)</option>
                <option>Indonesian/Malaysia Bahasa</option>
                <option>Japanese (日本語) </option>
                <option>Russian (русский)</option>
                <option>French (Français)</option>
                <option>German (Deutsch)</option>
                <option>Polish (Polski) </option>
                <option>Italian (Yoruba) </option>
                <option>Persian (رسی ) </option>
                <option>Turkish (Türk)</option>
                <option>Dutch (Nederlands)</option>
                <option></option>
                <option>10 Most Spoken Indian languages</option>
                <option>Hindi (हिन्दी)</option>
                <option>Telugu (తెలుగు)</option>
                <option>Marathi (मराठी)</option>
                <option>Tamil (தமிழ்)</option>
                <option>Bengali (বাঙালি)</option>
                <option>Punjabi/Lahnda (ਪੰਜਾਬੀ /ਹੰਢਾ)</option>
                <option>Kannada (ಕನ್ನಡ) </option>
                <option>Gujarati (ગુજરાતી)</option>
                <option>Malayalam (മലയാളം)</option> -->
              </select>
            </div>
            <label for="country">Currency:</label>
            <div class="select mb-3">
              <select id="locale-currency" name="locale-currency" class="select-data">
                  <?php 
                      foreach($getshipcountries as $getshipcountry):
                        //print_r($country);die;
                      ?>
                      <option data-countryCode="<?php echo $getshipcountry['sortname'];?>" value="<?php echo $getshipcountry['id'];?>"><?php echo $getshipcountry['country_name'].' '.$getshipcountry['currency_name'].'...'.$getshipcountry['currrency_symbol'];?></option>
                  <?php endforeach; ?> 
              <!--   <option class="heading_currency">Indian Rupees(Rs)..........₹</option>
                <option class="heading_currency">U.S. Dollar..........$</option>
                <option class="heading_currency">Chinees yuan..........¥</option>
                <option class="heading_currency">Spanish peseta..........€</option>
                <option class="heading_currency">Euro..........€</option>
                <option class="heading_currency">Japanese yen.......... ¥, 円, 圓</option>
                <option class="heading_currency">Pound sterling..........£</option>
                <option class="heading_currency">Australian dollar..........$, A$, AUD</option>
                <option class="heading_currency">Canadian dollar..........C$, Can$, $, CAD</option>
                <option class="heading_currency">Swiss franc..........Fr., CHf, SFr.</option>
                <option class="heading_currency">Maxican peso..........Mex$, $</option>
                <option class="heading_currency">Swedish krona..........kr</option> -->
              </select>
            </div>
            <button type="button" class="submit mb-3">Submit</button>
            <div class="where_we_ship">
              <p><i class="fa fa-plane pr-2"></i>We Ship World Wide</p>
              <p><i class="fa fa-info-circle pr-2"></i>Taaresitare Shipping Policies</p>
            </div>
          </div>
        </div>
        <div class="discount">
          <input type="text" value="" placeholder="Discount code" class="mr-2">
        </div>
      </div>
      <div class="col-md-4 text-right">
        <p class="small">Free shipping on total of $99 of all products</p>
      </div>
    </div>
  </div>
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        <script src="assets/js/script.js" type=""></script>
    <script src="assets/js/home.js"></script>
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
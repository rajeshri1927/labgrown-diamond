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
          <button type="button" class="btn"> -- India-English--Rupees-- <i class="fa fa-caret-down" aria-hidden="true" style="
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
               <!--  <select name="countries" id="countries" is="ms-dropdown" data-child-height="315"> -->
                  <!-- <option value='ad' data-image-css="flag ad" data-title="Andorra">Andorra</option>
                  <option value='ae' data-image-css="flag ae" data-title="United Arab Emirates">United Arab Emirates</option>
                  <option value='af' data-image-css="flag af" data-title="Afghanistan">Afghanistan</option>
                  <option value='ag' data-image-css="flag ag" data-title="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value='ai' data-image-css="flag ai" data-title="Anguilla">Anguilla</option>
                  <option value='al' data-image-css="flag al" data-title="Albania">Albania</option>
                  <option value='am' data-image-css="flag am" data-title="Armenia">Armenia</option>
                  <option value='an' data-image-css="flag an" data-title="Netherlands Antilles">Netherlands Antilles</option>
                  <option value='ao' data-image-css="flag ao" data-title="Angola">Angola</option>
                  <option value='aq' data-image-css="flag aq" data-title="Antarctica">Antarctica</option>
                  <option value='ar' data-image-css="flag ar" data-title="Argentina">Argentina</option>
                  <option value='as' data-image-css="flag as" data-title="American Samoa">American Samoa</option>
                  <option value='at' data-image-css="flag at" data-title="Austria">Austria</option>
                  <option value='au' data-image-css="flag au" data-title="Australia">Australia</option>
                  <option value='aw' data-image-css="flag aw" data-title="Aruba">Aruba</option>
                  <option value='ax' data-image-css="flag ax" data-title="Aland Islands">Aland Islands</option>
                  <option value='az' data-image-css="flag az" data-title="Azerbaijan">Azerbaijan</option>
                  <option value='ba' data-image-css="flag ba" data-title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value='bb' data-image-css="flag bb" data-title="Barbados">Barbados</option>
                  <option value='bd' data-image-css="flag bd" data-title="Bangladesh">Bangladesh</option>
                  <option value='be' data-image-css="flag be" data-title="Belgium">Belgium</option>
                  <option value='bf' data-image-css="flag bf" data-title="Burkina Faso">Burkina Faso</option>
                  <option value='bg' data-image-css="flag bg" data-title="Bulgaria">Bulgaria</option>
                  <option value='bh' data-image-css="flag bh" data-title="Bahrain">Bahrain</option>
                  <option value='bi' data-image-css="flag bi" data-title="Burundi">Burundi</option>
                  <option value='bj' data-image-css="flag bj" data-title="Benin">Benin</option>
                  <option value='bm' data-image-css="flag bm" data-title="Bermuda">Bermuda</option>
                  <option value='bn' data-image-css="flag bn" data-title="Brunei Darussalam">Brunei Darussalam</option>
                  <option value='bo' data-image-css="flag bo" data-title="Bolivia">Bolivia</option>
                  <option value='br' data-image-css="flag br" data-title="Brazil">Brazil</option>
                  <option value='bs' data-image-css="flag bs" data-title="Bahamas">Bahamas</option>
                  <option value='bt' data-image-css="flag bt" data-title="Bhutan">Bhutan</option>
                  <option value='bv' data-image-css="flag bv" data-title="Bouvet Island">Bouvet Island</option>
                  <option value='bw' data-image-css="flag bw" data-title="Botswana">Botswana</option>
                  <option value='by' data-image-css="flag by" data-title="Belarus">Belarus</option>
                  <option value='bz' data-image-css="flag bz" data-title="Belize">Belize</option>
                  <option value='ca' data-image-css="flag ca" data-title="Canada">Canada</option>
                  <option value='cc' data-image-css="flag cc" data-title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value='cd' data-image-css="flag cd" data-title="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                  <option value='cf' data-image-css="flag cf" data-title="Central African Republic">Central African Republic</option>
                  <option value='cg' data-image-css="flag cg" data-title="Congo">Congo</option>
                  <option value='ch' data-image-css="flag ch" data-title="Switzerland">Switzerland</option>
                  <option value='ci' data-image-css="flag ci" data-title="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory Coast)</option>
                  <option value='ck' data-image-css="flag ck" data-title="Cook Islands">Cook Islands</option>
                  <option value='cl' data-image-css="flag cl" data-title="Chile">Chile</option>
                  <option value='cm' data-image-css="flag cm" data-title="Cameroon">Cameroon</option>
                  <option value='cn' data-image-css="flag cn" data-title="China">China</option>
                  <option value='co' data-image-css="flag co" data-title="Colombia">Colombia</option>
                  <option value='cr' data-image-css="flag cr" data-title="Costa Rica">Costa Rica</option>
                  <option value='cs' data-image-css="flag cs" data-title="Serbia and Montenegro">Serbia and Montenegro</option>
                  <option value='cu' data-image-css="flag cu" data-title="Cuba">Cuba</option>
                  <option value='cv' data-image-css="flag cv" data-title="Cape Verde">Cape Verde</option>
                  <option value='cx' data-image-css="flag cx" data-title="Christmas Island">Christmas Island</option>
                  <option value='cy' data-image-css="flag cy" data-title="Cyprus">Cyprus</option>
                  <option value='cz' data-image-css="flag cz" data-title="Czech Republic">Czech Republic</option>
                  <option value='de' data-image-css="flag de" data-title="Germany">Germany</option>
                  <option value='dj' data-image-css="flag dj" data-title="Djibouti">Djibouti</option>
                  <option value='dk' data-image-css="flag dk" data-title="Denmark">Denmark</option>
                  <option value='dm' data-image-css="flag dm" data-title="Dominica">Dominica</option>
                  <option value='do' data-image-css="flag do" data-title="Dominican Republic">Dominican Republic</option>
                  <option value='dz' data-image-css="flag dz" data-title="Algeria">Algeria</option>
                  <option value='ec' data-image-css="flag ec" data-title="Ecuador">Ecuador</option>
                  <option value='ee' data-image-css="flag ee" data-title="Estonia">Estonia</option>
                  <option value='eg' data-image-css="flag eg" data-title="Egypt">Egypt</option>
                  <option value='eh' data-image-css="flag eh" data-title="Western Sahara">Western Sahara</option>
                  <option value='er' data-image-css="flag er" data-title="Eritrea">Eritrea</option>
                  <option value='es' data-image-css="flag es" data-title="Spain">Spain</option>
                  <option value='et' data-image-css="flag et" data-title="Ethiopia">Ethiopia</option>
                  <option value='fi' data-image-css="flag fi" data-title="Finland">Finland</option>
                  <option value='fj' data-image-css="flag fj" data-title="Fiji">Fiji</option>
                  <option value='fk' data-image-css="flag fk" data-title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                  <option value='fm' data-image-css="flag fm" data-title="Federated States of Micronesia">Federated States of Micronesia</option>
                  <option value='fo' data-image-css="flag fo" data-title="Faroe Islands">Faroe Islands</option>
                  <option value='fr' data-image-css="flag fr" data-title="France">France</option>
                  <option value='fx' data-image-css="flag fx" data-title="France, Metropolitan">France, Metropolitan</option>
                  <option value='ga' data-image-css="flag ga" data-title="Gabon">Gabon</option>
                  <option value='gb' data-image-css="flag gb" data-title="Great Britain (UK)">Great Britain (UK)</option>
                  <option value='gd' data-image-css="flag gd" data-title="Grenada">Grenada</option>
                  <option value='ge' data-image-css="flag ge" data-title="Georgia">Georgia</option>
                  <option value='gf' data-image-css="flag gf" data-title="French Guiana">French Guiana</option>
                  <option value='gh' data-image-css="flag gh" data-title="Ghana">Ghana</option>
                  <option value='gi' data-image-css="flag gi" data-title="Gibraltar">Gibraltar</option>
                  <option value='gl' data-image-css="flag gl" data-title="Greenland">Greenland</option>
                  <option value='gm' data-image-css="flag gm" data-title="Gambia">Gambia</option>
                  <option value='gn' data-image-css="flag gn" data-title="Guinea">Guinea</option>
                  <option value='gp' data-image-css="flag gp" data-title="Guadeloupe">Guadeloupe</option>
                  <option value='gq' data-image-css="flag gq" data-title="Equatorial Guinea">Equatorial Guinea</option>
                  <option value='gr' data-image-css="flag gr" data-title="Greece">Greece</option>
                  <option value='gs' data-image-css="flag gs" data-title="S. Georgia and S. Sandwich Islands">S. Georgia and S. Sandwich Islands</option>
                  <option value='gt' data-image-css="flag gt" data-title="Guatemala">Guatemala</option>
                  <option value='gu' data-image-css="flag gu" data-title="Guam">Guam</option>
                  <option value='gw' data-image-css="flag gw" data-title="Guinea-Bissau">Guinea-Bissau</option>
                  <option value='gy' data-image-css="flag gy" data-title="Guyana">Guyana</option>
                  <option value='hk' data-image-css="flag hk" data-title="Hong Kong">Hong Kong</option>
                  <option value='hm' data-image-css="flag hm" data-title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                  <option value='hn' data-image-css="flag hn" data-title="Honduras">Honduras</option>
                  <option value='hr' data-image-css="flag hr" data-title="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                  <option value='ht' data-image-css="flag ht" data-title="Haiti">Haiti</option>
                  <option value='hu' data-image-css="flag hu" data-title="Hungary">Hungary</option>
                  <option value='id' data-image-css="flag id" data-title="Indonesia">Indonesia</option>
                  <option value='ie' data-image-css="flag ie" data-title="Ireland">Ireland</option>
                  <option value='il' data-image-css="flag il" data-title="Israel">Israel</option>
                  <option value='in' data-image-css="flag in" data-title="India">India</option>
                  <option value='io' data-image-css="flag io" data-title="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value='iq' data-image-css="flag iq" data-title="Iraq">Iraq</option>
                  <option value='ir' data-image-css="flag ir" data-title="Iran">Iran</option>
                  <option value='is' data-image-css="flag is" data-title="Iceland">Iceland</option>
                  <option value='it' data-image-css="flag it" data-title="Italy">Italy</option>
                  <option value='jm' data-image-css="flag jm" data-title="Jamaica">Jamaica</option>
                  <option value='jo' data-image-css="flag jo" data-title="Jordan">Jordan</option>
                  <option value='jp' data-image-css="flag jp" data-title="Japan">Japan</option>
                  <option value='ke' data-image-css="flag ke" data-title="Kenya">Kenya</option>
                  <option value='kg' data-image-css="flag kg" data-title="Kyrgyzstan">Kyrgyzstan</option>
                  <option value='kh' data-image-css="flag kh" data-title="Cambodia">Cambodia</option>
                  <option value='ki' data-image-css="flag ki" data-title="Kiribati">Kiribati</option>
                  <option value='km' data-image-css="flag km" data-title="Comoros">Comoros</option>
                  <option value='kn' data-image-css="flag kn" data-title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value='kp' data-image-css="flag kp" data-title="Korea (North)">Korea (North)</option>
                  <option value='kr' data-image-css="flag kr" data-title="Korea (South)">Korea (South)</option>
                  <option value='kw' data-image-css="flag kw" data-title="Kuwait">Kuwait</option>
                  <option value='ky' data-image-css="flag ky" data-title="Cayman Islands">Cayman Islands</option>
                  <option value='kz' data-image-css="flag kz" data-title="Kazakhstan">Kazakhstan</option>
                  <option value='la' data-image-css="flag la" data-title="Laos">Laos</option>
                  <option value='lb' data-image-css="flag lb" data-title="Lebanon">Lebanon</option>
                  <option value='lc' data-image-css="flag lc" data-title="Saint Lucia">Saint Lucia</option>
                  <option value='li' data-image-css="flag li" data-title="Liechtenstein">Liechtenstein</option>
                  <option value='lk' data-image-css="flag lk" data-title="Sri Lanka">Sri Lanka</option>
                  <option value='lr' data-image-css="flag lr" data-title="Liberia">Liberia</option>
                  <option value='ls' data-image-css="flag ls" data-title="Lesotho">Lesotho</option>
                  <option value='lt' data-image-css="flag lt" data-title="Lithuania">Lithuania</option>
                  <option value='lu' data-image-css="flag lu" data-title="Luxembourg">Luxembourg</option>
                  <option value='lv' data-image-css="flag lv" data-title="Latvia">Latvia</option>
                  <option value='ly' data-image-css="flag ly" data-title="Libya">Libya</option>
                  <option value='ma' data-image-css="flag ma" data-title="Morocco">Morocco</option>
                  <option value='mc' data-image-css="flag mc" data-title="Monaco">Monaco</option>
                  <option value='md' data-image-css="flag md" data-title="Moldova">Moldova</option>
                  <option value='mg' data-image-css="flag mg" data-title="Madagascar">Madagascar</option>
                  <option value='mh' data-image-css="flag mh" data-title="Marshall Islands">Marshall Islands</option>
                  <option value='mk' data-image-css="flag mk" data-title="Macedonia">Macedonia</option>
                  <option value='ml' data-image-css="flag ml" data-title="Mali">Mali</option>
                  <option value='mm' data-image-css="flag mm" data-title="Myanmar">Myanmar</option>
                  <option value='mn' data-image-css="flag mn" data-title="Mongolia">Mongolia</option>
                  <option value='mo' data-image-css="flag mo" data-title="Macao">Macao</option>
                  <option value='mp' data-image-css="flag mp" data-title="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value='mq' data-image-css="flag mq" data-title="Martinique">Martinique</option>
                  <option value='mr' data-image-css="flag mr" data-title="Mauritania">Mauritania</option>
                  <option value='ms' data-image-css="flag ms" data-title="Montserrat">Montserrat</option>
                  <option value='mt' data-image-css="flag mt" data-title="Malta">Malta</option>
                  <option value='mu' data-image-css="flag mu" data-title="Mauritius">Mauritius</option>
                  <option value='mv' data-image-css="flag mv" data-title="Maldives">Maldives</option>
                  <option value='mw' data-image-css="flag mw" data-title="Malawi">Malawi</option>
                  <option value='mx' data-image-css="flag mx" data-title="Mexico">Mexico</option>
                  <option value='my' data-image-css="flag my" data-title="Malaysia">Malaysia</option>
                  <option value='mz' data-image-css="flag mz" data-title="Mozambique">Mozambique</option>
                  <option value='na' data-image-css="flag na" data-title="Namibia">Namibia</option>
                  <option value='nc' data-image-css="flag nc" data-title="New Caledonia">New Caledonia</option>
                  <option value='ne' data-image-css="flag ne" data-title="Niger">Niger</option>
                  <option value='nf' data-image-css="flag nf" data-title="Norfolk Island">Norfolk Island</option>
                  <option value='ng' data-image-css="flag ng" data-title="Nigeria">Nigeria</option>
                  <option value='ni' data-image-css="flag ni" data-title="Nicaragua">Nicaragua</option>
                  <option value='nl' data-image-css="flag nl" data-title="Netherlands">Netherlands</option>
                  <option value='no' data-image-css="flag no" data-title="Norway">Norway</option>
                  <option value='np' data-image-css="flag np" data-title="Nepal">Nepal</option>
                  <option value='nr' data-image-css="flag nr" data-title="Nauru">Nauru</option>
                  <option value='nu' data-image-css="flag nu" data-title="Niue">Niue</option>
                  <option value='nz' data-image-css="flag nz" data-title="New Zealand (Aotearoa)">New Zealand (Aotearoa)</option>
                  <option value='om' data-image-css="flag om" data-title="Oman">Oman</option>
                  <option value='pa' data-image-css="flag pa" data-title="Panama">Panama</option>
                  <option value='pe' data-image-css="flag pe" data-title="Peru">Peru</option>
                  <option value='pf' data-image-css="flag pf" data-title="French Polynesia">French Polynesia</option>
                  <option value='pg' data-image-css="flag pg" data-title="Papua New Guinea">Papua New Guinea</option>
                  <option value='ph' data-image-css="flag ph" data-title="Philippines">Philippines</option>
                  <option value='pk' data-image-css="flag pk" data-title="Pakistan">Pakistan</option>
                  <option value='pl' data-image-css="flag pl" data-title="Poland">Poland</option>
                  <option value='pm' data-image-css="flag pm" data-title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option value='pn' data-image-css="flag pn" data-title="Pitcairn">Pitcairn</option>
                  <option value='pr' data-image-css="flag pr" data-title="Puerto Rico">Puerto Rico</option>
                  <option value='ps' data-image-css="flag ps" data-title="Palestinian Territory">Palestinian Territory</option>
                  <option value='pt' data-image-css="flag pt" data-title="Portugal">Portugal</option>
                  <option value='pw' data-image-css="flag pw" data-title="Palau">Palau</option>
                  <option value='py' data-image-css="flag py" data-title="Paraguay">Paraguay</option>
                  <option value='qa' data-image-css="flag qa" data-title="Qatar">Qatar</option>
                  <option value='re' data-image-css="flag re" data-title="Reunion">Reunion</option>
                  <option value='ro' data-image-css="flag ro" data-title="Romania">Romania</option>
                  <option value='ru' data-image-css="flag ru" data-title="Russian Federation">Russian Federation</option>
                  <option value='rw' data-image-css="flag rw" data-title="Rwanda">Rwanda</option>
                  <option value='sa' data-image-css="flag sa" data-title="Saudi Arabia">Saudi Arabia</option>
                  <option value='sb' data-image-css="flag sb" data-title="Solomon Islands">Solomon Islands</option>
                  <option value='sc' data-image-css="flag sc" data-title="Seychelles">Seychelles</option>
                  <option value='sd' data-image-css="flag sd" data-title="Sudan">Sudan</option>
                  <option value='se' data-image-css="flag se" data-title="Sweden">Sweden</option>
                  <option value='sg' data-image-css="flag sg" data-title="Singapore">Singapore</option>
                  <option value='sh' data-image-css="flag sh" data-title="Saint Helena">Saint Helena</option>
                  <option value='si' data-image-css="flag si" data-title="Slovenia">Slovenia</option>
                  <option value='sj' data-image-css="flag sj" data-title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option value='sk' data-image-css="flag sk" data-title="Slovakia">Slovakia</option>
                  <option value='sl' data-image-css="flag sl" data-title="Sierra Leone">Sierra Leone</option>
                  <option value='sm' data-image-css="flag sm" data-title="San Marino">San Marino</option>
                  <option value='sn' data-image-css="flag sn" data-title="Senegal">Senegal</option>
                  <option value='so' data-image-css="flag so" data-title="Somalia">Somalia</option>
                  <option value='sr' data-image-css="flag sr" data-title="Suriname">Suriname</option>
                  <option value='st' data-image-css="flag st" data-title="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value='su' data-image-css="flag su" data-title="USSR (former)">USSR (former)</option>
                  <option value='sv' data-image-css="flag sv" data-title="El Salvador">El Salvador</option>
                  <option value='sy' data-image-css="flag sy" data-title="Syria">Syria</option>
                  <option value='sz' data-image-css="flag sz" data-title="Swaziland">Swaziland</option>
                  <option value='tc' data-image-css="flag tc" data-title="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option value='td' data-image-css="flag td" data-title="Chad">Chad</option>
                  <option value='tf' data-image-css="flag tf" data-title="French Southern Territories">French Southern Territories</option>
                  <option value='tg' data-image-css="flag tg" data-title="Togo">Togo</option>
                  <option value='th' data-image-css="flag th" data-title="Thailand">Thailand</option>
                  <option value='tj' data-image-css="flag tj" data-title="Tajikistan">Tajikistan</option>
                  <option value='tk' data-image-css="flag tk" data-title="Tokelau">Tokelau</option>
                  <option value='tl' data-image-css="flag tl" data-title="Timor-Leste">Timor-Leste</option>
                  <option value='tm' data-image-css="flag tm" data-title="Turkmenistan">Turkmenistan</option>
                  <option value='tn' data-image-css="flag tn" data-title="Tunisia">Tunisia</option>
                  <option value='to' data-image-css="flag to" data-title="Tonga">Tonga</option>
                  <option value='tp' data-image-css="flag tp" data-title="East Timor">East Timor</option>
                  <option value='tr' data-image-css="flag tr" data-title="Turkey">Turkey</option>
                  <option value='tt' data-image-css="flag tt" data-title="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value='tv' data-image-css="flag tv" data-title="Tuvalu">Tuvalu</option>
                  <option value='tw' data-image-css="flag tw" data-title="Taiwan">Taiwan</option>
                  <option value='tz' data-image-css="flag tz" data-title="Tanzania">Tanzania</option>
                  <option value='ua' data-image-css="flag ua" data-title="Ukraine">Ukraine</option>
                  <option value='ug' data-image-css="flag ug" data-title="Uganda">Uganda</option>
                  <option value='uk' data-image-css="flag uk" data-title="United Kingdom">United Kingdom</option>
                  <option value='um' data-image-css="flag um" data-title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                  <option value='us' data-image-css="flag us" data-title="United States">United States</option>
                  <option value='uy' data-image-css="flag uy" data-title="Uruguay">Uruguay</option>
                  <option value='uz' data-image-css="flag uz" data-title="Uzbekistan">Uzbekistan</option>
                  <option value='va' data-image-css="flag va" data-title="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                  <option value='vc' data-image-css="flag vc" data-title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                  <option value='ve' data-image-css="flag ve" data-title="Venezuela">Venezuela</option>
                  <option value='vg' data-image-css="flag vg" data-title="Virgin Islands (British)">Virgin Islands (British)</option>
                  <option value='vi' data-image-css="flag vi" data-title="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                  <option value='vn' data-image-css="flag vn" data-title="Viet Nam">Viet Nam</option>
                  <option value='vu' data-image-css="flag vu" data-title="Vanuatu">Vanuatu</option>
                  <option value='wf' data-image-css="flag wf" data-title="Wallis and Futuna">Wallis and Futuna</option>
                  <option value='ws' data-image-css="flag ws" data-title="Samoa">Samoa</option>
                  <option value='ye' data-image-css="flag ye" data-title="Yemen">Yemen</option>
                  <option value='yt' data-image-css="flag yt" data-title="Mayotte">Mayotte</option>
                  <option value='yu' data-image-css="flag yu" data-title="Yugoslavia (former)">Yugoslavia (former)</option>
                  <option value='za' data-image-css="flag za" data-title="South Africa">South Africa</option>
                  <option value='zm' data-image-css="flag zm" data-title="Zambia">Zambia</option>
                  <option value='zr' data-image-css="flag zr" data-title="Zaire (former)">Zaire (former)</option>
                  <option value='zw' data-image-css="flag zw" data-title="Zimbabwe">Zimbabwe</option> -->
              <!--   </select> -->
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
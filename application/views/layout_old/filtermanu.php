<?php header('Cache-Control: no cache');?>
<div class="filter_part">
   <div class="tabs">
      <nav class="tab-nav">
         <ul class="SMN_effect-9">
             <li><span data-href="#quick_search" data-hover="Quick Search - White LG Diamonds">Quick Search - White LG Diamonds
               </span>
             </li>
             <li><span data-href="#white_lbd" data-hover="Advance Search - White LG Diamonds">Advance Search - White LG Diamonds </span>
             </li>
             <li><span data-href="#fancy_lbd" data-hover="Fancy Color LG Diamonds"> Fancy Color LG Diamonds </span></li>
             <li><span data-href="#small_jewelry" data-hover="Price List For Small Diamonds For Jewellery Making">Price List For Small Diamonds For Jewellery Making
               </span></li>
             <li><span data-href="#jewelry_design" data-hover="Jewellery Design">Jewellery Design</span></li>
             <li><span data-href="#jewelry_cost" data-hover="Jewellery Costing">Jewellery Costing </span></li>
             <li><span data-href="#review" data-hover="Google Review">Google Review</span></li>
         </ul>
      </nav>
      <!------nav end--------> 
      <div class="tab" id="home"></div>
      <div class="tab" id="quick_search">
         <form name="quick_search" action="get-products-quick-filter" method="POST">
            <div class="cate_bread_gia mb-2">
               <div id="boxThis">
                  <ul id="breadcrumb"></ul>
               </div>
               <div class="btn-group cate_search_gia mr-2">
               <div>
               <button class="diam-btn btn-style702" type="submit" id="quick_search_btn">Show Diamonds Availability
               </button>
               </div>
               </div>
            </div>
            <hr>
               <h3>QUALITY</h3>
               <div class="d-flex">
                  <?php 
                     if(isset($quality) && !empty($quality)){
                        foreach($quality as $data){ ?>
                        <div class="quick_breadcrumb">
                           <label class="letest_design"><a><?php echo $data['quality_name'];?>?</a>
                              <input type="checkbox" name="quality[]" value="<?php echo $data['quality_id'] . '|' . $data['quality_name'];?>" class="myCheckbox" data-target="<?php echo $data['quality_name'];?>">
                              <span class="checkmark"></span>
                           </label>
                           <!-- <input type="checkbox" class="myCheckbox"  name="quality[]" value="<?php //echo $data['quality_id'] . '|' . $data['quality_name'];?>" id="<?php //echo $data['quality_name'];?>" data-color-from="<?php //echo $data['quality_color_from'];?>" data-clarity-from="<?php //echo $data['quality_clarity_from'];?>"  data-target="<?php //echo $data['quality_name'];?>">
                           <label class=""><a><?php //echo $data['quality_name'];?></a></label> -->
                        </div>
                     <?php
                        } }
                     ?>
               </div>
            <hr>
            <div class="row mb-4">
               <div class="col-md-3 mb-2">
                  <h3 class="mt-1">PRICE RANGE</h3>
                  <div class="sele mt-1">
                     <?php 
                        if(isset($priceranges) && !empty($priceranges)){
                           foreach($priceranges as $index => $pricerange){ 
                        ?>
                     <div class="quick_breadcrumb">
                        <label class="letest_design"><a><?php echo $pricerange['price_range'];?></a>
                           <input type="checkbox" class="myCheckbox" name="price_range[]" value="<?php echo $pricerange['price_range'];?>" data-target="<?php echo $pricerange['price_range']; ?>">
                           <span class="checkmark"></span>
                        </label>
                     </div>
                     <?php } } ?>
                     <div class="quick_breadcrumb">
                        <label class="letest_design"> <a>View All</a>
                           <input type="checkbox" class="myCheckbox" name="price_range[]" value="total_sales_price" data-target="view_all_price">
                           <span class="checkmark"></span>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-md-2 mb-2">
                  <h3 class="mt-1">
                     <a class="mymultiplediv" id="carat" style="color:#ff8080;" title="100 Cents = 1 Carat">Carat Weight ?
                     </a>
                  </h3>
                  <div class="mydiv" id="divcarat">
                     <div class="carat">
                        <img src="assets/images/lb/size_wise_diamond.jpg" class="img-fluid">
                     </div>
                  </div>
                  <div class="asperwe mt-2">
                     <!-- HTML code for the input fields -->
                     <input class="asPerB" id="YouBdg1" name="size[]" type="text" placeholder="0.10" oninput="validateInput(this)">
                     to
                     <input class="asPerB" id="YouBdg2" name="size[]" type="text" placeholder="0.20" oninput="validateInput(this)">
                     <!-- JavaScript code to validate input -->
                     <script>
                        function validateInput(input) {
                             var value = parseFloat(input.value);
                             if (value <= 0.10) {
                                 input.setCustomValidity('Value must be greater than 0.10');
                                 //window.location.href = window.location.href; 
                                 return false;
                             } else {
                                 input.setCustomValidity('');
                             }
                        }
                     </script>
                  </div>
                  <div class="sele mt-1">
                  <?php 
                     if(isset($caratweight) && !empty($caratweight)){
                        foreach($caratweight as $index => $size){ 
                  ?>
                  <div class="quick_breadcrumb">
                     <label class="letest_design"><?php echo $size['carat_weight'];?>
                        <input type="checkbox" name="size[]" class="myCheckbox" value="<?php echo $size['carat_weight'];?>" data-target="<?php echo $size['carat_weight'];?>">
                        <span class="checkmark"></span>
                     </label>
                  </div>
                  <?php } } ?>
                  </div>
               </div>
               <div class="col-md-7 mb-2">
                  <div class="d-md-block d-sm-none d-none">
                     <h3>SHAPE</h3>
                     <div class="shape_image_row">
                        <!-- <div class="shape shbr">
                           <span>Any</span>
                           <div class="shape_image any">
                              Shape
                           </div>
                           <input type="checkbox" name="shape[]" value="Other" class="myCheckbox" data-target="Other">
                        </div> -->
                        <?php 
                           if(isset($shapes) && !empty($shapes)){
                              foreach($shapes as $index => $shape){ 
                        ?>
                        <div class="shape shbr quick_breadcrumb">
                           <span><?php echo $shape['shape_name'];?></span>
                           <div class="shape_image" title="<?php echo $shape['shape_name'];?>">
                              <?php 
                                 $image = $shape['system_file_name'];
                                 if($image){ ?>
                                    <img src="assets/uploads/shapes/<?php echo $image;?>" class="img-fluid">
                              <?php 
                                 }else{?>
                                     <span><?php echo $shape['shape_name'];?></span>
                              <?php }
                              ?>
                           </div>
                           <input type="checkbox" name="shape[]" value="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="myCheckbox" data-target="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
                        </div>
                        <?php } } ?>
                        <button class="toggle-button" type="button" data-target="labshape"><i class="fa fa-caret-down"></i></button>
                     </div>
                     <div data-toggle="labshape" style="display:none;">
                        <div class="shape_image_row">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <!------quick search end--------->
      <div class="tab" id="white_lbd">
         <form method="post" action="get-products-advance-filter-data" id="advance_search" name="advance_search" >
               <h4 class="well-sm">Advance Search <i class="fa fa-caret-down"></i></h4>
               <div class="advance_search_drop" style="display: none;height: 660px;">
               <div class="cate_bread_gia mb-2">        
               <div id="boxThis">
                  <ul id="breadcrumb_advance_filter"></ul>
               </div>                                                         
               <div class="asperbut">                              
                   <button type="submit" class="btn" name="search">Show Diamonds Availability
               </button>
               </div>
               </div>
               <select class="contryselect advance_checkbox" id="country_name" name="country_name" class="form-control" data-validation="required">
                  <option value="<?php echo(isset($customer[0]['country']) && !empty($customer[0]['country']))?$customer[0]['country']:''; ?>"><?php echo(isset($customer[0]['country_name']) && !empty($customer[0]['country_name']))?$customer[0]['country_name']:'Select Country'; ?></option>
                  <?php 
                     foreach($countries as $country):?>
                     <option value="<?php echo $country['country_name'];?>"><?php echo $country['country_name'];?></option>
                  <?php endforeach; ?> 
               </select>
               <div class="row">
                  <div class="col-md-6 border-right">
                     <div class="advance_search mb-4">
                        <table class="table-ideal mb-2">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>Ex/Ideal</th>
                                 <th>Excellent</th>
                                 <th>Very-Good</th>
                                 <th>Good</th>
                                 <th>Fair</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Cut</td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="cut[]" value="ExIdeal" data-target="ExIdeal">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="cut[]" value="Excellent" data-target="Excellent">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="cut[]" value="VeryGood" data-target="VeryGood">
                                       </div>
                                    </td>
                                    <td>
                                      <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="cut[]" value="Good" data-target="Good">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="cut[]" value="Fair" data-target="Fair">
                                       </div>
                                    </td>
                              </tr>
                              <tr>
                                 <td>Polish:</td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="polish[]" value="ExIdeal" data-target="ExIdeal">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="polish[]" value="Excellent" data-target="Excellent">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="polish[]" value="VeryGood" data-target="VeryGood">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="polish[]" value="Good" data-target="Good">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="polish[]" value="Fair"  data-target="Fair">
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                 <td>Symmetry:</td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="symmetry[]" value="ExIdeal" data-target="ExIdeal">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="symmetry[]" value="Excellent" data-target="Excellent">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="symmetry[]" value="VeryGood" data-target="VeryGood">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="symmetry[]" value="Good" data-target="Good">
                                       </div>
                                    </td>
                                    <td>
                                       <div class="filter_advance">
                                          <input class="chk5 advance_checkbox" type="checkbox" name="symmetry[]" value="Fair" data-target="Fair">
                                       </div>
                                    </td>
                                 </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <strong class="flu">Certification</strong>
                     <div class="certi">
                        <div class="gia filter_advance">
                           <span>GIA</span>  
                           <input type="checkbox" class="advance_checkbox"  name="lab[]" value="GIA" id="lab"  data-target="GIA">
                        </div>
                        <div class="gia filter_advance">
                           <span>HRD</span>
                           <input type="checkbox" class="advance_checkbox"  name="lab[]" id="lab" value="HRD" size="2" data-target="HRD">
                        </div>
                        <div class="gia filter_advance">
                           <span>IGI</span>
                           <input type="checkbox" class="advance_checkbox"  name="lab[]" id="lab" value="IGI" size="2" data-target="IGI">
                        </div>
                        <div class="gia filter_advance">
                           <span>AGS</span>
                           <input type="checkbox"  class="advance_checkbox"  name="lab[]" id="lab" value="AGS" size="2" data-target="AGS">
                        </div>
                        <div class="gia filter_advance">
                           <span>OTHER</span>
                           <input type="checkbox"  class="advance_checkbox"  name="lab[]" id="lab" value="OTHER" size="2" data-target="OTHER">
                        </div>
                     </div>
                     <strong class="flu"></strong>
                     <div class="certi">
                        <div class="gia filter_advance">
                           <span>H & A</span>
                           <input type="checkbox"  class="advance_checkbox"  name="lab[]" id="lab" value="H &amp; A" size="2" data-target="H &amp; A">
                        </div>
                        <div class="gia filter_advance">
                           <span>NO BGM</span>            
                           <input type="checkbox"  class="advance_checkbox"  name="lab[]" id="lab" value="No BGM" size="5" data-target="No BGM">
                        </div>
                        <div class="gia filter_advance">
                           <span>EYE CLEAN</span>
                           <input type="checkbox"  class="advance_checkbox"  name="lab[]" id="lab" value="Eye Clean" size="5" data-target="Eye Clean">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12">
                     <strong class="flu">Fluorescence:</strong>
                     <div class="">
                        <div class="certi">
                        <div class="gia filter_advance">
                           <span>Faint/Slight</span> 
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="Faint" size="7" data-target="Faint">
                        </div> 
                        <div class="gia filter_advance">                                       
                           <span>Very Slight </span>
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="Very Slight" size="7" data-target="Very Slight">
                        </div>
                        <div class="gia filter_advance">
                           <span>Medium </span>
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="Medium" size="7" data-target="Medium">
                        </div>
                        <div class="gia filter_advance">
                           <span>Strong </span>
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="Strong" size="7" data-target="Strong">
                        </div>
                        <div class="gia filter_advance">                                         
                           <span>Very Strong</span>
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="Very Strong" size="7" data-target="Very Strong">
                        </div>
                        <div class="gia filter_advance">
                           <span>None</span>
                           <input type="checkbox"  class="advance_checkbox"  name="fluor_intensity[]" id="fluor_intensity" value="None" size="7" data-target="None">
                        </div>
                        </div>
                     </div>
                     <!-- <div class="">
                        <div class="certi">
                           <span>Strong </span>
                           <span>Very Strong</span>
                           <span>None</span>
                        </div>
                     </div> -->
                  </div>
                  <hr>
                  <div class="col-md-4">
                     <strong class="flu">Depth</strong>
                     <div class="asperbude filter_advance">
                        <style>
                              input[type=number]::-webkit-inner-spin-button, 
                              input[type=number]::-webkit-outer-spin-button { 
                                 -webkit-appearance: none;
                                 -moz-appearance: none;
                                 appearance: none;
                                 margin: 0; 
                              }
                        </style>
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="number" name="depth_percent_from">
                        % to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="number" name="depth_percent_to"> %
                     </div>
                  </div>
                  <div class="col-md-4">
                     <strong class="flu">Table</strong>
                     <div class="asperbude filter_advance">
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="number" name="table_percent_from">
                        % to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="number" name="table_percent_to"> %
                     </div>
                  </div>
                  <div class="col-md-4">
                     <strong class="flu">Ratio</strong>
                     <div class="asperbude filter_advance">
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="number" name="ratio_percent_to"> 
                        % to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="number" name="ratio_percent_from"> %
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12">
                     <strong class="flu">Measurement</strong>
                     <div class="aspermesu mt-3 filter_advance">
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="text" name="ratio_percent_to">
                        <small>L</small> to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="text" name="ratio_percent_from">
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="text" name="ratio_percent_to">
                        <small>W</small> to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="text" name="ratio_percent_from">
                        <input class="asPerB advance_checkbox" id="YouBdg1" type="text" name="ratio_percent_to">
                        <small>D</small> to
                        <input class="asPerB advance_checkbox" id="YouBdg2" type="text" name="ratio_percent_from">
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-7">
                     <strong class="flu">Treatment</strong>
                     <div class="certi">
                     <div class="gia filter_advance">
                        <span>Clarity Enhanced</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="treatment[]" id="as_grown" value="As Grown" size="7" data-target="As Grown">
                     </div>
                     <div class="gia filter_advance">
                        <span>Color Enhanced</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="treatment[]" id="treated" value="Treated" size="7" data-target="Treated">
                     </div>
                     <div class="gia filter_advance">
                        <span>Drill</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="treatment[]" id="unknown" value="Unknown" size="7" data-target="Unknown">
                     </div>
                  </div>
                  </div>
                  <div class="col-md-3">
                     <strong class="flu">Growth Type</strong>
                     <div class="certi">
                     <div class="gia filter_advance">
                        <span title="Chemival Vapor Deposition">CVD</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="growth[]" id="cvd" value="CVD" size="7" data-target="CVD">
                     </div>
                     <div class="gia filter_advance">
                        <span title="High Pressure High Tamperature">HPHT</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="growth[]" id="HPHT" value="HPHT" size="7"  data-target="HPHT">
                     </div>
                     <div class="gia filter_advance">
                        <span>OTHER</span>
                        <input type="checkbox" class="text-center advance_checkbox" name="growth[]" id="Other" value="Other" size="7" data-target="Other" >
                     </div>
                     </div>
                  </div>
               </div>
                  <!----row--->
            </div>
         </form>
         <form id="white_lbd" action="get-products-advance-filter" method="POST">
            <div class="cate_bread_gia mb-2">
               <div id="boxThis">
                  <ul id="breadcrumb_advance"></ul>
               </div>
               <div class="btn-group cate_search_gia mr-2">
               <div>
               <button class="diam-btn btn-style702" type="submit" id="quick_search_btn">Show Diamonds Availability
               </button>
               </div>
               </div>
            </div>
            <hr>
            <div class="height_fix">
               <div class="row">
                  <div class="col-md-3 mb-2">
                     <h3 class="mt-1">PRICE RANGE</h3>
                     <div class="sele mt-1">
                        <?php 
                           if(isset($priceranges) && !empty($priceranges)){
                              foreach($priceranges as $index => $pricerange){ 
                           ?>
                           <div class="advance_breadcrumb">
                              <label class="letest_design"><a><?php echo $pricerange['price_range'];?></a>
                                 <input type="checkbox" id="pricerange"  class="myCheckbox_advance" name="price_range[]" value="<?php echo $pricerange['price_range'];?>" data-target="<?php echo $pricerange['price_range'];?>">
                                 <span class="checkmark"></span>
                              </label>
                           </div>
                        <?php } } ?>
                        <div class="advance_breadcrumb">
                           <label class="letest_design"> <a>View All</a>
                              <input type="checkbox" class="myCheckbox_advance" name="price_range[]" value="total_sales_price" data-target="view_all_price">
                              <span class="checkmark"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2 mb-2">
                     <h3 class="mt-1">
                     <a class="mymultiplediv" id="carat_1" style="color:#ff8080;" title="100 Cents = 1 Carat">Carat Weight ?
                     </a>
                     </h3>
                     <div class="mydiv" id="divcarat_1">
                        <div class="carat">
                           <img src="assets/images/lb/size_wise_diamond.jpg" class="img-fluid">
                        </div>
                     </div>
                     <div class="asperwe mt-2">
                     <input class="asPerB" id="YouBdg1" type="text" placeholder="0.10">
                     to
                     <input class="asPerB" id="YouBdg2" type="text" placeholder="0.20">
                  </div>
                     <div class="sele mt-1">
                        <?php 
                           if(isset($caratweight) && !empty($caratweight)){
                              foreach($caratweight as $index => $size){ 
                        ?>
                        <div class="advance_breadcrumb">
                           <label class="letest_design"><?php echo $size['carat_weight'];?>
                              <input type="checkbox" name="size[]" class="myCheckbox_advance" value="<?php echo $size['carat_weight'];?>" data-target="<?php echo $size['carat_weight'];?>">
                              <span class="checkmark"></span>
                           </label>
                        </div>
                        <?php } } ?> 
                  </div> 
               </div>
               <div  class="col-md-7 mb-2">
                  <div class="row_right d-md-block d-sm-none d-none">
                     <div class="shape_heading">
                        <strong>Select Shape</strong>
                     </div>
                     <div class="shape_image_row">
                     <!-- <div class="shape shbr">
                        <span   >Any</span>
                        <div class="shape_image any">
                           Shape
                        </div>
                        <input type="checkbox" name="shape[]" value="Other" class="myCheckbox_advance" data-target="Other">
                     </div> -->
                     <?php 
                        // if(isset($shapes) && !empty($shapes)){
                        //    foreach($shapes as $index => $shape){ 
                     ?>
<!--                         <div class="shape shbr quick_breadcrumb">
                           <span><?php //echo $shape['shape_name'];?></span>
                           <div class="shape_image" title="<?php //echo $shape['shape_name'];?>">
                              <?php 
                                 //$image = $shape['system_file_name'];
                                 //if($image){ ?>
                                    <img src="assets/uploads/shapes/<?php echo $image;?>" class="img-fluid">
                              <?php 
                                 //}else{?>
                                     <span><?php //echo $shape['shape_name'];?></span>
                              <?php //}
                              ?>
                           </div>
                           <input type="checkbox" name="shape[]" value="<?php //echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="myCheckbox_advance" data-target="<?php //echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
                        </div>
 -->                     <?php //} } ?>
                     <?php 
                        if(isset($shapes) && !empty($shapes)){
                           foreach($shapes as $index => $shape){ 
                     ?>
                     <div class="shape shbr advance_breadcrumb" data-target="cobr">
                        <span><?php echo $shape['shape_name'];?></span>
                        <div class="shape_image" title="<?php echo $shape['shape_name'];?>">
                            <?php 
                              $image = $shape['system_file_name'];
                              if($image){ ?>
                                 <img src="assets/uploads/shapes/<?php echo $shape['system_file_name'];?>" id="l<?php echo strtolower($shape['shape_name']);?>" class="img-fluid">
                              <?php }else{ ?>
                                    <span><?php echo $shape['shape_name'];?></span>
                              <?php } ?>
                           <input type="checkbox" name="shape[]" value="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="myCheckbox_advance" data-target="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
                        </div>
                     </div>
                     <?php } } ?>
                     <button class="toggle-button" type="button" data-target="labsh">
                     <i class="fa fa-caret-down"></i></button>
               </div>
               <div data-toggle="labsh" style="display:none;">
                  <div class="shape_image_row">
               </div>
            </div>
            <div class="shape_heading mt-5">
               <strong>Select Color</strong>
            </div>
            <div class="shape_section">
               <!-- <div class="shape">
                  <span>Any</span>
                  <div class="shape_image any">
                     Color
                  </div>
                  <input type="checkbox" name="color[]" value="Z" class="myCheckbox_advance" data-target="Z">
               </div> -->
               <?php 
                  if(isset($colors) && !empty($colors)){
                     foreach($colors as $index => $color){ ?>
                     <div class="shape_color shbr advance_breadcrumb" data-target="cobr">
                        <span><?php echo $color['color_name'];?></span>
                        <div class="color_type">
                           <img src="assets/uploads/color/<?php echo $color['system_file_name'];?>" class="img-fluid mymultiplediv" id="l<?php echo strtolower($color['color_name']);?>">
                           <input type="checkbox" name="color[]" value="<?php echo $color['color_name'];?>"  class="myCheckbox_advance" data-target="<?php echo $color['color_name'];?>">
                           <div class="color_explain mydiv" id="divl<?php echo strtolower($color['color_name']);?>" style="display: none;">
                              <p><?php echo $color['color_desc'];?></p>
                           </div>
                        </div>
                     </div>
               <?php } } ?>
            </div>
            <div class="shape_heading mt-3">
               <strong>SELECT CLARITY</strong>
            </div>
            <div class="select_clerity_row">
               <!-- <div class="shape">
                  <span>Any</span>
                  <div class="shape_image any">
                     Clarity
                  </div>
                  <input type="checkbox"  name="clarity[]" value="Other"  class="myCheckbox_advance" data-target="Other">
               </div> -->
               <?php 
                  if(isset($clarity) && !empty($clarity)){
                     foreach($clarity as $index => $clarityData){ 
               ?>
               <div class="round_image clarity">
                  <span class="mymultiplediv" id="flv1"><?php echo $clarityData['clarity_name'];?></span>
                  <div class="shape_image advance_breadcrumb">
                     <img src="assets/uploads/clarity/<?php echo $clarityData['system_file_name'];?>" class="mymultiplediv img-fluid" id="fl1">
                     <input type="checkbox"  name="clarity[]" value="<?php echo $clarityData['clarity_name'];?>"  class="myCheckbox_advance" data-target="<?php echo $clarityData['clarity_name'];?>">
                     <div class="fl_video mydiv" id="divflv1" style="display: none;">
                        <div class="row">
                           <div class="col-md-4">
                              <video width="170" height="170" controls="controls" loop="" autoplay="">
                                 <source src="assets/uploads/clarity/<?php echo $clarityData['system_file_video'];?>" type="video/mp4">
                              </video>
                           </div>
                           <div class="col-md-8">
                              <b><?php echo $clarityData['clarity_title'];?></b>
                              <p><?php echo $clarityData['clarity_desc'];?></p>
                           </div>
                        </div>
                     </div>
                     <div class="fl_detail mydiv" id="divfl1" style="display: none;">
                        <div class="row">
                           <div class="col-md-4">
                              <img src="assets/images/1 FL IMAGE.jpg" class="img-fluid">
                           </div>
                           <div class="col-md-8">
                              <b><?php echo $clarityData['clarity_title'];?></b>
                              <p><?php echo $clarityData['clarity_desc'];?></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } } ?>
            </div>
            </div>
            </div>
            </div>
            </div>
         </form> 
      </div>
      <!------white lab grown end------>
      <div class="tab" id="fancy_lbd">
         <form action="get-products-fancy-color-filter-api" method="POST" name="fancy_color_filter">
            <div class="cate_bread_gia">
               <!-- <div class="btn-group cate_search_gia mr-2">
                  <button type="submit" class="clear_all mt-1">Show Diamonds Availability
                  </button>
               </div> -->
               <div id="boxThis">
                  <ul id="breadcrumb_fancy"></ul>
               </div>
               <div class="btn-group cate_search_gia mr-2">
                  <button type="submit" class="mt-1">Show Color Diamonds Availability
                  </button>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-md-3 mb-2">
                  <h3 class="mt-1">PRICE RANGE</h3>
                  <div class="sele mt-1">
                     <?php 
                        if(isset($priceranges) && !empty($priceranges)){
                           foreach($priceranges as $index => $pricerange){ 
                        ?>
                        <div class="fancy_advance">
                           <label class="letest_design"><a><?php echo $pricerange['price_range'];?></a>
                              <input type="checkbox" class="myCheckbox_fancy" name="price_range[]" value="<?php echo $pricerange['price_range'];?>" data-target="<?php echo $pricerange['price_range'];?>">
                              <span class="checkmark"></span>
                           </label>
                        </div>
                     <?php } } ?>
                  </div>
               </div>
               <div class="col-md-2 mb-2">
                  <h3 class="mt-1">
                     <a class="mymultiplediv" id="carat_2" style="color:#ff8080;" title="100 Cents = 1 Carat">Carat Weight ?
                     </a>
                  </h3>
                  <div class="mydiv" id="divcarat_2" style="display: none;">
                     <div class="carat">
                        <img src="assets/images/lb/size_wise_diamond.jpg" class="img-fluid">
                     </div>
                  </div>
                  <div class="asperwe mt-2">
                     <input class="asPerB" id="YouBdg1" type="text" placeholder="0.10">
                     to
                     <input class="asPerB" id="YouBdg2" type="text" placeholder="0.20">
                  </div>
                  <div class="sele mt-1">
                     <?php 
                     if(isset($caratweight) && !empty($caratweight)){
                        foreach($caratweight as $index => $size){ 
                     ?>
                     <div class="fancy_advance">
                        <label class="letest_design"><?php echo $size['carat_weight'];?>
                           <input type="checkbox" name="size[]" class="myCheckbox_fancy" value="<?php echo $size['carat_weight'];?>" data-target="<?php echo $size['carat_weight'];?>">
                           <span class="checkmark"></span>
                        </label>
                     </div>
                     <?php } } ?>
                  </div>
               </div>
               <div class="col-md-7 mb-2">
                  <div class="row_right">
                     <div class="d-md-block d-sm-none d-none">
                        <div class="shape_heading">
                           <strong>Select Shape</strong>
                        </div>
                        <div class="shape_image_row">
                              <?php 
                              //$maxProducts = 10; 
                              //$productCount = 0;
                              // if(isset($shapes) && !empty($shapes)){
                              //    foreach($shapes as $index => $shape){ 
                              //       $productCount++;
                              //       if ($productCount > $maxProducts) {
                              //          break;
                              //    }
                              ?>
                           <!-- <div class="shape shbr fancy_breadcrumb">
                              <span><?php //echo $shape['shape_name'];?></span>
                              <div class="shape_image" title="<?php echo $shape['shape_name'];?>">
                                 <?php 
                                 //$image = $shape['system_file_name'];
                                 if($image){ ?>
                                       <img src="assets/uploads/shapes/<?php echo $image;?>" class="img-fluid">
                                 <?php 
                                    }else{ ?>
                                    <span><?php //echo $shape['shape_name'];?></span>
                                 <?php }
                                 ?>
                              <input type="checkbox" name="shape[]" value="<?php //echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="fancy_myCheckbox" data-target="<?php //echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
                              </div>
                           </div> -->
                           <?php 
                              if(isset($shapes) && !empty($shapes)){
                                 foreach($shapes as $index => $shape){ 
                           ?>
                           <div class="shape shbr fancy_advance">
                              <span><?php echo $shape['shape_name'];?></span>
                              <div class="shape_image">
                                 <img src="assets/uploads/shapes/<?php echo $shape['system_file_name'];?>" alt="<?php echo $shape['shape_name'];?>"  class="img-fluid">
                              </div>
                              <input type="checkbox" name="shape[]" value="<?php echo $shape['shape_name'];?>"  class="myCheckbox_fancy" data-target="<?php echo $shape['shape_name'];?>">
                           </div>
                           <?php } } ?>
                           <button class="toggle-button" type="button" data-target="mslab"><i class="fa fa-caret-down"></i></button>
                        </div>
                     <!--    <div data-toggle="mslab" style="display:none;">
                           <div class="shape_image_row">
                              <?php 
                                 $productsToShow = 10; 
                                 $productCount = 0;
                                 //if(isset($shapes) && !empty($shapes)){
                                    $totalProducts = count($shapes);
                                    $startIdx = max(0, $totalProducts - $productsToShow);
                                    //for ($i = $startIdx; $i < $totalProducts; $i++) {
                                    //$shape = $shapes[$i];
                              ?>
                              <div class="shape shbr fancy_advance">
                                 <span><?php //echo $shape['shape_name'];?></span>
                                 <div class="shape_image" title="Round">
                                    <img src="assets/uploads/shapes/<?php //echo $shape['system_file_name'];?>" class="img-fluid">
                                 </div>
                                 <input type="checkbox"  name="shape[]" value="<?php //echo $shape['shape_name'];?>"  class="myCheckbox_fancy" data-target="<?php //echo $shape['shape_name'];?>">
                              </div>
                              <?php //} } ?>
                           </div>
                        </div> -->
                        <div class="shape_heading mt-5">
                           <strong>SELECT CLARITY</strong>
                        </div>
                        <div class="mb-2 select_clerity_row">
                           <!-- <div class="shape">
                              <span>Any</span>
                              <div class="shape_image any">
                                 Clarity
                              </div>
                              <input type="checkbox" name="clarity[]" value="Other" class="myCheckbox_fancy" data-target="Other">
                           </div> -->
                           <?php 
                              if(isset($clarity) && !empty($clarity)){
                                 foreach($clarity as $index => $clarityData){ 
                           ?>
                           <div class="round_image fancy_advance">
                              <span class="mymultiplediv" id="flv1"><?php echo $clarityData['clarity_name'];?></span>
                              <div class="shape_image advance_breadcrumb">
                                 <img src="assets/uploads/clarity/<?php echo $clarityData['system_file_name'];?>" class="mymultiplediv img-fluid" id="fl1">
                                 <input type="checkbox"  name="clarity[]" value="<?php echo $clarityData['clarity_name'];?>"  class="myCheckbox_advance" data-target="<?php echo $clarityData['clarity_name'];?>">
                                 <div class="fl_video mydiv" id="divflv1" style="display: none;">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <video width="170" height="170" controls="controls" loop="" autoplay="">
                                             <source src="assets/uploads/clarity/<?php echo $clarityData['system_file_video'];?>" type="video/mp4">
                                          </video>
                                       </div>
                                       <div class="col-md-8">
                                          <b><?php echo $clarityData['clarity_title'];?></b>
                                          <p><?php echo $clarityData['clarity_desc'];?></p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="fl_detail mydiv" id="divfl1" style="display: none;">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <img src="assets/images/1 FL IMAGE.jpg" class="img-fluid">
                                       </div>
                                       <div class="col-md-8">
                                          <b><?php echo $clarityData['clarity_title'];?></b>
                                          <p><?php echo $clarityData['clarity_desc'];?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } } ?>
                        </div>
                        <div class="shape_heading mt-4">
                           <strong>Fancy Color</strong>
                        </div>
                        <div class="color_part">
                           <!-- <div class="shape shbr fancy_advance">
                              <span>Any</span>
                              <div class="shape_image any">
                                 Color
                              </div>
                              <input type="checkbox" name="fancyColor[]" value="Other"  class="myCheckbox_fancy" data-target="other">
                           </div> -->
                           <?php 
                           $maxProducts = 10;
                           $productCount = 0;
                           if(isset($fancycolors) && !empty($fancycolors)){
                              foreach($fancycolors as $index => $fancycolor){ 
                                 $productCount++;
                                 if ($productCount > $maxProducts) {
                                    break;
                                 }
                                 ?>
                                 <div class="shape shbr fancy_advance">
                                    <span><?php echo $fancycolor['fancy_color_name'];?></span>
                                    <div class="shape_image">
                                       <img src="assets/uploads/fancycolor/<?php echo $fancycolor['system_file_name'];?>" alt="<?php echo $fancycolor['fancy_color_name'];?>"  class="img-fluid">
                                    </div>
                                    <input type="checkbox" name="fancy_color[]" value="<?php echo $fancycolor['fancy_color_name'];?>"  class="myCheckbox_fancy" data-target="<?php echo $fancycolor['fancy_color_name'];?>">
                                 </div>
                              <?php } } ?>
                              <button class="toggle-button" type="button" data-target="fancyco"><i class="fa fa-caret-down"></i></button>
                        </div>
                        <div data-toggle="fancyco" style="display:none;">
                           <?php 
                              // Set the number of products to display
                              $productsToShow = 3; // Adjust this value as needed
                              // Check if $fancycolors is set and not empty
                              if(isset($fancycolors) && !empty($fancycolors)){
                                 // Get the total number of products
                                 $totalProducts = count($fancycolors);
                                 // Calculate the starting index for the loop
                                 $startIdx = max(0, $totalProducts - $productsToShow);
                                 for ($i = $startIdx; $i < $totalProducts; $i++) {
                                    $fancycolor = $fancycolors[$i];
                           ?>
                           <div class="shape shbr fancy_advance">
                              <span><?php echo $fancycolor['fancy_color_name'];?></span>
                              <div class="shape_image">
                                 <img src="assets/uploads/fancycolor/<?php echo $fancycolor['system_file_name'];?>" class="img-fluid">
                              </div>
                              <input type="checkbox" name="fancy_color[]" value="<?php echo $fancycolor['fancy_color_name'];?>" class="myCheckbox_fancy" data-target="<?php echo $fancycolor['fancy_color_name'];?>">
                           </div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="shape_heading mt-2">
                     <strong>Overtone</strong>
                  </div>
                  <div class="colortone mt-2">
                     <?php 
                        $maxProducts = 10;
                        $productCount = 0;
                        if(isset($overtones) && !empty($overtones)){
                           foreach($overtones as $key =>$overtone){
                              $productCount++;
                              if ($productCount > $maxProducts) {
                                 break;
                              }
                     ?>
                     <div class="colortone_type fancy_advance">
                        <span title="Other">
                        <?php echo $overtone['overtone_name'];?>
                        </span>
                        <input type="checkbox"  name="overtone[]" value="<?php echo $overtone['overtone_name'];?>"  class="myCheckbox_fancy" data-target="<?php echo $overtone['overtone_desc'];?>">
                     </div>
                     <?php } } ?>
                     <button type="button" class="toggle-button" data-target="bluilab">
                        <i class="fa fa-caret-down"></i>
                     </button>
                  </div>
                  <div data-toggle="bluilab" style="display:none;">
                     <div class="colortone">
                        <?php 
                           $productsToShow = 14; 
                           if(isset($overtones) && !empty($overtones)){
                              $totalProducts = count($overtones);
                              $startIdx      = max(0, $totalProducts - $productsToShow);
                              for ($i = $startIdx; $i < $totalProducts; $i++) {
                                 $overtone = $overtones[$i];
                        ?>
                        <div class="colortone_type fancy_advance">
                           <span title="Other">
                           <?php echo $overtone['overtone_name'];?>
                              </span>
                           <input type="checkbox" name="overtone[]" value="<?php echo $overtone['overtone_name'];?>" class="myCheckbox_fancy" data-target="<?php echo $overtone['overtone_desc'];?>">
                        </div>
                        <?php } } ?>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shape_heading mt-2">
                     <strong>Intensity</strong>
                  </div>
                  <div class="intencity mt-2">
                     <?php 
                        $maxProducts  = 6;
                        $productCount = 0;
                        if(isset($intensities) && !empty($intensities)){
                           foreach($intensities as $key =>$intensity){
                              $productCount++;
                              if ($productCount > $maxProducts) {
                                 break;
                              }
                     ?>
                     <div class="intencity_type fancy_advance">
                        <span title="Other">
                        <?php echo $intensity['intensity_name'];?>
                           </span>
                        <input type="checkbox" name="intensity[]" value="<?php echo $intensity['intensity_name'];?>" class="myCheckbox_fancy" data-target="<?php echo $intensity['intensity_desc'];?>">
                     </div>
                     <?php } } ?>
                     <button type="button" class="toggle-button" data-target="intenlab">
                     <i class="fa fa-caret-down"></i>
                     </button>
                  </div>
                  <div data-toggle="intenlab" style="display:none;">
                     <div class="intencity">
                        <!-- <span>Fancy Intense</span>                
                        <span>Fancy Light</span>
                        <span>Faint</span> -->
                        <?php 
                           $productsToShow = 5; 
                           if(isset($intensities) && !empty($intensities)){
                              $totalProducts = count($intensities);
                              $startIdx = max(0, $totalProducts - $productsToShow);
                              for ($i = $startIdx; $i < $totalProducts; $i++) {
                                 $intensity = $intensities[$i];
                        ?>
                        <div class="intencity_type fancy_advance">
                           <span title="Other">
                           <?php echo $intensity['intensity_name'];?>
                              </span>
                           <input type="checkbox" name="intensity[]" value="<?php echo $intensity['intensity_name'];?>" class="myCheckbox_fancy" data-target="<?php echo $intensity['intensity_desc'];?>">
                        </div>
                     <?php } } ?>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <!------fancy lab grown end------>
      <div class="tab" id="small_jewelry">
         <div class="row">
            <div class="col-md-12">
               <img src="assets/images/lb/small_diamond_list.jpeg" class="img-fluid">
            </div>
         </div>
      </div>
      <!------small jewelry end------>
      <div class="tab" id="jewelry_design">
         <div class="tabs">
            <nav class="tab-nav">
               <ul>
                  <li class="active button_post">
                     <span data-href="#regular_design">Regular Design</span>
                  </li>
                  <li class="button_post">
                     <span data-href="#famous_designs">Famous Brands Designs</span>
                  </li>
                  <li class="button_post">
                     <span data-href="#celebrity_design">Celebrities Liking</span>
                  </li>
               </ul>
            </nav>
         </div>
         <div class="tab active" id="regular_design">
            <div class="tabs">
               <nav class="tab-nav">
                  <ul>
                     <a href="jewelary_rings_catalogue">
                        <li><span>Ring</span></li>
                     </a>
                     <a h ref="jewelary_earrings_catalogue">
                        <li><span>Earrings</span></li>
                     </a>
                     <a href="jewelary_pendant_catalogue">
                        <li><span>Pendant</span></li>
                     </a>
                  </ul>
               </nav>
            </div>
         </div>
         <!------regular design end------->
         <div class="tab" id="famous_designs">
            <div class="row mb-4">
               <div class="col-md-12">
                  <h3>Design similar to Which Brand Website Name</h3>
                  <div class="desi_similar">
                     <div class="desi_1">
                        <label class="letest_design">
                        <a>Aron Henry</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Beaverbrooks</a>                                        
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Blue Nile</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Brogioni</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Boucheron</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Briliant Earth</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Buccellati</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Balgari</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Cartier</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                     </div>
                     <div class="desi_2">
                        <label class="letest_design">
                        <a href="">Kara Rose</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Kays</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Lazo</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Lori Rodkin</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Lorraine Schwartz</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Mabelle</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Macys</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Manya &amp; Roumen</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Martin Flyer</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Matthew Campbell Laurenza</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Messiki</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Michaelhili</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Mikimoto</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Mimiso</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Pamela HuiZenga</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Piaget</a>
                        </label>
                     </div>
                  </div>
                  <div class="desi_similar">
                     <div class="desi_1">
                        <label class="letest_design">
                        <a href="">Jar</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Jared</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Jeff Copper</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design"> 
                        <a href="">Jorge Adeler</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Van Cleef &amp; Arpels</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Vera Vang</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a href="">Verdura</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                        <label class="letest_design">
                        <a>Daria De Koning</a>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        </label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!------famous branded design end--------->
         <div class="tab" id="celebrity_design">
            <div class="row mb-4">
               <div class="col-md-6">
                  <h3>Designs &amp; Diamonds Selected By Celebrities</h3>
                  <label class="letest_design">The Best Celebity Engagement Ring of all time - vogue
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">21most expensive celebrity Engagement Ring ever - bride.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">60+ Unique celebrity Engagement Ring - harpersbazaar.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">The 25 Most Expensive Engagement Ring - who what wear
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">The Best Celebity Engagement Ring - instyle.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Gorgeous celebrity Engagement Ring and wedding band - elle
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">The Most Extra Celebrity Engageent Ring of 2018
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Unique Unusual Celebrity Engagement Ring - people.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">12 non traditional celebrity Engagement Ring - instyle.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">75 Best Celebrity Engagement Ring - how they asked
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Unique celebrity Engagement Ring - hollywood life
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Non taditional celebrity Engagement Ring - popsugar celebrity
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Best Celebrity Engagement Ring os 2019 - usmagzine.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">40 Best celebrity Engagement Ring - biggest most expensive rings - townandcounty mag.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">Celebrity Engagement Ring 2019 - hollywood life
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
                  <label class="letest_design">27 expensive celebrity Engagement Ring - cost &amp; size - theknot.com
                  <input type="checkbox">
                  <span class="checkmark"></span>
                  </label>
               </div>
            </div>
         </div>
         <!--------celebrate design end------->
      </div>
      <!------jewelry design end------>
      <div class="tab" id="jewelry_cost">
         <div class="row">
            <div class="col-md-3">
               <div class="logoContainer">
                  <img src="assets/images/lb/dummy.webp" class="img-fluid">
               </div>
               <div class="fileContainer sprite">
                  <span>Upload  Image</span>
                  <input type="file"  value="Choose File">
               </div>
            </div>
            <div class="col-md-9">
               <table class="table-bordered table-responsive table-striped jewellery_est">
                  <caption>According to  you Approx Weights ,After Buying Center Stone ,Our Experrts Can Guide You.
                  </caption>
                  <thead>
                     <tr>
                        <th></th>
                        <th>Piece</th>
                        <th>Per Piece Weight</th>
                        <th>Total Weight</th>
                        <th>Quality Select</th>
                        <th>Rate</th>
                        <th>Amount</th>
                     </tr>
                  </thead>
                  <tr>
                     <td>Metal</td>
                     <td>
                        <select>
                           <option>Piece</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        <select>
                           <option>Per Piece Wt</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        1.50 (auto)
                     </td>
                     <td>
                        <select>
                           <option>Quality Select</option>
                           <option>Best</option>
                           <option>Good</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td>&#8377; 30,000</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Big Center Diamond</td>
                     <td>
                        <select>
                           <option>Piece</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        <select>
                           <option>Per Piece Wt</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        1.50 (auto)
                     </td>
                     <td>
                        <select>
                           <option>Quality Select</option>
                           <option>Best</option>
                           <option>Good</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td>&#8377; 30,000</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Medium Size Side Diamond Above 50 Cents </td>
                     <td>
                        <select>
                           <option>Piece</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        <select>
                           <option>Per Piece Wt</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        1.50 (auto)
                     </td>
                     <td>
                        <select>
                           <option>Quality Select</option>
                           <option>Best</option>
                           <option>Good</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td>&#8377; 30,000</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Small Diamonds</td>
                     <td>
                        <select>
                           <option>Piece</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        <select>
                           <option>Per Piece Wt</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        1.50 (auto)
                     </td>
                     <td>
                        <select>
                           <option>Quality Select</option>
                           <option>Best</option>
                           <option>Good</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td>&#8377; 30,000</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Gemstone Diamonds</td>
                     <td>
                        <select>
                           <option>Piece</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        <select>
                           <option>Per Piece Wt</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </td>
                     <td>
                        1.50 (auto)
                     </td>
                     <td>
                        <select>
                           <option>Quality Select</option>
                           <option>Best</option>
                           <option>Good</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td>&#8377; 30,000</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Making</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>
                        <select>
                           <option>Metal</option>
                           <option>Gold</option>
                           <option>Silver</option>
                           <option>Platinum</option>
                        </select>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Taxes</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                        <select>
                           <option>Country</option>
                           <option>India</option>
                           <option>U.S.</option>
                           <option>U.K.</option>
                        </select>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Shipping & Insurance</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                        <select>
                           <option>Country</option>
                           <option>India</option>
                           <option>U.S.</option>
                           <option>U.K.</option>
                        </select>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Total</td>
                     <td>2</td>
                     <td>3.99</td>
                     <td>4.50</td>
                     <td></td>
                     <td></td>
                     <td>&#8377;  1,00,000</td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <!------jewelry cost end------>
      <div class="tab" id="review">
         <div class="riview">
            <div class="customer_rev">
               <div class="review_title">Reviews for Taare Sitare</div>
               <div class="border"></div>
            </div>
            <div class="write_review mt-2" style="display: block;">
               <p>PLEASE GIVE FEED BACK /REVIEWS AND GET RS 1000 CREDITED TO YOUR ACCOUNT * ,CAN BE ADJUSTED AGAINST MAKING &amp; SMALL DIAMONDS @ 10%</p>
               <span class="">Rate For This:</span>
               <form class="mt-2" action='#' method="POST">
                  <div class="score">
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                  </div>
                  <div class="form-group name-group">
                     <div class="palceholder" style="display: block;">
                        <label for="title">HOW ARE OUR DESIGNS</label>
                        <span class="star">*</span>
                     </div>
                     <input type="text" class="form-control" id="title">
                     <!-- <input type="text" class="form-control" id="title" required=""> -->
                  </div>
                  <div class="score">
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                  </div>
                  <div class="form-group name-group">
                     <div class="palceholder" style="display: block;">
                        <label for="review">HOW IS YOUR EXPERIENCE ,AS TO WEBSITE USER FRIENDLINESS </label>
                        <span class="star">*</span>
                     </div>
                     <textarea rows="2" class="form-control"></textarea>
                  </div>
                  <div class="score">
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                  </div>
                  <div class="form-group name-group">
                     <div class="palceholder" style="display: block;">
                        <label for="name">HOW IS OUR PRICING AS COMPARED TO OTHERS </label>
                        <span class="star">*</span>
                     </div>
                     <input type="text" class="form-control" id="price">
                  </div>
                  <div class="score">
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                  </div>
                  <div class="form-group name-group">
                     <div class="palceholder" style="display: block;">
                        <label for="email">HOW IS OUR LIKING SECTION WITH SO MANYs DESIGNS ,GEMSTONES &amp; METAL PLATING COLOR OPTIONS</label>
                        <span class="star">*</span>
                     </div>
                     <input type="text" class="form-control" id="like">
                  </div>
                  <div class="score">
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                     <i class="fa fa-star-o"></i>
                  </div>
                  <div class="form-group name-group">
                     <div class="palceholder" style="display: block;">       
                        <label for="email">HOW IS BUDGET MATCHING SECTION</label>
                        <span class="star">*</span>
                     </div>
                     <!-- <input type="text" class="form-control" id="" required=""> -->
                     <input type="text" class="form-control" id="budget">
                  </div>
                  <a href="login"><button type="button" class="post"><i class="fa fa-paper-plane" aria-hidden="true"></i>Post
                  </button></a>
               </form>
            </div>
         </div>
      </div>
   </div>
<!-------tabs and---------->   
</div>
<script>
$(document).ready(function() {
   //breadcrumb for checkbox in quick search 
   const checkboxes = document.querySelectorAll('.myCheckbox');
   checkboxes.forEach(shbr => {
     shbr.addEventListener('click', function() {
         const target = this.getAttribute('data-target');
         const associatedLi = document.getElementById(target);
         const otherBreadcrumbs = document.querySelectorAll('#breadcrumb li[id]:not([id="' + target + '"])');

         // Toggle the display of the breadcrumb span
         if (!this.checked) {
         // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
         if (associatedLi) {
           associatedLi.remove();
         }
       }
       //associatedLi.style.display = (associatedLi.style.display === 'none') ? 'inline' : 'none';
     });
   });
   //End breadcrumb for checkbox in quick search 
   //Quick filter Here//
   var selectedTargets = []; 
   $(document).on('click', '.quick_breadcrumb', function() {
      var checkbox     = $(this).find('input[type="checkbox"]'); 
      var value_data   = checkbox.val(); // Get the value of the checkbox
      var targetQuick  = value_data.split('|')[1] || value_data;
      // Get the target value
      var targetRemoveQuick = checkbox.data('target');
      if (checkbox.prop('checked')) {
         if (!selectedTargets.includes(targetQuick)) {
            selectedTargets.push(targetQuick); // Add target to selected targets
               $('#breadcrumb').append(`<li id="${targetRemoveQuick}">${targetQuick} <i class="fa fa-times"></i></li>`); // Append breadcrumb
         }
      } else {
         selectedTargets = selectedTargets.filter(item => item !== targetRemoveQuick); // Remove target from selected targets
         $('#' + targetRemoveQuick).remove(); // Remove breadcrumb item
      }
   });
              
   //  $('.myCheckbox').each(function() {
   //      $(this).on('click', function() {
   //          var value = $(this).val();
   //          var value_data = value.split('|')[1] || value;
   //          var target = $(this).data('target');
   //          if (this.checked && !selectedTargets.includes(target)) {
   //              selectedTargets.push(target);
   //              $('#breadcrumb').append(`<li id="${target}">${value_data} <i class="fa fa-times"></i></li>`);
   //          } else if(!this.checked && selectedTargets.includes(target)) {
   //              selectedTargets = selectedTargets.filter(item => item !== target);
   //              $('#' + target).remove();
   //          }
   //      });
   //  });
    
   // Event delegation to handle click on '.fa.fa-times'
   $('#breadcrumb').on('click', '.fa.fa-times', function() {
      var target = $(this).parent().attr('id');
      selectedTargets = selectedTargets.filter(item => item !== target); // Remove target from the array
      $(this).parent().remove(); // Remove the parent <li> element
      $('[data-target="' + target + '"]').prop('checked', false);
   });
   //End Quick Filter//

   //Advance  Filter Here//
   const Advnacecheckboxes = document.querySelectorAll('.myCheckbox_advance');
   Advnacecheckboxes.forEach(advcheck => {
     advcheck.addEventListener('click', function() {
         const target    = this.getAttribute('data-target');
         const advanceLi = document.getElementById(target);
         const otherBreadcrumbs = document.querySelectorAll('#advance_breadcrumb li[id]:not([id="' + target + '"])');

         // Toggle the display of the breadcrumb span
         if (!this.checked) {
         // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
         if (advanceLi) {
           advanceLi.remove();
         }
       }
       //advanceLi.style.display = (advanceLi.style.display === 'none') ? 'inline' : 'none';
     });
   });
   //End breadcrumb for checkbox in quick search 

   var selectedTargetsAdvance = []; 
   $(document).on('click', '.advance_breadcrumb', function() {
      var checkbox      = $(this).find('input[type="checkbox"]'); 
      var targetAdvance = checkbox.val(); // Get the value of the checkbox
      // Get the target value
      //alert(targetAdvance);
      var targetRemoveAdvance = checkbox.data('target');
      if (checkbox.prop('checked')) {
         if (!selectedTargetsAdvance.includes(targetAdvance)) {
               selectedTargetsAdvance.push(targetAdvance); // Add target to selected targets
               $('#breadcrumb_advance').append(`<li id="${targetRemoveAdvance}">${targetAdvance} <i class="fa fa-times"></i></li>`); // Append breadcrumb
         }
      } else {
         selectedTargetsAdvance = selectedTargetsAdvance.filter(item => item !== targetRemoveAdvance); 
         // Remove target from selected targets
         $('#' + targetRemoveAdvance).remove(); // Remove breadcrumb item
      }
   });

   // var selectedTargetsAdvance = [];     
   // $(document).on('click', '.shape', function() {
   //      // Find the input value
   //      var advance_value = $(this).find('input[type="checkbox"]').val();

   //      var targetAdvance = $(this).find('input[type="checkbox"]').data('target');

   //      //alert(targetAdvance);
   //      // Find the target value
   //    //   var targetAdvance = $(this).siblings('input[type="checkbox"]').data('target');
             
   // //  $('.myCheckbox_advance').each(function() {
   // //      $(this).on('click', function() {
   //          // var advance_value = $(this).val();
   //          var advance_value_data = advance_value.split('|')[1] || advance_value;
   //         // var targetAdvance = $(this).data('target');
   //          if (this.checked && !selectedTargetsAdvance.includes(targetAdvance)) {
   //             alert(targetAdvance);
   //             selectedTargetsAdvance.push(targetAdvance);
   //              $('#breadcrumb_advance').append(`<li id="${targetAdvance}">${advance_value_data} <i class="fa fa-times"></i></li>`);
   //          } else if (!this.checked && selectedTargetsAdvance.includes(targetAdvance)) {
   //             selectedTargetsAdvance = selectedTargetsAdvance.filter(item => item !== targetAdvance);
   //             $('#' + targetAdvance).remove();
   //          }
   //      //});
   // });

    // Event delegation to handle click on '.fa.fa-times'
   $('#breadcrumb_advance').on('click', '.fa.fa-times', function() {
      var targetAdvance = $(this).parent().attr('id');
      selectedTargetsAdvance = selectedTargetsAdvance.filter(item => item !== targetAdvance); // Remove target from the array
      $(this).parent().remove(); // Remove the parent <li> element
      $('[data-target="' + targetAdvance + '"]').prop('checked', false);
   });
   //End Advance Filter //
   //Advance Search Filter Here //
   //  var selectedTargetsAdv = [];                  
   //  $('.advance_checkbox').each(function() {
   //      $(this).on('click', function() {
   //          var adv_value = $(this).val();
   //          var adv_value_data = adv_value.split('|')[1] || adv_value;
   //          var targetAdv = $(this).data('target');
   //          if (this.checked && !selectedTargetsAdv.includes(targetAdv)) {
   //             selectedTargetsAdv.push(targetAdv);
   //              $('#breadcrumb_advance_filter').append(`<li id="${targetAdv}">${adv_value_data} <i class="fa fa-times"></i></li>`);
   //          } else if (!this.checked && selectedTargetsAdv.includes(targetAdv)) {
   //             selectedTargetsAdv = selectedTargetsAdv.filter(item => item !== targetAdv);
   //             $('#' + targetAdv).remove();
   //          }
   //      });
   //  });
   
   var selectedTargetsAdv = [];
   $('.filter_advance').on('click', function() {
      var checkbox = $(this).find('input[type="checkbox"]');
      var targetAdvance = checkbox.val(); // Get the value of the checkbox
      var targetRemoveAdvance = checkbox.data('target'); // Get the target value

      if (checkbox.prop('checked')) {
         if (!selectedTargetsAdv.includes(targetAdvance)) {
               selectedTargetsAdv.push(targetAdvance); // Add target to selected targets
               $('#breadcrumb_advance_filter').append(`<li id="${targetRemoveAdvance}">${targetAdvance} <i class="fa fa-times"></i></li>`); // Append breadcrumb
         }
      } else {
         selectedTargetsAdv = selectedTargetsAdv.filter(item => item !== targetRemoveAdvance); // Remove target from selected targets
         $('#' + targetRemoveAdvance).remove(); // Remove breadcrumb item
      }
   });

   // Event delegation to handle click on '.fa.fa-times'
   $('#breadcrumb_advance_filter').on('click', '.fa.fa-times', function() {
      var targetAdv = $(this).parent().attr('id');
      selectedTargetsAdv = selectedTargetsAdv.filter(item => item !== targetAdv); // Remove target from the array
      $(this).parent().remove(); // Remove the parent <li> element
      $('[data-target="' + targetAdv + '"]').prop('checked', false);
   });
   //End Advance// 
   //Fancy Filter Here //
   // var selectedTargetsFancy = [];                  
   // $('.myCheckbox_fancy').each(function() {
   //      $(this).on('click', function() {
   //          var fancy_value = $(this).val();
   //          var fancy_value_data = fancy_value.split('|')[1] || fancy_value;
   //          var targetFancy = $(this).data('target');
   //          if (this.checked && !selectedTargetsFancy.includes(targetFancy)) {
   //             selectedTargetsFancy.push(targetFancy);
   //              $('#breadcrumb_fancy').append(`<li id="${targetFancy}">${fancy_value_data} <i class="fa fa-times"></i></li>`);
   //          } else if (!this.checked && selectedTargetsFancy.includes(targetFancy)) {
   //             selectedTargetsFancy = selectedTargetsFancy.filter(item => item !== targetFancy);
   //             $('#' + targetFancy).remove();
   //          }
   //      });
   //  });
   
   //breadcrumb for checkbox in quick search 
   const breadcrumbFancyCheckbox = document.querySelectorAll('.myCheckbox_fancy');
   breadcrumbFancyCheckbox.forEach(fancy => {
      fancy.addEventListener('click', function() {
         const target  = this.getAttribute('data-target');
         const fancyLi = document.getElementById(target);
         const otherBreadcrumbs = document.querySelectorAll('#breadcrumb_fancy li[id]:not([id="' + target + '"])');

         // Toggle the display of the breadcrumb span
         if (!this.checked) {
         // If the checkbox is unchecked and the associated breadcrumb item exists, remove it
         if (fancyLi) {
           fancyLi.remove();
         }
       }
       //associatedLi.style.display = (associatedLi.style.display === 'none') ? 'inline' : 'none';
     });
   });
   //End breadcrumb for checkbox in quick search 

   var selectedTargetsFancy = [];
   $('.fancy_advance').on('click', function() {
      var checkbox = $(this).find('input[type="checkbox"]');
      var fancy_value = checkbox.val(); // Get the value of the checkbox
      var targetRemoveFancy = checkbox.data('target'); // Get the target value

      if (checkbox.prop('checked')) {
         if (!selectedTargetsFancy.includes(fancy_value)) {
            selectedTargetsFancy.push(fancy_value); // Add target to selected targets
               $('#breadcrumb_fancy').append(`<li id="${targetRemoveFancy}">${fancy_value} <i class="fa fa-times"></i></li>`); // Append breadcrumb
         }
      } else {
         selectedTargetsFancy = selectedTargetsFancy.filter(item => item !== targetRemoveFancy); // Remove target from selected targets
         $('#' + targetRemoveFancy).remove(); // Remove breadcrumb item
      }
   });

   // Event delegation to handle click on '.fa.fa-times'
   $('#breadcrumb_fancy').on('click', '.fa.fa-times', function() {
      var targetFancy = $(this).parent().attr('id');
      selectedTargetsFancy = selectedTargetsFancy.filter(item => item !== targetFancy); // Remove target from the array
      $(this).parent().remove(); // Remove the parent <li> element
      $('[data-target="' + targetFancy + '"]').prop('checked', false);
   });
   //End Fancy// 
});
</script>
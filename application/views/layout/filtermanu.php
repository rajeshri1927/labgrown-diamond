<?php header('Cache-Control: no cache');?>
<div class="filter_part">
<div class="tabs">
<div class="tab-nav">
   <div class="SMN_effect-9">
      <button>1<sup class="mr-1">st</sup>Select</button>
      <div id="quick" class="d-flex">
      <button id="quick-search"><span data-href="#quick_search" data-hover="White LG Diamonds">White LG Diamonds</span></button>
      <button><span data-href="#fancy_lbd" data-hover="Fancy Color LG Diamonds"> Fancy Color LG Diamonds </span></button>
      </div>
      <button class="text-center d-flex" id="refresh-icon">Then <br> / Or
        <img src="assets/images/arrow_lr.png" class="img-fluid" style="margin: 5px 0 0 5px;">
      </button>
      <div id="jewelry" class="d-flex">
      <button id="jewelry-design"><span data-href="#jewelry_design" data-hover="Life's Important Jewelry">Life's Important Jewelry</span></button>
      <button id="specific-design"><span data-href="#billionaire_design" data-hover="Billionaire / Millio Jewelry">Billionaire / Millio Jewelry</span></button>
      <button id="specific-design"><span data-href="#famous_design" data-hover="Famous Brands Jewelry">Famous Brands Jewelry</span></button> 
      <button id="specific-design"><span data-href="#specific_design" data-hover="Specific Jewelry">Specific Jewelry</span></button>
      </div>
      <!--<button><span data-href="#review" data-hover="Google Review">Google Review</span></button>-->
   </div>
</div>
<!------nav end-------->
<div class="tab" id="home">
</div>
<div class="tab" id="quick_search">
 <h4 class="quick_table">QUICK SEARCH <i class="fa fa-caret-down"></i></h4>
 <h4 class="well-sm">ADVANCE SEARCH <i class="fa fa-caret-down"></i></h4>
 <div class="advance_search_drop">
   <div class="cate_bread_gia mb-2">
     <div id="boxThis">
       <ul id="breadcrumb">
         <li id="price_1">Rs.10000 To Rs.24999 <i class="fa fa-times"></i></li>
       </ul>
     </div>
     <div class="asperbut">
       <button type="submit">Search</button>
     </div>
   </div>
   <select class="contryselect" id="country_name" name="country_name" class="form-control"
     data-validation="required">
     <option value="">SELECT COUNTRY</option>
     <option id="Afghanistan" value="Afghanistan">Afghanistan</option>
     <option id="Albania" value="Albania">Albania</option>
     <option id="Algeria" value="Algeria">Algeria</option>
     <option id="American Samoa" value="American Samoa">American Samoa</option>
     <option id="Andorra" value="Andorra">Andorra</option>
     <option id="Angola" value="Angola">Angola</option>
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
                 <input class="chk5" type="checkbox" name="cut[]" value="Ex/Ideal">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="cut[]" value="Excellent">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="cut[]" value="Very Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="cut[]" value="Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="cut[]" value="Fair">
               </td>
             </tr>
             <tr>
               <td>Polish:</td>
               <td>
                 <input class="chk5" type="checkbox" name="polish[]" value="Ex/Ideal">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="polish[]" value="Excellent">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="polish[]" value="Very Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="polish[]" value="Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="polish[]" value="Fair">
               </td>
             </tr>
             <tr>
               <td>Symmetry:</td>
               <td>
                 <input class="chk5" type="checkbox" name="symmetry[]" value="Ex/Ideal">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="symmetry[]" value="Excellent">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="symmetry[]" value="Very Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="symmetry[]" value="Good">
               </td>
               <td>
                 <input class="chk5" type="checkbox" name="symmetry[]" value="Fair">
               </td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
     <div class="col-md-6">
       <strong class="flu">Certification</strong>
       <div class="certi">
         <div class="gia">
           <span>GIA</span>
           <input type="checkbox" name="lab[]" value="GIA" id="lab" data-target="GIA">
         </div>
         <div class="gia">
           <span>HRD</span>
           <input type="checkbox" name="lab[]" id="lab" value="HRD" size="2" readonly>
         </div>
         <div class="gia">
           <span>IGI</span>
           <input type="checkbox" name="lab[]" id="lab" value="IGI" size="2" readonly>
         </div>
         <div class="gia">
           <span>AGS</span>
           <input type="checkbox" name="lab[]" id="lab" value="AGS" size="2" readonly>
         </div>
         <div class="gia">
           <span>OTHER</span>
           <input type="checkbox" name="lab[]" id="lab" value="OTHER" size="2" readonly>
         </div>
       </div>
       <strong class="flu"></strong>
       <div class="certi">
         <div class="gia">
           <span>H & A</span>
           <input type="checkbox" name="lab[]" id="lab" value="H &amp; A" size="2" readonly>
         </div>
         <div class="gia">
           <span>NO BGM</span>
           <input type="checkbox" name="lab[]" id="lab" value="No BGM" size="5" readonly>
         </div>
         <div class="gia">
           <span>EYE CLEAN</span>
           <input type="checkbox" name="lab[]" id="lab" value="Eye Clean" size="5" readonly>
         </div>
       </div>
     </div>
     <hr>
     <div class="col-md-12">
       <strong class="flu">Fluorescence:</strong>
       <div class="">
         <div class="certi">
           <div class="gia">
             <span>Faint/Slight</span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="Faint" size="7"
               readonly>
           </div>
           <div class="gia">
             <span>Very Slight </span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="Very Slight" size="7"
               readonly>
           </div>
           <div class="gia">
             <span>Medium </span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="Medium" size="7"
               readonly>
           </div>
           <div class="gia">
             <span>Strong </span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="Strong" size="7"
               readonly>
           </div>
           <div class="gia">
             <span>Very Strong</span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="Very Strong" size="7"
               readonly>
           </div>
           <div class="gia">
             <span>None</span>
             <input type="checkbox" name="fluor_intensity[]" id="fluor_intensity" value="None" size="7" readonly>
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
       <div class="asperbude">
         <style>
           input[type=number]::-webkit-inner-spin-button,
           input[type=number]::-webkit-outer-spin-button {
             -webkit-appearance: none;
             -moz-appearance: none;
             appearance: none;
             margin: 0;
           }
         </style>
         <input class="asPerB" id="YouBdg1" type="number" name="depth_percent_from">
         % to
         <input class="asPerB" id="YouBdg2" type="number" name="depth_percent_to"> %
       </div>
     </div>
     <div class="col-md-4">
       <strong class="flu">Table</strong>
       <div class="asperbude">
         <input class="asPerB" id="YouBdg1" type="number" name="table_percent_from">
         % to
         <input class="asPerB" id="YouBdg2" type="number" name="table_percent_to"> %
       </div>
     </div>
     <div class="col-md-4">
       <strong class="flu">Ratio</strong>
       <div class="asperbude">
         <input class="asPerB" id="YouBdg1" type="number" name="ratio_percent_to">
         % to
         <input class="asPerB" id="YouBdg2" type="number" name="ratio_percent_from"> %
       </div>
     </div>
     <hr>
     <div class="col-md-12">
       <strong class="flu">Measurement</strong>
       <div class="aspermesu mt-3">
         <input class="asPerB" id="YouBdg1" type="text" name="ratio_percent_to">
         <small>L</small> to
         <input class="asPerB" id="YouBdg2" type="text" name="ratio_percent_from">
         <input class="asPerB" id="YouBdg1" type="text" name="ratio_percent_to">
         <small>W</small> to
         <input class="asPerB" id="YouBdg2" type="text" name="ratio_percent_from">
         <input class="asPerB" id="YouBdg1" type="text" name="ratio_percent_to">
         <small>D</small> to
         <input class="asPerB" id="YouBdg2" type="text" name="ratio_percent_from">
       </div>
     </div>
     <hr>
     <div class="col-md-7">
       <strong class="flu">Treatment</strong>
       <div class="certi">
         <div class="gia">
           <span>Clarity Enhanced</span>
           <input type="checkbox" class="text-center" name="treatment[]" id="as_grown" value="As Grown" size="7"
             readonly>
         </div>
         <div class="gia">
           <span>Color Enhanced</span>
           <input type="checkbox" class="text-center" name="treatment[]" id="treated" value="Treated" size="7"
             readonly>
         </div>
         <div class="gia">
           <span>Drill</span>
           <input type="checkbox" class="text-center" name="treatment[]" id="unknown" value="Unknown" size="7"
             readonly>
         </div>
       </div>
     </div>
     <div class="col-md-3">
       <strong class="flu">Growth Type</strong>
       <div class="certi">
         <div class="gia">
           <span title="Chemival Vapor Deposition">CVD</span>
           <input type="checkbox" class="text-center" name="growth[]" id="cvd" value="CVD" size="7" readonly>
         </div>
         <div class="gia">
           <span title="High Pressure High Tamperature">HPHT</span>
           <input type="checkbox" class="text-center" name="growth[]" id="HPHT" value="HPHT" size="7" readonly>
         </div>
         <div class="gia">
           <span>OTHER</span>
           <input type="checkbox" class="text-center" name="growth[]" id="Other" value="Other" size="7" readonly>
         </div>
       </div>
     </div>
   </div>
   <!----row--->
 </div>

 <div class="quick_table_drop">
   <div class="home_quality">
     <div class="differ_view center mt-5">
       <h2 class="center">Shop By Shape - Quality - Price - Weight Range</h2>
       <p style="font-size: large;font-weight:700;">We Have Total <b>6,00,000</b> (DYNAMIC) Diamonds In Inventory</p>
     </div>
     <div class="heading_border"></div>
     <div class="mt-5 fourin1">
       <div class="shape_image_row ">
         <div class="shape shbr" data-target="any_shape">
           <span>Any</span>
           <div class="shape_image any">
             Shape
           </div>
           <input type="checkbox" name="shape" value="any">
         </div>
         <div class="shape shbr" data-target="round">
           <span>Round</span>
           <div class="shape_image" title="Round">
             <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Round">
         </div>
         <div class="shape shbr" data-target="princess">
           <span>Princess</span>
           <div class="shape_image" title="Princess">
             <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Princess">
         </div>
         <div class="shape shbr" data-target="pear">
           <span>Pear</span>
           <div class="shape_image" title="Pear">
             <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Pear">
         </div>
         <div class="shape shbr" data-target="shield">
           <span>Coushion</span>
           <div class="shape_image" title="Shield">
             <img srcset="assets/images/shapes/cushion diamond.png 320w, assets/images/shapes/cushion diamond.png 640w, assets/images/shapes/cushion diamond.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cushion diamond.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Shield">
         </div>
         <div class="shape shbr" data-target="asscher">
           <span>Asscher</span>
           <div class="shape_image" title="Asscher">
             <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Asscher">
         </div>
         <div class="shape shbr" data-target="radiant">
           <span>Radiant</span>
           <div class="shape_image" title="Radiant">
             <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Radiant">
         </div>
         <div class="shape shbr" data-target="heart">
           <span>Heart</span>
           <div class="shape_image" title="Heart">
             <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Heart">
         </div>
         
         <div class="shape shbr" data-target="oval">
           <span>Oval</span>
           <div class="shape_image" title="Oval">
             <img srcset="assets/images/shapes/oval diamond1.png 320w, assets/images/shapes/oval diamond1.png 640w, assets/images/shapes/oval diamond1.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/oval diamond1.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Oval">
         </div>
         
         <div class="shape shbr" data-target="Marquise">
           <span>Marqui?</span>
           <div class="shape_image" title="Marquise">
             <img srcset="assets/images/shapes/diamond marquise.png 320w, assets/images/shapes/diamond marquise.png 640w, assets/images/shapes/diamond marquise.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond marquise.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Marquise">
         </div>
         
         
        
         <div class="shape shbr" data-target="emerald">
           <span>Emerald</span>
           <div class="shape_image" title="Emerald">
             <img srcset="assets/images/shapes/Emerald2.png 320w, assets/images/shapes/Emerald2.png 640w, assets/images/shapes/Emerald2.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Emerald2.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Emerald">
         </div>
         
         <div class="shape shbr">
           <span>Other</span>
           <div class="shape_image pt-2" title="Other">
             <p>Other</p>
           </div>
           <input type="checkbox" name="shape" value="Cushion">
         </div>
       </div>
     </div>

     <table class="table-responsive fancy_shape_table table-bordered mt-3 table-striped">
       <thead>
         <tr>
           <th class="bg-primary">Carat Weight ?</th>
           <th colspan="2" class="bg-info">Good (A)</th>
           <th colspan="2" class="bg-success">Very Good (AA)</th>
           <th colspan="2" class="bg-warning">Best (AAA)</th>
          </tr>
        <tr>
          <th></th>
          <th class="first-letter-big">From:</th>
          <th class="first-letter-big"> To:</th>
          <th class="first-letter-big">From:</th>
          <th class="first-letter-big">To:</th>
          <th class="first-letter-big">From:</th>
          <th class="first-letter-big">To:</th>
        </tr>
       </thead>
       <tbody>
         <tr>
          <td>
            <label class="letest_design">0.20 TO 0.49
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">0.50 TO 0.69
            </label>
          </td><td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">0.70 TO 0.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">1.00 TO 1.49
            </label>
          </td>
          <td>
           500000
         </td>
         <td>700000</td>
         <td>
          500000
        </td>
        <td>700000</td>
         <td>
          500000
        </td>
        <td>700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">1.50 TO 1.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">2.00 TO 2.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">3.00 TO 4.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>

         </tr>
         <tr>
          <td>
            <label class="letest_design">5.00 TO 6.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>

         </tr>
         <tr>
          <td>
            <label class="letest_design">7.00 TO 9.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">10.00 TO 19.99
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
         <tr>
          <td>
            <label class="letest_design">20 +
            </label>
          </td>
          <td>
           $500000
          </td>
          <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
          <td>
           $500000
         </td>
         <td>$700000</td>
         </tr>
       </tbody>
    </table>
   </div>
 </div>
 <div class="cate_bread_gia mb-2">
   <div id="boxThis">
     <ul id="breadcrumb">
       <li id="text" style="display:none">0.20 to 0.29 <i class="fa fa-times"></i></li>
       <li id="text1" style="display:none">0.30 to 0.39 <i class="fa fa-times"></i></li>
       <li id="text2" style="display:none">0.40 to 0.49 <i class="fa fa-times"></i></li>
       <li id="text3" style="display:none">0.50 to 0.59 <i class="fa fa-times"></i></li>
       <li id="text4" style="display:none">0.60 TO 0.69 <i class="fa fa-times"></i></li>
       <li id="text5" style="display:none">0.70 TO 0.79 <i class="fa fa-times"></i></li>
       <li id="text6" style="display:none">0.80 TO 0.89 <i class="fa fa-times"></i></li>
       <li id="text7" style="display:none">0.90 TO 0.99 <i class="fa fa-times"></i></li>
       <li id="text8" style="display:none">1.00 TO 1.20 <i class="fa fa-times"></i></li>
       <li id="text9" style="display:none">1.20 to 1.49 <i class="fa fa-times"></i></li>
       <li id="text10" style="display:none">1.50 to 1.69 <i class="fa fa-times"></i></li>
       <li id="text11" style="display:none">1.70 to 1.99 <i class="fa fa-times"></i></li>
       <li id="text12" style="display:none">2.00 to 2.49 <i class="fa fa-times"></i></li>
       <li id="text13" style="display:none">2.50 to 2.99 <i class="fa fa-times"></i></li>
       <li id="round" style="display:none">Round <i class="fa fa-times"></i></li>
       <li id="cobr" style="display:none">D <i class="fa fa-times"></i></li>
     </ul>
   </div>
     <div class="btn-group cate_search_gia">
       <button type="button" class="clear_all mt-1">Show Diamonds Availability
       </button>
     </div>
 </div>
 <hr>
 
 <div class="row mb-4">
   <div class="col-md-2 mb-2">
     <h3 class="mt-1">PRICE RANGE</h3>
     <div class="sele mt-1">
       <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_1">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design">
         <a>Rs.25,000 To Rs.49,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_2">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_3">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_4">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_5">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_6">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_7">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_8">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
         <input type="checkbox" class="myCheckbox" data-target="price_9">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
         <input type="checkbox" class="myCheckbox" data-target="price_10">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox" class="myCheckbox" data-target="view_all_price">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
   <div class="col-md-2 mb-2">
     <h3 class="mt-1">
       <a class="mymultiplediv" id="carat" style="color:#ff8080;" title="100 Cents = 1 Carat">Carat Weight ?</a>
     </h3>
     <div class="mydiv" id="divcarat">
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
       <label class="letest_design"> 0.20 TO 0.29
         <input type="checkbox" class="myCheckbox" data-target="carat_1">
         <span class="checkmark"></span>
       </label>
       <div class="scrollable-container">
         <label class="letest_design">0.30 TO 0.39
           <input type="checkbox" class="myCheckbox" data-target="carat_2">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.40 TO 0.49
           <input type="checkbox" class="myCheckbox" data-targe="carat_3">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.50 TO 0.59
           <input type="checkbox" class="myCheckbox" data-target="carat_4">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.60 TO 0.69
           <input type="checkbox" class="myCheckbox" data-target="carat_5">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.70 TO 0.79
           <input type="checkbox" class="myCheckbox" data-target="carat_6">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.80 TO 0.89
           <input type="checkbox" class="myCheckbox" data-target="carat_7">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design" class="myCheckbox" data-target="carat_8">
           0.90 TO 0.99
           <input type="checkbox" class="myCheckbox" data-targe="carat_9">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.00 TO 1.20
           <input type="checkbox" class="myCheckbox" data-target="carat_10">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.20 to 1.49
           <input type="checkbox" class="myCheckbox" data-target="carat_11">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.50 to 1.69
           <input type="checkbox" class="myCheckbox" data-target="carat_12">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 1.70 to 1.99
           <input type="checkbox" class="myCheckbox" data-target="carat_13">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 2.00 to 2.49
           <input type="checkbox" class="myCheckbox" data-target="carat_14">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 2.50 to 2.99
           <input type="checkbox" class="myCheckbox" data-target="carat_15">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 3.00 to 3.99
           <input type="checkbox" class="myCheckbox" data-target="carat_16">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 4.00 to 4.99
           <input type="checkbox" class="myCheckbox" data-target="carat_17">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 5.00 to 5.99
           <input type="checkbox" class="myCheckbox" data-target="carat_18">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 6.00 to 6.99
           <input type="checkbox" class="myCheckbox" data-target="carat_19">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 7.00 to 7.99
           <input type="checkbox" class="myCheckbox" data-target="carat_20">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 8.00 to 8.99
           <input type="checkbox" class="myCheckbox" data-target="carat_21">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 9.00 to 9.99
           <input type="checkbox" class="myCheckbox" data-target="carat_22">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 10.00 to 14.99
           <input type="checkbox" class="myCheckbox" data-target="carat_23">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 15.00 to 19.99
           <input type="checkbox" class="myCheckbox" data-target="carat_24">
           <span class="checkmark"></span>
         </label>
       </div>
       <label class="letest_design"> 20+
         <input type="checkbox" class="myCheckbox" data-target="carat_25">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
   <div class="col-md-8 mb-2">
     <div class="d-md-block d-sm-none d-none">
       <h3>SHAPE</h3>
       <div class="shape_image_row">
         <div class="shape shbr" data-target="any_shape">
           <span>Any</span>
           <div class="shape_image any">
             Shape
           </div>
           <input type="checkbox" name="shape" value="any">
         </div>
         <div class="shape shbr" data-target="round">
           <span>Round</span>
           <div class="shape_image" title="Round">
             <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Round">
         </div>
         <div class="shape shbr" data-target="princess">
           <span>Princess</span>
           <div class="shape_image" title="Princess">
             <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Princess">
         </div>

         <div class="shape shbr" data-target="pear">
           <span>Pear</span>
           <div class="shape_image" title="Pear">
             <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Pear">
         </div>
         <div class="shape shbr" data-target="cushion">
           <span>Cushion</span>
           <div class="shape_image" title="Cushion">
             <img srcset="assets/images/shapes/Diamond Cushionn.png 320w, assets/images/shapes/Diamond Cushionn.png 640w, assets/images/shapes/Diamond Cushionn.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Diamond Cushionn.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Cushion">
         </div>
         <div class="shape shbr" data-target="asscher">
           <span>Asscher</span>
           <div class="shape_image" title="Asscher">
             <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Asscher">
         </div>
         <div class="shape shbr" data-target="radiant">
           <span>Radiant</span>
           <div class="shape_image" title="Radiant">
             <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Radiant">
         </div>

         <div class="shape shbr" data-target="oval">
           <span>Oval</span>
           <div class="shape_image" title="Oval">
             <img srcset="assets/images/shapes/oval diamond1.png 320w, assets/images/shapes/oval diamond1.png 640w, assets/images/shapes/oval diamond1.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/oval diamond1.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Oval">
         </div>
         <div class="shape shbr" data-target="shield">
           <span>Shield</span>
           <div class="shape_image" title="Shield">
             <img srcset="assets/images/shapes/shied.png 320w, assets/images/shapes/shied.png 640w, assets/images/shapes/shied.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/shied.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Shield">
         </div>
         <div class="shape shbr" data-target="Marquise">
           <span>Marqui?</span>
           <div class="shape_image" title="Marquise">
             <img srcset="assets/images/shapes/diamond marquise.png 320w, assets/images/shapes/diamond marquise.png 640w, assets/images/shapes/diamond marquise.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond marquise.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Marquise">
         </div>
         <div class="shape shbr" data-target="emerald">
           <span>Emerald</span>
           <div class="shape_image" title="Emerald">
             <img srcset="assets/images/shapes/Emerald2.png 320w, assets/images/shapes/Emerald2.png 640w, assets/images/shapes/Emerald2.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Emerald2.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Emerald">
         </div>
         <div class="shape shbr" data-target="heart">
           <span>Heart</span>
           <div class="shape_image" title="Heart">
             <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Heart">
         </div>
         
         <button class="toggle-button" type="button" data-target="labshape">
           <i
             class="fa fa-caret-down"></i></button>
       </div>
       <div data-toggle="labshape" style="display:none;">
         <div class="shape_image_row">
           <div class="shape shbr" data-target="cushmod">
             <span>Cush?</span>
             <div class="shape_image" title="Cush Mod">
               <img srcset="assets/images/shapes/cush_brill.png 320w, assets/images/shapes/cush_brill.png 640w, assets/images/shapes/cush_brill.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_brill.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cush Mod">
           </div>
           <div class="shape shbr" data-target="cushbrill">
             <span>Cush?</span>
             <div class="shape_image" title="Cush Brill">
               <img srcset="assets/images/shapes/cush_brill.png 320w, assets/images/shapes/cush_brill.png 640w, assets/images/shapes/cush_brill.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_brill.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cush Brill">
           </div>
           <div class="shape shbr" data-target="star">
             <span>Star</span>
             <div class="shape_image" title="Star">
               <img srcset="assets/images/shapes/star.png 320w, assets/images/shapes/star.png 640w, assets/images/shapes/star.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/star.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Star">
           </div>
           <div class="shape shbr" data-target="eurocut">
             <span>Euro?</span>
             <div class="shape_image" title="Euro Cut">
               <img srcset="assets/images/shapes/euro_cut.png 320w, assets/images/shapes/euro_cut.png 640w, assets/images/shapes/euro_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/euro_cut.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Euro Cut">
           </div>
           <div class="shape shbr" data-target="oldminer">
             <span>Old?</span>
             <div class="shape_image" title="Old Miner">
               <img srcset="assets/images/shapes/old_miner.png 320w, assets/images/shapes/old_miner.png 640w, assets/images/shapes/old_miner.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/old_miner.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Old Miner">
           </div>
           <div class="shape shbr" data-target="briolette">
             <span>Briolette</span>
             <div class="shape_image">
               <img src="assets/images/shapes/briolette.png" class="img-fluid" title="Briolette">
             </div>
             <input type="checkbox" name="shape" value="Briolette">
           </div>
           <div class="shape shbr" data-target="rosecut">
             <span>Rose Cut</span>
             <div class="shape_image" title="Rose Cut">
               <img srcset="assets/images/shapes/rose_cut.png 320w, assets/images/shapes/rose_cut.png 640w, assets/images/shapes/rose_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/rose_cut.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Rose Cut">
           </div>
           <div class="shape shbr" data-target="lozenge">
             <span>Lozenge</span>
             <div class="shape_image" title="Lozenge">
               <img srcset="assets/images/shapes/lozenge.png 320w, assets/images/shapes/lozenge.png 640w, assets/images/shapes/lozenge.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/lozenge.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Lozenge">
           </div>
           <div class="shape shbr" data-target="Baguette">
             <span>Baguette</span>
             <div class="shape_image" title="Baguette">
               <img srcset="assets/images/shapes/baguette.png 320w, assets/images/shapes/baguette.png 640w, assets/images/shapes/baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/baguette.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Baguette">
           </div>
           <div class="shape shbr" data-target="flanders">
             <span>Flanders</span>
             <div class="shape_image" title="Flanders">
               <img srcset="assets/images/shapes/flanders.png 320w, assets/images/shapes/flanders.png 640w, assets/images/shapes/flanders.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/flanders.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Flanders">
           </div>
           <div class="shape shbr" data-target="tapbaguette">
             <span>Tap?</span>
             <div class="shape_image" title="Tap Baguette">
               <img srcset="assets/images/shapes/tap_baguette.png 320w, assets/images/shapes/tap_baguette.png 640w, assets/images/shapes/tap_baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/tap_baguette.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Tap Baguette">
           </div>
           <div class="shape shbr" data-target="halfmoon">
             <span>Half?</span>
             <div class="shape_image" title="Half Moon">
               <img srcset="assets/images/shapes/halfmoon.png 320w, assets/images/shapes/halfmoon.png 640w, assets/images/shapes/halfmoon.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/halfmoon.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Half Moon">
           </div>
           <div class="shape shbr" data-taregt="trapezoid">
             <span>Trape?</span>
             <div class="shape_image" title="Trapezoid">
               <img srcset="assets/images/shapes/trapezeoid.png 320w, assets/images/shapes/trapezeoid.png 640w, assets/images/shapes/trapezeoid.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/trapezeoid.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Trapezoid">
           </div>
           <div class="shape shbr" data-target="Bullets">
             <span>Bullets</span>
             <div class="shape_image" title="Bullets">
               <img srcset="assets/images/shapes/bullet.png 320w, assets/images/shapes/bullet.png 640w, assets/images/shapes/bullet.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/bullet.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Bullets">
           </div>
           <div class="shape shbr" data-target="kite">
             <span>Kite</span>
             <div class="shape_image" title="Kite">
               <img srcset="assets/images/shapes/kite.png 320w, assets/images/shapes/kite.png 640w, assets/images/shapes/kite.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/kite.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Kite">
           </div>
           <div class="shape shbr" data-target="octagonal">
             <span>Octa?</span>
             <div class="shape_image" title="Octagonal">
               <img srcset="assets/images/shapes/octagonal.png 320w, assets/images/shapes/octagonal.png 640w, assets/images/shapes/octagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/octagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Octagonal">
           </div>

           <div class="shape shbr" data-target="squarecushion">
             <span>Square?</span>
             <div class="shape_image" title="Square Cushion">
               <img srcset="assets/images/shapes/square_cushion.png 320w, assets/images/shapes/square_cushion.png 640w, assets/images/shapes/square_cushion.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/square_cushion.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Square Cushion">
           </div>
           <div class="shape shbr" data-target="curved">
             <span>Curved</span>
             <div class="shape_image" title="Curved">
               <img srcset="assets/images/shapes/cushion diamond.png 320w, assets/images/shapes/cushion diamond.png 640w, assets/images/shapes/cushion diamond.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cushion diamond.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Curved">
           </div>
           <div class="shape shbr" data-target="trillion">
             <span>Trillion</span>
             <div class="shape_image" title="Trillion">
               <img srcset="assets/images/shapes/Trilliant.png 320w, assets/images/shapes/Trilliant.png 640w, assets/images/shapes/Trilliant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Trilliant.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Trillion">
           </div>
           <div class="shape shbr" data-target="pentagonal">
             <span>Penta?</span>
             <div class="shape_image" title="Pentagonal">
               <img srcset="assets/images/shapes/pentagonal.png 320w, assets/images/shapes/pentagonal.png 640w, assets/images/shapes/pentagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/pentagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Pentagonal">
           </div>
           <div class="shape shbr" data-target="hexagonal">
             <span>Hexa?</span> 
             <div class="shape_image" title="Hexagonal">
               <img srcset="assets/images/shapes/hexagonal.png 320w, assets/images/shapes/hexagonal.png 640w, assets/images/shapes/hexagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/hexagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Hexagonal">
           </div>
         </div>
       </div>

       <div class="product_landing_table">
         <table class="table-bordered table_product mb-2 table-responsive mt-2">
           <thead>
             <tr>
               <th></th>
               <th colspan="2">COLOR</th>
               <th colspan="3">CLARITY</th>
               <th>CUT</th>
               <th colspan="2">CERTIFICATE</th>
             </tr>
           </thead>
           <tbody>
             <tr> 
               <th style="background:#f59d9d;">BEST<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><br>(For All)</th>
               <th style="text-align: center;vertical-align: middle;">
               <div class="shape_color shbr" data-target="cobr" style="display:inline-block; text-align:center;">
                 <span>D</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/D-1." class="img-fluid mymultiplediv" id="ld">
                 </div>png
                 <div class="color_explain mydiv" id="divld" style="display: none;">
                   <p>D - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th> 
               <th style="text-align: center;vertical-align: middle;">
               <div class="shape_color shbr" data-target="cobr" style="display: inline-block; text-align:center;">
                 <span>E</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="le">
                 </div>
                 <div class="color_explain mydiv" id="divle" style="display: none;">
                   <p>E - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th>
               <th style="text-align: center;vertical-align: middle;">
                 <div class="round_image" style="display: inline-block; text-align:center;">
                 <span class="mymultiplediv" id="flpr">FL/IF?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/D-1.png" class="mymultiplediv img-fluid" id="flvpr">
                   <div class="fl_video_pro mydiv" id="divflpr" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/1-FL.mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>Flawless/ Internally Flawless </b>
                         <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL
                           and IF
                           diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                           Extremely rare,
                           less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                           quality diamonds
                           are rated IF.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divflvpr" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/D-1.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>Flawless/ Internally Flawless </b>
                       <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL and
                         IF
                         diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                         Extremely rare,
                         less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                         quality diamonds
                         are rated IF.</p>
                     </div>
                   </div>
                 </div>
               </div>
               </th>
               <th style="text-align: center;vertical-align: middle;">
                 <div class="round_image" style="display: inline-block; text-align:center;">
                 <span class="mymultiplediv" id="vpr">VVS1?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="vprl">
                   <div class="fl_video_pro mydiv" id="divvpr" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/2-VVS1.mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>VVS1-Very, Very Slightly Included</b>
                         <p> Inclusions are difficult for a skilled grader to see under 10x magnification. VVS1
                           inclusions are
                           typically only visible from the pavilion, while VVS2 inclusions are visible from the
                           crown. In each,
                           the inclusions are invisible to the eye, appearing identical to the higher grades unless
                           viewed under
                           10x magnification by a skilled grader.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divvprl" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/E.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>VVS1-Very, Very Slightly</b>VVS1
                       <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                         inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                         from the
                         crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                         grades
                         unless viewed under 10x magnification by a skilled grader.</p>
                     </div>
                   </div>
                 </div>
               </div>
             </th>
             <th style="text-align: center;vertical-align: middle;">
               <div class="round_image" style="display: inline-block; text-align:center;">
                 <span class="mymultiplediv" id="prf">VVS2?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/F.png" class="img-fluid mymultiplediv" id="prvs">
                   <div class="fl_video_pro mydiv" id="divprf" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/2-VVS1 (1).mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>VVS2-Very, Very Slightly</b>
                         <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                           VVS1
                           inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                           from the
                           crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                           grades
                           unless viewed under 10x magnification by a skilled grader.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divprvs" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/F.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>VVS2-Very, Very Slightly</b>
                       <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                         VVS1
                         inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                         from the
                         crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                         grades
                         unless viewed under 10x magnification by a skilled grader.</p>
                     </div>
                   </div>
                 </div>
               </div>
             </th>
               <th>EXCELLENT</th>
               <th>GIA</th>
               <th>IGI</th>
             </tr>
             <tr>
               <td style="text-align: center;vertical-align: middle;">
               <input type="checkbox" id="best3-checkbox"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
               <td><input type="checkbox" class="sub-checkbox3"></td>
             </tr>
             <tr> 
               <th style="background: #7de582;">VERY GOOD <i class="fa fa-arrow-circle-right" aria-hidden="true"></i><br>(For All)</th>
               <th style="text-align: center;vertical-align: middle;">
               <div class="shape_color shbr" data-target="cobr" style="display: inline-block;text-align:center;">
                 <span>F</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/D-1.png" class="img-fluid mymultiplediv" id="ld">
                 </div>
                 <div class="color_explain mydiv" id="divld" style="display: none;">
                   <p>F - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th> 
               <th style="text-align: center;vertical-align: middle;">
                 <div class="shape_color shbr" data-target="cobr" style="display: inline-block;text-align:center;">
                 <span>G</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="le">
                 </div>
                 <div class="color_explain mydiv" id="divle" style="display: none;">
                   <p>G - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th>
               <th style="text-align: center;vertical-align: middle;">
                 <div class="round_image" style="display: inline-block;text-align:center;">
                 <span class="mymultiplediv" id="flpr">VS1?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/D-1.png" class="mymultiplediv img-fluid" id="flvpr">
                   <div class="fl_video_pro mydiv" id="divflpr" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/1-FL.mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>Flawless/ Internally Flawless </b>
                         <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL
                           and IF
                           diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                           Extremely rare,
                           less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                           quality diamonds
                           are rated IF.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divflvpr" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/D-1.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>Flawless/ Internally Flawless </b>
                       <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL and
                         IF
                         diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                         Extremely rare,
                         less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                         quality diamonds
                         are rated IF.</p>
                     </div>
                   </div>
                 </div>
               </div>
               </th>
               <th colspan="2" style="text-align: center;vertical-align: middle;">
                 <div class="round_image" style="display: inline-block;text-align: center;">
                 <span class="mymultiplediv" id="vpr">VS2?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="vprl">
                   <div class="fl_video_pro mydiv" id="divvpr" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/2-VVS1.mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>VVS1-Very, Very Slightly Included</b>
                         <p> Inclusions are difficult for a skilled grader to see under 10x magnification. VVS1
                           inclusions are
                           typically only visible from the pavilion, while VVS2 inclusions are visible from the
                           crown. In each,
                           the inclusions are invisible to the eye, appearing identical to the higher grades unless
                           viewed under
                           10x magnification by a skilled grader.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divvprl" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/E.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>VVS1-Very, Very Slightly</b>VVS1
                       <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                         inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                         from the
                         crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                         grades
                         unless viewed under 10x magnification by a skilled grader.</p>
                     </div>
                   </div>
                 </div>
               </div>
             </th>
               <th>IDEAL</th>
               <th>IGI</th>
               <th>OTHERS</th>
             </tr>
             <tr>
               <td style="text-align: center;vertical-align: middle;">
               <input type="checkbox" id="best4-checkbox"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
               <td colspan="2"><input type="checkbox" class="sub-checkbox4"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
               <td><input type="checkbox" class="sub-checkbox4"></td>
             </tr>
             <tr> 
               <th style="background:#f5f586;">Good <i class="fa fa-arrow-circle-right" aria-hidden="true"></i><br>(For All)</th>
               <th style="text-align: center;vertical-align: middle;">
               <div class="shape_color shbr" data-target="cobr" style="display: inline-block;text-align:center;">
                 <span>H</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/D-1.png" class="img-fluid mymultiplediv" id="ld">
                 </div>
                 <div class="color_explain mydiv" id="divld" style="display:none;">
                   <p>H - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th> 
             <th style="text-align: center;vertical-align: middle;">
                 <div class="shape_color shbr" data-target="cobr" style="display: inline-block;text-align: center;">
                 <span>I</span>
                 <div class="color_type">
                   <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="le">
                 </div>
                 <div class="color_explain mydiv" id="divle" style="display: none;">
                   <p>I - is world's best, super white &amp; lustre</p>
                 </div>
               </div>
             </th>
               
             <th colspan="3" style="text-align: center;vertical-align: middle;">
                 <div class="round_image" style="display: inline-block;text-align:center;">
                 <span class="mymultiplediv" id="prf">SI1?</span>
                 <div class="round_vv">
                   <img src="assets/images/clarity/F.png" class="img-fluid mymultiplediv" id="prvs">
                   <div class="fl_video_pro mydiv" id="divprf" style="display: none;">
                     <div class="row">
                       <div class="col-md-4">
                         <video width="170" height="170" controls="controls" loop="" autoplay="">
                           <source src="assets/images/2-VVS1 (1).mp4" type="video/mp4">
                         </video>
                       </div>
                       <div class="col-md-8">
                         <b>VVS2-Very, Very Slightly</b>
                         <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                           VVS1
                           inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                           from the
                           crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                           grades
                           unless viewed under 10x magnification by a skilled grader.</p>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="fl_detail_pro mydiv" id="divprvs" style="display: none;">
                   <div class="row">
                     <div class="col-md-4">
                       <img src="assets/images/clarity/F.png" class="img-fluid">
                     </div>
                     <div class="col-md-8">
                       <b>VVS2-Very, Very Slightly</b>
                       <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                         VVS1
                         inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                         from the
                         crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                         grades
                         unless viewed under 10x magnification by a skilled grader.</p>
                     </div>
                   </div>
                 </div>
               </div>
             </th>
               <th>Good</th>
               <th></th>
               <th>Any</th>
             </tr>
             <tr>
               <td style="text-align: center;vertical-align: middle;">
                 <input type="checkbox" id="best5-checkbox"></td>
               <td><input type="checkbox" class="sub-checkbox5"></td>
               <td><input type="checkbox" class="sub-checkbox5"></td>
               <td colspan="3"><input type="checkbox" class="sub-checkbox5"></td>
               <td><input type="checkbox" class="sub-checkbox5"></td>
               <td></td>
               <td><input type="checkbox" class="sub-checkbox5"></td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>

     <div class="d-md-none d-sm-block">
       <h3>SHAPE</h3>
       <div class="shape_image_row">
         <div class="shape shbr" data-target="any_shape">
           <span>Any</span>
           <div class="shape_image any">
             Shape
           </div>
           <input type="checkbox" name="shape" value="any">
         </div>
         <div class="shape shbr" data-target="round">
           <span>Round</span>
           <div class="shape_image" title="Round">
             <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Round">
         </div>
         <div class="shape shbr" data-target="oval">
           <span>Oval</span>
           <div class="shape_image" title="Oval">
             <img srcset="assets/images/shapes/oval diamond1.png 320w, assets/images/shapes/oval diamond1.png 640w, assets/images/shapes/oval diamond1.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/oval diamond1.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Oval">
         </div>
         <div class="shape shbr" data-target="shield">
           <span>Shield</span>
           <div class="shape_image" title="Shield">
             <img srcset="assets/images/shapes/shied.png 320w, assets/images/shapes/shied.png 640w, assets/images/shapes/shied.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/shied.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Shield">
         </div>
         <div class="shape shbr" data-target="Marquise">
           <span>Marqui?</span>
           <div class="shape_image" title="Marquise">
             <img srcset="assets/images/shapes/diamond marquise.png 320w, assets/images/shapes/diamond marquise.png 640w, assets/images/shapes/diamond marquise.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond marquise.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Marquise">
         </div>
         <div class="shape shbr" data-target="pear">
           <span>Pear</span>
           <div class="shape_image" title="Pear">
             <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
           </div>
           <input type="checkbox" name="shape" value="Pear">
         </div>
         <button class="toggle-button" type="button" data-target="labshamo"><i
             class="fa fa-caret-down"></i></button>
       </div>
       <div data-toggle="labshamo" style="display:none;">
         <div class="shape_image_row">
           <div class="shape shbr" data-target="princess">
             <span>Princess</span>
             <div class="shape_image" title="Princess">
               <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Princess">
           </div>
           <div class="shape shbr" data-target="asscher">
             <span>Asscher</span>
             <div class="shape_image" title="Asscher">
               <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Asscher">
           </div>
           <div class="shape shbr" data-target="radiant">
             <span>Radiant</span>
             <div class="shape_image" title="Radiant">
               <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Radiant">
           </div>
           <div class="shape shbr" data-target="emerald">
             <span>Emerald</span>
             <div class="shape_image" title="Emerald">
               <img srcset="assets/images/shapes/Emerald2.png 320w, assets/images/shapes/Emerald2.png 640w, assets/images/shapes/Emerald2.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Emerald2.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Emerald">
           </div>
           <div class="shape shbr" data-target="heart">
             <span>Heart</span>
             <div class="shape_image" title="Heart">
               <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Heart">
           </div>
           <div class="shape shbr" data-target="cushion">
             <span>Cushion</span>
             <div class="shape_image" title="Cushion">
               <img srcset="assets/images/shapes/Diamond Cushionn.png 320w, assets/images/shapes/Diamond Cushionn.png 640w, assets/images/shapes/Diamond Cushionn.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Diamond Cushionn.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cushion">
           </div>
           <div class="shape shbr" data-target="cushmod">                                                                                                                                       
             <span>Cush?</span>
             <div class="shape_image" title="Cush Mod">
               <img srcset="assets/images/shapes/cush_mod.png 320w, assets/images/shapes/cush_mod.png 640w, assets/images/shapes/cush_mod.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_mod.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cush Mod">
           </div>
           <div class="shape shbr" data-target="cushbrill">
             <span>Cush?</span>
             <div class="shape_image" title="Cush Brill">
               <img srcset="assets/images/shapes/cush_brill.png 320w, assets/images/shapes/cush_brill.png 640w, assets/images/shapes/cush_brill.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_brill.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cush Brill">
           </div>
           <div class="shape shbr" data-target="star">
             <span>Star</span>
             <div class="shape_image" title="Star">
               <img srcset="assets/images/shapes/star.png 320w, assets/images/shapes/star.png 640w, assets/images/shapes/star.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/star.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Star">
           </div>
           <div class="shape shbr" data-target="eurocut">
             <span>Euro?</span>
             <div class="shape_image" title="Euro Cut">
               <img srcset="assets/images/shapes/euro_cut.png 320w, assets/images/shapes/euro_cut.png 640w, assets/images/shapes/euro_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/euro_cut.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Euro Cut">
           </div>
           <div class="shape shbr" data-target="oldminer">
             <span>Old?</span>
             <div class="shape_image" title="Old Miner">
               <img srcset="assets/images/shapes/old_miner.png 320w, assets/images/shapes/old_miner.png 640w, assets/images/shapes/old_miner.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/old_miner.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Old Miner">
           </div>
           <div class="shape shbr" data-target="briolette">
             <span>Briolette</span>
             <div class="shape_image">
               <img src="assets/images/shapes/briolette.png" class="img-fluid" title="Briolette">
             </div>
             <input type="checkbox" name="shape" value="Briolette">
           </div>
           <div class="shape shbr" data-target="rosecut">
             <span>Rose Cut</span>
             <div class="shape_image" title="Rose Cut">
               <img srcset="assets/images/shapes/rose_cut.png 320w, assets/images/shapes/rose_cut.png 640w, assets/images/shapes/rose_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/rose_cut.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Rose Cut">
           </div>
           <div class="shape shbr" data-target="lozenge">
             <span>Lozenge</span>
             <div class="shape_image" title="Lozenge">
               <img srcset="assets/images/shapes/lozenge.png 320w, assets/images/shapes/lozenge.png 640w, assets/images/shapes/lozenge.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/lozenge.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Lozenge">
           </div>
           <div class="shape shbr" data-target="Baguette">
             <span>Baguette</span>
             <div class="shape_image" title="Baguette">
               <img srcset="assets/images/shapes/baguette.png 320w, assets/images/shapes/baguette.png 640w, assets/images/shapes/baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/baguette.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Baguette">
           </div>
           <div class="shape shbr" data-target="flanders">
             <span>Flanders</span>
             <div class="shape_image" title="Flanders">
               <img srcset="assets/images/shapes/flanders.png 320w, assets/images/shapes/flanders.png 640w, assets/images/shapes/flanders.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/flanders.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Flanders">
           </div>
           <div class="shape shbr" data-target="tapbaguette">
             <span>Tap?</span>
             <div class="shape_image" title="Tap Baguette">
               <img srcset="assets/images/shapes/tap_baguette.png 320w, assets/images/shapes/tap_baguette.png 640w, assets/images/shapes/tap_baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/tap_baguette.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Tap Baguette">
           </div>
           <div class="shape shbr" data-target="halfmoon">
             <span>Half?</span>
             <div class="shape_image" title="Half Moon">
               <img srcset="assets/images/shapes/halfmoon.png 320w, assets/images/shapes/halfmoon.png 640w, assets/images/shapes/halfmoon.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/halfmoon.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Half Moon">
           </div>
           <div class="shape shbr" data-taregt="trapezoid">
             <span>Trape?</span>
             <div class="shape_image" title="Trapezoid">
               <img srcset="assets/images/shapes/trapezeoid.png 320w, assets/images/shapes/trapezeoid.png 640w, assets/images/shapes/trapezeoid.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/trapezeoid.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Trapezoid">
           </div>
           <div class="shape shbr" data-target="Bullets">
             <span>Bullets</span>
             <div class="shape_image" title="Bullets">
               <img srcset="assets/images/shapes/bullet.png 320w, assets/images/shapes/bullet.png 640w, assets/images/shapes/bullet.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/bullet.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Bullets">
           </div>
           <div class="shape shbr" data-target="kite">
             <span>Kite</span>
             <div class="shape_image" title="Kite">
               <img srcset="assets/images/shapes/kite.png 320w, assets/images/shapes/kite.png 640w, assets/images/shapes/kite.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/kite.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Kite">
           </div>
           <div class="shape shbr" data-target="octagonal">
             <span>Octa?</span>
             <div class="shape_image" title="Octagonal">
               <img srcset="assets/images/shapes/octagonal.png 320w, assets/images/shapes/octagonal.png 640w, assets/images/shapes/octagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/octagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Octagonal">
           </div>

           <div class="shape shbr" data-target="squarecushion">
             <span>Square?</span>
             <div class="shape_image" title="Square Cushion">
               <img srcset="assets/images/shapes/square_cushion.png 320w, assets/images/shapes/square_cushion.png 640w, assets/images/shapes/square_cushion.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/square_cushion.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Square Cushion">
           </div>
           <div class="shape shbr" data-target="curved">
             <span>Curved</span>
             <div class="shape_image" title="Curved">
               <img srcset="assets/images/shapes/cushion diamond.png 320w, assets/images/shapes/cushion diamond.png 640w, assets/images/shapes/cushion diamond.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cushion diamond.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Curved">
           </div>
           <div class="shape shbr" data-target="trillion">
             <span>Trillion</span>
             <div class="shape_image" title="Trillion">
               <img srcset="assets/images/shapes/Trilliant.png 320w, assets/images/shapes/Trilliant.png 640w, assets/images/shapes/Trilliant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Trilliant.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Trillion">
           </div>
           <div class="shape shbr" data-target="pentagonal">
             <span>Penta?</span>
             <div class="shape_image" title="Pentagonal">
               <img srcset="assets/images/shapes/pentagonal.png 320w, assets/images/shapes/pentagonal.png 640w, assets/images/shapes/pentagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/pentagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Pentagonal">
           </div>
           <div class="shape shbr" data-target="hexagonal">
             <span>Hexa?</span> 
             <div class="shape_image" title="Hexagonal">
               <img srcset="assets/images/shapes/hexagonal.png 320w, assets/images/shapes/hexagonal.png 640w, assets/images/shapes/hexagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/hexagonal.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Hexagonal">
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!------quick search end--------->

<div class="tab" id="fancy_lbd">
 <div class="cate_bread_gia">
   <div id="boxThis">
     <ul id="breadcrumb">
       <li id="text" style="display:none">0.20 to 0.29</li>
       <li id="text1" style="display:none">0.30 to 0.39</li>
       <li id="text2" style="display:none">0.40 to 0.49</li>
       <li id="text3" style="display:none">0.50 to 0.59 </li>
       <li id="text4" style="display:none">0.60 TO 0.69</li>
       <li id="text5" style="display:none">0.70 TO 0.79</li>
       <!--<span id="breadcrumbShape" style="display:none"></span>-->
       <li id="text6" style="display:none">0.80 TO 0.89</li>
       <li id="text7" style="display:none">0.90 TO 0.99</li>
       <li id="text8" style="display:none">1.00 TO 1.20</li>
       <li id="text9" style="display:none">1.20 to 1.49 </li>
       <li id="text10" style="display:none">1.50 to 1.69</li>
       <li id="text11" style="display:none">1.70 to 1.99 </li>
       <li id="text12" style="display:none">2.00 to 2.49</li>
       <li id="text13" style="display:none">2.50 to 2.99</li>
       <li id="round1" style="display:none">Round</li>
       <li id="cobr" style="display:none">D</li>
     </ul>
   </div>
   <div class="btn-group cate_search_gia">
     <button type="button" class="clear_all mt-1">Show Diamonds Availability
     </button>
   </div>
 </div>
 <hr>
 <div class="row">
   <div class="col-md-3 mb-2">
     <h3 class="mt-1">PRICE RANGE</h3>
     <div class="sele mt-1">
       <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
   <div class="col-md-2 mb-2">
     <h3 class="mt-1">
       <a class="mymultiplediv" id="carat_2" title="100 Cents = 1 Carat" style="color:#ff8080;">Carat Weight ?</a>
     </h3>
     <div class="mydiv" id="divcarat_2">
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
       <label class="letest_design"> 0.20 TO 0.29
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <div class="scrollable-container">
         <label class="letest_design">0.30 TO 0.39
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.40 TO 0.49
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.50 TO 0.59
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.60 TO 0.69
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.70 TO 0.79
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.80 TO 0.89
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">0.90 TO 0.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.00 TO 1.20
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.20 to 1.49
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design">1.50 to 1.69
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 1.70 to 1.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 2.00 to 2.49
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 2.50 to 2.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 3.00 to 3.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 4.00 to 4.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 5.00 to 5.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 6.00 to 6.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 7.00 to 7.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 8.t00 o 8.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 9.00 to 9.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 10.00 to 14.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> 15.00 to 19.99
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
       <label class="letest_design"> 20+
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
   <div class="col-md-7 mb-2">
       <div class="d-md-block d-sm-none d-none">
         <div class="shape_heading">
           <strong>Select Shape</strong>
         </div>
         <div class="shape_image_row">
           <div class="shape">
             <span>Any</span>
             <div class="shape_image any">
               Shape
             </div>
             <input type="checkbox" name="shape" value="Other">
           </div>
           <div class="shape shbr" data-target="round">
             <span>Round</span>
             <div class="shape_image" title="Round" tabindex="0">
               <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Round">
           </div>
           <div class="shape">
             <span>Princess</span>
             <div class="shape_image" title="Princess" tabindex="0">
               <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Princess">
           </div>
           <div class="shape">
             <span>Pear</span>
             <div class="shape_image" title="Pear" tabindex="0">
               <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Pear">
           </div>
           <div class="shape">
             <span>Cushion</span>
             <div class="shape_image" title="Cushion">
               <img src="assets/images/shapes/cushion diamond.png" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Cushion">
           </div>
           <div class="shape">
             <span>Asscher</span>
             <div class="shape_image" title="Asscher" tabindex="0">
               <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Asscher">
           </div>
            
           <div class="shape">
             <span>Radiant</span>
             <div class="shape_image" title="Radiant">
               <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Radiant">
           </div>
           <div class="shape" data-target="text7">
             <span>Oval</span>
             <div class="shape_image" title="Oval" tabindex="0">
               <img srcset="assets/images/shapes/oval diamond1.png 320w, assets/images/shapes/oval diamond1.png 640w, assets/images/shapes/oval diamond1.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/oval diamond1.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Oval">
           </div>

           <div class="shape">
             <span>Shield</span>
             <div class="shape_image" title="Shield" tabindex="0">
               <img srcset="assets/images/shapes/shied.png 320w, assets/images/shapes/shied.png 640w, assets/images/shapes/shied.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/shied.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Shield">
           </div>

           <div class="shape">
             <span>Marquise</span>
             <div class="shape_image">
               <img src="assets/images/shapes/diamond marquise.png" class="img-fluid" title="Marquise">
             </div>
             <input type="checkbox" name="shape" value="Marquise">
           </div>                  
           <button class="toggle-button" type="button" data-target="mslab"><i
               class="fa fa-caret-down"></i></button>
         </div>
         <div data-toggle="mslab" style="display:none;">
           <div class="shape_image_row">
             <div class="shape">
               <span>Emerald</span>
               <div class="shape_image" title="Emerald">
                 <img src="assets/images/shapes/Diamond Emerald.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Emerald">
             </div>
             <div class="shape">
               <span>Heart</span>
               <div class="shape_image" title="Heart">
                 <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Heart">
             </div>
             
             <div class="shape">
               <span>Cush?</span>
               <div class="shape_image" title="Cush Mod">
                 <img src="assets/images/shapes/Assher.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Cush Mod">
             </div>
             <div class="shape">
               <span>Cush?</span>
               <div class="shape_image" title="Cush Brill">
                 <img srcset="assets/images/shapes/cush_brill.png 320w, assets/images/shapes/cush_brill.png 640w, assets/images/shapes/cush_brill.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_brill.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Cush Brill">
             </div>
             <div class="shape">
               <span>Star</span>
               <div class="shape_image" title="Star">
                 <img srcset="assets/images/shapes/star.png 320w, assets/images/shapes/star.png 640w, assets/images/shapes/star.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/star.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Star">
             </div>
             <div class="shape">
               <span>Euro Cut</span>
               <div class="shape_image">
                 <img srcset="assets/images/shapes/euro_cut.png 320w, assets/images/shapes/euro_cut.png 640w, assets/images/shapes/euro_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/euro_cut.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Euro Cut">      
             </div>
             <div class="shape">
               <span>Old?</span>
               <div class="shape_image" title="Old Miner">
                 <img srcset="assets/images/shapes/old_miner.png 320w, assets/images/shapes/old_miner.png 640w, assets/images/shapes/old_miner.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/old_miner.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Old Miner">
             </div>
             <div class="shape">
               <span>Briolette</span>
               <div class="shape_image" title="Briolette">
                 <img src="assets/images/shapes/briolette.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Briolette">
             </div>
             <div class="shape">
               <span>Rose Cut</span>
               <div class="shape_image" title="Rose Cut">
                 <img srcset="assets/images/shapes/rose_cut.png 320w, assets/images/shapes/rose_cut.png 640w, assets/images/shapes/rose_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/rose_cut.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Rose Cut">
             </div>
             <div class="shape">
               <span>Lozenge</span>
               <div class="shape_image" title="Lozenge">
                 <img srcset="assets/images/shapes/lozenge.png 320w, assets/images/shapes/lozenge.png 640w, assets/images/shapes/lozenge.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/lozenge.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Lozenge">
             </div>
             <div class="shape">
               <span>Baguette</span>
               <div class="shape_image" title="Baguette">
                 <img srcset="assets/images/shapes/baguette.png 320w, assets/images/shapes/baguette.png 640w, assets/images/shapes/baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/baguette.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Baguette">
             </div>
             <div class="shape">
               <span>Flanders</span>
               <div class="shape_image" title="Flanders">
                 <img srcset="assets/images/shapes/flanders.png 320w, assets/images/shapes/flanders.png 640w, assets/images/shapes/flanders.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/flanders.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Flanders">
             </div>
             <div class="shape">
               <span>Tap?</span>
               <div class="shape_image" title="Tap Baguette">
                 <img srcset="assets/images/shapes/tap_baguette.png 320w, assets/images/shapes/tap_baguette.png 640w, assets/images/shapes/tap_baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/tap_baguette.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Tap Baguette">
             </div>
             <div class="shape">
               <span>Half?</span>
               <div class="shape_image" title="Half Moon" tabindex="0">
                 <img srcset="assets/images/shapes/halfmoon.png 320w, assets/images/shapes/halfmoon.png 640w, assets/images/shapes/halfmoon.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/halfmoon.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Half Moon">
             </div>
             <div class="shape">
               <span>Trape?</span>
               <div class="shape_image" title="Trapezoid">
                 <img srcset="assets/images/shapes/trapezeoid.png 320w, assets/images/shapes/trapezeoid.png 640w, assets/images/shapes/trapezeoid.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/trapezeoid.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Trapezoid">
             </div>
             <div class="shape">
               <span>Bullets</span>
               <div class="shape_image" title="Bullets">
                 <img srcset="assets/images/shapes/bullet.png 320w, assets/images/shapes/bullet.png 640w, assets/images/shapes/bullet.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/bullet.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Bullets">
             </div>
             <div class="shape">
               <span>Kite</span>
               <div class="shape_image" title="Kite">
                 <img srcset="assets/images/shapes/kite.png 320w, assets/images/shapes/kite.png 640w, ass5ets/images/shapes/kite.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/kite.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Kite">
             </div>
             <div class="shape">
               <span>Octa?</span>
               <div class="shape_image" title="Octagonal">
                 <img srcset="assets/images/shapes/octagonal.png 320w, assets/images/shapes/octagonal.png 640w, assets/images/shapes/octagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/octagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Octagonal">
             </div>
             <div class="shape">
               <span>Square?</span>
               <div class="shape_image" title="Square Cushion">
                 <img srcset="assets/images/shapes/square_cushion.png 320w, assets/images/shapes/square_cushion.png 640w, assets/images/shapes/square_cushion.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/square_cushion.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Square Cushion">
             </div>
             <div class="shape">
               <span>Curved</span>
               <div class="shape_image" title="Curved" tabindex="0">
                 <img src="assets/images/shapes/cushion diamond.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Curved">
             </div>
             <div class="shape">
               <span>Trillion</span>
               <div class="shape_image" title="Trillion">
                 <img srcset="assets/images/shapes/Trilliant.png 320w, assets/images/shapes/Trilliant.png 640w, assets/images/shapes/Trilliant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Trilliant.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Trillion">
             </div>

             <div class="shape">
               <span>Penta?</span>
               <div class="shape_image" title="Pentagonal">
                 <img srcset="assets/images/shapes/pentagonal.png 320w, assets/images/shapes/pentagonal.png 640w, assets/images/shapes/pentagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/pentagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Pentagonal">
             </div>
             <div class="shape">
               <span>Hexa?</span>
               <div class="shape_image" title="Hexagonal">
                 <img srcset="assets/images/shapes/hexagonal.png 320w, assets/images/shapes/hexagonal.png 640w, assets/images/shapes/hexagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/hexagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Hexagonal">
             </div>
             <div class="shape">
               <span>Shape</span>
               <div class="shape_image any">
                 <span>View All</span>
               </div>
               <input type="checkbox" name="shape" value="View All">
             </div>
           </div>
         </div>
         <div class="shape_heading mt-2">
           <strong>SELECT CLARITY</strong>
         </div>
         <div class="mb-2 select_clerity_row">
           <div class="round_image">
             <span>Any</span>
             <div class="round_vv any">
               Clarity
             </div>
             <input type="checkbox" name="clarity" value="Other">
           </div>

           <div class="round_image">
             <span class="mymultiplediv" id="flpr">FL/IF?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/D-1.png" class="mymultiplediv img-fluid" id="flvpr">
               <div class="fl_video_pro mydiv" id="divflpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/1-FL.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>Flawless/ Internally Flawless </b>
                     <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL
                       and IF
                       diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                       Extremely rare,
                       less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                       quality diamonds
                       are rated IF.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="FL/IF">
             <div class="fl_detail_pro mydiv" id="divflvpr">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/D-1.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>Flawless/ Internally Flawless </b>
                   <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL and
                     IF
                     diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                     Extremely rare,
                     less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                     quality diamonds
                     are rated IF.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="vpr">VVS1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="vprl">
               <div class="fl_video_pro mydiv" id="divvpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/2-VVS1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VVS1-Very, Very Slightly Included</b>
                     <p> Inclusions are difficult for a skilled grader to see under 10x magnification. VVS1
                       inclusions are
                       typically only visible from the pavilion, while VVS2 inclusions are visible from the
                       crown. In each,
                       the inclusions are invisible to the eye, appearing identical to the higher grades unless
                       viewed under
                       10x magnification by a skilled grader.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VVS1">
             <div class="fl_detail_pro mydiv" id="divvprl">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/E.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VVS1-Very, Very Slightly</b>VVS1
                   <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                     inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                     from the
                     crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                     grades
                     unless viewed under 10x magnification by a skilled grader.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="prf">VVS2?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/F.png" class="img-fluid mymultiplediv" id="prvs">
               <div class="fl_video_pro mydiv" id="divprf">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/2-VVS1 (1).mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VVS2-Very, Very Slightly</b>
                     <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                       VVS1
                       inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                       from the
                       crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                       grades
                       unless viewed under 10x magnification by a skilled grader.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VVS2">
             <div class="fl_detail_pro mydiv" id="divprvs">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/F.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VVS2-Very, Very Slightly</b>
                   <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                     VVS1
                     inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                     from the
                     crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                     grades
                     unless viewed under 10x magnification by a skilled grader.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="vsprf">VS1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/G.png" class="img-fluid mymultiplediv" id="fprf">
               <div class="fl_video_pro mydiv" id="divvsprf">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/4-VS1 -1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8 mb-2">
                     <b>VS1-Very Slightly</b>
                     <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                       as
                       minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                       VS2
                       inclusions with the naked eye, on close inspection under ideal conditions.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VS1">
             <div class="fl_detail_pro mydiv" id="divfprf">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/G.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VS1-Very Slightly</b>
                   <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                     as
                     minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                     VS2
                     inclusions with the naked eye, on close inspection under ideal conditions.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="svpr">VS2?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/H.png" class="img-fluid mymultiplediv" id="rpvs">
               <div class="fl_video_pro mydiv" id="divsvpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/4-VS1 -1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VS2-Very Slightly</b>
                     <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                       as
                       minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                       VS2
                       inclusions with the naked eye, on close inspection under ideal conditions.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VS2">
             <div class="fl_detail_pro mydiv" id="divrpvs">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/H.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VS2-Very Slightly</b>
                   <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                     as
                     minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                     VS2
                     inclusions with the naked eye, on close inspection under ideal conditions.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="sipr">SI1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/I.png" class="img-fluid mymultiplediv" id="si1pr">
               <div class="fl_video_pro mydiv" id="divsipr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/7-SI2.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>SI2-Slightly Included</b>
                     <p> Inclusions are noticeable to a skilled grader using 10x magnification. SI1 &amp; SI2
                       inclusions are
                       usually visible to the naked eye, although they will require close inspection.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="SI1">
             <div class="fl_detail_pro mydiv" id="divsi1pr">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/I.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>SI1-Slightly Included</b>
                   <p> Inclusions are noticeable to a skilled grader using 10x magnification. SI1 &amp; SI2
                     inclusions are
                     usually visible to the naked eye, although they will require close inspection.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="shape_heading mt-2">
           <strong>Color</strong>
         </div>
         <div class="color_part">
           <div class="shape"> 
             <span>Any</span>
             <div class="shape_image any">
               Color
             </div>
             <input type="checkbox" name="color" value="Other">
           </div>
           <div class="shape">
             <span>Yellow</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/yellow.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="yellow">
           </div>
           <div class="shape">
             <span>Pink</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/pink1.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="pink">
           </div>
           <div class="shape">
             <span>Orange</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/orange.jpg " class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="orange">
           </div>
           
           <div class="shape">
             <span>Blue</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/blue.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="blue">
           </div>
           <div class="shape">
             <span>Green</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/green.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="green">
           </div>
           <div class="shape">
             <span>Brown</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/brown.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="brown">
           </div>
           <div class="shape">
             <span>Red</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/red.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="red">
           </div>
           <div class="shape">
             <span>white</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/white.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="white">
           </div>
           <div class="shape">
             <span>Oliv</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/oliv.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="oliv">
           </div>
           <div class="shape">
             <span>Black</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/black.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="black">
           </div>
           <button class="toggle-button" type="button" data-target="fancyco">
             <i 
               class="fa fa-caret-down"></i></button>
         </div>

         <div data-toggle="fancyco" style="display:none;">
           <div class="shape">
             <span>Violet</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/violet.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="violet">
           </div>
           <div class="shape">
             <span>Purple</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/purple.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="purple">
           </div>
           <div class="shape">
             <span>Gray</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/gray.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="gray">
           </div>
         </div>
       </div>

       <div class="d-md-none d-sm-block">
         <div class="shape_heading">
           <strong>Select Shape</strong>
         </div>
         <div class="shape_image_row">
           <div class="shape">
             <span>Any</span>
             <div class="shape_image any">
               Shape
             </div>
             <input type="checkbox" name="shape" value="Other">
           </div>
           <div class="shape shbr" data-target="round">
             <span>Round</span>
             <div class="shape_image" title="Round" tabindex="0">
               <img srcset="assets/images/shapes/Round.png 320w, assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Round">
           </div>

           <div class="shape" data-target="text7">
             <span>Oval</span>
             <div class="shape_image" title="Oval" tabindex="0">
               <img srcset="assets/images/shapes/oval diamond1.png 320w, assets/images/shapes/oval diamond1.png 640w, assets/images/shapes/oval diamond1.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/oval diamond1.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Oval">
           </div>

           <div class="shape">
             <span>Shield</span>
             <div class="shape_image" title="Shield" tabindex="0">
               <img srcset="assets/images/shapes/shied.png 320w, assets/images/shapes/shied.png 640w, assets/images/shapes/shied.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/shied.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Shield">
           </div>

           <div class="shape">
             <span>Marquise</span>
             <div class="shape_image">
               <img src="assets/images/shapes/diamond marquise.png" class="img-fluid" title="Marquise">
             </div>
             <input type="checkbox" name="shape" value="Marquise">
           </div>

           <div class="shape">
             <span>Pear</span>
             <div class="shape_image" title="Pear" tabindex="0">
               <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
             </div>
             <input type="checkbox" name="shape" value="Pear">
           </div>

           <button class="toggle-button" type="button" data-target="mslabmob"><i
               class="fa fa-caret-down"></i></button>
         </div>
         <div data-toggle="mslabmob" style="display:none;">
           <div class="shape_image_row">
             <div class="shape">
               <span>Princess</span>
               <div class="shape_image" title="Princess" tabindex="0">
                 <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Princess">
             </div>
             <div class="shape">
               <span>Asscher</span>
               <div class="shape_image" title="Asscher" tabindex="0">
                 <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Asscher">
             </div>
             <div class="shape">
               <span>Radiant</span>
               <div class="shape_image" title="Radiant">
                 <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Radiant">
             </div>
             <div class="shape">
               <span>Emerald</span>
               <div class="shape_image" title="Emerald">
                 <img src="assets/images/shapes/Diamond Emerald.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Emerald">
             </div>
             <div class="shape">
               <span>Heart</span>
               <div class="shape_image" title="Heart">
                 <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Heart">
             </div>
             <div class="shape">
               <span>Cushion</span>
               <div class="shape_image" title="Cushion">
                 <img src="assets/images/shapes/cushion diamond.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Cushion">
             </div>
             <div class="shape">
               <span>Cush?</span>
               <div class="shape_image" title="Cush Mod">
                 <img src="assets/images/shapes/Assher.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Cush Mod">
             </div>
             <div class="shape">
               <span>Cush?</span>
               <div class="shape_image" title="Cush Brill">
                 <img srcset="assets/images/shapes/cush_brill.png 320w, assets/images/shapes/cush_brill.png 640w, assets/images/shapes/cush_brill.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cush_brill.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Cush Brill">
             </div>
             <div class="shape">
               <span>Star</span>
               <div class="shape_image" title="Star">
                 <img srcset="assets/images/shapes/star.png 320w, assets/images/shapes/star.png 640w, assets/images/shapes/star.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/star.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Star">
             </div>
             <div class="shape">
               <span>Euro Cut</span>
               <div class="shape_image">
                 <img srcset="assets/images/shapes/euro_cut.png 320w, assets/images/shapes/euro_cut.png 640w, assets/images/shapes/euro_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/euro_cut.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Euro Cut">      
             </div>
             <div class="shape">
               <span>Old?</span>
               <div class="shape_image" title="Old Miner">
                 <img srcset="assets/images/shapes/old_miner.png 320w, assets/images/shapes/old_miner.png 640w, assets/images/shapes/old_miner.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/old_miner.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Old Miner">
             </div>
             <div class="shape">
               <span>Briolette</span>
               <div class="shape_image" title="Briolette">
                 <img src="assets/images/shapes/briolette.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Briolette">
             </div>
             <div class="shape">
               <span>Rose Cut</span>
               <div class="shape_image" title="Rose Cut">
                 <img srcset="assets/images/shapes/rose_cut.png 320w, assets/images/shapes/rose_cut.png 640w, assets/images/shapes/rose_cut.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/rose_cut.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Rose Cut">
             </div>
             <div class="shape">
               <span>Lozenge</span>
               <div class="shape_image" title="Lozenge">
                 <img srcset="assets/images/shapes/lozenge.png 320w, assets/images/shapes/lozenge.png 640w, assets/images/shapes/lozenge.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/lozenge.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Lozenge">
             </div>
             <div class="shape">
               <span>Baguette</span>
               <div class="shape_image" title="Baguette">
                 <img srcset="assets/images/shapes/baguette.png 320w, assets/images/shapes/baguette.png 640w, assets/images/shapes/baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/baguette.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Baguette">
             </div>
             <div class="shape">
               <span>Flanders</span>
               <div class="shape_image" title="Flanders">
                 <img srcset="assets/images/shapes/flanders.png 320w, assets/images/shapes/flanders.png 640w, assets/images/shapes/flanders.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/flanders.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Flanders">
             </div>
             <div class="shape">
               <span>Tap?</span>
               <div class="shape_image" title="Tap Baguette">
                 <img srcset="assets/images/shapes/tap_baguette.png 320w, assets/images/shapes/tap_baguette.png 640w, assets/images/shapes/tap_baguette.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/tap_baguette.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Tap Baguette">
             </div>
             <div class="shape">
               <span>Half?</span>
               <div class="shape_image" title="Half Moon" tabindex="0">
                 <img srcset="assets/images/shapes/halfmoon.png 320w, assets/images/shapes/halfmoon.png 640w, assets/images/shapes/halfmoon.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/halfmoon.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Half Moon">
             </div>
             <div class="shape">
               <span>Trape?</span>
               <div class="shape_image" title="Trapezoid">
                 <img srcset="assets/images/shapes/trapezeoid.png 320w, assets/images/shapes/trapezeoid.png 640w, assets/images/shapes/trapezeoid.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/trapezeoid.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Trapezoid">
             </div>
             <div class="shape">
               <span>Bullets</span>
               <div class="shape_image" title="Bullets">
                 <img srcset="assets/images/shapes/bullet.png 320w, assets/images/shapes/bullet.png 640w, assets/images/shapes/bullet.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/bullet.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Bullets">
             </div>
             <div class="shape">
               <span>Kite</span>
               <div class="shape_image" title="Kite">
                 <img srcset="assets/images/shapes/kite.png 320w, assets/images/shapes/kite.png 640w, ass5ets/images/shapes/kite.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/kite.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Kite">
             </div>
             <div class="shape">
               <span>Octa?</span>
               <div class="shape_image" title="Octagonal">
                 <img srcset="assets/images/shapes/octagonal.png 320w, assets/images/shapes/octagonal.png 640w, assets/images/shapes/octagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/octagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Octagonal">
             </div>
             <div class="shape">
               <span>Square?</span>
               <div class="shape_image" title="Square Cushion">
                 <img srcset="assets/images/shapes/square_cushion.png 320w, assets/images/shapes/square_cushion.png 640w, assets/images/shapes/square_cushion.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/square_cushion.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Square Cushion">
             </div>
             <div class="shape">
               <span>Curved</span>
               <div class="shape_image" title="Curved" tabindex="0">
                 <img src="assets/images/shapes/cushion diamond.png" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Curved">
             </div>
             <div class="shape">
               <span>Trillion</span>
               <div class="shape_image" title="Trillion">
                 <img srcset="assets/images/shapes/Trilliant.png 320w, assets/images/shapes/Trilliant.png 640w, assets/images/shapes/Trilliant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Trilliant.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Trillion">
             </div>

             <div class="shape">
               <span>Penta?</span>
               <div class="shape_image" title="Pentagonal">
                 <img srcset="assets/images/shapes/pentagonal.png 320w, assets/images/shapes/pentagonal.png 640w, assets/images/shapes/pentagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/pentagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Pentagonal">
             </div>
             <div class="shape">
               <span>Hexa?</span>
               <div class="shape_image" title="Hexagonal">
                 <img srcset="assets/images/shapes/hexagonal.png 320w, assets/images/shapes/hexagonal.png 640w, assets/images/shapes/hexagonal.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/hexagonal.png" alt="Image" loading="lazy" class="img-fluid">
               </div>
               <input type="checkbox" name="shape" value="Hexagonal">
             </div>
             <div class="shape">
               <span>Shape</span>
               <div class="shape_image any">
                 <span>View All</span>
               </div>
               <input type="checkbox" name="shape" value="View All">
             </div>
           </div>
         </div>
         <div class="shape_heading mt-2">
           <strong>SELECT CLARITY</strong>
         </div>
         <div class="mb-2 select_clerity_row">
           <div class="round_image">
             <span>Any</span>
             <div class="round_vv any">
               Clarity
             </div>
             <input type="checkbox" name="clarity" value="Other">
           </div>

           <div class="round_image">
             <span class="mymultiplediv" id="flpr">FL/IF?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/D-1.png" class="mymultiplediv img-fluid" id="flvpr">
               <div class="fl_video_pro mydiv" id="divflpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/1-FL.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>Flawless/ Internally Flawless </b>
                     <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL
                       and IF
                       diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                       Extremely rare,
                       less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                       quality diamonds
                       are rated IF.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="FL/IF">
             <div class="fl_detail_pro mydiv" id="divflvpr">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/D-1.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>Flawless/ Internally Flawless </b>
                   <p>No inclusions or blemishes are visible to a skilled grader using 10x magnification. FL and
                     IF
                     diamonds appear identical unless viewed under 10x magnification by a skilled grader.
                     Extremely rare,
                     less than 1 in 5000 jewelry quality diamonds are rated FL and Less than 1% of jewelry
                     quality diamonds
                     are rated IF.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="vpr">VVS1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/E.png" class="img-fluid mymultiplediv" id="vprl">
               <div class="fl_video_pro mydiv" id="divvpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/2-VVS1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VVS1-Very, Very Slightly Included</b>
                     <p> Inclusions are difficult for a skilled grader to see under 10x magnification. VVS1
                       inclusions are
                       typically only visible from the pavilion, while VVS2 inclusions are visible from the
                       crown. In each,
                       the inclusions are invisible to the eye, appearing identical to the higher grades unless
                       viewed under
                       10x magnification by a skilled grader.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VVS1">
             <div class="fl_detail_pro mydiv" id="divvprl">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/E.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VVS1-Very, Very Slightly</b>VVS1
                   <p>Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                     inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                     from the
                     crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                     grades
                     unless viewed under 10x magnification by a skilled grader.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="prf">VVS2?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/F.png" class="img-fluid mymultiplediv" id="prvs">
               <div class="fl_video_pro mydiv" id="divprf">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/2-VVS1 (1).mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VVS2-Very, Very Slightly</b>
                     <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                       VVS1
                       inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                       from the
                       crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                       grades
                       unless viewed under 10x magnification by a skilled grader.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VVS2">
             <div class="fl_detail_pro mydiv" id="divprvs">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/F.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VVS2-Very, Very Slightly</b>
                   <p> Included Inclusions are difficult for a skilled grader to see under 10x magnification.
                     VVS1
                     inclusions are typically only visible from the pavilion, while VVS2 inclusions are visible
                     from the
                     crown. In each, the inclusions are invisible to the eye, appearing identical to the higher
                     grades
                     unless viewed under 10x magnification by a skilled grader.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="vsprf">VS1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/G.png" class="img-fluid mymultiplediv" id="fprf">
               <div class="fl_video_pro mydiv" id="divvsprf">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/4-VS1 -1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8 mb-2">
                     <b>VS1-Very Slightly</b>
                     <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                       as
                       minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                       VS2
                       inclusions with the naked eye, on close inspection under ideal conditions.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VS1">
             <div class="fl_detail_pro mydiv" id="divfprf">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/G.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VS1-Very Slightly</b>
                   <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                     as
                     minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                     VS2
                     inclusions with the naked eye, on close inspection under ideal conditions.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="svpr">VS2?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/H.png" class="img-fluid mymultiplediv" id="rpvs">
               <div class="fl_video_pro mydiv" id="divsvpr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/4-VS1 -1.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>VS2-Very Slightly</b>
                     <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                       as
                       minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                       VS2
                       inclusions with the naked eye, on close inspection under ideal conditions.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="VS2">
             <div class="fl_detail_pro mydiv" id="divrpvs">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/H.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>VS2-Very Slightly</b>
                   <p> Included Inclusions are clearly visible under 10x magnification but can be characterized
                     as
                     minor.Inclusions are not visible to the naked eye. Perhaps untrained observers can detect
                     VS2
                     inclusions with the naked eye, on close inspection under ideal conditions.</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="round_image">
             <span class="mymultiplediv" id="sipr">SI1?</span>
             <div class="round_vv">
               <img src="assets/images/clarity/I.png" class="img-fluid mymultiplediv" id="si1pr">
               <div class="fl_video_pro mydiv" id="divsipr">
                 <div class="row">
                   <div class="col-md-4">
                     <video width="170" height="170" controls="controls" loop="" autoplay="">
                       <source src="assets/images/7-SI2.mp4" type="video/mp4">
                     </video>
                   </div>
                   <div class="col-md-8">
                     <b>SI2-Slightly Included</b>
                     <p> Inclusions are noticeable to a skilled grader using 10x magnification. SI1 &amp; SI2
                       inclusions are
                       usually visible to the naked eye, although they will require close inspection.</p>
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox" name="clarity" value="SI1">
             <div class="fl_detail_pro mydiv" id="divsi1pr">
               <div class="row">
                 <div class="col-md-4">
                   <img src="assets/images/clarity/I.png" class="img-fluid">
                 </div>
                 <div class="col-md-8">
                   <b>SI1-Slightly Included</b>
                   <p> Inclusions are noticeable to a skilled grader using 10x magnification. SI1 &amp; SI2
                     inclusions are
                     usually visible to the naked eye, although they will require close inspection.</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="shape_heading mt-2">
           <strong>Color</strong>
         </div>
         <div class="color_part">
           <div class="shape"> 
             <span>Any</span>
             <div class="shape_image any">
               Color
             </div>
             <input type="checkbox" name="color" value="Other">
           </div>
           <div class="shape">
             <span>Yellow</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/yellow.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="yellow">
           </div>
           <div class="shape">
             <span>Orange</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/orange.jpg " class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="orange">
           </div>
           <div class="shape">
             <span>Pink</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/pink1.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="pink">
           </div>
           <div class="shape">
             <span>Blue</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/blue.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="blue">
           </div>
           <div class="shape">
             <span>Green</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/green.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="green">
           </div>
           
           <button class="toggle-button" type="button" data-target="fancycomob"><i
               class="fa fa-caret-down"></i></button>
         </div>

         <div data-toggle="fancycomob" style="display:none;">
           <div class="color_part">
           <div class="shape">
             <span>Brown</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/brown.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="brown">
           </div> 
           <div class="shape">
             <span>Red</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/red.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="red">
           </div>
           <div class="shape">
             <span>white</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/white.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="white">
           </div>
           <div class="shape">
             <span>Oliv</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/oliv.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="oliv">
           </div>
           <div class="shape">
             <span>Black</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/black.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="black">
           </div>
           <div class="shape">
             <span>Violet</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/violet.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="violet">
           </div>
           <div class="shape">
             <span>Purple</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/purple.jpg" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="purple">
           </div>
           <div class="shape">
             <span>Gray</span>
             <div class="shape_image">
               <img src="assets/images/fancy_color/gray.png" class="img-fluid">
             </div>
             <input type="checkbox" name="color" value="gray">
           </div>
         </div>
         </div>

         <div class="sertificate_table">
           <table class="table-bordered table_product mb-2 table-responsive mt-4">
             <thead>
               <tr>
                 <th colspan="4">Certification (Only For Diamonds &amp; Precious Gemstones)</th>
               </tr>
               <tr>
                 <th>T &amp; S</th>
                 <th>GCI</th>
                 <th>EGL</th>
                 <th>IGI</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td style="text-align: center;"><input type="checkbox"></td>
                 <td><input type="checkbox"></td>
                 <td><input type="checkbox"></td>
                 <td><input type="checkbox"></td>
               </tr>
             </tbody>
           </table>
         </div>
       </div>
   </div>
 </div>
 <div class="row">
   <div class="col-md-6 d-md-block d-sm-none d-none">
     <div class="shape_heading mt-2">
       <strong>Overtone</strong>
     </div>
     <div class="colortone mt-2">
       <div class="colortone_type">
         <span>ANY</span>
         <input type="checkbox" name="colortone" value="Other">
       </div>

       <div class="colortone_type">
         <span>Yellow</span>
         <input type="checkbox" name="colortone" value="yellow">
       </div>

       <div class="colortone_type">
         <span>Yellowish</span>
         <input type="checkbox" name="colortone" value="yellowish">
       </div>

       <div class="colortone_type">
         <span>Pink</span>
         <input type="checkbox" name="colortone" value="pink">
       </div>
       <div class="colortone_type">
         <span>Pinkish</span>
         <input type="checkbox" name="colortone" value="Pinkish">
       </div>
       <div class="colortone_type">
         <span>Blue</span>
         <input type="checkbox" name="colortone" value="blue">
       </div>
       <button type="button" class="toggle-button" data-target="bluilab">
         <i class="fa fa-caret-down"></i>
       </button>
     </div>

     <div data-toggle="bluilab" style="display:none;">
       <div class="colortone">
         <div class="colortone_type">
           <span>Bluish</span>
           <input type="checkbox" name="colortone" value="bluish">
         </div>
         <div class="colortone_type">
           <span>Red</span>
           <input type="checkbox" name="colortone" value="red">
         </div>
         <div class="colortone_type">
           <span>Reddish</span>
           <input type="checkbox" name="colortone" value="reddish">
         </div>
         <div class="colortone_type">
           <span>Green</span>
           <input type="checkbox" name="colortone" value="green">
         </div>
         <div class="colortone_type">
           <span>Greenish</span>
           <input type="checkbox" name="colortone" value="Greenish">
         </div>
         <div class="colortone_type">
           <span>Purple</span>
           <input type="checkbox" name="colortone" value="purple">
         </div>
         <div class="colortone_type">
           <span>Purplish</span>
           <input type="checkbox" name="colortone" value="Purplish">
         </div>
         <div class="colortone_type">
           <span>Orange</span>
           <input type="checkbox" name="colortone" value="orange">
         </div>
         <div class="colortone_type">
           <span>Orangy</span>
           <input type="checkbox" name="colortone" value="Orangy">
         </div>
         <div class="colortone_type">
           <span>Violet</span>
           <input type="checkbox" name="colortone" value="violet">
         </div>
         <div class="colortone_type">
           <span>Violetish</span>
           <input type="checkbox" name="colortone" value="Violetish">
         </div>
         <div class="colortone_type">
           <span>Gray</span>
           <input type="checkbox" name="colortone" value="gray">
         </div>
         <div class="colortone_type">
           <span>Grayish</span>
           <input type="checkbox" name="colortone" value="Grayish">
         </div>
         <div class="colortone_type">
           <span>Brown</span>
           <input type="checkbox" name="colortone" value="brown">
         </div>
         <div class="colortone_type">
           <span>Brownish</span>
           <input type="checkbox" name="colortone" value="Brownish">
         </div>
         <div class="colortone_type">
           <span>Champagne</span>
           <input type="checkbox" name="colortone" value="Champagne">
         </div>
         <div class="colortone_type">
           <span>Cognac</span>
           <input type="checkbox" name="colortone" value="Cognac">
         </div>
         <div class="colortone_type">
           <span>Chameleon</span>
           <input type="checkbox" name="colortone" value="Chameleon">
         </div>
         <div class="colortone_type">
           <span>White</span>
           <input type="checkbox" name="colortone" value="white">
         </div>

         <div class="colortone_type">
           <span>All</span>
           <input type="checkbox" name="colortone" value="all">
         </div>

       </div>
     </div>
   </div>
   <div class="col-md-6 d-md-block d-sm-none d-none">
     <div class="shape_heading mt-2">
       <strong>Intensity</strong>
     </div>
     <div class="intencity mt-2">
       <div class="intencity_type">
         <span>ANY</span>
         <input type="checkbox" name="intencity" value="other">
       </div>
       <div class="intencity_type">
         <span>Fancy Deep</span>
         <input type="checkbox" name="intencity" value="Fancy Deep">
       </div>
       <div class="intencity_type">
         <span>Fancy Dark</span>
         <input type="checkbox" name="intencity" value="fancy dark">
       </div>
       <div class="intencity_type">
         <span>Fancy Vivid</span>
         <input type="checkbox" name="intencity" value="Fancy Vivid">
       </div>
       <div class="intencity_type">
         <span>Fancy Intense</span>
         <input type="checkbox" name="intencity" value="fancy intense">
       </div>
       <div class="intencity_type">
         <span>Fancy</span>
         <input type="checkbox" name="intencity" value="Fancy">
       </div>
       
       <button type="button" class="toggle-button" data-target="intenlab">
         <i class="fa fa-caret-down"></i>
       </button>
     </div>
     <div data-toggle="intenlab" style="display:none;">
       <div class="intencity">
         <div class="intencity_type">
           <span>Fancy Light</span>
           <input type="checkbox" name="intencity" value="fancy light">
         </div>
         <div class="intencity_type">
           <span>Light</span>
           <input type="checkbox" name="intencity" value="light">
         </div>
         <div class="intencity_type">
           <span>Very Light</span>
           <input type="checkbox" name="intencity" value="very light">
         </div>
         <div class="intencity_type">
           <span>Faint</span>
           <input type="checkbox" name="intencity" value="faint">
         </div>
       </div>
     </div>
   </div>

   <div class="d-md-none d-sm-block">
     <div class="col-md-6">
       <div class="shape_heading mt-2">
         <strong>Overtone</strong>
       </div>
       <div class="colortone mt-2">
         <div class="colortone_type">
           <span>ANY</span>
           <input type="checkbox" name="colortone" value="Other">
         </div>

         <div class="colortone_type">
           <span>Yellow</span>
           <input type="checkbox" name="colortone" value="yellow">
         </div>

         <div class="colortone_type">
           <span>Yellowish</span>
           <input type="checkbox" name="colortone" value="yellowish">
         </div>

         <button type="button" class="toggle-button" data-target="bluilabmob" style="right: -40px;
         position: absolute;">
           <i class="fa fa-caret-down"></i>
         </button>
       </div>
       <div data-toggle="bluilabmob" style="display:none;">
         <div class="colortone">
           <div class="colortone_type">
             <span>Pink</span>
             <input type="checkbox" name="colortone" value="pink">
           </div>
           <div class="colortone_type">
             <span>Pinkish</span>
             <input type="checkbox" name="colortone" value="Pinkish">
           </div>
           <div class="colortone_type">
             <span>Blue</span>
             <input type="checkbox" name="colortone" value="blue">
           </div>
           <div class="colortone_type">
             <span>Bluish</span>
             <input type="checkbox" name="colortone" value="bluish">
           </div>
           <div class="colortone_type">
             <span>Red</span>
             <input type="checkbox" name="colortone" value="red">
           </div>
           <div class="colortone_type">
             <span>Reddish</span>
             <input type="checkbox" name="colortone" value="reddish">
           </div>
           <div class="colortone_type">
             <span>Green</span>
             <input type="checkbox" name="colortone" value="green">
           </div>
           <div class="colortone_type">
             <span>Greenish</span>
             <input type="checkbox" name="colortone" value="Greenish">
           </div>
           <div class="colortone_type">
             <span>Purple</span>
             <input type="checkbox" name="colortone" value="purple">
           </div>
           <div class="colortone_type">
             <span>Purplish</span>
             <input type="checkbox" name="colortone" value="Purplish">
           </div>
           <div class="colortone_type">
             <span>Orange</span>
             <input type="checkbox" name="colortone" value="orange">
           </div>
           <div class="colortone_type">
             <span>Orangy</span>
             <input type="checkbox" name="colortone" value="Orangy">
           </div>
           <div class="colortone_type">
             <span>Violet</span>
             <input type="checkbox" name="colortone" value="violet">
           </div>
           <div class="colortone_type">
             <span>Violetish</span>
             <input type="checkbox" name="colortone" value="Violetish">
           </div>
           <div class="colortone_type">
             <span>Gray</span>
             <input type="checkbox" name="colortone" value="gray">
           </div>
           <div class="colortone_type">
             <span>Grayish</span>
             <input type="checkbox" name="colortone" value="Grayish">
           </div>
           <div class="colortone_type">
             <span>Brown</span>
             <input type="checkbox" name="colortone" value="brown">
           </div>
           <div class="colortone_type">
             <span>Brownish</span>
             <input type="checkbox" name="colortone" value="Brownish">
           </div>
           <div class="colortone_type">
             <span>Champagne</span>
             <input type="checkbox" name="colortone" value="Champagne">
           </div>
           <div class="colortone_type">
             <span>Cognac</span>
             <input type="checkbox" name="colortone" value="Cognac">
           </div>
           <div class="colortone_type">
             <span>Chameleon</span>
             <input type="checkbox" name="colortone" value="Chameleon">
           </div>
           <div class="colortone_type">
             <span>White</span>
             <input type="checkbox" name="colortone" value="white">
           </div>

           <div class="colortone_type">
             <span>All</span>
             <input type="checkbox" name="colortone" value="all">
           </div>

         </div>
       </div>
     </div>
     <div class="col-md-6">
       <div class="shape_heading mt-2">
         <strong>Intensity</strong>
       </div>
       <div class="intencity mt-2">
         <div class="intencity_type">
           <span>ANY</span>
           <input type="checkbox" name="intencity" value="other">
         </div>
         <div class="intencity_type">
           <span>Light</span>
           <input type="checkbox" name="intencity" value="light">
         </div>
         <div class="intencity_type">
           <span>Very Light</span>
           <input type="checkbox" name="intencity" value="very light">
         </div>
         
         <button type="button" class="toggle-button" data-target="intenlabmob" style="right: -40px;
         position: absolute;">
           <i class="fa fa-caret-down"></i>
         </button>
       </div>
       <div data-toggle="intenlabmob" style="display:none;">
         <div class="intencity">
           <div class="intencity_type">
             <span>Fancy</span>
             <input type="checkbox" name="intencity" value="Fancy">
           </div>
           <div class="intencity_type">
             <span>Fancy Deep</span>
             <input type="checkbox" name="intencity" value="Fancy Deep">
           </div>
           <div class="intencity_type">
             <span>Fancy Dark</span>
             <input type="checkbox" name="intencity" value="fancy dark">
           </div>
           <div class="intencity_type">
             <span>Fancy Vivid</span>
             <input type="checkbox" name="intencity" value="Fancy Vivid">
           </div>
           <div class="intencity_type">
             <span>Fancy Intense</span>
             <input type="checkbox" name="intencity" value="fancy intense">
           </div>
           <div class="intencity_type">
             <span>Fancy Light</span>
             <input type="checkbox" name="intencity" value="fancy light">
           </div>
           <div class="intencity_type">
             <span>Faint</span>
             <input type="checkbox" name="intencity" value="faint">
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!------fancy lab grown end------>
<div class="tab" id="jewelry_design">
 <div class="tabs">
   <nav class="tab-nav">
     <ul class="SMN_effect-9 mt-2">
       <li class="active button_post">
         <span data-href="#promice_ring" data-hover="Promice/Engagement Ring">Promice/Engagement Ring</span>
       </li>
       <li class="button_post">
         <span data-href="#wedding_ring" data-hover="Wedding Band">Wedding Band</span>
       </li>
       <li class="button_post">
         <span data-href="#bridal_jewelry" data-hover="Bridal Jewelry">Bridal Jewelry</span>
       </li> 
       <li class="button_post">  
         <span data-href="#birthday_gift" data-hover="Birthday/Anniversary Gift">Birthday/Anniversary Gift</span>
       </li> 
       <li class="button_post">  
         <span data-href="#kids_jewelry" data-hover="Kids JEwelry">Kids Jewelry</span>
       </li>  
     </ul>
   </nav>
 </div>
 <div class="tab active" id="promice_ring">
     <div class="row">
       <div class="col-md-3 mb-2">
         <h3 class="mt-1">PRICE RANGE</h3>
         <div class="sele mt-1">
           <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> <a>View All</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>
       </div>
       <div class="col-md-3">
         <h3>Metal Quality</h3>
         <label class="letest_design"> <a>Platinum</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <a class="gold_a">Gold</a>
         <div class="gold">
           <label class="letest_design"><a>18K</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"><a>14K</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"><a>9K</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>

         <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Silver</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <h3>SMALL DIAMOND QUALITY</h3>
         
         <label class="letest_design"> <a>Best</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>Good</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Good</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
        
       </div>
       <div class="col-md-3">
         <h3>Gemstones Size COMBINATION</h3>
         <label class="letest_design"> <a>Small + Midium</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>SMALL + MEDIUM + BIG</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>SMALL + BIG</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>MEDIUM Only</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>BIG ONLY</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <h3>PATTERN</h3>
         <label class="letest_design"> <a>Single Halo</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>Double Halo</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>3 Stones</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>Cross Over</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>Infinity</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>

         <label class="letest_design"> <a>Engraved</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Split Sank</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Cluster</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Twist</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Semimount</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <div class="col-md-3">
         <h3>Style</h3>
         <label class="letest_design"> <a>Petite</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Tacori</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Unique</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Art Deco</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Artistic</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Christian</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Classic</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Infinity</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Delicate</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Elegant</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Flat</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Gorgeous</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <h3>GEMSTONE SETTINGS</h3>
         <label class="letest_design"> <a>Bezel</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         

       </div>
     </div>
 </div>
 <!--promicr ring-->
 <div class="tab" id="wedding_ring">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
  <!--engagement ring-->
 <div class="tab" id="bridal_jewelry">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 <!--wedding ring-->
 <div class="tab" id="birthday_gift">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 <!--anniversary gift-->
 <div class="tab" id="kids_jewelry">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 <!--anniversary gift-->
 <div class="tab" id="famousbrands">
   <div class="row mb-4">
     <div class="col-md-12">
       <h3>Design similar to Which Brand Website Name</h3>
       <div class="desi_similar">
         <div class="desi_1">
           <label class="letest_design">
             <a class="mymultiplediv" id="ah6">Aron Henry</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="an6">Anthony Lent</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="be6">Beaverbrooks</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="bn6">Blue Nile</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="bro6">Brogioni</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="bou6">Boucheron</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="bre6">Briliant Earth</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="bu6">Buccellati</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ba6">Balgari</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ca6">Cartier</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ch6">Chanel</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="cha6">Chapele</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="cho6">Charls &amp; Colvard</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="cho7">Chopard</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="cl7">Claddagh</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="da7">Danhov</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>
         <div class="desi_2">
           <label class="letest_design">
             <a class="mymultiplediv" id="ka7">Kara Rose</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ky7">Kays</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="la7">Lazo</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="lo7">Lori Rodkin</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ls7">Lorraine Schwartz</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ma7">Mabelle</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mac7">Macys</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mr7">Manya &amp; Roumen</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mf7">Martin Flyer</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mcl7">Matthew Campbell Laurenza</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="me7">Messiki</a>
             <div class="mydiv" id="divme7" style="display: none;">
               <div class="image_three_by">
                 <div class="image_three">
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                 </div>
                 <div class="image_three">
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                 </div>
                 <div class="image_three">
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                   <div class="oval_image">
                     <img src="images/shapes/diamond marquise.png" alt="" class="img-fluid" loading="lazy">
                   </div>
                 </div>
               </div>
             </div>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mi7">Michaelhili</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mik7">Mikimoto</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="mim7">Mimiso</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="pah7">Pamela HuiZenga</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="pia7">Piaget</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>
       </div>
       <div class="desi_similar">
         <div class="desi_1">
           <label class="letest_design">
             <a class="mymultiplediv" id="jar7">Jar</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="jrd7">Jared</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="jec7">Jeff Copper</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="joa7">Jorge Adeler</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="vca7">Van Cleef &amp; Arpels</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="vev7">Vera Vang</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="ver7">Verdura</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="vir7">Virragio</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>

           <label class="letest_design">
             <a class="mymultiplediv" id="ddk7">Daria De Koning</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="dw7">David Webb</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="dy7">David Yurman</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="deb7">De Beers</a>
             <div class="mydiv" id="divdeb7" style="display: none;">
             </div>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="dia7">Diamonique</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="dior7">Dior</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="fab7">Faberge</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="gij7">Garland's Indian Jewelery</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>
         <div class="desi_2">
           <label class="letest_design">
             <a class="mymultiplediv" id="rit7">Ritani</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="sck7">Scott Kay</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="sim7">Simong</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="sot7">Sothbys</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="suk7">Suzanne Kalan</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="tac7">Tacori</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="tif7">Tiffany</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="tfc7">Tiffant &amp; Co</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="gr7">Graff</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="hs7">H.stern</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="he7">Hemilton</a>
             <div class="mydiv" id="divhe7" style="display: none;">
             </div>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="har7">Harrods</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="haw7">Harry Winstone</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="hof7"> Heart On Fire</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">
             <a class="mymultiplediv" id="hel7">Helzberg</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design"> Zems Allen
             <a class="mymultiplediv" id="zea7">Helzberg</a>
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
           <label class="letest_design">View All
             <input type="checkbox">
             <span class="checkmark"></span>
           </label>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!--famous brand design-->
 <div class="tab" id="celebrities">
   <div class="row mb-4">
     <div class="col-md-6">
       <h3>DESIGNS &amp; DIAMONDS SELECTED BY CELEBRITIES</h3>
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
       <label class="letest_design">40 Best celebrity Engagement Ring - biggest most expensive
         rings - townandcounty mag.com
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design">Celebrity Engagement Ring 2019 - hollywood life
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design">27 expensive celebrity Engagement Ring - cost &amp; size -
         theknot.com
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 <!----Celebrities Designs------->
 <h2 class="text-center">Under Developement</h2>
</div>
<!------jewelry design end------>
<div class="tab" id="specific_design">
 <!--<div class="tabs">
   <nav class="tab-nav">
     <ul class="SMN_effect-9 mt-2">
       <li class="active button_post">
         <span data-href="#ring_design" data-hover="Ring">Ring </span>
       </li>
       <li class="button_post">
         <span data-href="#earring_designs" data-hover="Earring">Earring</span>
       </li>
       <li class="button_post">
         <span data-href="#pendant_design" data-hover="Pendant">Pendant</span>
       </li>
       <li class="button_post">
         <span data-href="#smallset_design" data-hover="Small Set">Small Set</span>
       </li> 
       <li class="button_post">
         <span data-href="#singleline_design" data-hover="Single Line">Single Line</span>
       </li> 
       <li class="button_post">
         <span data-href="#bangles_design" data-hover="Bangles">Bangles</span>
       </li> 
       <li class="button_post">
         <span data-href="#bracelets_design" data-hover="Bracelets">Bracelets</span>
       </li> 
     </ul>
   </nav>
 </div>

 <div class="tab active" id="ring_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
     
   </div>
 </div>
 ring  design end
 <div class="tab" id="earring_designs">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
     
   </div>
 </div>
 earring design end
 <div class="tab" id="pendant_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
     
   </div>
 </div>
 pendant design end
 <div class="tab" id="smallset_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 Small Set design end
 <div class="tab" id="singleline_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 Single line design end
 <div class="tab" id="bangles_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 bangles_design end
 <div class="tab" id="bracelets_design">
   <div class="row">
     <div class="col-md-3 mb-2">
       <h3 class="mt-1">PRICE RANGE</h3>
       <div class="sele mt-1">
         <label class="letest_design"> <a>Rs.10,000 To Rs.24,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.25,000 To Rs.49,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.1,00,000 To Rs.1,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.2,00,000 To Rs.4,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.5,00,000 To Rs.9,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.10,00,000 To Rs.19,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.20,00,000 To Rs.49,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Rs.50,00,000 To Rs.99,99,999</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>Over Rs.1,00,00,000</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"> <a>View All</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>
     </div>
     <div class="col-md-3">
       <h3>Metal Quality</h3>
       <label class="letest_design"> <a>Platinum</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <a class="gold_a">Gold</a>
       <div class="gold">
         <label class="letest_design"><a>18K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>14K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
         <label class="letest_design"><a>9K</a>
           <input type="checkbox">
           <span class="checkmark"></span>
         </label>
       </div>

       <label class="letest_design"> <a>Patented Alloy @ 10% Gold Rate</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Silver</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>SMALL DIAMOND QUALITY</h3>
       
       <label class="letest_design"> <a>Best</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>Good</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
      
     </div>
     <div class="col-md-3">
       <h3>SIZE COMBINATION</h3>
      
       <label class="letest_design"> <a>BIG ONLY</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>BIG + MEDIUM SIZE + SMALL</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <h3>PATTERN</h3>
       <label class="letest_design"> <a>Single Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Double Halo</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>3 Stones</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Cross Over</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Infinity</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>Engraved</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>

       <label class="letest_design"> <a>View All</a>
         <input type="checkbox">
         <span class="checkmark"></span>
       </label>
     </div>
   </div>
 </div>
 bangles_design end------>
 <h2 class="text-center">Under Developement</h2>
</div>
<!------specific design end------>

<!--<div class="tab" id="review">
 <div class="riview">
   <div class="customer_rev">
     <div class="review_title">Reviews for Taare Sitare</div>
     <div class="border"></div>
   </div>

   <div class="write_review mt-2" style="display: block;">
     <p>PLEASE GIVE FEED BACK /REVIEWS AND GET <b style="font-size: 20px;">RS 1000</b> CREDITED TO YOUR ACCOUNT * ,WILL BE ADJUSTED AGAINST MAKING
       &amp; SMALL DIAMONDS @ 10%</p>
     <span class="">Rate For This:</span>
     <form class="mt-2">
       
       <div class="form-group name-group">
         <div class="d-flex">
         <label for="review">HOW IS YOUR EXPERIENCE ,AS TO WEBSITE USER FRIENDLINESS 
         </label>
         <span class="star mr-5">*</span>
         <div class="score mr-5">
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
         </div>
         <p>till date <b style="font-size: 20px;">1234</b> reviews and Good score <b style="font-size: 20px;">12345</b></p>
       </div>
         <textarea rows="2" class="form-control" placeholder="Type Here"></textarea>
       </div>
       
       <div class="form-group name-group">
         <div class="d-flex">
         <label for="name">HOW IS OUR PRICING AS COMPARED TO OTHERS </label>
         <span class="star mr-5">*</span>
         <div class="score mr-5">
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
           <i class="fa fa-star-o"></i>
         </div>
         <p>till date <b style="font-size: 20px;">1234</b> reviews and Good score <b style="font-size: 20px;">12345</b></p>
       </div>
         <input type="text" class="form-control" id="title" required="" placeholder="Type Here">
       </div>
      <div class="score">
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
       </div>
       <div class="form-group name-group">
         <label for="email">HOW IS OUR LIKING SECTION WITH SO MANY DESIGNS ,GEMSTONES &amp; METAL PLATING COLOR
           OPTIONS</label>
         <span class="star">*</span>
         <input type="text" class="form-control" id="" required="" placeholder="Type Here">
       </div>

       <div class="score">
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
         <i class="fa fa-star-o"></i>
       </div>
       <div class="form-group name-group">
         <label for="email">HOW IS BUDGET MATCHING SECTION</label>
         <span class="star">*</span>
         <input type="text" class="form-control" id="" required="" placeholder="Type Here">
       </div>
       <a href="login.html"><button type="submit" class="post"><i class="fa fa-paper-plane"
             aria-hidden="true"></i>Post
         </button></a>
      </form>
   </div>
 </div>
</div>-->
</div>
</div>
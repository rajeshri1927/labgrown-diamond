 <div class="landing_bg">
 <div class="row mt-5 mb-5">
    <div class="col-md-6">
        <div class="landing_page">
             <div class="circle">
                <span>5% <small>Off</small></span>
              </div>
            <!--<div class="ribbon orange">5% Discount</div>-->
            <p> <strong class="city_strong">Dear Buyer</strong>, <br>As We are launching our <b>Taare &amp; Sitare</b> Brand jewelry in <span class="city_b">Surat</span>, We are  offering<span class="special_dis">special discount</span> on small diamonds,color gemstones and making amount.</p>
        </div>

        <div class="center">
            <button type="button">Go Down for Shop <div class="scroll-down"></div></button>
        </div>
    </div>
    <div class="col-md-6">
    <div class="landing_pg">
      <div class="laning_box">
        <img srcset="assets/images/city_name/surat_city.png 320w, assets/images/city_name//surat_city.png, assets/images/city_name/surat_city.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/city_name/surat_city.png" alt="Surat" loading="lazy" class="img-fluid" title="City Of Diamonds">
      </div>
      </div>
    </div>
 </div>
</div>

 <div class="container-fluid">
    <div class="bread">
      <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="taaresitare.html">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Catelogue Page
        </li>
      </ul>

      <div class="float-right">
        <div class="gia_view">
          <a href="labgrown_catalogue.html"><button type="button">Listing View</button></a>
          <a href="certificate_view.html"><button type="button">Certificate View</button></a>
          <a href="image_view.html"><button type="button" class="active">Image View</button></a>
          <a href="video_view.html"><button type="button">Video View</button></a>
          <button type="button" id="sort">SORT <i class="fa fa-sort" aria-hidden="true"></i></button>
        </div>
        <div class="inptut_range float-right" id="input_range">
          <div class="sortin_select">
            <div class="sort_right">
              <label class="letest_design">PRICE LOW TO HIGH
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="letest_design">PRICE HIGH TO LOW
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="letest_design"> HIGH DISCOUNT FIRST
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<?php 
//SS print_r($LandingPageBlocks);	
foreach($LandingPageBlocks as $block){
	   
	   $blocktitle = $block['permanent_city_page_block_title'];
	   $aryblockTitle = explode("||",$blocktitle);
	   $blockTitleType = $aryblockTitle[0];
	   //echo $block['permanent_landing_page_block_root']."||".$blockTitleType;
	 if($block['permanent_city_page_block_root']== "0"){  
	    //echo "<div   style='width:100%;border:1px solid #000;margin: 10px 0px;'>"; 
?>		
 <div class="langing_header">
   <?php echo "<".$blockTitleType.">".$aryblockTitle[1] ."</".$blockTitleType.">" ;?>
  <div class="landing_border"></div>
 </div>
  <div class="row">
	
<?php
 if(isset($landingPage_block_data) && !empty($landingPage_block_data)){
		 $Productnum=0;
	foreach($landingPage_block_data as $landingPage_block ){	
	   
	 foreach($landingPage_block['response']['body']['diamonds'] as $diamond){ 
		
	  if($Productnum < $block['permanent_city_page_block_max_products']){
	    	$Productnum++;
?>   
    
	
	   <div class="col-md-3 cate_icon mt-2 ceri_img">
        <div class="catelogue_icon"><?php echo "Num-". $Productnum;?>
         <a name="fb_share" type="button" href="https://www.facebook.com/sharer.php?u=https://labgrown-diamond-jewelry.com/&t=<?php echo $diamond['image_url'];?>&<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>','sharer','toolbar=0,status=0,width=548,height=325');" target="_blank"><i class="fa fa-share-alt" aria-hidden="true" title="Share"></i>
         </a>
            <?php 
                if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id'])){ 
                     $current_url = $_SERVER['REQUEST_URI'];
                     $is_product_in_wishlist = false; // Flag to track if the product is in the wishlist
                     if(isset($existing_wishlist) && !empty($existing_wishlist)){
                           foreach ($existing_wishlist as $product_id => $wishlist_data){
                              // Check if the current product is in the wishlist
                              if($wishlist_data !== false && is_array($wishlist_data) && $wishlist_data['product_id'] == $diamond['stock_num']){
                                 $is_product_in_wishlist = true;
                                 break; // Exit the loop if the product is found in the wishlist
                               
                           }
                     }
                     if($is_product_in_wishlist){ // Display heart icon if the product is in the wishlist
                        ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" data-id="<?php echo $wishlist_data['id'];?>" data-url="<?php echo $current_url;?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>"  data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-shape="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>">
                           <i class="fa heart-icon fa-heart" style="color: rgb(255, 128, 128);" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } else { // Display default heart icon if the product is not in the wishlist ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" data-url="<?php echo $current_url;?>" data-product="<?php echo $diamond['stock_num'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-shape="<?php echo $diamond['shape'];?>"  data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>" >
                              <i class="fa fa-heart heart-icon" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } 
                  } else { ?>
                           <a href="set-wish-list"><button id="add-wishlist" class="btn button btn-setting bd-color-setting bd-radius-5 like"> <i class="fa fa-heart heart-icon"></i> </button></a>
                  <?php } ?>  
        <!-- <i class="fa fa-share-alt" aria-hidden="true" title="Share"></i>-->    
            <?php 
              $total_price = $diamond['total_sales_price'];
               $discount_percent = $diamond['discount_percent']; 
               $dis_total_price  = $total_price * $discount_percent/100; 
               $total_disount_price = $total_price - $dis_total_price;?>
               <span class="nav-item add-card"><button type="" data-product-name="Radiant 0.45 ct Z VVS1" data-product-price="336.825" data-product-id="DemoIn2" data-image="https://diamondmedia.s3.us-east-1.amazonaws.com/B2C/imaged/930085102/still.jpg" data-product-size="0.45" data-cert-url="https://d24ppbhzdyfrur.cloudfront.net/uploads/diamond/gia_cert/GIA_GuidetoUnderstandingReports_DiamondGradingReport.pdf" data-product-shape="Radiant" data-product-color="Z" data-product-type="lab_grown_diamond" data-product-clarity="VVS1" class="add-cart" style="border: none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
              </span>
				<?php } ?>	  
        </div>
        <a href="product-view/<?php echo $diamond['stock_num'];?>">
            <img src="<?php echo $diamond['image_url'];?>" class="img-fluid">
        </a>
        <div class="catelogue_table">
          <table class="table-bordered table-responsive mb-2">
            <thead>
          <tr>
            <th class="red_color has-tooltip_table_detailes" rowspan="2" ><span>Quality/Shape/WT?
            <div class="tooltip">
              <h3 class="popover-title">Diamond Details</h3>
              <div class="popover-content">
                <ul>
                  <li><strong>Stock Id:</strong><?php echo $diamond['stock_num'];?></li>
                  <li><strong>Lab:</strong> <span><?php echo $diamond['lab'];?></span></li>
                  <li><strong>Cut:</strong> <span><?php echo $diamond['cut_long'];?></span></li>
                  <li><strong>Symmetry:</strong> <span><?php echo $diamond['symmetry_short'];?></span></li>
                  <li><strong>Polish:</strong> <span><?php echo $diamond['polish_short'];?></span></li>
                  <li><strong>Flouresence:</strong> <?php echo $diamond['fluorescence_intensity_long'];?></li>
                  <li><strong>Measurements:</strong> <span><?php echo $diamond['measurement'];?></span></li>
                  <li><strong>Table:</strong> <span><?php echo $diamond['table_percent'].'%';?></span></li>
                </ul>
              </div>
            </div>
            </span>
            </th>
            <th class="red_color" rowspan="2">Company Price
            </th>
            <th colspan="2" title="Discount on International wholesale diamond prices ie. Rapaport price">Discount ?
            </th>
            <th class="red_color has-tooltip_click" rowspan="2"><span>You Pay After Discount?
            <div class="tooltip">
            <h3 class="popover-title">Price Details</h3>
            <div class="popover-content">
              <ul>
                <li><strong>Diamond :</strong> <span><i class="fa fa-inr" aria-hidden="true"></i>
                  <?php 
                      $productpricepercent = '';
                      if(isset($product_price) && !empty($product_price)){
                         foreach($product_price as $productprice){
                            if($productprice['purchase_item_name']=='diamond'){
                               $productpricepercent = (isset($productprice['purchase_percent']) && !empty($productprice['purchase_percent']))? $productprice['purchase_percent']:'0';
                           //echo "<pre>"; echo $diamond['total_sales_price'];die;
                  ?>
                  <a href="product-view/<?php   $diamond['stock_num'];?>"><?php $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; echo $finalcost;?></a>
                 <?php 
                    }
                      }
                    }
                 ?>  
                <?php 
                   $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; 
                   $shipping = 0;
                   $shippingwithgst = 0;
                   $taxtionontotal  = 0;
                   $grand_total = 0;
                   if(isset($shippingwithtax) && !empty($shippingwithtax)){
                      foreach($shippingwithtax as $shippingtax){
                        //if($shippingtax['country_id']=='diamond'){
                            $shipping = (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                            $taxtion  = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
                            $dimanodtotalcost = $finalcost;
                            $taxtionontotal   = $dimanodtotalcost * $taxtion/100;
                            $shippinggst      = $shipping + $taxtionontotal;
                            $shippingwithgst  = (isset($shippinggst) && !empty($shippinggst))? $shippinggst:'0';
                  ?>
                <li><strong>Taxation:</strong><span><i class="fa fa-inr" aria-hidden="true"></i><?php echo $taxtion.'%';?></span></li>
                <li><strong>Shipping:</strong><span><i class="fa fa-inr" aria-hidden="true"></i><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo round($shippingwithgst,2);?></a></span></li>
                <?php $grand_total = $shippingwithgst + $finalcost; ?>
                <?php } } ?>
                <?php 
                  $totalDiscount = 0; // Initialize a variable to hold the sum of discounts
                  if (isset($discounts) && !empty($discounts) && is_array($discounts)) { // Make sure $discounts is an array
                      foreach ($discounts as $discount) {
                          // Assuming $discount['discount'] contains the discount amount you want to accumulate
                          $totalDiscount += $discount['discount_percent']; // Accumulate the discounts
                      }
                  }
                  $grandTotal = (isset($grand_total) && !empty($grand_total)) ? $grand_total - $totalDiscount : 0;
                  echo '<li><strong>Grand Total:</strong> <span><i class="fa fa-inr" aria-hidden="true"></i>' . round($grandTotal, 2) . '</span></li>';
                ?>
              </ul>
            </div>
            </div>
            </span>
            </th> 
          </tr>
          <tr>
            <th class="red_color">%</th>
            <th class="red_color">Amount</th>
          </tr>
        </thead>  
        <tbody>
          <tr>
            <th><?php echo $diamond['shape'].'/' .$diamond['size'];?></th>
            <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i><?php echo round($grand_total,2);?></td>
              <?php 
                $lastDiscountAmount = 0; // Default to 0 if no discounts
                if(isset($discounts) && !empty($discounts) && is_array($discounts)){
                  foreach($discounts as $discount){
                    $lastDiscountAmount = $discount['discount']; // Keep updating with each discount found
              ?>
                <td rowspan="2"><?php echo $discount['discount_percent'].'%'; ?></td>
                <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i>
                <?php 
                  $discount_percent = $grand_total * $discount['discount_percent']/100; echo round($discount_percent,2);?>
                </td>
                <?php 
                }
              }
                $grandTotal = round($grand_total,2) - $discount_percent; // Use the last discount found
            ?>
            <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i><?php echo round($grandTotal,2);?></td>
          </tr>
          <tr>
            <th><?php echo $diamond['color'].'/' .$diamond['clarity'];?></th>
          </tr>
          <tr>
             <td class="red_color">Title Description</td>
                <td colspan="4">
                  <div class="dynamicContainer">
                    Seo text here
                    <button class="moreless-button">Read More</button>
                    <div class="moreless-content">Additional Text 1</div>
                  </div>
                </td>
              </tr>
        </tbody>
          </table>
        </div>
    </div>
       
	<?php } } } } ?>   
     
<!---h1 end---->
<hr>


<div class="sub_heading" >
<?php     
 foreach($LandingPageBlocks as $subblock){
	   
	   $subblocktitle = $subblock['permanent_city_page_block_title'];
	   $arysubblockTitle = explode("||",$subblocktitle);
	   $subblockTitleType = $arysubblockTitle[0];
	   //echo $subblock['permanent_landing_page_block_root']."||".$blockTitleType;
	if($subblock['permanent_city_page_block_root'] == $blockTitleType){
?>		
    <div class="langing_header">
      <?php  echo "<".$subblockTitleType.">".$arysubblockTitle[1]."</".$blockTitleType.">" ?>
     <div class="landing_border"></div>
    </div>

    <div class="row mt-2">
<?php       
if(isset($landingPage_block_data) && !empty($landingPage_block_data)){
		 $subProductnum=0;
	foreach($landingPage_block_data as $landingPage_subblock ){	
	   
	 foreach($landingPage_subblock['response']['body']['diamonds'] as $diamond){ 
		
	  if($subProductnum < $subblock['permanent_city_page_block_max_products'])
	  {
			$subProductnum++;	
?>			
	  <div class="col-md-3 cate_icon mt-2 ceri_img">
        <div class="catelogue_icon"><?php echo "Num-". $Productnum;?>
         <a name="fb_share" type="button" href="https://www.facebook.com/sharer.php?u=https://labgrown-diamond-jewelry.com/&t=<?php echo $diamond['image_url'];?>&<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>','sharer','toolbar=0,status=0,width=548,height=325');" target="_blank"><i class="fa fa-share-alt" aria-hidden="true" title="Share"></i>
         </a>
            <?php 
                if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id'])){ 
                     $current_url = $_SERVER['REQUEST_URI'];
                     $is_product_in_wishlist = false; // Flag to track if the product is in the wishlist
                     if(isset($existing_wishlist) && !empty($existing_wishlist)){
                           foreach ($existing_wishlist as $product_id => $wishlist_data){
                              // Check if the current product is in the wishlist
                              if($wishlist_data !== false && is_array($wishlist_data) && $wishlist_data['product_id'] == $diamond['stock_num']){
                                 $is_product_in_wishlist = true;
                                 break; // Exit the loop if the product is found in the wishlist
                              } 
                           }
                     }
                     if($is_product_in_wishlist){ // Display heart icon if the product is in the wishlist
                        ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" data-id="<?php echo $wishlist_data['id'];?>" data-url="<?php echo $current_url;?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>"  data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-shape="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>">
                           <i class="fa heart-icon fa-heart" style="color: rgb(255, 128, 128);" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } else { // Display default heart icon if the product is not in the wishlist ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" data-url="<?php echo $current_url;?>" data-product="<?php echo $diamond['stock_num'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-shape="<?php echo $diamond['shape'];?>"  data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>" >
                              <i class="fa fa-heart heart-icon" onclick="toggleHeart(this)"></i> 
                           </button>
                     <?php } 
                  } else { ?>
                           <a href="set-wish-list"><button id="add-wishlist" class="btn button btn-setting bd-color-setting bd-radius-5 like"> <i class="fa fa-heart heart-icon"></i> </button></a>
                  <?php } ?>  
        <!-- <i class="fa fa-share-alt" aria-hidden="true" title="Share"></i>-->    
            <?php 
              $total_price = $diamond['total_sales_price'];
               $discount_percent = $diamond['discount_percent']; 
               $dis_total_price  = $total_price * $discount_percent/100; 
               $total_disount_price = $total_price - $dis_total_price;?>
               <span class="nav-item add-card"><button type="" data-product-name="Radiant 0.45 ct Z VVS1" data-product-price="336.825" data-product-id="DemoIn2" data-image="https://diamondmedia.s3.us-east-1.amazonaws.com/B2C/imaged/930085102/still.jpg" data-product-size="0.45" data-cert-url="https://d24ppbhzdyfrur.cloudfront.net/uploads/diamond/gia_cert/GIA_GuidetoUnderstandingReports_DiamondGradingReport.pdf" data-product-shape="Radiant" data-product-color="Z" data-product-type="lab_grown_diamond" data-product-clarity="VVS1" class="add-cart" style="border: none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
              </span>
        </div>
        <a href="product-view/<?php echo $diamond['stock_num'];?>">
            <img src="<?php echo $diamond['image_url'];?>" class="img-fluid">
        </a>
        <div class="catelogue_table">
          <table class="table-bordered table-responsive mb-2">
            <thead>
          <tr>
            <th class="red_color has-tooltip_table_detailes" rowspan="2" ><span>Quality/Shape/WT?
            <div class="tooltip">
              <h3 class="popover-title">Diamond Details</h3>
              <div class="popover-content">
                <ul>
                  <li><strong>Stock Id:</strong><?php echo $diamond['stock_num'];?></li>
                  <li><strong>Lab:</strong> <span><?php echo $diamond['lab'];?></span></li>
                  <li><strong>Cut:</strong> <span><?php echo $diamond['cut_long'];?></span></li>
                  <li><strong>Symmetry:</strong> <span><?php echo $diamond['symmetry_short'];?></span></li>
                  <li><strong>Polish:</strong> <span><?php echo $diamond['polish_short'];?></span></li>
                  <li><strong>Flouresence:</strong> <?php echo $diamond['fluorescence_intensity_long'];?></li>
                  <li><strong>Measurements:</strong> <span><?php echo $diamond['measurement'];?></span></li>
                  <li><strong>Table:</strong> <span><?php echo $diamond['table_percent'].'%';?></span></li>
                </ul>
              </div>
            </div>
            </span>
            </th>
            <th class="red_color" rowspan="2">Company Price
            </th>
            <th colspan="2" title="Discount on International wholesale diamond prices ie. Rapaport price">Discount ?
            </th>
            <th class="red_color has-tooltip_click" rowspan="2"><span>You Pay After Discount?
            <div class="tooltip">
            <h3 class="popover-title">Price Details</h3>
            <div class="popover-content">
              <ul>
                <li><strong>Diamond :</strong> <span><i class="fa fa-inr" aria-hidden="true"></i>
                  <?php 
                      $productpricepercent = '';
                      if(isset($product_price) && !empty($product_price)){
                         foreach($product_price as $productprice){
                            if($productprice['purchase_item_name']=='diamond'){
                               $productpricepercent = (isset($productprice['purchase_percent']) && !empty($productprice['purchase_percent']))? $productprice['purchase_percent']:'0';
                           //echo "<pre>"; echo $diamond['total_sales_price'];die;
                  ?>
                  <a href="product-view/<?php   $diamond['stock_num'];?>"><?php $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; echo $finalcost;?></a>
                 <?php 
                    }
                      }
                    }
                 ?>  
                <?php 
                   $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; 
                   $shipping = 0;
                   $shippingwithgst = 0;
                   $taxtionontotal  = 0;
                   $grand_total = 0;
                   if(isset($shippingwithtax) && !empty($shippingwithtax)){
                      foreach($shippingwithtax as $shippingtax){
                        //if($shippingtax['country_id']=='diamond'){
                            $shipping = (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                            $taxtion  = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
                            $dimanodtotalcost = $finalcost;
                            $taxtionontotal   = $dimanodtotalcost * $taxtion/100;
                            $shippinggst      = $shipping + $taxtionontotal;
                            $shippingwithgst  = (isset($shippinggst) && !empty($shippinggst))? $shippinggst:'0';
                  ?>
                <li><strong>Taxation:</strong><span><i class="fa fa-inr" aria-hidden="true"></i><?php echo $taxtion.'%';?></span></li>
                <li><strong>Shipping:</strong><span><i class="fa fa-inr" aria-hidden="true"></i><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo round($shippingwithgst,2);?></a></span></li>
                <?php $grand_total = $shippingwithgst + $finalcost; ?>
                <?php } } ?>
                <?php 
                  $totalDiscount = 0; // Initialize a variable to hold the sum of discounts
                  if (isset($discounts) && !empty($discounts) && is_array($discounts)) { // Make sure $discounts is an array
                      foreach ($discounts as $discount) {
                          // Assuming $discount['discount'] contains the discount amount you want to accumulate
                          $totalDiscount += $discount['discount_percent']; // Accumulate the discounts
                      }
                  }
                  $grandTotal = (isset($grand_total) && !empty($grand_total)) ? $grand_total - $totalDiscount : 0;
                  echo '<li><strong>Grand Total:</strong> <span><i class="fa fa-inr" aria-hidden="true"></i>' . round($grandTotal, 2) . '</span></li>';
                ?>
              </ul>
            </div>
            </div>
            </span>
            </th> 
          </tr>
          <tr>
            <th class="red_color">%</th>
            <th class="red_color">Amount</th>
          </tr>
        </thead>  
        <tbody>
          <tr>
            <th><?php echo $diamond['shape'].'/' .$diamond['size'];?></th>
            <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i><?php echo round($grand_total,2);?></td>
              <?php 
                $lastDiscountAmount = 0; // Default to 0 if no discounts
                if(isset($discounts) && !empty($discounts) && is_array($discounts)){
                  foreach($discounts as $discount){
                    $lastDiscountAmount = $discount['discount']; // Keep updating with each discount found
              ?>
                <td rowspan="2"><?php echo $discount['discount_percent'].'%'; ?></td>
                <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i>
                <?php 
                  $discount_percent = $grand_total * $discount['discount_percent']/100; echo round($discount_percent,2);?>
                </td>
                <?php 
                }
              }
                $grandTotal = round($grand_total,2) - $discount_percent; // Use the last discount found
            ?>
            <td rowspan="2"><i class="fa fa-inr" aria-hidden="true"></i><?php echo round($grandTotal,2);?></td>
          </tr>
          <tr>
            <th><?php echo $diamond['color'].'/' .$diamond['clarity'];?></th>
          </tr>
          <tr>
             <td class="red_color">Title Description</td>
                <td colspan="4">
                  <div class="dynamicContainer">
                    Seo text here
                    <button class="moreless-button">Read More</button>
                    <div class="moreless-content">Additional Text 1</div>
                  </div>
                </td>
              </tr>
        </tbody>
          </table>
        </div>
    </div>
	<?php   } } } } ?> 
	  
     
    </div>
	<?php }}  ?>
  </div>
    <hr>
	
				   <?php // }  } // end sub ?>
  <!---h1 end---->
   </div>
  <?php 
       
	 } 
	 
	 }   
	 
	   
	 
	 ?>
	
	
</div>	
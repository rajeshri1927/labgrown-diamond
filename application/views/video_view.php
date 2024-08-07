
<div class="row mt-2">
      <?php
           if (isset($json_data['response']['body']['diamonds']) && !empty($json_data['response']['body']['diamonds'])) {
              foreach ($json_data['response']['body']['diamonds'] as $diamond) { 
      ?>
      <div class="col-md-3 cate_icon gia_video ceri_img">
      <div class="catelogue_icon">
            <i class="fa fa-heart" aria-hidden="true" title="Wishlist"></i>
            <i class="fa fa-share-alt" aria-hidden="true" title="Share">
              <div class="catelogue_share">
              <a href="https://www.facebook.com/vinaysmutha4/"><i class="fa fa-facebook" aria-hidden="true" alt="" title="Facebook"></i></a>
              <i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i>
              <i class="fa fa-linkedin" aria-hidden="true" alt="" title="Linkedin"></i>
              <i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i>
              </div>
            </i>
            <!-- <i class="fa fa-shopping-bag" aria-hidden="true" title="Add to Cart"></i> -->
            <span class="nav-item add-card"> <?php $total_price = $diamond['total_sales_price'];
                 $discount_percent = $diamond['discount_percent']; 
                 $dis_total_price  = $total_price * $discount_percent/100; 
                 $total_disount_price = $total_price - $dis_total_price;?><button type="button" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.$diamond['color'].' '.$diamond['clarity'];?>"  data-product-price="<?php echo $total_disount_price; ?>" data-product-id="<?php echo($diamond['stock_num']); ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-size="<?php echo $diamond['size'];?>" data-product-shape ="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-size="<?php echo $diamond['size'];?>" data-product-type ="<?php echo $diamond['type'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" class="add-cart" style="border:none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button></span>
          </div>
          <video controls="controls" loop autoplay>
            <source src="assets/images/1-FL.mp4" type="video/mp4">
          </video>
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
                    <a href="product-view/<?php echo $diamond['stock_num'];?>"><?php $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; echo $finalcost;?></a>
                   <?php 
                      }
                        }
                      }
                   ?>  
                  <?php 
                     $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; 
                     $shipping        = 0;
                     $shippingwithgst = 0;
                     $taxtionontotal  = 0;
                     $grand_total     = 0;
                     if(isset($shippingwithtax) && !empty($shippingwithtax)){
                        foreach($shippingwithtax as $shippingtax){
                          //if($shippingtax['country_id']=='diamond'){
                              $shipping= (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                              $taxtion = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
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
                          $totalDiscount+= $discount['discount_percent']; // Accumulate the discounts
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
  <?php } }elseif(isset($api_response) && !empty($api_response)){
    foreach ($api_response as $diamond) { ?>
      <div class="col-md-3 cate_icon gia_video ceri_img">
        <video controls="controls" loop autoplay>
          <source src="assets/images/1-FL.mp4" type="video/mp4">
        </video>
        <span class="nav-item add-card"> <?php $total_price = $diamond['total_sales_price'];
          $discount_percent = $diamond['discount_percent']; 
          $dis_total_price  = $total_price * $discount_percent/100; 
          $total_disount_price = $total_price - $dis_total_price;?><button type="button" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.$diamond['color'].' '.$diamond['clarity'];?>"  data-product-price="<?php echo $total_disount_price; ?>" data-product-id="<?php echo($diamond['stock_num']); ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-size="<?php echo $diamond['size'];?>" data-product-shape ="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-size="<?php echo $diamond['size'];?>" data-product-type ="<?php echo $diamond['type'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" class="add-cart" style="border:none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button></span>
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
                    <a href="product-view/<?php echo $diamond['stock_num'];?>"><?php $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; echo $finalcost;?></a>
                   <?php 
                      }
                        }
                      }
                   ?>  
                  <?php 
                     $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100; $finalcost = $diamond['total_sales_price'] + $totalcost; 
                     $shipping        = 0;
                     $shippingwithgst = 0;
                     $taxtionontotal  = 0;
                     $grand_total     = 0;
                     if(isset($shippingwithtax) && !empty($shippingwithtax)){
                        foreach($shippingwithtax as $shippingtax){
                          //if($shippingtax['country_id']=='diamond'){
                              $shipping= (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                              $taxtion = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
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
                          $totalDiscount+= $discount['discount_percent']; // Accumulate the discounts
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
  <?php } } ?>
  <script>
     $(document).ready(function() {
    $('.fa.fa-share-alt').click(function() {
      $('.catelogue_share').toggleClass('show');
    });
  });
    </script>
</div>
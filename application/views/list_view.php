<?php 
      if (isset($json_data['response']['body']['diamonds']) && !empty($json_data['response']['body']['diamonds'])) {
   ?>

   <div class="table-wrapper">
      <table class="table-bordered table-responsive table_list">
         <thead>
            <tr>
               <th class="sortable-header" data-sort="Like">Like</th>
               <th class="sortable-header" data-sort="Status" onclick="sortTable('Status')">Buy  <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Stock_num">Stock ID<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Shape">Shape <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Carat">Carat <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Color">Color<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Clarity">Clarity<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Cut">Cut<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Lab">Lab <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Discount"down title="Discount">Dis?<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Price" title="Price/Carat">Price Per Ct/?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Total">Diamond Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Total">Other Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Total">Grand Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header">Certificate</th>
               <th class="sortable-header">Image</th>
               <th class="sortable-header">Video</th>
               <th class="sortable-header">Details</th>
               <th class="sortable-header" data-sort="Pol">Pol <i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Symmetry" title="Symmetry">Sym?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Fluorescence" title="Fluorescence">Fluor?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Depth">Depth<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Table">Table<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Measurments" title="Measurements">Measur?<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Ratio">Ratio<i class="fa fa-chevron-down toggleSort"></i></th>
            </tr>
         </thead>
         <tbody>
         <div class="button_table pull-right">
                  <button id="scroll-left"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
                  <button id="scroll-right"><i class="fa fa-angle-double-right aria-hidden"></i></button>
      </div>
            <?php
               $n = 55;
               foreach ($json_data['response']['body']['diamonds'] as $index => $diamond) { 
            ?>
            <tr>
               <td>
                  <?php 
                     if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id'])) { 
                        $current_url = $_SERVER['REQUEST_URI'];
                        $is_product_in_wishlist = false; // Flag to track if the product is in the wishlist
                        if(isset($existing_wishlist) && !empty($existing_wishlist)){
                              foreach ($existing_wishlist as $product_id => $wishlist_data) {
                                 // Check if the current product is in the wishlist
                                 if($wishlist_data !== false && is_array($wishlist_data) && $wishlist_data['product_id'] == $diamond['stock_num']) {
                                    $is_product_in_wishlist = true;
                                    break; // Exit the loop if the product is found in the wishlist
                                 }
                              }
                        }
                        if ($is_product_in_wishlist) { // Display heart icon if the product is in the wishlist
                        ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;" data-id="<?php echo $wishlist_data['id'];?>" data-url="<?php echo $current_url;?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>"  data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-shape="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>">
                           <i class="fa heart-icon fa-heart" style="color: rgb(0 149 120);" onclick="toggleHeart(this)"></i> 
                           </button>
                        <?php } else { // Display default heart icon if the product is not in the wishlist ?>
                              <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;" data-url="<?php echo $current_url;?>" data-product="<?php echo $diamond['stock_num'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-shape="<?php echo $diamond['shape'];?>"  data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>" >
                                 <i class="fa fa-heart-o heart-icon" onclick="toggleHeart(this)"></i> 
                              </button>
                        <?php } 
                     } else { ?>
                              <a href="set-wish-list"><button id="add-wishlist" class="btn button btn-setting bd-color-setting bd-radius-5 like"> <i class="fa fa-heart-o heart-icon"></i> </button></a>
                     <?php } ?>  
               </td>
               <td class="nav-item add-card"> <?php $total_price = $diamond['total_sales_price'];
                 $discount_percent = $diamond['discount_percent']; 
                 $dis_total_price  = $total_price * $discount_percent/100; 
                 $total_disount_price = $total_price - $dis_total_price;?><button type="button" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.$diamond['color'].' '.$diamond['clarity'];?>"  data-product-price="<?php echo $total_disount_price; ?>" data-product-id="<?php echo($diamond['stock_num']); ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-size="<?php echo $diamond['size'];?>" data-product-shape ="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-size="<?php echo $diamond['size'];?>" data-product-type ="<?php echo $diamond['type'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" class="add-cart" style="border:none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['stock_num'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['shape'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['size'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['color'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['clarity'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['cut'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['lab'];?></a></td>
               <?php 
               $totalDiscount = 0; 
               if (isset($discounts) && !empty($discounts) && is_array($discounts)) { 
                  // Check if $discounts is an array and not empty
                  foreach ($discounts as $discount) {
                       $totalDiscount += $discount['discount_percent']; //+ $n; 
                       
               ?>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $totalDiscount.'%' . ' (Virtual dis $ ' . $diamond['csv_discount'] . ')';?></a></td>
               <?php 
                  $n++; 
                  }
               }
               ?>
               <?php 
                  $finalcost = 0;
                  $productpricepercent = '';
                  if(isset($product_price) && !empty($product_price)){
                     foreach($product_price as $productprice){
                        if($productprice['purchase_item_name']=='diamond'){
                           $productpricepercent = (isset($productprice['purchase_percent']) && !empty($productprice['purchase_percent']))? $productprice['purchase_percent']:'0';
                           //echo $productpricepercent;die;
                           //$totalDiscount += $productpricepercent + $n; 
               ?>
               <td>
                  <a href="product-view/<?php echo $diamond['stock_num']; ?>">
                       $&nbsp;<?php
                       $pricepercarat = $diamond['price_per_ct'] * $productpricepercent / 100;
                       echo round($pricepercarat + $diamond['price_per_ct'], 2) . ' (Virtual PP $ ' . $diamond['price_per_ct'] . ')';
                       ?>
                  </a>
               </td>
               <td>
                  <a href="product-view/<?php echo $diamond['stock_num']; ?>">
                       $&nbsp;<?php
                       $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100;
                       $finalcost = $diamond['total_sales_price'] + $totalcost;
                       echo $finalcost . ' (Virtual SP $ ' . $diamond['total_sales_price'] . ')';
                       ?>
                  </a>
               </td>  
               <?php 
                  }
                     }
                     //$n++;
                  }
               ?>  
               <?php 
                  $shipping = 0;
                  // $shippingwithgst = 0;
                  $taxtionontotal = 0;
                  if(isset($shippingwithtax) && !empty($shippingwithtax)){
                     foreach($shippingwithtax as $shippingtax){
                        // if($shippingtax['country_id']=='diamond'){
                           $shipping = (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                           $taxtion  = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
                           $taxtionontotal  = $finalcost * $taxtion/100;
                           $shippinggst     = $shipping + $taxtionontotal;
                           $shippingwithgst = (isset($shippinggst) && !empty($shippinggst))? $shippinggst:'0';
               ?>
               <td class="grn_to"><a href="product-view/<?php echo $diamond['stock_num'];?>">$&nbsp;<?php echo round($shippingwithgst,2);?></a>
                  <div class="grand_total" style="width: 180px!important;">
                    <h3 class="popover-title">Diamond Details</h3>
                    <div class="popover-content">
                        <ul>
                           <li><strong>Product Price:</strong> $&nbsp;<span><?php echo round($finalcost,2);?></span></li>
                           <li><strong>Taxation(<?php echo $taxtion.'%';?>): </strong> $&nbsp;<span><?php echo round($taxtionontotal,2);?></span></li>
                           <li><strong>Shipping:</strong> $&nbsp;<span><?php echo $shipping;?></span></li>
                           <li><strong>Grand Total:</strong> $&nbsp;<span><?php 
                           echo round($shippingwithgst,2);?></span></li>
                        </ul>
                     </div>
                  </div>  
               </td>
               <?php } } ?>
               <td class="grn_to"><a href="product-view/<?php echo $diamond['stock_num'];?>">$&nbsp;<?php $grand_total =  $shippingwithgst + $finalcost; (isset($grand_total) && !empty($grand_total))? $grand_total:'0'; $grandTotal = $grand_total * $totalDiscount/100; $finalGrandTotal = $grand_total - $grandTotal;
               echo round($finalGrandTotal,2);
               $grand_total =  $shippingwithgst + $finalcost; 
               (isset($grand_total) && !empty($grand_total))? $grand_total:'0';
               $grandTotal  = $grand_total * $totalDiscount/100; $finalGrandTotal = $grand_total - $grandTotal;
               ?></a>
               <div class="grand_total" style="width: 180px!important;">
                 <h3 class="popover-title">Diamond Details</h3>
                 <div class="popover-content">
                   <ul>
                     <li><strong>Taxation: </strong> $&nbsp;<span><?php echo round($taxtionontotal,0);?></span></li>
                     <li><strong>Shipping: </strong> $&nbsp;<span><?php echo $shipping;?></span></li>
                     <li><strong>Diamond Cost: </strong> $&nbsp;<span><?php echo round($finalcost,2);?></span></li>
                     <li><strong>Subtotal: </strong> $&nbsp;<span><?php echo round($grand_total,2);?></span></li>
                     <li><strong>Discount(%): </strong> $&nbsp;<span><?php echo $totalDiscount.'%';?></span></li>
                     <li><strong>Grand Total: </strong> $&nbsp;<span>
                     <?php 
                        
                        // "<pre>";echo 'shipping& tax'.$shippingwithgst; 
                        //       echo "<br>";
                        //       echo 'finalcost'.$finalcost;
                        //       echo "<br>";
                        //       echo 'grand_total'.$grand_total;
                        //       echo "<br>";
                        //       echo 'grandTotal'.$grandTotal;
                        //       echo "<br>";
                        //       echo 'finalGrandTotal'.$finalGrandTotal;die;
                        //       shipping& tax  565.49984
                        //       <br>finalcost  363.888
                        //       <br>grand_total  929.38784
                        //       <br>grandTotal  92.938784
                        //       <br>finalGrandTotal  836.449056
                        echo round($finalGrandTotal,2);?></span></li>
                  </ul>
                 </div>
               </div>         
               </td> 
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_certificate_<?php echo $index + 1; ?>">Certificate</button>
                     <div class="modal show" id="product_certificate_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                        <div class="container mt-5">
                           <div class="modal-pro_img" style="width:40%!important;">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Certificate Overview</h4>
                                 <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                 <div class="container">
                                    <div class="border">  
                                       <div class="prosele_head">
                                       <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'   '.$diamond['polish'].'  '.$diamond['shape'].' Diamond ';?></h6>
                                       </div>
                                       <div class="d-md-flex mt-2">
                                          <div class="col-md-12 col-sm-6 text-center">
                                             <iframe src="<?php echo $diamond['cert_url'];?>" width="100%" height="300px"></iframe>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_image_<?php echo $index + 1;?>">Image</button>
                     <div class="modal show" id="product_image_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                        <div class="container mt-5">
                           <div class="modal-pro_img" style="width:40%!important;">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Diamond Overview</h4>
                                 <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                 <div class="container">
                                    <div class="border">
                                       <div class="prosele_head">
                                          <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'   '.$diamond['polish'].'  '.$diamond['shape'].' Diamond ';?></h6>
                                       </div>
                                       <div class="d-md-flex mt-2">
                                          <div class="col-md-12 col-sm-6 text-center">
                                          <img srcset="<?php echo $diamond['image_url'];?> 320w, 
                                                <?php echo $diamond['image_url'];?> 640w, 
                                                <?php echo $diamond['image_url'];?> 1280w" 
                                                sizes="(max-width: 640px) 100vw, 50vw" 
                                                src="<?php echo $diamond['image_url'];?>" 
                                                alt="Image" 
                                                loading="lazy">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_video_<?php echo $index + 1;?>">Video</button>
                  <div class="modal show" id="product_video_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                     <div class="container mt-5">
                        <div class="modal-pro_img">
                           <!-- Modal Header -->
                           <div class="modal-header">
                              <h4 class="modal-title">Diamond Overview</h4>
                              <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                           </div>
                           <!-- Modal body -->
                           <div class="modal-body">
                              <div class="container">
                                 <div class="border">
                                    <div class="prosele_head">
                                    <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'  '.$diamond['polish'].'  '.$diamond['shape'].' Diamond';?></h6>
                                    </div>
                                    <div class="d-md-flex mt-2">
                                       <div class="col-md-12 col-sm-6 text-center">
                                       <video width="500" height="360" controls>
                                          <source src="<?php 
                                                $withoutExt = preg_replace('/\.\w+$/', '', $diamond['video_url']) . '.mp4';
                                                echo $withoutExt;
                                          ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                       </video>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_Details_<?php echo $index + 1;?>">Details</button>
                  <div class="modal show" id="product_Details_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                     <div class="container mt-5">
                        <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header">
                              <h4 class="modal-title">Diamond Overview</h4>
                              <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                           </div>
                           <!-- Modal body -->
                           <div class="modal-body">
                              <div class="container">
                                 <div class="border">
                                    <div class="prosele_head">
                                    <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'  '.$diamond['polish'].'  '.$diamond['shape'].' Diamond';?></h6>
                                    </div>
                                    <div class="d-md-flex mt-2">
                                       <div class="col-md-6">
                                          <div class="pro_img">
                                             <img srcset="<?php echo $diamond['image_url'];?> 320w, 
                                             <?php echo $diamond['image_url'];?> 640w, 
                                             <?php echo $diamond['image_url'];?> 1280w" 
                                             sizes="(max-width: 640px) 100vw, 50vw" 
                                             src="<?php echo $diamond['image_url'];?>" 
                                             alt="Image" 
                                             loading="lazy">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="panel panel-default">
                                             <div class="panel-heading"><strong>Diamond Details</strong></div>
                                             <div class="table-responsive">
                                                <table class="table inner_details_diamond_toogle firstdiamodblock">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>SKU</strong></td>
                                                         <td><?php echo $diamond['stock_num'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Price</strong></td>
                                                         <td><strong style="color: #d04545">            
                                                            <i class="fa fa-usd"></i><?php echo $diamond['price_per_carat'];?>
                                                            </strong>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Carat</strong></td>
                                                         <td><?php echo $diamond['size'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Shape</strong></td>
                                                         <td><?php echo ucfirst($diamond['shape']);?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Cut</strong></td>
                                                         <td><?php echo $diamond['cut'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Color</strong></td>
                                                         <td><?php echo ucfirst($diamond['color']);?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Clarity</strong></td>
                                                         <td><?php echo $diamond['clarity'];?></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <table class="table inner_details_diamond_toogle Seconddiamodblock">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Depth</strong></td>
                                                         <td><?php echo $diamond['depth_percent'].'%';?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Table</strong></td>
                                                         <td><?php echo $diamond['table_percent'].'%';?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Polish</strong></td>
                                                         <td><?php echo $diamond['polish_short'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Symmetry</strong></td>
                                                         <td><?php echo $diamond['symmetry'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Girdle</strong></td>
                                                         <td><?php echo $diamond['girdle_condition'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Culet</strong></td>
                                                         <td><?php echo $diamond['culet_size'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Fluorescence</strong></td>
                                                         <td><?php echo $diamond['fluorescence_intensity_long'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Measurements</strong></td>
                                                         <td><?php echo $diamond['measurement'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Lab</strong></td>
                                                         <td><?php echo $diamond['lab'];?></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['cut_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['polish_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['symmetry_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['depth_percent'].'%';?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['table_percent'].'%';?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['measurement'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['meas_ratio'];?></a></td>   
            </tr>
            <?php } ?>
            <!-- <div class="row" id="diamondContainer1">
               <div class="col-md-3" id="<?php //echo $diamond['id'];?>">
                  <a href="product-view/<?php //echo $diamond['id'];?>" style="text-decoration:none;">
                     <div id="<?php //echo $diamond['id']; ?>">
                        <img src="<?php //echo $diamond['image_url']; ?>" class="img-fluid mymultiplediv" id="vvs22">
                     </div>
                     <p class="image_description">
                        <h2 style="font-size: 1.15rem;"><?php //echo $diamond['size']; ?> Carat <?php //echo $diamond['shape']; ?> Lab Diamond</h2>
                        <p><?php //echo $diamond['cut']; ?> | <?php //echo $diamond['lab']; ?> | <?php //echo $diamond['clarity']; ?></p>
                        <p>Shape: <?php //echo $diamond['shape']; ?> | Color: <?php //echo $diamond['color']; ?> | Price: <?php //echo '$&nbsp;'.$diamond['total_sales_price']; ?></p>
                        <p><a href="<?php //echo $diamond['cert_url']; ?>" title="Diamond certificate" class="right" target="_blank"><i class="fa fa-certificate"></i></a> </p>
                     </p>
                  </a>
               </div>
            </div> -->
            <?php //} ?>
         </tbody>
      </table>
   </div>
   <?php }elseif(isset($api_response) && !empty($api_response)){ ?> 
   <div class="table-wrapper">
      <table class="table-bordered table-responsive">
         <thead>
            <tr>
               <th class="sortable-header" data-sort="Like">Like</th>
               <th class="sortable-header" data-sort="Status" onclick="sortTable('Status')">Buy  <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Stock_num">Stock ID<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Shape">Shape <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Carat">Carat <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Color">Color<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Clarity">Clarity<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Cut">Cut<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Lab">Lab <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Discount"down title="Discount">Dis?<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Price" title="Price/Carat">Price Per Ct/?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Total">Diamond Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Total">Other Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Total">Grand Total <i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header">Certificate</th>
               <th class="sortable-header">Image</th>
               <th class="sortable-header">Video</th>
               <th class="sortable-header">Details</th>
               <th class="sortable-header" data-sort="Pol">Pol <i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Symmetry" title="Symmetry">Sym?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Fluorescence" title="Fluorescence">Fluor?<i class="fa fa-chevron-down toggleSort"></i>
               </th>
               <th class="sortable-header" data-sort="Depth">Depth<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Table">Table<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Measurments" title="Measurements">Measur?<i class="fa fa-chevron-down toggleSort"></i></th>
               <th class="sortable-header" data-sort="Ratio">Ratio<i class="fa fa-chevron-down toggleSort"></i></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $n = 55;
               foreach ($api_response as $diamond) {   
            ?>
            <tr>
               <td>
                  <?php 
                     if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id'])) { 
                        $current_url = $_SERVER['REQUEST_URI'];
                        $is_product_in_wishlist = false; // Flag to track if the product is in the wishlist
                        if(isset($existing_wishlist) && !empty($existing_wishlist)){
                              foreach ($existing_wishlist as $product_id => $wishlist_data) {
                                 // Check if the current product is in the wishlist
                                 if($wishlist_data !== false && is_array($wishlist_data) && $wishlist_data['product_id'] == $diamond['stock_num']) {
                                    $is_product_in_wishlist = true;
                                    break; // Exit the loop if the product is found in the wishlist
                                 }
                              }
                        }
                        if ($is_product_in_wishlist) { // Display heart icon if the product is in the wishlist
                        ?>
                           <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;" data-id="<?php echo $wishlist_data['id'];?>" data-url="<?php echo $current_url;?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>"  data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-shape="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>">
                           <i class="fa heart-icon fa-heart" style="color: rgb(0 149 120);" onclick="toggleHeart(this)"></i> 
                           </button>
                        <?php } else { // Display default heart icon if the product is not in the wishlist ?>
                              <button type="button" id="add-wishlist-<?php echo $index + 1; ?>" class="btn button btn-setting bd-color-setting bd-radius-5 like add-wishlist" style="border:none;background:none;" data-url="<?php echo $current_url;?>" data-product="<?php echo $diamond['stock_num'];?>" data-userid="<?php echo $_SESSION['user']['user_id'];?>" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '. $diamond['clarity'];?>" data-product-price="<?php echo $diamond['total_sales_price']; ?>" data-product-id="<?php echo $diamond['stock_num']; ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-shape="<?php echo $diamond['shape'];?>"  data-product-color="<?php echo $diamond['color'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" data-product-type ="<?php echo $diamond['type'];?>" >
                                 <i class="fa fa-heart-o heart-icon" onclick="toggleHeart(this)"></i> 
                              </button>
                        <?php } 
                     } else { ?>
                              <a href="set-wish-list"><button id="add-wishlist" class="btn button btn-setting bd-color-setting bd-radius-5 like" style="border:none;background:none;"> <i class="fa fa-heart-o heart-icon"></i> </button></a>
                     <?php } ?>  
               </td>
               <td class="nav-item add-card"> <?php $total_price = $diamond['total_sales_price'];
                 $discount_percent = $diamond['discount_percent']; 
                 $dis_total_price  = $total_price * $discount_percent/100; 
                 $total_disount_price = $total_price - $dis_total_price;?><button type="button" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.$diamond['color'].' '.$diamond['clarity'];?>"  data-product-price="<?php echo $total_disount_price; ?>" data-product-id="<?php echo($diamond['stock_num']); ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-size="<?php echo $diamond['size'];?>" data-product-shape ="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-size="<?php echo $diamond['size'];?>" data-product-type ="<?php echo $diamond['type'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" class="add-cart" style="border:none;background:none;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['stock_num'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['shape'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['size'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['color'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['clarity'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['cut'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['lab'];?></a></td>
               <?php 
               $totalDiscount = 0; 
               if (isset($discounts) && !empty($discounts) && is_array($discounts)) { 
                  // Check if $discounts is an array and not empty
                  foreach ($discounts as $discount) {
                       $totalDiscount += $discount['discount_percent']; //+ $n; 
                       
               ?>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $totalDiscount.'%' . ' (Virtual dis $ ' . $diamond['csv_discount'] . ')';?></a></td>
               <?php 
                  $n++; 
                  }
               }
               ?>
               <?php 
                  $finalcost = 0;
                  $productpricepercent = '';
                  if(isset($product_price) && !empty($product_price)){
                     foreach($product_price as $productprice){
                        if($productprice['purchase_item_name']=='diamond'){
                           $productpricepercent = (isset($productprice['purchase_percent']) && !empty($productprice['purchase_percent']))? $productprice['purchase_percent']:'0';
                           //echo $productpricepercent;die;
                           //$totalDiscount += $productpricepercent + $n; 
               ?>
               <td>
                  <a href="product-view/<?php echo $diamond['stock_num']; ?>">
                       $&nbsp;<?php
                       $pricepercarat = $diamond['price_per_ct'] * $productpricepercent / 100;
                       echo round($pricepercarat + $diamond['price_per_ct'], 2) . ' (Virtual PP $ ' . $diamond['price_per_ct'] . ')';
                       ?>
                  </a>
               </td>
               <td>
                  <a href="product-view/<?php echo $diamond['stock_num']; ?>">
                       $&nbsp;<?php
                       $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100;
                       $finalcost = $diamond['total_sales_price'] + $totalcost;
                       echo $finalcost . ' (Virtual SP $ ' . $diamond['total_sales_price'] . ')';
                       ?>
                  </a>
               </td>  
               <?php 
                  }
                     }
                     //$n++;
                  }
               ?>  
               <?php 
                  $shipping = 0;
                  // $shippingwithgst = 0;
                  $taxtionontotal = 0;
                  if(isset($shippingwithtax) && !empty($shippingwithtax)){
                     foreach($shippingwithtax as $shippingtax){
                        // if($shippingtax['country_id']=='diamond'){
                           $shipping = (isset($shippingtax['shipping']) && !empty($shippingtax['shipping']))? $shippingtax['shipping']:'0';
                           $taxtion  = (isset($shippingtax['gst']) && !empty($shippingtax['gst']))? $shippingtax['gst']:'0';
                           $taxtionontotal  = $finalcost * $taxtion/100;
                           $shippinggst     = $shipping + $taxtionontotal;
                           $shippingwithgst = (isset($shippinggst) && !empty($shippinggst))? $shippinggst:'0';
               ?>
               <td class="grn_to"><a href="product-view/<?php echo $diamond['stock_num'];?>">$&nbsp;<?php echo round($shippingwithgst,2);?></a>
                  <div class="grand_total" style="width: 180px!important;">
                    <h3 class="popover-title">Diamond Details</h3>
                    <div class="popover-content">
                        <ul>
                           <li><strong>Product Price:</strong> $&nbsp;<span><?php echo round($finalcost,2);?></span></li>
                           <li><strong>Taxation(<?php echo $taxtion.'%';?>): </strong> $&nbsp;<span><?php echo round($taxtionontotal,2);?></span></li>
                           <li><strong>Shipping:</strong> $&nbsp;<span><?php echo $shipping;?></span></li>
                           <li><strong>Grand Total:</strong> $&nbsp;<span><?php 
                           echo round($shippingwithgst,2);?></span></li>
                        </ul>
                     </div>
                  </div>  
               </td>
               <?php } } ?>
               <td class="grn_to"><a href="product-view/<?php echo $diamond['stock_num'];?>">$&nbsp;<?php $grand_total =  $shippingwithgst + $finalcost; (isset($grand_total) && !empty($grand_total))? $grand_total:'0'; $grandTotal = $grand_total * $totalDiscount/100; $finalGrandTotal = $grand_total - $grandTotal;
               echo round($finalGrandTotal,2);
               $grand_total =  $shippingwithgst + $finalcost; 
               (isset($grand_total) && !empty($grand_total))? $grand_total:'0';
               $grandTotal  = $grand_total * $totalDiscount/100; $finalGrandTotal = $grand_total - $grandTotal;
               ?></a>
               <div class="grand_total" style="width: 180px!important;">
                 <h3 class="popover-title">Diamond Details</h3>
                 <div class="popover-content">
                   <ul>
                     <li><strong>Taxation: </strong> $&nbsp;<span><?php echo round($taxtionontotal,0);?></span></li>
                     <li><strong>Shipping: </strong> $&nbsp;<span><?php echo $shipping;?></span></li>
                     <li><strong>Diamond Cost: </strong> $&nbsp;<span><?php echo round($finalcost,2);?></span></li>
                     <li><strong>Subtotal: </strong> $&nbsp;<span><?php echo round($grand_total,2);?></span></li>
                     <li><strong>Discount(%): </strong> $&nbsp;<span><?php echo $totalDiscount.'%';?></span></li>
                     <li><strong>Grand Total: </strong> $&nbsp;<span>
                     <?php 
                        
                        // "<pre>";echo 'shipping& tax'.$shippingwithgst; 
                        //       echo "<br>";
                        //       echo 'finalcost'.$finalcost;
                        //       echo "<br>";
                        //       echo 'grand_total'.$grand_total;
                        //       echo "<br>";
                        //       echo 'grandTotal'.$grandTotal;
                        //       echo "<br>";
                        //       echo 'finalGrandTotal'.$finalGrandTotal;die;
                        //       shipping& tax  565.49984
                        //       <br>finalcost  363.888
                        //       <br>grand_total  929.38784
                        //       <br>grandTotal  92.938784
                        //       <br>finalGrandTotal  836.449056
                        echo round($finalGrandTotal,2);?></span></li>
                  </ul>
                 </div>
               </div>         
               </td> 
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_certificate_<?php echo $index + 1; ?>">Certificate</button>
                     <div class="modal show" id="product_certificate_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                        <div class="container mt-5">
                           <div class="modal-pro_img" style="width:40%!important;">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Certificate Overview</h4>
                                 <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                 <div class="container">
                                    <div class="border">  
                                       <div class="prosele_head">
                                       <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'   '.$diamond['polish'].'  '.$diamond['shape'].' Diamond ';?></h6>
                                       </div>
                                       <div class="d-md-flex mt-2">
                                          <div class="col-md-12 col-sm-6 text-center">
                                             <iframe src="<?php echo $diamond['cert_url'];?>" width="100%" height="300px"></iframe>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_image_<?php echo $index + 1;?>">Image</button>
                     <div class="modal show" id="product_image_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                        <div class="container mt-5">
                           <div class="modal-pro_img" style="width:40%!important;">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Diamond Overview</h4>
                                 <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                 <div class="container">
                                    <div class="border">
                                       <div class="prosele_head">
                                          <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'   '.$diamond['polish'].'  '.$diamond['shape'].' Diamond ';?></h6>
                                       </div>
                                       <div class="d-md-flex mt-2">
                                          <div class="col-md-12 col-sm-6 text-center">
                                          <img srcset="<?php echo $diamond['image_url'];?> 320w, 
                                                <?php echo $diamond['image_url'];?> 640w, 
                                                <?php echo $diamond['image_url'];?> 1280w" 
                                                sizes="(max-width: 640px) 100vw, 50vw" 
                                                src="<?php echo $diamond['image_url'];?>" 
                                                alt="Image" 
                                                loading="lazy">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_video_<?php echo $index + 1;?>">Video</button>
                  <div class="modal show" id="product_video_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                     <div class="container mt-5">
                        <div class="modal-pro_img">
                           <!-- Modal Header -->
                           <div class="modal-header">
                              <h4 class="modal-title">Diamond Overview</h4>
                              <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                           </div>
                           <!-- Modal body -->
                           <div class="modal-body">
                              <div class="container">
                                 <div class="border">
                                    <div class="prosele_head">
                                    <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'  '.$diamond['polish'].'  '.$diamond['shape'].' Diamond';?></h6>
                                    </div>
                                    <div class="d-md-flex mt-2">
                                       <div class="col-md-12 col-sm-6 text-center">
                                       <video width="500" height="360" controls>
                                          <source src="<?php 
                                                $withoutExt = preg_replace('/\.\w+$/', '', $diamond['video_url']) . '.mp4';
                                                echo $withoutExt;
                                          ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                       </video>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </td>
               <td>
                  <button type="button" data-toggle="modal" data-target="#product_Details_<?php echo $index + 1;?>">Details</button>
                  <div class="modal show" id="product_Details_<?php echo $index + 1;?>" aria-modal="true" role="dialog">
                     <div class="container mt-5">
                        <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header">
                              <h4 class="modal-title">Diamond Overview</h4>
                              <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;"><i class="fa fa-times"></i></button>
                           </div>
                           <!-- Modal body -->
                           <div class="modal-body">
                              <div class="container">
                                 <div class="border">
                                    <div class="prosele_head">
                                    <h6><?php echo $diamond['size'].' Carat '.$diamond['clarity'].'  '.$diamond['polish'].'  '.$diamond['shape'].' Diamond';?></h6>
                                    </div>
                                    <div class="d-md-flex mt-2">
                                       <div class="col-md-6">
                                          <div class="pro_img">
                                             <img srcset="<?php echo $diamond['image_url'];?> 320w, 
                                             <?php echo $diamond['image_url'];?> 640w, 
                                             <?php echo $diamond['image_url'];?> 1280w" 
                                             sizes="(max-width: 640px) 100vw, 50vw" 
                                             src="<?php echo $diamond['image_url'];?>" 
                                             alt="Image" 
                                             loading="lazy">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="panel panel-default">
                                             <div class="panel-heading"><strong>Diamond Details</strong></div>
                                             <div class="table-responsive">
                                                <table class="table inner_details_diamond_toogle firstdiamodblock">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>SKU</strong></td>
                                                         <td><?php echo $diamond['stock_num'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Price</strong></td>
                                                         <td><strong style="color: #d04545">            
                                                            <i class="fa fa-usd"></i><?php echo $diamond['price_per_carat'];?>
                                                            </strong>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Carat</strong></td>
                                                         <td><?php echo $diamond['size'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Shape</strong></td>
                                                         <td><?php echo ucfirst($diamond['shape']);?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Cut</strong></td>
                                                         <td><?php echo $diamond['cut'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Color</strong></td>
                                                         <td><?php echo ucfirst($diamond['color']);?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Clarity</strong></td>
                                                         <td><?php echo $diamond['clarity'];?></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                                <table class="table inner_details_diamond_toogle Seconddiamodblock">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Depth</strong></td>
                                                         <td><?php echo $diamond['depth_percent'].'%';?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Table</strong></td>
                                                         <td><?php echo $diamond['table_percent'].'%';?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Polish</strong></td>
                                                         <td><?php echo $diamond['polish_short'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Symmetry</strong></td>
                                                         <td><?php echo $diamond['symmetry'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Girdle</strong></td>
                                                         <td><?php echo $diamond['girdle_condition'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Culet</strong></td>
                                                         <td><?php echo $diamond['culet_size'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Fluorescence</strong></td>
                                                         <td><?php echo $diamond['fluorescence_intensity_long'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Measurements</strong></td>
                                                         <td><?php echo $diamond['measurement'];?></td>
                                                      </tr>
                                                      <tr>
                                                         <td><strong>Lab</strong></td>
                                                         <td><?php echo $diamond['lab'];?></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['cut_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['polish_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['symmetry_short'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['depth_percent'].'%';?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['table_percent'].'%';?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['measurement'];?></a></td>
               <td><a href="product-view/<?php echo $diamond['stock_num'];?>"><?php echo $diamond['meas_ratio'];?></a></td>   
            </tr>
            <?php } ?>
            <!-- <div class="row" id="diamondContainer1">
               <div class="col-md-3" id="<?php //echo $diamond['id'];?>">
                  <a href="product-view/<?php //echo $diamond['id'];?>" style="text-decoration:none;">
                     <div id="<?php //echo $diamond['id']; ?>">
                        <img src="<?php //echo $diamond['image_url']; ?>" class="img-fluid mymultiplediv" id="vvs22">
                     </div>
                     <p class="image_description">
                        <h2 style="font-size: 1.15rem;"><?php //echo $diamond['size']; ?> Carat <?php //echo $diamond['shape']; ?> Lab Diamond</h2>
                        <p><?php //echo $diamond['cut']; ?> | <?php //echo $diamond['lab']; ?> | <?php //echo $diamond['clarity']; ?></p>
                        <p>Shape: <?php //echo $diamond['shape']; ?> | Color: <?php //echo $diamond['color']; ?> | Price: <?php //echo '$&nbsp;'.$diamond['total_sales_price']; ?></p>
                        <p><a href="<?php //echo $diamond['cert_url']; ?>" title="Diamond certificate" class="right" target="_blank"><i class="fa fa-certificate"></i></a> </p>
                     </p>
                  </a>
               </div>
            </div> -->
            <?php //} ?>
         </tbody>
      </table> 
   </div>
      <?php }else{ ?>
   <div> <h1 class="text-center"> Product Not found!!! </h1> </div>
      <?php } ?>
      <script>
    document.addEventListener("DOMContentLoaded", function() {
    const tableWrapper = document.querySelector(".table-wrapper");
    const table = document.querySelector(".table-list");
    const scrollLeftBtn = document.getElementById("scroll-left");
    const scrollRightBtn = document.getElementById("scroll-right");

    const scrollStep = 200; // Adjust the scroll step as needed

    scrollLeftBtn.addEventListener("click", function() {
        tableWrapper.scrollLeft -= scrollStep;
    });

    scrollRightBtn.addEventListener("click", function() {
        tableWrapper.scrollLeft += scrollStep;
    });
});

    </script>
   </div>
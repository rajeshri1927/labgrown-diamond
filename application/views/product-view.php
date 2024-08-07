<?php 
  include_once('layout/navbar.php');
  include_once('layout/header.html');
  include_once('layout/filtermanu.php');
?>
<div class="container-fluid">
     <div class="bread">
        <ul  class="breadcrumb">
           <li class="breadcrumb-item">
             <a href="home">Home</a>
           </li>
            <li class="breadcrumb-item">
             <a href="">Catelogue Page</a>
           </li>
          <li class="breadcrumb-item active" aria-current="page">
           Product Page
          </li>
        </ul>
     </div>
    <h5 class="bread_head d-md-block d-sm-none d-none">Catalogue Page Filters Selections</h5>
    <div class="product_bread">
      <div id="filter" class="filter_bread" href="#"><i class="fa fa-filter" aria-hidden="true"></i> Filter Selctions
            </div>
        <div class="filter_dis">
        <div id="boxThis">
          <ul id="breadcrumb"></ul>
        </div> 
        <div class="btn-group cate_search_gia mr-2">
            <button type="button" class="clear_all mt-1">Clear All <i class="fa fa-times"></i></button>
        </div>
        </div>
    </div>
    <hr>
    <?php
      if (isset($api_response['response']['body']['diamonds']) && !empty($api_response['response']['body']['diamonds'])) {
        foreach ($api_response['response']['body']['diamonds'] as $index => $diamond) { 
    ?>
    <div class="diamond_part">
      <div class="row product_height">
        <div class="col-md-4">
          <div class="d-flex">
          <h1>Diamond Product</h1>
          </div>
          <div class="product_image">
            <div id="custCarousel" class="carousel slide" data-ride="carousel">
              <div class="d-md-none d-sm-block d-sm-none">
              </div>
              <!-- slides -->
              <div class="carousel-inner_1">
                <div class="carousel-item active">
                <img src="<?php echo $diamond['image_url'];?>" class="img-fluid" id="myimage">
                </div>
                <div class="carousel-item">
                <img src="<?php echo $diamond['image_url'];?>" class="img-fluid" id="myimage1">
                </div>
                <div class="carousel-item">
                <img src="<?php echo $diamond['image_url'];?>" class="img-fluid" id="myimage2">
                </div>
                <div class="carousel-item">
                    <iframe src="<?php echo $diamond['cert_url'] . '#toolbar=0'; ?>" width="100%" height="500px"></iframe>
                </div>                
              </div>
              <!-- Thumbnails -->
              <ol class="carousel-indicators list-inline">
                <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
                  <i class="fa fa-angle-double-left left_icon" aria-hidden="true"></i>
                </a>
                <li class="list-inline-item">
                  <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
                    <img src="<?php echo $diamond['image_url'];?>" class="img-fluid">
                  </a>
                </li>
                <li class="list-inline-item">
                  <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                    <img src="<?php echo $diamond['image_url'];?>" class="img-fluid">
                  </a>
                </li>
                <li class="list-inline-item">
                  <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                    <img src="<?php echo $diamond['image_url'];?>" class="img-fluid">
                    <!-- <video controls="controls" loop autoplay>
                      <source src="assets/images/1-FL.mp4" type="video/mp4">
                    </video> -->
                  </a>
                </li>
                <li class="list-inline-item">
                  <a id="carousel-selector-3" data-slide-to="3" data-target="#custCarousel">
                    <img src="assets/images/shapes/product_img/certificate.jpg" class="img-fluid">
                  </a>
                </li>
                <a class="carousel-control-next" href="#custCarousel" data-slide="next">
                  <i class="fa fa-angle-double-right right_icon" aria-hidden="true" style="color: red;"></i>
                </a>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <h1 class="diamond_head"><?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.' ' .$diamond['color'].'  ' .$diamond['clarity'];?>
          </h1>
          <div class="diamond_dis">
          <span class="d-flex"> <div class="stock-label">Stock #</div> <strong>T&S -<?php echo $diamond['stock_num'];?></strong></span>
          <span class="d-flex"><div class="stock-label">Last Refreshed </div><strong> <?php $date = new DateTime($diamond['created_at']);$formattedDate = $date->format('M d, Y \a\t g:i A');
         echo $formattedDate;?></strong></span>
        </div>
        <div class="reportissue">
            <span><img src="assets/images/shapes/product_img/report.svg">Report An Issue</span>
        </div>
        <hr>
        <div class="status">
          <div class="float-left">
            <span class="stock-label">Status</span>
            <span class="stock-label">P/Ct</span>
            <span class="stock-label">Price</span>
            <span class="stock-label">Discount</span>
            <span class="stock-label">Total Price</span>
          </div>
          <div class="float-right">
              <strong><?php echo ucfirst($diamond['status']);?> <i class="fa fa-circle"></i></strong>
               <?php 
                  $finalcost = 0;
                  $productpricepercent = '';
                  if(isset($product_price) && !empty($product_price)){
                     foreach($product_price as $productprice){
                        if($productprice['purchase_item_name']=='diamond'){
                            $productpricepercent = (isset($productprice['purchase_percent']) && !empty($productprice['purchase_percent']))? $productprice['purchase_percent']:'0';
               ?>
              <strong>
                 $&nbsp;<?php
                 $pricepercarat = $diamond['price_per_ct'] * $productpricepercent / 100;
                 echo round($pricepercarat + $diamond['price_per_ct'], 2);
                 ?>
              </strong>
              <strong>
                 $&nbsp;<?php
                 $finalcost = 0;
                 $totalcost = $diamond['total_sales_price'] * $productpricepercent / 100;
                 $finalcost = $diamond['total_sales_price'] + $totalcost;
                 echo $finalcost;
                 ?>
               </strong>  
              <?php 
                  }
                     }
                  }
               ?> 
              <strong>$
                 <?php 
                 $totalDiscount = 0; 
                 if (isset($discounts) && !empty($discounts) && is_array($discounts)) { 
                    foreach ($discounts as $discount) {
                      $totalDiscount += $discount['discount_percent']; 
                      $sub_discount = $finalcost * $totalDiscount/100;
                      echo round($sub_discount,2);
                    }
                  }       
                 ?>
              </strong> 
               <strong>$
                <?php 
                    $total_disount_price = $finalcost- $sub_discount;
                    echo round($total_disount_price,2);      
                ?>
              </strong> 
          </div>
        </div>
        <hr>
        <div class="findmatch">
           <button type="button"><i class="fa fa-diamond" aria-hidden="true"></i> Find a Match
           </button>
           <button type="button"><i class="fa fa-share-alt" aria-hidden="true"></i>Share
           </button>
        </div>
        <div class="cart_acor">
            <div id="accordion" class="accordion">
            <div class="card mb-0">
              <div class="card-header collapsed" data-toggle="collapse" href="#prodet" aria-expanded="false">
                    <a class="card-title">
                        Product Details
                    </a>
                </div>
            <div id="prodet" class="card-body collapse" data-parent="#accordion">
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
                                <i class="fa fa-usd"></i><?php //$total_sales_price_rounded = round($diamond['total_sales_price'], 2);
                                //echo $total_sales_price_rounded;
                               echo  round($total_disount_price,2) ?>
                              </strong></td>
                          </tr>
                          <tr>
                              <td><strong>Carat</strong></td>
                              <td><?php echo $diamond['size'];?></td>
                          </tr>
                          <tr>
                              <td><strong>Shape</strong></td>
                              <td><?php echo $diamond['shape'];?></td>
                          </tr>
                          <tr>
                              <td><strong>Cut</strong></td>
                              <td><?php echo $diamond['cut'];?></td>
                          </tr>
                          <tr>
                              <td><strong>Color</strong></td>
                              <td><?php echo $diamond['color'];?></td>
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
                              <td><?php echo $diamond['depth_percent'];?>%</td>
                          </tr>
                          <tr>
                              <td><strong>Table</strong></td>
                              <td><?php echo $diamond['table_percent'];?>%</td>
                          </tr>
                          <tr>
                              <td><strong>Polish</strong></td>
                              <td><?php echo $diamond['polish'];?></td>
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
                              <td><?php echo $diamond['measurement'];?> mm.</td>
                          </tr>
                          <tr>
                              <td><strong>Lab</strong></td>
                              <td><?php echo $diamond['lab'];?></td>
                          </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
              <div class="card-header collapsed" data-toggle="collapse" href="#suplyin" aria-expanded="false">
                  <a class="card-title">
                      Supplier Info
                  </a>
              </div>
              <div id="suplyin" class="card-body collapse" data-parent="#accordion" style="">
                    <div class="supplier_info">
                    <div class="float-left">
                    <!-- <span class="stock-label">Address</span>
                    <span class="stock-label">City</span>
                    <span class="stock-label">State</span>
                    <span class="stock-label">Zip</span>
                    <span class="stock-label">Country</span> -->
                    <span class="stock-label">Contact</span>
                    <span class="stock-label">Office</span>
                    <span class="stock-label">Mobile</span>
                  </div>
                  <div class="float-right">
                      <!-- <strong>50 W 47th Ste 2001</strong>
                      <strong><?php //echo $diamond['city'];?></strong>
                      <strong><?php //echo $diamond['state'];?></strong>
                      <strong>10036</strong>
                      <strong>United States</strong> -->
                      <strong>Vinay Mutha</strong>
                      <strong>+91 1234567890</strong>
                      <strong>+1 917-8556491</strong>
                  </div>
                  </div> 
                </div>
<!--                 <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#comment" aria-expanded="false">
                    <a class="card-title">
                      Comment
                    </a>
                </div>
                <div id="comment" class="card-body collapse" data-parent="#accordion">
                    <div class="procomment">
                        <div class="form-group name-group">
                        <div class="palceholder" style="display: block;">
                          <label for="message">Comment</label>
                          <span class="star">*</span>
                          </div>
                          <textarea rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div> -->
              </div>
            </div>
          </div>           
          <div class="diamond_cart add-card">
            <button type="button" data-product-name="<?php echo $diamond['shape'].' '. $diamond['size'] .' ct '.$diamond['color'].' '.$diamond['clarity'];?>"  data-product-price="<?php echo $total_disount_price; ?>" data-product-id="<?php echo($diamond['stock_num']); ?>" data-image="<?php echo $diamond['image_url'];?>" data-product-size="<?php echo $diamond['size']; ?>" data-cert-url="<?php echo $diamond['cert_url']; ?>" data-product-size="<?php echo $diamond['size'];?>" data-product-shape ="<?php echo $diamond['shape'];?>" data-product-color="<?php echo $diamond['color'];?>" data-product-size="<?php echo $diamond['size'];?>" data-product-type ="<?php echo $diamond['type'];?>" data-product-clarity="<?php echo $diamond['clarity'];?>" class="add-cart">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
          </div> 
        </div>
   </div>
   <?php } } ?>
   </div>
   </div>
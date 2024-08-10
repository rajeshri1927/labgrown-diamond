<?php 
   include_once('layout/navbar.php');
   include_once('layout/header.html');
   include_once('layout/filtermanu.php');
?>
<!----tabs end------->
<div class="bg_lab">
   <?php 
      if(isset($banners)  &&  !empty($banners)){
         foreach($banners as $banner){
   ?>
      <img srcset="assets/uploads/banners/<?php echo $banner['banner_background'];?> 320w,assets/uploads/banners/<?php echo $banner['banner_background'];?> 640w, assets/uploads/banners/<?php echo $banner['banner_background'];?> 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/uploads/banners/<?php echo $banner['banner_background'];?>" alt="<?php echo $banner['banner_title'];?>" loading="lazy" class="img-fluid">
   <?php 
         }
      }
   ?>
</div>
    <div class="container">
      <div class="marquee mt-5">
        <div class="track">
            If you buy more than one diamond, for all additional buy 75% shipping cost rebate at check out page. Buy more than 1 and get 75% + shipping cost, as rebate on check out page. If you buy more than one diamond, for all additional buy 75%  shipping cost rebate at check out page. Buy more than 1 and get 75% + shipping cost, as rebate on check out page.
         </div> 
      </div>
      <div class="differ_view center mt-5">
         <h2>Famous Brands</h2>
         <p style="font-size: large;font-weight: 700;">We can't make exactly same but can make similar looking jewelry for you.</p>
         <p style="color: #ff8080;font-weight: 700;">We can copy ANY other BRAND design you DESIRE</p>
         <div class="heading_border"></div>
      </div>
    <div class="container mt-4">
      <div class="row">
        <div class="famous_brand">
            <img src="assets/images/famous_brand/chanel.png" loading="lazy" class="img-fluid">    
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/bvlgari.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/cartier.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/chopard.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/dior.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/graff.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/pandora.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/piaget.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/tiffany.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/van_cleef.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/verragio.png" loading="lazy" class="img-fluid">
        </div>
        <div class="famous_brand">
            <img src="assets/images/famous_brand/chanel.png" loading="lazy" class="img-fluid">
        </div>
      </div>
    </div>
    <div class="home_quality">
      <div class="differ_view center mt-5">
        <h2 class="center">Shop White Lab Grown Diamonds By Shape - Quality - Price - Weight Range</h2>
        <p style="font-size: large;font-weight:700;">We Have Total <b>6,00,000</b> (DYNAMIC) Diamonds In Inventory</p>
      </div>
      <div class="heading_border"></div>
      <div class="mt-5 fourin1">
        <div class="shape_image_row ">
         <!--   -->
         <?php
           if (isset($shapes) && !empty($shapes)) {
              $shapeNames = array();
              foreach ($shapes as $index => $shape) {
                  $image = $shape['system_file_name'];
                  //$shapeNames[] = $shape['shape_name'];
              }
              // $url = 'get-products-get-shape?';
              // foreach ($shapeNames as $shapeName) {
              //     $url .= 'shape[]=' . urlencode($shapeName) . '&';
              // }
              // $url = rtrim($url, '&');
         ?>
        <!--  <div class="shape shbr" data-target="any_shape">
           <span>Any</span>
           <div class="shape_image any">
             Shape
           </div>
           <input type="checkbox" name="shape" value="any">
         </div> -->
         <div class="shape shbr" data-target="any_shape">
            <span>Any</span>
            <div class="shape_image any">
              Any
              <?php foreach ($shapeNames as $shapeName): ?>
              <input type="hidden" name="shape[]" value="<?php echo htmlspecialchars($shapeName); ?>" class="myCheckbox" data-target="<?php echo htmlspecialchars($shapeName); ?>">
              <?php endforeach; ?>
            </div>
            <input type="checkbox" name="shape[]" value="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="myCheckbox" data-target="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
         </div>
         <?php } ?>
         <?php
            if (isset($shapes) && !empty($shapes)) {
              foreach ($shapes as $index => $shape) {
         ?>
         <div class="shape shbr" data-target="any_shape">
            <span><?php echo ucfirst($shape['shape_name']); ?></span>
            <div class="shape_image" title="<?php echo ucfirst($shape['shape_name']); ?>">
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
                <th class="first-letter-big" style="color:#009578;">From:</th>
                <th class="first-letter-big" style="color:#009578;">To:</th>
                <th class="first-letter-big" style="color:#009578;">From:</th>
                <th class="first-letter-big" style="color:#009578;">To:</th>
                <th class="first-letter-big" style="color:#009578;">From:</th>
                <th class="first-letter-big" style="color:#009578;">To:</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $items_per_page = 10; // Number of items per page
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page

            // Ensure that $home_api_response is an array
            if (is_array($home_api_response)) {
                $total_items = count($home_api_response); // Total number of items
                $total_pages = ceil($total_items / $items_per_page); // Total number of pages
                $start_index = ($current_page - 1) * $items_per_page; // Start index for the current page
                $home_api_response_page = array_slice($home_api_response, $start_index, $items_per_page);
            } else {
                // Handle the error or set defaults
                $total_items = 0;
                $total_pages = 0;
                $home_api_response_page = [];
            }
            ?>
        <?php 
            if (!empty($home_api_response_page) && is_array($home_api_response_page)) {
                foreach($home_api_response_page as $homeapi) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars(isset($homeapi['size_from']) ? $homeapi['size_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['price_from']) ? $homeapi['price_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['size_from']) ? $homeapi['size_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['price_from']) ? $homeapi['price_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['size_from']) ? $homeapi['size_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['price_from']) ? $homeapi['price_from'] : 'N/A'); ?></td>
                <td><?php echo htmlspecialchars(isset($homeapi['price_from']) ? $homeapi['price_from'] : 'N/A'); ?></td>
            </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($current_page > 1): ?>
            <a href="?page=<?php echo $current_page - 1; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $current_page): ?>
                <span><?php echo $i; ?></span>
            <?php else: ?>
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages): ?>
            <a href="?page=<?php echo $current_page + 1; ?>">Next &raquo;</a>
        <?php endif; ?>
    </div>

    </div>
    <div class="home_quality">
      <div class="differ_view center mt-5">
        <h2 class="center">FANCY COLOR LG DIAMONDS -SHAPE - FANCY COLOR- INTENSITY - WEIGHT RANGE - PRICE RANGE</h2>
        <p style="font-size: large;font-weight:700;">We Have Total <b>6,00,000</b> (DYNAMIC) Diamonds In Inventory</p>
      </div>
      <div class="heading_border"></div>
      <div class="mt-5 fourin1">
          <div class="shape_image_row ">
         <!--   -->
         <?php
           if (isset($shapes) && !empty($shapes)) {
              $shapeNames = array();
              foreach ($shapes as $index => $shape) {
                  $image = $shape['system_file_name'];
                  //$shapeNames[] = $shape['shape_name'];
              }
              // $url = 'get-products-get-shape?';
              // foreach ($shapeNames as $shapeName) {
              //     $url .= 'shape[]=' . urlencode($shapeName) . '&';
              // }
              // $url = rtrim($url, '&');
         ?>
        <!--  <div class="shape shbr" data-target="any_shape">
           <span>Any</span>
           <div class="shape_image any">
             Shape
           </div>
           <input type="checkbox" name="shape" value="any">
         </div> -->
         <div class="shape shbr" data-target="any_shape">
            <span>Any</span>
            <div class="shape_image any">
              Any
              <?php foreach ($shapeNames as $shapeName): ?>
              <input type="hidden" name="shape[]" value="<?php echo htmlspecialchars($shapeName); ?>" class="myCheckbox" data-target="<?php echo htmlspecialchars($shapeName); ?>">
              <?php endforeach; ?>
            </div>
            <input type="checkbox" name="shape[]" value="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>" class="myCheckbox" data-target="<?php echo isset($shape['shape_name']) && !empty($shape['shape_name']) ? htmlspecialchars($shape['shape_name']) : 'Other'; ?>">
         </div>
         <?php } ?>
         <?php
            if (isset($shapes) && !empty($shapes)) {
              foreach ($shapes as $index => $shape) {
         ?>
         <div class="shape shbr" data-target="any_shape">
            <span><?php echo ucfirst($shape['shape_name']); ?></span>
            <div class="shape_image" title="<?php echo ucfirst($shape['shape_name']); ?>">
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
      </div>
      <div class="shape_image_row">
         <?php
           if (isset($fancycolors) && !empty($fancycolors)) {
               //print_r($fancycolors);die;
              $fancy_color_name = array();
              foreach ($fancycolors as $index => $shape) {
                  $image = $shape['system_file_name'];
                  $fancy_color_name[] = $shape['fancy_color_name'];
              }
              // $url = 'get-products-get-shape?';
              // foreach ($shapeNames as $shapeName) {
              //     $url .= 'shape[]=' . urlencode($shapeName) . '&';
              // }
              // $url = rtrim($url, '&');
         ?>
         <div class="shape shbr" data-target="any_shape">
            <span>Any</span>
            <div class="shape_image any">
              Any
              <?php foreach ($fancy_color_name as $shapeName): ?>
              <input type="hidden" name="shape[]" value="<?php echo htmlspecialchars($shapeName); ?>" class="myCheckbox" data-target="<?php echo htmlspecialchars($shapeName); ?>">
              <?php endforeach; ?>
            </div>
            <input type="checkbox" name="shape[]" value="<?php echo isset($shape['fancy_color_name']) && !empty($shape['fancy_color_name']) ? htmlspecialchars($shape['fancy_color_name']) : 'Other'; ?>" class="myCheckbox" data-target="<?php echo isset($shape['fancy_color_name']) && !empty($shape['fancy_color_name']) ? htmlspecialchars($shape['fancy_color_name']) : 'Other'; ?>">
         </div>
         <?php } ?>
         <?php
            if (isset($fancycolors) && !empty($fancycolors)) {
              foreach ($fancycolors as $index => $shape) {
         ?>
         <div class="shape shbr" data-target="any_shape">
            <span><?php echo ucfirst($shape['fancy_color_name']); ?></span>
            <div class="shape_image" title="<?php echo ucfirst($shape['fancy_color_name']); ?>">
               <?php 
                  $image = $shape['system_file_name'];
                  if($image){ ?>
                     <img src="assets/uploads/fancycolor/<?php echo $image;?>" class="img-fluid">
               <?php 
                  }else{?>
                      <span><?php echo $shape['fancy_color_name'];?></span>
               <?php }
               ?>
            </div>
            <input type="checkbox" name="shape[]" value="<?php echo isset($shape['fancy_color_name']) && !empty($shape['fancy_color_name']) ? htmlspecialchars($shape['fancy_color_name']) : 'Other'; ?>" class="myCheckbox" data-target="<?php echo isset($shape['fancy_color_name']) && !empty($shape['fancy_color_name']) ? htmlspecialchars($shape['fancy_color_name']) : 'Other'; ?>">
         </div> 
         <?php } } ?>
      </div>
      </div>
      <table class="table-responsive fancy_shape_table table-bordered mt-3 table-striped">
        <thead>
          <tr>
            <th class="bg-primary">Intensity</th>
            <th colspan="2" class="bg-info">Faint/Light</th>
            <th colspan="2" class="bg-success">Intense/Vivid</th>
            <th colspan="2" class="bg-warning">Fancy/Dark/Deep</th>
           </tr>
         <tr>
           <th>Carat Weight ?</th>
           <th class="first-letter-big">From:</th>
           <th class="first-letter-big">To:</th>
           <th class="first-letter-big">From:</th>
           <th class="first-letter-big">To:</th>
           <th class="first-letter-big">From:</th>
           <th class="first-letter-big">To:</th>
         </tr>
        </thead>
        <tbody>
          <tr>
           <td>
             0.20 TO 0.49
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
             0.50 TO 0.69
            </td>
           <td>
            $500000
           </td>
           <td>$700000</td>
           <td class="red_color">Not Available</td>
          <td class="red_color">Not Available</td>
           <td>
            $500000
          </td>
          <td>$700000</td>
          </tr>
          <tr>
           <td>
             0.70 TO 0.99
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
            1.00 TO 1.49
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
             1.50 TO 1.99
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
             2.00 TO 2.99
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
             3.00 TO 4.99
           </td>
           <td class="red_color">Not Available</td>
           <td class="red_color">Not Available</td>
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
             5.00 TO 6.99
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
             7.00 TO 9.99
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
             10.00 TO 19.99
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
             20 +
           </td>
           <td class="red_color">Not Available</td>
           <td class="red_color">Not Available</td>
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
      <div class="differ_view center mt-5">
        <h2 class="center">Shop By Shape</h2>
        <p style="font-size: large;font-weight: 700;">We Have Total <b>6,00,000</b> (DYNAMIC) Diamonds In Inventory.</p>
      </div>
      <div class="heading_border"></div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="shape_image_shop"> 
            <div class="shape">
              <span>Any</span>
              <div class="shape_shop pt-4" title="Any">
                <p>Any</p>
              </div>
              <span><b>100000</b>Any Diamonds</span>
            </div>
            <div class="shape">
              <span>Round</span>
              <div class="shape_shop" title="Oval">
                <img srcset="assets/images/shapes/Round.png 320w,assets/images/shapes/Round.png 640w, assets/images/shapes/Round.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Round.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Round Diamonds</span> 
            </div>
            <div class="shape">
              <span>Princess</span>
              <div class="shape_shop" title="Princess">
                <img srcset="assets/images/shapes/diamond princess.png 320w, assets/images/shapes/diamond princess.png 640w, assets/images/shapes/diamond princess.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond princess.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Princess Diamonds</span>
            </div>

            <div class="shape">
              <span>Pear</span>
              <div class="shape_shop" title="Pear">
                <img srcset="assets/images/shapes/diamond Pear.png 320w, assets/images/shapes/diamond Pear.png 640w, assets/images/shapes/diamond Pear.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond Pear.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Pear Diamonds</span>
            </div>
            <div class="shape">
              <span>Cushion</span>
              <div class="shape_shop" title="Shield">
                <img srcset="assets/images/shapes/cushion diamond.png 320w, assets/images/shapes/cushion diamond.png 640w, assets/images/shapes/cushion diamond.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/cushion diamond.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Cushion Diamonds</span>
            </div>
            <div class="shape">
              <span>Asscher</span>
              <div class="shape_shop" title="Asscher">
                <img srcset="assets/images/shapes/Assher.png 320w, assets/images/shapes/Assher.png 640w, assets/images/shapes/Assher.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Assher.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Asscher Diamonds</span>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-4">
          <div class="shape_image_shop">
            <div class="shape">
              <span>Marqui?</span>
              <div class="shape_shop" title="Marquise">
                <img srcset="assets/images/shapes/diamond marquise.png 320w, assets/images/shapes/diamond marquise.png 640w, assets/images/shapes/diamond marquise.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/diamond marquise.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Marqui? Diamonds</span>
            </div>
            <div class="shape">
              <span>Radiant</span>
              <div class="shape_shop" title="Radiant">
                <img srcset="assets/images/shapes/Raddiant.png 320w, assets/images/shapes/Raddiant.png 640w, assets/images/shapes/Raddiant.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Raddiant.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Radiant Diamonds</span>
            </div>

            <div class="shape">
              <span>Heart</span>
              <div class="shape_shop" title="Heart">
                <img srcset="assets/images/shapes/DIAMOND HEART.png 320w, assets/images/shapes/DIAMOND HEART.png 640w, assets/images/shapes/DIAMOND HEART.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/DIAMOND HEART.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Heart Diamonds</span>
            </div>
            <div class="shape">
              <span>Trillion</span>
              <div class="shape_shop" title="Princess">
                <img srcset="assets/images/shapes/Trillion.png 320w, assets/images/shapes/Trillion.png 640w, assets/images/shapes/Trillion.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Trillion.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Trillion Diamonds</span>
            </div>
            
            
            <div class="shape">
              <span>Emerald</span>
              <div class="shape_shop" title="Emerald">
                <img srcset="assets/images/shapes/Emerald2.png 320w, assets/images/shapes/Emerald2.png 640w, assets/images/shapes/Emerald2.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/shapes/Emerald2.png" alt="Image" loading="lazy" class="img-fluid">
              </div>
              <span><b>100000</b>Emerald Diamonds</span>
            </div>
            <div class="shape">
              <span>Other</span>
              <div class="shape_shop pt-4" title="Any">
                <p>Other</p>
              </div>
              <span><b>100000</b>Heart Diamonds</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="differ_view center mt-5">
        <h2 class="center">Shop By Certificates</h2>
        <p style="font-size: large;font-weight: 700;">We Have Total <b>6,00,000</b> diamonds certified by famous international laboratory.</p>
      </div>
      <div class="heading_border"></div>
      <div class="row dynamic_diamond mt-5">
        <div class="col-md-6">
          <div class="h-75">
          <a href="labgrown_catalogue.html">
            <img src="assets/images/product/gia.png" class="img-fluid">
          </a>
          <p>We Have Total <b>6,00,000 GIA</b> Certified Diamonds.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-75">
            <a href="labgrown_catalogue.html">
            <img src="assets/images/product/igi.png" class="img-fluid">
            </a>
            <p>We Have Total <b>6,00,000 IGI</b> Certified Diamonds</p>
          </div>
        </div>
      </div>
      <div class="differ_view center mt-5">
        <h2 class="center">Shop By Diamonds Cut</h2>
        <p style="font-size: large;font-weight: 700;">We Have Total <b>6,00,000</b> excellent and ideal, heart and arrow cut diamonds.</p>
      </div>
      <div class="heading_border"></div>
      <div class="row dynamic_diamond mt-5">
        <div class="col-md-6">
          <div class="h-75">
            <a href="labgrown_catalogue.html">
            <img src="assets/images/product/excelent.png" class="img-fluid">
            </a>
            <p>We Have Total  <b>6,00,000 Excellent and Ideal</b> Cut Diamonds</p>
          </div>
         
        </div>
        
        <div class="col-md-6">
          <div class="h-75">
            <a href="labgrown_catalogue.html">
            <img src="assets/images/product/heart_arrow_cut.png" class="img-fluid">
            </a>
            <p>We Have Total <b>6,00,000 Heart And Arrow</b> Cut Diamonds</p>
          </div>
        </div>
      </div>
    </div>
  
    <div class="container-fluid mt-5">
      <div class="video-section section-padding">
        <div class="container">
        <div class="row">
        <div class="col-lg-12">
        <div class="td-video-wrapper">
        <div class="td-video-content-box">
        <h2 class="td-section-title" style="color:#fff">Buy CVD Diamonds, Sparkle with Purpose</h2>
        <div class="td-video-description">
          <p>CVD (Chemical Vapor Deposition) diamonds are synthetic diamonds created through advanced technological
            processes.</p>
          <p>Lab-grown diamonds are produced without the ethical concerns associated with traditional diamond mining. They
            are conflict-free, meaning they do not contribute to issues related to the trade of conflict or blood
            diamonds.</p>
          <p>Lab-grown diamonds generally have a lower environmental impact compared to mined diamonds. The production
            process requires less energy, and it eliminates the environmental disruption caused by mining.</p>
          <p>Choosing lab-grown diamonds aligns with sustainable practices. It reduces the demand for new mining
            operations and supports eco-friendly alternatives in the jewelry industry.</p>
          <p>Lab-grown diamonds can be produced with high purity and clarity. The controlled environment allows for the
            creation of diamonds with fewer impurities, resulting in stones of exceptional quality.</p>
          <p>Manufacturers have greater control over the growth process of lab-grown diamonds. This allows for
            customization of characteristics such as size, color, and clarity, providing consumers with a wider range of
            options.</p>
          <p>Lab-grown diamonds are often more cost-effective than natural diamonds of similar quality. This makes them an
            attractive option for consumers looking for affordability without compromising on brilliance.</p>
          <p>Lab-grown diamonds offer transparency in their sourcing and production. Consumers can trace the origin of
            their diamonds and have confidence in the ethical and environmental aspects of their purchase.</p>
        </div>
        </div>
        
        <div class="td-video-img">
          <img src="assets/images/lb/lb_9.png" alt="Image" loading="lazy" class="img-fluid lb_img">
        </div>
        <img class="td-image-dotted-bg" src="assets/images/doted-image.png" alt="doted-bg">
        </div>
        </div>
        </div>
        </div>
      </div>
    </div>
    
      <div class="differ_view center mt-5">
        <h2>Lab Grown <span class="vs">V/S</span> Natural Diamond</h2>
        <p style="font-size: large;font-weight: 700;">Man-Made vs. Earth-Born Brilliance.</p>
        <div class="heading_border"></div>
      </div>
    
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="image">
            <img
              srcset="assets/images/lb/lb_vs_na.png 320w, assets/images/lb/lb_vs_na.png 640w, assets/images/lb/lb_vs_na.png 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_vs_na.png" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Lab Grown VS Natural</div>
              <p class="image__description">
                NATURAL AND LAB GROWN DIAMONDS HAVE EXACTLY SAME PHYSICAL AND CHEMICAL PROPERTIES.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="image">
              <img 
              srcset="assets/images/lb/lb_1.webp 320w, assets/images/lb/lb_1.webp 640w, assets/images/lb/lb_1.webp 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_1.webp" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Lab Grown VS Natural</div>
              <p class="image__description">
                AS COMPARED TO NATURAL DIAMONDS ,LABGROWN ARE AVAILABLE AT 5 TO 20% AS PER SHAPE AND SIZE
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="image">
            <img srcset="assets/images/lb/lb_2.png 320w, assets/images/lb/lb_2.png 640w, assets/images/lb/lb_2.png 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_2.png" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Lab Grown VS Natural</div>
              <p class="image__description">
                NATURAL DIAMONDS ARE AVAILBLE AT 95 TO 97 % DISCOUNT ON INTERNATIONALLY ACCEPTED PRICELIST ie RAPAPORT
                IMAGE
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <div class="image">
            <img srcset="assets/images/lb/lb_3.jpg 320w, assets/images/lb/lb_3.jpg 640w, assets/images/lb/lb_3.jpg 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_3.jpg" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Solitaire Diamond</div>
              <p class="image__description">
                SOLITAIRES PRICE LIST IN BRIEF
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <a href="" data-toggle="modal" data-target="#pricelist">
            <div class="image">
              <img
                srcset="assets/images/lb/lb_4.jpg 320w, assets/images/lb/lb_4.jpg 640w, assets/images/lb/lb_4.jpg 1280w"
                sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_4.jpg" alt="Image" loading="lazy"
                class="image__img img-fluid">
              <div class="image__overlay image__overlay--primary">
                <div class="image__title">Small Diamond</div>
                <p class="image__description">
                  SMALL DIAMONDS PRICE LIST FOR JEWELLRY
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="modal show" id="pricelist" aria-modal="true" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Small Diamond Price List For Jewellery</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: #ff8080;">×</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <div class="row">
                  <img src="assets/images/lb/small_diamond_list.jpeg" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="image">
            <img
              srcset="assets/images/lb/lb_6.webp 320w, assets/images/lb/lb_6.webp 640w, assets/images/lb/lb_6.webp 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_6.webp" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Buy Lab Grown Diamond</div>
              <p class="image__description">
                BUY LAB GROWN DIAMONDS DIRECTLY FROM INDIAS LEADING EXPORTERS OF LAB GROWN DIAMOND
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-4">
          <div class="image">
            <img srcset="assets/images/lb/lb_5.jpg 320w, assets/images/lb/lb_5.jpg, assets/images/lb/lb_5.jpg 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_5.jpg" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Lab Grown Manufactures</div>
              <p class="image__description">
                OUR BUSINESS ASSOCIATE. COMPANIES ARE WORLDS LEADING MANUFACTURERS OF LAB GROWN DIAMONDS HAVING 1000 OF
                REACTORS ,WORTH MILLIONS OF DOLLERS
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="image">
            <img srcset="assets/images/lb/lb_7.jpg 320w, assets/images/lb/lb_7.jpg, assets/images/lb/lb_7.jpg 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_7.jpg" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Get Lab Grown Diamond</div>
              <p class="image__description">
                YOU GET LAB GROWN DIAMONDS DRECTLY FROM WORLD BIGGEST DIAMOND BOURSE AND BIGGEST BUSINESS COMPLEX ie SURAT
                DIAMOND BOURSE
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="image">
            <img srcset="assets/images/lb/lb_8.jpeg 320w, assets/images/lb/lb_8.webp, assets/images/lb/lb_8.webp 1280w"
              sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/lb_8.webp" alt="Image" loading="lazy"
              class="image__img img-fluid">
            <div class="image__overlay image__overlay--primary">
              <div class="image__title">Metal And Plating Name</div>
              <p class="image__description">
                WE CAN MAKE IN ANY METAL  PURITY ,ANY COLOR RODIUM PLATING - METAL AND PLATING NAME
              </p>
            </div>
          </div>
        </div>
      </div>

      <!------lb v/s natural end-------->
      <div class="differ_view center mt-5">
        <h2>Evermore</h2>
        <p style="font-size: large;font-weight: 700;">Let Your Love Shine Forever Like Diamond.</p>
        <div class="heading_border"></div>
      </div>    
      <div class="real mb-2 mt-5 mb-5">
        <div class="row">
          <div class="col-md-7">
            <a href="">
              <img srcset="assets/images/lb/proposal-eiffel-tower.png 320w, assets/images/lb/proposal-eiffel-tower.png, assets/images/lb/proposal-eiffel-tower.png 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/lb/proposal-eiffel-tower.png" alt="Image" loading="lazy" class="real_image img-fluid">
            </a>
          </div>
          <div class="col-md-5">
            <div class="content_real">
              <a href="">
                <img srcset="assets/images/real_love_ring.jpg 320w, assets/images/real_love_ring.jpg, assets/images/real_love_ring.jpg 1280w" sizes="(max-width: 640px) 100vw, 50vw" src="assets/images/real_love_ring.jpg" alt="Image" loading="lazy" class="right-side img-fluid">
              </a>
              <div class="title">ENGAGEMENT RING for DIVINE ETERNAL &amp; REAL LOVE !</div>
              <p>we believe in turning every love story into a dazzling masterpiece. Introducing our exquisite collection of engagement rings, each crafted with passion, precision, and the promise of forever.
                Our engagement rings are more than just symbols of commitment; they are timeless pieces of art designed to capture the essence of your unique love story. From classic solitaires to intricate vintage-inspired designs, we offer a stunning array of styles to suit every taste.
                Meticulously handcrafted by skilled artisans, our rings showcase exceptional craftsmanship and attention to detail. Each diamond is carefully selected for its brilliance, ensuring that your engagement ring sparkles as brightly as your love.we are committed to ethical practices.Our diamonds are sourced responsibly, providing you with a symbol of love that you can cherish with a clear conscience.
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
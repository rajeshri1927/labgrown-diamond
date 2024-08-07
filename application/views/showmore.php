<?php 
 if(!empty($landingPage_block_data)){ 
   // echo "<h1>Page - ". $pageNum."</h1>";
	foreach($landingPage_block_data as $landingPage){
		 
	 ?>
      <div class="col-md-3 cate_icon mt-2 ceri_img">
        <div class="catelogue_icon">
          <i class="fa fa-balance-scale" aria-hidden="true" alt="" title="Compare"></i>
          <i class="fa fa-heart" aria-hidden="true" title="Wishlist"></i>
            <i class="fa fa-instagram" aria-hidden="true" title="Instagram"></i>
            <i class="fa fa-linkedin" aria-hidden="true" alt="" title="Linkedin"></i>
          <i class="fa fa-share-alt" aria-hidden="true" title="Share">
            <div class="catelogue_share">
            <a href="https://www.facebook.com/vinaysmutha4/"><i class="fa fa-facebook" aria-hidden="true" alt="" title="Facebook"></i></a>
            <i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i>
            </div>
          </i>
          <i class="fa fa-shopping-bag" aria-hidden="true" title="Add to Cart"></i>
        </div>
        <a href="product_ring.html">
          <img srcset="<?php echo $landingPage['imgUrl'];?>" sizes="(max-width: 640px) 100vw, 50vw" src="11<?php echo $landingPage['imgUrl'];?>" alt="Image" loading="lazy" class="img-fluid">
        </a>
       <div class="border pl-2 mb-2">
	        <h4 style="font-size: 16px; color: #e40808;"><?php echo $landingPage['long_title'];?></h4>
           <div class="d-flex lending_span">
            <p class=""><strong>Quality</strong> <span><?php echo $landingPage['quality']?></span></p>
            <p class=""><strong>Size</strong> <span><?php echo $landingPage['size']?> Carat</span></p>
            <p class=""><strong>Shape</strong> <span><?php echo $landingPage['shape']?></span></p>
           </div>
            <div class="d-flex lending_span">
              <p class=""><strong>Color</strong> <span><?php echo $landingPage['color']?></span></p>
              <p class=""><strong>Clarity</strong> <span><?php echo $landingPage['clarity']?></span></p>
            <p class=""><strong>Cut</strong> <span><?php echo $landingPage['cut']?></span></p>
            </div>
            <div class="d-flex lending_span">
            <p class=""><strong>Certificate</strong> <span><?php echo $landingPage['lab']?></span></p>
            <div class="has-tooltip_table_detailes" title="product details from api">
              <span>Details ?
                
				<div class="tooltip">
                  <h3 class="popover-title">Diamond Details</h3>
                  <div class="popover-content">
                    <ul>
                      <li><strong>Stock Id:</strong> <span><?php echo $landingPage['id']?></span></li>
                      <li><strong>Lab:</strong> <span><?php echo $landingPage['lab']?></span></li>
                      <li><strong>Certificate:</strong> <span><?php echo $landingPage['lab']?></span></li>
                      <li><strong>Cut:</strong> <span><?php echo $landingPage['cut']?></span></li>
                      <li><strong>Symmetry:</strong> <span><?php echo $landingPage['symmetry']?></span></li>
                      <li><strong>Polish:</strong> <span><?php echo $landingPage['polish']?></span></li>
                      <li><strong>Flouresence:</strong> <span><?php echo $landingPage['flouresence']?></span></li>
                      <li><strong>Measurements:</strong> <span><?php echo $landingPage['measurement']?></span></li>
                      <li><strong>Table:</strong> <span><?php echo $landingPage['table']?></span></li>
                    </ul>
                  </div>
                </div>

              </span>
            </div>
            </div>
       </div>
        <div class="catelogue_table">
          <table class="table-bordered table-responsive mb-2">
            <thead>
              <tr>
                <th class="red_color">Company Price
                </th>
                <th class="red_color">Company special Discount
                </th>
                <th class="red_color has-tooltip_click">
                  <span>You Pay After Discount?
                  <div class="tooltip">
                      <h3 class="popover-title">Price Details</h3>
                      <div class="popover-content">
                        <ul>
                          <li><strong>Country Name:</strong> <span><i class="fa fa-usd"></i>India</span></li>
                          <li><strong>Diamond Rs.:</strong> <span><i class="fa fa-usd"></i>India</span></li>
                          <li><strong>Taxation:</strong> <span><i class="fa fa-usd"></i>10%</span></li>
                          <li><strong>Shipping:</strong> <span><i class="fa fa-usd"></i>1000</span></li>
                          <li><strong>Grand Total:</strong> <span><i class="fa fa-usd"></i>12000</span></li>
                        </ul>
                      </div>
                  </div>
                </span>
                </th>
                <th class="red_color" title="? = rapaport is internationally accepted USA retail pricelist for natural diamonds">
                  <span>Discount % On Rapaport ?
                </span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo  $this->currency_lib->currencyConverter('USD',"" ,$landingPage['total_price'])."<br/><font style='font-size: 11px; color: #e60909;'>".$this->currency_lib->currencyConverter('USD',"" ,$landingPage['VPP_price']).'(O)</font>';?></td>
                <td><?php echo  $this->currency_lib->currencyConverter('USD',"" ,$landingPage['discount_amt'])."<br/><font style='font-size: 11px; color: #e60909;'>".$landingPage['discount_amt'].'(O)</font>'?></td>
                <td><?php echo  $this->currency_lib->currencyConverter('USD',"" ,$landingPage['total_disount_price'])."<br/><font style='font-size: 11px; color: #e60909;'>".$landingPage['total_disount_price'].'(O)</font><br/>'?></td>
                <td><?php echo  $landingPage['RAP_discount_percent'].'('.$landingPage['ourRapMarkup'].")";?></td>
              </tr>
              <tr>
                <td class="red_color" colspan="5" title="? = <?php echo $landingPage['long_title'];?>">Product Description ?</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
	  
	<?php } ?>   
        
		<div class="load-more" lastID="<?php echo $pageNum;?>" style="width:100%"  >
		   <input type="hidden" id="hid_pageNum" value="<?php echo $pageNum;?>"/>
		        Loading more posts...lastID="<?php echo $pageNum;?>"
        </div>                   
 
<?php }else{ ?>    
    <div class="load-more" lastID="<?php echo $pageNum;?>">
            That's All!
    </div>    
<?php } ?>
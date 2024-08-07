<style type="text/css">
	.border-none{
		border: none !important;
	}
	.invoic-padding{
		padding: 0px 3rem 3rem 3rem;
	}

	#print-invoice{
		-webkit-print-color-adjust: exact;
	}
</style>
<div class="container">
	 <div class="row d-flex justify-content-center">
		<div class="text-right col-md-8">
			<button class="btn btn-sm btn-default" id="btn-back">Back</button>
			<a class="btn btn-sm btn-primary" id="btn-pdf" href="generate-order-pdf/<?php echo(isset($order['order_id']) && !empty($order['order_id'])?$order['order_id']:''); ?>" target="_blank">Print</a>
		</div>
	</div>
</div>
<div class="container mt-4 mb-4" id="print-invoice">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-3 px-5"> 
                	<img src="assets/images/logo1.png" width="100"> 
                </div>
                <div class="invoice invoic-padding">
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="border-none">
                                        <div class="py-1"> <span class="d-block text-muted">Order No</span> <span><?php echo(isset($order['order_unique_id']) && !empty($order['order_unique_id'])?$order['order_unique_id']:''); ?></span> </div>
                                    </td>
                                    <td colspan="2" width="20%" class="text-right border-none">
                                        <div class="py-1"> <span class="d-block text-muted">Order Date</span> <span><?php echo(isset($order['order_date']) && !empty($order['order_date'])? date("F j, Y", strtotime($order['order_date'])):''); ?></span> </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-none">
                                        <div class="py-1"> 
                                        	<span class="d-block text-muted">Name</span> 
                                        	<span><?php echo((isset($order['first_name']) && !empty($order['first_name'])) && (isset($order['last_name']) && !empty($order['last_name']))?$order['first_name'].' '.$order['last_name']:''); ?></span> 
                                        </div>
                                    </td>
                                    <td colspan="2" width="20%" class="text-right border-none">
                                        <div class="py-1"> 
                                        	<span class="d-block text-muted">Contact</span> 
                                        	<span class="d-block"><?php echo(isset($order['email']) && !empty($order['email']))?$order['email']:''; ?></span> 
                                        	<span class="d-block"><?php echo(isset($order['contact_no']) && !empty($order['contact_no']))?$order['contact_no']:''; ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-none">
                                        <div class="py-1"> 
                                        	<span class="d-block text-muted">Shiping Address</span> 
                                        	<span class="d-block col-7 p-0"><?php echo(isset($order['address']) && !empty($order['address'])?$order['address']:''); ?></span>
                                        	<span class="d-block">City: <?php echo(isset($order['city']) && !empty($order['city'])?$order['city']:''); ?></span>
                                        	<span class="d-block">Pincode: <?php echo(isset($order['pincode']) && !empty($order['pincode'])?$order['pincode']:''); ?></span>
                                        </div>
                                    </td>
                                    <td colspan="2" class="text-right border-none">
                                        <div class="py-1"> 
                                        	<span class="d-block text-muted">Payment</span> 
                                        	<span><?php echo(isset($order['order_payment_type']) && !empty($order['order_payment_type'])?$order['order_payment_type']:''); ?></span> 
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                               <?php if(isset($products) && !empty($products)) {
	                        		foreach ($products as $product) { ?>
	                        			<tr>
		                                    <td width="20%"> <img src="assets/uploads/products/<?php echo(isset($product['system_file_name']) && !empty($product['system_file_name'])?$product['system_file_name']:''); ?>" width="90"> </td>
		                                    <td width="50%"> <span class="font-weight-bold"><?php echo(isset($product['product_name']) && !empty($product['product_name'])?$product['product_name']:''); ?></span>
		                                        <div class="product-qty"><span class="d-block">Quantity: <?php echo(isset($product['product_qty']) && !empty($product['product_qty'])?$product['product_qty']:''); ?></span></div>
		                                    </td>
		                                    <td width="10%" class="text-right">
		                                    	<span class="font-weight-bold">&#8377;<?php echo(isset($product['product_price']) && !empty($product['product_price'])?$product['product_price']:''); ?></span>
		                                    </td>
		                                    <td width="20%" class="text-right">
		                                        <span class="font-weight-bold">&#8377;<?php echo(isset($product['product_price']) && !empty($product['product_price'])?$product['product_price'] * $product['product_qty']:''); ?></div>
		                                    </td>
		                                </tr>
	                        		<?php }
	                        	}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Shipping</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span><?php echo $order['shipping_amounts'];?>/-</span> </div>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold"><?php $grand_total = $order['product_total_price'] + $order['shipping_amounts']; echo(isset($grand_total) && !empty($grand_total))?$grand_total:''; ?>/-</span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> 
                    <span> Vibhanatural </span>
                </div>
            </div>
        </div>
    </div>
</div>
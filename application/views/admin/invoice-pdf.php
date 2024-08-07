<style type="text/css">
	*, *::before, *::after {
	    box-sizing: border-box;
	    margin:0px;
	}

	.d-block {
    	display: block !important;
	}

	.border-none{
		border: none !important;
	}
	.invoic-padding{
		padding: 0px 3rem 3rem 3rem;
	}

	.text-muted {
    	color: #536c79 !important;
	}
	
	.table th, .table td {
	    padding: 0.75rem;
	    vertical-align: middle !important;
	    border-top: 1px solid #c2cfd6;
	}
	.border-none {
	    border: none !important;
	}
	.text-right {
	    text-align: right !important;
	}
	.pb-1, .py-1 {
    	padding-bottom: 0.25rem !important;
	}
	.pt-1, .py-1 {
	    padding-top: 0.25rem !important;
	}
	
	.mb-1, .my-1 {
    	padding-bottom: 0.25rem !important;
	}
	.mt-1, .my-1 {
	    padding-top: 0.25rem !important;
	}
	
	.mb-3, .my-3 {
	    margin-bottom: 1rem !important;
	}

	.mt-3, .my-3 {
	    margin-top: 1rem !important;
	}
	.font-weight-bold {
    	font-weight: 700 !important;
	}
	.table {
	    width: 100%;
	    max-width: 100%;
	    margin-bottom: 1rem;
	}
	table {
	    border-collapse: collapse;
	}

	.mt-10px{
		margin-top: 10px;
	}
	.pl-5, .px-5 {
	    padding-left: 3rem !important;
	}

	.pr-5, .px-5 {
	    padding-right: 3rem !important;
	}
	.p-3 {
	    padding: 1rem !important;
	}

	.p-4 {
	    padding: 1.5rem !important;
	}

	.text-center{
		text-align: center;
	}
</style>
<div id="print-invoice">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="invoice invoic-padding">
                	<div class="text-left logo p-4 px-5 text-center"> 
                		<img src="assets/images/logo1.png" width="100">  
                	</div>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td colspan="2" width="70%" class="border-none">
                                    	<div class="d-block text-muted">Order No</div> 
                                    	<div class="d-block"><?php echo(isset($order['order_unique_id']) && !empty($order['order_unique_id'])?$order['order_unique_id']:''); ?></div> 
                                    </td>
                                    <td colspan="2" width="30%" class="text-right border-none">
                                    	<div class="d-block text-muted">Order Date</div> 
                                    	<div class="d-block"><?php echo(isset($order['order_date']) && !empty($order['order_date'])? date("F j, Y", strtotime($order['order_date'])):''); ?></div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="60%" class="border-none">
                                    	<div class="d-block text-muted">Name</div> 
                                    	<div class="d-block"><?php echo((isset($order['first_name']) && !empty($order['first_name'])) && (isset($order['last_name']) && !empty($order['last_name']))?$order['first_name'].' '.$order['last_name']:''); ?></div> 
                                    </td>
                                    <td colspan="2" width="40%" class="text-right border-none">
                                    	<div class="d-block text-muted">Contact</div> 
                                    	<div class="d-block"><?php echo(isset($order['email']) && !empty($order['email']))?$order['email']:''; ?></div> 
                                    	<div class="d-block"><?php echo(isset($order['contact_no']) && !empty($order['contact_no']))?$order['contact_no']:''; ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-none">
                                    	<div class="d-block text-muted">Shiping Address</div> 
                                    	<div class="d-block col-7 p-0"><?php echo(isset($order['address']) && !empty($order['address'])?$order['address']:''); ?></div>
                                    	<div class="mt-10px d-block">City: <?php echo(isset($order['city']) && !empty($order['city'])?$order['city']:''); ?></div>
                                    	<div class="mt-10px d-block">Pincode: <?php echo(isset($order['pincode']) && !empty($order['pincode'])?$order['pincode']:''); ?></div>
                                    </td>
                                    <td colspan="2" class="text-right border-none">
                                    	<div class="d-block text-muted">Payment</div> 
                                    	<div><?php echo(isset($order['order_payment_type']) && !empty($order['order_payment_type'])?$order['order_payment_type']:''); ?></div>
                                    	<div class="d-block text-muted">Expected Delivery</div> 
                                    	<div><?php echo(isset($order['time_slot']) && !empty($order['time_slot'])?$order['time_slot']:''); ?></div> 
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
		                                    <td width="70%"> <span class="font-weight-bold"><?php echo(isset($product['product_name']) && !empty($product['product_name'])?$product['product_name']:''); ?></span>
		                                        <div class="product-qty"><span class="d-block">Quantity: <?php echo(isset($product['product_qty']) && !empty($product['product_qty'])?$product['product_qty']:''); ?></span></div>
		                                    </td>
		                                    <td width="10%" class="text-right">
		                                    	<span class="font-weight-bold">&#8377;<?php echo(isset($product['product_price']) && !empty($product['product_price'])?$product['product_price']:''); ?>/-</span>
		                                    </td>
		                                    <td width="20%" class="text-right">
		                                        <span class="font-weight-bold">&#8377;<?php echo(isset($product['product_price']) && !empty($product['product_price'])?$product['product_price'] * $product['product_qty']:''); ?>/-</div>
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
                                            <div class="text-right"> <span class="text-muted">Shpping</span></div>
                                        </td>
                                        <!--<td></td>-->
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
                    <span>Vibhanatural</span>
                </div>
            </div>
        </div>
    </div>
</div>
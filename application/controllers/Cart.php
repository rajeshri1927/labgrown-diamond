<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/Atompay.php');
class Cart extends CI_Controller {
    public $atompay;
	public function __construct(){
		parent::__construct();
		$this->load->model('Product_Model', 'product_model');
		$this->load->model('Order_model', 'order_model');
		$this->load->model('Coupon_model', 'coupon_model');
		$this->load->model('Wishlist_model');
		$this->load->model('Category_model','category_model');
		$this->load->library('email');
        $this->load->library('atompay');
        $this->load->library('session');
	}
   
	public function set_product_in_cart() {
		$response  = array();
		$inputData = $this->input->post();
		// echo "<pre>";print_r($inputData);die;
		$total_disount_price_numeric = floatval($inputData['product_price']);
		if(isset($inputData['product_id'])) {
			// Check if the product is already in the cart
			foreach ($this->cart->contents() as $item) {
				if ($item['id'] == $inputData['product_id']) {
					// Product already in cart, redirect to cart view
					$response = array(
						'state' => TRUE,
						'title' => 'Already in Cart',
						'type' => 'info',
						'message' => 'Product is already in your cart',
						'redirect' => base_url().'cart-vew'
					);
					echo json_encode($response);
					return; // Stop further execution
				}
			}
			// If product is not in the cart, proceed to add it
			$data = array(
				'id'      => $inputData['product_id'],
				'qty'     => $inputData['qty'],
				'price'   => round($total_disount_price_numeric, 2),
				'name'    => $inputData['product_name'],
				'options' => array(
					'product_image'  => $inputData['product_image'],
					'product_weight' => $inputData['product_weight'],
					'cert_url'       => $inputData['cert_url'],
					'product_shape'  => $inputData['product_shape'],
					'product_color'  => $inputData['product_color'],
					'product_type'   => $inputData['product_type'],
					'product_clarity'=> $inputData['product_clarity']
				)
			);
			$result = $this->cart->insert($data);

			if ($result) {
				$response = array(
					'state' => TRUE,
					'title' => 'Success',
					'type' => 'success',
					'message' => 'Product added to cart'
				);
			} else {
				$response = array(
					'state' => FALSE,
					'title' => 'Something went wrong',
					'type' => 'error',
					'message' => 'Unable to add product to cart'
				);
			}
		} else {
			$response = array(
				'state' => FALSE,
				'title' => 'Error',
				'type' => 'error',
				'message' => 'Product ID is missing'
			);
		}
	
		echo json_encode($response);
	}
	
    public function get_coupon_code(){
        $inputData      = $this->input->post();
        $current_date   = date('Y-m-d');
        $result  	    = $this->coupon_model->get_coupon(false,$inputData['coupon_unique_id']);
		//print_r($result[0]['category_id']);die;
        $coupon_result  = $this->coupon_model->get_coupon_code($inputData['coupon_unique_id']);
        //if($result[0]['expired_datetime'] >= $current_date  && $result[0]['category_id'] == $inputData['category_id']){
		if($coupon_result){
            $coupon_sess_array = array('coupon_unique_id'=>$inputData['coupon_unique_id'],'discounted_coupon_cost' =>$inputData['discountCost'],'discounted_cost'=>$inputData['discountedAmount']);
            $this->session->set_userdata('coupon_session',$coupon_sess_array);
			$response   = array('valid' =>TRUE,'message'=>'coupon applied successfully!');
		}else{
			$response 	= array('valid'=>FALSE,'message'=>'Invalid coupon! Please Select'.'  '.$result[0]['category_title'].'  '.'products');
		}
		echo json_encode($response);
    }

	// public function set_wish_list() {
    // 	$response      = array();
    // 	$user_session  = $this->session->userdata('user');
    // 	$inputData     = $this->input->post();
	// 	$parts         = explode('/', $inputData['url']);
	// 	$last_part_url = end($parts);
	// 	if($user_session){
    // 		$data  = array(
	// 		'user_id'         => $user_session['user_id'],
    //     	'product_id'      => $inputData['product_id'],
    //     	'inserted_date'   => date('Y-m-d H:i:s')
    //     	);
    // 		$result = $this->Wishlist_model->save_record($data);
    // 		if($result){
	// 			$response 	= array('state'=>TRUE,'title'=>'Success','type'=>'success','message'=>'Product added to Wishlist','redirect' =>$last_part_url);
	// 		}else{
	// 			$response 	= array('state'=>FALSE,'title'=>'Something went wrong','type'=>'error','message'=>'unable to add product in Wishlist');
	// 		}
	// 	    echo json_encode($response);
    // 	}else{
    // 		redirect(base_url().'home');
    // 	}
    // }

    public function set_wish_list() {
		$response     = array();
		$user_session = $this->session->userdata('user');
		$inputData    = $this->input->post();
		//echo "<pre>";print_r($inputData);die;
		$parts         = explode('/', $inputData['url']);
		$last_part_url = end($parts);
		
		if ($user_session) {
			// Check if the combination of user ID and product ID already exists in the wishlist
			$existing_wishlist = $this->Wishlist_model->get_wishlist_by_user_product($user_session['user_id'], $inputData['product_id']);
	
			if (!$existing_wishlist) {
				// If the combination does not exist, add the product to the wishlist
				$data = array(
					'user_id'    	=> $user_session['user_id'],
					'product_id' 	=> $inputData['product_id'],
					'product_name'  => $inputData['product_name'],
					'product_shape' => $inputData['product_shape'],
					'product_weight'=> $inputData['product_weight'],
					'product_color' => $inputData['product_color'],
					'product_clarity'=>$inputData['product_clarity'],
					'product_price' => $inputData['product_price'],
					'product_image' => $inputData['product_image'],
					'product_type'  => $inputData['product_type'],
					'cert_url'      => $inputData['cert_url'],
					'inserted_date' => date('Y-m-d H:i:s')
				);
				//print_r($data);die;
				$result = $this->Wishlist_model->save_record($data);
				if ($result) {
					$response = array('state' => TRUE, 'title' => 'Success', 'type' => 'success', 'message' => 'Product added to Wishlist', 'redirect' => $last_part_url);
				} else {
					$response = array('state' => FALSE, 'title' => 'Something went wrong', 'type' => 'error', 'message' => 'Unable to add product to Wishlist');
				}
			} else {
					$response = array('state' => FALSE, 'title' => 'Product Already in Wishlist', 'type' => 'info', 'message' => 'The selected product is already in your Wishlist');
			}
			echo json_encode($response);
		} else {
			redirect(base_url() . 'home');
		}
	}
	
    public function get_wishlist_item(){
        $inputData 		= array();
        $response 		= null;
        $user_session   = $this->session->userdata('user');
		if($user_session){
			$total_wishlish = $this->Wishlist_model->get_all_wishlist_details_with_count($user_session['user_id'],true);
			if ($total_wishlish !== FALSE) {
				foreach ($total_wishlish as $wishlist) {
					$wishlist['wishlist_count'];
				}
			}
			$result  = $this->Wishlist_model->get_all_wishlist_details_with_count($user_session['user_id']);
			if($result){
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Wishlist available.','data'=>$result, 'wishlist_count'=> $wishlist['wishlist_count']);
			}
			else{
				$response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get Wishlist.');
			}
			 echo json_encode($response);
		}else{
			redirect(base_url() . 'home');
		}
    }

    // public function get_wishlist_item(){
	// 	$inputData     = array();
	// 	$response      = null;
	// 	$user_session  = $this->session->userdata('user');
	// 	if($user_session){
	// 		$total_wishlish   = $this->Wishlist_model->get_all_wishlist_details_with_count($user_session['user_id'], true);
	// 		if ($total_wishlish !== FALSE) {
	// 			foreach ($total_wishlish as $totalwishlist) {
	// 				$totalwishlist['wishlist_count'];
	// 			}
	// 		}
	// 		$product_details  = $this->Wishlist_model->get_all_wishlist_details_with_count($user_session['user_id']);
	// 		$product_ids      = array();
	// 		if ($product_details !== FALSE) {
	// 			foreach ($product_details as $wishlist) {
	// 				// Collect product IDs
	// 				$product_ids[] = $wishlist['product_id'];
	// 			}
	// 		}
	
	// 		// Construct comma-separated string of product IDs
	// 		$product_ids_str = implode(',', $product_ids);
	// 		//print_r($product_ids_str);die;
	// 	    $url  = 'https://apiservices.vdbapp.com//v2/diamonds?type=Lab_grown_Diamond&';
	// 		$curl = curl_init();
	// 		// Set cURL options
	// 		curl_setopt_array($curl, array(
	// 			CURLOPT_URL => $url,
	// 			CURLOPT_RETURNTRANSFER => true,
	// 			CURLOPT_ENCODING => '',
	// 			CURLOPT_MAXREDIRS => 20,
	// 			CURLOPT_TIMEOUT => 0,
	// 			CURLOPT_FOLLOWLOCATION => true,
	// 			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 			CURLOPT_CUSTOMREQUEST => 'GET',
	// 			CURLOPT_HTTPHEADER => array(
	// 				'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
	// 			),
	// 		));
	// 		// Execute cURL request and get response
	// 		$response     = curl_exec($curl);
	// 		$api_response['json_data'] = json_decode($response, true);
	// 		if (isset($api_response['json_data']['response']['body']['diamonds']) && !empty($api_response['json_data']['response']['body']['diamonds'])) {
	// 			foreach ($api_response['json_data']['response']['body']['diamonds'] as $index => $diamond) {
	// 				$product_id[] = $diamond['stock_num'];

	// 			}
	// 		}
	// 		if(isset($product_id) && !empty($product_id)){
	// 			foreach($product_id as $productid){
	// 				$productid ==
	// 			}
	// 		}
	// 		echo "<pre>";print_r($product_id);
	// 		// if($api_response){
	// 		// 	$response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Wishlist available.', 'data' => $api_response, 'wishlist_count' => $totalwishlist['wishlist_count']);
	// 		// } else {
	// 		// 	$response = array('state' => FALSE, 'title' => '', 'type' => 'error', 'message' => 'Unable to get Wishlist.');
	// 		// }
	
	// 		//echo json_encode($response);
	// 	} else {
	// 		redirect(base_url() . 'home');
	// 	}
	// }
	
    public function delete_wishlist_item(){
		$input_details = $this->input->get();
		if(isset($input_details['id']) && !empty($input_details['id'])){
			$result 	= $this->Wishlist_model->delete($input_details['id']);
			if($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Removed  Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function delete_checkout_item(){
		$input_details = $this->input->get();
		if(isset($input_details['id']) && !empty($input_details['id'])){
			$result    = $this->cart->remove($input_details['id']);
			if($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Removed  Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}

	}

	public function get_cart_items(){
		$get_data 	        = $this->input->get();
		$products_cart 		= $this->cart->contents();
		$new_products_cart  = array();
		$response 	 		= array();
		$user_data 			= array();

		if(isset($get_data['user_details']) && !empty($get_data['user_details'])){
			$user_session	= $this->session->userdata('user');
			$user_id 	 	= $user_session['user_id'];
			if($user_session['isLoggedIn']){
				$user_data =  $this->product_model->get_user($user_id);
			}
		}
		if(isset($products_cart) && !empty($products_cart)) {
			foreach ($products_cart as $key => $value) {
				$new_products_cart[] = $products_cart[$key];
			}
			$response 	= array(
				'state'=>TRUE, 
				'title'=>'Success',
				'type'=>'success', 
				'message'=>'Product added to cart', 
				'cart_products' => $new_products_cart,
				'cart_product_count' => $this->cart->total_items(),
				'cart_product_total'=>  $this->cart->total());

			if(isset($get_data['user_details']) && !empty($get_data['user_details'])){
				$response['user_data'] =  $user_data;
			}

	    	echo json_encode($response);
		} else {
			$response 	= array(
				'state'=>FALSE, 
				'title'=>'Something went wrong',
				'type'=>'danger', 
				'message'=>'There are no product in cart', 
				'cart_products' => array());
			echo json_encode($response);
		}
	}

	public function update_cart_item(){
		$products_cart 		= $this->input->post();
		if(isset($products_cart) && !empty($products_cart)) {
			$result 	= $this->cart->update($products_cart);
			$response 	= array(
				'state'=>TRUE, 
				'title'=>'Success',
				'type'=>'success', 
				'message'=>'Product quantity updated.',
				'cart_product_count' => $this->cart->total_items(),
				'cart_product_total' => $this->cart->total());
		} else {
			$response 	= array(
				'state'=>FALSE, 
				'title'=>'Something went wrong',
				'type'=>'danger', 
				'message'=>'Unable to update quantity');
		}
		echo json_encode($response);
	}

	public function set_amount_shipping_in_session(){
		$shipping_data 		= $this->input->post();
		$session_array 		= array('shipping_amounts'=>$shipping_data);
		$this->session->set_userdata($session_array);
	}


	public function proceed_to_order(){
	    $inputData          = $this->session->userdata('skip_login');
		$user_data 			= $this->input->post();
		//print_r($user_data);die;
		$shipping_amounts   = $this->session->userdata('shipping_amounts');
		$coupon_session     = $this->session->userdata('coupon_session');
		$products_cart 		= $this->cart->contents();
		$new_products_cart  = array();
		$response 	 		= array();
		$product_total_price = '';
	    if(isset($coupon_session) && !empty($coupon_session)){
            $product_total_price  = $coupon_session['discounted_coupon_cost'];
        }else{
            $product_total_price   = $shipping_amounts['cart_total'];
        }
		if(isset($products_cart) && !empty($products_cart)) {
			$data  = array(
				'user_id'       		=> $user_data['user_id'],
	        	'product_total_price' 	=> $product_total_price,
	        	'product_cart_total'    => $user_data['product_cart_total'],
	        	'shipping_amounts'      => $shipping_amounts['ShippingPriceDB1'],
	        	'order_date'   			=> date('Y-m-d H:i:s'),
	        	'address'		        => (isset($user_data['AdressOPT']) && !empty($user_data['AdressOPT']))?$user_data['AdressOPT']:$user_data['address'],
				'address_line_1'        => (isset($user_data['LINE1OPT']) && !empty($user_data['LINE1OPT']))?$user_data['LINE1OPT']:$user_data['cust_line1'],
				'address_line_2'        => (isset($user_data['LINE2OPT']) && !empty($user_data['LINE2OPT']))?$user_data['LINE2OPT']:$user_data['cust_line2'],
				'postcode'              => (isset($user_data['postalcode']) && !empty($user_data['postalcode']))?$user_data['postalcode']:$user_data['postcode'],
	        	'country_code'      	=> $user_data['country_code'],
	        	'state'     			=> $user_data['state'],
	        	'city'     				=> $user_data['city'],
	        	'order_payment_id' 		=> '',
	        	'order_payment_type' 	=> 'online',
	        	'coupon_code' 	        => (isset($coupon_session['coupon_unique_id']) && !empty($coupon_session['coupon_unique_id']))?$coupon_session['coupon_unique_id']:NULL,
	        	'discount_price' 	    => (isset($coupon_session['discounted_cost']) && !empty($coupon_session['discounted_cost']))?$coupon_session['discounted_cost']:NULL
	        );
	        $skip_data = array(
	            'first_name'  => (isset($user_data['first_name']) && !empty($user_data['first_name']))?$user_data['first_name']:$user_data['first_name'],
	            'last_name'   => (isset($user_data['last_name']) && !empty($user_data['last_name']))?$user_data['last_name']:$user_data['last_name'],
	            'email'       => (isset($user_data['email']) && !empty($user_data['email']))?$user_data['email']:$user_data['email'],
	            'contact_no	' => (isset($user_data['contact_no']) && !empty($user_data['contact_no']))?$user_data['contact_no']:$user_data['contact_no'],
	            'role_id'     => (isset($user_data['skip_login']) && !empty($user_data['skip_login']))?$user_data['skip_login']:$user_data['skip_login'],
	        );
	        //print_r($data);die;
	        $tableName  = 'tbl_users';
	        $table_name = 'tbl_orders';
	        $result 	= $this->product_model->save_record($data, $table_name);
	        if(isset($inputData['skip_login']) && !empty($inputData['skip_login']) && $inputData['skip_login'] == true){
	           $result_1  = $this->product_model->save_record($skip_data, $tableName); 
                if($result_1){
                    	$update_data 	= array('user_id' => $result_1['id']);
                    	$where 			= array('order_id' => $result['id']); 
                    	$update_result 	= $this->product_model->update_record($update_data, $where, $table_name);
                }
	        }
            if($result['state']) {
                //$user_id        = $insert_id;
            	$order_id 		= sprintf("%05d", $result['id']);
            	$update_data 	= array('order_unique_id' => 'VIBHA-'.$order_id);
            	$where 			= array('order_id' => $result['id']); 
            	$update_result 	= $this->product_model->update_record($update_data, $where, $table_name);

            	if($update_result['state']) {
            		$products_cart 			= $this->cart->contents();
					foreach ($products_cart as $key => $value) {
						$new_products_cart[] = $products_cart[$key];
					}

					foreach ($new_products_cart as $key => $cart_product) {
						$ordered_items[] = array(
							'order_id' 		=> $result['id'],
							'product_id' 	=> $cart_product['id'],
							'product_qty' 	=> $cart_product['qty'],
							'product_price' => $cart_product['price'],
							'product_name'  => $cart_product['name'],
						);
					}
					$update_result  = $this->product_model->update_checkout_order($ordered_items);
					$data['first_name'] = $user_data['first_name'];
					$data['last_name']  = $user_data['last_name'];
					$data['email']      = $user_data['email'];
					$data['contact_no'] = $user_data['contact_no'];
					$data['order_unique_id']  = $update_data['order_unique_id'];
					$data['order_id']         = $result['id'];
					
					if($update_result) {
						$this->atom_payment($data);
					} else {
						$response 	= array(
						'state'=>FALSE, 
						'title'=>'Something went wrong',
						'type'=>'error', 
						'message'=>'Unable to send email');
						echo json_encode($response);
					}
            	} else {
        			$response 	= array(
					'state'=>FALSE, 
					'title'=>'Something went wrong',
					'type'=>'error', 
					'message'=>'Unable to send email');
					echo json_encode($response);
            	}
            } else {
    			$response 	= array(
				'state'=>FALSE, 
				'title'=>'Something went wrong',
				'type'=>'error', 
				'message'=>'Unable to send email');
				echo json_encode($response);
            }
        } else {
    		$response 	= array(
			'state'=>FALSE, 
			'title'=>'Something went wrong',
			'type'=>'error', 
			'message'=>'Unable to send email');
			echo json_encode($response);

        }
	}


	function send_order_email_to_customer($user_data, $products_cart){
		$data 	= array(
			'cart_products' 	 => $products_cart, 
			'cart_product_total' => $this->cart->total(),
			'user_data' 		 => $user_data,
			'order_date' 		 => date("Y-m-d"),
			'message' 			 => 'Your are successfully checked out. Here is your order receipt for future reference.',
		);
		$to 				= $user_data['email'];
		$name 				= $user_data['first_name'].' '.$user_data['last_name'];
		$subject 			= 'Order Receipt - Vibhanatural';
		$body 				= $this->load->view('order-email', $data, TRUE);
		return $this->send_mail($to, $name, $subject, $body);
	}

	function send_order_email_to_shopekeeper($user_data, $products_cart){
		$data 	= array(
			'cart_products' 	 => $products_cart, 
			'cart_product_total' => $this->cart->total(),
			'user_data' 		 => $user_data,
			'order_date' 		 => date("Y-m-d"),
			'message' 			 => 'You have order, Here is your order receipt for future reference.'
		);
		$to 				= '';
		$name 				= 'Vibhanatural';
		$subject 			= 'Order Receipt - Vibhanatural';
		$body 				= $this->load->view('order-email', $data, TRUE);
		return $this->send_mail($to, $name, $subject, $body);
	}

	function send_enquiry_email($user_data){
		$data 				= array('user_data' => $user_data, 'order_date'=> date("Y-m-d"));
		$to 				= 'info@vibhanatural.com';
		$recipients         = array(
          "saints@creativesaints.com","shailesh.penkar@creativesaints.com","rajeshri.pevekar@creativesaints.com"
        );
		$name 				= 'Vibhanatural';
		$subject 			= 'Enquiry Mail - Vibhanature';
		$body 				= $this->load->view('enquiry-mail', $data, TRUE);
		return $this->send_mail($to, $recipients, $name, $subject, $body);
	}

	public function submit_enquiry(){
		$user_data 				= $this->input->post();
		$table_name 			= 'tbl_enquiry';
		$data  = array(
	        	'first_name' 			=> $user_data['first_name'],
	        	'last_name'   			=> $user_data['last_name'],
	        	'email'      			=> $user_data['email'],
	        	'contact_no'     		=> $user_data['contact_no'],
	        	'message' 				=> $user_data['message'],
	        	'inserted_on' 	        => date('Y-m-d H:i:s'),
	        	'display'             	=> 'Y',
	        	'inserted_by'           => rand(10,100)
	        );
	    $enquiry_mail_result 	= $this->product_model->save_record($data, $table_name);
		$enquiry_mail_result 	= $this->send_enquiry_email($user_data);
		if($enquiry_mail_result){
			$response 	= array(
			'state'=>TRUE, 
			'title'=>'Success',
			'type'=>'success', 
			'message'=>'Your enquiry is successfully submitted.',
			'redirect' => 'home');
		} else {
			$response 	= array(
			'state'=>FALSE, 
			'title'=>'Something went wrong',
			'type'=>'error', 
			'message'=>'Unable to send email');
		}
		echo json_encode($response);
	}
	
	public function delete_cart_item(){
		$rowid 		= $this->input->post('rowid');
		if(isset($rowid) && !empty($rowid)) {
			$result 	= $this->cart->remove($rowid);
			$response 	= array(
				'state'=>TRUE, 
				'title'=>'Success',
				'type'=>'success', 
				'message'=>'Product removed from cart.',
				'cart_product_count' => $this->cart->total_items(),
				'cart_product_total' => $this->cart->total());
		} else {
			$response 	= array(
				'state'=>FALSE, 
				'title'=>'Something went wrong',
				'type'=>'danger', 
				'message'=>'Unable to delete product from cart');
		}
		echo json_encode($response);
	}

    public function atom_payment($user_data){
        //print_r($user_data);//die;
        $shipping_amounts = $this->session->userdata('shipping_amounts');
        $coupon_session     = $this->session->userdata('coupon_session');
        if(isset($coupon_session) && !empty($coupon_session)){
            $product_total_price  = $coupon_session['discounted_coupon_cost'];
        }else{
            $product_total_price   = $shipping_amounts['cart_total'];
        }
        $order_id         = $user_data['order_id'];
    	$name             = $user_data['first_name'].' '.$user_data['last_name'];
    	$email            = $user_data['email'];
    	$mobile           = $user_data['contact_no'];
    	$address          = $user_data['address'];
    	$products_cart    = $this->cart->contents();
    	$amount           = $shipping_amounts['ShippingPriceDB1'] + $product_total_price;
        $transactionId    = $user_data['order_unique_id'];
        $datenow          = date("d/m/Y h:m:s");
        $transactionDate  = str_replace(" ", "%20", $datenow);
        
        // $this->atompay->setMode("live");
        // $this->atompay->setLogin(41876);
        // $this->atompay->setPassword("399749a6");
        // $this->atompay->setProductId("VIBHA");
        // $this->atompay->setAmount($amount);
        // $this->atompay->setTransactionCurrency("INR");
        // $this->atompay->setTransactionAmount($amount);
        // $this->atompay->setReturnUrl("https://vibhanatural.com/vibha-dev/atom-payment-response?order_id=".$order_id);
        // $this->atompay->setClientCode(123);
        // $this->atompay->setTransactionId($transactionId);
        // $this->atompay->setTransactionDate($transactionDate);
        // $this->atompay->setCustomerName($name);
        // $this->atompay->setCustomerEmailId($email);
        // $this->atompay->setCustomerMobile($mobile);
        // $this->atompay->setCustomerBillingAddress($address);
        // $this->atompay->setCustomerAccount("639827");
        // $this->atompay->setReqHashKey("44bc1d7c76c2996c55");
        
        $this->atompay->setMode("test");
        $this->atompay->setLogin(197);
        $this->atompay->setPassword("Test@123");
        $this->atompay->setProductId("NSE");
        $this->atompay->setAmount($amount);
        $this->atompay->setTransactionCurrency("INR");
        $this->atompay->setTransactionAmount($amount);
        $this->atompay->setReturnUrl("https://www.vibhanatural.com/vibha-dev/atom-payment-response?order_id=".$order_id);
        $this->atompay->setClientCode(123);
        $this->atompay->setTransactionId($transactionId);
        $this->atompay->setTransactionDate($transactionDate);
        $this->atompay->setCustomerName($name);
        $this->atompay->setCustomerEmailId($email);
        $this->atompay->setCustomerMobile($mobile);
        $this->atompay->setCustomerBillingAddress($address);
        $this->atompay->setCustomerAccount("639827");
        $this->atompay->setReqHashKey("KEY123657234");
    
        $url = $this->atompay->getPGUrl();
        $response 	= array(
    				'state'=>true, 
    				'title'=>'Something went wrong',
    				'type'=>'danger', 
    				'message'=>'Unable to update quantity',
    				'redirect'=>$url);
    	echo json_encode($response);
  }

    public function atom_payment_response(){
        $order_id          = $this->input->get('order_id');
    	$response          = $this->atompay->atomResponse();
    	$order_unique_id   = $response['mer_txn'];
    	$payment_id        = $response['mmp_txn'];
        if (strtolower($response['f_code']) == 'ok') {
            $this->payment_success($order_id,$order_unique_id,$payment_id);
        } elseif (strtolower($response['f_code']) == 'c') {
             $this->payment_cancel();
        } else {
            $this->payment_failed();
        }
    } 
    
    public function payment_success($order_id,$order_unique_id,$payment_id) {
        $table_name         = 'tbl_orders';
        $update_data 	    = array('order_payment_id' => $payment_id);
        $where 		        = array('order_id' => $order_id); 
        $update_result 	    = $this->product_model->update_record($update_data, $where, $table_name);
        $data['order_id']   = $order_id;
        $data['categories'] = $this->category_model->get_category();
        $data['view']  		= 'payment-success';
        $data['title'] 		= 'Vibhanatural | Success';
        $data['show_top_navbar']  = true;
		$this->template->load_site($data);
		$result = $this->generate_invoice_pdf($order_id);
		if($result){
		    $this->cart->destroy();
		    $this->session->unset_userdata('coupon_session');
		    $this->session->unset_userdata('shipping_amounts');
		    $this->session->unset_userdata('skip_login');
		    $this->invoice_email($order_id);
		}
    }
    
    public function payment_cancel() {
        $data['view']  		= 'payment-cancel';
        $data['title'] 		= 'Vibhanatural | Cancel';
        $this->session->unset_userdata('coupon_session');
        $this->session->unset_userdata('shipping_amounts');
		$this->template->load_site($data);
    }
    
    public function payment_failed() {
        $data['view']  		= 'payment-failed';
        $data['title'] 	    = 'Vibhanatural | Failed';
        $this->session->unset_userdata('coupon_session');
        $this->session->unset_userdata('shipping_amounts');
		$this->template->load_site($data);
    }
    
    public function generate_order_pdf(){
		$order_id   = $this->uri->segment(2);
		ob_start();
		$this->load->library('Pdf');
	    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $obj_pdf->SetCreator(PDF_CREATOR);  
	    $obj_pdf->SetTitle("Vibhanatural Invoice No.".$order_id);  
	    $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);//  
	    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
	    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	    $obj_pdf->setPrintHeader(false);  
	    $obj_pdf->setPrintFooter(false);  
	    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
	    $obj_pdf->SetFont('helvetica', '', 12);  
	    $obj_pdf->AddPage();
	    $data['shipping_amounts'] = $this->session->userdata('shipping_amounts');
	    $data['order'] 		= $this->order_model->get_orders($order_id); 
		$data['products'] 	= $this->order_model->get_ordered_products($order_id);
		$content 			= $this->load->view('order_pdf', $data, true);
		echo $content;
	    $obj_pdf->writeHTML($content, true, false, true, false, '');
	    ob_end_clean(); 
		$obj_pdf->Output('Invoice-'.$order_id.'.pdf', 'I');
	}

	public function generate_invoice_pdf($order_id){
		ob_start();
		$this->load->library('Pdf');
	    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $obj_pdf->SetCreator(PDF_CREATOR);  
	    $obj_pdf->SetTitle("Vibhanatural Product Invoice No.".$order_id);  
	    $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);//  
	    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
	    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	    $obj_pdf->setPrintHeader(false);  
	    $obj_pdf->setPrintFooter(false);  
	    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
	    $obj_pdf->SetFont('helvetica', '', 12);  
	    $obj_pdf->AddPage();
	    $data['shipping_amounts'] = $this->session->userdata('shipping_amounts');
	    $data['order'] 		= $this->order_model->get_orders($order_id); 
		$data['products'] 	= $this->order_model->get_ordered_products($order_id);
		$content 			= $this->load->view('order_pdf', $data, true);
		echo $content;
	    $obj_pdf->writeHTML($content, true, false, true, false, '');
	    ob_end_clean();  
		$obj_pdf->Output(FCPATH.'invoices/Invoice-'.$order_id.'.pdf', 'F');
		if(file_exists(FCPATH.'invoices/Invoice-'.$order_id.'.pdf')){
                return true;
            } else {
              return false;
            }
		
	}
	public function invoice_email($order_id){
		$data['order'] 		= $this->order_model->get_orders($order_id); 
		$data['products'] 	= $this->order_model->get_ordered_products($order_id);
		$recipients = array(
          "saints@creativesaints.com","shailesh.penkar@creativesaints.com","rajeshri.pevekar@creativesaints.com"
        );
		$to 		=  $data['order']['email']; 
		$cc 		= 'info@vibhanatural.com'; 
		$subject 	= "Vibhanatural Product Invoice";
		$name       = 'Vibhanatural';
		$body       = $this->load->view('invoice-email',$data, true);
		$pdfFilePath = FCPATH.'invoices/Invoice-'.$order_id.'.pdf';
		$result_1   = $this->send_mail($to, $name, $subject, $body,$pdfFilePath, $cc,$recipients);
	} 
	
	public function send_mail($to,$name,$subject,$body=false,$attachment=false,$cc=false,$bcc=false){
		$this->config->load('email');
		$config = array();
		$config['useragent']		= 	$this->config->item('useragent');
		$config['protocol']			= 	'smtp';
		$config['smtp_host']		=	$this->config->item('smtp_host');
		$config['smtp_auth']		=	$this->config->item('smtp_auth');
		$config['smtp_user']		=	$this->config->item('smtp_user');
		$config['smtp_pass']		=	$this->config->item('smtp_pass');
		$config['smtp_port']		=	$this->config->item('smtp_port');
		$config['smtp_crypto']		=	$this->config->item('smtp_crypto');
		$config['mailtype']			=	$this->config->item('mailtype');
		$config['smtp_timeout']		=	$this->config->item('smtp_timeout');
		$config['smtp_debug']		=	$this->config->item('smtp_debug');
		$config['validate']			=	$this->config->item('validate');
		$config['charset']			=	$this->config->item('charset');
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($config['smtp_user']);
		$this->email->to($to);
		if($cc){
		    $this->email->cc($cc);
		}
		if($bcc){
		    $this->email->bcc($bcc);  
		}
		$this->email->set_newline("\r\n");  
		$this->email->subject($subject);
		$this->email->message($body);
		if($attachment){
		    $this->email->attach($attachment);
		}
		$result = $this->email->send();
		if($result){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>
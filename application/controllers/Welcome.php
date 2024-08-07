<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	private $client_obj = [];
	public function __construct() {
		parent::__construct();
		$this->load->model('Product_Model', 'product_model');
		$this->load->model('Testimonial_model', 'testimonial_model');	
		$this->load->model('Banner_model', 'banner_model');	
		$this->load->model('Category_model','category_model');
		$this->load->model('Site','location');
		$this->load->model('Quality_model','quality_model');
		$this->load->model('Price_range_model','price_range_model');
		$this->load->model('Carat_weight_model','carat_weight_model');
		$this->load->model('Shape_model','shape_model');
		$this->load->model('Color_model','color_model');
		$this->load->model('Clarity_model','clarity_model');
		$this->load->model('Fancy_color_model','fancy_color_model');
		$this->load->model('Overtone_model','overtone_model');
		$this->load->model('Intensity_model','intensity_model'); 
		$this->load->model('Wishlist_model','wishlist_model');
		$client_ip        = $this->get_client_ip_server();
		$this->client_obj = $this->getCountry($client_ip);
		// print_r($client_ip);die;
		// if($this->client_obj->geoplugin_countryCode = "IN") {
		//    header('Location:home');
		// }
		$this->load->library('session');
		if( $this->session->userdata('geo_countryName')==null){
			 echo "inside...";
	        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" .$this->input->ip_address ));
		    $geo_data = array( 'geo_countryName' => $ipdat->geoplugin_countryName, 'geo_countryCode' => $ipdat->geoplugin_countryCode, 'geo_currencyCode' => $ipdat->geoplugin_currencyCode, 'geo_currencySymbol' => $ipdat->geoplugin_currencySymbol, 'geo_currencySymbol_utf' => $ipdat->geoplugin_currencySymbol_UTF8, 'geo_currencyConverter' => $ipdat->geoplugin_currencyConverter );
		    $this->session->set_userdata($geo_data);
		}
	}
  
	public function index() {
		$this->home_view();
	}

	public function home_view(){
		$data['view'] 				   = 'home';
		$data['show_home_navbar']      = true;
		$data['show_top_navbar']       = false;
		// $data['title'] 		           = 'Lab Grown Diamond| Registration';
		$data['script']  	           = 'product.js';
		$data['quality']               = $this->quality_model->get_quality();
		$data['priceranges']           = $this->price_range_model->get_price_range();
		$data['caratweight']           = $this->carat_weight_model->get_carat_weight();
		$data['shapes']                = $this->shape_model->get_shapes();
		$data['colors']                = $this->color_model->get_color();
		$data['clarity']               = $this->clarity_model->get_clarity();
		$data['countries']             = $this->location->getAllCountries();
		$data['getshipcountries']      = $this->location->getAllShipCountries();
		$data['language']              = $this->location->getAllLanguage();
		$data['fancycolors']           = $this->fancy_color_model->get_fancy_color();
		$data['overtones']             = $this->overtone_model->get_overtone();
		$data['intensities']           = $this->intensity_model->get_intensity();
		$data['banners'] 		       = $this->banner_model->get_banners();
		// $product_limit              = 1;
		// $prods_limit                = 1;
		// $skin_limit                 = 1;
		// $hair_limit                 = 1;
		// $data['products']           = $this->product_model->fetch_record($table_name,'product_category',2,$product_limit); 
		// $data['prods']              = $this->product_model->fetch_record($table_name,'product_category',3,$prods_limit);
		// $data['skin_prods']         = $this->product_model->fetch_record($table_name,'product_category',4,$skin_limit);
		// $data['hair_prods']         = $this->product_model->fetch_record($table_name,'product_category',5,$hair_limit);
		// $data['categories']         = $this->category_model->get_category();
		$data['title'] 				   = 'Lab Grown Diamond| Home';
		$this->template->load_site($data);
	}

	public function about_us_view() {
		$data['view'] 		        = 'about-us';
		$data['show_top_navbar']    = true;                   
		$data['link']               = 'about';
		$data['title'] 		        = 'Lab Grown Diamond | About Us';
		$data['script']  	        = 'cart.js';
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['countries']          = $this->location->getAllCountries();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['banners'] 		    = $this->banner_model->get_banners();
		$this->template->load_site($data);
	}

	// public function ayurveda_view() {
	// 	$data['view'] 		        = 'ayurveda';
	// 	$data['show_top_navbar']    = true;
	// 	$data['categories']         = $this->category_model->get_category();
	// 	$data['title'] 		        = 'Lab Grown Diamond| Ayurveda';
	// 	$this->template->load_site($data);
	// }    
	
	// public function distributors_view() {
	// 	$data['view'] 		        = 'distributors';
	// 	$data['show_top_navbar']    = true;
	// 	$data['categories']         = $this->category_model->get_category();
	// 	$data['title'] 		        = 'Lab Grown Diamond| Distributors';
	// 	$this->template->load_site($data);
	// }

	// public function director_profile_view() {
	// 	$data['view'] 		        = 'director-profile';
	// 	$data['show_top_navbar']    = true;
	// 	$data['categories']         = $this->category_model->get_category();
	// 	$data['title'] 		        = 'Lab Grown Diamond| Distributors';
	// 	$this->template->load_site($data);
	// }

	// public function category_view() {
	// 	$data['view'] 		        = 'product-category';
	// 	$data['show_top_navbar']    = true;
	// 	$category_id                = $this->uri->segment(2);
	// 	$data['categories']         = $this->category_model->get_category();
	// 	$data['products'] 	        = $this->product_model->get_products(false,$category_id,'Y');
	// 	$data['title'] 		        = 'Lab Grown Diamond| Covid19';
	// 	$this->template->load_site($data);
	// }
	
	public function cart_view() {
	    $inputData      = $this->input->get();
		$user_session	= $this->session->userdata('user');
		// if(isset($inputData['skip_login']) && !empty($inputData['skip_login']) && $inputData['skip_login'] == true){
	    //     $data_checkout = array('skip_login'=>$inputData);
	    //     $this->session->set_userdata($data_checkout);
	    //     $data['show_top_navbar']  = true;
    	// 	$data['script']  	      = 'cart.js';
	    //     $data['view']             = 'cart';	
		// 	$this->template->load_site($data); 
	    // } else {
	       //if($user_session['isLoggedIn']){
	            // $data['products'] 	= $this->product_model->get_products(false);
	            // $data['categories'] = $this->category_model->get_category();
	            $data['countries']        = $this->location->getAllCountries();
	            // $data['customer']      = $this->product_model->fetch_cart_view($user_session['user_id']);
    			$data['view'] 		      = 'cart';
    			$data['show_top_navbar']  = true;
    			$data['quality']          = $this->quality_model->get_quality();
				$data['priceranges']      = $this->price_range_model->get_price_range();
				$data['caratweight']      = $this->carat_weight_model->get_carat_weight();
				$data['shapes']           = $this->shape_model->get_shapes();
				$data['colors']           = $this->color_model->get_color();
				$data['clarity']          = $this->clarity_model->get_clarity();
				$data['countries']        = $this->location->getAllCountries();
				$data['fancycolors']      = $this->fancy_color_model->get_fancy_color();
				$data['overtones']        = $this->overtone_model->get_overtone();
				$data['intensities']      = $this->intensity_model->get_intensity();
				$data['banners'] 		  = $this->banner_model->get_banners();
    			$this->template->load_site($data);
    		// }else{
    		//     redirect(base_url().'login');
    		// } 
	    //}
	}

	public function checkout_view(){
	    $inputData          	= $this->session->userdata('skip_login');
		$user_session	    	= $this->session->userdata('user');
		$user_shipping_data		= $this->session->userdata('shipping_amounts');
		$data['view'] 			= 'checkout';
		$data['show_top_navbar'] = true;
		$data['title'] 		   = 'Lab Grown Diamond| Checkout';
		$data['script']  	   = 'checkout.js';
		$data['countries']     = $this->location->getAllCountries(); 
		$data['products_cart'] = $this->cart->contents();
		$data['total']         = $this->cart->total();
		// $data['shipping_amounts'] = $user_shipping_data;
		// $data['categories']    = $this->category_model->get_category();
		$product_id = NULL;
		if($user_session){
			$user_id = $user_session['user_id'];
			$data['existing_wishlist']  = []; // Initialize as empty array before the loop
			if (isset($data['products_cart']) && !empty($data['products_cart'])) {
				foreach ($data['products_cart'] as $index => $diamond) {
					// Assuming $diamond['discount'] is a percentage representing the discount
					$product_id = $diamond['id'];
					// Store discount
					if ($product_id !== NULL) {
						$existing_wishlist = $this->wishlist_model->get_wishlist_by_user_product($user_id, $product_id);
						// Check if $existing_wishlist is not null before accessing it as an array
						if ($existing_wishlist !== null) {
							$data['existing_wishlist'][$product_id] = $existing_wishlist;
						} else {
							$data['existing_wishlist'] = NULL;
						}
					} else {
						$data['existing_wishlist'] = NULL;
					}
				}
			}	
		}
		if(!$user_session['isLoggedIn'] && isset($inputData['skip_login']) && !empty($inputData['skip_login']) && $inputData['skip_login'] == true){
		       $this->template->load_site($data);   
		 }else{
		     if($user_session['isLoggedIn']){
		        // $data['customer'] = $this->product_model->fetch_cart_view($user_session['user_id']);
		        $this->template->load_site($data);
    		 }else{
    		   redirect(base_url().'home');  
    		 }   
		}
// 		if(isset($user_session) && !empty($user_session)) {
// 			if($user_session['isLoggedIn']){
// 				$data['view'] 		= 'checkout';
// 				$data['show_top_navbar']  = true;
// 				$data['title'] 		= 'Lab Grown Diamond| Checkout';
// 				$data['script']  	= 'checkout.js';
// 				$data['countries']  = $this->location->getAllCountries(); 
// 				$data['products_cart'] = $this->cart->contents();
// 				$data['total']         = $this->cart->total();
// 				$data['shipping_amounts'] = $user_shipping_data;
// 				$data['customer']      = $this->product_model->fetch_cart_view($user_session['user_id']);
// 				$data['categories']    = $this->category_model->get_category();
// 				$this->template->load_site($data);	
// 			} else {
// 				redirect(base_url().'login');
// 			}
// 		} else {
// 			redirect(base_url().'login');
// 		}
	}

	public function profile_view() {
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn']){
				$data['view'] 		= 'profile';
				$data['show_top_navbar']    = true;
				$data['title'] 		= 'Lab Grown Diamond| Profile';
				$data['script']  	= 'profile.js';
				$this->template->load_site($data);
			} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function contact_us_view() {
		$data['view'] 		           = 'contact-us';
		$data['show_top_navbar']       = true;
		$data['categories']            = $this->category_model->get_category();
		$data['title'] 				   = 'Lab Grown Diamond| Contact Us';
		$data['script']  			   = 'contact.js';
		$data['quality']               = $this->quality_model->get_quality();
		$data['priceranges']           = $this->price_range_model->get_price_range();
		$data['caratweight']           = $this->carat_weight_model->get_carat_weight();
		$data['shapes']                = $this->shape_model->get_shapes();
		$data['colors']                = $this->color_model->get_color();
		$data['clarity']               = $this->clarity_model->get_clarity();
		$data['countries']             = $this->location->getAllCountries();
		$data['fancycolors']           = $this->fancy_color_model->get_fancy_color();
		$data['overtones']             = $this->overtone_model->get_overtone();
		$data['intensities']           = $this->intensity_model->get_intensity();
		$data['banners'] 		       = $this->banner_model->get_banners();
		$this->template->load_site($data);
	}

	public function login_view() {
		$data['show_navbar'] = false;
		$data['view'] 		= 'login.html';
		$data['title'] 		= 'Lab Grown Diamond| Login';
		$data['script']  	= 'auth.js';
		$this->template->load_site($data);
	}

	public function registration_view() {
		$data['view'] 		= 'registration';
		$data['countries']  = $this->location->getAllCountries();
		$data['title'] 		= 'Lab Grown Diamond| Registration';
		$data['script']  	= 'auth.js';
		$this->template->load_site($data);
	}

	public function forgot_password_view() {
		$data['view'] 		= 'forgot-password.html';
		$data['title'] 		= 'Lab Grown Diamond| Forgot Password';
		$data['script']  	= 'auth.js';
		$this->template->load_site($data);
	}

    // public function faq_view() {
    //     $data['show_top_navbar']    = true;
	// 	$data['view'] 		= 'faq-view.html';
	// 	$data['categories'] = $this->category_model->get_category();
	// 	$data['title'] 		= 'Lab Grown Diamond| FAQs';
	// 	$this->template->load_site($data);
	// }

	// public function terms_and_conditions_view() {
	//     $data['show_top_navbar']    = true;
	// 	$data['view'] 		= 'terms-and-conditions.html';
	// 	$data['categories']  = $this->category_model->get_category();
	// 	$data['title'] 		= 'Lab Grown Diamond| Terms&conditions';
	// 	$this->template->load_site($data);
	// }
	// public function privacy_policy_view(){
	//     $data['show_top_navbar']    = true;
	//     $data['view'] 		= 'privacy-policy.html';
	//     $data['categories'] = $this->category_model->get_category();
	// 	$data['title'] 		= 'Lab Grown Diamond| Privacy Policy';
	// 	$this->template->load_site($data); 
	// }

	public function return_policy_view() {
	    $data['show_top_navbar']  = true;
	    $data['view'] 		= 'return_policy';
		$data['title'] 		= 'Lab Grown Diamond| Return Policy';
		$this->template->load_site($data);
	}
	
	// public function cancellation_policy_view() {
	//     $data['show_top_navbar']    = true;
	//     $data['view'] 		= 'cancellation-policy.html';
	//     $data['categories'] = $this->category_model->get_category();
	// 	   $data['title'] 		= 'Lab Grown Diamond| Privacy Policy';
	// 	   $this->template->load_site($data);
	//}

	public function shipping_policy_view() {
	    $data['show_top_navbar']  = true;
	    $data['view'] 		= 'shipping_policy';
	    $data['categories'] = $this->category_model->get_category();
		$data['title'] 		= 'Lab Grown Diamond| Privacy Policy';
		$this->template->load_site($data);
	}

	public function get_profile_view(){
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn'] && $this->input->is_ajax_request()){
				$user_id 	= $user_session['user_id'];
				$data = array();
				if(isset($user_id) && !empty($user_id)){
					$data['user'] 		= $this->product_model->get_user($user_id);
					$data['show_top_navbar']    = true;
				}
				$view 		= $this->load->view('profile-information', $data, true);
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
		        echo json_encode($response);
			}else{
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function get_order_view(){
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn'] && $this->input->is_ajax_request()){
				$user_id 	= $user_session['user_id'];
				$data = array();
				if(isset($user_id) && !empty($user_id)){
					$data['products'] 		= $this->product_model->get_user_ordered_products($user_id);
					$data['show_top_navbar']    = true;
				}
				$view 		= $this->load->view('profile-order', $data, true);
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
		        echo json_encode($response);
			} else {
				redirect(base_url().'login');
			}
		} else {
				redirect(base_url().'login');
		}
	}

	public function reset_view(){
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn']){
			$data['view']   = 'change-password';
			$data['script'] = 'auth.js';
			$this->template->load_site($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}
    
    public function set_review_details(){
		$user_data 				= $this->input->post();
		$userData 		        = array();
		$table_name 			= 'tbl_review';
	    if($user_data){
		    $userData['cust_name']		  = strip_tags($user_data['comment_author']);
		    $userData['cust_email']		  = strip_tags($user_data['comment_author_email']);
		    $userData['cust_review']	  = strip_tags($user_data['comment_content']);
		    $userData['cust_product_url'] = strip_tags($user_data['cust_product_url']);
		    $userData['display']		  = 'N';
			$userData['inserted_by']      = rand(10,100);
			$userData['inserted_on']      = date('Y-m-d H:i:s');
		    $enquiry_mail_result 	      = $this->product_model->save_record($userData, $table_name);
		if($enquiry_mail_result){
			$response 	= array(
			'state'=>TRUE, 
			'title'=>'Success',
			'type'=>'success', 
			'message'=>'Your enquiry is successfully submitted.',
			'redirect' => $user_data['cust_product_url']);
		} else {
			$response 	= array(
			'state'=>FALSE, 
			'title'=>'Something went wrong',
			'type'=>'error', 
			'message'=>'Unable to send email');
		}
	    }
		echo json_encode($response);
	}

	public function wishlist_view() {
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn']){
			    $data['categories'] = $this->category_model->get_category();
				$data['view'] 		= 'wishlist';
				$data['show_top_navbar']  = true;
				$data['title'] 		= 'Lab Grown Diamond| Wishlist';
				$data['script']  	= 'wishlist.js';
				$this->template->load_site($data);
			} else {
				redirect(base_url().'home');
			}
		} else {
			redirect(base_url().'home');
		}
	}
	
	public function cust_order_history_view() {
		$user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn']){
			    $data['categories'] = $this->category_model->get_category();
				$data['view'] 		= 'cust-orders';
				$data['show_top_navbar']  = true;
				$data['title'] 		= 'Lab Grown Diamond| My Order';
				$data['script']  	= 'profile.js';
				$this->template->load_site($data);
			} else {
				redirect(base_url().'home');
			}
		} else {
			redirect(base_url().'home');
		}
	}
	
	// get state names
    public function get_states(){
        $json = array();
        $this->location->setCountryID($this->input->get('country_id'));
        $json = $this->location->getStates();
        $response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$json);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    // get city names
    public function get_cities(){
        $json = array();
        $this->location->setStateID($this->input->get('state_id'));
        $json = $this->location->getCities();
        $response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$json);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function get_client_ip_server() {
             $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
              $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
              $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
              $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
              $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
              $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
              $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
             $ipaddress = 'UNKNOWN';
          return $ipaddress;
    }

    public function getCountry($ip){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);
        return $jsonData;
    }

}

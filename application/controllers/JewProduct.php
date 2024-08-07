<?php defined('BASEPATH') OR exit('No direct script access allowed');
class JewProduct extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    $this->load->model('Category_model','category_model');
	    $this->load->model('Sub_category_model','sub_category_model');
	    $this->load->model('Sub_sub_category_model','sub_sub_category_model');
	    $this->load->model('jewellary/Product_model','product_model');
	    $this->load->model('Review_Model','review_model');
	    $this->load->model('Product_measure_model','product_measure_model');
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
		$this->load->model('Purchase_price_model','purchase_price_model');
		$this->load->model('Shipping_model','shipping_model');
		$this->load->model('Wishlist_model','wishlist_model');
		$this->load->model('Discount_model','discount_model');
    }

	public function permanent_product_page(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 	    = 'admin/jewellary/product/permanent_product_pages';
				$data['title'] 		= 'Admin | Permanent Product Page';
				$data['script']		= 'jewellary/product.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}


	
/*************** **************************
     jewellary product page - gen
*************** ****************/	 
public function jewellary_product_page(){
    $segment1 = $this->uri->segment(7);
    $segment2 = $this->uri->segment(8);
    $segment3 = $this->uri->segment(9);

    $combined_segments = $segment1 . '/' . $segment2 . '/' . $segment3;

    // Fetch product details including image paths
    $result = $this->product_model->getChildProductPageDetails($combined_segments);

    // Pass the image data to the view
    $data['permanent_product_page_details'] = $result;
    $data['main_image'] = $result['SKU_ID_parent_image_file_name'];
    $data['image_v1'] = $result['SKU_ID_image_file_name_v1'];
    $data['image_v2'] = $result['SKU_ID_image_file_name_v2'];

    // Other data fetching
    $data['view'] = 'jewellary_product-view';
    $data['show_top_navbar'] = true;
    $data['link'] = 'product';
    $data['title'] = 'metatitle dynamic
	description';
	//'Manufacturer,exporter,wholesaler of GIA IGI diamonds & jewellery-engagement ring,bridal wedding matrimonial by Taare&Sitare , Mumbai, India for Reliable & Reasonable real & natural';
    $data['quality'] = $this->quality_model->get_quality();
    $data['priceranges'] = $this->price_range_model->get_price_range();
    $data['caratweight'] = $this->carat_weight_model->get_carat_weight();
    $data['shapes'] = $this->shape_model->get_shapes();
    $data['colors'] = $this->color_model->get_color();
    $data['clarity'] = $this->clarity_model->get_clarity();
    $data['fancycolors'] = $this->fancy_color_model->get_fancy_color();
    $data['overtones'] = $this->overtone_model->get_overtone();
    $data['intensities'] = $this->intensity_model->get_intensity();
    $data['countries'] = $this->location->getAllCountries();
    $data['discounts'] = $this->discount_model->get_discount();
    $data['product_price'] = $this->purchase_price_model->get_purchase_price();
    $data['language'] = $this->location->getAllLanguage();

    $this->template->load_site($data);
}



    // Array ( [shape] => Array ( [0] => Round [1] => Oval [2] => Pear ) )
    public  function get_product_shape_by_filter(){
    	$input_details = array();
	    // Retrieve data from GET request
	    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	        $input_details += $this->input->get();
	    }

	    $input_shape = $this->input->get();
		$shapes      = '';
		if(isset($input_details['shape']) && is_array($input_details['shape'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['shape']); $r++) {
				$shapes .= 'shapes[]=' . ucfirst($input_details['shape'][$r]) .'&';
			}
		}else{
			if (isset($input_shape['shape']) && !empty($input_shape['shape'])) {
				$shapes .= 'shapes[]=' . ucfirst($input_shape['shape']) . '&';
			}
		}
		$shapes = substr($shapes, 0, -1);
		$api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		if (!empty($shapes)) {
			$api_url .= $shapes;
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		$data['json_data']  = json_decode($json_response, true);
		$product_id = NULL;
		$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
		if($user_session){
			$user_id = $user_session['user_id'];
			$data['existing_wishlist']  = []; // Initialize as empty array before the loop
			if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
				foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
					// Assuming $diamond['discount'] is a percentage representing the discount
					$product_id = $diamond['stock_num'];
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
		$data['product_price']      = $this->purchase_price_model->get_purchase_price();
		$data['shippingwithtax']  	= $this->shipping_model->get_shippings();	
		$data['view'] 		        = 'product';
		$data['show_top_navbar']    = true;
		$data['link']               = 'product';
		$data['title'] 		        = 'LAB GROWN DIAMOND | PRODUCT';
		$data['script']  	        = 'wishlist.js';
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['countries']          = $this->location->getAllCountries();
		$data['discounts']          = $this->discount_model->get_discount();
		$data['countries']          = $this->location->getAllCountries();
		$data['getshipcountries']   = $this->location->getAllShipCountries();	
		$data['language']           = $this->location->getAllLanguage();	
		$this->template->load_site($data);
    }

 public function get_products_quick_filter_api(){
		$input_details = array();
	    // Retrieve data from GET request
	    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    //     $input_details += $this->input->get();
	    // }

	    // Retrieve data from POST request
	    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	        $input_details += $this->input->post();
	    }
	    //print_r($input_details);die;
	   	$shapes = '';
		// Collect all shapes into an array
		$all_shapes = [];
		// Check if 'shape' is set in $input_details and is an array
		if (isset($input_details['shape'][0]) && is_array($input_details['shape'][0])) {
		    // Iterate over each shape and add it to the $all_shapes array
		    foreach ($input_details['shape'] as $shape) {
		        // Make sure the shape is not empty
		        if (!empty($shape)) {
		            // Add the shape to the $all_shapes array
		            $all_shapes[] = ucfirst($shape);
		        }
		    }
		}

		// Join all shapes into a single string separated by commas
		$shapes = implode(',', $all_shapes);

		// Append 'shapes=' to the $shapes variable
		$shapes = 'shapes[]' . urlencode($shapes);
		//print_r($shapes);die;

		if(isset($input_details['quality'])) {
			$selected_quality = $input_details['quality'];
			// Explode the value by the '|' delimiter
			$selected_quality_parts = explode('|', $selected_quality[0]); 
			if(count($selected_quality_parts) == 2) {
				$quality_id   = $selected_quality_parts[0];
				$quality_name = $selected_quality_parts[1];				
			} 
		} 
		if(isset($input_details['quality']) && !empty($input_details['quality'])){
			$dataQuality = $this->quality_model->get_quality($quality_id);
		} 
		$clarity_from ='';
		$clarity_to   ='';
		$color_from   ='';
		$color_to     ='';
		if(isset($quality_name) && !empty($quality_name)) {
			// for ($i = 0; $i < count($quality_name); $i++) {
			// 	$clarity = $quality_name[$i];
				if ($quality_name ==='Best') {
					$clarity_from = $dataQuality['quality_clarity_from'];
					$clarity_to   = $dataQuality['quality_clarity_to'];
					$color_from   = $dataQuality['quality_color_from'];
					$color_to     = $dataQuality['quality_color_to'];
					// break;
				}elseif($quality_name ==='Good') {
					$clarity_from = $dataQuality['quality_clarity_from'];
					$clarity_to   = $dataQuality['quality_clarity_to'];
					$color_from   = $dataQuality['quality_color_from'];
					$color_to     = $dataQuality['quality_color_to'];
					// break;
				}elseif($quality_name ==='Average') {
					$clarity_from = $dataQuality['quality_clarity_from'];
					$clarity_to   = $dataQuality['quality_clarity_to'];
					$color_from   = $dataQuality['quality_color_from'];
					$color_to     = $dataQuality['quality_color_to'];
					// break;
				}
				// else{
				// 	$clarity_from = $dataQuality['quality_clarity_from'];
				// 	$clarity_to   = $dataQuality['quality_clarity_to'];
				// 	$color_from   = $dataQuality['quality_color_from'];
				// 	$color_to     = $dataQuality['quality_color_to'];
				// 	// break;
				// }
			// }
		}
		$total_sales_price = '';
		$total_sales_price_from = '';
		$total_sales_price_to = '';
		
		if (isset($input_details['price_range']) && is_array($input_details['price_range'])) {
			foreach ($input_details['price_range'] as $range) {
				$removeTo = explode(' To ', $range);
				$removeRs = str_replace('Rs.', '', $removeTo);	
				// Check if $parts is not false and contains two elements
				if ($removeRs && count($removeRs) == 2) {
				// Extract price_from and price_to values
					$price_from = $removeRs[0];
					$price_to   = $removeRs[1];
				} else {
				// Handle the case where the range is not properly formatted
					$price_from = 'total_sales_price';
					$price_to   = 'total_sales_price';
				}
				// Append price_from and price_to to their respective variables
				$total_sales_price_from .= $price_from;
				$total_sales_price_to.= $price_to;
			}
		}		

		$size_from_query = '';
		$size_to_query   = '';
		// print_r($input_details['size']);die;
		// if (isset($input_details['size']) && is_array($input_details['size'])) {
		// 	foreach ($input_details['size'] as $range) {
		// 		$split_values    = explode(" ", str_replace(" TO ", " ", $range));
		// 		$size_from_query = trim($split_values[0]); // Trim to remove any extra whitespace
		// 		$size_to_query   = trim($split_values[1]);
		// 	}
		// }	
		
		//print_r($input_details['size']); // Printing the array for debugging
		if (isset($input_details['size']) && !empty($input_details['size'])) {
		    foreach ($input_details['size'] as $range) {
		    	//print_r($range);
		        // Explode the range to get size_from_query and size_to_query
		        $split_values = explode(" TO ", $range);
		        if (count($split_values) == 2) {
		            $size_from_query = trim($split_values[0]); // Trim to remove any extra whitespace
		            $size_to_query   = trim($split_values[1]);
		        } else {
		            $size_from_query = trim($input_details['size'][0]); // Trim to remove any extra whitespace
        			$size_to_query   = trim($input_details['size'][1]);
		        }
		    }
		}
		//print_r($size_to_query);die;
		$input_shape = $this->input->get();
		$shapes = '';
		if(isset($input_details['shape']) && is_array($input_details['shape'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['shape']); $r++) {
				$shapes .= 'shapes[]=' . ucfirst($input_details['shape'][$r]) .'&';
			}
		}else{
			if (isset($input_shape['shape']) && !empty($input_shape['shape'])) {
				$shapes .= 'shapes[]=' . ucfirst($input_shape['shape']) . '&';
			}
		}
		$shapes  = substr($shapes, 0, -1);
		$api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond';
		
		// Add clarity and color parameters if they are available
		if (!empty($clarity_from) && !empty($clarity_to)) {
			$api_url .= '&clarity_from=' . urlencode($clarity_from) . '&clarity_to=' . urlencode($clarity_to). '&';
		}elseif(!empty($color_from) && !empty($color_to)){
			$api_url .= '&color_from=' . urlencode($color_from) . '&color_to=' . urlencode($color_to). '&';
		}else{
			$api_url .='&';
		}
		// Add shapes parameter if it's available
		if (!empty($shapes)) {
			$api_url .= $shapes;
		}
		if (!empty($size_from_query) && !empty($size_to_query)) {
			$api_url .= '&size_from='.urlencode($size_from_query) .'&size_to='. urlencode($size_to_query);
		}elseif(!empty($size_from_query)){
			$api_url .= '&size_from='.urlencode($size_from_query) .'&';
		}
		if (!empty($total_sales_price_from) && !empty($total_sales_price_to)) {
			$api_url .= '&total_sales_price_from=' . urlencode($total_sales_price_from) . '&total_sales_price_to=' . urlencode($total_sales_price_to).'&';
		}
		//print_r($api_url);die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
			$data['json_data']          = json_decode($json_response, true);
			$product_id = NULL;
			$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
			if($user_session){
				$user_id = $user_session['user_id'];
				$data['existing_wishlist']  = []; // Initialize as empty array before the loop
				if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
					foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
						// Assuming $diamond['discount'] is a percentage representing the discount
						$product_id = $diamond['stock_num'];
						// Store discount
						if ($product_id !== NULL) {
							$existing_wishlist = $this->wishlist_model->get_wishlist_by_user_product($user_id, $product_id);
							// Check if $existing_wishlist is not null before accessing it as an array
							if ($existing_wishlist !== null) {
								$data['existing_wishlist'][$product_id] = $existing_wishlist;
							} else {
								$data['existing_wishlist'] = NULL;
							}
						}else{
							$data['existing_wishlist'] = NULL;
						}
					}
				}	
			}
			$data['product_price']      = $this->purchase_price_model->get_purchase_price();
			$data['shippingwithtax']  	= $this->shipping_model->get_shippings();	
			$data['view'] 		        = 'product';
			$data['show_top_navbar']    = true;
			$data['link']               = 'product';
			$data['title'] 		        = 'Lab Grown Diamond | Product';
			$data['script']  	        = 'wishlist.js';
			$data['quality']            = $this->quality_model->get_quality();
			$data['priceranges']        = $this->price_range_model->get_price_range();
			$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
			$data['shapes']             = $this->shape_model->get_shapes();
			$data['colors']             = $this->color_model->get_color();
			$data['clarity']            = $this->clarity_model->get_clarity();
			$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
			$data['overtones']          = $this->overtone_model->get_overtone();
			$data['intensities']        = $this->intensity_model->get_intensity();
			$data['countries']          = $this->location->getAllCountries();
		    $data['getshipcountries']   = $this->location->getAllShipCountries();		
			$data['discounts']          = $this->discount_model->get_discount();
			$data['language']           = $this->location->getAllLanguage();
			$this->template->load_site($data);
	}
	
	public function get_products_advance_filter_api() {
		$input_details 	= $this->input->post();
		$single_pair_values = (isset($input_details['diamond']) && !empty($input_details['diamond']))?$input_details['diamond']:'';
		$total_sales_price = '';
		$total_sales_price_from = '';
		$total_sales_price_to = '';
		$api_url ='';
		$api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		if (isset($input_details['price_range']) && is_array($input_details['price_range'])) {
			foreach ($input_details['price_range'] as $range) {
				$removeTo = explode(' To ', $range);
				$removeRs = str_replace('Rs.', '', $removeTo);	
				if ($removeRs && count($removeRs) == 2) {
					$price_from = $removeRs[0];
					$price_to   = $removeRs[1];
				} else {
					$price_from = 'total_sales_price';
					$price_to   = 'total_sales_price';
				}
				$total_sales_price_from .= $price_from;
				$total_sales_price_to.= $price_to;
			}
		}
		if (!empty($total_sales_price_from) && !empty($total_sales_price_to)) {
			$api_url .='total_sales_price_from='.urlencode($total_sales_price_from).'&total_sales_price_to='.urlencode($total_sales_price_to).'&';
		}
		$size_from_query = '';
		$size_to_query   = '';
		if (isset($input_details['size']) && is_array($input_details['size'])) {
			foreach ($input_details['size'] as $range) {
				$split_values    = explode(" ", str_replace(" TO ", " ", $range));
				$size_from_query = trim($split_values[0]); // Trim to remove any extra whitespace
				$size_to_query   = trim($split_values[1]);
			}
		}
		if (!empty($size_from_query) && !empty($size_to_query)) {
			$api_url .= 'size_from=' . urlencode($size_from_query) .'&size_to='. urlencode($size_to_query);
		}

		$shapes = '';
		if(isset($input_details['shape']) && is_array($input_details['shape'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['shape']); $r++) {
				$shapes .= 'shapes[]=' . ucfirst($input_details['shape'][$r]) .'&';
			}
		}
		$shapes = substr($shapes, 0, -1);

		if (!empty($shapes)) {
			$api_url .= $shapes;
		}
		// For the $color array
		$color_from = null;
		$color_to = null;
		if(isset($input_details['color']) && is_array($input_details['color'])) {
			foreach ($input_details['color'] as $value) {
				// Store the first value
				if ($color_from === null) {
					$color_from = $value;
				}
				// Update the last value for each iteration
				$color_to = $value;
			}
		}
		if(!empty($color_from) && !empty($color_to)) {
			$api_url .= '&color_from='.urlencode($color_from).'&color_to='.urlencode($color_to).'&';
		}
		// For the $clarity array
		$clarity_from = null;
		$clarity_to   = null;
		// print_r($input_details);die;
		if(isset($input_details['clarity']) && is_array($input_details['clarity'])) {
			foreach ($input_details['clarity'] as $value) {
				// Store the first value
				if ($clarity_from === null) {
					$clarity_from = $value;
				}
				// Update the last value for each iteration
				$clarity_to = $value;
			}
		}
		// Add clarity and color parameters if they are available
		if (!empty($clarity_from) && !empty($clarity_to)) {
			$api_url .= '&clarity_from='.urlencode($clarity_from) .'&clarity_to='.urlencode($clarity_to);
		}
		// else{
		// 	$api_url .= 'clarity_from='.urlencode($input_details['clerity'][0]);
		// }
		//echo "<pre>";print_r($api_url);
		//die;	
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		$data['json_data'] = json_decode($json_response, true);
		$product_id = NULL;
		$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
		if($user_session){
			$user_id = $user_session['user_id'];
			$data['existing_wishlist']  = []; // Initialize as empty array before the loop
			if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
				foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
					// Assuming $diamond['discount'] is a percentage representing the discount
					$product_id = $diamond['stock_num'];
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
		$data['product_price']      = $this->purchase_price_model->get_purchase_price();
		$data['shippingwithtax']  	= $this->shipping_model->get_shippings();		
		$data['view'] 		        = 'product';
		$data['show_top_navbar']    = true;
		$data['link']               = 'product';
		$data['title'] 		        = 'Lab Grown Diamond | Product';
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['countries']          = $this->location->getAllCountries();
		$data['getshipcountries']   = $this->location->getAllShipCountries();		
		$data['discounts']          = $this->discount_model->get_discount();
		$data['language']           = $this->location->getAllLanguage();
		$this->template->load_site($data);	
	}
	
	public function get_products_advance_filter_data() {
		$input_details 	= $this->input->post();
		$api_url ='';
		$api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		$country_values = (isset($input_details['country_name']) && !empty($input_details['country_name']))?$input_details['country_name']:'';
		$cut_from = null;
		$cut_to   = null;
		if (isset($input_details['cut']) && is_array($input_details['cut'])) {
			foreach ($input_details['cut'] as $value) {
				if ($cut_from === null) {
					$cut_from = $value;
				}
				$cut_to = $value;
			}
		}
		$cut_from = str_replace(' ', '%20', $cut_from);
		$cut_to   = str_replace(' ', '%20', $cut_to);

		if (!empty($cut_from) && !empty($cut_to)) {
			$api_url .= 'cut_from='.$cut_from .'&cut_to='.$cut_to;
		}
		//End cut//
		$polish_from = null;
		$polish_to   = null;
		if (isset($input_details['polish']) && is_array($input_details['polish'])) {
			foreach ($input_details['polish'] as $value) {
				if ($polish_from === null) {
					$polish_from = $value;
				}
				$polish_to = $value;
			}
		}
		$polish_from = str_replace(' ', '%20', $polish_from);
		$polish_to   = str_replace(' ', '%20', $polish_to);

		if (!empty($polish_from) && !empty($polish_to)) {
			$api_url .= '&polish_from='.$polish_from .'&polish_to='.$polish_to;
		}

		//End Polish//
		$symmetry_from = null;
		$symmetry_to   = null;
		if (isset($input_details['symmetry']) && is_array($input_details['symmetry'])) {
			foreach ($input_details['symmetry'] as $value) {
				if ($symmetry_from === null) {
					$symmetry_from = $value;
				}
				$symmetry_to = $value;
			}
		}
		$symmetry_from = str_replace(' ', '%20', $symmetry_from);
		$symmetry_to   = str_replace(' ', '%20', $symmetry_to);

		if (!empty($symmetry_from) && !empty($symmetry_to)) {
			$api_url .= '&symmetry_from='.$symmetry_from .'&symmetry_to='.$symmetry_to;
		}
		//End symmetry//

		$lab = '';
		if(isset($input_details['lab']) && is_array($input_details['lab'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['lab']); $r++) {
				$lab .= 'lab[]=' . ucfirst($input_details['lab'][$r]) .'&';
			}
		}
		$lab = substr($lab, 0, -1);
		if (!empty($lab)) {
			$api_url .= $lab;
		}
		//End 

		$fluor_intensity_from = null;
		$fluor_intensity_to   = null;
		if (isset($input_details['fluor_intensity']) && is_array($input_details['fluor_intensity'])) {
			foreach ($input_details['fluor_intensity'] as $value) {
				if ($fluor_intensity_from === null) {
					$fluor_intensity_from = $value;
				}
				$fluor_intensity_to = $value;
			}
		}
		$fluor_intensity_from = str_replace(' ', '%20', $fluor_intensity_from);
		$fluor_intensity_to   = str_replace(' ', '%20', $fluor_intensity_to);

		if (!empty($fluor_intensity_from) && !empty($fluor_intensity_to)){
			$api_url .= '&fluorescence_intensities[]='.$fluor_intensity_from .'&fluorescence_intensities[]='.$fluor_intensity_to;
		}
		//End
		$depth_percent_from = (isset($input_details['depth_percent_from']) && !empty($input_details['depth_percent_from']))?$input_details['depth_percent_from']:'';
		$depth_percent_to   = (isset($input_details['depth_percent_to']) && !empty($input_details['depth_percent_to']))?$input_details['depth_percent_to']:'';
		if (!empty($depth_percent_from) && !empty($depth_percent_to)) {
			$api_url .= '&depth_percent_from[]='.$depth_percent_from .'&depth_percent_to[]='.$depth_percent_to;
		}
		//End//
		$table_percent_from = (isset($input_details['table_percent_from']) && !empty($input_details['table_percent_from']))?$input_details['table_percent_from']:'';
		$table_percent_to   = (isset($input_details['table_percent_to']) && !empty($input_details['table_percent_to']))?$input_details['table_percent_to']:'';
		if (!empty($table_percent_from) && !empty($$table_percent_to)) {
			$api_url .= '&table_percent_from[]='.$table_percent_from .'&table_percent_to[]='.$table_percent_to;
		}
		//End//
		$ratio_percent_from = (isset($input_details['ratio_percent_from']) && !empty($input_details['ratio_percent_from']))?$input_details['ratio_percent_from']:'';
		$ratio_percent_to   = (isset($input_details['ratio_percent_to']) && !empty($input_details['table_percent_to']))?$input_details['ratio_percent_to']:'';
		if (!empty($ratio_percent_from) && !empty($ratio_percent_to)) {
			$api_url .= '&ratio_percent_from[]='.$ratio_percent_from .'&ratio_percent_to[]='.$ratio_percent_to;
		}
		//End//
		$treatment = '';
		if(isset($input_details['treatment']) && is_array($input_details['treatment'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['treatment']); $r++) {
				$treatment .= 'treatment[]=' . ucfirst($input_details['treatment'][$r]) .'&';
			}
		}
		$treatment = substr($treatment, 0, -1);

		if (!empty($treatment)) {
			$api_url .= $treatment;  
		}
		//End//
		$growth = '';
		if(isset($input_details['growth']) && is_array($input_details['growth'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['growth']); $r++) {
				$growth .= 'growth[]=' . ucfirst($input_details['growth'][$r]) .'&';
			}
		}
		$growth = substr($growth, 0, -1);

		if (!empty($growth)) {
			$api_url .= $growth;
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		$data['json_data']  = json_decode($json_response, true);
		$product_id = NULL;
		$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
		if($user_session){
			$user_id = $user_session['user_id'];
			$data['existing_wishlist']  = []; // Initialize as empty array before the loop
			if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
				foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
					// Assuming $diamond['discount'] is a percentage representing the discount
					$product_id = $diamond['stock_num'];
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
		$data['product_price']      = $this->purchase_price_model->get_purchase_price();
		$data['shippingwithtax']  	= $this->shipping_model->get_shippings();
		$data['view'] 		        = 'product';
		$data['show_top_navbar']    = true;
		$data['link']               = 'product';
		$data['title'] 		        = 'Lab Grown Diamond | Product';
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['countries']          = $this->location->getAllCountries();
		$data['getshipcountries']   = $this->location->getAllShipCountries();		
		$data['discounts']          = $this->discount_model->get_discount();
		$data['language']           = $this->location->getAllLanguage();
		$this->template->load_site($data);
	}
	
	public function get_products_fancy_color_filter_api(){
		$input_details 	= $this->input->post();
		$api_url ='';
		$api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		$total_sales_price_from = '';
		$total_sales_price_to   = '';
		if (isset($input_details['price_range']) && is_array($input_details['price_range'])) {
			foreach ($input_details['price_range'] as $range) {
				$removeTo = explode(' To ', $range);
				$removeRs = str_replace('Rs.', '', $removeTo);	
				// Check if $parts is not false and contains two elements
				if ($removeRs && count($removeRs) == 2) {
				// Extract price_from and price_to values
					$price_from = $removeRs[0];
					$price_to   = $removeRs[1];
				} else {
				// Handle the case where the range is not properly formatted
					$price_from = 'total_sales_price';
					$price_to   = 'total_sales_price';
				}
				// Append price_from and price_to to their respective variables
				$total_sales_price_from .= $price_from;
				$total_sales_price_to.= $price_to;
			}
		}
		if (!empty($total_sales_price_from) && !empty($total_sales_price_to)) {
			$api_url .= '&total_sales_price_from=' . urlencode($total_sales_price_from) . '&total_sales_price_to=' . urlencode($total_sales_price_to).'&';
		}
		//End//
		$size_from_query = '';
		$size_to_query   = '';
		if (isset($input_details['size']) && is_array($input_details['size'])) {
			foreach ($input_details['size'] as $range) {
				$split_values = explode(" ", str_replace(" TO ", " ", $range));
				// Extract size_from and size_to values
				$size_from_query = trim($split_values[0]); 
				$size_to_query   = trim($split_values[1]);
			}
		}
		if (!empty($size_from_query) && !empty($size_to_query)) {
			$api_url .= '&size_from=' . urlencode($size_from_query) .'&size_to='. urlencode($size_to_query);
		}
		//End//
		$shapes = '';
		if(isset($input_details['shape']) && is_array($input_details['shape'])) {
			// Iterate over the 'shapes' array if it exists and is an array
			for($r = 0; $r < count($input_details['shape']); $r++) {
				$shapes .= 'shapes[]=' . ucfirst($input_details['shape'][$r]) .'&';
			}
		}else{
			if (isset($input_details['shape']) && !empty($input_details['nav'])) {
				$shapes .= '&shapes[]=' . ucfirst($input_details['shape']) . '&';
			}
		}
		$shapes     = substr($shapes, 0, -1);
		
		if (!empty($shapes)) {
			$api_url .= $shapes;
		}
		//End//
		
		$clarity_from  = '';
		$clarity_to    = '';
		// Iterate through the array
		if(isset($input_details['clarity']) && is_array($input_details['clarity'])) {
			foreach ($input_details['clarity'] as $value) {
				// Set the first value if it's not set yet
				if ($clarity_from === null) {
					$clarity_from = $value;
				}
				// Set the last value for each iteration
				$clarity_to = $value;
			}
			if (!empty($clarity_from) && !empty($clarity_to)) {
				$api_url .= '&clarity_from=' . urlencode($clarity_from) . '&clarity_to=' . urlencode($clarity_to);
			}
		}
		// End //
		$fancy_color = '';
		if(isset($input_details['fancy_color']) && is_array($input_details['fancy_color'])) {
			// Iterate over the 'fancy_color' array if it exists and is an array
			for($r = 0; $r < count($input_details['fancy_color']); $r++) {
				$fancy_color .= '&fancy_color[]=' . ucfirst($input_details['fancy_color'][$r]) .'&';
			}
		}
		$fancy_color     = substr($fancy_color, 0, -1);
		if (!empty($fancy_color)) {
			$api_url .= $fancy_color;
		}
		//End//
		$urlParts = parse_url($api_url);
		$baseURL  = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'];
		$queryString = preg_replace('/(&)\1+/', '$1', $urlParts['query']);
		$cleanURL = $baseURL . '?' . $queryString;
		//End//
		$overtone = '';
		if(isset($input_details['overtone']) && is_array($input_details['overtone'])) {
			for($r = 0; $r < count($input_details['overtone']); $r++) {
				$overtone.= '&overtone[]=' . ucfirst($input_details['overtone'][$r]) .'&';
			}
		}
		$overtone     = substr($overtone, 0, -1);
		if (!empty($overtone)) {
			$api_url .= $overtone;
		}
		//End//
		$intensity = '';
		if(isset($input_details['intensity']) && is_array($input_details['intensity'])) {
			for($r = 0; $r < count($input_details['intensity']); $r++) {
				$intensity.= '&intensity[]=' . ucfirst($input_details['intensity'][$r]) .'&';
			}
		}
		$intensity     = substr($intensity, 0, -1);
		if (!empty($intensity)) {
			$api_url .= $intensity;
		}
		//End//
		
		print_r($api_url);
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		$data['json_data']  = json_decode($json_response, true);
		$product_id = NULL;
		$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
		if($user_session){
			$user_id = $user_session['user_id'];
			$data['existing_wishlist']  = []; // Initialize as empty array before the loop
			if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
				foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
					// Assuming $diamond['discount'] is a percentage representing the discount
					$product_id = $diamond['stock_num'];
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
		$data['product_price']      = $this->purchase_price_model->get_purchase_price();
		$data['shippingwithtax']  	= $this->shipping_model->get_shippings();
		$data['view'] 		        = 'product';
		$data['show_top_navbar']    = true;
		$data['link']               = 'product';
		$data['title'] 		        = 'Lab Grown Diamond | Product';
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['countries']          = $this->location->getAllCountries();
		$data['discounts']          = $this->discount_model->get_discount();
		$data['getshipcountries']   = $this->location->getAllShipCountries();	
		$data['language']           = $this->location->getAllLanguage();	
		$this->template->load_site($data);
	}

	public function get_products_api() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://apiservices.vdbapp.com/v2/diamonds?type=Diamond&page_size=10',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 20,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}
	
	public function product_details() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://apiservices.vdbapp.com/v2/diamonds?type=Diamond&page_size=10',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 20,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$data['json_data']          = json_decode($response, true);	
		$data['view'] 		        = 'product';
		$data['show_top_navbar']    = true;
		$data['link']               = 'product';
		$data['script']  	        = 'product.js';
		$data['title'] 		        = 'Lab Grown Diamond | Product';
		$data['product_price']      = $this->purchase_price_model->get_purchase_price();
		$data['quality']            = $this->quality_model->get_quality();
		$data['priceranges']        = $this->price_range_model->get_price_range();
		$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
		$data['shapes']             = $this->shape_model->get_shapes();
		$data['colors']             = $this->color_model->get_color();
		$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
		$data['clarity']            = $this->clarity_model->get_clarity();
		$data['overtones']          = $this->overtone_model->get_overtone();
		$data['intensities']        = $this->intensity_model->get_intensity();
		$data['countries']          = $this->location->getAllCountries();
		$data['discounts']          = $this->discount_model->get_discount();
		$data['language']           = $this->location->getAllLanguage();
		$this->template->load_site($data);
	}

	public function get_product_form_view(){
		$product_id = $this->uri->segment(2);
		// Initialize cURL session
		$curl = curl_init();
		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://apiservices.vdbapp.com//v2/diamonds?type=Lab_grown_Diamond&stock_num='.$product_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 20,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
			),
		));
		// Execute cURL request and get response
		$response = curl_exec($curl);
		// Check for cURL errors
		if($response === false) {
			$error_message = curl_error($curl);
			// Handle the error appropriately, log or display the error message
			echo "cURL Error: " . $error_message;
		} else {
			// Decode JSON response
			$api_response = json_decode($response, true);
	
			// Check if JSON decoding was successful
			if($api_response === null) {
				// Handle JSON decoding error
				echo "Error decoding JSON response";
			} else {
				// Load the view with the API response data
				$data['api_response']       = $api_response;
				$data['view']               = 'product-view';
				$data['show_top_navbar']    = true;
				$data['link']               = 'product';
				$data['title']              = 'Lab Grown Diamond | Product View';
				$data['quality']            = $this->quality_model->get_quality();
				$data['priceranges']        = $this->price_range_model->get_price_range();
				$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
				$data['shapes']             = $this->shape_model->get_shapes();
				$data['colors']             = $this->color_model->get_color();
				$data['clarity']            = $this->clarity_model->get_clarity();
				$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
				$data['overtones']          = $this->overtone_model->get_overtone();
				$data['intensities']        = $this->intensity_model->get_intensity();
				$data['countries']          = $this->location->getAllCountries();
				$data['discounts']          = $this->discount_model->get_discount();
				$data['product_price']      = $this->purchase_price_model->get_purchase_price();
				$data['language']           = $this->location->getAllLanguage();
				$this->template->load_site($data);
			}
		}	
		// Close cURL session
		curl_close($curl);
	}

	public function hight_to_low_price(){
		$input_details = $this->input->get();
		// Initialize curl session
		$curl = curl_init();
		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://apiservices.vdbapp.com//v2/diamonds?type=Lab_grown_Diamond&',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 20,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
			),
		));
		// Execute cURL request and get response
		$response = curl_exec($curl);
		// Check for errors
		if ($response === false) {
			$error = curl_error($curl);
			echo "Error: $error";
		} else {
			// Parse JSON response
			$data = json_decode($response, true);
			if ($data === null) {
				echo "Error parsing JSON response.";
			} else {
				// Initialize array to store prices
				$prices = array();
	
				// Extract prices and diamonds
				if (isset($data['response']['body']['diamonds']) && !empty($data['response']['body']['diamonds'])) {
					foreach ($data['response']['body']['diamonds'] as $diamond) {
						// Assuming $diamond['total_sales_price'] is a string representing the price
						$price = $diamond['total_sales_price'];
						// Store price
						$prices[] = $price;
					}
				}
	
				// Sort prices from high to low
				// if(isset($input_details['price']) && $input_details['price'] == 'low_to_high') {
				// 	sort($prices);
				// } elseif(isset($input_details['price']) && $input_details['price'] == 'high_to_low') {
				// 	rsort($prices); // Default to high_to_low
				// }
				 // Sort prices based on input
				if(isset($input_details['price'])) {
					if ($input_details['price'] == 'low_to_high') {
						sort($prices);
					} elseif ($input_details['price'] == 'hight_to_low') {
						rsort($prices);
					} elseif ($input_details['price'] == 'custom_sorting_condition') {
						// Add custom sorting condition here
					} else {
						// Default sorting
						rsort($prices);
					}
				} else {
					// Default sorting
					rsort($prices);
				}
				// Initialize sorted data array
				$sortedData = array();
	
				// Rearrange original data based on sorted prices
				foreach ($prices as $price) {
					foreach ($data['response']['body']['diamonds'] as $diamond) {
						if ($diamond['total_sales_price'] === $price) {
							$sortedData[] = $diamond;
							break;
						}
					}
				}
				$product_id = NULL;
				$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
				if($user_session){
					$user_id = $user_session['user_id'];
					$data['existing_wishlist']  = []; // Initialize as empty array before the loop
					if (isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
						foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
							// Assuming $diamond['discount'] is a percentage representing the discount
							$product_id = $diamond['stock_num'];
							// echo "<pre>";print_r($product_id);
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
				$data['product_price']      = $this->purchase_price_model->get_purchase_price();
				$data['shippingwithtax']  	= $this->shipping_model->get_shippings();
				$data['api_response']       = $sortedData;
				$data['script']             = 'cart.js';
				$data['view'] 		        = 'product';
				$data['show_top_navbar']    = true;
				$data['link']               = 'product';
				$data['title'] 		        = 'LAB GROWN DIAMOND | PRODUCT';
				$data['quality']            = $this->quality_model->get_quality();
				$data['priceranges']        = $this->price_range_model->get_price_range();
				$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
				$data['shapes']             = $this->shape_model->get_shapes();
				$data['colors']             = $this->color_model->get_color();
				$data['clarity']            = $this->clarity_model->get_clarity();
				$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
				$data['overtones']          = $this->overtone_model->get_overtone();
				$data['intensities']        = $this->intensity_model->get_intensity();
				$data['countries']          = $this->location->getAllCountries();
				$data['discounts']          = $this->discount_model->get_discount();
				$data['language']           = $this->location->getAllLanguage();
				$this->template->load_site($data);
				// Print or process the sorted data
			// echo '<pre>';print_r($sortedData);
			}
		}
		// Close curl session
		curl_close($curl);
	}
	
	public function high_discount_first(){
		// Initialize curl session
		$curl = curl_init();
		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://apiservices.vdbapp.com//v2/diamonds?type=Lab_grown_Diamond&',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 20,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
			),
		));
		// Execute cURL request and get response
		$response = curl_exec($curl);
		// Check for errors
		if ($response === false) {
			$error = curl_error($curl);
			echo "Error: $error";
		} else {
			// Parse JSON response
			$data = json_decode($response, true);
			if ($data === null) {
				echo "Error parsing JSON response.";
			} else {
				// Initialize array to store discounts
				$discounts = array();
	
				// Extract discounts and diamonds
				if (isset($data['response']['body']['diamonds']) && !empty($data['response']['body']['diamonds'])) {
					foreach ($data['response']['body']['diamonds'] as $diamond) {
						// Assuming $diamond['discount'] is a percentage representing the discount
						$discount = $diamond['discount_percent'];
						// Store discount
						$discounts[] = $discount;
					}
				}
	
				// Sort discounts from high to low
				sort($discounts);
	
				// Initialize sorted data array
				$sortedData = array();
	
				// Rearrange original data based on sorted discounts
				foreach ($discounts as $discount) {
					foreach ($data['response']['body']['diamonds'] as $diamond) {
						if ($diamond['discount_percent'] === $discount) {
							$sortedData[] = $diamond;
							break;
						}
					}
				}
	
				// Pass sorted data to the view
				$data['api_response'] = $sortedData;
				$product_id = NULL;
				$user_session = ($this->session->userdata('user')) ? $this->session->userdata('user') : NULL;
				if($user_session){
					$user_id = $user_session['user_id'];
					$data['existing_wishlist']  = []; // Initialize as empty array before the loop
					if(isset($data['json_data']['response']['body']['diamonds']) && !empty($data['json_data']['response']['body']['diamonds'])) {
						foreach ($data['json_data']['response']['body']['diamonds'] as $index => $diamond) {
							// Assuming $diamond['discount'] is a percentage representing the discount
							$product_id = $diamond['stock_num'];
							// echo "<pre>";print_r($product_id);
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
				$data['product_price']      = $this->purchase_price_model->get_purchase_price();
				$data['shippingwithtax']  	= $this->shipping_model->get_shippings();
				$data['script']             = 'cart.js';
				$data['view'] 		        = 'product';
				$data['show_top_navbar']    = true;
				$data['link']               = 'product';
				$data['title'] 		        = 'LAB GROWN DIAMOND | PRODUCT';
				$data['quality']            = $this->quality_model->get_quality();
				$data['priceranges']        = $this->price_range_model->get_price_range();
				$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
				$data['shapes']             = $this->shape_model->get_shapes();
				$data['colors']             = $this->color_model->get_color();
				$data['clarity']            = $this->clarity_model->get_clarity();
				$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
				$data['overtones']          = $this->overtone_model->get_overtone();
				$data['intensities']        = $this->intensity_model->get_intensity();
				$data['countries']          = $this->location->getAllCountries();
				$data['discounts']          = $this->discount_model->get_discount();
				$data['language']           = $this->location->getAllLanguage();
				$this->template->load_site($data);
			}
		}
		// Close curl session
		curl_close($curl);
	}
	
    // public function product_details() {
	//  $data['show_top_navbar']    = true;
	//  $cust_product_url           =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// 	$product_id         = $this->uri->segment(2);
	// 	$data['product']    = $this->product_model->get_products($product_id);
	// 	$data['categories'] = $this->category_model->get_category();
	// 	$data['reviews']    = $this->review_model->get_review(false,$cust_product_url,'Y');
	// 	$data['view']       = 'product-details';
	// 	$data['script']  	= 'cart.js';
	// 	$this->template->load_site($data);
	// }

	public function get_admin_product_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			$data['categories']          = $this->category_model->get_category();
			$data['sub_categories']      = $this->sub_category_model->get_sub_categories();
			$data['sub_sub_categories']  = $this->sub_sub_category_model->get_sub_sub_categories();
			$data['product_measurement'] = $this->product_measure_model->get_measure();
			if(isset($inputData['product_id']) && !empty($inputData['product_id'])){
				$data['product'] 		 = $this->product_model->get_products($inputData['product_id']);
			}
			$view 		= $this->load->view('admin/product/product-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_product_details(){
		$input_details  = $this->input->post();
		$productData 	= array();
		$response 		= array();
		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('product_title', 'Product title', 'required');
	            $this->form_validation->set_rules('product_actual_price', 'Product price', 'required');
	            $this->form_validation->set_rules('product_description', 'Product description', 'required');
	            
	            $productData['product_code'] 			= strip_tags($input_details['product_code']);
	            $productData['product_title'] 			= strip_tags($input_details['product_title']);
    			$productData['product_category'] 		= strip_tags($input_details['product_category']);
				$productData['product_sub_category']    = strip_tags($input_details['product_sub_category']);
				$productData['product_sub_sub_category']= strip_tags($input_details['product_sub_sub_category']);
    			$productData['product_actual_price'] 	= strip_tags($input_details['product_actual_price']);
    			$productData['product_discount_price'] 	= strip_tags($input_details['product_discount_price']);
    			$productData['product_tags'] 	        = $input_details['product_tags'];
    			$productData['product_description'] 	= $input_details['product_description'];
    			$productData['product_weight'] 	        = $input_details['product_weight'];
    			$productData['product_measure'] 	    = $input_details['product_measure'];
    			$productData['product_optional'] 		= strip_tags($input_details['product_optional']);
	            $productData['display']					= 'Y';
				$productData['inserted_by']				= $user_id;
				$productData['inserted_on']				= date('Y-m-d H:i:s');
				$result = false;
	            if($this->form_validation->run() == true){

	            	if($_FILES && isset($_FILES['product_image']) && !empty($_FILES['product_image'])){
	            		$result 							= 	$this->upload_file($_FILES['product_image']);
  						if($result['state']){
  							$productData['original_file_name'] 	= $result['data']['orig_name'];
							$productData['system_file_name'] 	= $result['data']['file_name'];
							if(isset($input_details['product_id']) && !empty($input_details['product_id'])){
						        @unlink('./assets/uploads/products/'.$input_details['product_old_image']);
								$where = array('product_id' => $input_details['product_id']);
	            				$result = $this->product_model->update_record($productData, $where);
	                    	} else {
	            				$result = $this->product_model->save_record($productData);
	            			}
						}
					} else {
						if(isset($input_details['product_id']) && !empty($input_details['product_id'])){
							$where = array('product_id' => $input_details['product_id']);
            				$result = $this->product_model->update_record($productData, $where);
            			} else {
            				$result = $this->product_model->save_record($productData);
            			}	
					}
	                if($result){
	                	$message 	= (isset($input_details['product_id']) && !empty($input_details['product_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['category_id']) && !empty($input_details['category_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.' product.');
	                }
	            } else {
	                $response 	= array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'error','message'=>$this->form_validation->error_array());
	            }
	        }
	        echo json_encode($response);
	    } else {
	    	redirect('admin/login','refresh');	
	    }
	}

	function upload_file($file){
		$response = [];
		$config['image_library'] 		= 'gd2';
        $config['upload_path']          = './assets/uploads/products/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']         = TRUE;
        
       	$_FILES['images[]']['name']		= $file['name'];
		$_FILES['images[]']['type']		= $file['type'];
        $_FILES['images[]']['tmp_name']	= $file['tmp_name'];
        $_FILES['images[]']['error']	= $file['error'];
		$_FILES['images[]']['size']		= $file['size'];

        if(($config['upload_path'] !='') && (!file_exists($config['upload_path']))){
			mkdir($config['upload_path'], 0777, true);
		}
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images[]')){
            $response 	= array('state' => FALSE,'data' => null ,'msg' => strip_tags($this->upload->display_errors()));
        }else{
            $response	= array('state' => TRUE,'data' => $this->upload->data(),'error' => null);
        }
      	return $response;
	}

	public function get_products(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->product_model->get_products();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}
	
	
	public function get_permanent_product_page_list(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->product_model->get_permanent_product_page_list();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}
	
	

	public function delete_product(){
		$input_details = $this->input->post();
		if(isset($input_details['product_id']) && !empty($input_details['product_id'])){
	        @unlink('assets/uploads/products/'.$input_details['product_image']);
			$result 	= $this->product_model->delete($input_details['product_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);	
		}
	}

	public function set_product_display(){
		$input_details = $this->input->post();
		if(isset($input_details['product_id']) && !empty($input_details['product_id'])){
			$where = array('product_id' => $input_details['product_id']);
            $result = $this->product_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function upload_product_excel() {
		$config['upload_path']   = './assets/uploads/products/';
        $config['allowed_types'] = 'csv';
        $config['max_size']      = 1024; // 1MB max size

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('product_upload_excel')) {
            $upload_data = $this->upload->data();
			//print_r($upload_data);die;
            $csv_path = $upload_data['full_path'];

            // Load CSV library
            $this->load->library('csvreader');

            // Parse CSV file
			$data = $this->csvreader->parse_file($csv_path);
			// Remove the first column from each row
			//$this->upload_product_images();
			//array_shift($data);
			foreach ($data as &$row) {
				unset($row[0]);
			}
			$data = array_values($data);

            // Insert data into the database
			$result =  $this->product_model->insert_data($data);
			unlink($csv_path);
            // Display success message or redirect
			if($result){
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product Data uploaded successfully!','data'=>$result);
			}
			else{
				$response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
			}
			 echo json_encode($response);
        }
    }

	private function upload_product_images(){
		$config['upload_path']   = './asse4ts/uploads/products/images/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size']      = 2048; // 2MB max size (adjust as needed)
	
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('product_image')){
			// Handle success, you can get file info if needed
			$upload_data = $this->upload->data();
			// Process additional logic if required
		} else {
			// Handle failure
			echo $this->upload->display_errors();
		}
	}
	

 public function upload_permanent_landing_page_excel(){
	   //echo "<h2>Testtttt.....</h2>";
		$config['upload_path']   = './assets/uploads/permanent_landing_page_excel/';
        $config['allowed_types'] = 'csv';
        $config['max_size']      = 1024; // 1MB max size

        $this->load->library('upload', $config);
        
		
		
        if ($this->upload->do_upload('product_upload_excel')){
            $upload_data = $this->upload->data();
			//print_r($upload_data);die;
            $csv_path = $upload_data['full_path'];

			$response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		    echo json_encode($response);
			
            // Load CSV library
            $this->load->library('CSVReader');

            // Parse CSV file
			$data = $this->csvreader->parse_file($csv_path);
			// Remove the first column from each row
			//$this->upload_product_images();
			//array_shift($data);
			foreach($data as &$row){
				unset($row[0]);
			}
			$data = array_values($data);
            //print_r($data);
            // Insert data into the database
			$result =  $this->product_model->permanent_landing_page_insert_data($data);
			//unlink($csv_path);
            // Display success message or redirect
		/*	if($result){
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product Data uploaded successfully!','data'=>$result);
			}
			else{
				$response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
			}
		*/	
			echo json_encode($result);
			 
        }
    }
	
/********************************** Upload city page ****************************************** */

 public function upload_permanent_city_page_excel(){
	   //echo "<h2>Testtttt.....</h2>";
		$config['upload_path']   = './assets/uploads/permanent_city_page_excel/';
        $config['allowed_types'] = 'csv';
        $config['max_size']      = 1024; // 1MB max size

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('product_upload_excel')){
            $upload_data = $this->upload->data();
			//print_r($upload_data);die;
            $csv_path = $upload_data['full_path'];

            // Load CSV library
            $this->load->library('CSVReader');

            // Parse CSV file
			$data = $this->csvreader->parse_file($csv_path);
			// Remove the first column from each row
			//$this->upload_product_images();
			//array_shift($data);
			foreach($data as &$row){
				unset($row[0]);
			}
			$data = array_values($data);
            //print_r($data);
            // Insert data into the database
			$result =  $this->product_model->permanent_city_page_insert_data($data);
			//unlink($csv_path);
            // Display success message or redirect
			if($result){
				$response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product Data uploaded successfully!','data'=>$result);
			}
			else{
				$response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
			}
			echo json_encode($result);
			 
        }
    }

	
	
	
  
     	
	public function upload_permanent_product_page_excel() {
		$config['upload_path']   = './assets/uploads/permanent_jewellary_product_page_excel/';
		$config['allowed_types'] = 'csv';
		$config['max_size']      = 1024; // 1MB max size
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('product_upload_excel')) {
			$error = $this->upload->display_errors();
			echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'Upload Error: ' . $error]);
			return;
		}
	
		$upload_data = $this->upload->data();
		$csv_path = $upload_data['full_path'];
	
		// Load CSV library
		$this->load->library('CSVReader');
	
		// Check if CSVReader library is loaded
		if (!class_exists('CSVReader')) {
			echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'CSVReader library is not loaded.']);
			return;
		}
	
		// Parse CSV file
		$data = $this->csvreader->parse_file($csv_path);
	
		if ($data === FALSE) {
			echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'Failed to parse CSV file.']);
			return;
		}
	
		// Debugging: Output the raw data
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die();
	
		// Assuming the first row contains headers
		$headers = array_shift($data);
	
		// Remove the first column from each row
		foreach ($data as &$row) {
			unset($row[0]); // Remove the first column
		}
		$data = array_values($data);
	
		// Insert data into the database
		$result = $this->product_model->permanent_product_page_insert_data($data);
	
		if ($result === FALSE) {
			echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'Database insert failed.']);
			return;
		}
	
		echo json_encode(['state' => TRUE, 'type' => 'success', 'message' => 'Product data uploaded successfully!', 'data' => $result]);
	}

	public function get_jewellary_product_page_details($product_id, $sku) {
		// Construct the parent_image_SKU_ID
		$parent_image_SKU_ID = $product_id . '/' . $sku;
	
		// Fetch details from the model
		$jewellary_product_page_details = $this->product_model->get_jewellary_product_page_details($parent_image_SKU_ID);
	
		// Check if details were found
		if ($jewellary_product_page_details) {
			// Start the table output
			echo "<table border='1'>";
			
			// Display the data
			for ($i = 1; $i <= count($jewellary_product_page_details); $i++) {
				//echo '<pre>'; print_r($jewellary_product_page_details);
				$detail = $jewellary_product_page_details[$i - 1];
				$href = base_url() . $detail['our_URL'];
				echo "<tr>";
				echo "<td>URL - $i</td>";
				echo "<td>".$href."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$href."' target='_blank'>View</a>&nbsp;&nbsp;&nbsp;</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No details found for the given ID.";
		}
	}	
	
	
	
 public function permanant_laning_page(){
	 
	   $url = parse_url($_SERVER['REQUEST_URI']);
	  // print_r($url);
	   $landingUrl = $url['path'];
       //parse_str($url['query'], $params);
	   
	   $last  = $this->uri->total_segments();
	   $pageAtr = $this->uri->segment($last);
	   //echo "Landing Page-".$pageAtr."<br/>";
	   
	     
	   $LandingPageresult =  $this->product_model->getPermanentLandingPageDetails($pageAtr);
	  // print_r($LandingPageresult); 
	  // echo "</br><br/>";
	   $LandingPageBlocks = $this->product_model->getPermanentLandingPageBlocksDetails($pageAtr);
	   //print_r($LandingPageBlocks);
	   //echo $this->db->last_query();
  
  /* ********************************************************************************************** */
      $api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		 
	  foreach($LandingPageBlocks as $landingPageBlock){ 	 
		 if($landingPageBlock['permanent_landing_page_block_filter1_lbl']=="size_from")
			$api_url .= '&size_from=' . urlencode($landingPageBlock['permanent_landing_page_block_filter1']) .'&size_to='. urlencode($landingPageBlock['permanent_landing_page_block_filter2']);
		  
		if($landingPageBlock['permanent_landing_page_block_filter3_lbl']!="")
			$api_url .= '&'.$landingPageBlock['permanent_landing_page_block_filter3_lbl'].'=' . ucfirst($landingPageBlock['permanent_landing_page_block_filter3']) ;
		
		
		if($landingPageBlock['permanent_landing_page_block_filter4_lbl']!="")
			$api_url .= '&'.$landingPageBlock['permanent_landing_page_block_filter4_lbl'].'=' . ucfirst($landingPageBlock['permanent_landing_page_block_filter4']) ;
		
		
		if($landingPageBlock['permanent_landing_page_block_filter5_lbl']!="")
			$api_url .= '&'.$landingPageBlock['permanent_landing_page_block_filter5_lbl'].'=' . ucfirst($landingPageBlock['permanent_landing_page_block_filter5']) ;
		
		if($landingPageBlock['permanent_landing_page_block_filter6_lbl']!="")
			$api_url .= '&'.$landingPageBlock['permanent_landing_page_block_filter6_lbl'].'=' . ucfirst($landingPageBlock['permanent_landing_page_block_filter6']) ;
		
		//die;
	// echo "kkkkkk";
	//	print_r($api_url);
        
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => $landingPageBlock['permanent_landing_page_block_max_products'],
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		//$data['json_data']  = json_decode($json_response, true);
		$api_response[$landingPageBlock['permanent_landing_page block_id']] = json_decode($json_response, true);
	  }//end blocks for 
	  
	 // print_r($api_response);
	  
  /* ********************************************************************************************** */ 
            $data['LandingPageBlocks'] = $LandingPageBlocks;
            $data['landingPage_block_data'] = $api_response;
			$data['product_price']      = $this->purchase_price_model->get_purchase_price();
			$data['shippingwithtax']  	= $this->shipping_model->get_shippings();	
			$data['view'] 		        = 'permanent_landingt-view';
			$data['show_top_navbar']    = true;
			$data['link']               = 'product';
			$data['title'] 		        = 'Lab Grown Diamond | Product';
			$data['script']  	        = 'wishlist.js';
			$data['quality']            = $this->quality_model->get_quality();
			$data['priceranges']        = $this->price_range_model->get_price_range();
			$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
			$data['shapes']             = $this->shape_model->get_shapes();
			$data['colors']             = $this->color_model->get_color();
			$data['clarity']            = $this->clarity_model->get_clarity();
			$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
			$data['overtones']          = $this->overtone_model->get_overtone();
			$data['intensities']        = $this->intensity_model->get_intensity();
			$data['countries']          = $this->location->getAllCountries();
		    $data['getshipcountries']   = $this->location->getAllShipCountries();		
			$data['discounts']          = $this->discount_model->get_discount();
			$data['language']           = $this->location->getAllLanguage();
			$this->template->load_site($data);
	}
	
	
	public function get_permanent_landing_page_list(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->product_model->get_permanent_landing_page_list();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}
	
	
	public function permanant_city_page(){
	 
	  echo "City page....";
	   $url = parse_url($_SERVER['REQUEST_URI']);
	  // print_r($url);
	   $landingUrl = $url['path'];
       //parse_str($url['query'], $params);
	   
	   $last  = $this->uri->total_segments() ;
	   $pageAtr = $this->uri->segment($last);
	   
	  // $pageAtr = ltrim($landingUrl, '/');
	  // echo "<br/>Landing Page-".ltrim($landingUrl, '/')."||".base_url()."<br/>";
	  // echo "Total-". count($this->uri->segment_array())."<br/>";
	     
	   $CityPageresult =  $this->product_model->getPermanentCityPageDetails($pageAtr);
	   //print_r($LandingPageresult); 
	  // echo "</br><br  
	   $CityPageBlocks = $this->product_model->getPermanentCityPageBlocksDetails($pageAtr);
	 //  print_r($CityPageBlocks);
	   //echo $this->db->last_query();
  
  /* ********************************************************************************************** */
      $api_url = 'https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&';
		 
	  foreach($CityPageBlocks as $cityPageBlock){ 	 
		 if($cityPageBlock['permanent_city_page_block_filter1_lbl']=="size_from")
			$api_url .= '&size_from=' . urlencode($cityPageBlock['permanent_city_page_block_filter1']) .'&size_to='. urlencode($cityPageBlock['permanent_city_page_block_filter2']);
		  
		if($cityPageBlock['permanent_city_page_block_filter3_lbl']!="")
			$api_url .= '&'.$cityPageBlock['permanent_city_page_block_filter3_lbl'].'=' . ucfirst($cityPageBlock['permanent_city_page_block_filter3']) ;
		
		
		if($cityPageBlock['permanent_city_page_block_filter4_lbl']!="")
			$api_url .= '&'.$cityPageBlock['permanent_city_page_block_filter4_lbl'].'=' . ucfirst($cityPageBlock['permanent_city_page_block_filter4']) ;
		
		
		if($cityPageBlock['permanent_city_page_block_filter5_lbl']!="")
			$api_url .= '&'.$cityPageBlock['permanent_city_page_block_filter5_lbl'].'=' . ucfirst($cityPageBlock['permanent_city_page_block_filter5']) ;
		
		if($cityPageBlock['permanent_city_page_block_filter6_lbl']!="")
			$api_url .= '&'.$cityPageBlock['permanent_city_page_block_filter6_lbl'].'=' . ucfirst($cityPageBlock['permanent_city_page_block_filter6']) ;
		
		//die;
	// echo "kkkkkk";
	//	print_r($api_url);
        
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$api_url,	
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => $cityPageBlock['permanent_city_page_block_max_products'],
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA'
		),
		));  
		$json_response = curl_exec($curl);
		curl_close($curl);
		//$data['json_data']  = json_decode($json_response, true);
		$api_response[$cityPageBlock['permanent_city_page block_id']] = json_decode($json_response, true);
	  }//end blocks for 
	  
	 // print_r($api_response);
	  
  /* ********************************************************************************************** */ 
            $data['LandingPageBlocks'] = $CityPageBlocks;
            $data['landingPage_block_data'] = $api_response;
			$data['product_price']      = $this->purchase_price_model->get_purchase_price();
			$data['shippingwithtax']  	= $this->shipping_model->get_shippings();	
			$data['view'] 		        = 'permanent_city-view';
			$data['show_top_navbar']    = true;
			$data['link']               = 'product';
			$data['title'] 		        = 'Lab Grown Diamond | Product';
			
			$data['metatitle'] 		    = 'Lab Grown Diamond | Product';
			$data['metadetails'] 		= 'Lab Grown Diamond | Product';
			$data['keyword'] 		    = 'Lab Grown Diamond | Product';
			
			$data['script']  	        = 'wishlist.js';
			$data['quality']            = $this->quality_model->get_quality();
			$data['priceranges']        = $this->price_range_model->get_price_range();
			$data['caratweight']        = $this->carat_weight_model->get_carat_weight();
			$data['shapes']             = $this->shape_model->get_shapes();
			$data['colors']             = $this->color_model->get_color();
			$data['clarity']            = $this->clarity_model->get_clarity();
			$data['fancycolors']        = $this->fancy_color_model->get_fancy_color();
			$data['overtones']          = $this->overtone_model->get_overtone();
			$data['intensities']        = $this->intensity_model->get_intensity();
			$data['countries']          = $this->location->getAllCountries();
		    $data['getshipcountries']   = $this->location->getAllShipCountries();		
			$data['discounts']          = $this->discount_model->get_discount();
			$data['language']           = $this->location->getAllLanguage();
			$this->template->load_site($data);
	}
	
}
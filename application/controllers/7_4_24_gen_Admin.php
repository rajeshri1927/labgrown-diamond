<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
	}

	public function index() {
		$this->home();
	}
	
	public function home() {
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$this->load->model('Order_model', 'order_model');
				$data['order_count'] 		= $this->order_model->get_count('orders');
				$data['product_count'] 		= $this->order_model->get_count('products');
				$data['view'] 				= 'admin/home';
				$data['title'] 				= 'Admin | Dashboard';
				$this->template->load_admin($data);
			} else {
				$this->login();
			}
		} else {
			$this->login();
		}
		
	}

	public function login() {
		$data['view'] 				= 'admin/login.html';
		$data['title'] 				= 'Admin | Login';
		$data['script']				= 'auth.js';
		$this->template->load_admin($data);
	}

	public function registration() {
		$data['view'] 				= 'admin/registration.html';
		$data['title'] 				= 'Admin | Registration';
		$data['script']				= 'auth.js';
		$this->template->load_admin($data);
	}

	public function forgot_password() {
		$data['view'] 				= 'admin/forgot-password.html';
		$data['title'] 				= 'Admin | Forgot Password';
		$data['script']				= 'auth.js';
		$this->template->load_admin($data);
	}
    
    public function validate_forgot_password_link($validateArray){
		$response 	= array();
		$curDate 	= date("Y-m-d H:i:s");
		$key 		= md5($validateArray['email']);
   		$key 		= md5($key);

   		$validateEmail = $this->auth_model->mail_exists($validateArray['email']);
   		if($validateEmail){
   			if($validateArray['key'] === $key){
   				$response 	= array('state'=>TRUE,'heading'=>'','type'=>'success','message'=>'');
   			} else {
   				$response 	= array('state'=>FALSE,'heading'=>'Invalid Details!','type'=>'error','message'=>'Link is expired.');
   			}
   		} else {
   			$response 	= array('state'=>FALSE,'heading'=>'Invalid Details!','type'=>'error','message'=>'Link is expired.');
   		}
   		return $response;
	}

	public function reset_password_view() {
		$validateUser  		= $this->input->get();
		$data 				= array();
		$data 				= $this->validate_forgot_password_link($validateUser); 
		$data['view'] 		= 'admin/reset-password';
		$data['title'] 		= 'Admin | Reset Password';
		$data['script']  	= 'auth.js';
		$data['email']  	= $validateUser['email'];
		$this->template->load_admin($data);
	}
	
	public function reset_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/change-password';
			$data['script'] = 'auth.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}
	
	public function coupon_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/coupon/coupon';
			$data['script'] = 'coupon.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}
	
	public function quality_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/quality/quality';
			$data['script'] = 'quality.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function price_range_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/pricerange/pricerange';
			$data['script'] = 'pricerange.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function carat_weight_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/caratweight/caratweight';
			$data['script'] = 'caratweight.js';
			$this->template->load_admin($data);
		}else{
			redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function shape_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/shape/shape';
			$data['script'] = 'shape.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function color_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/color/color';
			$data['script'] = 'color.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function clarity_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/clarity/clarity';
			$data['script'] = 'clarity.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function fancy_color_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/fancycolor/fancycolor';
			$data['script'] = 'fancycolor.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function overtone_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/overtone/overtone';
			$data['script'] = 'overtone.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function intensity_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/Intensity/intensity';
			$data['script'] = 'intensity.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function shipping_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/shipping/shipping';
			$data['script'] = 'shipping.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}
	
	public function discount_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/discount/discount';
			$data['script'] = 'discount.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function offer_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/offer/offer';
			$data['script'] = 'offer.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function purchase_price_view(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/purchaseprice/price';
			$data['script'] = 'purchaseprice.js';
			$this->template->load_admin($data);
		}else{
				redirect(base_url().'login');
			}
		} else {
			   redirect(base_url().'login');
		}
	}

	public function products() {
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 	    = 'admin/product/product';
				$data['title'] 		= 'Admin | Products';
				$data['script']		= 'product.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	public function permanent_product_page(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 	    = 'admin/product/permanent_product_pages';
				$data['title'] 		= 'Admin | Permanent Product Page';
				$data['script']		= 'permanent_product_page.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	public function permanent_landing_page(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE){
				$data['view'] 	    = 'admin/product/permanent_landing_pages';
				$data['title'] 		= 'Admin | Permanent Landing Page';
				$data['script']		= 'permanent_landing_page.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	
	public function permanent_city_page(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE){
				$data['view'] 	    = 'admin/product/permanent_city_pages';
				$data['title'] 		= 'Admin | Permanent City Page';
				$data['script']		= 'permanent_city_page.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		   } else {
			redirect(base_url().'admin/login');
		   }
	}
	
	

	public function orders() {
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 				= 'admin/order/order';
				$data['title'] 				= 'Admin | Orders';
				$data['script']				= 'order.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	public function enquiry_view(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 				= 'admin/enquiry/enquiry';
				$data['title'] 				= 'Admin | Enquiry';
				$data['script']				= 'enquiry.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	public function review(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/review/review';
			$data['script'] = 'review.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function role(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/role/role';
			$data['script'] = 'role.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function subadmin(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/subadmin/subadmin';
			$data['script'] = 'subadmin.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function b2a(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/b2a/b2a';
			$data['script'] = 'b2a.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function b2c(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/b2c/b2c';
			$data['script'] = 'b2c.js';
			$this->template->load_admin($data);
		} else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function sub_category(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/subcategory/sub-category';
			$data['script'] = 'subcategory.js';
			$this->template->load_admin($data);
		} else {
			redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}

	public function sub_sub_category(){
	    $admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
			$data['view']   = 'admin/subsubcategory/sub-sub- ';
			$data['script'] = 'subsubcategory.js';
			$this->template->load_admin($data);
		    } else {
				redirect(base_url().'login');
			}
		} else {
			redirect(base_url().'login');
		}
	}    

	// public function products_measures(){
	//     $admin_session = $this->session->userdata('admin');
	// 	if(isset($admin_session) && !empty($admin_session)){
	// 		if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
	// 		$data['view']   = 'admin/measure/measure';
	// 		$data['script'] = 'measure.js';
	// 		$this->template->load_admin($data);
	// 	} else {
	// 			redirect(base_url().'login');
	// 		}
	// 	} else {
	// 		redirect(base_url().'login');
	// 	}
	// }
}
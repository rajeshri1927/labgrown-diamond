<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] 				               = 'welcome';
$route['get-products-api']                 = 'Product/get_products_api';
$route['get-products-get-shape']           = 'Product/get_product_shape_by_filter';
$route['get-products-quick-filter']        = 'Product/get_products_quick_filter_api';
/******************  ggg ********************/
$route['quick-search/white-LG-diamonds']        = 'Product/get_products_quick_filter_api';

require_once(BASEPATH .'database/DB.php');
$db =&DB();

$resultPermanentLaningPage =  $db->get('tbl_permanent_landing_pages')->result_array();
 foreach($resultPermanentLaningPage as $PermanentLaningPage ){
    $landing_url = $PermanentLaningPage['permanent_landing_page_url']."/".$PermanentLaningPage['permanent_landing_page_id'];
	//$landing_url = $PermanentLaningPage['permanent_landing_page_url'];
	$route[$landing_url]  = 'Product/permanant_laning_page/';
 }
 
$resultPermanentCityPage =  $db->get('tbl_permanent_city_pages')->result_array();
 foreach($resultPermanentCityPage as $PermanentCityPage ){
    $cityLanding_url = $PermanentCityPage['permanent_city_page_url']."/".$PermanentCityPage['permanent_city_page_id'];
	//$landing_url = $PermanentLaningPage['permanent_landing_page_url'];
	$route[$cityLanding_url]  = 'Product/permanant_city_page/';
 } 
 

$resultPermanentProductPage =  $db->get('tbl_permanent_product_page')->result_array();
foreach( $resultPermanentProductPage as $PermanentProductPage ){
	 
	//echo $PermanentProductPage['permanent_product_page_limit']."<br/>";
	for($r=001;$r<=$PermanentProductPage['permanent_product_page_limit']; $r++){
		$url = $PermanentProductPage['permanent_product_page_url']."/".$PermanentProductPage['permanent_product_page_Id']."-".sprintf('%03d',$r);
		//echo "<r/>Url-". $url ."<br/>";
		$route[$url]      = 'Product/permanent_product_page/'.sprintf('%03d',$r);
	}
}


$resultPriceRange =  $db->get('tbl_price_range')->result_array();
foreach( $resultPriceRange as $resultPriceRange ){
	$url = "stone-price-range"."/".$resultPriceRange['price_range'];
	//echo "<r/>Url-". $url ."<br/>";
	$route[$url]      = 'Permanentpages/stone_catalogue/';
}
//echo "<br/><br/>";
$resultShapes =  $db->get('tbl_shapes')->result_array();
foreach( $resultShapes as $resultShape ){
	$url = "stone-shape/".$resultShape['shape_name'];
	//echo "Url-". $url ."<br/>"; 
	$route[$url]      = 'Permanentpages/stone_catalogue/';
}

//echo "<br/><br/>";
$resultQualities =  $db->get('tbl_quality')->result_array();
foreach( $resultQualities as $resultQuality ){
	$url = "available-stone-quality"."/".$resultQuality['quality_name']."/color-".$resultQuality['quality_color_from']."-".$resultQuality['quality_color_to']."/clarity-".$resultQuality['quality_clarity_from']."-".$resultQuality['quality_clarity_to'];
	//echo "<r/>Url-". $url ."<br/>";
	$route[$url]      = 'Permanentpages/stone_catalogue/';
}

$route['loadMoreData'] = "Permanentpages/loadMoreData/";

$route['get-permanent-landingpageConfig-list'] 			= 'product/permanant_laning_page_config';
$route['get_permanent_landing_page_list'] 		= 'product/get_permanent_landing_page_list';

$route['admin/permanent-product-page'] 			= 'admin/permanent_product_page';

$route['admin/permanent-landing-page-config'] 		= 'admin/permanent_landing_page_config';
$route['admin/permanent-landing-page'] 			= 'admin/permanent_landing_page';
$route['admin/permanent-landing-page-blockList/:num'] 	= 'admin/permanent-landing-page-blockList/$1';

$route['admin/permanent-city-page'] 			= 'admin/permanent_city_page';
$route['admin/permanent-city-page-blockList/:num'] 	= 'admin/permanent-landing-page-blockList/$1';

$route['upload-Permanent-Product-Page-excel'] 		= 'product/upload_permanent_product_page_excel';

$route['upload-Permanent-landing-Page-excel'] 		= 'product/upload_permanent_landing_page_excel';

$route['upload-Permanent-city-Page-excel'] 		= 'product/upload_permanent_city_page_excel';

$route['get_permanent_product_page_list'] 				= 'product/get_permanent_product_page_list';

$route['get_permanent_product_page_details/:num'] 				= 'product/get_permanent_product_page_details/$1';


$route['admin/rapaport'] 		= 'admin/rapaport';
$route['get_rapaport_page_list']= 'admin/get_rapaport_page_list'; 
$route['upload-rapaport-rate-excel'] 		= 'admin/upload_rapaport_rate_excel';        
		 
$route['admin/clear-rapaport-rate'] = 'admin/clear_rapaport_rate';		 
         
/*** ************end ggg *************************** */

$route['get-products-advance-filter']      = 'Product/get_products_advance_filter_api';
$route['get-products-advance-filter-data'] = 'Product/get_products_advance_filter_data';
$route['get-products-fancy-color-filter-api'] = 'Product/get_products_fancy_color_filter_api';
$route['get-hight-to-low-price']              = 'Product/hight_to_low_price';
$route['get-hight-discount-first']            = 'Product/high_discount_first';

$route['products-filter']       = 'Product/product_filter';
$route['products']              = 'Product/product_details';
$route['product-view/(:any)']   = 'Product/get_product_form_view/$1';


$route['about-us'] 			    = 'welcome/about_us_view';
// $route['ayurveda'] 			= 'welcome/ayurveda_view';
// $route['distributors'] 		= 'welcome/distributors_view';
// $route['director-profile'] 	= 'welcome/director_profile_view';
// $route['category/:num'] 	    = 'welcome/category_view/$1';
$route['cart-view'] 		    = 'welcome/cart_view';
$route['cart-checkout'] 	    = 'welcome/checkout_view';
$route['contact-us'] 		    = 'welcome/contact_us_view';
$route['login'] 			    = 'welcome/login_view'; //'welcome';
// $route['registration'] 		= 'welcome/registration_view';
// $route['forgot-password'] 	= 'welcome/forgot_password_view';
// $route['profile'] 			= 'welcome/profile_view';
// $route['get-profile-view'] 	= 'welcome/get_profile_view';
// $route['get-order-view'] 	= 'welcome/get_order_view';
$route['get-states']         = 'welcome/get_states';
$route['get-cities']	        = 'welcome/get_cities';
// $route['faq-view']	        = 'welcome/faq_view';
// $route['terms-and-conditions'] = 'welcome/terms_and_conditions_view';
// $route['privacy-policy']       = 'welcome/privacy_policy_view';
$route['return-policy']           = 'welcome/return_policy_view';
// $route['cancellation-policy']  = 'welcome/cancellation_policy_view';
$route['shipping-policy']         = 'welcome/shipping_policy_view';
// $route['set-review-details']   = 'welcome/set_review_details';
$route['wishlist']                  = 'welcome/wishlist_view';
$route['delete-checkout-item']      = 'Cart/delete_checkout_item';
// $route['cust-order-history']     = 'welcome/cust_order_history_view';
$route['change-password'] 		    = 'welcome/reset_view';
$route['reset_password'] 	        = 'authentication/reset_password';
$route['reset-password'] 	        = 'authentication/reset_password_view';
$route['send-reset-password-link'] 	= 'authentication/reset_password_link';
$route['reset-new-password'] 		= 'authentication/reset_new_password';
$route['get-user-form-view'] 		= 'authentication/get_user_form_view';


$route['set-product-in-cart'] 		= 'cart/set_product_in_cart';
$route['get-cart-items'] 			= 'cart/get_cart_items';
$route['update-cart-item'] 			= 'cart/update_cart_item';
$route['delete-cart-item'] 			= 'cart/delete_cart_item';
$route['get-coupon-code']           = 'cart/get_coupon_code';
$route['get-wishlist-items']        = 'cart/get_wishlist_item';
$route['set-wish-list']             = 'cart/set_wish_list';
$route['delete-wishlist-item']      = 'cart/delete_wishlist_item';
$route['get-cust-order-history']    = 'order/get_cust_order_history';

// $route['set-amount-shipping'] 	   = 'cart/set_amount_shipping_in_session';
// $route['proceed-to-order'] 		   = 'cart/proceed_to_order';
// $route['email-view'] 			   = 'cart/email_view';
// $route['submit-enquiry-form'] 	   = 'cart/submit_enquiry';

// $route['atom-payment']              = 'cart/atom_payment';
// $route['atom-payment-response']     = 'cart/atom_payment_response';

// $route['invoice-pdf/:num']		   = 'cart/generate_order_pdf';
// $route['invoice-email']		       = 'cart/invoice_email';
// $route['generate-invoice-pdf']      = 'cart/generate_invoice_pdf';
// $route['payment-success']           = 'cart/payment_success';
// $route['payment-cancel']            = 'cart/payment_cancel';
// $route['payment-failed']            = 'cart/payment_failed';
//Admin panel Route Here//
//Admin Login,Registration,forgot password,chnage password //
$route['admin'] 					   = 'admin';
$route['admin/home'] 				= 'admin/home';
$route['admin/login'] 				= 'admin/login';
$route['admin/registration'] 		= 'admin/registration';
$route['admin/forgot-password'] 	= 'admin/forgot_password';
$route['admin/products'] 			= 'admin/products';
$route['admin/orders'] 				= 'admin/orders';
$route['admin/product-categories'] 	= 'Category/product_categories_view';
$route['admin/reset-password'] 	    = 'admin/reset_password_view';
$route['admin/change-password']     = 'admin/reset_view';
$route['set-user-details'] 			= 'authentication/set_user_details';
$route['authenticate-user'] 		= 'authentication/authenticate_user';
$route['logout'] 					= 'authentication/set_logout';


//Product Add, delete,update,view //
$route['product-details/:num']	   = 'product/product_details/$1';
$route['get-product-form-view'] 	   = 'product/get_admin_product_form_view';
$route['set-product-details'] 		= 'product/set_product_details';
$route['get-products'] 				   = 'product/get_products';
$route['delete-product'] 			   = 'product/delete_product';
$route['set-product-display'] 		= 'product/set_product_display';
$route['upload-product-excel'] 		= 'product/upload_product_excel';


//Order delete,update,view //
$route['get-orders'] 				   = 'order/get_orders';
$route['get-ordered-products'] 		= 'order/get_ordered_products';
$route['get-order-invoice'] 		   = 'order/get_order_invoice_view';
$route['generate-order-pdf/:num'] 	= 'order/generate_order_pdf/$1';

//Product-category Add,delete,update,view //
$route['set-product-category']   = 'Category/set_product_category';
$route['get-categories'] 			= 'Category/get_categories';
$route['get-category'] 				= 'Category/get_category';
$route['delete-category'] 			= 'Category/delete_category';

//Product-coupon add,delete,update,view //
$route['admin/coupon'] 		        = 'admin/coupon_view';
$route['set-coupon-details'] 		= 'Coupon/set_coupon_details';
$route['get-coupon-form-view'] 	    = 'Coupon/get_coupon_form_view';
$route['get-coupon'] 	            = 'Coupon/get_coupon';
$route['set-coupon-display'] 		= 'Coupon/set_coupon_display';
$route['delete-coupon'] 			= 'Coupon/delete_coupon';

//Product-quality add,delete,update,view //
$route['admin/quality'] 		    = 'admin/quality_view';
$route['set-quality-details'] 		= 'Quality/set_quality_details';
$route['get-quality-form-view'] 	= 'Quality/get_quality_form_view';
$route['get-quality'] 	            = 'Quality/get_quality';
$route['set-quality-display'] 	    = 'Quality/set_quality_display';
$route['delete-quality']            = 'Quality/delete_quality';

//Product-Price-Range add,delete,update,view //
$route['admin/price-range'] 		= 'admin/price_range_view';
$route['set-price-range-details'] 	= 'PriceRange/set_price_range_details';
$route['get-price-range-form-view'] = 'PriceRange/get_price_range_form_view';
$route['get-price-range'] 	        = 'PriceRange/get_price_range';
$route['delete-price-range']        = 'PriceRange/delete_price_range';
$route['set-price-range-display'] 	= 'PriceRange/set_price_range_display';

//Product-Carat Weight add,delete,update,view //
$route['admin/carat-weight'] 	      = 'admin/carat_weight_view';
$route['set-carat-weight-details']    = 'CaratWeight/set_carat_weight_details';
$route['get-carat-weight-form-view']  = 'CaratWeight/get_carat_weight_form_view';
$route['get-carat-weight'] 	          = 'CaratWeight/get_carat_weight';
$route['delete-carat-weight']         = 'CaratWeight/delete_carat_weight';
$route['set-carat-weight-display']    = 'CaratWeight/set_carat_weight_display';

//Product-Shape add,delete,update,view //
$route['admin/shape'] 	              = 'admin/shape_view';
$route['set-shape-details']           = 'Shape/set_shape_details';
$route['get-shape-form-view']         = 'Shape/get_admin_shape_form_view';
$route['get-shape'] 	              = 'Shape/get_shapes';
$route['delete-shape']                = 'Shape/delete_shape';
$route['set-shape-display']           = 'Shape/set_shape_display';

//Product-Shape add,delete,update,view //
$route['admin/color'] 	              = 'admin/color_view';
$route['set-color-details']           = 'Color/set_color_details';
$route['get-color-form-view']         = 'Color/get_admin_color_form_view';
$route['get-color'] 	              = 'Color/get_color';
$route['delete-color']                = 'Color/delete_color';
$route['set-color-display']           = 'Color/set_color_display';

//Clarity add,delete,update,view //
$route['admin/clarity'] 	          = 'admin/clarity_view';
$route['set-clarity-details']         = 'Clarity/set_clarity_details';
$route['get-clarity-form-view']       = 'Clarity/get_admin_clarity_form_view';
$route['get-clarity'] 	              = 'Clarity/get_clarity';
$route['delete-clarity']              = 'Clarity/delete_clarity';
$route['set-clarity-display']         = 'Clarity/set_clarity_display';

//Product-Fancy-Color add,delete,update,view //
$route['admin/fancycolor'] 	        = 'admin/fancy_color_view';
$route['set-fancy-color-details']   = 'FancyColor/set_fancy_color_details';
$route['get-fancy-color-form-view'] = 'FancyColor/get_admin_fancy_color_form_view';
$route['get-fancy-color'] 	        = 'FancyColor/get_fancy_color';
$route['delete-fancy-color']        = 'FancyColor/delete_fancy_color';
$route['set-fancy-color-display']   = 'FancyColor/set_fancy_color_display';

//Product-Overtone add,delete,update,view //
$route['admin/overtone'] 	        = 'admin/overtone_view';
$route['set-overtone-details']      = 'Overtone/set_overtone_details';
$route['get-overtone-form-view']    = 'Overtone/get_admin_overtone_form_view';
$route['get-overtones'] 	        = 'Overtone/get_overtones';
$route['get-overtone'] 	            = 'Overtone/get_overtone';
$route['delete-overtone']           = 'Overtone/delete_overtone';
$route['set-overtone-display']      = 'Overtone/set_overtone_display';

//Product-intensity add,delete,update,view //
$route['admin/intensity'] 	        = 'admin/intensity_view';
$route['set-intensity-details']     = 'Intensity/set_intensity_details';
$route['get-intensity-form-view']   = 'Intensity/get_admin_intensity_form_view';
$route['get-intensities'] 	        = 'Intensity/get_intensities';
$route['get-intensity'] 	        = 'Intensity/get_intensity';
$route['delete-intensity']          = 'Intensity/delete_intensity';
$route['set-intensity-display']     = 'Intensity/set_intensity_display';

//Product-shipping add,delete,update,view //
$route['admin/shipping'] 	        = 'admin/shipping_view';
$route['set-shipping-details']      = 'Shipping/set_shipping_details';
$route['get-shipping-form-view']    = 'Shipping/get_shipping_form_view';
$route['get-shippings'] 	        = 'Shipping/get_shippings';
$route['get-shipping'] 	            = 'Shipping/get_shipping';
$route['delete-shipping']           = 'Shipping/delete_shipping';
$route['set-shipping-display']      = 'Shipping/set_shipping_display';

//Product-discount add,delete,update,view //
$route['admin/discount']            = 'admin/discount_view';
$route['set-discount-details']      = 'Discount/set_discount_details';
// $route['get-discount-form-view']    = 'Discount/get_discount_form_view';
$route['get-discounts'] 	        = 'Discount/get_discounts';
$route['get-discount'] 	            = 'Discount/get_discount';
$route['delete-discount']           = 'Discount/delete_discount';
$route['set-discount-display']      = 'Discount/set_discount_display';

//Product-offer add,delete,update,view //
$route['admin/offer']               = 'admin/offer_view';
$route['set-offer-details']         = 'Offer/set_offer_details';
$route['get-offers'] 	            = 'Offer/get_offers';
$route['get-offer'] 	            = 'Offer/get_offer';
$route['delete-offer']              = 'Offer/delete_offer';
$route['set-offer-display']         = 'Offer/set_offer_display';

//Product-purchase add,delete,update,view //
$route['admin/purchase_price']      = 'admin/purchase_price_view';
$route['set-purchase-price-details']= 'PurchasePrice/set_purchase_price_details';
$route['get-purchase-prices'] 	    = 'PurchasePrice/get_purchase_prices';
$route['get-purchase-price'] 	    = 'PurchasePrice/get_purchase_price';
$route['delete-purchase-price']     = 'PurchasePrice/delete_purchase_price';
$route['set-purchase-price-display']= 'PurchasePrice/set_purchase_price_display';

//Product-testimonial add,delete,update,view //
$route['admin/testimonial'] 		= 'Media/testimonial_view';
$route['testimonial-form-view'] 	= 'Media/testimonial_form_view';
$route['set-or-get-testimonial'] 	= 'Media/testimonial_details';
$route['delete-testimonial'] 		= 'Media/delete_testimonial';
$route['login-with-facebook'] 		= 'Facebook/login_with_facebook';

//Product-coupon add,delete,update,view //
$route['admin/enquiry'] 		    = 'admin/enquiry_view';
$route['get-enquiry-form-view'] 	= 'Enquiry/get_enquiry_form_view';
$route['get-enquiry'] 				= 'Enquiry/get_enquiry';
$route['set-enquiry-display'] 		= 'Enquiry/set_enquiry_display';
$route['delete-enquiry'] 		    = 'Enquiry/delete_enquiry';

//Review add,delete,update,view //
$route['admin/review']              = 'admin/review';
$route['get-review-form-view'] 	    = 'Review/get_review_form_view';
$route['get-review'] 				= 'Review/get_reviews';
$route['set-review-display'] 		= 'Review/set_review_display';
$route['delete-review'] 		    = 'Review/delete_review';

//Role add,delete,update,view //
$route['admin/role']              = 'admin/role';
$route['set-role'] 		          = 'Role/set_role';
$route['get-roles'] 			       = 'Role/get_roles';
$route['get-role'] 				    = 'Role/get_role';
$route['delete-role'] 			    = 'Role/delete_role';
$route['set-role-display']        = 'Role/set_role_display';

//Banner add,delete,update,view //
$route['admin/banner'] 			    = 'Banner/banner_view';
$route['banner-form-view'] 		 = 'Banner/banner_form_view';
$route['set-or-get-banner'] 	    = 'Banner/banner_details';
$route['delete-banner'] 		    = 'Banner/delete_banner';

//b2a add,delete,update,view/Approval //
$route['admin/b2a'] 			         = 'Admin/b2a';
$route['get-all-b2a']               = 'B2A/get_all_b2a';
$route['get-b2a-form-view']         = 'B2A/get_b2a_form_view';
$route['get-b2a'] 			         = 'B2A/get_b2a';
$route['delete-b2a'] 			      = 'B2A/delete_b2a';
$route['set-b2a-display']           = 'B2A/set_b2a_display';

//b2c add,delete,update,view/Approval //
$route['admin/b2c'] 			         = 'Admin/b2c';
$route['get-all-b2c']               = 'B2C/get_all_b2c';
$route['get-b2c-form-view']         = 'B2C/get_b2c_form_view';
$route['get-b2c'] 			         = 'B2C/get_b2c';
$route['delete-b2c'] 			      = 'B2C/delete_b2c';
$route['set-b2c-display']           = 'B2C/set_b2c_display';

//subadmin add,delete,update,view //
$route['admin/subadmin']            = 'Admin/subadmin';
$route['get-all-subadmin']          = 'Subadmin/get_all_subadmin';
$route['get-subadmin-form-view']    = 'Subadmin/get_subadmin_form_view';
$route['get-subadmin'] 			      = 'Subadmin/get_subadmin';
$route['delete-subadmin'] 			   = 'Subadmin/delete_subadmin';
$route['set-subadmin-display']      = 'Subadmin/set_subadmin_display';

//Product-sub-category add,delete,update,view //
$route['admin/sub-categories']       = 'Admin/sub_category';
$route['get-sub-category-form-view'] = 'SubCategory/get_sub_category_form_view';
$route['set-sub-category']           = 'SubCategory/set_sub_category';
$route['get-sub-categories']         = 'SubCategory/get_sub_categories';
$route['set-sub-category-display']   = 'SubCategory/set_sub_category_display';
$route['delete-sub-category'] 	     = 'SubCategory/delete_sub_category';

//Product-sub-sub-category add,delete,update,view //
$route['admin/sub-sub-categories']       = 'Admin/sub_sub_category';
$route['get-sub-sub-category-form-view'] = 'SubSubCategory/get_sub_sub_category_form_view';
$route['set-sub-sub-category']           = 'SubSubCategory/set_sub_sub_category';
$route['get-sub-sub-categories']         = 'SubSubCategory/get_sub_sub_categories';
$route['set-sub-sub-category-display']   = 'SubSubCategory/set_sub_sub_category_display';
$route['delete-sub-sub-category'] 	     = 'SubSubCategory/delete_sub_sub_category';
$route['get-sub-category-dropdown']      = 'SubSubCategory/get_sub_category_dropdown';
$route['get-sub-sub-category-dropdown']  = 'SubSubCategory/get_sub_sub_category_dropdown';

//Product-Measurement add,delete,update,view //
//$route['admin/products-measures']      = 'Admin/products_measures';
$route['admin/products-measures']        = 'ProductMeasurement/get_product_measure_form_view';
$route['set-product-measurement']        = 'ProductMeasurement/set_product_measurement';
$route['get-product-measurement']        = 'ProductMeasurement/get_product_measurement';
$route['get-measure']                    = 'ProductMeasurement/get_measure';
$route['set-product-measure-display'] 	 = 'ProductMeasurement/set_product_measure_display';
$route['delete-product-measure']         = 'ProductMeasurement/delete_product_measure';

$route['admin/product-image-upload']     = 'ImageUpload/index';
$route['admin/ImageUpload/upload']       = 'ImageUpload/do_upload';

 



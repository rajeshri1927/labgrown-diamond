<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Review_Model extends MY_Model {

	protected $table_name 	= 'tbl_review';
	protected $primary_key 	= 'review_id';
	
	public function __construct(){
		parent::__construct();
	}

	
	public function get_review($review_id ='',$cust_product_url='',$display='') {
        $this->db->select('tp.*');
        $this->db->from('tbl_review tp');
        if(isset($display) && !empty($display)){
        	$this->db->where('tp.display', $display);
        }
        if(isset($cust_product_url) && !empty($cust_product_url)){
        	$this->db->where('tp.cust_product_url', $cust_product_url);
        }
        if(isset($review_id) && !empty($review_id)){
        	$this->db->where('tp.review_id', $review_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows()>0) {
        	if(isset($review_id) && !empty($review_id)){
        		return $query->row_array();
        	} else {
        		return $query->result_array();
        	}
        } else {
            return FALSE;
        }
    }

	
	function get_products_with_category($category){
		$products = array();
		foreach ($this->product_array as $product) {
			if($product['product_category'] === $category){
				$products[] = $product;
			}
		}
		return $products;
	}

	function get_products_by_id($product_id){
		$current_product = array();
		foreach ($this->product_array as $product) {
			if($product['product_id'] == $product_id) {
				$current_product = $product;
				break;
			}
		}
		return $current_product;
	}

	function get_product_name_by_id($product_id){
		$product_name = null;
		foreach ($this->product_array as $product) {
			if($product['product_id'] == $product_id) {
				$product_name = $product['product_title'];
				break;
			}
		}
		return $product_name;
	}

    public function get_user($user_id) {
    	$this->db->select('first_name, user_id, last_name, address, postcode, contact_no, email, city');
    	$this->db->from('tbl_users');
    	$this->db->where('user_id', $user_id);
    	$query = $this->db->get();
        if($query->num_rows()){
        	return $query->row_array();
        } else {
        	return false;
        }
    }

    function get_user_ordered_products($user_id){
        $this->db->select('to.order_unique_id, top.*, tp.*');
        $this->db->from('tbl_orders to');
        $this->db->join('tbl_ordered_products top', 'top.order_id = to.order_id', 'inner');
        $this->db->join('tbl_products tp', 'tp.product_id = top.product_id', 'inner');
        $this->db->join('tbl_users tu', 'tu.user_id = to.user_id', 'inner');
        $this->db->where('to.user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->result_array(); 
        } else {
            return FALSE;
        }
    }

    public function update_checkout_order($orderArr){
        $query =  $this->db->insert_batch('tbl_ordered_products', $orderArr, 'ordered_product_id');
        if($query){
            return true;
        }else{
            return false;
        }
    }

}
?>

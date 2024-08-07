<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Coupon_model extends MY_Model {

	protected $table_name 	= 'tbl_coupon';
	protected $primary_key 	= 'coupon_id';
	
	public function __construct(){
		parent::__construct();
	}

    public function get_coupon($coupon_id = false, $coupon_unique_id = false, $display = '')
    {
        $this->db->select('tpc.*, tc.category_id,tc.category_title');
        $this->db->from('tbl_coupon tpc');
        $this->db->join('tbl_categories tc', 'tc.category_id = tpc.category_id', 'inner');
        if(isset($display) && !empty($display)){
            $this->db->where('tpc.display', $display);
        }
        if(isset($coupon_id) && !empty($coupon_id)){
            $this->db->where('coupon_id', $coupon_id);
        }
        if(isset($coupon_unique_id) && !empty($coupon_unique_id)){
            $this->db->where('coupon_unique_id', $coupon_unique_id);
        }
        $query = $this->db->get();
        // // Print the last query
        // echo $this->db->last_query();
        if ($query->num_rows()) {
            if (isset($coupon_id) && !empty($coupon_id)) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
    }
     
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
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

	public function get_products($product_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*, tc.category_id, tc.category_title');
        $this->db->from('tbl_products tp');
        $this->db->join('tbl_categories tc', 'tc.category_id = tp.product_category', 'inner');
        if(isset($display) && !empty($display)){
        	$this->db->where('tp.display', $display);
        }
        if($product_id){
        	$this->db->where('tp.product_id', $product_id);
        }

        if($category_id){
        	$this->db->where('tc.category_id', $category_id);
        }
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($product_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
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

    public function get_coupon_code($coupon_input)
        {   
            $query = $this->db->select('*')
                              ->from('tbl_coupon')
                              ->where('coupon_unique_id', $coupon_input) 
                              ->get();
           if($query && $query->num_rows()>0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
}
?>

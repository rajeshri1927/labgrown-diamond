<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product_Model extends MY_Model {

	protected $table_name 	= 'tbl_products';
	protected $primary_key 	= 'product_id';
	
	public function __construct(){
		parent::__construct();
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

    public function fetch_cart_view($user_id){
    	    $this->db->select('a.*,b.*,c.*,d.*,a.user_id');
    	    $this->db->from('tbl_users a');
    	    $this->db->join('tbl_countries b', 'b.id = a.country', 'left');
    	    $this->db->join ('tbl_states c', 'c.id = a.state', 'left'); 
    	    $this->db->join ('tbl_cities d', 'd.id = a.city' , 'left'); 
    	    if(isset($user_id) && !empty($user_id)){
            	$this->db->where('a.user_id', $user_id);
            }
    	    $q = $this->db->get();
    	    //print_r($this->db->last_query()); 
    	    if($q && $q->num_rows()>0)
    	    {
    	        return $q->result_array();
    	    }
    	    else
    	    {
    	        return FALSE;
    	    }
    }
    
    public function fetch_record($table_name, $primary_key_label='', $primary_key_value='',$start_limit='',$minvalue='',$maxvalue='',$display_label = '', $display = '') {
        $this->db->select('*');
        $this->db->from($table_name);
        if((isset($primary_key_label) && !empty($primary_key_label)) && (isset($primary_key_value) && !empty($primary_key_value))){
            $this->db->where($primary_key_label, $primary_key_value);
            $where = '(display="Y")';
            $this->db->where($where);
        }
        if(isset($start_limit) && !empty($start_limit)){
            $q = $this->db->limit($start_limit);
        }
        $q = $this->db->get();
        if($q && $q->num_rows()>0)
        {
            return $q->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_data($data) {
        $success = true;

        foreach ($data as $row) {
            // Assuming 'your_table' is the name of your database table
            $query = $this->db->insert('tbl_products', $row);

            if (!$query) {
                $success = false;
                // Optionally, log or handle the failure for this row
            }
        }

        return $success;
    }

}
?>

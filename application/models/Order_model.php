<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends MY_Model {

	protected $table_name 	= 'tbl_orders';
	protected $primary_key 	= 'order_id';
	
	public function __construct(){
		parent::__construct();
	}
	
	function get_orders($order_id = ''){
        $this->db->select('to.*, tu.first_name, tu.last_name, tu.email, tu.contact_no, tu.address, tu.postcode, b.country_name,c.state_name,d.city_name');
        $this->db->from('tbl_orders to');
        $this->db->join('tbl_users tu', 'tu.user_id = to.user_id', 'left');
        $this->db->join('tbl_countries b', 'b.id = to.country_code', 'left');
	    $this->db->join ('tbl_states c', 'c.id = to.state', 'left' ); 
	    $this->db->join ('tbl_cities d', 'd.id = to.city' , 'left' );
        if(isset($order_id) && !empty($order_id)){
            $this->db->where('to.order_id', $order_id);
        }else {
            $this->db->order_by('to.order_date', 'desc');
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($order_id) && !empty($order_id)){
                return $query->row_array();
            }else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
	}
//   public function get_ordered_products($order_id){
//         $this->db->select('top.*, tp.*');
//         $this->db->from('tbl_ordered_products top');
//         $this->db->join('tbl_products tp', 'tp.product_id = top.product_id', 'left');
//         $this->db->where('top.order_id', $order_id);
//         $query = $this->db->get();
//         if($query->num_rows()){
//             return $query->result_array();  
//         } else {
//             return FALSE;
//         }
//     }
	function get_ordered_products($order_id){
        $this->db->select('top.*, tp.*');
        $this->db->from('tbl_ordered_products top');
        $this->db->join('tbl_products tp', 'top.product_id = tp.product_id', 'inner');
        $this->db->where('top.order_id', $order_id);
        $query = $this->db->get();
        if($query->num_rows()){
        	return $query->result_array(); 
        } else {
            return FALSE;
        }
	}

	function get_count($type){
        $this->db->select('*');
        if($type === 'orders'){
        	$this->db->from('tbl_orders');
        }
        if($type === 'products'){
        	$this->db->from('tbl_products');
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	return $query->num_rows(); 
        } else {
            return 0;
        }
	}
    
    public function get_cust_history($user_id='') {
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
	
}
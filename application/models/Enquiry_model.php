<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry_model extends MY_Model {

	protected $table_name 	= 'tbl_enquiry';
	protected $primary_key 	= 'enquiry_id';
	
	public function __construct(){
		parent::__construct();
	}
	
	function get_enquiry_with_category($category){
		$enquiry = array();
		foreach ($this->event_array as $event) {
			if($event['event_category'] === $category){
				$enquiry[] = $event;
			}
		}
		return $enquiry;
	}

	function get_enquiry_by_id($event_id){
		$current_event = array();
		foreach ($this->event_array as $event) {
			if($event['event_id'] == $event_id) {
				$current_event = $event;
				break;
			}
		}
		return $current_event;
	}

	function get_event_name_by_id($event_id){
		$event_name = null;
		foreach ($this->event_array as $event) {
			if($event['event_id'] == $event_id) {
				$event_name = $event['event_title'];
				break;
			}
		}
		return $event_name;
	}

	public function get_enquiry($event_id = false, $category_id=false, $display = ''){
        $this->db->select('tp.*');
        $this->db->from('tbl_enquiry tp');   
        if(isset($display) && !empty($display)){
        	$this->db->where('tp.display', $display);
        }
        if($event_id){
        	$this->db->where('tp.event_id', $event_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	if($event_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }

    public function get_user($user_id) {
    	$this->db->select('first_name, user_id, last_name, address, pincode, contact_no, email, city');
    	$this->db->from('tbl_users');
    	$this->db->where('user_id', $user_id);
    	$query = $this->db->get();
        if($query->num_rows()){
        	return $query->row_array();
        } else {
        	return false;
        }
    }

    function get_user_ordered_enquiry($user_id){
        $this->db->select('to.order_unique_id, top.*, tp.*');
        $this->db->from('tbl_orders to');
        $this->db->join('tbl_ordered_enquiry top', 'top.order_id = to.order_id', 'inner');
        $this->db->join('tbl_enquiry tp', 'tp.event_id = top.event_id', 'inner');
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
        $query =  $this->db->insert_batch('tbl_ordered_enquiry', $orderArr, 'ordered_event_id');
        if($query){
            return true;
        }else{
            return false;
        }
    }
}
?>

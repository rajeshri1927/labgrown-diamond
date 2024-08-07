<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shipping_model extends MY_Model {
	protected $table_name 	= 'tbl_shipping';
	protected $primary_key 	= 'shipping_id';

    public function get_shippings($shipping_id = false, $country_id = false, $display = ''){
        $this->db->select('tds.*, tc.id, tc.country_name,tcl.clarity_id,tcl.clarity_name,tco.color_id,tco.color_name');
        $this->db->from('tbl_shipping tds');
        $this->db->join('tbl_countries tc', 'tc.id = tds.country_id', 'inner');
        $this->db->join('tbl_clarity tcl', 'tcl.clarity_id = tds.clarity_id', 'inner');
        $this->db->join('tbl_color tco', 'tco.color_id = tds.color_id', 'inner');
    
        if (isset($display) && !empty($display)) {
            $this->db->where('tds.display', $display);
        }
    
        if ($country_id) {
            $this->db->where('tds.country_id', $country_id);
        }
    
        if ($shipping_id) {
            $this->db->where('tds.shipping', $shipping_id);
        }

        $this->db->order_by('tds.shipping_id', 'asc');
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            // return $query->result_array();
            if($shipping_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            //return array();  // Return an empty array if no records are found
            return FALSE;
        }
    }

    public function get_shipping($shipping_id = ''){
        $this->db->select('tds.*, tc.id, tc.country_name,tcl.clarity_id,tcl.clarity_name,tco.color_id,tco.color_name');
        $this->db->from('tbl_shipping tds');
        $this->db->join('tbl_countries tc', 'tc.id = tds.country_id', 'inner');
        $this->db->join('tbl_clarity tcl', 'tcl.clarity_id = tds.clarity_id', 'inner');
        $this->db->join('tbl_color tco', 'tco.color_id = tds.color_id', 'inner');
        if(isset($shipping_id) && !empty($shipping_id)){
            $this->db->where('tds.shipping_id', $shipping_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($shipping_id) && !empty($shipping_id)){
                return $query->row_array();  
            } else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
    }
}

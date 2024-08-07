<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sub_sub_category_model extends MY_Model {
	protected $table_name 	= 'tbl_sub_sub_categories';
	protected $primary_key 	= 'sub_sub_category_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)                
                ->get();
        return $query->num_rows();
    }

    public function get_sub_sub_categories($sub_sub_category_id = false, $sub_category_id = false, $category_id = false, $display = ''){
        $this->db->select('tssc.*, tsc.sub_category_id, tsc.sub_category_title, tc.category_id, tc.category_title');
        $this->db->from('tbl_sub_sub_categories tssc');
        $this->db->join('tbl_sub_categories tsc', 'tsc.sub_category_id = tssc.sub_category_id', 'inner');
        $this->db->join('tbl_categories tc', 'tc.category_id = tsc.category_id', 'inner');
    
        if (isset($display) && !empty($display)) {
            $this->db->where('tssc.display', $display);
        }
    
        if ($sub_sub_category_id) {
            $this->db->where('tssc.sub_sub_category_id', $sub_sub_category_id);
        }
    
        if ($sub_category_id) {
            $this->db->where('tsc.sub_category_id', $sub_category_id);
        }
    
        if ($category_id) {
            $this->db->where('tc.category_id', $category_id);
        }
    
        $this->db->order_by('tssc.sub_sub_category_id', 'asc');
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            // return $query->result_array();
            if($sub_sub_category_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            //return array();  // Return an empty array if no records are found
            return FALSE;
        }
    }
    

    public function get_sub_sub_category($sub_category_id = ''){
      /*   $this->db->select('tsc.*, tc.category_id,tc.category_title');
        $this->db->from(' tbl_sub_categories tsc');
        $this->db->join('tbl_categories tc', 'tc.category_id = tsc.category_id', 'inner'); */
        $this->db->select('tssc.*, tsc.sub_category_id, tsc.sub_category_title, tc.category_id, tc.category_title');
        $this->db->from('tbl_sub_sub_categories tssc');
        $this->db->join('tbl_sub_categories tsc', 'tsc.sub_category_id = tssc.sub_category_id', 'inner');
        $this->db->join('tbl_categories tc', 'tc.category_id = tsc.category_id', 'inner');
    
        if(isset($sub_category_id) && !empty($sub_category_id)){
            $this->db->where('tssc.sub_category_id', $sub_category_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($sub_category_id) && !empty($sub_category_id)){
                return $query->result_array();  
            } else {
                return $query->array();  
            }
        } else {
            return FALSE;
        }
    }
}
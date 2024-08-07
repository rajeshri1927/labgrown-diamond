<?php defined('BASEPATH') OR exit('No direct script access allowed');
class B2bMarkup_model extends MY_Model {
	protected $table_name 	= 'tbl_sub_categories';
	protected $primary_key 	= 'sub_category_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)                
                ->get();
        return $query->num_rows();
    }
    
    public function get_sub_categories($sub_category_id = false, $category_id=false, $display = ''){
        $this->db->select('tsc.*, tc.category_id,tc.category_title');
        $this->db->from(' tbl_sub_categories tsc');
        $this->db->join('tbl_categories tc', 'tc.category_id = tsc.category_id', 'inner');
        if(isset($display) && !empty($display)){
        	$this->db->where('tsc.display', $display);
        }
        if($sub_category_id){
        	$this->db->where('tsc.sub_category_id', $sub_category_id);
        }

        if($category_id){
        	$this->db->where('tc.category_id', $category_id);
        }
        $this->db->order_by('tsc.sub_category_id', 'asc');
        $query = $this->db->get();
        if($query->num_rows()){
        	if($sub_category_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }

    public function get_priceRangeList(){
        $this->db->select('tbl_price_range.*');
        $this->db->from(' tbl_price_range');
        $query = $this->db->get();
        return $query->result_array();  
             
    }
	
	public function setMarkup($data){
		$query = $this->db->insert('tbl_b2b_ctry_pricerange_class_markup',$data);
	}
	
	public function get_b2bMarkups(){
        $this->db->select('b2bM.*, pr.price_range');
        $this->db->from(' tbl_b2b_ctry_pricerange_class_markup b2bM');
        $this->db->join('tbl_price_range pr', 'pr.price_range_id = b2bM.b2b_ctry_priceRange_class_markup_priceRangeId');
         
        $query = $this->db->get();
        if($query->num_rows()){
        	 
        		return $query->result_array(); 
        	 
        } else {
            return FALSE;
        }
    }
	
}
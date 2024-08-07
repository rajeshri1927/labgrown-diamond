<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tax_model extends MY_Model {
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
	
	 public function get_countryList(){
        $this->db->select('tbl_countries.*');
        $this->db->from('tbl_countries');
        $query = $this->db->get();
        return $query->result_array();  
             
    }
	
	public function setTax($data){
		//print_r($data);
		$query = $this->db->insert('tbl_tax',$data);
	}
	
	public function get_tax(){
        $this->db->select('tax.*, ctry.country_name,ctry.sortname');
        $this->db->from('tbl_tax tax');
        $this->db->join('tbl_countries ctry', 'ctry.id = tax.tax_ctry_id');
         
        $query = $this->db->get();
        if($query->num_rows()){
        	 
        		return $query->result_array(); 
        	 
        } else {
            return FALSE;
        }
    }
	
}
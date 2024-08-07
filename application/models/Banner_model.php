<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner_model extends MY_Model {

	protected $table_name 	= 'tbl_banners';
	protected $primary_key 	= 'banner_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_banners($banner_id = false){
        $this->db->select('*');
        $this->db->from($this->table_name);
       
        if($banner_id){
        	$this->db->where($this->primary_key, $banner_id);
        }
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($banner_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }

}

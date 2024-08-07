<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial_model extends MY_Model {

	protected $table_name 	= 'tbl_testimonials';
	protected $primary_key 	= 'testimonial_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_testimonials($testimonial_id = false){
        $this->db->select('*');
        $this->db->from($this->table_name);
       
        if($testimonial_id){
        	$this->db->where($this->primary_key, $testimonial_id);
        }
        
        $query = $this->db->get();
        if($query->num_rows()){
        	if($testimonial_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }

}
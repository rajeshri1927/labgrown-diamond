<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Color_model extends MY_Model {

	protected $table_name 	= 'tbl_color';
	protected $primary_key 	= 'color_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_color($color_id = false, $display = ''){
        $this->db->select('*');
        $this->db->from('tbl_color');
        if(isset($display) && !empty($display)){
        	$this->db->where('display', $display);
        }
        if($color_id){
        	$this->db->where('color_id', $color_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	if($color_id){
        		return $query->row_array();
        	} else {
        		return $query->result_array(); 
        	}
        } else {
            return FALSE;
        }
    }

}
?>

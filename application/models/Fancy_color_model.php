<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fancy_color_Model extends MY_Model {

	protected $table_name 	= 'tbl_fancy_color';
	protected $primary_key 	= 'fancy_color_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_fancy_color($fancy_color_id = false, $display = ''){
        $this->db->select('*');
        $this->db->from('tbl_fancy_color');
        if(isset($display) && !empty($display)){
        	$this->db->where('display', $display);
        }
        if($fancy_color_id){
        	$this->db->where('fancy_color_id', $fancy_color_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	if($fancy_color_id){
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

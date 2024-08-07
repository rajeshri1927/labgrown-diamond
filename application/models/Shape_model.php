<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shape_model extends MY_Model {

	protected $table_name 	= 'tbl_shapes';
	protected $primary_key 	= 'shape_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_shapes($shape_id = false, $display = ''){
        $this->db->select('*');
        $this->db->from('tbl_shapes');
        if(isset($display) && !empty($display)){
        	$this->db->where('display', $display);
        }
        if($shape_id){
        	$this->db->where('shape_id', $shape_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	if($shape_id){
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

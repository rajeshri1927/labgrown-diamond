<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clarity_model extends MY_Model {

	protected $table_name 	= 'tbl_clarity';
	protected $primary_key 	= 'clarity_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function get_clarity($clarity_id = false, $display = ''){
        $this->db->select('*');
        $this->db->from('tbl_clarity');
        if(isset($display) && !empty($display)){
        	$this->db->where('display', $display);
        }
        if($clarity_id){
        	$this->db->where('clarity_id', $clarity_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
        	if($clarity_id){
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

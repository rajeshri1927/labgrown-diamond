<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Homeapi_model extends MY_Model {

	protected $table_name 	= 'tbl_home_api';
	protected $primary_key 	= 'home_api_id';
	
	public function __construct(){
		parent::__construct();
	}

    public function get_existing_data($home_api_id=false,$display=''){
        $this->db->select('*');
        $this->db->from('tbl_home_api');
        if(isset($display) && !empty($display)){
            $this->db->where('display', $display);
        }
        if($home_api_id){
            $this->db->where('home_api_id', $home_api_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if($home_api_id){
                return $query->row_array();
            } else {
                return $query->result_array(); 
            }
        } else {
            return FALSE;
        }
    }

    public function get_last_update_time() {
        $this->db->select('last_updated');
        $this->db->from('tbl_home_api');
        $this->db->order_by('last_updated', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row('last_updated');
    }

    public function clear_old_records() {
        // This method clears records older than 24 hours, if needed
        $this->db->where('last_updated <', date('Y-m-d H:i:s', strtotime('-24 hours')));
        $this->db->delete('tbl_home_api');
    }
}
?>

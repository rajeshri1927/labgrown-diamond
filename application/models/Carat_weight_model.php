<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Carat_weight_model extends MY_Model {

	protected $table_name 	= 'tbl_carat_weight';
	protected $primary_key 	= 'carat_weight_id';
	
	public function __construct(){
		parent::__construct();
	}

    public function get_carat_weight($carat_weight_id = false, $display = '')
    {
        $this->db->select('tcw.*');
        $this->db->from('tbl_carat_weight tcw');
        if(isset($display) && !empty($display)){
            $this->db->where('tcw.display', $display);
        }
        if(isset($carat_weight_id) && !empty($carat_weight_id)){
            $this->db->where('carat_weight_id', $carat_weight_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (isset($carat_weight_id) && !empty($carat_weight_id)) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
    }
     
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }
}
?>

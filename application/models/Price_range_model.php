<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Price_range_model extends MY_Model {

	protected $table_name 	= 'tbl_price_range';
	protected $primary_key 	= 'price_range_id';
	
	public function __construct(){
		parent::__construct();
	}

    public function get_price_range($price_range_id = false, $display = '')
    {
        $this->db->select('tpr.*');
        $this->db->from('tbl_price_range tpr');
        if(isset($display) && !empty($display)){
            $this->db->where('tq.display', $display);
        }
        if(isset($price_range_id) && !empty($price_range_id)){
            $this->db->where('price_range_id', $price_range_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (isset($price_range_id) && !empty($price_range_id)) {
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

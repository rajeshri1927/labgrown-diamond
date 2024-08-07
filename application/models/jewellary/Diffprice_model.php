<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Diffprice_model extends MY_Model {

	protected $table_name 	= 'tbl_jewellary_diff_prices';
	protected $primary_key 	= 'diff_pric_id';
	
	public function __construct(){
		parent::__construct();
	}

	public function different_table_prices_insert_data($data){
		
		$success = true;
		 		
		foreach($data as $key => $row){
			$data_n[$key] = array(
                'PriceStart' => $row['PriceStart'],
                'PriceEnd' => $row['PriceEnd'],
                'pricerange_id' => $row['price_tablename']
				); 
            
			$query = $this->db->insert('tbl_jewellary_diff_prices',$data_n[$key]);
			$insert_id = $this->db->insert_id();
			 if(!$query){
              $success = false;
            }
        }
	   return $this->db->last_query();
	}

    public function get_jewellay_different_prices() {
        // Selecting all columns from both tables
        $this->db->select('pr.*, dp.*');
        
        // From the first table
        $this->db->from('tbl_jewellary_pricerange pr');
        
        // Performing an inner join with the second table on pricerange_id
        $this->db->join('tbl_jewellary_diff_prices dp', 'pr.pricerange_id = dp.pricerange_id', 'inner');
        
        // Executing the query
        $query = $this->db->get();
        
        // Checking if there are rows returned
        if ($query->num_rows() > 0) {
            // Returning the result as an array
            return $query->result_array();
        } else {
            // Returning FALSE if no rows found
            return FALSE;
        }
    }    
}
?>

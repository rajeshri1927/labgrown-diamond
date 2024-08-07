<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_price_model extends MY_Model {
	protected $table_name 	= 'tbl_purchase_price';
	protected $primary_key 	= 'purchase_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)                
                ->get();
        return $query->num_rows();
    }

    public function get_purchase_prices($postData) {
        $response = array();
        ## Read value
        $draw           = $postData['draw'];
        $start          = $postData['start'];
        $rowperpage     = $postData['length'];
        $display        = 'Y'; 
        $searchValue    = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if($searchValue != '') {
            $searchQuery = "(purchase_item_name like '%".$searchValue."%')";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->where('display',"Y");
        $records = $this->db->get($this->table_name)->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);

        $this->db->where('display',"Y");
        $records = $this->db->get($this->table_name)->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        $this->db->from($this->table_name);

        if($searchQuery != '')
            $this->db->where($searchQuery);

        //$this->db->where('display',"Y");
        $this->db->order_by('inserted_on', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach($records as $record ){
            $data[] = array( 
                'purchase_id'       => $record->purchase_id,
                'purchase_item_name'=> $record->purchase_item_name,
                'purchase_percent'  => $record->purchase_percent,
                'purchase_price'    => $record->purchase_price,
                'display'           => $record->display
            ); 
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        
        return $response; 
    }

    public function get_purchase_price($purchase_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('display', 'Y');
        if(isset($purchase_id) && !empty($purchase_id)){
            $this->db->where('purchase_id', $purchase_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($purchase_id) && !empty($purchase_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
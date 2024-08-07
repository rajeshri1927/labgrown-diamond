<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pricerange_model extends MY_Model {
	protected $table_name 	= 'tbl_jewellary_pricerange';
	protected $primary_key 	= 'pricerange_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)               
                ->get();
        return $query->num_rows();
    }

    public function get_priceranges($postData) {
        $response = array();
        ## Read value
        $draw           = $postData['draw'];
        $start          = $postData['start'];
        $rowperpage     = $postData['length'];
        $display        = 'Y'; 
        // Rows display per page
        //$columnIndex     = $postData['order'][0]['column']; // Column index
        //$columnName      = $postData['columns'][$columnIndex]['data']; // Column name
        //$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue    = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if($searchValue != '') {
            $searchQuery = "(PriceStart LIKE '%".$searchValue."%' 
                    OR PriceEnd LIKE '%".$searchValue."%' 
                    OR price_tablename LIKE '%".$searchValue."%')";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        
        $records = $this->db->get($this->table_name)->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);

        
        $records = $this->db->get($this->table_name)->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        $this->db->from($this->table_name);

        if($searchQuery != '')
            $this->db->where($searchQuery);

       
        $this->db->order_by('inserted_on', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach($records as $record ){
            $data[] = array(
                'pricerange_id'           => $record->pricerange_id,
                'price_tablename'           => $record->price_tablename,
                'PriceStart'        => $record->PriceStart,
                'PriceEnd'         => $record->PriceEnd,
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

    public function get_pricerange($pricerange_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        if(isset($pricerange_id) && !empty($pricerange_id)){
            $this->db->where('pricerange_id', $pricerange_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($pricerange_id) && !empty($pricerange_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
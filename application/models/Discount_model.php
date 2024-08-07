<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Discount_model extends MY_Model {
	protected $table_name 	= 'tbl_discount';
	protected $primary_key 	= 'discount_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)                
                ->get();
        return $query->num_rows();
    }

    public function get_discounts($postData) {
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
            $searchQuery = "(item_name like '%".$searchValue."%')";
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
                'discount_id'       => $record->discount_id,
                'item_name'         => $record->item_name,
                'discount_percent'  => $record->discount_percent,
                'discount'          => $record->discount,
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

    public function get_discount($discount_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('display', 'Y');
        if(isset($discount_id) && !empty($discount_id)){
            $this->db->where('discount_id', $discount_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($discount_id) && !empty($discount_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
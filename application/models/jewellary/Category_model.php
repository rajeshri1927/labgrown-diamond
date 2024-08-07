<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends MY_Model {
	protected $table_name 	= 'tbl_jewellary_category';
	protected $primary_key 	= 'category_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)               
                ->get();
        return $query->num_rows();
    }

    public function get_categories($postData) {
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
            $searchQuery = "(category_title like '%".$searchValue."%')";
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

        $this->db->where('display',"Y");
        $this->db->order_by('inserted_on', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach($records as $record ){
            $data[] = array( 
                'category_id'           => $record->category_id,
                'category_title'        => $record->category_title,
                'category_desc'         => $record->category_desc,
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

    public function get_category($pricerange_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('display', 'Y');
        if(isset($category_id) && !empty($category_id)){
            $this->db->where('category_id', $category_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($category_id) && !empty($category_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
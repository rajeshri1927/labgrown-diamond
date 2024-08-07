<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Intensity_model extends MY_Model {
	protected $table_name 	= 'tbl_intensity';
	protected $primary_key 	= 'intensity_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)                
                ->get();
        return $query->num_rows();
    }

    public function get_intensities($postData) {
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
            $searchQuery = "(intensity_name	like '%".$searchValue."%')";
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
                'intensity_id'     => $record->intensity_id,
                'intensity_name'   => $record->intensity_name,
                'intensity_desc'   => $record->intensity_desc,
                'display'          => $record->display
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

    public function get_intensity($intensity_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('display', 'Y');
        if(isset($intensity_id) && !empty($intensity_id)){
            $this->db->where('intensity_id', $intensity_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($intensity_id) && !empty($intensity_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends MY_Model {
    protected $table_name  = 'tbl_jewellary_brands'; // Correct table name
    protected $primary_key = 'brand_id';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function num_rows() {
        $query = $this->db->select('*')
                          ->from($this->table_name)
                          ->get();
        return $query->num_rows();
    }

    public function get_brands($postData) {
        $response = array();
        
        // Read values
        $draw          = $postData['draw'];
        $start         = $postData['start'];
        $rowperpage    = $postData['length'];
        $searchValue   = $postData['search']['value']; // Search value
        
        // Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = "(brandName like '%".$searchValue."%')";
        }

        // Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from($this->table_name);
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        // Total number of records with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from($this->table_name);
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        // Fetch records
        $this->db->select('*');
        $this->db->from($this->table_name);
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $this->db->order_by('brand_id', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'brand_id'        => $record->brand_id,
                'brandName'       => $record->brandName,
                'brandHomePageURL'=> $record->brandHomePageURL
            );
        }

        // Response
        $response = array(
            "draw"                => intval($draw),
            "iTotalRecords"       => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData"              => $data
        );
        
        return $response;
    }

    public function get_brand($brand_id = '') {
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($brand_id)) {
            $this->db->where('brand_id', $brand_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (!empty($brand_id)) {
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }

    public function delete($brand_id) {
        // Ensure the brand_id is sanitized to prevent SQL injection
        $brand_id = intval($brand_id);

        // Perform the deletion operation
        $this->db->where('brand_id', $brand_id);
        return $this->db->delete('tbl_jewellary_brands');
    }
}

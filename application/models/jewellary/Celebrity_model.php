<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Celebrity_model extends MY_Model {
    protected $table_name  = 'tbl_jewellary_celebrities'; // Correct table name
    protected $primary_key = 'celebrity_id';

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

    public function get_celebrities($postData) {
        $response = array();
        
        // Read values
        $draw          = $postData['draw'];
        $start         = $postData['start'];
        $rowperpage    = $postData['length'];
        $searchValue   = $postData['search']['value']; // Search value
        
        // Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = "(celebrities_name like '%".$searchValue."%')";
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
        $this->db->order_by('celebrity_id', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'celebrity_id'            => $record->celebrity_id,
                'celebrities_name'        => $record->celebrities_name,
                'text_content_for_seo'    => $record->text_content_for_seo,
                'link'                    => $record->link
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

    public function get_celebrity($celebrity_id = '') {
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($celebrity_id)) {
            $this->db->where('celebrity_id', $celebrity_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (!empty($celebrity_id)) {
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }

    public function delete($celebrity_id) {
        // Ensure the celebrity_id is sanitized to prevent SQL injection
        $celebrity_id = intval($celebrity_id);

        // Perform the deletion operation
        $this->db->where('celebrity_id', $celebrity_id);
        return $this->db->delete($this->table_name);
    }

}

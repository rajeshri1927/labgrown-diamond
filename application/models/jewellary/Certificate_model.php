<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends MY_Model {
    protected $table_name  = 'tbl_jewellary_certificates'; // Correct table name
    protected $primary_key = 'certificate_id';

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

    public function get_certificates($postData) {
        $response = array();
        
        // Read values
        $draw          = $postData['draw'];
        $start         = $postData['start'];
        $rowperpage    = $postData['length'];
        $searchValue   = $postData['search']['value']; // Search value
        
        // Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = "(institute_name like '%".$searchValue."%')";
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
        $this->db->order_by('certificate_id', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'certificate_id'        => $record->certificate_id,
                'institute_name'        => $record->institute_name,
                'minimum_for_123_carat' => $record->minimum_for_123_carat,
                'minimum_for_x_diamond_wt' => $record->minimum_for_x_diamond_wt,
                'rate_per_carat'        => $record->rate_per_carat,
                'total'                 => $record->total
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

    public function get_certificate($certificate_id = '') {
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($certificate_id)) {
            $this->db->where('certificate_id', $certificate_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (!empty($certificate_id)) {
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }

    public function delete($certificate_id) {
        // Ensure the certificate_id is sanitized to prevent SQL injection
        $certificate_id = intval($certificate_id);

        // Perform the deletion operation
        $this->db->where('certificate_id', $certificate_id);
        return $this->db->delete($this->table_name);
    }
}

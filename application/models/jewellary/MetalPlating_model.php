<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MetalPlating_model extends MY_Model {
    protected $table_name  = 'tbl_jewellary_metal_plating'; // Correct table name
    protected $primary_key = 'metal_plate_id';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function num_rows() {
        $query = $this->db->select('*')
                          ->from($this->table_name)
                          ->get();
        return $query->num_rows();
    }

    public function get_metal_platings($postData) {
        $response = array();
        
        // Read values
        $draw          = $postData['draw'];
        $start         = $postData['start'];
        $rowperpage    = $postData['length'];
        $searchValue   = $postData['search']['value']; // Search value
        
        // Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = "(metal_plate_name like '%".$searchValue."%')";
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
        $this->db->order_by('metal_plate_id', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'metal_plate_id'      => $record->metal_plate_id,
                'metal_plate_name'    => $record->metal_plate_name,
                'metal_plate_image'   => $record->metal_plate_image
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

    public function get_metal_plating($metal_plate_id = '') {
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($metal_plate_id)) {
            $this->db->where('metal_plate_id', $metal_plate_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if (!empty($metal_plate_id)) {
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }

    public function delete($metal_plate_id) {
        // Ensure the metal_plate_id is sanitized to prevent SQL injection
        $metal_plate_id = intval($metal_plate_id);

        // Perform the deletion operation
        $this->db->where('metal_plate_id', $metal_plate_id);
        return $this->db->delete($this->table_name);
    }

    // public function save_record($data) {
    //     return $this->db->insert('tbl_jewellary_metal_plating', $data);
    // }
    
    // public function update_record($data, $where) {
    //     $this->db->where($where);
    //     return $this->db->update('tbl_jewellary_metal_plating', $data);
    // }
    
    // public function get_record($where) {
    //     $query = $this->db->get_where('tbl_jewellary_metal_plating', $where);
    //     return $query->row();
    // }
    
}
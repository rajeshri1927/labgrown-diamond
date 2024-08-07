<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Metal_model extends MY_Model {
    protected $table_name = 'tbl_jewellary_metals';  // Correct table name
    protected $primary_key = 'metal_id';

    public function num_rows() {
        $query = $this->db->count_all($this->table_name);
        return $query;
    }

    public function get_metals($postData) {
        $response = array();

        // Read value
        $draw          = $postData['draw'];
        $start         = $postData['start'];
        $rowperpage    = $postData['length'];
        $searchValue   = $postData['search']['value']; // Search value

        // Search
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($searchValue)) {
            $this->db->like('metal_name', $searchValue);
        }

        // Total number of records without filtering
        $totalRecords = $this->db->count_all_results();

        // Total number of records with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from($this->table_name);
        if (!empty($searchValue)) {
            $this->db->like('metal_name', $searchValue);
        }
        $records = $this->db->get()->row();
        $totalRecordwithFilter = $records->allcount;

        // Fetch records
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($searchValue)) {
            $this->db->like('metal_name', $searchValue);
        }
        $this->db->order_by('inserted_on', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'metal_id'          => $record->metal_id,
                'metal_name'        => $record->metal_name,
                'making_charge'     => $record->making_charge,
                'density'           => $record->density,
                'rate_as_per_api'   => $record->rate_as_per_api,
                'manual_date'       => $record->manual_date,
                'manual_rate'       => $record->manual_rate,
                'use_api_rate'      => $record->use_api_rate,
                'use_manual_rate'   => $record->use_manual_rate
            );
        }

        // Response
        $response = array(
            "draw"                => intval($draw),
            "iTotalRecords"       => $totalRecords,
            "iTotalDisplayRecords"=> $totalRecordwithFilter,
            "aaData"              => $data
        );

        return $response;
    }

    public function get_metal($metal_id = '') {
        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($metal_id)) {
            $this->db->where('metal_id', $metal_id);
            $query = $this->db->get();
            return $query->row();
        } else {
            $query = $this->db->get();
            return $query->result_array();
        }
    }
}
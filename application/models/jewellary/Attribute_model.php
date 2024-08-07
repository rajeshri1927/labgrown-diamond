<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Attribute_model extends MY_Model {
	protected $table_name 	= 'tbl_jewellary_attributes';
	protected $primary_key 	= 'attribute_id';

	public function num_rows(){
        $query = $this->db->select('*')
                ->from($this->table_name)               
                ->get();
        return $query->num_rows();
    }

    public function get_attributes($postData) {
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
            $searchQuery = "(attribute_title like '%".$searchValue."%')";
        }
    
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->where('display', 'Y');
        $records = $this->db->get($this->table_name)->result();
        $totalRecords = $records[0]->allcount;
    
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);
    
        $this->db->where('display', 'Y');
        $records = $this->db->get($this->table_name)->result();
        $totalRecordwithFilter = $records[0]->allcount;
    
        ## Fetch records with join
        $this->db->select('attribute.attribute_id, attribute.attribute_title, attribute.subcategory_id, tbl_jewellary_subcategory.category_title as subcategory_name');
        $this->db->from($this->table_name . ' as attribute');
        $this->db->join('tbl_jewellary_subcategory', 'attribute.subcategory_id = tbl_jewellary_subcategory.subcategory_id', 'left');
        
        if($searchQuery != '')
            $this->db->where($searchQuery);
    
        $this->db->where('attribute.display', 'Y');
        $this->db->order_by('attribute.inserted_on', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
    
        $data = array();
        foreach($records as $record ){
            $data[] = array( 
                'attribute_id'    => $record->attribute_id,
                'attribute_title'    => $record->attribute_title, // Use category_title from category table
                'sub_category_name'       => $record->subcategory_name,
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
    

    public function get_attribute($attribute_id = ''){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('display', 'Y');
        if(isset($attribute_id) && !empty($attribute_id)){
            $this->db->where('attribute_id', $attribute_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($attribute_id) && !empty($attribute_id)){
                return $query->row();  
            } else {
                return $query->result_array();  
            }
        } else {
            return FALSE;
        }
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends MY_Model {
	protected $table_name 	= 'tbl_users';
	protected $primary_key 	= 'user_id';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_user_by_email($email){
        $query = $this->db->get_where($this->table_name, array('email' => $email));
        if($query->num_rows()) {
            return $query->row_array();
        }else{
            return false;
        }
    }

    public function get_user($user_id='')
    {
        $query = $this->db->get_where($this->table_name, array('user_id' => $user_id));
        if($query->num_rows()) 
        {
            return $query->row();
        }
        else{
            return false;
        }
    }

    // public function get_sub_users(){
    //     $this->db->select('*');
    //     $this->db->from($this->table_name);
    //     //$this->db->where('display', 'Y');
    //     // if(isset($user_id) && !empty($user_id)){
    //     //     $this->db->where('user_id', $user_id);
    //     // }
    //     $query = $this->db->get();
    //     //echo $this->db->last_query();
    //     if($query->num_rows()){
    //         // if(isset($user_id) && !empty($user_id)){
    //         //     return $query->row();  
    //         // } else {
    //             return $query->result_array();  
    //         //}
    //     } else {
    //         return FALSE;
    //     }
    // }
    public function get_sub_users($postData) {
        $response = array();
        ## Read value
        $draw           = $postData['draw'];
        $start          = $postData['start'];
        $rowperpage     = $postData['length'];
        //$display        = 'Y'; 
        // Rows display per page
        $searchValue    = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if($searchValue != '') {
            $searchQuery = "(first_name like '%".$searchValue."%')";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        //$this->db->where('display',"Y");
        $records = $this->db->get($this->table_name)->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);

        //$this->db->where('display',"Y");
        $records = $this->db->get($this->table_name)->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        // $this->db->select('*');
        // $this->db->from($this->table_name);
        $this->db->select('tu.*, tr.role_id,tr.role_title');
        $this->db->from('tbl_users tu');
        //$this->db->join('tbl_users tu', 'tu.user_id = to.user_id', 'inner');
        $this->db->join('tbl_role tr', 'tr.role_id = tu.role_id', 'inner');

        if($searchQuery != '')
            $this->db->where($searchQuery);

        //$this->db->where('display',"Y");
        $this->db->order_by('user_id', 'asc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();
        foreach($records as $record ){
            $data[] = array( 
                'user_id'       => $record->user_id,
                'role_title'    => $record->role_title,
                'first_name'    => $record->first_name,
                'last_name'     => $record->last_name,
                'email'         => $record->email,
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

    public function set_new_password($user_id,$pwd){
        if(isset($user_id) && !empty($user_id)) {
            $this->db->set('password',md5($pwd));
            $this->db->where('user_id',$user_id);
            $query = $this->db->update($this->table_name);
            if ($query) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function set_new_password_by_email($email,$pwd){
        if(isset($email) && !empty($email)) {
            $this->db->set('password',md5($pwd));
            $this->db->where('email',$email);
            $query = $this->db->update($this->table_name);
            if ($query) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function mail_exists($email) {
        $this->db->where('email',$email);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function insert_enquirey_details($enquiry_details){
        $success = $this->db->insert('tbl_contact_us', $enquiry_details);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    // public function get_all_users($user_id = false, $role_id=false, $display = false){
    //     $this->db->select('tu.*, tr.role_id,tr.role_title');
    //     $this->db->from('tbl_users tu');
    //     $this->db->join('tbl_role tr', 'tr.role_id = tu.role_id', 'inner');
    //     if(isset($display) && !empty($display)){
    //     	$this->db->where('tu.display', $display);
    //     }
    //     if($user_id){
    //     	$this->db->where('tu.user_id', $user_id);
    //     }

    //     if($role_id){
    //     	$this->db->where('tr.role_id', $user_id);
    //     }
    //     $this->db->order_by('tu.user_id', 'asc');
    //     $query = $this->db->get();
    //     if($query->num_rows()){
    //     	if($user_id){
    //     		return $query->row_array();
    //     	} else {
    //     		return $query->result_array(); 
    //     	}
    //     } else {
    //         return FALSE;
    //     }
    // }
    
    public function get_all_users($user_id = false, $role_id = false, $display = false) { //get_all_b2a
        $this->db->select('tu.*, tr.role_id, tr.role_title, b.country_name, c.state_name, d.city_name');
        $this->db->from('tbl_users tu');
        $this->db->join('tbl_role tr', 'tr.role_id = tu.role_id', 'left');
        $this->db->join('tbl_countries b', 'b.id = tu.country', 'left');
        $this->db->join('tbl_states c', 'c.id = tu.state', 'left' ); 
        $this->db->join('tbl_cities d', 'd.id = tu.city' , 'left' );
        if ($display) {
            $this->db->where('tu.display', $display);
        }
        if ($user_id) {
            $this->db->where('tu.user_id', $user_id);
        }
        if ($role_id) {
            $this->db->where('tr.role_id', $role_id);
        }

        $this->db->order_by('tu.user_id', 'asc');
        $query = $this->db->get();
        
        //echo $this->db->last_query(); //die;

        if ($query->num_rows()) {
            if ($user_id) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
    }

    function get_users($user_id = ''){
        $this->db->select('tu.*, b.country_name,c.state_name,d.city_name');
        $this->db->from('tbl_users tu');
        //$this->db->join('tbl_users tu', 'tu.user_id = to.user_id', 'inner');
        $this->db->join('tbl_countries b', 'b.id = tu.country_code', 'inner');
	    $this->db->join ('tbl_states c', 'c.id = tu.state', 'inner' ); 
	    $this->db->join ('tbl_cities d', 'd.id = tu.city' , 'inner' );
        if(isset($user_id) && !empty($user_id)){
            $this->db->where('tu.user_id', $user_id);
        }
        $query = $this->db->get();
        if($query->num_rows()){
            if(isset($user_id) && !empty($user_id)){
                return $query->row_array();
            }else {
                return $query->result_array();
            }
        } else {
            return FALSE;
        }
	}
}
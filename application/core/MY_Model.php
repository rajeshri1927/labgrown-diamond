<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class MY_Model extends CI_Model {

    protected $table_name = '';
    protected $primary_key = '';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
    }

    public function set_user_login($user_creds){   
        $this->db->select('*');
        $this->db->from($this->table_name);
        //if($user_creds['login_type'] === 'email'){
            $this->db->where('email', $user_creds['email']);
        //} else {
            //$this->db->where('contact_no', $user_creds['contact_no']);
        //}
        $this->db->where('password', md5($user_creds['password']));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all($fields = '', $where = null, $per_page = '', $page_no = '', $table = '',$order_by = '', $group_by = '') {
        $data = array();
        if ($fields != '') {
            $this->db->select($fields);
        }

        if($where != null){
            if(is_array($where)){
                if (count($where)) {
                    $this->db->where($where);
                }
            }
        }

        if ($table != '') {
            $this->table_name = $table;
        }

        if ($per_page != '' && $page_no != '') {
        	$limit = ($per_page * ($page_no-1));
            $this->db->limit($per_page,$limit);
        }

        if ($order_by != '') {
            $this->db->order_by($order_by);
        }

        
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }

        $Q = $this->db->get($this->table_name);

        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[]         = $row;
            }
        }

        $Q->free_result();

        return $data;
    }

    public function save_record($insert_data, $table_name = '') {
        $returnarray = array();
        $this->db->trans_start();
        try {
            
            if(!empty($table_name)){
                $result = $this->db->insert($table_name, $insert_data);
            }else{
                $result = $this->db->insert($this->table_name, $insert_data);
            }
            
            $error      = $this->db->error(); 
            $id         = $this->db->insert_id();
            $this->db->trans_complete();
            
            if($result) {
                if($id) {
                    $returnarray['id']      = $id;
                    $returnarray['state']   = TRUE;
                } else {
                    $returnarray['errormsg']    = "Unknown Error";
                    $returnarray['error_code']  = $error['code'];
                    $returnarray['state']       = FALSE;
                }
            } else {
                if($error['code'] === 1062) {
                    $errormsg = "Record already exists !";
                } else {
                    $errormsg = "Unknown Database error !";
                }
                
                $returnarray['errormsg']    = $errormsg;
                $returnarray['error_code']  = $error['code'];
                $returnarray['state']       = FALSE;
            }
        } catch (Exception $e) {
            $returnarray['errormsg']    ="Unlnown Error 2";
            $returnarray['state']       = FALSE;
        }
        return $returnarray;
    }

    public function update_record($update_data, $where, $table_name = '') {
        $this->returnarray = array();
        $this->db->where($where);
        
        if(!empty($table_name)){
            $result = $this->db->update($table_name, $update_data);
        }else{
            $result = $this->db->update($this->table_name, $update_data);
        }
        
        if($result) { 
            $num    = $this->db->affected_rows();
            if($num>0) {
                $this->returnarray['state'] = TRUE;
            } else {
                $this->returnarray['state'] = FALSE;
                $this->returnarray['msg']   = 'No changes made';
            }
       } else {
           if($error['code']) {
                $this->returnarray['state'] = FALSE;
                $this->returnarray['msg']   = $error['message'];
           } else {
                $this->returnarray['state'] = FALSE;
                $this->returnarray['msg']   = 'Unknown error occured';
           }
       }
       return $this->returnarray;
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }

    public function update_other_table($data,  $table_name, $primary_key, $id) {
        $this->db->where($primary_key, $id);
        return $this->db->update($table_name, $data);
    }
}
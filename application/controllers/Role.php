<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Role_model','role_model');
    }

	public function role_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/role/role';
				$data['title'] 				= 'Lab Grown Diamond | Role';
				$data['script']				= 'category.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	public function set_role() {
		$input_details 		= $this->input->post();
		$roleData 		    = array();
		$response 			= array();
		$admin_session	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('role_title', 'Role title', 'required');
	            $this->form_validation->set_rules('role_desc', 'Role description', 'required');
	            
	            $roleData['role_title']		= strip_tags($input_details['role_title']);
	            $roleData['role_desc']		= strip_tags($input_details['role_desc']);
	            $roleData['display']		= strip_tags($input_details['display']);
                $roleData['inserted_by']	= 1;

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['role_id']) && !empty($input_details['role_id'])){
	            		$where 	= array('role_id' => $input_details['role_id']);
	            		$result = $this->role_model->update_record($roleData, $where);
	            	}else{
	            		$result = $this->role_model->save_record($roleData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['role_id']) && !empty($input_details['role_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Role '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['role_id']) && !empty($input_details['role_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' role.');
	                }
	            }
	            else{
	                $response 	= array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'danger','message'=>$this->form_validation->error_array());
	            }
	        }
	        echo json_encode($response);
	    }else{
	    	redirect('admin/sign-in','refresh');	
	    }
	}

	public function get_roles(){
		$postData = $this->input->post();
     	$data = $this->role_model->get_roles($postData);
     	echo json_encode($data);
	}

	public function get_role(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->role_model->get_role($getData['role_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Role available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get role.');
		}
     	echo json_encode($response);
	}

    public function set_role_display(){
		$input_details = $this->input->post();
		if(isset($input_details['role_id']) && !empty($input_details['role_id'])){
			$where = array('role_id' => $input_details['role_id']);
            $result = $this->role_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

    public function delete_role(){
		$postData 	= $this->input->post();
		$response 	= array();
		$updataArr 	= array('display' => "N");
		$whereArr 	= array('role_id' => $postData['role_id']);
		$result 	= $this->role_model->update_record($updataArr, $whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}
}
?>
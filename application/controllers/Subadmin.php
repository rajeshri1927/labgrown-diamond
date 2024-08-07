<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
        $this->load->model('Role_model','role_model');
	}

    public function get_subadmin_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data  = array();
			$data['roles'] = $this->role_model->get_role();
            if(isset($inputData['user_id']) && !empty($inputData['user_id'])){
				$data['subadmin'] = $this->auth_model->get_all_users($inputData['user_id']);
			}
			$view 		= $this->load->view('admin/subadmin/subadmin-form',$data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'','data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

    
	// public function get_all_subadmin(){
	// 	$postData = $this->input->post();
    //  	$data = $this->auth_model->get_all_users($postData);
    //  	echo json_encode($data);
	// }

    public function get_all_subadmin(){
		$inputData 		= array();
		$response 		= null;
		$role_id        = '1';
		$result  	    = $this->auth_model->get_all_users('',$role_id,'');
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Subadmin available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get subadmin.');
		}
     	echo json_encode($response);
	}

    public function get_subadmin(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->auth_model->get_user($getData['user_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Subadmin available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get subadmin.');
		}
     	echo json_encode($response);
	}

	public function set_subadmin_display(){
		$input_details = $this->input->post();
		if(isset($input_details['user_id']) && !empty($input_details['user_id'])){
			$where = array('user_id' => $input_details['user_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->auth_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type' => 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_subadmin(){
		$postData 	= $this->input->post();
		$response 	= array();
		//$updataArr 	= array('display' => "N");
		$whereArr 	= $postData['user_id'];
		//$whereArr 	= array('user_id' => $postData['user_id']);
		//$result 	= $this->auth_model->update_record($updataArr, $whereArr);
		$result 	= $this->auth_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
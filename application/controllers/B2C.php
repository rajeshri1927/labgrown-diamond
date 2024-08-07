<?php defined('BASEPATH') OR exit('No direct script access allowed');

class B2C extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
        $this->load->model('Role_model','role_model');
        $this->load->model('Site','location');
	}

    public function get_b2c_form_view(){
		$admin_session = $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			$data['roles']  = $this->role_model->get_role();
			$data['countries'] = $this->location->getAllCountries();
            if(isset($inputData['user_id']) && !empty($inputData['user_id'])){
				$data['b2c'] = $this->auth_model->get_all_users($inputData['user_id']);
			}
			print_r($data['b2c']);die;
			$view 		= $this->load->view('admin/b2c/b2c-form',$data, true);
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
    
    public function get_all_b2c(){
		$inputData 		= array();
		$response 		= null;
		$display        = 'N';
		$role_id        = '2';
		$result  	    = $this->auth_model->get_all_users('',$role_id,'');
		//echo "<pre>";print_r($result);die;
		if($result){
		    $response = array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'B2C available.','data'=>$result);
		}
		else{
		    $response = array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get B2C.');
		}
     	echo json_encode($response);
	}

    public function get_b2c(){ 
		$response 	= array();
		$getData 	= $this->inpeut->get();
     	$result 	= $this->auth_model->get_user($getData['user_id']);
		if($result){
		    $response = array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'B2A available.','data'=>$result);
		}
		else{
		    $response = array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get b2a.');
		}
     	echo json_encode($response);
	}

	public function set_b2c_display(){ 
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

	public function delete_b2c(){
		$postData 	= $this->input->post();
		$response 	= array();
		$updataArr 	= array('display' => "N");
		//$whereArr 	= $postData['user_id'];
		$whereArr 	= array('user_id' => $postData['user_id']);
		$result 	= $this->auth_model->update_record($updataArr, $whereArr);
		//$result 	= $this->auth_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
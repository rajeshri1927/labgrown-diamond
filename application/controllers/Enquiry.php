<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Enquiry_model','enquiry_model');
    }

	public function get_enquiry_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			//print_r($inputData);die;
			$data = array();
			if(isset($inputData['enquiry_id']) && !empty($inputData['enquiry_id'])){
				$data['enquires'] 		= $this->enquiry_model->get_enquiry($inputData['enquiry_id']);
			}
			$view 		= $this->load->view('admin/enquiry/enquiry-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function get_enquiry(){
		$inputData 		= array();
		$response 		= null;
		$result  		= $this->enquiry_model->get_enquiry();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'news available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get news.');
		}
     	echo json_encode($response);
	}

	public function delete_enquiry(){
		$input_details = $this->input->post();
		if(isset($input_details['enquiry_id']) && !empty($input_details['enquiry_id'])){
			$result 	= $this->enquiry_model->delete($input_details['enquiry_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_enquiry_display(){
		$input_details = $this->input->post();
		if(isset($input_details['enquiry_id']) && !empty($input_details['enquiry_id'])){
			$where = array('enquiry_id' => $input_details['enquiry_id']);
            $result = $this->enquiry_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
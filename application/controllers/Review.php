<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Category_model','category_model');
	    $this->load->model('Review_Model','review_model');
	    $this->load->model('Site','location');
    }

	public function get_review_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			$data['categories'] = $this->category_model->get_category();
			if(isset($inputData['review_id']) && !empty($inputData['review_id'])){
				$data['review'] 		= $this->review_model->get_reviews($inputData['review_id']);
			}
			$view 		= $this->load->view('admin/review/review-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function get_reviews(){
		$inputData 		= array();
		$response 		= null;
		$result  	= $this->review_model->get_review();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}

	public function delete_review(){
		$input_details = $this->input->post();
		if(isset($input_details['review_id']) && !empty($input_details['review_id'])){
			$result 	= $this->review_model->delete($input_details['review_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_review_display(){
		$input_details = $this->input->post();
		if(isset($input_details['review_id']) && !empty($input_details['review_id'])){
			$where = array('review_id' => $input_details['review_id']);
            $result = $this->review_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
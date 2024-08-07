<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Overtone extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Overtone_model','overtone_model');
    }

	public function set_overtone_details() {
		$input_details 		= $this->input->post();
		$overtoneData 		= array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('overtone_name', 'Overtone Name', 'required');
	            $this->form_validation->set_rules('overtone_desc', 'Overtone description', 'required');
	            
	            $overtoneData['overtone_name']		= strip_tags($input_details['overtone_name']);
	            $overtoneData['overtone_desc']		= strip_tags($input_details['overtone_desc']);
	            $overtoneData['display']			= strip_tags($input_details['display']);

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['overtone_id']) && !empty($input_details['overtone_id'])){
	            		$where 	= array('overtone_id' => $input_details['overtone_id']);
	            		$result = $this->overtone_model->update_record($overtoneData, $where);
	            	}else{
	            		$result = $this->overtone_model->save_record($overtoneData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['overtone_id']) && !empty($input_details['overtone_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'overtone ' .$message. ' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['overtone_id']) && !empty($input_details['overtone_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' category.');
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

	public function get_overtones(){
		$postData = $this->input->post();
     	$data = $this->overtone_model->get_overtones($postData);
     	echo json_encode($data);
	}

	public function get_overtone(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->overtone_model->get_overtone($getData['overtone_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Overtone available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get Overtone.');
		}
     	echo json_encode($response);
	}

    public function delete_overtone(){
		$input_details = $this->input->post();
		if(isset($input_details['overtone_id']) && !empty($input_details['overtone_id'])){
			$result 	= $this->overtone_model->delete($input_details['overtone_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

    public function set_overtone_display(){
		$input_details = $this->input->post();
		if(isset($input_details['overtone_id']) && !empty($input_details['overtone_id'])){
			$where = array('overtone_id' => $input_details['overtone_id']);
            $result = $this->overtone_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
?>
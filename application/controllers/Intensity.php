<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Intensity extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Intensity_model','intensity_model');
    }

	public function set_intensity_details() {
		$input_details 		= $this->input->post();
		$intensityData 		= array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('intensity_name', 'Intensity Name', 'required');
	            $this->form_validation->set_rules('intensity_desc', 'Intensity description', 'required');
	            
	            $intensityData['intensity_name']  = strip_tags($input_details['intensity_name']);
	            $intensityData['intensity_desc']  = strip_tags($input_details['intensity_desc']);
	            $intensityData['display']		  = strip_tags($input_details['display']);

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['intensity_id']) && !empty($input_details['intensity_id'])){
	            		$where 	= array('intensity_id' => $input_details['intensity_id']);
	            		$result = $this->intensity_model->update_record($intensityData, $where);
	            	}else{
	            		$result = $this->intensity_model->save_record($intensityData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['intensity_id']) && !empty($input_details['intensity_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Intensity ' .$message. ' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['intensity_id']) && !empty($input_details['intensity_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' intensity.');
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

	public function get_intensities(){
		$postData = $this->input->post();
     	$data = $this->intensity_model->get_intensities($postData);
     	echo json_encode($data);
	}

	public function get_intensity(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->intensity_model->get_intensity($getData['intensity_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Intensity available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get Overtone.');
		}
     	echo json_encode($response);
	}

    public function delete_intensity(){
		$input_details = $this->input->post();
		if(isset($input_details['intensity_id']) && !empty($input_details['intensity_id'])){
			$result 	= $this->intensity_model->delete($input_details['intensity_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

    public function set_intensity_display(){
		$input_details = $this->input->post();
		if(isset($input_details['intensity_id']) && !empty($input_details['intensity_id'])){
			$where = array('intensity_id' => $input_details['intensity_id']);
            $result = $this->intensity_model->update_record($input_details, $where);
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
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProductMeasurement extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('Product_measure_model','product_measure_model');
	}

    public function get_product_measure_form_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 			= 'admin/measure/measure';
				$data['title'] 			= 'Lab Grown Diamond | Product Measurement';
				$data['script']			= 'measure.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}
    
    public function get_product_measurement(){
		$postData = $this->input->post();
     	$data = $this->product_measure_model->get_product_measurement($postData);
     	echo json_encode($data);
	}

	public function set_product_measurement() {
		$input_details 	   = $this->input->post();
		$measurementData   = array();
		$response 		   = array();
		$admin_session	   = $this->session->userdata('admin');
		$is_logged_in 	   = $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('measure_title', 'Measure title', 'required');
	            $measurementData['measure_title']	     = strip_tags($input_details['measure_title']);
				
	            if($this->form_validation->run() == true){
	            	if(isset($input_details['measure_id']) && !empty($input_details['measure_id'])){
	            		$where 	= array('measure_id' => $input_details['measure_id']);
	            		$result = $this->product_measure_model->update_record($measurementData , $where);
	            	}else{
	            		$result = $this->product_measure_model->save_record($measurementData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['measure_id']) && !empty($input_details['measure_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['measure_id']) && !empty($input_details['measure_id']))?'update':'save';
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

    public function get_measure(){
		$response 	= array();
        $getData 	= $this->input->get();
     	$result 	= $this->product_measure_model->get_measure($getData['measure_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Product Measure available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get product measure.');
		}
     	echo json_encode($response);
	}

	public function set_product_measure_display(){
		$input_details = $this->input->post();
		if(isset($input_details['measure_id']) && !empty($input_details['measure_id'])){
			$where = array('measure_id' => $input_details['measure_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->product_measure_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_product_measure(){
		$postData 	= $this->input->post();
		$response 	= array();
		$whereArr 	= $postData['measure_id'];
		$result 	= $this->product_measure_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
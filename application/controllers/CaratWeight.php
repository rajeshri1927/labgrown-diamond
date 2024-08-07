<?php defined('BASEPATH') OR exit('No direct script access allowed');
class CaratWeight extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Carat_weight_model','carat_weight_model');
    }
    
	public function get_carat_weight_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			if(isset($inputData['carat_weight_id']) && !empty($inputData['carat_weight_id'])){
				$data['caratweight'] = $this->carat_weight_model->get_carat_weight($inputData['carat_weight_id']);
			}
			$view 		= $this->load->view('admin/caratweight/caratweight-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}
    
    public function set_carat_weight_details(){
		$caratweightData = array();
		$response        = array();
		$carat_weight_details   = $this->input->post();
		$admin_session 	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
			if($carat_weight_details)
			{
				$this->form_validation->set_data($carat_weight_details);
				$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('carat_weight', 'Carat Weight', 'required');
				
				$caratweightData['carat_weight']   = strip_tags($carat_weight_details['carat_weight']);
				if($this->form_validation->run() == true)
				{
					$table_name = 'tbl_price_range';
					if(isset($carat_weight_details['carat_weight_id']) && !empty($carat_weight_details['carat_weight_id'])){
						$where = array('carat_weight_id'=>$carat_weight_details['carat_weight_id']);
						$insert = $this->carat_weight_model->update_record($caratweightData, $where);
					} else {
						$insert = $this->carat_weight_model->save_record($caratweightData);
					}
					if($insert)
					{
						$message 	= (isset($carat_weight_details['carat_weight_id']) && !empty($carat_weight_details['carat_weight_id']))?'Updated':'Saved';
						$response 	= array('state'=>TRUE,'title'=>'Carat Weight Record '. $message .' Successful!','type'=>'success','description'=>'Record Details '.$message.' Successful','redirect'=>'price-range-code');
					}
					else
					{
						$message 	= (isset($carat_weight_details['carat_weight_id']) && !empty($carat_weight_details['carat_weight_id']))?'updated':'saved';
						$response 	= array('state'=>FALSE,'title'=>'Record'.$message.' Failed.','type'=>'error','description'=>'Unable to Save details');
					}
				}
				else
				{
						$response 	= array('state'=>FALSE,'title'=>'Already Data Exists! OR Insufficiant Details!','type'=>'error','description'=>$this->form_validation->error_array());
				}
			}
			echo json_encode($response);
		}else {
			redirect('admin/login','refresh');	
		}
	}
    
	public function get_carat_weight(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->carat_weight_model->get_carat_weight();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Carat Weight Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get carat weight.');
		}
 	    echo json_encode($response);
	}

	public function delete_carat_weight(){
		$input_details = $this->input->post();
		if(isset($input_details['carat_weight_id']) && !empty($input_details['carat_weight_id'])){
			$result 	= $this->carat_weight_model->delete($input_details['carat_weight_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => 'Deleted Successfully!','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'Unable to delete','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}	

	public function set_carat_weight_display(){
		$input_details = $this->input->post();
		if(isset($input_details['carat_weight_id']) && !empty($input_details['carat_weight_id'])){
			$where = array('carat_weight_id' => $input_details['carat_weight_id']);
			$input_detail = array('display'  => $input_details['display']);
            $result = $this->carat_weight_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class PriceRange extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Price_range_model','price_range_model');
    }
    
	public function get_price_range_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			if(isset($inputData['price_range_id']) && !empty($inputData['price_range_id'])){
				$data['pricerange'] = $this->price_range_model->get_price_range($inputData['price_range_id']);
			}
			$view 		= $this->load->view('admin/pricerange/pricerange-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}
    
    public function set_price_range_details(){
		$pricerangeData = array();
		$response       = array();
		$price_range_details   = $this->input->post();
		$admin_session 	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
			if($price_range_details)
			{
				$this->form_validation->set_data($price_range_details);
				$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('price_range', 'Price Range', 'required');
				
				$pricerangeData['price_range']   = strip_tags($price_range_details['price_range']);
				if($this->form_validation->run() == true)
				{
					$table_name = 'tbl_price_range';
					if(isset($price_range_details['price_range_id']) && !empty($price_range_details['price_range_id'])){
						$where = array('price_range_id'=>$price_range_details['price_range_id']);
						$insert = $this->price_range_model->update_record($pricerangeData, $where);
					} else {
						$insert = $this->price_range_model->save_record($pricerangeData);
					}
					if($insert)
					{
						$message 	= (isset($price_range_details['price_range_id']) && !empty($price_range_details['price_range_id']))?'Updated':'Saved';
						$response 	= array('state'=>TRUE,'title'=>'Price Range Record '. $message .' Successful!','type'=>'success','description'=>'Record Details '.$message.' Successful','redirect'=>'price-range-code');
					}
					else
					{
						$message 	= (isset($price_range_details['price_range_id']) && !empty($price_range_details['price_range_id']))?'updated':'saved';
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
    
	public function get_price_range(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->price_range_model->get_price_range();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Price range available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get price range.');
		}
 	    echo json_encode($response);
	}

	public function delete_price_range(){
		$input_details = $this->input->post();
		if(isset($input_details['price_range_id']) && !empty($input_details['price_range_id'])){
			$result 	= $this->price_range_model->delete($input_details['price_range_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => 'Deleted Successfully!','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'Unable to delete','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_price_range_display(){
		$input_details = $this->input->post();
		if(isset($input_details['price_range_id']) && !empty($input_details['price_range_id'])){
			$where = array('price_range_id' => $input_details['price_range_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->price_range_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
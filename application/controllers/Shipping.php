<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->database();
        $this->load->model('Site','location');
        $this->load->model('Shipping_model','shipping_model');
		$this->load->model('Color_model','color_model');
		$this->load->model('Clarity_model','clarity_model');
	}

    public function get_shipping_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
		    $data['countries']  = $this->location->getAllCountries();
			$data['colors']     = $this->color_model->get_color();
			$data['clarities']  = $this->clarity_model->get_clarity();
            if(isset($inputData['shipping_id']) && !empty($inputData['shipping_id'])){
				$data['shippings'] = $this->shipping_model->get_shipping($inputData['shipping_id']);
			}
			$view 		= $this->load->view('admin/shipping/shipping-form.php',$data , true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'','data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_shipping_details() {
		$input_details 		= $this->input->post();
		$shippingData 		= array();
		$response 			= array();
        $admin_session 	    = $this->session->userdata('admin');
    	$is_logged_in 	    = $admin_session['isLoggedIn'];
		$user_id 		    = $admin_session['user_id'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('country_id', 'Country ID', 'required');
	            // $this->form_validation->set_rules('discount', 'Discount', 'required');
	            $this->form_validation->set_rules('gst', 'GST', 'required');
	            $this->form_validation->set_rules('shipping', 'Shipping', 'required');
				
				$shippingData['country_id']	 = strip_tags($input_details['country_id']);
	            // $shippingData['discount'  = strip_tags($input_details['discount']);
				$shippingData['clarity_id']	 = strip_tags($input_details['clarity_id']);
                $shippingData['color_id']	 = strip_tags($input_details['color_id']);
	            $shippingData['gst']	     = strip_tags($input_details['gst']);
                $shippingData['shipping']	 = strip_tags($input_details['shipping']);
                $shippingData['display']	 = 'Y';
				$shippingData['inserted_by'] = $user_id;
				$shippingData['inserted_on'] = date('Y-m-d H:i:s');

	            if($this->form_validation->run() == true){
	            	if(isset($input_details['shipping_id']) && !empty($input_details['shipping_id'])){
	            		$where 	= array('shipping_id' => $input_details['shipping_id']);
	            		$result = $this->shipping_model->update_record($shippingData, $where);
	            	}else{
	            		$result = $this->shipping_model->save_record($shippingData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['shipping_id']) && !empty($input_details['shipping_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'shipping '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['shipping_id']) && !empty($input_details['shipping_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' shipping.');
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

	public function get_shippings(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->shipping_model->get_shippings();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Shipping Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get Shipping.');
		}
     	echo json_encode($response);
	}
	
	public function set_shipping_display(){
		$input_details = $this->input->post();
		if(isset($input_details['shipping_id']) && !empty($input_details['shipping_id'])){
			$where = array('shipping_id' => $input_details['shipping_id']);
			$input_detail = array('display'  => $input_details['display']);
            $result = $this->shipping_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_shipping(){
		$postData 	= $this->input->post();
		$response 	= array();
		$whereArr 	= $postData['shipping_id'];
		$result 	= $this->shipping_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
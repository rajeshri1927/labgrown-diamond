<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Discount extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Discount_model','discount_model');
    }

	public function set_discount_details() {
		$input_details 		= $this->input->post();
		$discountData 		= array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
        $user_id 		    = $admin_session['user_id'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('item_name', 'Item Name', 'required');
	            $this->form_validation->set_rules('discount_percent', 'Discount Percent', 'required');
	            
	            $discountData['item_name']		  = strip_tags($input_details['item_name']);
	            $discountData['discount_percent'] = strip_tags($input_details['discount_percent']);
                $discountData['discount']         = strip_tags($input_details['discount']);
                $discountData['display']	      = 'Y';
				$discountData['inserted_by']      = $user_id;
				$discountData['inserted_on']      = date('Y-m-d H:i:s');

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['discount_id']) && !empty($input_details['discount_id'])){
	            		$where 	= array('discount_id' => $input_details['discount_id']);
	            		$result = $this->discount_model->update_record($discountData, $where);
	            	}else{
	            		$result = $this->discount_model->save_record($discountData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['discount_id']) && !empty($input_details['discount_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'discount ' .$message. ' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['discount_id']) && !empty($input_details['discount_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' discount.');
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

	public function get_discounts(){
		$postData = $this->input->post();
     	$data = $this->discount_model->get_discounts($postData);
     	echo json_encode($data);
	}

	public function get_discount(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->discount_model->get_discount($getData['discount_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Discount available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get Discount.');
		}
     	echo json_encode($response);
	}

    public function delete_discount(){
		$input_details = $this->input->post();
		if(isset($input_details['discount_id']) && !empty($input_details['discount_id'])){
			$result 	= $this->discount_model->delete($input_details['discount_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

    public function set_discount_display(){
		$input_details = $this->input->post();
		if(isset($input_details['discount_id']) && !empty($input_details['discount_id'])){
			$where  = array('discount_id' => $input_details['discount_id']);
            $result = $this->discount_model->update_record($input_details, $where);
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
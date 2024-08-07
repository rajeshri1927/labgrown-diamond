<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Offer extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Offer_model','offer_model');
    }

	public function set_offer_details() {
		$input_details 		= $this->input->post();
		$offerData 		    = array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
        $user_id 		    = $admin_session['user_id'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('offer_item_name', 'Offer Item Name', 'required');
	            $this->form_validation->set_rules('offer_percent', 'Offer Percent', 'required');
	            
	            $offerData['offer_item_name']  = strip_tags($input_details['offer_item_name']);
	            $offerData['offer_percent']    = strip_tags($input_details['offer_percent']);
                $offerData['offer']            = strip_tags($input_details['offer']);
                $offerData['display']	       = 'Y';
				$offerData['inserted_by']      = $user_id;
				$offerData['inserted_on']      = date('Y-m-d H:i:s');

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['offer_id']) && !empty($input_details['offer_id'])){
	            		$where 	= array('offer_id' => $input_details['offer_id']);
	            		$result = $this->offer_model->update_record($offerData, $where);
	            	}else{
	            		$result = $this->offer_model->save_record($offerData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['offer_id']) && !empty($input_details['offer_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'offer ' .$message. ' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['offer_id']) && !empty($input_details['offer_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' offer.');
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

	public function get_offers(){
		$postData = $this->input->post();
     	$data     = $this->offer_model->get_offers($postData);
     	echo json_encode($data);
	}

	public function get_offer(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->offer_model->get_offer($getData['offer_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Offer available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get Offer.');
		}
     	echo json_encode($response);
	}

    public function delete_offer(){
		$input_details = $this->input->post();
		if(isset($input_details['offer_id']) && !empty($input_details['offer_id'])){
			$result   = $this->offer_model->delete($input_details['offer_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

    public function set_offer_display(){
		$input_details = $this->input->post();
		if(isset($input_details['offer_id']) && !empty($input_details['offer_id'])){
			$where  = array('offer_id' => $input_details['offer_id']);
            $result = $this->offer_model->update_record($input_details, $where);
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
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class PurchasePrice extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Purchase_price_model','purchase_price_model');
    }

	public function set_purchase_price_details() {
		$input_details 		= $this->input->post();
		$priceData 		    = array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
        $user_id 		    = $admin_session['user_id'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('purchase_item_name', 'Purchase Item Name', 'required');
	            $this->form_validation->set_rules('purchase_percent', 'Purchase Percent', 'required');
				$this->form_validation->set_rules('purchase_price', 'Purchase Price', 'required');

	            
	            $priceData['country_name'] = strip_tags($input_details['country_name']);
	            $priceData['transaction_name'] = strip_tags($input_details['transaction_name']);
	            $priceData['purchase_item_name'] = strip_tags($input_details['purchase_item_name']);
	            $priceData['purchase_percent'] = strip_tags($input_details['purchase_percent']);
                $priceData['purchase_price']   = strip_tags($input_details['purchase_price']);
                $priceData['display']	       = 'Y';
				$priceData['inserted_by']      = $user_id;
				$priceData['inserted_on']      = date('Y-m-d H:i:s');

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['purchase_id']) && !empty($input_details['purchase_id'])){
	            		$where 	= array('purchase_id' => $input_details['purchase_id']);
	            		$result = $this->purchase_price_model->update_record($priceData, $where);
	            	}else{
	            		$result = $this->purchase_price_model->save_record($priceData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['purchase_id']) && !empty($input_details['purchase_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Purchase ' .$message. ' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['purchase_id']) && !empty($input_details['purchase_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' Purchase.');
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

	public function get_purchase_prices(){
		$postData = $this->input->post();
     	$data = $this->purchase_price_model->get_purchase_prices($postData);
     	echo json_encode($data);
	}

	public function get_purchase_price(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->purchase_price_model->get_purchase_price($getData['purchase_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Purchase Price available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get purchase price.');
		}
     	echo json_encode($response);
	}

    public function delete_purchase_price(){
		$input_details = $this->input->post();
		if(isset($input_details['purchase_id']) && !empty($input_details['purchase_id'])){
			$result   = $this->purchase_price_model->delete($input_details['purchase_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

    public function set_purchase_price_display(){
		$input_details = $this->input->post();
		if(isset($input_details['purchase_id']) && !empty($input_details['purchase_id'])){
			$where  = array('purchase_id' => $input_details['purchase_id']);
            $result = $this->purchase_price_model->update_record($input_details, $where);
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
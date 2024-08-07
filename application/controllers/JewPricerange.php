<?php defined('BASEPATH') OR exit('No direct script access allowed');
class JewPricerange extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('jewellary/Pricerange_model','pricerange_model');
    }

	public function jewellary_pricerange_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/jewellary/pricerange/pricerange';
				$data['title'] 				= 'Lab Grown Diamond | Pricerange';
				$data['script']				= 'jewellary/pricerange.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	public function set_jewellary_pricerange() {
		$input_details 	= $this->input->post();
		$priceData 	= array();
		$response 		= array();
		$admin_session	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',','); 
				$this->form_validation->set_rules('price_tablename', 'Price Table Name', 'required');
	            $this->form_validation->set_rules('PriceStart', 'Start Price', 'required');
	            $this->form_validation->set_rules('PriceEnd', 'End Price', 'required');

				$priceData['price_tablename']			= strip_tags($input_details['price_tablename']);
	            $priceData['PriceStart']			= strip_tags($input_details['PriceStart']);
	            $priceData['PriceEnd']			= strip_tags($input_details['PriceEnd']);
	            //$categoryData['display']				= strip_tags($input_details['display']);

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['pricerange_id']) && !empty($input_details['pricerange_id'])){
	            		$where 	= array('pricerange_id' => $input_details['pricerange_id']);
	            		$result = $this->pricerange_model->update_record($priceData, $where);
	            	}else{
						$result = $this->pricerange_model->save_record($priceData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['pricerange_id']) && !empty($input_details['pricerange_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'pricerange '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['pricerange_id']) && !empty($input_details['pricerange_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' pricerange.');
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

	public function get_jewellary_priceranges(){
		$postData = $this->input->post();
		$data = $this->pricerange_model->get_priceranges($postData);
     	echo json_encode($data);
	}

	public function get_jewellary_pricerange(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->pricerange_model->get_pricerange($getData['pricerange_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'pricerange available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get category.');
		}
     	echo json_encode($response);
	}

	public function delete_jewellary_pricerange(){
		$postData 	= $this->input->post();
		$response 	= array();
		//$updataArr 	= array('display' => "N");
		//$whereArr 	= array('pricerange_id' => $postData['pricerange_id']);
		$result 	= $this->pricerange_model->delete($postData['pricerange_id']);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}
}
?>
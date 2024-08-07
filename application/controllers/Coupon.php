<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Coupon extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Category_model','category_model');
	    $this->load->model('Coupon_model','coupon_model');
	    $this->load->model('Product_Model','product_model');
	    $this->load->model('Site','location');
    }
    
	public function get_coupon_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			$data['categories'] = $this->category_model->get_category();
			if(isset($inputData['coupon_id']) && !empty($inputData['coupon_id'])){
				$data['coupon'] 		= $this->coupon_model->get_coupon($inputData['coupon_id']);
			}
			$view 		= $this->load->view('admin/coupon/coupon-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}
    
    public function set_coupon_details(){
    		$userData = array();
    		$response = array();
            $user_details   = $this->input->post();
            $admin_session 	= $this->session->userdata('admin');
    	    $is_logged_in 	= $admin_session['isLoggedIn'];
    		if($is_logged_in){
                if($user_details)
                {
                	$this->form_validation->set_data($user_details);
                	$this->form_validation->set_error_delimiters('',',');
                    $this->form_validation->set_rules('coupon_unique_id', 'Coupon Unique Id', 'required');
                    $this->form_validation->set_rules('product_category', 'Product Category Id', 'required');
                    
        
                    $userData['coupon_unique_id']  = strip_tags($user_details['coupon_unique_id']);
                    $userData['category_id']	   = strip_tags($user_details['product_category']);
                    $userData['inserted_datetime'] = strip_tags($user_details['inserted_datetime']);
                    $userData['expired_datetime']  = strip_tags($user_details['expired_datetime']);
                    if($this->form_validation->run() == true)
                    {
                    	$table_name = 'tbl_coupon';
                    	if(isset($user_details['coupon_id']) && !empty($user_details['coupon_id'])){
    						$where = array('coupon_id'=>$user_details['coupon_id']);
    						$insert = $this->coupon_model->update_record($userData, $where);
    					} else {
                            $insert = $this->coupon_model->save_record($userData);
    					}
                        if($insert)
                        {
                            $message 	= (isset($user_details['coupon_id']) && !empty($user_details['coupon_id']))?'Updated':'Saved';
                            $response 	= array('state'=>TRUE,'title'=>'Coupon Record '. $message .' Successful!','type'=>'success','description'=>'Record Details '.$message.' Successful','redirect'=>'coupon-code');
                        }
                        else
                        {
                            $message 	= (isset($user_details['coupon_id']) && !empty($user_details['coupon_id']))?'updated':'saved';
                            $response 	= array('state'=>FALSE,'title'=>'Record'.$message.' Failed.','type'=>'error','description'=>'Unable to Save details');
                        }
                    }
                    else
                    {
                          $response 	= array('state'=>FALSE,'title'=>'Already Email Exists! OR Insufficiant Details!','type'=>'error','description'=>$this->form_validation->error_array());
                    }
                }
                echo json_encode($response);
            }else {
    	    	redirect('admin/login','refresh');	
    	    }
        }
    

	public function get_coupon(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->coupon_model->get_coupon();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Coupon available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
 	    echo json_encode($response);
	}

	public function delete_coupon(){
		$input_details = $this->input->post();
		if(isset($input_details['coupon_id']) && !empty($input_details['coupon_id'])){
			$result 	= $this->coupon_model->delete($input_details['coupon_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => 'Deleted Successfully!','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'Unable to delete','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_coupon_display(){
		$input_details = $this->input->post();
		if(isset($input_details['coupon_id']) && !empty($input_details['coupon_id'])){
			$where = array('coupon_id' => $input_details['coupon_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->coupon_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
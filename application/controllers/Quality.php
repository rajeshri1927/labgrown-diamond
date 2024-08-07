<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Quality extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Quality_model','quality_model');
	    // $this->load->model('Coupon_model','coupon_model');
	    // $this->load->model('Product_Model','product_model');
	    // $this->load->model('Site','location');
    }
    
	public function get_quality_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			if(isset($inputData['quality_id']) && !empty($inputData['quality_id'])){
				$data['quality'] = $this->quality_model->get_quality($inputData['quality_id']);
			}
			$view 		= $this->load->view('admin/quality/quality-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}
    
    public function set_quality_details(){
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
                    $this->form_validation->set_rules('quality_name', 'Quality Name', 'required');
                    
					$userData['quality_name']         = strip_tags($user_details['quality_name']);
                    $userData['quality_color_from']   = strip_tags($user_details['quality_color_from']);
                    $userData['quality_color_to']	  = strip_tags($user_details['quality_color_to']);
                    $userData['quality_clarity_from'] = strip_tags($user_details['quality_clarity_from']);
                    $userData['quality_clarity_to']   = strip_tags($user_details['quality_clarity_to']);
                    if($this->form_validation->run() == true)
                    {
                    	$table_name = 'tbl_quality';
                    	if(isset($user_details['quality_id']) && !empty($user_details['quality_id'])){
    						$where = array('quality_id'=>$user_details['quality_id']);
    						$insert = $this->quality_model->update_record($userData, $where);
    					} else {
                            $insert = $this->quality_model->save_record($userData);
    					}
                        if($insert)
                        {
                            $message 	= (isset($user_details['quality_id']) && !empty($user_details['quality_id']))?'Updated':'Saved';
                            $response 	= array('state'=>TRUE,'title'=>'Quality Record '. $message .' Successful!','type'=>'success','description'=>'Record Details '.$message.' Successful','redirect'=>'quality-code');
                        }
                        else
                        {
                            $message 	= (isset($user_details['quality_id']) && !empty($user_details['quality_id']))?'updated':'saved';
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
    
	public function get_quality(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->quality_model->get_quality();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Coupon available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
 	    echo json_encode($response);
	}

	public function delete_quality(){
		$input_details = $this->input->post();
		if(isset($input_details['quality_id']) && !empty($input_details['quality_id'])){
			$result 	= $this->quality_model->delete($input_details['quality_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => 'Deleted Successfully!','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'Unable to delete','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_quality_display(){
		$input_details = $this->input->post();
		if(isset($input_details['quality_id']) && !empty($input_details['quality_id'])){
			$where = array('quality_id' => $input_details['quality_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->quality_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}
}
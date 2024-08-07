<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Facebook extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
	}

	function email_exists($email) {
	  	$result = $this->auth_model->mail_exists($email);
        if ($result){
            $this->form_validation->set_message('email_exists', 'This {field} already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
	}

	public function login_with_facebook() {
		$user_details 	= $this->input->post();
		$userData 		= array();
		$response 		= array();
        if($user_details){


			$this->form_validation->set_data($user_details);
        	$this->form_validation->set_error_delimiters('',',');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            	
            $userData['first_name']		= strip_tags($user_details['first_name']);
            $userData['last_name']		= strip_tags($user_details['last_name']);
            $userData['email']			= strip_tags($user_details['email']);
            $userData['role_id']		= 2;
			$userData['inserted_by']	= 1;
			$userData['is_fb_user'] 	= 'Y';
            if($this->form_validation->run()) {
            	$email_exists = $this->auth_model->mail_exists($userData['email']);
            	if(!$email_exists){
            		$result = $this->auth_model->save_record($userData);
            		if($result['state']) {
	                	$userResult = $this->auth_model->get_user_by_email($userData['email']);
	                	if($userResult){
	                		$sess_data['user'] 		= array('isLoggedIn' => TRUE, 'user_id' => $userResult['user_id'], 'role_id' => $userResult['role_id'], 'first_name' => $userResult['first_name'], 'last_name' => $userResult['last_name'], 'is_fb_user' => $userResult['is_fb_user']);
							$this->session->set_userdata($sess_data);
							$response 	= 	array('state' => TRUE, 'title'=>'Login Successful!', 'type'=>'success', 'message'=>'Welcome to Vibhanatural.');
	                	} else {
	                		$response = array('state'=>FALSE,'title'=>'Facebook login failed.','type'=>'error','message'=>'');
	                	}
	                } else {
	                    $response = array('state'=>FALSE,'title'=>'Facebook login failed.','type'=>'error','message'=>'');
	                }
            	} else {
        			$userResult = $this->auth_model->get_user_by_email($userData['email']);
                	if($userResult){
                		$sess_data['user'] 		= array('isLoggedIn' => TRUE, 'user_id' => $userResult['user_id'], 'role_id' => $userResult['role_id'], 'first_name' => $userResult['first_name'], 'last_name' => $userResult['last_name']);
						$this->session->set_userdata($sess_data);
						$response 	= 	array('state' => TRUE, 'title'=>'Login Successful!', 'type'=>'success', 'message'=>'Welcome to Vibhanatural.');
                	} else {
                		$response = array('state'=>FALSE,'title'=>'Facebook login failed.','type'=>'error','message'=>'');
                	}
            	}
            } else {
                $response = array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'error','message'=>$this->form_validation->error_array());
            }
        }
        echo json_encode($response);
	}
}
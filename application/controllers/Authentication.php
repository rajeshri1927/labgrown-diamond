<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->library('email');
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
    
	public function get_user_form_view(){
	    $user_session	= $this->session->userdata('user');
		if($user_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			$data['categories'] = $this->category_model->get_category();
			if(isset($inputData['user_id']) && !empty($inputData['user_id'])){
				$data['user'] = $this->auth_model->get_users($inputData['user_id']);
			}
			$view 		= $this->load->view('registration', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}
	
	// public function set_user_details() {
	// 	$user_details 	= $this->input->post();
	// 	//print_r($user_details);die;
	// 	$userData 		= array();
	// 	$response 		= array();
    //     if($user_details){
	// 		$this->form_validation->set_data($user_details);
    //     	$this->form_validation->set_error_delimiters('',',');
    //         $this->form_validation->set_rules('first_name', 'First Name', 'required');
    //         $this->form_validation->set_rules('last_name', 'Last Name', 'required');
	// 		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_exists');
    //         if(isset($user_details['user_id']) && !empty($user_details['user_id'])){
	// 			$this->form_validation->set_rules('email', 'Email', 'required');
    //         	$this->form_validation->set_rules('password', 'password', 'required');
    //         	$this->form_validation->set_rules('password_confirmation', 'confirm password', 'required|matches[password]');
    //         }
    //         $userData['first_name']		= strip_tags($user_details['first_name']);
    //         $userData['last_name']		= strip_tags($user_details['last_name']);
    //         $userData['role_id']		= strip_tags($user_details['role_id']);
            
    //         if(isset($user_details['user_id']) && empty($user_details['user_id'])){
    //         	$userData['email']	= strip_tags($user_details['email']);
    //         }else{
	// 			$userData['email']	= strip_tags($user_details['email']);
	// 		}

    //         if(isset($user_details['role_id']) && !empty($user_details['role_id']) && $user_details['role_id'] == 2){
    //         	$userData['contact_no']		    = strip_tags($user_details['contact_no']);
    //         	$userData['country']		    = strip_tags($user_details['country_code']);
    //         	$userData['state']			= strip_tags($user_details['state']);
    //         	$userData['city']			= strip_tags($user_details['city']);
    //         	// $userData['address']		    = strip_tags($user_details['address']);
    //         	// $userData['cust_line1']		= strip_tags($user_details['cust_line1']);
    //         	// $userData['cust_line2']		= strip_tags($user_details['cust_line2']);
    //         	// $userData['postcode']		= strip_tags($user_details['postcode']);
    //         }
            
    //         if(!isset($user_details['user_id'])){
    //         	$userData['password']			= md5($user_details['password']);
    //         }else{
	// 			$userData['password']			= md5($user_details['password']);
	// 		}
            
	// 		$userData['inserted_by']	= 1;
    //         if($this->form_validation->run()) {
    //         	if(isset($user_details['user_id']) && !empty($user_details['user_id'])){
    //         		$where = array('user_id'=> $user_details['user_id']);
    //         		$result = $this->auth_model->update_record($userData, $where);
    //         	} else {
    //         		$result = $this->auth_model->save_record($userData);
    //         	}
    //             if($result['state']) {
    //             	if(isset($user_details['user_id']) && !empty($user_details['user_id'])) {
    //                 	$response = array('state'=>TRUE,'title'=>'Details updated successfully.','type'=>'success','message'=>'', 'redirect'=>(isset($userData['redirect']) && !empty($userData['redirect']))?$userData['redirect']:'');
    //             	} else {
    //                 	$response = array('state'=>TRUE,'title'=>'Thank You!','type'=>'success','message'=>'Registration successful. Please Login!', 'redirect'=>(isset($userData['redirect']) && !empty($userData['redirect']))?$userData['redirect']:'');
    //             	}
    //             } else {
    //                 $response = array('state'=>FALSE,'title'=>'Unable to save details.','type'=>'error','message'=>'');
    //             }
    //         } else {
    //             $response = array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'error','message'=>$this->form_validation->error_array());
    //         }
    //     }
    //     echo json_encode($response);
	// }

	// public function authenticate_user(){
	// 	$user_credentials 	= $this->input->post();
	// 	$response 			= array();
	// 	$this->form_validation->set_data($user_credentials);
	// 	$this->form_validation->set_error_delimiters('', ',');
	// 	//if($user_credentials['login_type'] === 'email'){
	// 		$this->form_validation->set_rules("email", "Email", "trim|required");
	// 	//}else{
	// 		//$this->form_validation->set_rules("contact_no", "Contact No", "trim|required");
	// 	//}
	// 	$this->form_validation->set_rules("password", "Password", "trim|required");

	// 	if ($this->form_validation->run() == TRUE){
	// 		$result = $this->auth_model->set_user_login($user_credentials);
	// 		if ($result){
	// 			if(isset($user_credentials['login-from']) && !empty($user_credentials['login-from']) && $user_credentials['login-from'] === 'site'){
	// 				if($result[0]->role_id == 2){
	// 					$sess_data['user'] 		= array('isLoggedIn' => TRUE, 'user_id' => $result[0]->user_id, 'role_id' => $result[0]->role_id, 'first_name' => $result[0]->first_name, 'last_name' => $result[0]->last_name);
	// 					$this->session->set_userdata($sess_data);
	// 					$response 	= 	array('state' => TRUE,'title' => 'Login Successful!','type'	=> 'success','message' => 'Welcome to my project..!');
	// 				} else {
	// 					$response 	= array('state'=>FALSE,'title'=>'Unauthorised Access!','type'=>'error','message'=>'Please enter correct email or password.');
	// 				}
	// 			} else{
	// 				if($result[0]->role_id == 1 || $result[0]->role_id == 3){
	// 					$sess_data['admin'] 		= array('isLoggedIn' => TRUE, 'user_id' => $result[0]->user_id, 'role_id' => $result[0]->role_id, 'first_name' => $result[0]->first_name, 'last_name' => $result[0]->last_name);
	// 					$this->session->set_userdata($sess_data);
	// 					$response 	= 	array('state' => TRUE,'title' => 'Login Successful!','type'	=> 'success','message' => 'Welcome to my project..!');
	// 				} else {
	// 					$response 	= array('state'=>FALSE,'title'=>'Unauthorised Access!','type'=>'error','message'=>'Please enter correct email or password.');
	// 				}
	// 			}
	// 		}else{
	// 			$response 	= array('state'=>FALSE,'title'=>'Login Faild!','type'=>'error','message'=>'Please enter correct email or password.');
	// 		}
	// 	}else{
	// 		$response 	= array('state'=>FALSE,'details'=>'Insufficiant Details!','type'=>'error','title' => 'Login Faild!','message' => $this->form_validation->error_array());
	// 	}
	// 	echo json_encode($response);
	// }
	
	public function set_user_details() {
	    $user_details = $this->input->post();
	    //print_r($user_details);die;
	    $userData = array();
	    $response = array();

	    if ($user_details) {
	        $this->form_validation->set_data($user_details);
	        $this->form_validation->set_error_delimiters('', ',');
	        $this->form_validation->set_rules('first_name', 'First Name', 'required');
	        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
	        $this->form_validation->set_rules('email', 'Email', 'required'); //callback_email_exists

	        if (isset($user_details['user_id']) && !empty($user_details['user_id'])) {
	            $this->form_validation->set_rules('password', 'password', 'required');
	            $this->form_validation->set_rules('password_confirmation', 'confirm password', 'required|matches[password]');
	        }

	        $userData['first_name'] = strip_tags($user_details['first_name']);
	        $userData['last_name'] = strip_tags($user_details['last_name']);
	        $userData['role_id'] = strip_tags($user_details['role_id']);
	        $userData['email'] = strip_tags($user_details['email']);

	        if (isset($user_details['role_id']) && !empty($user_details['role_id']) && $user_details['role_id'] == 2) {
	            $userData['contact_no'] = strip_tags($user_details['contact_no']);
	            $userData['country'] = strip_tags($user_details['country_code']);
	            $userData['state'] = strip_tags($user_details['state']);
	            $userData['city'] = strip_tags($user_details['city']);
	        }

	        if (!isset($user_details['user_id'])) {
	            $userData['password'] = md5($user_details['password']);
	        } else {
	            $userData['password'] = md5($user_details['password']);
	        }
	        // if (!isset($user_details['role_id'])==5) {
	        //     $userData['display'] = $user_details['display'];
	        // } else {
	        //     $userData['display'] = $user_details['display'];
	        // }
	        if (isset($user_details['role_id']) && $user_details['role_id'] == 5) {
            	$userData['display'] = 'N';
	        } else {
	            $userData['display'] = 'Y';
	        }
	        $userData['inserted_by'] = 1;

	        // Handle image upload
	        if (isset($_FILES['profile_image']) && is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
	            $config['upload_path'] = 'assets/uploads/profile_images/';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['max_size'] = 2048; // 2MB max size
	            $config['file_name'] = time() . '_' . $_FILES['profile_image']['name'];

	            $this->load->library('upload', $config);
	            if ($this->upload->do_upload('profile_image')) {
	                $upload_data = $this->upload->data();
	                $userData['profile_image'] = $upload_data['file_name'];
	            } else {
	                $response = array(
	                    'state' => FALSE,
	                    'title' => 'Image Upload Error',
	                    'type' => 'error',
	                    'message' => $this->upload->display_errors()
	                );
	                echo json_encode($response);
	                return;
	            }
	        }
	        if ($this->form_validation->run()) {
	            if (isset($user_details['user_id']) && !empty($user_details['user_id'])) {
	                $where  = array('user_id' => $user_details['user_id']);
	                $result = $this->auth_model->update_record($userData, $where);
	            } else {
	                $result = $this->auth_model->save_record($userData);
	            }

	            if ($result['state']) {
	                $response = array(
	                    'state' => TRUE,
	                    'title' => isset($user_details['user_id']) ? 'Details updated successfully.' : 'Thank You!',
	                    'type'  => 'success',
	                    'message' => isset($user_details['user_id']) ? '' : 'Registration successful. Please Login!',
	                    'redirect' => isset($userData['redirect']) ? $userData['redirect'] : ''
	                );
	            } else {
	                $response = array(
	                    'state' => FALSE,
	                    'title' => 'Unable to save details.',
	                    'type' => 'error',
	                    'message' => ''
	                );
	            }
	        } else {
	            $response = array(
	                'state' => FALSE,
	                'title' => 'Insufficient Details!',
	                'type' => 'error',
	                'message' => $this->form_validation->error_array()
	            );
	        }
	    }
	    echo json_encode($response);
	}

	public function authenticate_user(){
		$user_credentials 	= $this->input->post();
		$response 			= array();
		$this->form_validation->set_data($user_credentials);
		$this->form_validation->set_error_delimiters('', ',');
		//if($user_credentials['login_type'] === 'email'){
			$this->form_validation->set_rules("email", "Email", "trim|required");
		//}else{
			//$this->form_validation->set_rules("contact_no", "Contact No", "trim|required");
		//}
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == TRUE){
			$result = $this->auth_model->set_user_login($user_credentials);
			//echo "<pre>";print_r($result);die;
			if ($result){
				if(isset($user_credentials['login-from']) && !empty($user_credentials['login-from']) && $user_credentials['login-from'] === 'site'){
					if($result[0]->role_id == 2 || $result[0]->role_id == 5 && $result[0]->display == 'Y'){
						$sess_data['user'] = array('isLoggedIn' => TRUE, 'user_id' => $result[0]->user_id, 'role_id' => $result[0]->role_id, 'first_name' => $result[0]->first_name, 'last_name' => $result[0]->last_name);
						$this->session->set_userdata($sess_data);
						$response 	= 	array('state' => TRUE,'title' => 'Login Successful!','type'	=> 'success','message' => 'Welcome to my project..!');
					} else {
						$response 	= array('state'=>FALSE,'title'=>'Unauthorised Access!','type'=>'error','message'=>'Please enter correct email or password./Need Approval from admin.');
					}
				} else{
					if($result[0]->role_id == 1 || $result[0]->role_id == 3 ){
						$sess_data['admin'] 		= array('isLoggedIn' => TRUE, 'user_id' => $result[0]->user_id, 'role_id' => $result[0]->role_id, 'first_name' => $result[0]->first_name, 'last_name' => $result[0]->last_name);
						$this->session->set_userdata($sess_data);
						$response 	= 	array('state' => TRUE,'title' => 'Login Successful!','type'	=> 'success','message' => 'Welcome to my project..!');
					} else {
						$response 	= array('state'=>FALSE,'title'=>'Unauthorised Access!','type'=>'error','message'=>'Please enter correct email or password.');
					}
				}
			}else{
				$response 	= array('state'=>FALSE,'title'=>'Login Faild!','type'=>'error','message'=>'Please enter correct email or password.');
			}
		}else{
			$response 	= array('state'=>FALSE,'details'=>'Insufficiant Details!','type'=>'error','title' => 'Login Faild!','message' => $this->form_validation->error_array());
		}
		echo json_encode($response);
	}
	
	function generate_forgot_password_link($email){
		$expFormat 	= mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
   		$expDate 	= date("Y-m-d H:i:s",$expFormat);
   		$key 		= md5($email);
   		$key 		= md5($key);
   		$array_for_link = array('key'=> $key, 'email'=> $email, 'exp_date' => $expDate);
   		return $array_for_link;
	}

	function validate_forgot_password_link($validateArray){
		$response 	= array();
		$curDate 	= date("Y-m-d H:i:s");
		$key 		= md5($validateArray['email']);
   		$key 		= md5($key);
   		$validateEmail = $this->auth_model->mail_exists($validateArray['email']);
   		if($validateEmail){
   			if($validateArray['key'] === $key){
   				$response 	= array('state'=>TRUE,'heading'=>'','type'=>'success','message'=>'');
   			} else {
   				$response 	= array('state'=>FALSE,'heading'=>'Invalid Details!','type'=>'error','message'=>'Link is expired.');
   			}
   		} else {
   			$response 	= array('state'=>FALSE,'heading'=>'Invalid Details!','type'=>'error','message'=>'Link is expired.');
   		}
   		return $response;
	}

	public function reset_password_view() {
		$validateUser  		= $this->input->get();
		$data 				= array();
		$data 				= $this->validate_forgot_password_link($validateUser); 
		$data['view'] 		= 'reset-password';
		$data['title'] 		= 'Lab Grown Diamond | Reset Password';
		$data['script']  	= 'auth.js';
		$data['email']  	= $validateUser['email'];
		
		$this->template->load_site($data);
	}

	public function reset_password_link(){
		$user_credentials 	= $this->input->post();
		$response 			= array();
		if($user_credentials['role_id']==1){
		  	$reset_url 			= base_url().'admin/reset-password';  
		}else{
		   $reset_url 			= base_url().'reset-password';
		}
		$subject 			= 'Reset Password Request';
		$output 			= '';
		$user_data = $this->auth_model->get_user_by_email($user_credentials['email']);
		if($user_data){
			$forgot_details 	=$this->generate_forgot_password_link($user_credentials['email']);
			$to 				= $user_data['email'];
			$name 				= $user_data['first_name'].' '.$user_data['last_name'];
			$output ='<p>Dear '.$user_data['first_name'].',</p>';
			$output.='<p>Please click on the following link to reset your password.</p>';
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p><a href="'.$reset_url.'?key='.$forgot_details['key'].'&email='.$forgot_details['email'].'&action=reset" target="_blank">'.$reset_url.'?key='.$forgot_details['key'].'&email='.$forgot_details['email'].'&action=reset</a></p>'; 
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p>Please be sure to copy the entire link into your browser.
				The link will expire after 1 day for security reason.</p>';
			$output.='<p>Thanks,</p>';
			$output.='<p>Vibha</p>';
			$result = $this->send_mail($to, $name, $subject, $output);
			if($result){
				$response 	= array(
				'state'	=> TRUE, 
				'title'	=> 'Email sent successfully',
				'type'	=> 'success', 
				'message' => 'Reset link sent to your email.');
			} else {
				$response 	= array(
				'state'=>FALSE, 
				'title'=>'Something went wrong',
				'type'=>'error', 
				'message'=>'Unable to send email');
			}
		}else{
			$response 	= array('state'=>FALSE,'title'=>'Invalid Email!','type'=>'error','message'=>'Please enter valid email.');
		}
		echo json_encode($response);
	}

	public function send_mail($to, $name, $subject, $body=false){

		$this->config->load('email');
		$config = array();
		$config['useragent']		= 	$this->config->item('useragent');
		$config['protocol']			= 	$this->config->item('protocol');
		$config['smtp_host']		=	$this->config->item('smtp_host');
		$config['smtp_auth']		=	$this->config->item('smtp_auth');
		$config['smtp_user']		=	$this->config->item('smtp_user');
		$config['smtp_pass']		=	$this->config->item('smtp_pass');
		$config['smtp_port']		=	$this->config->item('smtp_port');
		$config['smtp_crypto']		=	$this->config->item('smtp_crypto');
		$config['mailtype']			=	$this->config->item('mailtype');
		$config['smtp_timeout']		=	$this->config->item('smtp_timeout');
		$config['smtp_debug']		=	$this->config->item('smtp_debug');
		$config['validate']			=	$this->config->item('validate');
		$config['charset']			=	$this->config->item('charset');

		$this->email->initialize($config);
		$this->email->from($config['smtp_user']);
		$this->email->to($to);
		$this->email->set_newline("\r\n");  
		$this->email->subject($subject);
		$this->email->message($body);
		$result = $this->email->send();
		if($result){
			return true;
		}else{
			$response 	= array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'danger','message'=>'Unable to sent password reset link');
			return $response;
		}
	}

	public function reset_new_password(){
		$user_credentials 	= $this->input->post();
		$response 			= array();
		
		$this->form_validation->set_data($user_credentials);
		$this->form_validation->set_error_delimiters('', ',');
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == TRUE){
			$result = $this->auth_model->set_new_password_by_email($user_credentials['email'], $user_credentials['password']);
			if ($result){
				$response 	= 	array('state' => TRUE,'title' => 'Password Reset Successful!','type' => 'success','message' => 'Please Login.');
			}else{
				$response 	= array('state'=>FALSE,'title'=>'Password Reset Faild!','type'=>'error','message'=>'');
			}
		}else{
			$response 	= array('state'=>FALSE,'details'=>'Password Reset Faild!','type'=>'error','title' => 'Password Reset Faild!','message' => $this->form_validation->error_array());
		}
		echo json_encode($response);
	}

    public function reset_password(){
    		$user_session	= $this->session->userdata('user');
    		$admin_session  = $this->session->userdata('admin');
    		if(isset($user_session) && !empty($user_session) || isset($admin_session) && !empty($admin_session)) {
				if(isset($user_session['isLoggedIn']) || (isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'])){
    	        $user_details 	= $this->input->post();
    	        if($admin_session['role_id']==1 || $admin_session['role_id']==3){
    	           $user_id		= $admin_session['user_id'];   
    	        }else{
    	           $user_id		= $user_session['user_id'];
    	        }
    	        if($user_details){
    	        	$this->form_validation->set_data($user_details);
    	        	$this->form_validation->set_error_delimiters('',',');
    	        	$this->form_validation->set_rules('old_password', 'Old password', 'required');
    				$this->form_validation->set_rules('new_password', 'New password', 'required');
    	        	$this->form_validation->set_rules('confirm_new_password', 'Confirm new password', 'matches[new_password]');
    	        	if ($this->form_validation->run() == TRUE){
    					$result = $this->auth_model->get_user($user_id);
    					$password		= $result->password;
    					$old_password	= md5($user_details['old_password']);
    					$new_password	= $user_details['new_password'];
    					if($password == $old_password){
    						$pass_result = $this->auth_model->set_new_password($user_id,$new_password);
    						if($pass_result){
    							$response 	= array('state'=>TRUE,'details'=>'','type'=>'success','title'=>'Password updated successfully..!');
    						}else{
    							$response 	= array('state'=>FALSE,'details'=>'Insufficiant Details!','type'=>'danger','title'=>'Unable to  update password.');
    						}
    					}else{
    						$response 	= array('state'=>FALSE,'details'=>'Insufficiant Details!','type'=>'danger','title'=>'Old password does not match with existing password.');
    					}
    	        	}else{
                    	$response 	= array('state'=>FALSE,'details'=>'Insufficiant Details!','type'=>'danger','title'=>$this->form_validation->error_array());
                	}
    	        }
    			echo json_encode($response);
    	    }else{
    	    	redirect(base_url().'admin/login');
    	    }
        }
    }
        
	public function set_logout(){
		$response 	= array();
		$details 	= $this->input->post();
		$site_id    = (isset($details['site_id']) && !empty($details['site_id']))? $details['site_id']:'';
		if($site_id==1){ 
			$reset_url 	= base_url().'home';  
		}else{
			$reset_url  = base_url().'admin/login';  
		}
		if($details['login']){
			if(isset($details['site_id']) && !empty($details['site_id'])){
				$sess_data['user'] = array(	
					'isLoggedIn' => FALSE,
					'user_id' => '',
					'role_id' => '',
					'first_name' => '',
					'last_name' => ''
				);
				$this->session->unset_userdata($sess_data['user']);
			} else {
				$sess_data['admin'] = array(	
					'isLoggedIn' => FALSE,
					'user_id' => '',
					'role_id' => '',
					'first_name' => '',
					'last_name' => ''
				);
				$this->session->unset_userdata($sess_data['admin']);
			}
	        $this->session->sess_destroy();
			$response 	= array('state'=>TRUE,'title'=>'Logout Successful!','type'=>'success','message'=>'', 'redirect' => $reset_url);
		}else{
			$response 	= array('state'=>FALSE,'title'=>'Logout Faild!','type'=>'danger','message'=>'Unable to logout!');
		}
		echo json_encode($response);
	}
}
?>
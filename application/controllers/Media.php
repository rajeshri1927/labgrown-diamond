<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Media extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Testimonial_model', 'testimonial_model');
    }

	public function testimonial_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/testimonials/testimonial';
				$data['title'] 				= 'Daily Meat | Testimonial';
				$data['script']				= 'testimonial.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	function testimonial_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data = array();
			if(isset($inputData['testimonial_id']) && !empty($inputData['testimonial_id'])){
				$data['testimonial'] 		= $this->testimonial_model->get_testimonials($inputData['testimonial_id']);
			}
			$view 		= $this->load->view('admin/testimonials/testimonial_form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	function testimonial_details(){
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$testimonial_id = $this->input->get('testimonial_id');
			$this->get_details($testimonial_id);
		} else {
			$testimonials_data = $this->input->post();
			$this->set_details($testimonials_data);
		}
	} 

	function set_details($testimonials_data) {
		$input_details 		= $testimonials_data;
		$testimonial_data 	= array();
		$response 			= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('testimonial_name', 'Testimonial Name', 'required');
	            $this->form_validation->set_rules('testimonial_feedback', 'Testimonial Eeedback', 'required');
	            
	            $testimonial_data['testimonial_name'] 			= strip_tags($input_details['testimonial_name']);
    			$testimonial_data['testimonial_feedback'] 		= strip_tags($input_details['testimonial_feedback']);
    			$testimonial_data['testimonial_location'] 		= strip_tags($input_details['testimonial_location']);
	            $testimonial_data['display']					= 'Y';
				$testimonial_data['inserted_by']				= $user_id;
				$testimonial_data['inserted_on']				= date('Y-m-d H:i:s');
				
				$result = false;
	            if($this->form_validation->run() == true){

	            	if($_FILES && isset($_FILES['testimonial_image']) && !empty($_FILES['testimonial_image'])){
	            		$result = $this->upload_file($_FILES['testimonial_image']);
  						if($result['state']){
  							$testimonial_data['original_file_name'] = $result['data']['orig_name'];
							$testimonial_data['system_file_name'] 	= $result['data']['file_name'];
							if(isset($input_details['testimonial_id']) && !empty($input_details['testimonial_id'])){
						        @unlink('./assets/uploads/testimonials/'.$input_details['testimonial_old_image']);
								$where = array('testimonial_id' => $input_details['testimonial_id']);
	            				$result = $this->testimonial_model->update_record($testimonial_data, $where);
	            			} else {
	            				$result = $this->testimonial_model->save_record($testimonial_data);
	            			}
						}
					} else {
						if(isset($input_details['testimonial_id']) && !empty($input_details['testimonial_id'])){
							$where = array('testimonial_id' => $input_details['testimonial_id']);
            				$result = $this->testimonial_model->update_record($testimonial_data, $where);
            			} else {
            				$result = $this->testimonial_model->save_record($testimonial_data);
            			}	
					}
            		
	                if($result){
	                	$message 	= (isset($input_details['testimonial_id']) && !empty($input_details['testimonial_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'testimonial '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['category_id']) && !empty($input_details['category_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.' testimonial.');
	                }
	            } else {
	                $response 	= array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'error','message'=>$this->form_validation->error_array());
	            }
	        }
	        echo json_encode($response);
	    } else {
	    	redirect('admin/login','refresh');	
	    }
	}

	function get_details($testimonial_id = '') {
		$testimonials = array();
		if(isset($testimonial_id) && !empty($testimonial_id)){
			$testimonials 	= $this->testimonial_model->get_testimonials($testimonial_id);
		} else {
			$testimonials 	= $this->testimonial_model->get_testimonials();
		}

		if($testimonials){
	        $response 	= array('state'=>TRUE, 'title'=>'records found!','type'=>'success', 'data' => $testimonials);
		} else {
	        $response 	= array('state'=>FALSE, 'title'=>'Insufficiant Details!', 'type'=>'error', 'message' => 'No records found.');
		}
		echo json_encode($response);
	}

	function upload_file($file){
		$response = [];
        $config['upload_path']          = './assets/uploads/testimonials/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE;
        
       	$_FILES['images[]']['name']		= $file['name'];
		$_FILES['images[]']['type']		= $file['type'];
        $_FILES['images[]']['tmp_name']	= $file['tmp_name'];
        $_FILES['images[]']['error']	= $file['error'];
		$_FILES['images[]']['size']		= $file['size'];

        if(($config['upload_path'] !='') && (!file_exists($config['upload_path']))){
			mkdir($config['upload_path'], 0777, true);
		}
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images[]')){
            $response 	= array('state' => FALSE,'data' => null ,'msg' => strip_tags($this->upload->display_errors()));
        }else{
            $response	= array('state' => TRUE,'data' => $this->upload->data(),'error' => null);
        }
      	return $response;
	}

	public function delete_testimonial(){
		$input_details = $this->input->post();
		if(isset($input_details['testimonial_id']) && !empty($input_details['testimonial_id'])){
	        @unlink('assets/uploads/testimonials/'.$input_details['testimonial_image']);
			$result 	= $this->testimonial_model->delete($input_details['testimonial_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Banner_model', 'banner_model');
    }

	public function banner_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/banner/banner';
				$data['title'] 				= 'Lab Grown | banner';
				$data['script']				= 'banner.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	public function banner_form_view(){
		$admin_session = $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['banner_id']) && !empty($inputData['banner_id'])){
				$data['banner'] = $this->banner_model->get_banners($inputData['banner_id']);
			}
			$view 		= $this->load->view('admin/banner/banner_form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function banner_details(){
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$banner_id = $this->input->get('banner_id');
			$this->get_details($banner_id);
		} else {
			$banners_data = $this->input->post();
			$this->set_details($banners_data);
		}
	} 

	public function set_details($banners_data) {
		$input_details 	= $banners_data;
		$banner_data 	= array();
		$response 		= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('banner_title', 'Banner Title', 'required');
	            $this->form_validation->set_rules('banner_message', 'Banner Message', 'required');
	            
    			$banner_data['banner_title'] 	= strip_tags($input_details['banner_title']);
    			$banner_data['banner_message'] 	= strip_tags($input_details['banner_message']);
				$result = false;

	            if($this->form_validation->run() == true){
	            	if($_FILES && isset($_FILES['banner_background']) && !empty($_FILES['banner_background'])){
	            		$background_result = $this->upload_file($_FILES['banner_background']);
  						if($background_result['state']){
  							$foreground_result = $this->upload_file($_FILES['banner_foreground']);
  							if($foreground_result['state']){
  								$banner_data['banner_background'] 	= $background_result['data']['file_name'];
  								$banner_data['banner_foreground'] 	= $foreground_result['data']['file_name'];
  								if(isset($input_details['banner_id']) && !empty($input_details['banner_id'])){
							        @unlink('./assets/uploads/banners/'.$input_details['banner_old_background_image']);
							        @unlink('./assets/uploads/banners/'.$input_details['banner_old_foreground_image']);
									$where = array('banner_id' => $input_details['banner_id']);
		            				$result = $this->banner_model->update_record($banner_data, $where);
		            			} else {
		            				$result = $this->banner_model->save_record($banner_data);
		            			}
  							}
						}
					} else {
						if(isset($input_details['banner_id']) && !empty($input_details['banner_id'])){
							$where = array('banner_id' => $input_details['banner_id']);
            				$result = $this->banner_model->update_record($banner_data, $where);
            			} else {
            				$result = $this->banner_model->save_record($banner_data);
            			}	
					}

	                if($result){
	                	$message 	= (isset($input_details['banner_id']) && !empty($input_details['banner_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'banner '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['category_id']) && !empty($input_details['category_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.' banner.');
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

	public function get_details($banner_id = '') {
		$banners = array();
		if(isset($banner_id) && !empty($banner_id)){
			$banners 	= $this->banner_model->get_banners($banner_id);
		} else {
			$banners 	= $this->banner_model->get_banners();
		}
		if($banners){
	        $response 	= array('state'=>TRUE, 'title'=>'records found!','type'=>'success', 'data' => $banners);
		} else {
	        $response 	= array('state'=>FALSE, 'title'=>'Insufficiant Details!', 'type'=>'error', 'message' => 'No records found.');
		}
		echo json_encode($response);
	}

	function upload_file($file){
		$response = [];
        $config['upload_path']          = './assets/uploads/banners/';
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

	public function delete_banner(){
		$input_details = $this->input->post();
		if(isset($input_details['banner_id']) && !empty($input_details['banner_id'])){
	        @unlink('./assets/uploads/banners/'.$input_details['backgroud_image']);
			@unlink('./assets/uploads/banners/'.$input_details['foreground_image']);
			$result 	= $this->banner_model->delete($input_details['banner_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}
}
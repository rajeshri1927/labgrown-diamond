<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clarity extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Clarity_model','clarity_model');
    }

	public function get_admin_clarity_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['clarity_id']) && !empty($inputData['clarity_id'])){
				$data['clarity'] = $this->clarity_model->get_clarity($inputData['clarity_id']);
			}
			$view 		= $this->load->view('admin/clarity/clarity-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_clarity_details(){
		$input_details  = $this->input->post();
		$clarityData 	= array();
		$response 		= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('clarity_name', 'Clarity Name', 'required');

	            $clarityData['clarity_name'] = strip_tags($input_details['clarity_name']);
				$clarityData['clarity_title']= strip_tags($input_details['clarity_title']);
	            $clarityData['clarity_desc'] = strip_tags($input_details['clarity_desc']);
	            $clarityData['display']		 = 'Y';
				$clarityData['inserted_by']	 = $user_id;
				$clarityData['inserted_on']	 = date('Y-m-d H:i:s');
				$result = false;

	            if($this->form_validation->run() == true){
					$image_response = $this->upload_file($_FILES['clarity_image']);
					$video_response = $this->upload_file($_FILES['clarity_video']);
					if ($image_response['state'] && $video_response['state']) {
						$clarityData['clarity_image']     = $image_response['data']['orig_name'];
						$clarityData['system_file_name']  = $image_response['data']['file_name'];
						$clarityData['clarity_video']     = $video_response['data']['orig_name'];
						$clarityData['system_file_video'] = $video_response['data']['file_name'];
							if(isset($input_details['clarity_id']) && !empty($input_details['clarity_id'])){
								@unlink('./assets/uploads/clarity/' . $input_details['clarity_old_image']);
								@unlink('./assets/uploads/clarity/' . $input_details['clarity_old_video']);
								$where = array('clarity_id' => $input_details['clarity_id']);
	            				$result = $this->clarity_model->update_record($clarityData, $where);
	                    	} else {
	            				$result = $this->clarity_model->save_record($clarityData);
	            			}
						} else {
						if(isset($input_details['clarity_id']) && !empty($input_details['clarity_id'])){
							$where = array('clarity_id' => $input_details['clarity_id']);
            				$result = $this->clarity_model->update_record($clarityData, $where);
            			} else {
            				$result = $this->clarity_model->save_record($clarityData);
            			}	
					}  
	                if($result){
	                	$message 	= (isset($input_details['clarity_id']) && !empty($input_details['clarity_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'clarity '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['clarity_id']) && !empty($input_details['clarity_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.' Color.');
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

	function upload_file($file){
		$response = [];
		$config['image_library'] 		= 'gd2';
        $config['upload_path']          = './assets/uploads/clarity/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|mp4|avi|mov|flv';
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
	
	public function get_clarity(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->clarity_model->get_clarity();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Color Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get color.');
		}
     	echo json_encode($response);
	}

	public function delete_clarity(){
		$input_details = $this->input->post();
		if(isset($input_details['clarity_id']) && !empty($input_details['clarity_id'])){
	        @unlink('assets/uploads/clarity/'.$input_details['clarity_image']);
			$result 	= $this->clarity_model->delete($input_details['clarity_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_clarity_display(){
		$input_details = $this->input->post();
		if(isset($input_details['clarity_id']) && !empty($input_details['clarity_id'])){
			$where = array('clarity_id' => $input_details['clarity_id']);
            $result = $this->clarity_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

}

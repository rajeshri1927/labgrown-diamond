<?php defined('BASEPATH') OR exit('No direct script access allowed');
class FancyColor extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Fancy_color_model','fancy_color_model');
    }

	public function get_admin_fancy_color_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['fancy_color_id']) && !empty($inputData['fancy_color_id'])){
				$data['fancycolor'] 	= $this->fancy_color_model->get_fancy_color($inputData['fancy_color_id']);
			}
			$view 		= $this->load->view('admin/fancycolor/fancycolor-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_fancy_color_details(){
		$input_details  = $this->input->post();
		$fancycolorData = array();
		$response 		= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('fancy_color_name', 'Fancy Color Name', 'required');

	            $fancycolorData['fancy_color_name'] = strip_tags($input_details['fancy_color_name']);
	            $fancycolorData['display']		= 'Y';
				$fancycolorData['inserted_by']	= $user_id;
				$fancycolorData['inserted_on']	= date('Y-m-d H:i:s');
				$result = false;
				
	            if($this->form_validation->run() == true){
	            	if($_FILES && isset($_FILES['fancy_color_image']) && !empty($_FILES['fancy_color_image'])){
	            		$result = $this->upload_file($_FILES['fancy_color_image']);
  						if($result['state']){
  							$fancycolorData['fancy_color_image'] = $result['data']['orig_name'];
							$fancycolorData['system_file_name']  = $result['data']['file_name'];
							if(isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id'])){
						        @unlink('./assets/uploads/fancycolor/'.$input_details['fancycolor_old_image']);
								$where  = array('fancy_color_id' => $input_details['fancy_color_id']);
	            				$result = $this->fancy_color_model->update_record($fancycolorData, $where);
	                    	} else {
	            				$result = $this->fancy_color_model->save_record($fancycolorData);
	            			}
						}
					} else {
						if(isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id'])){
							$where = array('fancy_color_id' => $input_details['fancy_color_id']);
            				$result = $this->fancy_color_model->update_record($fancycolorData, $where);
            			} else {
            				$result = $this->fancy_color_model->save_record($fancycolorData);
            			}	
					}
	                if($result){
	                	$message 	= (isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Fancy color '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.'Fancy Color.');
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
        $config['upload_path']          = './assets/uploads/fancycolor/';
        // $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config["allowed_types"]        ="*";
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

	public function get_fancy_color(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->fancy_color_model->get_fancy_color();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Fancy Color Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get fancy color.');
		}
     	echo json_encode($response);
	}

	public function delete_fancy_color(){
		$input_details = $this->input->post();
		if(isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id'])){
	        @unlink('assets/uploads/fancycolor/'.$input_details['fancy_color_image']);
			$result 	= $this->fancy_color_model->delete($input_details['fancy_color_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_fancy_color_display(){
		$input_details = $this->input->post();
		if(isset($input_details['fancy_color_id']) && !empty($input_details['fancy_color_id'])){
			$where = array('fancy_color_id' => $input_details['fancy_color_id']);
            $result = $this->fancy_color_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

}

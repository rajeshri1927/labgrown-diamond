<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Color extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Color_model','color_model');
    }

	public function get_admin_color_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['color_id']) && !empty($inputData['color_id'])){
				$data['color'] 	= $this->color_model->get_color($inputData['color_id']);
			}
			$view 		= $this->load->view('admin/color/color-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_color_details(){
		$input_details  = $this->input->post();
		$colorData 	    = array();
		$response 		= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('color_name', 'Color Name', 'required');

	            $colorData['color_name'] 	= strip_tags($input_details['color_name']);
				$colorData['color_desc'] 	= strip_tags($input_details['color_desc']);
	            $colorData['display']		= 'Y';
				$colorData['inserted_by']	= $user_id;
				$colorData['inserted_on']	= date('Y-m-d H:i:s');
				$result = false;
				
	            if($this->form_validation->run() == true){
	            	if($_FILES && isset($_FILES['color_image']) && !empty($_FILES['color_image'])){
	            		$result = $this->upload_file($_FILES['color_image']);
  						if($result['state']){
  							$colorData['color_image']      = $result['data']['orig_name'];
							$colorData['system_file_name'] = $result['data']['file_name'];
							if(isset($input_details['color_id']) && !empty($input_details['color_id'])){
						        @unlink('./assets/uploads/color/'.$input_details['color_old_image']);
								$where  = array('color_id' => $input_details['color_id']);
	            				$result = $this->color_model->update_record($colorData, $where);
	                    	} else {
	            				$result = $this->color_model->save_record($colorData);
	            			}
						}
					} else {
						if(isset($input_details['color_id']) && !empty($input_details['color_id'])){
							$where = array('color_id' => $input_details['color_id']);
            				$result = $this->color_model->update_record($colorData, $where);
            			} else {
            				$result = $this->color_model->save_record($colorData);
            			}	
					}
	                if($result){
	                	$message 	= (isset($input_details['color_id']) && !empty($input_details['color_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'color '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['color_id']) && !empty($input_details['color_id']))?'update':'save';
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
        $config['upload_path']          = './assets/uploads/color/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
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

	public function get_color(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->color_model->get_color();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Color Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get color.');
		}
     	echo json_encode($response);
	}

	public function delete_color(){
		$input_details = $this->input->post();
		if(isset($input_details['color_id']) && !empty($input_details['color_id'])){
	        @unlink('assets/uploads/color/'.$input_details['color_image']);
			$result 	= $this->color_model->delete($input_details['color_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_color_display(){
		$input_details = $this->input->post();
		if(isset($input_details['color_id']) && !empty($input_details['color_id'])){
			$where = array('color_id' => $input_details['color_id']);
            $result = $this->color_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

}

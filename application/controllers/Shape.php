<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shape extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Shape_model','shape_model');
    }

	public function get_admin_shape_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['shape_id']) && !empty($inputData['shape_id'])){
				$data['shape'] 	= $this->shape_model->get_shapes($inputData['shape_id']);
			}
			$view 		= $this->load->view('admin/shape/shape-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function set_shape_details(){
		$input_details  = $this->input->post();
		$productData 	= array();
		$response 		= array();

		$admin_session 	= $this->session->userdata('admin');
    	$is_logged_in 	= $admin_session['isLoggedIn'];
		$user_id 		= $admin_session['user_id'];
		
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('shape_name', 'Shape Name', 'required');
	
	            $shapeData['shape_name'] 	= strip_tags($input_details['shape_name']);
	            $shapeData['display']		= 'Y';
				$shapeData['inserted_by']	= $user_id;
				$shapeData['inserted_on']	= date('Y-m-d H:i:s');
				$result = false;
	            if($this->form_validation->run() == true){
	            	if($_FILES && isset($_FILES['shape_image']) && !empty($_FILES['shape_image'])){
	            		$result 	= 	$this->upload_file($_FILES['shape_image']);
  						if($result['state']){
  							$shapeData['shape_image']        = $result['data']['orig_name'];
							$shapeData['system_file_name'] 	 = $result['data']['file_name'];
							if(isset($input_details['shape_id']) && !empty($input_details['shape_id'])){
						        @unlink('./assets/uploads/shape/'.$input_details['shape_old_image']);
								$where = array('shape_id' => $input_details['shape_id']);
	            				$result = $this->shape_model->update_record($shapeData, $where);
	                    	} else {
	            				$result = $this->shape_model->save_record($shapeData);
	            			}
						}
					} else {
						if(isset($input_details['shape_id']) && !empty($input_details['shape_id'])){
							$where = array('shape_id' => $input_details['shape_id']);
            				$result = $this->shape_model->update_record($shapeData, $where);
            			} else {
            				$result = $this->shape_model->save_record($shapeData);
            			}	
					}
	                if($result){
	                	$message 	= (isset($input_details['shape_id']) && !empty($input_details['shape_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Shape '.$message.' successfully.','redirect'=>'admin/sign-in');
	                } else {
	                	$message 	= (isset($input_details['shape_id']) && !empty($input_details['shape_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to '.$message.' product.');
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
        $config['upload_path']          = './assets/uploads/shapes/';
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

	public function get_shapes(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->shape_model->get_shapes();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Shape Available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}

	public function delete_shape(){
		$input_details = $this->input->post();
		if(isset($input_details['shape_id']) && !empty($input_details['shape_id'])){
	        @unlink('assets/uploads/shapes/'.$input_details['shape_image']);
			$result 	= $this->shape_model->delete($input_details['shape_id']);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to delete');
			}
			echo json_encode($response);
		}
	}

	public function set_shape_display(){
		$input_details = $this->input->post();
		if(isset($input_details['shape_id']) && !empty($input_details['shape_id'])){
			$where = array('shape_id' => $input_details['shape_id']);
            $result = $this->shape_model->update_record($input_details, $where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

}

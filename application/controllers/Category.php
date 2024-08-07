<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Category_model','category_model');
    }

	public function product_categories_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/category/category';
				$data['title'] 				= 'Lab Grown Diamond | Category';
				$data['script']				= 'category.js';
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	public function set_product_category() {
		$input_details 	= $this->input->post();
		$categoryData 	= array();
		$response 		= array();
		$admin_session	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
	            $this->form_validation->set_rules('category_title', 'Category title', 'required');
	            $this->form_validation->set_rules('category_desc', 'Category description', 'required');
	            
	            $categoryData['category_title']			= strip_tags($input_details['category_title']);
	            $categoryData['category_desc']			= strip_tags($input_details['category_desc']);
	            $categoryData['display']				= strip_tags($input_details['display']);

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['category_id']) && !empty($input_details['category_id'])){
	            		$where 	= array('category_id' => $input_details['category_id']);
	            		$result = $this->category_model->update_record($categoryData, $where);
	            	}else{
	            		$result = $this->category_model->save_record($categoryData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['category_id']) && !empty($input_details['category_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['category_id']) && !empty($input_details['category_id']))?'update':'save';
	                    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to '.$message.' category.');
	                }
	            }
	            else{
	                $response 	= array('state'=>FALSE,'title'=>'Insufficiant Details!','type'=>'danger','message'=>$this->form_validation->error_array());
	            }
	        }
	        echo json_encode($response);
	    }else{
	    	redirect('admin/sign-in','refresh');	
	    }
	}

	public function get_categories(){
		$postData = $this->input->post();
     	$data = $this->category_model->get_categories($postData);
     	echo json_encode($data);
	}

	public function get_category(){
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->category_model->get_category($getData['category_id']);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get category.');
		}
     	echo json_encode($response);
	}

	public function delete_category(){
		$postData 	= $this->input->post();
		$response 	= array();
		$updataArr 	= array('display' => "N");
		$whereArr 	= array('category_id' => $postData['category_id']);
		$result 	= $this->category_model->update_record($updataArr, $whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}
}
?>
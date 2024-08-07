<?php defined('BASEPATH') OR exit('No direct script access allowed');
class JewSubCategory extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
		$this->load->model('jewellary/Category_model','category_model');
	    $this->load->model('jewellary/SubCategory_model','subcategory_model');
    }

	public function jewellary_subcategories_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/jewellary/subcategory/subcategory';
				$data['title'] 				= 'Lab Grown Diamond | SubCategory';
				$data['script']				= 'jewellary/subcategory.js';
				$postData = [];
				$data['categories']			= $this->category_model->get_category();
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}

	public function set_jewellary_subcategory() {
		$input_details 	= $this->input->post();
		$categoryData 	= array();
		$response 		= array();
		$admin_session	= $this->session->userdata('admin');
		$is_logged_in 	= $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
	            $this->form_validation->set_rules('category_title', 'Category title', 'required');
	            $this->form_validation->set_rules('category_desc', 'Category description', 'required');
	            
				$categoryData['category_id']			= strip_tags($input_details['categoryName']);
	            $categoryData['category_title']			= strip_tags($input_details['category_title']);
	            $categoryData['category_desc']			= strip_tags($input_details['category_desc']);
	            $categoryData['display']				= strip_tags($input_details['display']);

	            if($this->form_validation->run() == true){
	            	
	            	if(isset($input_details['subcategory_id']) && !empty($input_details['subcategory_id'])){
	            		$where 	= array('subcategory_id' => $input_details['subcategory_id']);
	            		$result = $this->subcategory_model->update_record($categoryData, $where);
	            	}else{
						$result = $this->subcategory_model->save_record($categoryData);
	            	}
					if($result){
	                	$message 	= (isset($input_details['subcategory_id']) && !empty($input_details['subcategory_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['subcategory_id']) && !empty($input_details['subcategory_id']))?'update':'save';
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

	public function get_jewellary_subcategories(){
		$postData = $this->input->post();
     	$data = $this->subcategory_model->get_categories($postData);
		echo json_encode($data);
	}

	public function get_jewellary_subcategory(){
		$response 	= array();
		$getData 	= $this->input->get();
		$data = array();
     	$data['result'] 	= $this->subcategory_model->get_category($getData['subcategory_id']);
		 $data['categories']	= $this->category_model->get_category();
		if($data['result']){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category available.','data'=>$data);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get category.');
		}
     	echo json_encode($response);
	}

	public function delete_jewellary_subcategory(){
		$postData 	= $this->input->post();
		$response 	= array();
		$updataArr 	= array('display' => "N");
		$whereArr 	= array('subcategory_id' => $postData['subcategory_id']);
		$result 	= $this->subcategory_model->update_record($updataArr, $whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}
}
?>
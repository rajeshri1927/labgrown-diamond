<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SubSubCategory extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('Category_model','category_model');
        $this->load->model('Sub_category_model','sub_category_model');
        $this->load->model('Sub_sub_category_model','sub_sub_category_model');
	}

    public function get_sub_sub_category_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			$data['categories']     = $this->category_model->get_category();
            if(isset($inputData['sub_sub_category_id']) && !empty($inputData['sub_sub_category_id'])){
				$data['subsubcategories'] = $this->sub_sub_category_model->get_sub_sub_categories($inputData['sub_sub_category_id']);
				$data['sub_categories']   = $this->sub_category_model->get_sub_categories();
			}
			$view 		= $this->load->view('admin/subsubcategory/sub-sub-category-form.php', $data , true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'','data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

    public function get_sub_category_dropdown(){
        $inputData = $this->input->get();
        $result    = $this->sub_category_model->get_sub_category($inputData['category_id']);
        if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Sub caregory available.','data'=>$result);
		}else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get sub caregory .');
		}
     	echo json_encode($response);
    }

	public function get_sub_sub_category_dropdown(){
        $inputData = $this->input->get();
        $result    = $this->sub_sub_category_model->get_sub_sub_category($inputData['sub_category_id']);
        if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Sub caregory available.','data'=>$result);
		}else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get sub caregory .');
		}
     	echo json_encode($response);
    }

	public function set_sub_sub_category() {
		$input_details 		= $this->input->post();
		$categoryData 		= array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('category_id', 'Category ID', 'required');
                $this->form_validation->set_rules('sub_category_id', 'Sub Category ID', 'required');
	            $this->form_validation->set_rules('sub_sub_category_title', 'Sub Sub Category title', 'required');
	            $this->form_validation->set_rules('sub_sub_category_desc', 'Sub Sub Category description', 'required');

				$categoryData['category_id']	         = strip_tags($input_details['category_id']);
                $categoryData['sub_category_id']         = strip_tags($input_details['sub_category_id']);
	            $categoryData['sub_sub_category_title']	 = strip_tags($input_details['sub_sub_category_title']);
	            $categoryData['sub_sub_category_desc']	 = strip_tags($input_details['sub_sub_category_desc']);

	            if($this->form_validation->run() == true){
	            	if(isset($input_details['sub_sub_category_id']) && !empty($input_details['sub_sub_category_id'])){
	            		$where 	= array('sub_sub_category_id' => $input_details['sub_sub_category_id']);
	            		$result = $this->sub_sub_category_model->update_record($categoryData, $where);
	            	}else{
	            		$result = $this->sub_sub_category_model->save_record($categoryData);
	            	}

	                if($result){
	                	$message 	= (isset($input_details['sub_sub_category_id']) && !empty($input_details['sub_sub_category_id']))?'updated':'saved';
	                    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category '.$message.' successfully.','redirect'=>'admin/sign-in');
	                }
	                else{
	                	$message 	= (isset($input_details['sub_sub_category_id']) && !empty($input_details['sub_sub_category_id']))?'update':'save';
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

	public function get_sub_sub_categories(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->sub_sub_category_model->get_sub_sub_categories();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Sub sub caregory available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get sub caregory .');
		}
     	echo json_encode($response);
	}

	public function set_sub_sub_category_display(){
		$input_details = $this->input->post();
		if(isset($input_details['sub_sub_category_id']) && !empty($input_details['sub_sub_category_id'])){
			$where = array('sub_sub_category_id' => $input_details['sub_sub_category_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->sub_sub_category_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_sub_sub_category(){
		$postData 	= $this->input->post();
		$response 	= array();
		$whereArr 	= $postData['sub_sub_category_id'];
		$result 	= $this->sub_sub_category_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
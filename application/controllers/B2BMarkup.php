<?php defined('BASEPATH') OR exit('No direct script access allowed');

class B2BMarkup extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('Category_model','category_model');
        $this->load->model('b2bMarkup_model','b2bMarkup_model');
	}

    public function get_b2bmarkup_form_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data  = array();
			$data['priceRange'] = $this->b2bMarkup_model->get_priceRangeList();
			 
			$view 		= $this->load->view('admin/b2bMarkup/b2bmarkup-form.php',$data , true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'','data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	// public function get_all_subadmin(){
	// 	$postData = $this->input->post();
    //  	$data = $this->auth_model->get_all_users($postData);
    //  	echo json_encode($data);
	// }
    
    // public function get_all_subadmin(){
	// 	$inputData 		= array();
	// 	$response 		= null;
	// 	$result  	    = $this->auth_model->get_all_users();
	// 	if($result){
	// 	    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Subadmin available.','data'=>$result);
	// 	}
	// 	else{
	// 	    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get subadmin.');
	// 	}
    //  	echo json_encode($response);
	// }

    // public function get_subadmin(){
	// 	$response 	= array();
	// 	$getData 	= $this->input->get();
    //  	$result 	= $this->auth_model->get_user($getData['user_id']);
	// 	if($result){
	// 	    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Subadmin available.','data'=>$result);
	// 	}
	// 	else{
	// 	    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get subadmin.');
	// 	}
    //  	echo json_encode($response);
	// }

	// public function set_subadmin_display(){
	// 	$input_details = $this->input->post();
	// 	if(isset($input_details['user_id']) && !empty($input_details['user_id'])){
	// 		$where = array('user_id' => $input_details['user_id']);
	// 		$input_detail = array('display' => $input_details['display']);
    //         $result = $this->auth_model->update_record($input_detail,$where);
	// 		if ($result){
	// 			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
	// 		}else{
	// 			$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
	// 		}
	// 		echo json_encode($response);
	// 	}
	// }

	// public function delete_subadmin(){
	// 	$postData 	= $this->input->post();
	// 	$response 	= array();
	// 	//$updataArr 	= array('display' => "N");
	// 	$whereArr 	= $postData['user_id'];
	// 	//$whereArr 	= array('user_id' => $postData['user_id']);
	// 	//$result 	= $this->auth_model->update_record($updataArr, $whereArr);
	// 	$result 	= $this->auth_model->delete($whereArr);
	// 	if ($result){
	// 		$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
	// 	}else{
	// 		$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
	// 	}
	// 	echo json_encode($response);
	// }

	public function set_b2bmarkup() {
		$input_details 		= $this->input->post();
		$categoryData 		= array();
		$response 			= array();
		$admin_session	    = $this->session->userdata('admin');
		$is_logged_in 	    = $admin_session['isLoggedIn'];
		if($is_logged_in){
	        if($input_details){
	        	$this->form_validation->set_error_delimiters('',',');
				$this->form_validation->set_rules('category_id', 'Category ID', 'required');
	            $this->form_validation->set_rules('sub_category_title', 'Sub Category title', 'required');
	            $this->form_validation->set_rules('sub_category_desc', 'Sub Category description', 'required');

				$markupData['b2b_ctry_priceRange_class_markup_ctryId']	     = strip_tags($input_details['country_id']);
	            $markupData['b2b_ctry_priceRange_class_markup_priceRangeId	']	 = strip_tags($input_details['PriceRange']);
	            $markupData['b2b_ctry_priceRange_class_markup_starClass']	 = strip_tags($input_details['valueClass']);
				$markupData['b2b_ctry_priceRange_class_markup_markup']	 = strip_tags($input_details['markup']);
				 
                $result = $this->b2bMarkup_model->setMarkup($markupData);
	            	 
	             
	        }
	        echo json_encode($response);
	    }else{
	    	redirect('admin/sign-in','refresh');	
	    }
	}

	// public function get_sub_categories(){
	// 	$postData = $this->input->post();
    //  	$data     = $this->sub_category_model->get_sub_categories($postData);
    //  	echo json_encode($data);
	// }

	public function get_b2bMarkups(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->b2bMarkup_model->get_b2bMarkups();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Sub caregory available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get sub caregory .');
		}
     	echo json_encode($response);
	}

	// public function get_category(){
	// 	$response 	= array();
	// 	$getData 	= $this->input->get();
    //  	$result 	= $this->category_model->get_category($getData['category_id']);
	// 	if($result){
	// 	    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category available.','data'=>$result);
	// 	}
	// 	else{
	// 	    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get category.');
	// 	}
    //  	echo json_encode($response);
	// }
	
	public function set_sub_category_display(){
		$input_details = $this->input->post();
		if(isset($input_details['sub_category_id']) && !empty($input_details['sub_category_id'])){
			$where = array('sub_category_id' => $input_details['sub_category_id']);
			$input_detail = array('display'  => $input_details['display']);
            $result = $this->sub_category_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_sub_category(){
		$postData 	= $this->input->post();
		$response 	= array();
		$whereArr 	= $postData['sub_category_id'];
		$result 	= $this->sub_category_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

	// public function delete_category(){
	// 	$postData 	= $this->input->post();
	// 	$response 	= array();
	// 	$updataArr 	= array('display' => "N");
	// 	$whereArr 	= array('category_id' => $postData['category_id']);
	// 	$result 	= $this->category_model->update_record($updataArr, $whereArr);
	// 	if ($result){
	// 		$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
	// 	}else{
	// 		$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
	// 	}
	// 	echo json_encode($response);
	// }

}
?>
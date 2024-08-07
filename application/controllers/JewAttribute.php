<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewAttribute extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('jewellary/Attribute_model', 'attribute_model');
        $this->load->model('jewellary/SubCategory_model', 'subcategory_model');
    }

    public function jewellary_attributes_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session)) {
            if ($admin_session['isLoggedIn']) {
                $data['view'] = 'admin/jewellary/attribute/attribute';
                $data['title'] = 'Lab Grown Diamond | Attribute';
                $data['script'] = 'jewellary/attribute.js';
                $data['subcategories'] = $this->subcategory_model->get_category();
                $this->template->load_admin($data);
            } else {
                redirect('admin/sign-in', 'refresh');
            }
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    public function set_jewellary_attributes() {
        $input_details = $this->input->post();
        $categoryData = array();
        $response = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in = $admin_session['isLoggedIn'];
        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('subCategoryName', 'Sub Category Name', 'required');
                $this->form_validation->set_rules('attribute_title', 'Attribute Title', 'required');
                
                $categoryData['subcategory_id'] = strip_tags($input_details['subCategoryName']);
                $categoryData['attribute_title'] = strip_tags($input_details['attribute_title']);
                $categoryData['display'] = strip_tags($input_details['display']);
                
                if ($this->form_validation->run() == true) {
                    if (isset($input_details['attribute_id']) && !empty($input_details['attribute_id'])) {
                        $where = array('attribute_id' => $input_details['attribute_id']);
                        $result = $this->attribute_model->update_record($categoryData, $where);
						$message = 'updated';
                    } else {
                        $result = $this->attribute_model->save_record($categoryData);
                        $message = 'saved';
                    }
                    
                    if ($result) {
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Attribute ' . $message . ' successfully.');
                    } else {
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' category.');
                    }
                } else {
                    $response = array('state' => FALSE, 'title' => 'Insufficient Details!', 'type' => 'danger', 'message' => $this->form_validation->error_array());
                }
            }
            echo json_encode($response);
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    public function get_jewellary_attributes() {
        $postData = $this->input->post();
		$data = $this->attribute_model->get_attributes($postData);
        echo json_encode($data);
    }

    public function get_jewellary_attribute() {
        $response = array();
        $getData = $this->input->get();
		$data = array();
        
        $data['result'] = $this->attribute_model->get_attribute($getData['attribute_id']);
		$data['categories'] = $this->subcategory_model->get_category();
        
        if ($data['result']) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Category available.', 'data' => $data);
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to get category.');
        }
        echo json_encode($response);
    }

    public function delete_jewellary_attributes() {
        $postData = $this->input->post();
        $response = array();
        $updateArr = array('display' => 'N');
        $whereArr = array('attribute_id' => $postData['attribute_id']);
        $result = $this->attribute_model->update_record($updateArr, $whereArr);
        
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Deleted Successfully!');
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to delete.');
        }
        echo json_encode($response);
    }
}
?>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewBrand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jewellary/Brand_model', 'brand_model');
    }

    public function jewellary_brands_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session)) {
            if ($admin_session['isLoggedIn']) {
                $data['view']   = 'admin/jewellary/brand/brand'; // Adjust the path to your view
                $data['title']  = 'Lab Grown Diamond | Brand';
                $data['script'] = 'jewellary/brand.js'; // Adjust the path to your script
                $this->template->load_admin($data);
            } else {
                redirect('admin/sign-in', 'refresh');
            }
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    public function set_jewellary_brand() {
        $input_details = $this->input->post();
        $brandData     = array();
        $response      = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in  = $admin_session['isLoggedIn'];
        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('brandName', 'Brand name', 'required');
                $this->form_validation->set_rules('brandHomePageURL', 'Brand home page URL', 'required');
                
                $brandData['brandName']         = strip_tags($input_details['brandName']);
                $brandData['brandHomePageURL']  = strip_tags($input_details['brandHomePageURL']);

                if ($this->form_validation->run() == true) {
                    if (isset($input_details['brand_id']) && !empty($input_details['brand_id'])) {
                        $where  = array('brand_id' => $input_details['brand_id']);
                        $result = $this->brand_model->update_record($brandData, $where);
                    } else {
                        $result = $this->brand_model->save_record($brandData);
                    }

                    if ($result) {
                        $message = (isset($input_details['brand_id']) && !empty($input_details['brand_id'])) ? 'updated' : 'saved';
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Brand ' . $message . ' successfully.', 'redirect' => 'admin/sign-in');
                    } else {
                        $message = (isset($input_details['brand_id']) && !empty($input_details['brand_id'])) ? 'update' : 'save';
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' brand.');
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

    public function get_jewellary_brands() {
        $postData = $this->input->post();
        $data = $this->brand_model->get_brands($postData);
        echo json_encode($data);
    }

    public function get_jewellary_brand() {
        $response = array();
        $getData  = $this->input->get();
        $result   = $this->brand_model->get_brand($getData['brand_id']);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Brand available.', 'data' => $result);
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to get brand.');
        }
        echo json_encode($response);
    }

    public function delete_jewellary_brand() {
        $postData = $this->input->post();
        $response = array();

        // Check if brand_id is present in the POST data
        if (isset($postData['brand_id']) && !empty($postData['brand_id'])) {
            // Perform the delete operation
            $result = $this->brand_model->delete($postData['brand_id']);
            
            if ($result) {
                $response = array(
                    'state' => TRUE,
                    'title' => '',
                    'type' => 'success',
                    'message' => 'Deleted Successfully!'
                );
            } else {
                $response = array(
                    'state' => FALSE,
                    'title' => '',
                    'type' => 'danger',
                    'message' => 'Unable to delete'
                );
            }
        } else {
            $response = array(
                'state' => FALSE,
                'title' => '',
                'type' => 'danger',
                'message' => 'Invalid Brand ID'
            );
        }

        echo json_encode($response);
    }
}

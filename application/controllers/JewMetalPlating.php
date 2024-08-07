<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewMetalPlating extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jewellary/MetalPlating_model', 'metal_plating_model');
    }

    // View for managing metal platings
    public function metal_plating_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session)) {
            if ($admin_session['isLoggedIn']) {
                $data['view']   = 'admin/jewellary/metal_plating/metal_plating'; // Adjust the path to your view
                $data['title']  = 'Metal Plating Management';
                $data['script'] = 'jewellary/metalPlating.js'; // Adjust the path to your script
                $this->template->load_admin($data);
            } else {
                redirect('admin/sign-in', 'refresh');
            }
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    // Add or update a metal plating
    public function set_metal_plating() {
        $input_details = $this->input->post();
        $metalPlatingData = array();
        $response = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in = $admin_session['isLoggedIn'];
    
        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('metal_plate_name', 'Metal Plate Name', 'required');
                // Not setting rules for image as it's handled separately
                
                $metalPlatingData['metal_plate_name'] = strip_tags($input_details['metal_plate_name']);
    
                if ($this->form_validation->run() == true) {
                    // Handle file upload
                    if (!empty($_FILES['metal_plate_image']['name'])) {
                        $config['upload_path']   = './assets/uploads/metal_platings/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size']      = 2048; // 2MB
                        $config['encrypt_name']  = TRUE; // Encrypt the file name
    
                        $this->load->library('upload', $config);
    
                        if ($this->upload->do_upload('metal_plate_image')) {
                            $uploadData = $this->upload->data();
                            $metalPlatingData['metal_plate_image'] = $uploadData['file_name'];
                        } else {
                            $response = array('state' => FALSE, 'title' => 'Upload Error!', 'type' => 'danger', 'message' => $this->upload->display_errors());
                            echo json_encode($response);
                            return;
                        }
                    } else {
                        // If no image is uploaded, keep the old image
                        if (isset($input_details['metal_plate_id']) && !empty($input_details['metal_plate_id'])) {
                            // Fetch existing record to keep the old image
                            $existingRecord = $this->metal_plating_model->get_record(array('metal_plate_id' => $input_details['metal_plate_id']));
                            if ($existingRecord) {
                                $metalPlatingData['metal_plate_image'] = $existingRecord->metal_plate_image;
                            }
                        }
                    }
    
                    if (isset($input_details['metal_plate_id']) && !empty($input_details['metal_plate_id'])) {
                        $where = array('metal_plate_id' => $input_details['metal_plate_id']);
                        $result = $this->metal_plating_model->update_record($metalPlatingData, $where);
                    } else {
                        $result = $this->metal_plating_model->save_record($metalPlatingData);
                    }
    
                    if ($result) {
                        $message = (isset($input_details['metal_plate_id']) && !empty($input_details['metal_plate_id'])) ? 'updated' : 'saved';
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Metal Plating ' . $message . ' successfully.');
                    } else {
                        $message = (isset($input_details['metal_plate_id']) && !empty($input_details['metal_plate_id'])) ? 'update' : 'save';
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' metal plating.');
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
    

    // Get a list of metal platings
    public function get_metal_platings() {
        $postData = $this->input->post();
        $data = $this->metal_plating_model->get_metal_platings($postData);
        echo json_encode($data);
    }

    // Get a single metal plating by ID
    public function get_metal_plating() {
        $response = array();
        $getData = $this->input->get();
        $result = $this->metal_plating_model->get_metal_plating($getData['metal_plate_id']);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'data' => $result);
        } else {
            $response = array('state' => FALSE, 'title' => 'Error!', 'type' => 'danger', 'message' => 'No data found.');
        }
        echo json_encode($response);
    }

    // Delete a metal plating by ID
    public function delete_metal_plating() {
        $response = array();
        $postData = $this->input->post();
        $result = $this->metal_plating_model->delete($postData['metal_plate_id']);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Metal Plating deleted successfully.');
        } else {
            $response = array('state' => FALSE, 'title' => 'Error!', 'type' => 'danger', 'message' => 'Unable to delete Metal Plating.');
        }
        echo json_encode($response);
    }
}
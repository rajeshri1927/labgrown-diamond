<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewCertificate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jewellary/Certificate_model', 'certificate_model');
    }

    // View for managing certificates
    public function certificate_jewellary_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session)) {
            if ($admin_session['isLoggedIn']) {
                $data['view']   = 'admin/jewellary/certificate/certificate'; // Adjust the path to your view
                $data['title']  = 'Certificates Management';
                $data['script'] = 'jewellary/certificate.js'; // Adjust the path to your script
                $this->template->load_admin($data);
            } else {
                redirect('admin/sign-in', 'refresh');
            }
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    // Add or update a certificate
    public function set_jewellary_certificate() {
        $input_details = $this->input->post();
        $certificateData = array();
        $response = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in = $admin_session['isLoggedIn'];
        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
                $this->form_validation->set_rules('minimum_for_123_carat', 'Minimum for 1.23 Carat', 'required|numeric');
                $this->form_validation->set_rules('minimum_for_x_diamond_wt', 'Minimum for X Diamond Weight', 'required'); // Added validation
                $this->form_validation->set_rules('rate_per_carat', 'Rate Per Carat', 'required|numeric');
                $this->form_validation->set_rules('total', 'Total', 'required|numeric');
                
                $certificateData['institute_name']           = strip_tags($input_details['institute_name']);
                $certificateData['minimum_for_123_carat']    = strip_tags($input_details['minimum_for_123_carat']);
                $certificateData['minimum_for_x_diamond_wt'] = strip_tags($input_details['minimum_for_x_diamond_wt']); // Handle new column
                $certificateData['rate_per_carat']           = strip_tags($input_details['rate_per_carat']);
                $certificateData['total']                    = strip_tags($input_details['total']);

                if ($this->form_validation->run() == true) {
                    if (isset($input_details['certificate_id']) && !empty($input_details['certificate_id'])) {
                        $where = array('certificate_id' => $input_details['certificate_id']);
                        $result = $this->certificate_model->update_record($certificateData, $where);
                    } else {
                        $result = $this->certificate_model->save_record($certificateData);
                    }

                    if ($result) {
                        $message = (isset($input_details['certificate_id']) && !empty($input_details['certificate_id'])) ? 'updated' : 'saved';
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Certificate ' . $message . ' successfully.');
                    } else {
                        $message = (isset($input_details['certificate_id']) && !empty($input_details['certificate_id'])) ? 'update' : 'save';
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' certificate.');
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

    // Get a list of certificates
    public function get_jewellary_certificates() {
        $postData = $this->input->post();
        $data = $this->certificate_model->get_certificates($postData);
        echo json_encode($data);
    }

    // Get a single certificate by ID
    public function get_jewellary_certificate() {
        $response = array();
        $getData = $this->input->get();
        $result = $this->certificate_model->get_certificate($getData['certificate_id']);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Certificate available.', 'data' => $result);
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to get certificate.');
        }
        echo json_encode($response);
    }

    // Delete a certificate
    public function delete_jewellary_certificate() {
        $postData = $this->input->post();
        $response = array();

        // Check if certificate_id is present in the POST data
        if (isset($postData['certificate_id']) && !empty($postData['certificate_id'])) {
            // Perform the delete operation
            $result = $this->certificate_model->delete($postData['certificate_id']);
            
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
                    'message' => 'Unable to delete certificate.'
                );
            }
        } else {
            $response = array(
                'state' => FALSE,
                'title' => '',
                'type' => 'danger',
                'message' => 'No certificate ID provided.'
            );
        }

        echo json_encode($response);
    }
}

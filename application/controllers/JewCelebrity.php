<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewCelebrity extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jewellary/Celebrity_model', 'celebrity_model');
    }

    public function jewellary_celebrities_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session)) {
            if ($admin_session['isLoggedIn']) {
                $data['view']   = 'admin/jewellary/celebrity/celebrity'; // Adjust the path to your view
                $data['title']  = 'Lab Grown Diamond | Celebrity';
                $data['script'] = 'jewellary/celebrity.js'; // Adjust the path to your script
                $this->template->load_admin($data);
            } else {
                redirect('admin/sign-in', 'refresh');
            }
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    public function set_jewellary_celebrity() {
        $input_details = $this->input->post();
        $celebrityData = array();
        $response      = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in  = $admin_session['isLoggedIn'];
        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('celebrities_name', 'Celebrity Name', 'required');
                $this->form_validation->set_rules('text_content_for_seo', 'Text Content for SEO', 'required');
                $this->form_validation->set_rules('link', 'Link', 'required');
                
                $celebrityData['celebrities_name']         = strip_tags($input_details['celebrities_name']);
                $celebrityData['text_content_for_seo']     = strip_tags($input_details['text_content_for_seo']);
                $celebrityData['link']                     = strip_tags($input_details['link']);

                if ($this->form_validation->run() == true) {
                    if (isset($input_details['celebrity_id']) && !empty($input_details['celebrity_id'])) {
                        $where  = array('celebrity_id' => $input_details['celebrity_id']);
                        $result = $this->celebrity_model->update_record($celebrityData, $where);
                    } else {
                        $result = $this->celebrity_model->save_record($celebrityData);
                    }

                    if ($result) {
                        $message = (isset($input_details['celebrity_id']) && !empty($input_details['celebrity_id'])) ? 'updated' : 'saved';
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Celebrity ' . $message . ' successfully.', 'redirect' => 'admin/sign-in');
                    } else {
                        $message = (isset($input_details['celebrity_id']) && !empty($input_details['celebrity_id'])) ? 'update' : 'save';
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' celebrity.');
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

    public function get_jewellary_celebrities() {
        $postData = $this->input->post();
        $data = $this->celebrity_model->get_celebrities($postData);
        echo json_encode($data);
    }

    public function get_jewellary_celebrity() {
        $response = array();
        $getData  = $this->input->get();
        $result   = $this->celebrity_model->get_celebrity($getData['celebrity_id']);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Celebrity available.', 'data' => $result);
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to get celebrity.');
        }
        echo json_encode($response);
    }

    public function delete_jewellary_celebrity() {
        $postData = $this->input->post();
        $response = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in  = $admin_session['isLoggedIn'];
        if ($is_logged_in) {
            if (isset($postData['celebrity_id']) && !empty($postData['celebrity_id'])) {
                $result = $this->celebrity_model->delete($postData['celebrity_id']);
                if ($result) {
                    $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Celebrity deleted successfully.');
                } else {
                    $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to delete celebrity.');
                }
            } else {
                $response = array('state' => FALSE, 'title' => 'Invalid ID!', 'type' => 'danger', 'message' => 'Celebrity ID is missing.');
            }
            echo json_encode($response);
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }
}

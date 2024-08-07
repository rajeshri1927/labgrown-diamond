<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JewMetal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jewellary/Metal_model', 'metal_model');
        $this->load->library('form_validation');  // Ensure the form validation library is loaded
    }

    public function jewellary_metal_view() {
        $admin_session = $this->session->userdata('admin');
        if (isset($admin_session) && !empty($admin_session) && $admin_session['isLoggedIn']) {
            $data['view'] = 'admin/jewellary/metal/metal';
            $data['title'] = 'Lab Grown Diamond | Metal';
            $data['script'] = 'jewellary/metal.js';
            $this->template->load_admin($data);
        } else {
            redirect('admin/sign-in', 'refresh');
        }
    }

    public function set_jewellary_metal() {
        $input_details = $this->input->post();
        $metalData = array();
        $response = array();
        $admin_session = $this->session->userdata('admin');
        $is_logged_in = isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'];

        if ($is_logged_in) {
            if ($input_details) {
                $this->form_validation->set_error_delimiters('', ',');
                $this->form_validation->set_rules('metal_name', 'Metal Name', 'required');
                $this->form_validation->set_rules('making_charge', 'Making Charge', 'required|numeric');
                $this->form_validation->set_rules('density', 'Density', 'required|numeric');
                $this->form_validation->set_rules('rate_as_per_api', 'Rate As Per API', 'required|numeric');
                $this->form_validation->set_rules('manual_date', 'Manual Date', 'required');
                $this->form_validation->set_rules('manual_rate', 'Manual Rate', 'required|numeric');
                $this->form_validation->set_rules('use_api_rate', 'Use API Rate', 'required');
            $this->form_validation->set_rules('use_manual_rate', 'Use Manual Rate', 'required');

                $metalData = array(
                    'metal_name'        => strip_tags($input_details['metal_name']),
                    'making_charge'     => strip_tags($input_details['making_charge']),
                    'density'           => strip_tags($input_details['density']),
                    'rate_as_per_api'   => strip_tags($input_details['rate_as_per_api']),
                    'manual_date'       => $this->formatDateToMySQL($input_details['manual_date']),
                    'manual_rate'       => strip_tags($input_details['manual_rate']),
                    'use_api_rate'      => strip_tags($input_details['use_api_rate']),
                    'use_manual_rate'   => strip_tags($input_details['use_manual_rate'])
                );
				
                if ($this->form_validation->run() === TRUE) {
                    if (!empty($input_details['metal_id'])) {
                        $where = array('metal_id' => $input_details['metal_id']);
                        $result = $this->metal_model->update_record($metalData, $where);
                    } else {
                        $result = $this->metal_model->save_record($metalData);
                    }

                    if ($result) {
                        $message = !empty($input_details['metal_id']) ? 'updated' : 'saved';
                        $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Metal ' . $message . ' successfully.');
                    } else {
                        $message = !empty($input_details['metal_id']) ? 'update' : 'save';
                        $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to ' . $message . ' metal.');
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
	public function formatDateToMySQL($date) {
		try {
			// Attempt to create a DateTime object from the given date
			$dateTime = new DateTime($date);
			// Return the date in MySQL format
			return $dateTime->format('Y-m-d');
		} catch (Exception $e) {
			// Handle the error if the date format is incorrect
			return null; // or handle it according to your application's needs
		}
	}

    public function get_jewellary_metals() {
        $postData = $this->input->post();
        $data = $this->metal_model->get_metals($postData);
        echo json_encode($data);
    }

    public function get_jewellary_metal() {
        $response = array();
        $getData = $this->input->get();
        $result = $this->metal_model->get_metal(isset($getData['metal_id']) ? $getData['metal_id'] : '');
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Metal available.', 'data' => $result);
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to get metal.');
        }
        echo json_encode($response);
    }

    public function delete_jewellary_metal() {
        $postData = $this->input->post();
        $response = array();
        //$updateArr = array('display' => 'N');
        //$whereArr = array('metal_id' => isset($postData['metal_id']) ? $postData['metal_id'] : '');
        $result 	= $this->metal_model->delete($postData['metal_id']);
		//$result = $this->metal_model->update_record($updateArr, $whereArr);
        if ($result) {
            $response = array('state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Deleted Successfully!');
        } else {
            $response = array('state' => FALSE, 'title' => '', 'type' => 'danger', 'message' => 'Unable to delete');
        }
        echo json_encode($response);
    }
}

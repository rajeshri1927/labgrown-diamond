<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use PhpOffice\PhpSpreadsheet\IOFactory;
require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel/IOFactory.php';


class ImageUpload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('image_model');
    }

    public function index() {
        $this->load->view('admin/upload_form');
    }

    public function do_upload() {
        $config['upload_path']   = FCPATH . 'assets/uploads/products/images/';
        $config['allowed_types'] = 'csv|text/csv|application/csv';
        $config['max_size']      = 2048; // 2MB
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        
        $this->load->library('upload', $config);

        $upload_directory = $config['upload_path'];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('csv_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);
        } else {
            
            $data = array('upload_data' => $this->upload->data());
            $excel_path = './uploads/' . $data['upload_data']['file_name'];
            //print_r($excel_path);die;
            // Read Excel file using PhpSpreadsheet
            
            $spreadsheet = PHPExcel_IOFactory::load($excel_path);
            print_r($spreadsheet);die;
            $reader = PHPExcel_IOFactory::createReader('csv');
            $spreadsheet = $reader->load($excel_path);
            echo $excel_path;
            //print_r($spreadsheet);die;
            // $spreadsheet = IOFactory::load($excel_path);
            // print_r($spreadsheet);die;
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();

            // Loop through rows and insert data into the database
            for ($row = 2; $row <= $highestRow; $row++) {
                $image_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $image_path = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                // Insert data into the database
                $this->image_model->insert_image($image_name, $image_path);
            }

            // Redirect to success page or do something else
            $this->load->view('upload_success', $data);
        }
    }
}

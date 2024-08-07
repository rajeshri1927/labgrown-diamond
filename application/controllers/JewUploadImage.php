<?php defined('BASEPATH') OR exit('No direct script access allowed');
class JewUploadImage extends CI_Controller {

	public function __construct(){
		parent::__construct();
	   // $this->load->model('jewellary/Upload_model','upload_model');
		
    }

	public function jewellary_image_upload_page(){
		$admin_session = $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)){
			if(isset($admin_session['isLoggedIn']) && $admin_session['isLoggedIn'] == TRUE) {
				$data['view'] 	    = 'admin/jewellary/upload/upload';
				$data['title'] 		= 'Admin | Jewellary Image Upload Page';
				$data['script']		= 'jewellary/upload.js';
				$this->template->load_admin($data);
			} else {
				redirect(base_url().'admin/login');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}

	public function upload_image_folder() {
		// Configure upload path
		$config['upload_path'] = FCPATH . 'assets/uploads/jewellaryImages/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = TRUE;
	
		// Load upload library with config
		$this->load->library('upload', $config);
	
		// Validate the upload path
		if (!$this->upload->validate_upload_path()) {
			echo json_encode(['state' => false, 'message' => 'Invalid upload path.']);
			return;
		}
	
		// Handle file upload
		$files = $_FILES['files'];
		$file_count = count($files['name']);
		$uploaded_files = [];
	
		for ($i = 0; $i < $file_count; $i++) {
			$_FILES['file']['name'] = $files['name'][$i];
			$_FILES['file']['type'] = $files['type'][$i];
			$_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['file']['error'] = $files['error'][$i];
			$_FILES['file']['size'] = $files['size'][$i];
	
			if ($this->upload->do_upload('file')) {
				$upload_data = $this->upload->data();
				$uploaded_files[] = 'assets/uploads/jewellaryImages/' . $upload_data['file_name'];
			} else {
				echo json_encode(['state' => false, 'message' => $this->upload->display_errors()]);
				return;
			}
		}
	
		echo json_encode(['state' => true, 'message' => 'Files uploaded successfully.']);
	}
	
	
	


}
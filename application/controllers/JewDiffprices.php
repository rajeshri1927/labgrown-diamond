<?php defined('BASEPATH') OR exit('No direct script access allowed');
class JewDiffprices extends CI_Controller {
	
	public function __construct(){
	    parent::__construct();
		$this->load->model('jewellary/Diffprice_model','diffprice_model');
    }

	public function jewellary_differentprices_view() {
		$admin_session	= $this->session->userdata('admin');
		if(isset($admin_session) && !empty($admin_session)) {
			if($admin_session['isLoggedIn']){
				$data['view'] 				= 'admin/jewellary/differentprice/differentprice';
				$data['title'] 				= 'Lab Grown Diamond | Different Price';
				$data['script']				= 'jewellary/differentprice.js';
				$postData = [];
				//$data['pricerange']			= $this->category_model->get_category();
				$this->template->load_admin($data);
			}else{
				redirect('admin/sign-in','refresh');
			}
		} else {
			redirect('admin/sign-in','refresh');
		}
	}
	public function upload_different_table_prices_excel() {
		// Load necessary libraries
		$this->load->library('upload');
		$this->load->helper('file'); // Load file helper for file operations
	
		$uploadPath = './assets/uploads/different_table_prices_excel/';
		
		// Check if directory exists; if not, create it
		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, true);
		}
	
		// Configure upload settings
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'csv'; // Ensure only CSV files are allowed
		$config['file_name'] = 'uploaded_file_' . time();
	
		$this->upload->initialize($config);
	
		// Check if file was uploaded
		if (!empty($_FILES['differentprice_upload_excel']['name'])) {
			if ($this->upload->do_upload('differentprice_upload_excel')) {
				$fileData = $this->upload->data();
				$filePath = $fileData['full_path'];
	
				// Parse the CSV file
				$csvData = array_map('str_getcsv', file($filePath));
	
				// Retrieve selected table value
				$selectedTable = $this->input->post('selected_table');
	
				$formattedData = [];
				foreach ($csvData as $rowIndex => $row) {
					if ($rowIndex == 0) { // Skip header row if it exists
						continue;
					}
	
					// Assuming CSV columns are PriceStart and PriceEnd
					$formattedData[] = [
						'PriceStart' => $row[0], // Adjust according to CSV format
						'PriceEnd' => $row[1],
						'price_tablename' => $selectedTable
					];
				}
	
				// Call model method to insert data
				$result = $this->diffprice_model->different_table_prices_insert_data($formattedData);
	
				if ($result) {
					echo json_encode(array('state' => true, 'message' => 'File uploaded and processed successfully.'));
				} else {
					echo json_encode(array('state' => false, 'message' => 'Failed to insert data into the database.'));
				}
			} else {
				echo json_encode(array('state' => false, 'message' => $this->upload->display_errors()));
			}
		} else {
			echo json_encode(array('state' => false, 'message' => 'No file uploaded.'));
		}
	}
	
	public function get_jewellay_different_prices(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->diffprice_model->get_jewellay_different_prices();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'Price tables available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get price tables.');
		}
     	echo json_encode($response);
	}

	// public function get_jewellary_subcategories(){
	// 	$postData = $this->input->post();
    //  	$data = $this->subcategory_model->get_categories($postData);
	// 	echo json_encode($data);
	// }

	// public function get_jewellary_subcategory(){
	// 	$response 	= array();
	// 	$getData 	= $this->input->get();
	// 	$data = array();
    //  	$data['result'] 	= $this->subcategory_model->get_category($getData['subcategory_id']);
	// 	 $data['categories']	= $this->category_model->get_category();
	// 	if($data['result']){
	// 	    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'category available.','data'=>$data);
	// 	}
	// 	else{
	// 	    $response 	= array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get category.');
	// 	}
    //  	echo json_encode($response);
	// }

	// public function delete_jewellary_subcategory(){
	// 	$postData 	= $this->input->post();
	// 	$response 	= array();
	// 	$updataArr 	= array('display' => "N");
	// 	$whereArr 	= array('subcategory_id' => $postData['subcategory_id']);
	// 	$result 	= $this->subcategory_model->update_record($updataArr, $whereArr);
	// 	if ($result){
	// 		$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
	// 	}else{
	// 		$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
	// 	}
	// 	echo json_encode($response);
	// }
}
?>
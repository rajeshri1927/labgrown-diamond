<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homeapi extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Role_model','role_model');
        $this->load->model('Site','location');
        $this->load->model('Shape_model','shape_model');
        $this->load->model('Carat_weight_model','carat_weight_model');
        $this->load->model('Color_model','color_model');
        $this->load->model('Clarity_model','clarity_model');
        $this->load->model('Homeapi_model','homeapi_model');
	}

    public function get_home_api_form_view(){
		$admin_session = $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			// print_r($inputData['home_api_id']);die;
			$data      = array();
			$data['shapes']  = $this->shape_model->get_shapes();
			$data['caratweights']  = $this->carat_weight_model->get_carat_weight();
			$data['colors']  = $this->color_model->get_color();
			$data['clarities']  = $this->clarity_model->get_clarity();;
            if(isset($inputData['home_api_id']) && !empty($inputData['home_api_id'])){
				$data['homeapi'] = $this->homeapi_model->get_existing_data($inputData['home_api_id']);
			}
			//print_r($data['homeapi']);die;
			$view 		= $this->load->view('admin/homeapi/homeapi-form', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'','data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}   

	// public function setHomeApiResponse() {
	//     $input_details = $this->input->post();
	//     $inputData = [];
	//     //print_r($input_details);
	//     // $api_url =
    //     //     "https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond&";
    //     /*Shape Code Here*/
    //         // Construct the API URL
	//     $api_url = "https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond";
	    
	//     // Append the shape parameter if it exists in the input details
	//     if (!empty($input_details['shape'])) {
	//         $api_url .= '&shape=' . urlencode($input_details['shape']);
	//     }

	//     // Optionally append other parameters in a similar way
	//     if (!empty($input_details['size_from'])) {
	//         $api_url .= '&size_from=' . urlencode($input_details['size_from']);
	//     }

	//     if (!empty($input_details['size_to'])) {
	//         $api_url .= '&size_to=' . urlencode($input_details['size_to']);
	//     }

	//     if (!empty($input_details['quality'])) {
	//         $api_url .= '&quality=' . urlencode($input_details['quality']);
	//     }

	//     if (!empty($input_details['color_from'])) {
	//         $api_url .= '&color_from=' . urlencode($input_details['color_from']);
	//     }

	//     if (!empty($input_details['color_to'])) {
	//         $api_url .= '&color_to=' . urlencode($input_details['color_to']);
	//     }

	//     if (!empty($input_details['clarity_from'])) {
	//         $api_url .= '&clarity_from=' . urlencode($input_details['clarity_from']);
	//     }

	//     if (!empty($input_details['clarity_to'])) {
	//         $api_url .= '&clarity_to=' . urlencode($input_details['clarity_to']);
	//     }
    //     /*End*/
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => $api_url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         // CURLOPT_HTTPHEADER => [
    //         //     "Authorization: Token token=iltz_Ie1tN0qm-ANqF7X6SRjwyhmMtzZsmqvyWOZ83I, api_key=_eTAh9su9_0cnehpDpqM9xA",
    //         // ],
    //         CURLOPT_HTTPHEADER => [
    //             "Authorization: Token token=Wggu24q8pZWmPFmHpjXy6xPLBP_iZQXjD5h0lozgctI, api_key=_ueOHfktjdg_CWqpq28pedg",
    //         ],
    //     ]);
    //     $json_response = curl_exec($curl);
    //     curl_close($curl);
    //     $data["json_data"] = json_decode($json_response, true);
    //     echo "<pre>";print_r($data["json_data"]['response']['body']['diamonds']);die;
    //     foreach($data["json_data"]['response']['body']['diamonds'] as $diamond){

    //     }
    //     $inputData["shape"] = strip_tags($diamond["shape"]);
    //     $inputData["quality"] = strip_tags($diamond["quality"]);
    //     $inputData["color"] = strip_tags($diamond["color"]);
    //     $inputData["clarity"] = strip_tags($diamond["clarity"]);
    //     $inputData["price_from"] = strip_tags($diamond["price_from"]);
    //     $inputData["price_from"] = strip_tags($diamond["price_to"]);
    //     $result = $this->homeapi_model->save_record($diamond);
    //     if($result){
	// 	    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'B2A available.','data'=>$result);
	// 	}
	// 	else{
	// 	    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get B2A.');
	// 	}
    //  	echo json_encode($response);
	// }
	
	// public function setHomeApiResponse() {
	//     // Get the input details from the POST request
	//     $input_details = $this->input->post();
	//     $inputData = [];

	//     // Construct the API URL
	//     $api_url = "https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond";
	    
	//     // Append parameters to the URL if they exist in the input details
	//     $params = [
	//         'shape' => 'shape',
	//         'size_from' => 'size_from',
	//         'size_to' => 'size_to',
	//         'quality' => 'quality',
	//         'color_from' => 'color_from',
	//         'color_to' => 'color_to',
	//         'clarity_from' => 'clarity_from',
	//         'clarity_to' => 'clarity_to'
	//     ];

	//     foreach ($params as $key => $value) {
	//         if (!empty($input_details[$key])) {
	//             $api_url .= '&' . $value . '=' . urlencode($input_details[$key]);
	//         }
	//     }

	//     // Initialize cURL
	//     $curl = curl_init();
	//     curl_setopt_array($curl, [
	//         CURLOPT_URL => $api_url,
	//         CURLOPT_RETURNTRANSFER => true,
	//         CURLOPT_ENCODING => "",
	//         CURLOPT_MAXREDIRS => 10,
	//         CURLOPT_TIMEOUT => 0,
	//         CURLOPT_FOLLOWLOCATION => true,
	//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	//         CURLOPT_CUSTOMREQUEST => "GET",
	//         CURLOPT_HTTPHEADER => [
	//             "Authorization: Token token=Wggu24q8pZWmPFmHpjXy6xPLBP_iZQXjD5h0lozgctI, api_key=_ueOHfktjdg_CWqpq28pedg"
	//         ],
	//     ]);

	//     // Execute cURL request and close the session
	//     $json_response = curl_exec($curl);
	//     curl_close($curl);

	//     // Decode the JSON response
	//     $data["json_data"] = json_decode($json_response, true);

	//     // Initialize the result variable
	//     $result = false;

	//     // Check if the response contains the expected data
	//     if (isset($data["json_data"]['response']['body']['diamonds'])) {
	//         $diamonds = $data["json_data"]['response']['body']['diamonds'];
	//         foreach ($diamonds as $diamond) {
	//         	//echo "<pre>";print_r($diamond);die;
	//             $inputData = [
	//                 "shape" => strip_tags($diamond["shape"]),
	//                 "quality" => strip_tags($input_details["quality"]),
	//                 "color_from" => strip_tags($diamond["color"]),
	//                 "color_to" => strip_tags($diamond["color"]),
	//                 "clarity_from" => strip_tags($diamond["clarity"]),
	//                 "clarity_to" => strip_tags($diamond["clarity"]),
	//                 "size_from" => strip_tags($diamond["size"]),
	//                 "size_to" => strip_tags($diamond["size"]),
	//                 "price_from" => strip_tags($diamond["total_sales_price"]),
	//                 "price_to" => strip_tags($diamond["total_sales_price"])
	//             ];

	//             // Save the record using the model
	//             $result = $this->homeapi_model->save_record($inputData);
	//         }

	//         // Prepare the response based on the result of the save operation
	//         if ($result) {
	//             $response = ['state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Sent Request to API. Data Available.', 'data' => $result];
	//         } else {
	//             $response = ['state' => FALSE, 'title' => '', 'type' => 'error', 'message' => 'Unable to get request.'];
	//         }
	//     } else {
	//         // Handle cases where the diamonds data is not available
	//         $response = ['state' => FALSE, 'title' => '', 'type' => 'error', 'message' => 'No diamonds data available.'];
	//     }

	//     // Output the response as JSON
	//     echo json_encode($response);
	// }

	public function setHomeApiResponse() {
	    // Check if the data in the database is older than 24 hours
	    $last_update = $this->homeapi_model->get_last_update_time();

	    $current_time = new DateTime();
	    $last_update_time = new DateTime($last_update);
	    $interval = $current_time->diff($last_update_time);

	    if ($interval->h < 1 && $interval->d == 0) {
	        // Data is fresh (less than 24 hours old), return it without updating
	        $existing_data = $this->homeapi_model->get_existing_data();
	        if ($existing_data) {
	            $response = ['state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Data is still fresh.', 'data' => $existing_data];
	            echo json_encode($response);
	            return;
	        }
	    }

	    // Get the input details from the POST request
	    $input_details = $this->input->post();
	    $inputData = [];

	    // Construct the API URL
	    $api_url = "https://apiservices.vdbapp.com/v2/diamonds?type=Lab_grown_Diamond";
	    
	    // Append parameters to the URL if they exist in the input details
	    $params = [
	        'shape' => 'shape',
	        'size_from' => 'size_from',
	        'size_to' => 'size_to',
	        'quality' => 'quality',
	        'color_from' => 'color_from',
	        'color_to' => 'color_to',
	        'clarity_from' => 'clarity_from',
	        'clarity_to' => 'clarity_to'
	    ];

	    foreach ($params as $key => $value) {
	        if (!empty($input_details[$key])) {
	            $api_url .= '&' . $value . '=' . urlencode($input_details[$key]);
	        }
	    }

	    // Initialize cURL
	    $curl = curl_init();
	    curl_setopt_array($curl, [
	        CURLOPT_URL => $api_url,
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_ENCODING => "",
	        CURLOPT_MAXREDIRS => 10,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "GET",
	        CURLOPT_HTTPHEADER => [
	            "Authorization: Token token=Wggu24q8pZWmPFmHpjXy6xPLBP_iZQXjD5h0lozgctI, api_key=_ueOHfktjdg_CWqpq28pedg"
	        ],
	    ]);

	    // Execute cURL request and close the session
	    $json_response = curl_exec($curl);
	    curl_close($curl);

	    // Decode the JSON response
	    $data["json_data"] = json_decode($json_response, true);

	    // Initialize the result variable
	    $result = false;

	    // Check if the response contains the expected data
	    if (isset($data["json_data"]['response']['body']['diamonds'])) {
	        // Clear old records (optional depending on your use case)
	        $this->homeapi_model->clear_old_records();

	        $diamonds = $data["json_data"]['response']['body']['diamonds'];
	        foreach ($diamonds as $diamond) {
	            $inputData = [
	                "shape" => strip_tags($diamond["shape"]),
	                "quality" => strip_tags($input_details["quality"]),
	                "color_from" => strip_tags($diamond["color"]),
	                "color_to" => strip_tags($diamond["color"]),
	                "clarity_from" => strip_tags($diamond["clarity"]),
	                "clarity_to" => strip_tags($diamond["clarity"]),
	                "size_from" => strip_tags($diamond["size"]),
	                "size_to" => strip_tags($diamond["size"]),
	                "price_from" => strip_tags($diamond["total_sales_price"]),
	                "price_to" => strip_tags($diamond["total_sales_price"]),
	                "last_updated" => date('Y-m-d H:i:s') // Save current timestamp
	            ];

	            // Save the record using the model
	            $result = $this->homeapi_model->save_record($inputData);
	        }

	        // Prepare the response based on the result of the save operation
	        if ($result) {
	            $response = ['state' => TRUE, 'title' => '', 'type' => 'success', 'message' => 'Data updated and available.', 'data' => $result];
	        } else {
	            $response = ['state' => FALSE, 'title' => '', 'type' => 'error', 'message' => 'Unable to update data.'];
	        }
	    } else {
	        // Handle cases where the diamonds data is not available
	        $response = ['state' => FALSE, 'title' => '', 'type' => 'error', 'message' => 'No diamonds data available.'];
	    }

	    // Output the response as JSON
	    echo json_encode($response);
	}

    public function get_home_api(){ 
		$response 	= array();
		$getData 	= $this->input->get();
     	$result 	= $this->homeapi_model->get_existing_data();
		if($result){
		    $response = array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'B2A available.','data'=>$result);
		}
		else{
		    $response = array('state'=>FALSE,'title'=>'','type'=>'danger','message'=>'Unable to get b2a.');
		}
     	echo json_encode($response);
	}

	public function set_home_api_display(){ 
		$input_details = $this->input->post();
		if(isset($input_details['home_api_id']) && !empty($input_details['home_api_id'])){
			$where = array('home_api_id' => $input_details['home_api_id']);
			$input_detail = array('display' => $input_details['display']);
            $result = $this->homeapi_model->update_record($input_detail,$where);
			if ($result){
				$response 	= array('state' => TRUE, 'title' => '','type' => 'success', 'message' => 'Updated Successfully!');
			}else{
				$response 	= array('state' => FALSE,'title'=>'','type' => 'error', 'message'=>'Unable to Update');
			}
			echo json_encode($response);
		}
	}

	public function delete_home_api(){
		$postData 	= $this->input->post();
		$response 	= array();
		$whereArr 	= $postData['home_api_id'];
		$result 	= $this->homeapi_model->delete($whereArr);
		if ($result){
			$response 	= array('state' => TRUE, 'title' => '','type'	=> 'success', 'message' => 'Deleted Successfully!');
		}else{
			$response 	= array('state' => FALSE,'title'=>'','type' => 'danger', 'message'=>'Unable to delete');
		}
		echo json_encode($response);
	}

}
?>
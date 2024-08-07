<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/dompdf/autoload.inc.php'; 
use Dompdf\Dompdf;
use Dompdf\Options;
class Order extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Order_model','order_model');
    }

	function get_orders(){
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->order_model->get_orders();
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}

	function get_ordered_products(){
		$order_id = $this->input->get('order_id');
		$inputData 		= array();
		$response 		= null;
		$result  	    = $this->order_model->get_ordered_products($order_id);
		if($result){
		    $response 	= array('state'=>TRUE,'title'=>'','type'=>'success','message'=>'product available.','data'=>$result);
		}
		else{
		    $response 	= array('state'=>FALSE,'title'=>'','type'=>'error','message'=>'Unable to get product.');
		}
     	echo json_encode($response);
	}

	public function get_order_invoice_view(){
		$admin_session 	= $this->session->userdata('admin');
		if($admin_session['isLoggedIn'] && $this->input->is_ajax_request()){
			$inputData = $this->input->get();
			$data      = array();
			if(isset($inputData['order_id']) && !empty($inputData['order_id'])){
				$data['order']  	= $this->order_model->get_orders($inputData['order_id']);
				$data['products']  	= $this->order_model->get_ordered_products($inputData['order_id']);
			}
			$view 		= $this->load->view('admin/invoice', $data, true);
			$response 	= array('state'=>TRUE,'title'=>'','type'=>'success', 'message'=>'', 'data'=>$view);
	        echo json_encode($response);
		}else{
			redirect('sign-in','refresh');
		}
	}

	public function generate_order_pdf(){
		$order_id   = $this->uri->segment(2);
		$data['order']  	= $this->order_model->get_orders($order_id);
		$data['products']  	= $this->order_model->get_ordered_products($order_id);
		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$dompdf = new Dompdf($options);
		$content = $this->load->view('admin/invoice-pdf', $data, true);
		$dompdf->loadHtml($content); 
		$dompdf->setPaper('A4'); 
		$dompdf->render(); 
		$pdf =  $dompdf->stream("Invoice-".$data['order']['order_unique_id'], array("Attachment" => 0));
		if($pdf){
			$response 	= array('state'=>TRUE,'title'=>'Pdf Downloaded','type'=>'success', 'message'=>'');
	    	echo json_encode($response);
		}
	} 
	
	public function get_cust_order_history(){
	    $user_session	= $this->session->userdata('user');
		if(isset($user_session) && !empty($user_session)) {
			if($user_session['isLoggedIn']){
				$user_id 	= $user_session['user_id'];
				$data = array();
				if(isset($user_id) && !empty($user_id)){
					$data['products'] 		= $this->order_model->get_cust_history($user_id);
				}
				$data['view'] 		= 'cust-orders';
				$this->template->load_site($data);
			} else {
				redirect(base_url().'login');
			}
		} else {
				redirect(base_url().'login');
		}
	}
}
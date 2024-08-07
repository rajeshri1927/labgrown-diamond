<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	
	function __construct() {
		$this->_CI = &get_instance();
	}

	public function load_site($data='') {
		$this->_CI->load->view("homepage",$data);
	}

	// public function load_demo_site($data='') {
	// 	$this->_CI->load->view("homepage",$data);
	// }

	public function load_admin($data='') {
		$this->_CI->load->view("admin/dashboard",$data);
	}
}
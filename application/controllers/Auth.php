<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/* public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct() */

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['subtitle'] = "Dashboard";

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
		// $this->template->load('dashboard','template');
	}

}

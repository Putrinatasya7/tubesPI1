<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();
		$this->data = array(
			'title' => "Dashboard",
			'subtitle' => "Dashboard",
			'totalSupplier' => count($this->data_model->getSupplier()),
			'totalItem' => count($this->data_model->getBarang())
		);
		
	}		//END __construct()
	
	public function index()
	{
		roleManager();
		roleStaff();
		$data = $this->data;
		$this->load->model('Admin_model');
		$data['totalUser'] = count($this->Admin_model->getUser());
		$data['requestIn'] = $this->data_model->getRequestInCurrMonth()->num_rows();
		$data['requestOut'] = $this->data_model->getRequestOutCurrMonth()->num_rows();
		
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
		// $this->template->load('dashboard','template');
	}
	
	public function staff()
	{
		roleAdmin();
		roleManager();
		$data = $this->data;
		
		$this->load->view('templates/header', $data);
		$this->load->view('staff');
		$this->load->view('templates/footer');
	}
	
	public function manager()
	{
		roleStaff();
		roleAdmin();
		$data = $this->data;
		$data['requestIn'] = $this->data_model->getRequestInCurrMonth()->num_rows();
		$data['requestOut'] = $this->data_model->getRequestOutCurrMonth()->num_rows();
		
		$this->load->view('templates/header', $data);
		$this->load->view('manager');
		$this->load->view('templates/footer');
	}

}

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
			'totalItem' => count($this->data_model->getBarang()),
		);
		
	}		//END __construct()
	
	public function index()
	{
		roleManager();
		roleStaff();
		$data = $this->data;
		$this->load->model('Admin_model');
		$data['totalUser'] = count($this->Admin_model->getUser());
		$data['requestIn'] = $this->data_model->getRequestInCurrMonth(1)->num_rows();
		$data['requestOut'] = $this->data_model->getRequestOutCurrMonth(1)->num_rows();
		$data['minimum_stock'] = $this->data_model->getMinimumStock()->result_array();
		
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
		$data['requestIn'] = $this->data_model->getRequestInCurrMonth(0,1)->num_rows();
		$data['requestOut'] = $this->data_model->getRequestOutCurrMonth(0,1)->num_rows();
		$data['todayRequestIn'] = $this->data_model->getTodayRequestIn(0,1)->result_array();
		$data['todayRequestOut'] = $this->data_model->getTodayRequestOut(0,1)->result_array();
		$data['minimum_stock'] = $this->data_model->getMinimumStock()->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('staff');
		$this->load->view('templates/footer');
	}
	
	public function manager()
	{
		roleStaff();
		roleAdmin();
		$data = $this->data;
		$data['requestIn'] = $this->data_model->getRequestInCurrMonth(1)->num_rows();
		$data['requestOut'] = $this->data_model->getRequestOutCurrMonth(1)->num_rows();
		$data['todayRequestIn'] = $this->data_model->getTodayRequestIn(1)->result_array();
		$data['todayRequestOut'] = $this->data_model->getTodayRequestOut(1)->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('manager');
		$this->load->view('templates/footer');
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();
	}		//END __construct()

	public function index()
	{
		$data['title'] = "Invoice";
		$data['subtitle'] = "Invoice";
		$data['invoice'] = $this->data_model->getInvoice()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('invoice');
		$this->load->view('templates/footer');
	}

	public function detailInv($invoice_no)
	{
		$data['title'] = "Invoice";
		$data['subtitle'] = "Invoice";
		$data['invoice'] = $this->data_model->getParticularInvoice($invoice_no);

		$this->load->view('templates/header', $data);
		$this->load->view('detailInv');
		$this->load->view('templates/footer');
	}

	public function print()
	{

		$this->load->view('print_invoice');
	}
}

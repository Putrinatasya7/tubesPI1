<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

/* 	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct() */

	public function index()
	{
		$data['title'] = "Barang";
		$data['subtitle'] = "Manage Barang";
		$data['category'] = $this->data_model->getCategory();
		$data['merk'] = $this->data_model->getMerk();

		$this->load->view('templates/header', $data);
		$this->load->view('add_barang');
		$this->load->view('templates/footer');
	}

	public function addBarang() {
		$this->model_data->insertBarang();
		$this->session->set_flashdata('message','Item added successfully');
		redirect('Barang');
	}

}
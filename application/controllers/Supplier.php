<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct()

	public function index()
	{
		$data['title'] = "Supplier";
		$data['subtitle'] = "Manage Supplier";
		$data['supplier'] = $this->data_model->getSupplier();

		$this->load->view('templates/header', $data);
		$this->load->view('supplier');
		$this->load->view('templates/footer');
	}

	public function addSupplier()
	{
		$this->data_model->insertSupplier();
		$this->session->set_flashdata('message', 'Supplier berhasil ditambahkan!');
		redirect('Supplier');
	}

	public function editSupplier()
	{
		$supplier_id = $this->input->post('supplier_id');
		$this->data_model->updateSupplier($supplier_id);
		$this->session->set_flashdata('message', 'Data supplier berhasil diperbarui');
		redirect('Supplier');
	}

	public function remove()
	{
		$this->data_model->deleteSupplier();
		$this->session->set_flashdata('message', 'Data supplier berhasil dihapus');
		redirect('Supplier');
	}
}

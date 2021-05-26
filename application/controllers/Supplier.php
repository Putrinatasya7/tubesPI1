<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['supplier'] = $this->data_model->getSupplier();

		$this->load->view('templates/header');
		$this->load->view('supplier', $data);
		$this->load->view('templates/footer');
	}

	public function addSupplier()
	{
		$this->data_model->insertSupplier();
		$this->session->set_flashdata('message', 'Supplier berhasil ditambahkan!');
		redirect('Supplier');
	}
	
	public function editSupplier() {
		$supplier_id = $this->input->post('supplier_id');
		$this->data_model->updateSupplier($supplier_id);
		$this->session->set_flashdata('message', 'Data supplier berhasil diperbarui');
		redirect('Supplier');
		
	}
	
	public function remove() {
		$this->data_model->deleteSupplier();
		$this->session->set_flashdata('message', 'Data supplier berhasil dihapus');
		redirect('Supplier');
	}

}

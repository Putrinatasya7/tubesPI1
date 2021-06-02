<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct()

	public function index()
	{
		$data['title'] = "Barang";
		$data['subtitle'] = "Manage Barang";
		$data['barang'] = $this->data_model->getBarang();
		$data['category'] = $this->data_model->getCategory();
		$data['merk'] = $this->data_model->getMerk();

		$this->load->view('templates/header', $data);
		$this->load->view('add_barang');
		$this->load->view('templates/footer');
	}

	public function addBarang() {
		//UPLOAD GAMBAR
		$config['upload_path']          = './asset/pict/barang/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 5120;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('picture')) {
			$this->session->set_flashdata('message','Oops! Wrong picture format');
			redirect('Barang');
		}
		else {
			$filename = $this->upload->data('file_name');
			// $filename = $data['file_name'];
			
			$this->data_model->insertBarang($filename);
			$this->session->set_flashdata('message','Item added successfully');
			redirect('Barang');
		}
	}

}		//END class Barang
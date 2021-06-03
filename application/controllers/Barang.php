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
			$this->session->set_flashdata('message_wrong','Wrong picture format or size. Maximum size is 5MB');
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

	public function editBarang() {
		$upload_image = $_FILES['edit_picture']['name'];
		$new_pict = '';

		if($upload_image) {
			$config['upload_path']          = './asset/pict/user/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 5120;

			$this->load->library('upload',$config);

			if($this->upload->do_upload('edit_picture')) {
				//mengambil nama file yang baru
				$new_pict = $this->upload->data('file_name');
			}
			else {
				$this->session->set_flashdata('message_wrong',"There's something wrong with your picture file. Maximum size is 5MB and accepted format are jpg, png or jpeg");
				redirect('Barang');
			}
		}
			
		$this->data_model->updateBarang($new_pict);
		$this->session->set_flashdata('message','Item has been successfully updated');
		redirect('Barang');

	}

	public function removeBarang() {
		$this->data_model->deleteBarang();
		$this->session->set_flashdata('message','Item has been successfully removed');
		redirect('Barang');
	}

}		//END class Barang
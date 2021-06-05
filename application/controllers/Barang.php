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
		$barang_id = $this->input->post('barang_id');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './asset/'; //string, the default is application/cache/
		$config['errorlog']     = './asset/'; //string, the default is application/logs/
		$config['imagedir']     = './asset/pict/qrcode/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224,255,255); // array, default is array(255,255,255)
		$config['white']        = array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$barang_id.'.png'; //buat name dari qr code sesuai dengan barang_id

		$params['data'] = 'http://localhost/tubesPI1/Qrcode/detailBarang/'.$barang_id; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		if(!$this->upload->do_upload('picture')) {
			$this->session->set_flashdata('message_wrong','Wrong picture format or size. Maximum size is 5MB');
			redirect('Barang');
		}
		else {
			$filename = $this->upload->data('file_name');
			// $filename = $data['file_name'];
			
			$this->data_model->insertBarang($filename, $image_name);
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
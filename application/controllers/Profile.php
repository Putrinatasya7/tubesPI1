<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct()

	public function index()
	{
		$data['title'] = "Profile";
		$data['subtitle'] = "Profile";
		$data['user'] = $this->data_model->getUserWhere($this->session->userdata('uid'));

		
		if($this->input->post('new_password')) {
			$input_curr_pass = $this->input->post('curr_pass');
			$current_pass = $this->data_model->getPass();

			if(!password_verify($input_curr_pass,$current_pass)) {
				$this->session->set_flashdata('message_wrong', 'Your current password is wrong!');
				redirect('Profile');
			}
			else if($this->input->post('new_password') == $input_curr_pass) {
				$this->session->set_flashdata('message_wrong', 'New password can not be the same as current password!');
				redirect('Profile');
			}
			else {
				$this->data_model->updatePassword();
				$this->session->set_flashdata('message', 'Your password has been changed successfully!');
				redirect('Profile');
			}
		}

		elseif($this->input->post('editProfile')) {
			$upload_image = $_FILES['picture']['name'];
			$new_pict = '';
			
			if($upload_image) {
				$config['upload_path']          = './asset/pict/user/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 5120;

				$this->load->library('upload',$config);

				if($this->upload->do_upload('picture')) {
					//untuk menghapus gambar lama ketika user mengganti gambarnya
					$old_pict = $data['user']['pict'];
					if($old_pict != 'defaultusrpict.jpg') {
						unlink(FCPATH . 'asset/pict/user/' . $old_pict);
					}

					//mengambil nama file yang baru
					$new_pict = $this->upload->data('file_name');
				}
				else {
					$this->session->set_flashdata('message_wrong',"There's something wrong with your picture file!");
					redirect('Profile');
				}
			}
			$this->data_model->updateProfile($new_pict);
			$this->session->set_flashdata('message','Your profile has been changed successfully');
			redirect('Profile');
		}

		else {
			$this->load->view('templates/header', $data);
			$this->load->view('profile');
			$this->load->view('templates/footer');
		}
	}

}

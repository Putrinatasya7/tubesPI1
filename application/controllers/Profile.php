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
				$this->session->set_flashdata('message', 'Your current password is wrong!');
				redirect('Profile');
			}
			else if($this->input->post('new_password') == $input_curr_pass) {
				$this->session->set_flashdata('message', 'Sorry, new password can not be the same as current password!');
				redirect('Profile');
			}
			else {
				$this->data_model->updatePassword();
				$this->session->set_flashdata('message', 'Your password has been changed successfully!');
				redirect('Profile');
			}
		}
		else {
			$this->load->view('templates/header', $data);
			$this->load->view('profile');
			$this->load->view('templates/footer');
		}
	}

}

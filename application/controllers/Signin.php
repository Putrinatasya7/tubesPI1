<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{
	
	public function index()
	{
		// cek apakah user sudah login atau belum
		// if ($this->session->userdata('uname')) {
			// redirect('Auth');
		// } else {

			// RULES
			$this->form_validation->set_rules(
				'uname',
				'Username',
				'required|trim|min_length[4]',
				['min_length' => 'Username minimal terdiri dari 4 karakter, cek kembali username anda']
			);

			$this->form_validation->set_rules(
				'password',
				'Password',
				'required|trim|min_length[8]',
				['min_length' => 'Password minimal terdiri dari 8 karakter, cek kembali password anda']
			);

			// CHECK INPUT
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('sign_in');
			}

			// jika form yang diisi sudah sesuai rules
			else {
				// get input
				
				$uname = htmlspecialchars($this->input->post('uname'));
				$password = htmlspecialchars($this->input->post('password'));

				$user = $this->db->get_where('user', ['uname' => $uname])->row_array();			//retrieve user data from db

				//check username
				if ($user) {
					//check password
					if ($user['password'] == $password) {
					// if (password_verify($password, $user['password'])) {
						$data = [
							'uid' => $user['uid'],
							'uname' => $user['uname'],
							'role_id' => $user['role_id']
						];

						$this->session->set_userdata($data);
						redirect('auth');
					}

					//jika password salah
					else {
						$this->session->set_flashdata('message_wrong', 'Password tidak sesuai');
						redirect('Signin');
					}
				}

				//jika username tidak terdaftar atau user tidak ada dalam db
				else {
					$this->session->set_flashdata('message_wrong', 'Username yang anda masukkan belum terdaftar');
					redirect('Signin');
				}
			}
		// }
	}			//end index()

	public function logout()
	{

		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('role_id');

		$this->session->sess_destroy();

		$this->session->set_flashdata('message_success', 'Berhasil Logout');
		redirect('Signin');
	}		//end logout()

}		//END CLASS

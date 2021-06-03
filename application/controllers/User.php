<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();

		is_logged_in();
		roleManager();
		roleStaff();

		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['title'] = "User";
		$data['subtitle'] = "Manage User";
		$data['role'] = $this->Admin_model->getRole();
		$data['users'] = $this->Admin_model->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('user');
		$this->load->view('templates/footer');
	}

	public function addUser()
	{
		$this->Admin_model->insertUser();
		$this->session->set_flashdata('message', 'User added successfully!');
		redirect('User');
	}

	public function editUser() {
		$this->Admin_model->updateUser();
		$this->session->set_flashdata('message','User data has been successfully updated!');
		redirect('User');
	}
	
	public function editPassword() {
		$this->Admin_model->updatePassword();
		$this->session->set_flashdata('message','User password has been succesfully updated!');
		redirect('User');
	}
	
	public function removeUser() {
		$this->Admin_model->deleteUser();
		$this->session->set_flashdata('message','User deleted successfully!');
		redirect('User');
	}
}

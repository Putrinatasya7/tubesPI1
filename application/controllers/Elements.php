<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elements extends CI_Controller {

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

	public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();
		roleManager();

	}		//END __construct()

	public function index()
	{
		$data['title'] = "Elements";
		$data['subtitle'] = "Manage Elements";
		$data['category'] = $this->data_model->getCategory();
		$data['brand'] = $this->data_model->getMerk();

		$this->load->view('templates/header', $data);
		$this->load->view('elements');
		$this->load->view('templates/footer');
	}

    // public function addValue()
	// {
	// 	$data['title'] = "Elements";
	// 	$data['subtitle'] = "Manage Elements";

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('addValue');
	// 	$this->load->view('templates/footer');
	// }

	public function addCategory() {
		$this->data_model->insertCategory();
		$this->session->set_flashdata('message_category','Category added succesfully!');
		redirect('Elements');
	}
	
	public function editCategory() {
		$this->data_model->updateCategory();
		$this->session->set_flashdata('message_category','Category has been successfully updated!');
		redirect('Elements');
		
	}
	
	public function removeCategory() {
		$this->data_model->deleteCategory();
		$this->session->set_flashdata('message_category','Category has been successfully removed!');
		redirect('Elements');
		
	}
	
	public function addBrand() {
		$this->data_model->insertMerk();
		$this->session->set_flashdata('message_brand','Brand added succesfully!');
		redirect('Elements');
	}
	
	public function editBrand() {
		$this->data_model->updateMerk();
		$this->session->set_flashdata('message_brand','Brand has been successfully updated!');
		redirect('Elements');
	}

	public function removeBrand() {
		$this->data_model->deleteMerk();
		$this->session->set_flashdata('message_brand','Brand has been successfully removed!');
		redirect('Elements');
	}
}
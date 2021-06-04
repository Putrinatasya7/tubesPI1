<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

  public function __construct() {
		parent::__construct();
		
		//fungsi pengecekan login dan akses menu pada helper
		is_logged_in();

	}		//END __construct()

  // FUNGSI UNTUK MENAMPILKAN SEMUA REQUEST BRG MASUK
  public function addIn() {
    $data['title'] = "Request";
    $data['subtitle'] = "Request Barang Masuk";
    $data['request_in'] = $this->data_model->getRequestIn()->result_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('requestIn');
    $this->load->view('templates/footer');
  }
  
  // FUNGSI UNTUK MENAMPILKAN SEMUA REQUEST BRG KELUAR
  public function addOut() {
    $data['title'] = "Request";
    $data['subtitle'] = "Request Barang Keluar";
    $data['request_out'] = $this->data_model->getRequestOut()->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('requestOut');
    $this->load->view('templates/footer');
  }

  // FUNGSI UNTUK MEMBUAT REQUEST BRG MASUK
  public function addReqIn() {
    $data['title'] = "Request";
    $data['subtitle'] = "Create Request Barang Masuk";
    $data['barang'] = $this->data_model->getBarang();
    $data['supplier'] = $this->data_model->getSupplier();

    $this->load->view('templates/header', $data);
    $this->load->view('addRequestIn');
    $this->load->view('templates/footer');
  }

  // FUNGSI UNTUK MEMPROSES DATA REQUEST BARANG MASUK YANG DISUBMIT
  public function submitRequestIn() {
    $this->data_model->insertRequestIn()    ;
    $this->session->set_flashdata('message','Your request has been submitted successfully');
    redirect('Request/addIn');
  }
  
  // FUNGSI UNTUK MEMBUAT REQUEST BRG KELUAR
  public function addReqOut() {
    $data['title'] = "Request";
    $data['subtitle'] = "Create Request Barang Keluar";
    $data['barang'] = $this->data_model->getBarang();
    
    $this->load->view('templates/header', $data);
    $this->load->view('addRequestOut');
    $this->load->view('templates/footer');
  }

  // FUNGSI UNTUK MEMPROSES DATA REQUEST BARANG KELUAR YANG DISUBMIT
  public function submitRequestOut() {
    $this->data_model->insertRequestOut()    ;
    $this->session->set_flashdata('message','Your request has been submitted successfully');
    redirect('Request/addOut');
  }
  
  public function detailsIn($request_no) {
    $data['title'] = "Request";
    $data['subtitle'] = "Detail Request Barang Masuk";
    $data['request_in'] = $this->data_model->getRequestInWhere($request_no)->result_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('detailsIn');
    $this->load->view('templates/footer');
  }
  
  public function detailsOut($request_no) {
    $data['title'] = "Request";
    $data['subtitle'] = "Detail Request Barang Keluar";
    $data['request_out'] = $this->data_model->getRequestOutWhere($request_no)->result_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('detailsOut');
    $this->load->view('templates/footer');
  }
  
  public function removeRequestOut() {
    $this->data_model->deleteRequestOut();
    $this->session->set_flashdata('message','Your request has been successfully removed');
    redirect('Request/addOut');
  }

  public function removeRequestIn() {
    $this->data_model->deleteRequestIn();
    $this->session->set_flashdata('message','Your request has been successfully removed');
    redirect('Request/addIn');
  }
}


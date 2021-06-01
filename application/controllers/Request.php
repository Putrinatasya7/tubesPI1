<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

  public function addIn() {
    $data['title'] = "Request";
    $data['subtitle'] = "Request Barang Masuk";

    $this->load->view('templates/header', $data);
    $this->load->view('requestIn');
    $this->load->view('templates/footer');
  }

  public function addOut() {
    $data['title'] = "Request";
    $data['subtitle'] = "Request Barang Keluar";

    $this->load->view('templates/header', $data);
    $this->load->view('requestOut');
    $this->load->view('templates/footer');
  }
  public function addReqIn() {
    $data['title'] = "Request";
    $data['subtitle'] = "Create Request Barang Masuk";

    $this->load->view('templates/header', $data);
    $this->load->view('addRequestIn');
    $this->load->view('templates/footer');
  }
  public function addReqOut() {
    $data['title'] = "Request";
    $data['subtitle'] = "Create Request Barang Keluar";

    $this->load->view('templates/header', $data);
    $this->load->view('addRequestOut');
    $this->load->view('templates/footer');
  }
}


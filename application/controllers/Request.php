<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

  public function addIn() {
    $this->load->view('templates/header');
    $this->load->view('addRequestIn');
    $this->load->view('templates/footer');
  }

  public function addOut() {
    $this->load->view('templates/header');
    $this->load->view('addRequestOut');
    $this->load->view('templates/footer');
  }
  
}

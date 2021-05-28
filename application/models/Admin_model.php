<?php 
defined('BASEPATH') OR exit ('No direct script allowed');

class Admin_model extends CI_Model {
  
  public function getUser() {
    return $this->db->get('user')->result_array();
  }

  public function getRole() {
    return $this->db->get('role')->result_array();
  }

}
?>
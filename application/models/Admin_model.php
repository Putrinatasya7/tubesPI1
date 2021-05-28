<?php 
defined('BASEPATH') OR exit ('No direct script allowed');

class Admin_model extends CI_Model {
  
  public function getUser() {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('role', 'role.role_id = user.role_id');
    return $this->db->get()->result_array();
  }

  public function getRole() {
    return $this->db->get('role')->result_array();
  }

}
?>
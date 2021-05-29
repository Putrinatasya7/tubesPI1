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

  public function insertUser() {
    
    $data = [
      'uid' => generateuid($this->input->post('role')),
      'name' => htmlspecialchars($this->input->post('name')),
      'uname' => htmlspecialchars($this->input->post('uname')),
      'email' => htmlspecialchars($this->input->post('email')),
      'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
      'pict' => "defaultusrpict.jpg",
      'role_id' => $this->input->post('role')
    ];

    $this->db->insert('user', $data);
  }

  public function updateUser() {
    $uid = $this->input->post('uid');
    $data = [
      'name' => htmlspecialchars($this->input->post('name')),
      'uname' => htmlspecialchars($this->input->post('uname')),
			'email' => htmlspecialchars($this->input->post('email')),
			'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'role_id' => htmlspecialchars($this->input->post('role_id'))
    ];

    $this->db->where('uid', $uid);
    $this->db->update('user', $data);
  }

  public function deleteUser() {
    $uid = $this->input->post('uid');

    $this->db->where('uid', $uid);
    $this->db->delete('user');
  }

}
?>
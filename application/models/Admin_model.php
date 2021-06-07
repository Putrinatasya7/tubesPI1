<?php 
defined('BASEPATH') OR exit ('No direct script allowed');

class Admin_model extends CI_Model {
  
  public function getUser() {
    return $this->db->get('user_detail')->result_array();
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
			'role_id' => htmlspecialchars($this->input->post('role_id'))
    ];
    
    $this->db->where('uid', $uid);
    $this->db->update('user', $data);
  }
  
  public function updatePassword() {
    $uid = $this->input->post('uid');
    $new_password = password_hash(htmlspecialchars($this->input->post('new_password')), PASSWORD_DEFAULT);
    
    $this->db->set('password', $new_password)->where('uid', $uid)->update('user');
  }

  public function deleteUser() {
    $uid = $this->input->post('uid');

    $this->db->where('uid', $uid);
    // $this->db->delete('user');
    $this->db->set('is_active','Inactive');
    $this->db->update('user');
  }

}

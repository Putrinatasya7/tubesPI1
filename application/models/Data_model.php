<?php 
defined('BASEPATH') OR exit ('No direct script allowed');

class Data_model extends CI_Model {
  
  public function insertSupplier() {
    $data = [
			'supplier' => htmlspecialchars($this->input->post('name')),
			'contact' => htmlspecialchars($this->input->post('email')),
			'status' => htmlspecialchars($this->input->post('active'))
		];

    $this->db->insert('supplier', $data);
  }   //END insertSupplier

  public function getSupplier() {
    return $this->db->get('supplier')->result_array();
  }

  public function updateSupplier($supplier_id) {
    $data = [
      'supplier' => htmlspecialchars($this->input->post('supplier')),
			'contact' => htmlspecialchars($this->input->post('contact')),
			'status' => htmlspecialchars($this->input->post('status'))
    ];

    $this->db->where('supplier_id', $supplier_id);
    $this->db->update('supplier', $data);
  }

  public function deleteSupplier() {
    $supplier_id = $this->input->post('supplier_id');

    $this->db->where('supplier_id', $supplier_id);
    $this->db->delete('supplier');
  }

  // USER SECTION
  public function getUser() {
    return $this->db->get('user')->result_array();
  }

  public function insertUser() {
    
    $data = [
      // 'uid' => $uid,
      'name' => htmlspecialchars($this->input->post('name')),
      'uname' => htmlspecialchars($this->input->post('uname')),
      'email' => htmlspecialchars($this->input->post('email')),
      'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
      'pict' => "defaultusrpict.jpg",
      'role_id' => $this->input->post('role')
    ];

    $this->db->insert('user', $data);
  }

}
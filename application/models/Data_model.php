<?php 
defined('BASEPATH') OR exit ('No direct script allowed');

class Data_model extends CI_Model {
  /** SUPPLIER ZONE */
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
  
  /**ELEMENTS ZONE */
  /**DATA MERK */
  public function getMerk() {
    return $this->db->get('merk')->result_array();
  }
  
  public function insertMerk() {
    $data = [
      'merk' => $this->input->post('name_brand', true),
      'status' => $this->input->post('status_brand')
    ];
    $this->db->insert('merk', $data);
  }
  
  public function updateMerk() {
    $merk_id = $this->input->post('merk_id');
    $data = [
      'merk' => $this->input->post('merk', true),
      'status' => $this->input->post('status_brand')
    ];
    
    $this->db->where('merk_id', $merk_id);
    $this->db->update('merk', $data);
  }
  
    public function deleteMerk() {
      $merk_id = $this->input->post('merk_id');
  
      $this->db->where('merk_id',$merk_id)->delete('merk');
    }
  
  /**DATA KATEGORI */
  public function getCategory() {
    return $this->db->get('category')->result_array();
  }
  
  public function insertCategory() {
    $data = [
      'category' => $this->input->post('name_category', true),
      'status' => $this->input->post('status_category')
    ];
    $this->db->insert('category', $data);
  }

  public function updateCategory() {
    $category_id = $this->input->post('category_id');
    $data = [
      'category' => $this->input->post('category', true),
      'status' => $this->input->post('status_category')
    ];
    
    $this->db->where('category_id', $category_id);
    $this->db->update('category', $data);
  }

  public function deleteCategory() {
    $category_id = $this->input->post('category_id');

    $this->db->where('category_id',$category_id)->delete('category');
  }
  
  /** ITEM/GOODS ZONE */
  public function getBarang() {
    return $this->db->get('barang_detail')->result_array();
  }

  public function insertBarang($filename) {
    $data = [
      'barang_id' => $this->input->post('barang_id'),
      'category_id' => $this->input->post('category'),
      'barang' => $this->input->post('name', true),
      'merk_id' => $this->input->post('brand'),
      'pict' => $filename,
      'stock' => $this->input->post('total'),
      'minimum_stock' => 25,
      'harga' => $this->input->post('price'),
      'created_by' => $this->session->userdata('uid'),
      'modified_by' => $this->session->userdata('uid')
    ];

    $this->db->insert('barang',$data);

  }

  /**USER PROFILE ZONE */
  public function getUserWhere($uid) {
    return $this->db->get_where('user_detail',['uid' => $uid])->row_array();
  }

  public function getPass() {
    
    return $this->db->select('password')->get('user')->row()->password;
  }

  public function updatePassword() {
    $uid = $this->session->userdata('uid');
    $new_password = password_hash($this->input->post('new_password', true), PASSWORD_DEFAULT);
    $this->db->set('password', $new_password)->where('uid',$uid)->update('user');
    // $this->db->where('uid', $uid);
    // $this->db->update('user');
  }

}     //END CLASS
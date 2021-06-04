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
  
  public function updateBarang($new_pict) {
    $barang_id = $this->input->post('barang_id');
    $data = [
      'category_id' => $this->input->post('edit_category'),
      'barang' => $this->input->post('edit_item_name'),
      'merk_id' => $this->input->post('edit_brand'),
      'stock' => $this->input->post('edit_total'),
      'harga' => $this->input->post('edit_price'),
      'modified_by' => $this->session->userdata('uid')
    ];

    if($new_pict != '') {
      $data['pict'] = $new_pict;
    }

    $this->db->where('barang_id', $barang_id)->update('barang',$data);
  }

  public function deleteBarang() {
    $barang_id = $this->input->post('barang_id');

    $this->db->where('barang_id',$barang_id)->delete('barang');
  }

  /**USER PROFILE ZONE */
  public function getUserWhere($uid) {
    return $this->db->get_where('user_detail',['uid' => $uid])->row_array();
  }

  public function updateProfile($new_pict) {
    $name = $this->input->post('name');
    $email = $this->input->post('email');

    if($new_pict != '') {
      $this->db->set('pict',$new_pict);
    }
    $this->db->set('name', $name);
    $this->db->set('email', $email);
    $this->db->where('uid',$this->session->userdata('uid'))->update('user');
  }

  public function getPass() {
    
    return $this->db->select('password')->where('uid', $this->session->userdata('uid'))->get('user')->row()->password;
  }

  public function updatePassword() {
    $uid = $this->session->userdata('uid');
    $new_password = password_hash($this->input->post('new_password', true), PASSWORD_DEFAULT);
    $this->db->set('password', $new_password)->where('uid',$uid)->update('user');
    // $this->db->where('uid', $uid);
    // $this->db->update('user');
  }

  /**REQUEST ZONE */
  public function getRequestInCurrMonth() {
    return $this->db->select('request_no')->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','In')->get('request');
  }
  
  public function getRequestOutCurrMonth() {
    return $this->db->select('request_no')->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','Out')->get('request');
  }

  public function getRequestOut() {
    return $this->db->group_by('request_no')->get('request_out_detail');
  }

  public function getRequestIn() {
    return $this->db->group_by('request_no')->get('request_in_detail');
  }


  public function getRequestOutWhere($request_no) {
    return $this->db->get_where('request_out_detail',['request_no'=>$request_no]);
  }

  public function getRequestInWhere($request_no) {
    return $this->db->get_where('request_in_detail',['request_no'=>$request_no]);
  }

  public function insertRequestIn() {
    $request_no = $this->input->post('request_no');
    $barang = $this->input->post('barang[]');
    $qty = $this->input->post('qty[]');
    $harga_satuan = $this->input->post('price[]');
    $supplier_id = $this->input->post('supplier[]');
    
    $countdata = count($barang);

    // Insert data into request table
    $data = [
      'request_no' => $request_no,
      'created_by' => $this->session->userdata('uid'),
      'req_category' => 'In'
    ];
    $this->db->insert('request',$data);
    
    // Insert data into req_item_out table (insert item-item request)
    for($i=0; $i<$countdata; $i++) {
      $this->db->insert('req_item_in',[
        'request_no' => $request_no,
        'barang_id' => $barang[$i],
        'qty' => $qty[$i],
        'harga_satuan' => $harga_satuan[$i],
        'supplier_id' => $supplier_id[$i]
      ]);
    }
  }

  /**
   * 
   * INI INSERT YANG SEKALI BANYAK
   * 
   */
  public function insertRequestOut() {
    $request_no = $this->input->post('request_no');
    $barang = $this->input->post('item[]');
    $qty = $this->input->post('qty[]');
    $reason = $this->input->post('reason');
    
    $countdata = count($barang);

    // Insert data into request table
    $data = [
      'request_no' => $request_no,
      'created_by' => $this->session->userdata('uid'),
      'req_category' => 'Out'
    ];
    $this->db->insert('request',$data);
    
    // Insert data into req_item_out table (insert item-item request)
    for($i=0; $i<$countdata; $i++) {
      $this->db->insert('req_item_out',[
        'request_no' => $request_no,
        'barang_id' => $barang[$i],
        'qty' => $qty[$i]
      ]);
    }

    // Insert data into req_out_reason table (insert alasan barang keluar)
    $this->db->insert('req_out_reason',[
      'request_no' => $request_no,
      'alasan_keluar' =>$reason
    ]);
  }

  public function deleteRequestOut() {
    $request_no = $this->input->post('request_no');
    $this->db->where('request_no',$request_no)->delete('req_out_reason');
    $this->db->where('request_no',$request_no)->delete('req_item_out');
    $this->db->where('request_no',$request_no)->delete('request');
  }

  public function deleteRequestIn() {
    $request_no = $this->input->post('request_no');
    $this->db->where('request_no',$request_no)->delete('req_item_in');
    $this->db->where('request_no',$request_no)->delete('request');
  }

}     //END CLASS
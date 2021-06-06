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

  public function insertBarang($filename, $image_name) {
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
      'modified_by' => $this->session->userdata('uid'),
      'qr_code'   => $image_name
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
    
    $data = [
      'pict' => $this->db->select('pict')->where('barang_id',$barang_id)->get('barang')->row()->pict,
      'qr_code' => $this->db->select('qr_code')->where('barang_id',$barang_id)->get('barang')->row()->qr_code
    ];

    $this->db->where('barang_id',$barang_id)->delete('barang');
    unlink(FCPATH . 'asset/pict/barang/' . $data['pict']);
    unlink(FCPATH . 'asset/pict/qrcode/' . $data['qr_code']);
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
  public function getRequestInCurrMonth($manager = 0, $staff = 0) {
    if($manager !=0) {
      return $this->db->select('request_no')->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','In')->get('request');
    }
    elseif($staff != 0) {
      return $this->db->select('request_no')->where('created_by', $this->session->userdata('uid'))->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','In')->get('request');
    }
  }
  
  public function getRequestOutCurrMonth($manager = 0, $staff = 0) {
    if($manager !=0) {
      return $this->db->select('request_no')->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','Out')->get('request');
    }
    elseif($staff != 0) {
      return $this->db->select('request_no')->where('created_by', $this->session->userdata('uid'))->where('MONTH(created_at)', date('m'))->where('YEAR(created_at)', date('Y'))->where('req_category','In')->get('request');
    }
  }
  
  public function getTodayRequestIn($manager = 0, $staff=0) {
    if($manager !=0) {
      return $this->db->where('DATE(created_at)', date("Y-m-d"))->group_by('request_no')->where('status','Waiting')->get('request_in_detail');
    }
    elseif($staff != 0) {
      return $this->db->where('created_by',$this->session->userdata('uid'))->where('DATE(responded_at)', date("Y-m-d"))->group_by('request_no')->where("(status='Accepted' OR status='Rejected')")->get('request_in_detail');
    }
  }

  public function getTodayRequestOut($manager = 0, $staff = 0) {
    if($manager != 0) {
      return $this->db->where('DATE(created_at)', date("Y-m-d"))->group_by('request_no')->where('status','Waiting')->get('request_out_detail');
    }
    elseif ($staff != 0) {
      return $this->db->where('created_by',$this->session->userdata('uid'))->where('DATE(responded_at)', date("Y-m-d"))->group_by('request_no')->where("(status='Accepted' OR status='Rejected')")->get('request_out_detail');
    }
  }

  public function getRequestOut() {
    if($this->session->userdata('role_id') == 3) {
      return $this->db->where('created_by',$this->session->userdata('uid'))->group_by('request_no')->order_by('created_at','DESC')->get('request_out_detail');
    }
    else {
      return $this->db->group_by('request_no')->order_by('created_at','DESC')->get('request_out_detail');
    }
  }

  public function getRequestIn() {
    if($this->session->userdata('role_id') == 3) {
      return $this->db->where('created_by',$this->session->userdata('uid'))->group_by('request_no')->order_by('created_at','DESC')->get('request_in_detail');
    }
    else {
      return $this->db->group_by('request_no')->order_by('created_at','DESC')->get('request_in_detail');
    }
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

  public function updateRespondRequest($image) {
    $request_no = $this->input->post('request_no');
    $responded_by = $this->session->userdata('uid');
    $status = $this->input->post('status');
    $timestamp = date('Y-m-d H:i:s');

    $data = [
      'responded_by' => $responded_by,
      'responded_at' => $timestamp,
      'status' => $status
    ];
    
    $invoicedata = [
      'request_no' => $request_no,
      'created_at' => $timestamp,
      'sign-img' => $image
    ];
    
    if(strpos($request_no, "In") != false){
      $invoicedata['invoice_no'] = generateInvoiceNo("In");
      $status = "In";
    }
    else {
      $invoicedata['invoice_no'] = generateInvoiceNo("Out");
      $status = "Out";
    }

    // GENERATE QR CODE INVOICE
    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './asset/'; //string, the default is application/cache/
		$config['errorlog']     = './asset/'; //string, the default is application/logs/
		$config['imagedir']     = './asset/pict/qrcode_invoice/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224,255,255); // array, default is array(255,255,255)
		$config['white']        = array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$invoicedata['invoice_no'].'.png'; //buat name dari qr code sesuai dengan invoice$invoicedata['invoice_no']

		$params['data'] = 'http://localhost/tubesPI1/Qrcode/detailInvoice/'.$invoicedata['invoice_no']; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $invoicedata['invoice_qrcode'] = $image_name;
    
    $this->db->where('request_no',$request_no)->update('request',$data);
    $this->db->insert('invoice',$invoicedata);
    if(strpos($request_no, "In") != false){
      $this->db->insert('invoice_in_component',['invoice_no' => $invoicedata['invoice_no']]);
    }
    elseif(strpos($request_no, "Out") != false) {
      $this->updateStock($request_no, $status);
    }
    if($data['status'] == "Rejected") {
      $this->insertRejectNote($request_no);
    }
  }

  public function updateStock($request_no, $status) {
    if($status == "In") {
      $barang = $this->db->select('barang_id,qty')->where('request_no',$request_no)->get('req_item_in')->result_array();
      foreach ($barang as $b) {
        $stock_now = $this->db->select('stock')->where('barang_id',$b['barang_id'])->get('barang')->row()->stock;
        $new_stock = $stock_now + $b['qty'];
        $this->db->set('stock',$new_stock)->where('barang_id',$b['barang_id'])->update('barang');
      }
    }
      
    elseif($status == "Out") {
      $barang = $this->db->select('barang_id,qty')->where('request_no',$request_no)->get('req_item_out')->result_array();
      foreach ($barang as $b) {
        $stock_now = $this->db->select('stock')->where('barang_id',$b['barang_id'])->get('barang')->row()->stock;
        $new_stock = $stock_now - $b['qty'];
        $new_stock;
        $this->db->set('stock',$new_stock)->where('barang_id',$b['barang_id'])->update('barang');
      }
    }
  }

  public function insertRejectNote($request_no) {
    $data = [
      'request_no' => $request_no,
      'note' => $this->input->post('note')
    ];
    $this->db->insert('reject_note',$data);
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

  /** INVOICE ZONE */
  public function getInvoice() {
    return $this->db->order_by('invoice_date','DESC')->get('invoice_request');
  }

  public function getParticularInvoice($invoice_no) {
    if(strpos($invoice_no,"Out") != false) {
      return $this->db->select('*')->from('invoice_request')->where('invoice_no',$invoice_no)->join('request_out_detail','invoice_request.request_no=request_out_detail.request_no')->get()->result_array();
    }
    else {
      return $this->db->select('*')->from('invoice_request')->where('invoice_no',$invoice_no)->join('request_in_detail','invoice_request.request_no=request_in_detail.request_no')->get()->result_array();
    }
  }

  public function updateInvoiceIn() {
    $invoice_no = $this->input->post("invoice_no");
    $request_no = $this->input->post("request_no");

    $data = [
      'received_by' => $this->session->userdata('uid'),
      'received_at' => date('Y-m-d H:i:s'),
      'status' => "received"
    ];

    $this->db->where('invoice_no',$invoice_no)->update('invoice_in_component',$data);
    $this->updateStock($request_no,"In");
  }

}     //END CLASS
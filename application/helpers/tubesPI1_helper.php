<?php 

// FUNGSI UNTUK MENGECEK APAKAH SUDAH LOGIN DAN CEK AKSES MENU
function is_logged_in() {

	//untuk mengambil semua struktur codeigniternya atau library codeigniternya
	$ci = get_instance();

	///mengecek sudah login atau belum, jika belum login maka tidak dapat mengakses halaman admin dan diredirect ke halaman login
	if(!$ci->session->userdata('uname')) {
    // $ci->session->set_flashdata('message_wrong','Sorry, you must sign in first!');
		redirect('Signin');
	}
}

function generateuid(int $role_id) {
  $ci = get_instance();

  if($role_id == 1) {
    $prefix = 'A';
  }
  else if($role_id == 2) {
    $prefix = 'M';
  }
  else if($role_id == 3) {
    $prefix = 'S';
  }
  $last_row_num = $ci->db->select('uid')->limit(1)->order_by('uid','DESC')->where('role_id',$role_id)->get('user')->row();
  $get_num = substr($last_row_num->uid,1,3);
  
  $new_num = str_repeat('0', 3 - strlen($get_num + 1)).($get_num+1);
  
  $new_uid = $prefix.$new_num;
  
  return $new_uid;
}

function generateKodeBarang() {
  $ci = get_instance();
  
  $prefix = 'B';
  $last_row_num = $ci->db->select('barang_id')->limit(1)->order_by('barang_id','DESC')->get('barang')->row();
  if($last_row_num == null) {
    $new_kodebarang = 'B001';
  }
  else {
    $get_num = substr($last_row_num->barang_id,1,3);
    $new_num = str_repeat('0', 3 - strlen($get_num + 1)).($get_num+1);
    $new_kodebarang = $prefix.$new_num;
  }

  return $new_kodebarang;
}


function roleAdmin() {
  $ci = get_instance();
  
  if($ci->session->userdata('role_id') == 1) {
    redirect('Auth');
  }

}   //end roleAdmin()

function roleManager() {
  $ci = get_instance();
  
 if($ci->session->userdata('role_id') == 2) {
    redirect('Auth/manager');
  }

}   //end roleManager()

function roleStaff() {
  $ci = get_instance();
  
  if($ci->session->userdata('role_id') == 3) {
    redirect('Auth/staff');
  }

}   //end roleStaff()

function generateRequestNo($status) {
  $ci = get_instance();

  if($status == 'In') {
    $prefix = "REQIn";
    $ignore_code = 11;
  }
  else if($status == 'Out') {
    $prefix = "REQOut";
    $ignore_code = 12;
  }
  $last_row_no = $ci->db->select('request_no')->where('req_category',$status)->limit(1)->order_by('request_no','DESC')->get('request')->row();
  
  if($last_row_no == null) {
    $new_no = '01';
  }
  else {
    $get_no = substr($last_row_no->request_no,$ignore_code,2);
    $new_no = str_repeat('0', 2 - strlen($get_no + 1)).($get_no+1);
  }
  $date = date("ymd");  
  $request_no = $prefix.$date.$new_no;

  return $request_no;
}
<?php 

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

?>
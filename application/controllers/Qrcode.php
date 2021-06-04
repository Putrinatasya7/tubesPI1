<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {

	public function detailBarang($barang_id)
    {
        $data['barang'] = $this->db->get_where('barang_detail', ['barang_id' => $barang_id])->row_array();
		$this->load->view('detailBarang', $data);
	}

}

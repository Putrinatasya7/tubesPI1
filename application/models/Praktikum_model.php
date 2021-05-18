<?php
/**
 * 
 */
class Praktikum_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function get()
	{
		$query = $this->db->get('lab');
		return $query->result_array();
	}


	public function insert($data)
	{
		return $this->db->insert('lab', $data);
	}

	public function delete($param)
	{
		return $this->db->delete('lab',array('id'=>$param));
	}
	
	public function update()
	{
		$a  =  $this->input->post('judul');
		$b  =  $this->input->post('deskripsi');
		$d  =  $this->input->post('id');
		
		$object = array(
				'judul' => $a,
				'deskripsi'=> $b
				
			);
		$this->db->where('id', $d);

		return $this->db->update('lab', $object);
	}
}


?>
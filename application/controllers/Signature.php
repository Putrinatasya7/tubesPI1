<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signature extends CI_Controller {


	public function index()
	{
		$this->load->view('signature/header');
		$this->load->view('signature/single');
	}
	Public function insert_single_signature()
	{

	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = './asset/' . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	$image=str_replace('./','',$file);

    $this->Signature_model->insert_single_signature($image);
	 echo '<img src="'.base_url().$image.'">';

     
	}
	public function multiple()
	{	
			$this->load->view('signature/header');
		    $this->load->view('signature/multiple_sign');
	}

	Public function get_multiple()
	{
	$img = $this->input->post('image');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$image=uniqid() . '.png';
	$file = './asset/' .$image;
	$success = file_put_contents($file, $data);
		

	$this->Signature_model->insert_signature($image);
	 echo '<img src="'.base_url().'asset/'.$image.'">';

	}
}

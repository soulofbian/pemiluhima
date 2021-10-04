<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	
	public function index()
	{
		$this->load->model('mod_kandidat');
		$this->load->model('mod_count');
		$data['kandidat'] = $this->mod_kandidat->list();
		$data['hitung']=$this->mod_count->hitung();
		$this->load->view('front',$data);
	}
}

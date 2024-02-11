<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function index()
	{
		$data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Dashboard';
		$this->load->view('v_utama',$data);
	}

	public function agen()
	{
		$data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Dashboard';
		$this->load->view('v_utama_agen',$data);
	}
}

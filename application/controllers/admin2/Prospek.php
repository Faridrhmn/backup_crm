<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospek extends CI_Controller {

	public function index()
	{
		$data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Prospek';
		$this->load->view('pages/v_prospek2', $data);
	}
	
}

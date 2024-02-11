<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Agen';
		$this->load->view('pages/v_agen2', $data);
	}
}

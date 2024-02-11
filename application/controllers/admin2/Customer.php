<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Customer';
		$this->load->view('pages/v_customer2', $data);
	}
}

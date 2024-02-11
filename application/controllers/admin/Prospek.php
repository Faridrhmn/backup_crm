<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospek extends CI_Controller {

	public function index()
	{
        $data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Prospek';

		$this->load->view('layouts/v_header', $data);
		$this->load->view('layouts/v_sidebar', $data);
		$this->load->view('pages/v_prospek');
		$this->load->view('layouts/v_footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

	public function index()
	{
        $data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Agen';

		$this->load->view('layouts/v_header', $data);
		$this->load->view('layouts/v_sidebar', $data);
		$this->load->view('pages/v_agen');
		$this->load->view('layouts/v_footer');

        // $current_uri = $this->uri->uri_string();
	}
}

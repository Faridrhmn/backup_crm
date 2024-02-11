<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
        // $data['current_uri'] = $this->uri->uri_string();$data['title'] = 'Agen';
        // $data['title'] = 'Customer';

		// $this->load->view('layouts/v_header', $data);
		// $this->load->view('layouts/v_sidebar', $data);
		// $this->load->view('pages/v_customer');
		// $this->load->view('layouts/v_footer');

        $this->load->view('pages/v_customer');
	}
}

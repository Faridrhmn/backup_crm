<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Dashboard';

		$this->load->view('layouts/v_header', $data);
		$this->load->view('layouts/v_sidebar', $data);
		$this->load->view('pages/v_dashboard');
		$this->load->view('layouts/v_footer');

        
	}
}

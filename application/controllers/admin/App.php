<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
        $data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Dashboard';
        $this->load->view('root/v_app', $data); 
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_promosi extends CI_Controller {

	public function index()
	{
        $data['current_uri'] = $this->uri->uri_string();
        $data['title'] = 'Video Promosi';

		$this->load->view('layouts/v_header');
		$this->load->view('layouts/v_sidebar', $data);
		$this->load->view('pages/v_video_promosi');
		$this->load->view('layouts/v_footer');
	}
}

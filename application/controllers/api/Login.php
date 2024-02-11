<?php

require APPPATH.'/libraries/REST_Controller.php';

class Login extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_admin');
    }
    public function login_post(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // $adminModel = new _admin();
        $result = $this->m_admin->login($username, $password);

        if($result){
            $this->response([
                'data' => $result,
                'status' => true,
                'message' => "Login successful",
            ], Rest_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => "Login failed",
            ], Rest_Controller::HTTP_BAD_REQUEST);
        }     
        
    }

    public function coba_get(){
        $hehe = "hehe";

        $this->response($hehe, 200);
    }
} 
<?php

class M_admin extends CI_model{
    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin')->row_array();
        return $query;
    }
}
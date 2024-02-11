<?php

class M_customer extends CI_model{

    public function dataCustomer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer.posisi', 'customer'); 
        $this->db->join('prospek', 'customer.id_prospek = prospek.id_prospek');
        return $this->db->get()->result_array();
    }
    public function cariCustomer($id){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('prospek', 'customer.id_prospek = prospek.id_prospek');
        $this->db->where('id_customer', $id);
        return $this->db->get()->result_array();
    }
    public function hapusCustomer($id_customer, $id_prospek)
    {
        $this->db->trans_start();
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');
        $this->db->where('id_prospek', $id_prospek);
        $this->db->delete('prospek');
        $this->db->trans_complete();
    }
    public function updateCustomer($id_customer, $id_prospek, $customer){
        $customerData = array(
            "alamat" => $customer['alamat']
        );
        $prospekData = array(
            "nama" => $customer['nama'],
            "no_whatsapp" => $customer['no_whatsapp']
        );
        $this->db->where('id_prospek', $id_prospek);
        $this->db->update('prospek', $prospekData);
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $customerData);
    }
    public function pindahCustomer($agen)
    {
        $id_customer = $agen['id_customer'];
        $id_prospek = $agen['id_prospek'];
        $customerData = array(
            "posisi" => $agen['posisi']
        );
        $prospekData = array(
            "posisi" => $agen['posisi']
        );
        $akunData = array(
            "username" => $agen['username'],
            "password" => $agen['password'],
            "status" => $agen['posisi']
        );
        $this->db->where('id_prospek', $id_prospek);
        $this->db->update('prospek', $prospekData);
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $customerData);
        $this->db->insert('akun', $akunData);
        $id_akun = $this->db->insert_id();
        $agenData = array(
            "id_customer" => $agen['id_customer'],
            "id_akun" => $id_akun
        );
        $this->db->insert('agen', $agenData);
    }
}
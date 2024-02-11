<?php

class M_agen extends CI_model{

    public function dataAgen()
    {
        $this->db->select('*');
        $this->db->from('agen');
        $this->db->join('customer', 'agen.id_customer = customer.id_customer');
        $this->db->join('prospek', 'customer.id_prospek = prospek.id_prospek');
        $this->db->join('akun', 'agen.id_akun = akun.id_akun');
        return $this->db->get()->result_array();
    }
    public function hapusAgen($id_customer, $id_prospek, $id_agen, $id_akun)
    {
        $this->db->trans_start();
        $this->db->where('id_agen', $id_agen);
        $this->db->delete('agen');
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');
        $this->db->where('id_prospek', $id_prospek);
        $this->db->delete('prospek');
        $this->db->where('id_akun', $id_akun);
        $this->db->delete('akun');
        $this->db->trans_complete();
    }
    public function cariCustomer($id){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('prospek', 'customer.id_prospek = prospek.id_prospek');
        $this->db->where('id_customer', $id);
        return $this->db->get()->result_array();
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
        $customerData = array(
            "posisi" => $agen['posisi']
        );
        $agenData = array(
            "username" => $agen['username'],
            "password" => $agen['password'],
            "status" => $agen['posisi']
        );
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $customerData);
        $this->db->insert('akun', $agenData);
    }
}
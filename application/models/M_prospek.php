<?php

class M_prospek extends CI_model{

    public function dataProspek()
    {
        // return $this->db->get('prospek')->result_array();
        return $this->db->where('posisi', 'prospek')->get('prospek')->result_array();

    }
    public function tambahDataProspek($prospek)
    {
        $this->db->insert('prospek', $prospek);
    }
    public function hapusProspek($id)
    {
        $this->db->where('id_prospek', $id);
        $this->db->delete('prospek');
    }
    public function cariProspek($id){
        return $this->db->get_where('prospek', ['id_prospek' => $id])->result_array();
    }
    public function updateProspek($id, $prospek){
        $this->db->where('id_prospek', $id);
        $this->db->update('prospek', $prospek);
    }
    public function pindahProspek($customer)
    {
        $id_prospek = $customer['id_prospek'];
        $prospekData = array(
            "posisi" => $customer['posisi']
        );
        $this->db->where('id_prospek', $id_prospek);
        $this->db->update('prospek', $prospekData);
        $this->db->insert('customer', $customer);
    }
}
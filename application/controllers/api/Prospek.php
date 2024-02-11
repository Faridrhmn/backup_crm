<?php
require APPPATH.'/libraries/REST_Controller.php';

class Prospek extends REST_Controller {
	public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_prospek');
    }

	public function show_get()
	{
		$prospek['prospek'] = $this->M_prospek->dataProspek();
		$this->response($prospek, 200);
	}

    public function tambah_post()
	{
        $prospek = [
            "nama" => $this->input->post('nama'),
            "no_whatsapp" => $this->input->post('no_whatsapp'),
            "posisi" => $this->input->post('posisi')
        ];
        $result['prospek'] = $this->M_prospek->tambahDataProspek($prospek);
		// $prospek['prospek'] = $this->M_prospek->dataProspek();
		$this->response($result, 200);
	}

    public function hapus_delete($id)
	{
		$result['prospek'] = $this->M_prospek->hapusProspek($id);
		$this->response($result, 200);
	}

    public function cari_get($id){
        $result['prospek'] = $this->M_prospek->cariProspek($id);
        $this->response($result, 200);
    }

    public function perbarui_post($id){
        $prospek = [
            "nama" => $this->input->post('nama'),
            "no_whatsapp" => $this->input->post('no_whatsapp')
        ];
        
        $result['prospek'] = $this->M_prospek->updateProspek($id, $prospek);
        $this->response($result, 200);
    }

    public function pindah_post(){
        $customer = [
            "id_prospek" => $this->input->post('id_prospek'),
            "alamat" => $this->input->post('alamat'),
            "posisi" => $this->input->post('posisi')
        ];
        
        $result['customer'] = $this->M_prospek->pindahProspek($customer);
        $this->response($result, 200);
    }

    public function ganti_post($id){
        $prospek = [
            "posisi" => $this->input->post('posisi')
        ];
        
        $result['prospek'] = $this->M_prospek->updateProspek($id, $prospek);
        $this->response($result, 200);
    }
}

<?php
require APPPATH.'/libraries/REST_Controller.php';

class Customer extends REST_Controller {
	public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_customer');
    }

	public function show_get()
	{
		$customer['customer'] = $this->M_customer->dataCustomer();
		$this->response($customer, 200);
	}

    public function cari_get($id){
        $result['customer'] = $this->M_customer->cariCustomer($id);
        $this->response($result, 200);
    }

    public function hapus_delete($id_customer, $id_prospek)
	{
		$result['customer'] = $this->M_customer->hapusCustomer($id_customer, $id_prospek);
		$this->response($result, 200);
	}

    public function perbarui_post($id_customer, $id_prospek){
        $customer = [
            "nama" => $this->input->post('nama'),
            "no_whatsapp" => $this->input->post('no_whatsapp'),
            "alamat" => $this->input->post('alamat')
        ];
        
        $result['customer'] = $this->M_customer->updateCustomer($id_customer, $id_prospek, $customer);
        $this->response($result, 200);
    }

    public function pindah_post(){
        $dataPindah = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "id_customer" => $this->input->post('id_customer'),
            "id_prospek" => $this->input->post('id_prospek'),
            "posisi" => $this->input->post('posisi')
        ];
        
        $result['agen'] = $this->M_customer->pindahCustomer($dataPindah);
        $this->response($result, 200);
    }
}

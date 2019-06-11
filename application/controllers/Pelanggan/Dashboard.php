<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function login_kah(){
        if ( !$this->session->has_userdata('email_plg'))
            redirect(base_url());           
        else
            return TRUE; 
    }

	public function index()
	{
		$this->login_kah();
		$data['judul']="HOME";
		$data['content']="pelanggan/beranda";
		$id_plg = $this->session->userdata('id_plg');
		$data['data_plg'] = $this->m_pelanggan->ambil_data_where('pelanggan','id_plg',$id_plg);
		$data['rwt_pesanan'] = count($this->m_pelanggan->ambil_data_where('pesanan','id_plg',$id_plg));

		$cari=[
			'id_plg' => $id_plg,
			'id_status' => 1
		];
		$data['pesanan_blm_selesai'] = count($this->m_pelanggan->ambil_data_wheres('pesanan',$cari));
		
		// echo json_encode($_SESSION);
		// exit;

		$this->load->view('pelanggan/template',$data);
	}
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    function login_kah(){
        if ( !$this->session->has_userdata('email_plg'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){

    }

    function pesanan(){
        $this->login_kah();
		$id_plg = $this->session->userdata('id_plg');

        $data['title']="Halaman Riwayat Pesanan";
        $data['content']="pelanggan/riwayat/pesanan";
        // $data['data_pesanan']=$this->m_pelanggan->ambil_data_where('pesanan','id_plg',$id_plg);
        $data['data_status']=$this->m_pelanggan->ambil_data('status');
        $data['data_metode']=$this->m_pelanggan->ambil_data('metode_bayar');
        $data['data_pesanan'] = $this->m_pelanggan->total_pesanan($id_plg);

        $this->load->view('pelanggan/template',$data);
    }

    function saldo(){
        $this->login_kah();
		$id_plg = $this->session->userdata('id_plg');

        $data['title']="Halaman Riwayat Saldo";
        $data['content']="pelanggan/riwayat/saldo";
        // $data['data_pesanan']=$this->m_pelanggan->ambil_data_where('pesanan','id_plg',$id_plg);
        $data['data_riwayat_saldo']=$this->m_pelanggan->ambil_data_where('riwayat_saldo','id_plg',$id_plg);


        $this->load->view('pelanggan/template',$data);
    }

    function deposit(){
        $this->login_kah();
        $id_plg = $this->session->userdata('id_plg');
        $data_cari = [
            'id_plg' => $id_plg,
            'id_status' => 4
        ];

        $data['title']="Halaman Riwayat Deposit";
        $data['content']="pelanggan/riwayat/deposit";
        $data['data_rekening']=$this->m_pelanggan->ambil_data('rekening_bank');
        $data['data_deposit']=$this->m_pelanggan->ambil_data_wheres('deposit_saldo',$data_cari);


        $this->load->view('pelanggan/template',$data);
    }

}
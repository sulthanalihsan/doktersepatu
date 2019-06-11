<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){
        echo "hai";
    }

    function pesanan(){
        $this->login_kah();
		$id_plg = $this->session->userdata('id_plg');
        $data['title']="Halaman Laporan Pesanan Pelanggan";
        $data['content']="admin/laporan/pesanan";

        $this->login_kah();
		$data_cari = 'pesanan.id_status = 3';
        
        if(!empty($_POST)){ //jika ada post
            $data_cari = "YEAR(waktu_pesan) = $_POST[filter_tahun] AND MONTH(waktu_pesan) = $_POST[filter_bulan] AND pesanan.id_status = 3";
            $data['data_pesanan']=$this->m_admin->data_pesanan_based_date($data_cari); //parameter : namatabel,primary,id
        }

        $data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_plg'] = $this->m_admin->ambil_data('pelanggan');
		$data['data_metode'] = $this->m_admin->ambil_data('metode_bayar');

        $this->load->view('admin/template',$data);
    }
    
    function deposit(){
        $this->login_kah();
        $data['title']="Laporan Deposit Pelanggan";
        $data['content']="admin/laporan/deposit";
        
        if(!empty($_POST) && $_POST['filter_bulan'] != 'semua'){ //jika ada post
            $data_cari = "YEAR(waktu_deposit) = $_POST[filter_tahun] AND MONTH(waktu_deposit) = $_POST[filter_bulan] AND id_status = 4";
            $data['data_deposit']=$this->m_admin->ambil_data_wheres('deposit_saldo',$data_cari); //parameter : namatabel,primary,id
            $data['card_header']="Data Pada Bulan ".$this->bulan($_POST['filter_bulan']);
        }else{
            $data['card_header']="Data Semua Bulan";
            $data['data_deposit']=$this->m_admin->ambil_data('deposit_saldo');
        }

        // $data['data_deposit']=$this->m_admin->ambil_data('deposit_saldo'); //parameter : namatabel,primary,id
        $data['data_status'] = $this->m_admin->ambil_data('status');
        $data['data_plg'] = $this->m_admin->ambil_data('pelanggan');

        $this->load->view('admin/template',$data);
    }

    function saldo(){
        $this->login_kah();
		$id_plg = $this->session->userdata('id_plg');

        $data['title']="Halaman Riwayat Saldo";
        $data['content']="admin/laporan/saldo";

        if(!empty($_POST)){ //jika ada post
            if(isset($_POST['filter_bulan'],$_POST['filter_tahun'])){ //jika ada post yg filter bulan
                $data_cari = "YEAR(tgl_riwayat) = $_POST[filter_tahun] AND MONTH(tgl_riwayat) = $_POST[filter_bulan] AND id_plg = $_POST[id_plg]";
                $data['data_riwayat_saldo']=$this->m_admin->ambil_data_wheres('riwayat_saldo',$data_cari); //parameter : namatabel,primary,id
            }else{
                $data['data_riwayat_saldo']=$this->m_pelanggan->ambil_data_where('riwayat_saldo','id_plg',$_POST['id_plg']);
            }
        }

        $this->load->view('admin/template',$data);
    }

    function print_pesanan(){
        $this->login_kah();
        $id_plg = $this->session->userdata('id_plg');
        $data['title']="Halaman Laporan Pesanan Pelanggan";
        $data['convert'] = new Convert_tanggal();
        $data['date'] = new DateTime();
        $this->login_kah();
		$data_cari = 'pesanan.id_status = 3';

        $data_cari = "YEAR(waktu_pesan) = $_POST[filter_tahun] AND MONTH(waktu_pesan) = $_POST[filter_bulan] AND pesanan.id_status = 3";
        $data['data_pesanan']=$this->m_admin->data_pesanan_based_date($data_cari); //parameter : namatabel,primary,id

        $data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_plg'] = $this->m_admin->ambil_data('pelanggan');
		$data['data_metode'] = $this->m_admin->ambil_data('metode_bayar');

        $this->load->view('admin/laporan/print-pesanan',$data);
    }

    function print_deposit(){
        $this->login_kah();
        $id_plg = $this->session->userdata('id_plg');
        $data['title']="Halaman Laporan Pesanan Pelanggan";
        $data['convert'] = new Convert_tanggal();
        $data['date'] = new DateTime();
        $this->login_kah();

        $data_cari = "YEAR(waktu_deposit) = $_POST[filter_tahun] AND MONTH(waktu_deposit) = $_POST[filter_bulan] AND id_status = 4";
        $data['data_deposit']=$this->m_admin->ambil_data_wheres('deposit_saldo',$data_cari);

        $data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_plg'] = $this->m_admin->ambil_data('pelanggan');
		$data['data_metode'] = $this->m_admin->ambil_data('metode_bayar');

        $this->load->view('admin/laporan/print-deposit',$data);
    }

	public function data_json($id){
		$this->login_kah();
		$data['deposit'] = $this->m_admin->get_data_deposit_byid('deposit_saldo','id_deposit',$id);
		echo json_encode($data['deposit']);
    }
    
    public function bulan($bulan_input){
        $nama_bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        return $nama_bulan[$bulan_input-1];
    }

}
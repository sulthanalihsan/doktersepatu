<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){
		$this->login_kah();
        $data['title']="Data Deposit";
        $data['content']="admin/deposit/index";
		$data['data_deposit']=$this->m_admin->ambil_data_where('deposit_saldo','id_status',1); //parameter : namatabel,primary,id
		$data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_plg'] = $this->m_admin->ambil_data('pelanggan');

        $this->load->view('admin/template',$data);
    }

	function confirm($id_deposit){
		$data_deposit = $this->m_admin->ambil_data('deposit_saldo','id_deposit',$id_deposit);
		$id_plg = $data_deposit['id_plg'];
		$total = $data_deposit['jml_deposit']+$data_deposit['kode_unik'];

		$data_plg = $this->m_admin->ambil_data('pelanggan','id_plg',$id_plg);
		$saldo_plg = $data_plg['saldo_plg'];

		// area EDIT status deposit saldo jadi 4/sukses
		$data_lain = [
			'id_deposit' => $id_deposit,
			'id_status' => 4,
			'submit' => ""
		];
		$_POST = $data_lain;
		$this->m_admin->edit_data('deposit_saldo');
		// area edit status deposit saldo

		// area TAMBAH riwayat saldo
		unset($_POST);
		$data_lain=[ 
			'id_plg' => $id_plg,
			'id_transaksi' => $id_deposit,
			'tgl_riwayat' => date("Y-m-d H:i:s"),
			'type' => 'debit',
			'nominal' => $total,
			'saldo_awal' => $saldo_plg,
			'submit' => ''
		];
		$_POST = $data_lain;
		$this->m_admin->tambah_data('riwayat_saldo');
		// area TAMBAH riwayat saldo

		// area MENAMBAH saldo pelanggan
		unset($_POST);
		$data_lain=[
			'primary'=>['id_plg' => $id_plg]
		];

		$_POST = $data_lain;
		$this->m_admin->update_nilai('pelanggan','saldo_plg','saldo_plg+'.$total);
		// area MENAMBAH saldo pelanggan

		redirect(base_url('admin/deposit'));
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/deposit/edit';
        $data['data_deposit']=$this->m_admin->ambil_data('deposit_bank','id_rek_bank',$id); //parameter: namatabel,primary,id
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}
    	else{
        	if($this->m_admin->edit_data('deposit_bank',$this->cek_foto('foto_deposit')))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data deposit Berhasil Diubah';
				$data['go']='admin/deposit';
        	}
        	else
        	{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data deposit Gagal Diubah ';
				$data['go']='admin/deposit/edit/'.$id;
			}
			$this->load->view('admin/template',$data);
			// redirect(base_url("admin/deposit"));
    	}
    }

}
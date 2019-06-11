<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){
		$this->login_kah();
        $data['title']="Data Ongkir";
        $data['content']="admin/ongkir/index";
		$data['data_ongkir']=$this->m_admin->ambil_data('ongkir'); //parameter : namatabel,primary,id

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/ongkir/tambah';
        
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');
		$this->form_validation->set_rules('tarif_ongkir','Tarif Ongkir','required');

		if( $this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/template',$data);
		}
		else
		{	
			$this->m_admin->tambah_data('ongkir');
			$this->index();
		}
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/ongkir/edit';
        $data['data_ongkir']=$this->m_admin->ambil_data('ongkir','id_ongkir',$id); //parameter: namatabel,primary,id

		$this->form_validation->set_rules('kecamatan','Kecamatan','required');
		$this->form_validation->set_rules('tarif_ongkir','Tarif Ongkir','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}
    	else{
        	if($this->m_admin->edit_data('ongkir'))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data ongkir Berhasil Diubah';
				$data['go']='admin/ongkir';
        	}
        	else
        	{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data ongkir Gagal Diubah ';
				$data['go']='admin/ongkir/edit/'.$id;
			}
			$this->load->view('admin/template',$data);
			// redirect(base_url("admin/ongkir"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('ongkir','id_ongkir',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data ongkir Berhasil Dihapus';
			$data['go']='admin/ongkir';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data ongkir Gagal Dihapus ';
			$data['go']='admin/ongkir';
		}
		$this->load->view('admin/template',$data);
	}
		
}
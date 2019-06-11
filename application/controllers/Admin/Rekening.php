<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){
		$this->login_kah();
        $data['title']="Data rekening";
        $data['content']="admin/rekening/index";
		$data['data_rekening']=$this->m_admin->ambil_data('rekening_bank'); //parameter : namatabel,primary,id

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/rekening/tambah';

		$foto = $this->cek_foto('logo_bank');

		$data_lain=[
			'logo_bank' => $foto['logo_bank'],
		];
        
		$this->form_validation->set_rules('nama_bank','Nama Bank','required');
		$this->form_validation->set_rules('atas_nama_rek','Atas Nama Rekeneing','required');
		$this->form_validation->set_rules('no_rek','Nomor Rekening','required');

		if( $this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/template',$data);
		}
		else
		{	
			$this->m_admin->tambah_data('rekening_bank',$data_lain);
			$this->index();
		}
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/rekening/edit';
        $data['data_rekening']=$this->m_admin->ambil_data('rekening_bank','id_rek_bank',$id); //parameter: namatabel,primary,id

		$foto = $this->cek_foto('logo_bank');

		if($foto){
			$data_lain=[
				'logo_bank' => $foto['logo_bank'],
			];
		}else{
			$data_lain=[];
		}

		$this->form_validation->set_rules('nama_bank','Nama Bank','required');
		$this->form_validation->set_rules('atas_nama_rek','Atas Nama Rekeneing','required');
		$this->form_validation->set_rules('no_rek','Nomor Rekening','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}
    	else{
        	if($this->m_admin->edit_data('rekening_bank',$data_lain))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data rekening Berhasil Diubah';
				$data['go']='admin/rekening';
        	}
        	else
        	{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data rekening Gagal Diubah ';
				$data['go']='admin/rekening/edit/'.$id;
			}
			$this->load->view('admin/template',$data);
			// redirect(base_url("admin/rekening"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('rekening_bank','id_rek_bank',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data rekening Berhasil Dihapus';
			$data['go']='admin/rekening';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data rekening Gagal Dihapus ';
			$data['go']='admin/rekening';
		}
		$this->load->view('admin/template',$data);
	}

	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){

			$config['upload_path']          = './uploads/logo-bank';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
	
			
			$this->load->library('upload', $config);
			$this->upload->do_upload($nama_foto);
			$data[$nama_foto]=$this->upload->data('file_name');
			return $data;
		}else{
			return false;
		}
	}
}
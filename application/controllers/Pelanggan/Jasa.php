<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
        $data['title']="Data Jasa";
        $data['content']="admin/jasa/index";
		$data['data_jasa']=$this->m_admin->ambil_data('jasa'); //parameter : namatabel,primary,id
		$data['data_kategori'] = $this->m_admin->ambil_data('kategori');

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/jasa/tambah';
        $data['data_kategori'] = $this->m_admin->ambil_data('kategori');
        
		$config['upload_path']          = './uploads/foto-jasa/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = FALSE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('foto_jasa');
		$file_name=$this->upload->data('file_name');
		$data['foto_jasa']=$file_name;

		$this->form_validation->set_rules('id_kategori','Kategori','required');
		$this->form_validation->set_rules('nama_jasa','Nama Jasa','required');
		$this->form_validation->set_rules('tarif_jasa','Tarif','required');
		$this->form_validation->set_rules('desk_jasa','Deskripsi','required');

		if( $this->form_validation->run()==FALSE)
		{	
			$this->load->view('admin/template',$data);
		}
		else
		{	
			// print_r($data['foto_jasa']);
			$this->m_admin->tambah_data('jasa',$this->cek_foto('foto_jasa'));
			$this->index();
		}		
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/jasa/edit';
        $data['data_jasa']=$this->m_admin->ambil_data('jasa','id_jasa',$id); //parameter: namatabel,primary,id
        $data['data_kategori'] = $this->m_admin->ambil_data('kategori');

        $this->form_validation->set_rules('id_kategori','Kategori','required');
		$this->form_validation->set_rules('nama_jasa','Nama Jasa','required');
		$this->form_validation->set_rules('tarif_jasa','Tarif','required');
		$this->form_validation->set_rules('desk_jasa','Deskripsi','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}
    	else{
        	if($this->m_admin->edit_data('jasa',$this->cek_foto('foto_jasa')))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data Jasa Berhasil Diubah';
				$data['go']='admin/Jasa';
        	}        	
        	else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data Jasa Gagal Diubah ';
				$data['go']='admin/jasa/edit/'.$id;
			}
			$this->load->view('admin/template',$data);
			// redirect(base_url("admin/jasa"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('jasa','id_jasa',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data Jasa Berhasil Dihapus';
			$data['go']='admin/jasa';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data Jasa Gagal Dihapus ';
			$data['go']='admin/jasa';
		}
		$this->load->view('admin/template',$data);
	}
		
	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){
			$config['upload_path']          = './uploads/foto-jasa';
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
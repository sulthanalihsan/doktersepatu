<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
        $data['title']="Data Akun";
        $data['content']="admin/akun/index";
		$data['data_akun']=$this->m_admin->ambil_data('admin'); //parameter : namatabel,primary,id

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/akun/tambah';
        
		$foto = $this->cek_foto('foto_adm');

		if($foto){
			$data_lain=[
				'foto_adm' => $foto['foto_adm'],
			];
		}else{
			$data_lain=[];
		}

		$this->form_validation->set_rules('email_adm','Email','required');
		$this->form_validation->set_rules('nama_adm','Nama','required');
		$this->form_validation->set_rules('pass_adm','Password','required');

		if( $this->form_validation->run()==FALSE)
		{
			// echo "<script>alert('form false')</script>";
			$this->load->view('admin/template',$data);
		}
		else
		{	
			// echo "<script>alert('form true')</script>";
			$this->m_admin->tambah_data('admin',$data_lain);
			$this->index();
		}		
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/akun/edit';
        $data['data_akun']=$this->m_admin->ambil_data('admin','id_adm',$id); //parameter: namatabel,primary,id

		$foto = $this->cek_foto('foto_adm');

		if($foto){
			$data_lain=[
				'foto_adm' => $foto['foto_adm'],
			];
		}else{
			$data_lain=[];
		}

		$this->form_validation->set_rules('email_adm','Email','required');
		$this->form_validation->set_rules('nama_adm','Nama','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}else{
        	if($this->m_admin->edit_data('admin',$data_lain))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data akun Berhasil Diubah';
				$data['go']='admin/akun';
				$this->load->view('admin/template',$data);
        	}        	
        	else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data akun Gagal Diubah ';
				$data['go']='admin/akun/edit/'.$id;
				$this->load->view('admin/template',$data);
			}
			// $this->load->view('admin/template',$data);
			// redirect(base_url("admin/akun"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('admin','id_adm',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data akun Berhasil Dihapus';
			$data['go']='admin/akun';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data akun Gagal Dihapus ';
			$data['go']='admin/akun';
		}
		$this->load->view('admin/template',$data);
	}

	function profil(){
		$data['content'] = "admin/akun/profil";
		$this->load->view('admin/template',$data);
	}
		
	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){
			$config['upload_path']          = './uploads/foto-admin';
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
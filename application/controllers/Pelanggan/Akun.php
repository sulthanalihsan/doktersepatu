<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_plg'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
		$id_plg = $this->session->userdata('id_plg');
        $data['title']="Data Profil";
		$data['content']="pelanggan/akun/index";
		$data['data_akun']=$this->m_pelanggan->ambil_data('pelanggan','id_plg',$id_plg);
		$data['rwt_pesanan'] = count($this->m_pelanggan->ambil_data_where('pesanan','id_plg',$id_plg));

        $this->load->view('pelanggan/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='pelanggan/akun/tambah';
        
		$config['upload_path']          = './uploads/foto-pelanggan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = FALSE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('foto_adm');
		$file_name=$this->upload->data('file_name');
		$data['foto_adm']=$file_name;

		$this->form_validation->set_rules('email_adm','Email','required');
		$this->form_validation->set_rules('nama_adm','Nama','required');
		$this->form_validation->set_rules('pass_adm','Password','required');

		if( $this->form_validation->run()==FALSE)
		{
			// echo "<script>alert('form false')</script>";
			$this->load->view('pelanggan/template',$data);
		}
		else
		{	
			// echo "<script>alert('form true')</script>";
			$this->m_pelanggan->tambah_data('pelanggan',$data);
			$this->index();
		}		
	}

	function edit($id){
		$this->login_kah();
		$data['title'] = "Edit Data Pelanggan";
		$data['content']='pelanggan/akun/edit';
		$data['data_plg']=$this->m_pelanggan->ambil_data('pelanggan','id_plg',$id);

		$foto = $this->cek_foto('foto_plg');

		if($foto){
			$data_lain=[
				'foto_plg' => $foto['foto_plg'],
			];
		}else{
			$data_lain=[];
		}
		
		$this->form_validation->set_rules('email_plg','Email','required');
		$this->form_validation->set_rules('username_plg','Username','required');
		$this->form_validation->set_rules('nama_plg','Nama','required');
		$this->form_validation->set_rules('tgllhr_plg','Tanggal Lahir','required');
		$this->form_validation->set_rules('jk_plg','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat_plg','Alamat','required');
		$this->form_validation->set_rules('nohp_plg','No HP','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('pelanggan/template',$data);
    	}
    	else{
        	if($this->m_pelanggan->edit_data('pelanggan',$data_lain)){
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data pelanggan Berhasil Diubah';
				$data['go']='pelanggan/akun';
				$this->load->view('pelanggan/template',$data);
        	}else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data pelanggan Gagal Diubah ';
				$data['go']='pelanggan/akun/edit/'.$id;
				$this->load->view('pelanggan/template',$data);
			}
			// $this->load->view('pelanggan/template',$data);
			// redirect(base_url("pelanggan/pelanggan"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_pelanggan->hapus_data('pelanggan','id_adm',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data akun Berhasil Dihapus';
			$data['go']='pelanggan/akun';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data akun Gagal Dihapus ';
			$data['go']='pelanggan/akun';
		}
		$this->load->view('pelanggan/template',$data);
	}

	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){
			$config['upload_path']          = './uploads/foto-plg';
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
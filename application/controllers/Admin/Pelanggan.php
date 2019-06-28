<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
		$data['title']="Data Pelanggan";
        $data['content']="admin/pelanggan/index";
		$data['data_plg']=$this->m_admin->ambil_data('pelanggan'); //parameter : namatabel,primary,id

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/pelanggan/tambah';
				
		$foto = $this->cek_foto('foto_plg');

		$data_lain=[
			'foto_plg' => $foto['foto_plg'],
		];

		$this->form_validation->set_rules('email_plg','Email','required');
		$this->form_validation->set_rules('username_plg','Username','required');
		$this->form_validation->set_rules('pass_plg','Password','required');
		$this->form_validation->set_rules('nama_plg','Nama','required');
		$this->form_validation->set_rules('tgllhr_plg','Tanggal Lahir','required');
		$this->form_validation->set_rules('jk_plg','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat_plg','Alamat','required');
		$this->form_validation->set_rules('nohp_plg','No HP','required');

		if( $this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/template',$data);
		}
		else
		{	
			$_POST['pass_plg'] = md5($_POST['pass_plg']);
			$id = $this->m_admin->tambah_data('pelanggan',$data_lain,true); // kalau true ambil id tabel nya
			
			unset($_POST);
			$_POST['submit'] = " ";

			$data_tambah=[ //gasan data awal riwayat saldo
				'id_plg' => $id,
				'tgl_riwayat' => date("Y-m-d H:i:s"),
				'type' => 'saldo awal'
			];

			$this->m_admin->tambah_data('riwayat_saldo',$data_tambah);
			// $this->index();
			redirect('admin/pelanggan');         
		}		
	}

	function edit($id){
		$this->login_kah();
		$data['title'] = "Edit Data Pelanggan";
		$data['content']='admin/pelanggan/edit';
		$data['data_plg']=$this->m_admin->ambil_data('pelanggan','id_plg',$id);

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
			$this->load->view('admin/template',$data);
    	}
    	else{
        	if($this->m_admin->edit_data('detail_pesanan',$data_lain)){
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data pelanggan Berhasil Diubah';
				$data['go']='admin/pelanggan/detail/'.$id;
				$this->load->view('admin/template',$data);
        	}else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data pelanggan Gagal Diubah ';
				$data['go']='admin/pelanggan/detail/'.$id;
				$this->load->view('admin/template',$data);
			}
			// $this->load->view('admin/template',$data);
			// redirect(base_url("admin/pelanggan"));
    	}
	}

	function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('pelanggan','id_plg',$id)){ //parameter: tabel,primary,id
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data Pelanggan Berhasil Dihapus';
			$data['go']='admin/pelanggan';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data Pelanggan Gagal Dihapus ';
			$data['go']='admin/pelanggan';
		}
		$this->load->view('admin/template',$data);
	}

	public function get_data_plg_by_id($id){
		$this->login_kah();
		$data['keluarga'] = $this->m_admin->get_data_by_id('pelanggan','id_plg',$id);
		echo json_encode($data['keluarga']);
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
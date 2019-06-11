<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
        $data['title']="Data Artikel";
        $data['content']="admin/artikel/index";
		$data['data_artikel']=$this->m_admin->ambil_data('artikel'); //parameter : namatabel,primary,id

		$data['data_admin']=$this->m_admin->ambil_data('admin');

        $this->load->view('admin/template',$data);
    }

	function tambah()
	{
		$this->login_kah();
		$data['content']='admin/artikel/tambah';
		$data['data_kategori'] = $this->m_admin->ambil_data('kategori');

		$admin=$_SESSION['email_adm'];
		$data_admin=$this->m_admin->ambil_data('admin','email_adm',$admin);
		$tanggal = date("Y-m-d H:i:s");

		$foto = $this->cek_foto('foto_header');

		if($foto){
			$data_lain=[
				'id_adm' => $data_admin['id_adm'],
				'tgl_artikel' => $tanggal,
				'foto_header' => $foto['foto_header'],
			];
		}else{
			$data_lain=[
				'id_adm' => $data_admin['id_adm'],
				'tgl_artikel' => $tanggal,
			];
		}
	
		$this->form_validation->set_rules('judul_artikel','Judul artikel','required');
		$this->form_validation->set_rules('isi_artikel','isi_artikel','required');
		// if (empty($_FILES['userfile']['name'])){
		// 	$this->form_validation->set_rules('foto_header', 'Gambar', 'required');
		// }

		if( $this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/template',$data);
		}
		else
		{	
			$this->m_admin->tambah_data('artikel',$data_lain);
			$this->index();
		}		
	}

	function edit($id){
		$this->login_kah();
		$data['content']='admin/artikel/edit';
        $data['data_artikel']=$this->m_admin->ambil_data('artikel','id_artikel',$id); //parameter: namatabel,primary,id

		$admin=$_SESSION['email_adm'];
		$data_admin=$this->m_admin->ambil_data('admin','email_adm',$admin);
		$tanggal = date("Y-m-d H:i:s");

		$foto = $this->cek_foto('foto_header');

		if($foto){
			$data_lain=[
				'id_adm' => $data_admin['id_adm'],
				'tgl_artikel' => $tanggal,
				'foto_header' => $foto['foto_header'],
			];
		}else{
			$data_lain=[
				'id_adm' => $data_admin['id_adm'],
				'tgl_artikel' => $tanggal,
			];
		}

		$this->form_validation->set_rules('judul_artikel','Judul artikel','required');
		$this->form_validation->set_rules('isi_artikel','isi_artikel','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/template',$data);
    	}else{
        	if($this->m_admin->edit_data('artikel',$data_lain))
			{
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data artikel Berhasil Diubah';
				$data['go']='admin/artikel';
				$this->load->view('admin/template',$data);
        	}        	
        	else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data artikel Gagal Diubah ';
				$data['go']='admin/artikel/edit/'.$id;
				$this->load->view('admin/template',$data);
			}
			// $this->load->view('admin/template',$data);
			// redirect(base_url("admin/artikel"));
    	}
    }
    
    function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_admin->hapus_data('artikel','id_artikel',$id)){
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data artikel Berhasil Dihapus';
			$data['go']='admin/artikel';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data artikel Gagal Dihapus ';
			$data['go']='admin/artikel';
		}
		$this->load->view('admin/template',$data);
	}
		
	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){
			$config['upload_path']          = './uploads/foto-artikel';
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

	public function get_data_artikel_by_id($id){
		$this->login_kah();
		$data['artikel'] = $this->m_admin->get_data_by_id('artikel','id_artikel',$id);
		echo json_encode($data['artikel']);
	}
}
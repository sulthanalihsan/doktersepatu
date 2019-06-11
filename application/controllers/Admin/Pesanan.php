<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

    function index(){
		$this->login_kah();
		$data_cari = 'pesanan.id_status = 1 or pesanan.id_status = 2';
        $data['title']="Data Pesanan";
        $data['content']="admin/pesanan/index";
		$data['data_pesanan']=$this->m_admin->pesanan($data_cari); //parameter : namatabel,primary,id
		$data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_plg'] = $this->m_admin->ambil_data('pelanggan');
		$data['data_metode'] = $this->m_admin->ambil_data('metode_bayar');

        $this->load->view('admin/template',$data);
    }

    function detail($id){
		$this->login_kah();	
		$data['title']="Detail Pesanan";
		$data['convert_tanggal'] = new Convert_tanggal();
        $data['content']="admin/pesanan/detail";
		$data['data_plg']=$this->m_admin->ambil_data('pelanggan'); //parameter : namatabel,primary,id
		$data['data_status'] = $this->m_admin->ambil_data('status');
		$data['data_pesanan_tb'] = $this->m_admin->ambil_data('pesanan','id_pesanan',$id);
		$data['data_detail_pesanan_tb'] = $this->m_admin->ambil_data_where('detail_pesanan','id_pesanan',$id);

		
		$jumlah_jasa = $this->m_admin->ambil_jumlah_row('detail_jasa');
		$data['data_jasa'] = $this->m_admin->ambil_data('jasa');
		$data['data_ongkir'] = $this->m_admin->ambil_data('ongkir');
		$data['data_metode_bayar'] = $this->m_admin->ambil_data('metode_bayar');
		$data['data_detail_jasa_tb'] = $this->m_admin->ambil_data('detail_jasa');



		$array_tampung=[];

		$array = [
			'id_detail_jasa' => null,
			'id_jasa' => null,
			'jumlah' => 0,
		];

		$temp=0;
		$id_detail_pesanan=[];

		//memilah data satuan yang sama dalam array $data['data_detail_pesanan_tb']
		for($i=0;$i<sizeof($data['data_detail_pesanan_tb']);$i++){
			if($data['data_detail_pesanan_tb'][$i]['id_detail_jasa']!=$temp){
				$temp = $data['data_detail_pesanan_tb'][$i]['id_detail_jasa'];
				$id_detail_pesanan[] = $temp;
			}
		}

		//memasukkan kedalam array_tampung beserta jumlahnya
		for($i=0;$i<sizeof($id_detail_pesanan);$i++){
			$jumlah = array_count_values(array_column($data['data_detail_pesanan_tb'], 'id_detail_jasa'))[$id_detail_pesanan[$i]];
			$array['id_detail_jasa'] = $id_detail_pesanan[$i];
			$array['jumlah'] = "$jumlah";
			array_push($array_tampung,$array);
		}

		$data['data_jumlah_jasa'] = $array_tampung;

        $this->load->view('admin/template',$data);
	}

	public function edit_sepatu($id){
		$this->login_kah();

		$foto_sblm = $this->cek_foto('foto_sblm');
		$foto_ssdh = $this->cek_foto('foto_ssdh');

		$data_lain=[];

		if($foto_sblm != false)
		$data_lain['foto_sblm'] = $foto_sblm['foto_sblm'];
		if($foto_ssdh != false)
		$data_lain['foto_ssdh'] = $foto_ssdh['foto_ssdh'];

		if($this->m_admin->edit_data('detail_pesanan',$data_lain)){
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data Sepatu Berhasil Diubah';
			$data['go']='admin/pesanan/detail/'.$id;
			$this->load->view('admin/template',$data);
		}else
		{	
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data Sepatu Gagal Diubah ';
			$data['go']='admin/pesanan/detail/'.$id;
			$this->load->view('admin/template',$data);
		}

	}

	public function edit_pesanan($id){
		$this->login_kah();

		$convert = new Convert_tanggal();

		$data_post = $this->input->post(NULL,TRUE);
		$data_lain=[];

		if($data_post['waktu_antar']!=null){
			$data_lain['waktu_antar'] = $convert->getValue($data_post['waktu_antar']);
		}else{
			$data_lain['waktu_antar'] = NULL;
		}

		
		unset(
			$_POST['waktu_antar']
		);

		if($this->m_admin->edit_data('pesanan',$data_lain)){
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data pelanggan Berhasil Diubah';
			$data['go']='admin/pesanan/detail/'.$id;
			$this->load->view('admin/template',$data);
		}else
		{	
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data pelanggan Gagal Diubah ';
			$data['go']='admin/pesanan/detail/'.$id;
			$this->load->view('admin/template',$data);
		}

	}


    
	public function data_json($id){
		$this->login_kah();
		$data['detail_pesanan'] = $this->m_admin->get_data_by_id('detail_pesanan','id_detail_pesanan',$id);
		echo json_encode($data['detail_pesanan']);
	}

	public function data_json_pesanan($id){
		$this->login_kah();
		$data['pesanan'] = $this->m_admin->get_data_by_id('pesanan','id_pesanan',$id);

		if($data['pesanan'][0]->waktu_antar!=null)
		$data['pesanan'][0]->waktu_antar = $this->convert_tanggal->getStr($data['pesanan'][0]->waktu_antar);

		echo json_encode($data['pesanan']);
	}

	function cek_foto($nama_foto){ //parameternya name file upload
		$this->login_kah();
		if(!empty($_FILES[$nama_foto]['name'])){
			$config['upload_path']          = './uploads/foto-before-after';
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
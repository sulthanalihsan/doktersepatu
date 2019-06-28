<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {


	function login_kah(){
        if ( !$this->session->has_userdata('email_plg'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index(){
		$this->login_kah();
		$data['title']="Halaman Pesanan Proses";
		$id_plg = $this->session->userdata('id_plg');
		
        $data['content']="pelanggan/pesanan/index";
		$data['data_plg']=$this->m_pelanggan->ambil_data('pelanggan'); //parameter : namatabel,primary,id
		$data['data_status'] = $this->m_pelanggan->ambil_data('status');

		$array_cari = [
			"id_plg" => $id_plg,
			"id_status" => 1
		];

		$data['data_pesanan']=$this->m_pelanggan->ambil_data_wheres('pesanan',$array_cari);

		foreach($data['data_pesanan'] as $key => $pesanan){
			$data['data_pesanan'][$key]['waktu_pesan'] = $this->convert_tanggal->getStr($pesanan['waktu_pesan']);
		}
		
        $this->load->view('pelanggan/template',$data);
    }

	function tambah(){
		$this->login_kah();
		$data['content']='pelanggan/pesanan/tambah';
		$data['convert'] = new Convert_tanggal();

		$data['data_jasa_perawatan'] = $this->m_pelanggan->ambil_data_where('jasa','id_kategori',1);
		$data['data_jasa_reparasi'] = $this->m_pelanggan->ambil_data_where('jasa','id_kategori',2);
		
		$data['data_ongkir'] = $this->m_pelanggan->ambil_data('ongkir');
		
		if(isset($_SESSION['data_post'])){
			$data['pesanan_temp'] = $_SESSION['data_post'];
		}
		
		$this->load->view('pelanggan/template',$data);
	
		
		
	}

	function checkout(){
		$this->login_kah();		
		$data['content']='pelanggan/pesanan/checkout';
		$id_plg = $this->session->userdata('id_plg');
		
		$jumlah_jasa = $this->m_pelanggan->ambil_jumlah_row('detail_jasa');
		$data['data_jasa'] = $this->m_pelanggan->ambil_data('jasa');
		$data['data_ongkir'] = $this->m_pelanggan->ambil_data('ongkir');
		$data['data_metode_bayar'] = $this->m_pelanggan->ambil_data('metode_bayar');
		$data['data_detail_jasa'] = $this->m_pelanggan->ambil_data('detail_jasa');
		$data['data_plg'] = $this->m_pelanggan->ambil_data('pelanggan','id_plg',$id_plg);

		//cuma meambil post-an pesanan jenis jasa ja 1-16
		$data_post = $this->input->post(null,TRUE);
		$data_post['waktu_jemput'] = $this->convert_tanggal->getValue($data_post['waktu_jemput']);
		$data['data_pesanan']=array_slice($data_post,0,$jumlah_jasa,true);
		$data['data_pesanan'] = array_diff($data['data_pesanan'],array(0));

		$data['data_ket_pesanan']=array_slice($data_post,$jumlah_jasa,sizeof($data_post),true);
		$this->session->set_userdata('data_post',$data_post);
		$this->load->view('pelanggan/template',$data);

	}

	function tambah_action(){

		$data_detail_jasa_tb = $this->m_pelanggan->ambil_data('detail_jasa');
		$data_ongkir = $this->m_pelanggan->ambil_data('ongkir');
		$id_plg = $this->session->userdata('id_plg');
		
		$data_plg = $this->m_admin->ambil_data('pelanggan','id_plg',$id_plg);
		$saldo_plg = $data_plg['saldo_plg'];

		$data_post = $this->session->userdata('data_post');
		array_pop($data_post);

		$jumlah_jasa = $this->m_pelanggan->ambil_jumlah_row('detail_jasa');
		$data_pesanan= array_slice($data_post,0,$jumlah_jasa,true);
		$data_pesanan = array_diff($data_pesanan,array(0));
		$data_ket_pesanan=array_slice($data_post,$jumlah_jasa,sizeof($data_post),true);

		$acak = rand(01,99);
		$id_pesanan = date('dmy')."-".date('His')."-".$acak;

		$data_lain = [
			'id_pesanan' => $id_pesanan,
			'id_plg' => $this->session->userdata('id_plg'),
			'id_status' => "1",
			'waktu_pesan' => date("Y-m-d H:i:s"),
		];

		/*
		$data_pesanan = tabel detail_pesanan di database, klue: data_pesanan berisi jasa yang dipilih pelanggan
		$data_ket_pesanan = tabel pesanan di database, klue: data_ket_pesanan berisi data keterangan pesanan spt alamat, metode-bayar dll
		*/

		$data_ket_pesanan = array_merge($data_ket_pesanan,$data_lain);
		$key_pesanan = array_keys($data_pesanan); //key dari array assoc-nya data_pesanan jasa
		

		$array_detail_pesanan=[]; 
		//array detail pesanan adalah array yang akan mengisi tabel detail_pesanan
		//berisi data yang terdiri dari jenis jasa yang dipilih plg dengan jumlah yang ditentukan saat plg meinput		
		
		for($i=0;$i<sizeof($key_pesanan);$i++){
			for($n=0;$n<$data_pesanan[$key_pesanan[$i]];$n++){
				array_push($array_detail_pesanan,$this->add_array($id_pesanan,$key_pesanan[$i]));
			}
		}


		$ongkir = $data_ongkir[$data_ket_pesanan['id_ongkir']-1]['tarif_ongkir'];
		$total=0;
		for($i=0;$i<sizeof($key_pesanan);$i++){ //mendapatkan data total pesanan gasan dikurangi saldo plgnya
			$total += $data_pesanan[$key_pesanan[$i]] * $data_detail_jasa_tb[$key_pesanan[$i]-1]['tarif'];
		}

		$metode_bayar = $data_ket_pesanan['id_metode_bayar'];
		$total += $ongkir;
		$field = 'saldo_plg-'.$total;

		// area MENGURANGI saldo pelanggan
		unset($_POST);
		$data_lain=[
			'primary'=>['id_plg' => $id_plg]
		];
		$_POST = $data_lain;
		if($metode_bayar==1)
		$this->m_pelanggan->update_nilai('pelanggan','saldo_plg','saldo_plg-'.$total);
		// $this->m_pelanggan->kurangi_saldo($field,$id_plg);
		// area MENGURANGI saldo pelanggan


		if($this->m_pelanggan->tambah_data('pesanan',$data_ket_pesanan)){ //jika pesanan dibuat
			// area TAMBAH riwayat saldo
			unset($_POST);
			$data_lain=[ 
				'id_plg' => $id_plg,
				'id_transaksi' => $id_pesanan,
				'tgl_riwayat' => date("Y-m-d H:i:s"),
				'type' => 'kredit',
				'nominal' => $total,
				'saldo_awal' => $saldo_plg,
				'submit' => ''
			];
			$_POST = $data_lain;
			$this->m_pelanggan->tambah_data('riwayat_saldo');
			// area TAMBAH riwayat saldo
		}

		if($this->m_pelanggan->insert_banyak('detail_pesanan',$array_detail_pesanan))
		{	
			unset($_SESSION['data_post']);
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='SUKSES';	//SUKSES GAGAL
			$data['isi']='Pesanan berhasil dibuat, admin akan segera menghubungi anda';
			$data['go']='pelanggan/pesanan';
		}
		else
		{
			$data['content'] = "pesan";
			$data['page']='pesan';
			$data['mode']='GAGAL';	//SUKSES GAGAL
			$data['isi']='Pesanan gagal dibuat';
			$data['go']='pelanggan/pesanan';
		}

		$this->load->view('pelanggan/template',$data);
		// redirect(base_url('pelanggan/pesanan'));
		

	}

	function detail($id){
		$this->login_kah();	
		$data['title']="Detail Pesanan";
		$id_plg = $this->session->userdata('id_plg');
		$data['convert_tanggal'] = new Convert_tanggal();
        $data['content']="pelanggan/pesanan/detail";
		$data['data_plg']=$this->m_pelanggan->ambil_data('pelanggan'); //parameter : namatabel,primary,id
		$data['data_status'] = $this->m_pelanggan->ambil_data('status');
		$data['data_pesanan_tb'] = $this->m_pelanggan->ambil_data('pesanan','id_pesanan',$id);
		$data['data_detail_pesanan_tb'] = $this->m_pelanggan->ambil_data_where('detail_pesanan','id_pesanan',$id);

		
		$jumlah_jasa = $this->m_pelanggan->ambil_jumlah_row('detail_jasa');
		$data['data_jasa'] = $this->m_pelanggan->ambil_data('jasa');
		$data['data_ongkir'] = $this->m_pelanggan->ambil_data('ongkir');
		$data['data_metode_bayar'] = $this->m_pelanggan->ambil_data('metode_bayar');
		$data['data_detail_jasa_tb'] = $this->m_pelanggan->ambil_data('detail_jasa');
		$data['data_plg'] = $this->m_pelanggan->ambil_data('pelanggan','id_plg',$id_plg);



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

        $this->load->view('pelanggan/template',$data);
	}

	function add_array($id_pesanan,$yeah){
		
		$array_temp=[
			'id_pesanan' => $id_pesanan,
			"id_detail_jasa" => $yeah,
			'id_status' => 1
		];

		return $array_temp;
	}

	function edit($id){
		$this->login_kah();
		$data['content']='pelanggan/pelanggan/edit';
		$data['data_plg']=$this->m_pelanggan->ambil_data('pelanggan','id_plg',$id);
		$this->form_validation->set_rules('email_plg','Email','required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('pelanggan/template',$data);
    	}
    	else{
        	if($this->m_pelanggan->edit_data('pelanggan',$this->cek_foto('foto_plg'))){
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='SUKSES';//SUKSES GAGAL
				$data['isi']='Data pelanggan Berhasil Diubah';
				$data['go']='pelanggan/pelanggan';
				$this->load->view('pelanggan/template',$data);
        	}else
        	{	
				$data['content'] = "pesan";
				$data['page']='pesan';
				$data['mode']='GAGAL';//SUKSES GAGAL
				$data['isi']='Data pelanggan Gagal Diubah ';
				$data['go']='pelanggan/pelanggan/edit/'.$id;
				$this->load->view('pelanggan/template',$data);
			}
			// $this->load->view('pelanggan/template',$data);
			// redirect(base_url("pelanggan/pelanggan"));
    	}
	}

	function hapus($id){
		$this->login_kah();
		$data['content'] = "pesan";
		if($this->m_pelanggan->hapus_data('pelanggan','id_plg',$id)){ //parameter: tabel,primary,id
			$data['page']='pesan';
			$data['mode']='SUKSES';//SUKSES GAGAL
			$data['isi']='Data Pelanggan Berhasil Dihapus';
			$data['go']='pelanggan/pelanggan';
		}else{
			$data['page']='pesan';
			$data['mode']='GAGAL';//SUKSES GAGAL
			$data['isi']='Data Pelanggan Gagal Dihapus ';
			$data['go']='pelanggan/pelanggan';
		}
		$this->load->view('pelanggan/template',$data);
	}

	public function data_json($id){
		$this->login_kah();
		$data['detail_pesanan'] = $this->m_pelanggan->get_data_by_id('detail_pesanan','id_detail_pesanan',$id);
		echo json_encode($data['detail_pesanan']);
	}


}
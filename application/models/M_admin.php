<?php

class M_admin extends CI_model{

  function ambil_data($tabel,$primary=FALSE,$id = FALSE)
	{
		if($id===FALSE && $primary===FALSE){
			$query = $this->db->get($tabel);
				return $query->result_array();		
		} 
				$query = $this->db->get_where($tabel, array($primary => $id)); 
				return $query->row_array();	  
	}

	function ambil_data_where($tabel,$where,$identity)
	{
		$query = $this->db->get_where($tabel, array($where => $identity));  
		return $query->result_array();  
	}

	function ambil_data_wheres($tabel,$array_cari){
		$this->db->order_by('1', 'DESC');
		$query=$this->db->get_where($tabel,$array_cari);
		return $query->result_array();
	}

	function tambah_data($tabel,$data_lain=[],$get_last_id = false) //$file gasan memuat nama foto = array assoc
	{
		$data=$this->input->post(null,TRUE);  	//returns all POST items with XSS filter
		array_pop($data); //pototng arrray terakhir $data yaitu submit

		$key = array_keys($data);
		if(array_search('pass_adm',$key)){
			$password = $data['pass_adm'];
			$data['pass_adm'] = md5($data['pass_adm']);
		}
			$data_baru=array_merge($data,$data_lain);
			if($get_last_id){
				$this->db->insert($tabel, $data_baru);
				return $this->db->insert_id();
			}else{
				return $this->db->insert($tabel, $data_baru);
			}
	}

	function edit_data($tabel,$data_lain=[])
	{						
		$this->db->trans_start();		// untuk cek sukses update tidak							
		$data=$this->input->post(null,TRUE);  	//returns all POST items with XSS filter
		$primary=array_slice($data,0,1);	//ambil primary dan data paling kiri
		array_shift($data);		//Hapus primary, paling kiri
		array_pop($data);		//Hapus paling kanan (submit)

		$key = array_keys($data);
		if(array_search('pass_adm',$key)){
			$password = $data['pass_adm'];
				$data['pass_adm'] = md5($data['pass_adm']);
		}
			$data_baru=array_merge($data,$data_lain);

			// echo json_encode($data_baru);
			// exit;

			$this->db->where($primary);
			$this->db->update($tabel, $data_baru);
			$this->db->trans_complete();	// untuk cek sukses update tidak
			
		if ($this->db->trans_status() === FALSE)  // untuk cek sukses update tidak
			return(FALSE);
		else 
			return(TRUE);		    
	}

	function hapus_data($tabel,$kolom,$id)
	{
		$this->db->delete($tabel,array($kolom => $id));
		if (!$this->db->affected_rows())
		return(FALSE);
			else 
		return(TRUE);
	}

	public function get_data_by_id($tabel,$primary,$id){
		$query = $this->db->get_where($tabel, array($primary => $id));
		return $query->result();
	}

	function cek_login($tabel)
	{
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));

		// echo $password;
		$query=$this->db->get_where($tabel, array('email_adm'=>$email, 'pass_adm'=>$password));
		return $query->row_array();
	}

	public function update_nilai($tabel,$field,$data){
		$primary = $this->input->post('primary');
		$this->db->set($field,$data, FALSE);
		$this->db->where($primary);
		$this->db->update($tabel);
	}

	function pesanan($data_cari){ //data pesanan yang ada total tagihannya
		$this->db->select('pesanan.*, sum(detail_jasa.tarif)+tarif_ongkir as total');    
		$this->db->join('ongkir', 'ongkir.id_ongkir = pesanan.id_ongkir');
		$this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
		$this->db->join('detail_jasa', 'detail_jasa.id_detail_jasa = detail_pesanan.id_detail_jasa');
		$this->db->group_by("pesanan.id_pesanan");
		$query = $this->db->get_where('pesanan',$data_cari);
		return $query->result_array();
	}

	function ambil_jumlah_row($tabel){
		$query = $this->db->get($tabel);
		return $query->num_rows();
	}

	function data_pesanan_based_date($data_cari){
		// $sql="SELECT * FROM pesanan WHERE YEAR(waktu_pesan) = $tahun AND MONTH(waktu_pesan) = $bulan ";
		// return $this->db->query($sql)->result_array();

		$this->db->select('pesanan.*, sum(detail_jasa.tarif)+tarif_ongkir as total');    
		$this->db->join('ongkir', 'ongkir.id_ongkir = pesanan.id_ongkir');
		$this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
		$this->db->join('detail_jasa', 'detail_jasa.id_detail_jasa = detail_pesanan.id_detail_jasa');
		$this->db->group_by("pesanan.id_pesanan");
		$query = $this->db->get_where('pesanan',$data_cari);
		return $query->result_array();
	}

	public function get_data_deposit_byid($tabel,$primary,$id){
		$this->db->join('rekening_bank', 'rekening_bank.id_rek_bank = deposit_saldo.id_rek_bank');
		$query = $this->db->get_where($tabel, array($primary => $id));
		return $query->result();
	}

}
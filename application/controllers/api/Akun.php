<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Akun extends REST_Controller {

    function index_get(){

		$id_plg = $this->get('id_plg');

		if($id_plg===null){
            $this->response([
                'status' => FALSE,
                'message' => 'Id_plg nya kadada'
            ], REST_Controller::HTTP_NOT_FOUND);
        }else{
			$data_akun = $this->m_api->ambil_data('pelanggan','id_plg',$id_plg);
			$rwt_pesanan = count($this->m_api->ambil_data_where('pesanan','id_plg',$id_plg));
		}
		
		if($data_akun || $rwt_pesanan){
            $this->response([
                'status' => TRUE,
				'data_akun' => $data_akun,
				'transaksi' => $rwt_pesanan
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Data Tidak Ada'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

	function index_post()
	{

		$data_lain =[
			'apikey' => sha1(crypt(uniqid(), random_int(1000000, 9999999))),
		];	

		if($this->m_api->tambah_data('pelanggan',$data_lain)){
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

	function index_put(){

		// $data = $this->input->input_stream(null,TRUE);
		$data = $this->put();

		// $foto = $this->cek_foto('foto_plg');

		// if($foto){
		// 	$data_lain=[
		// 		'foto_plg' => $foto['foto_plg'],
		// 	];
		// }else{
		// 	$data_lain=[];
		// }
		
		
		if($this->m_api->edit_data('pelanggan',$data)){
			$this->response([
                'status' => TRUE,
                'message' => 'data pelanggan has been updated'
            ], REST_Controller::HTTP_OK);
		}else
		{	
			$this->response([
                'status' => FALSE,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
		}

    }
    

	function cek_foto($nama_foto){ //parameternya name file upload
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
			return FALSE;
		}
	}
}
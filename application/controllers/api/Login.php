<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller{

	function index_post(){
    
        if(isset($_POST['email'],$_POST['password'])){ // mencek name data post
            if($data_plg=$this->m_api->cek_login('pelanggan')){

                $rwt_pesanan = count($this->m_api->ambil_data_where('pesanan','id_plg',$data_plg['id_plg']));
                $data_plg['transaksi'] = $rwt_pesanan;
    
                $this->response([
                    'status' => 1,
                    'data_akun' => $data_plg,
                    'message' => 'Login Berhasil'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => 0,
                    'message' => 'Login Gagal'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response([
                'status' => 2,
                'message' => 'Data Post Salah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
}
?>

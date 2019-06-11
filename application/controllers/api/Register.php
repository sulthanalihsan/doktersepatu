<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Register extends REST_Controller{

	function index_post(){
    
        if(isset($_POST['nama_plg'],$_POST['email_plg'],$_POST['pass_plg'])){ // mencek name data post
            
            $cek = $this->m_api->ambil_data_where('pelanggan','email_plg',$_POST['email_plg']);
            
            if(empty($cek)){ //jika email belum terdaftar maka
                $_POST['pass_plg'] = md5($_POST['pass_plg']);
                if($this->m_api->tambah_data('pelanggan')){
                    $this->response([
                        'status' => 1,
                        'message' => 'Anda Berhasil Terdaftar'
                    ], REST_Controller::HTTP_CREATED);
                }else{
                    $this->response([
                        'status' => 0,
                        'message' => 'Gagal Terdaftar'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response([
                    'status' => 2,
                    'message' => 'Email sudah terdaftar'
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

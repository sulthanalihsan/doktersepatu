<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Registrasi extends REST_Controller
{

    public function index_post()
    {

        $nama_plg = $this->post('nama_plg');
        $nama_pgl_plg = $this->post('nama_pgl_plg');
        $email_plg = $this->post('email_plg');
        $pass_plg = $this->post('pass_plg');

        if (isset($nama_plg, $nama_pgl_plg, $email_plg, $pass_plg)) { // mencek name data post

            $cek = $this->m_api->ambil_data_where('pelanggan', 'email_plg', $email_plg);
            // echo json_encode($cek);
            // exit;

            if (empty($cek)) { //jika email belum terdaftar maka
                $_POST['pass_plg'] = md5($_POST['pass_plg']);
                $_POST['submit'] = " ";
                $id = $this->m_api->tambah_data('pelanggan', [], true);

                unset($_POST);
                $_POST['submit'] = " ";

                $data_tambah = [ //gasan data awal riwayat saldo
                    'id_plg' => $id,
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                    'type' => 'saldo awal',
                ];

                if ($this->m_api->tambah_data('riwayat_saldo', $data_tambah)) {
                    $this->response([
                        'status' => 1,
                        'message' => 'Anda Berhasil Terdaftar',
                    ], REST_Controller::HTTP_CREATED);
                } else {
                    $this->response([
                        'status' => 0,
                        'message' => 'Gagal Terdaftar',
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response([
                    'status' => 2,
                    'message' => 'Email sudah terdaftar',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }

        } else {
            $this->response([
                'status' => 2,
                'message' => 'Data Post Salah',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}

<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Akun extends REST_Controller
{

    public function index_get()
    {

        $id_plg = $this->get('id_plg');

        if ($id_plg === null) {
            $this->response([
                'status' => false,
                'message' => 'Id_plg nya kadada',
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $data_akun = $this->m_api->ambil_data('pelanggan', 'id_plg', $id_plg);
            $rwt_pesanan = count($this->m_api->ambil_data_where('pesanan', 'id_plg', $id_plg));
            $data_akun['transaksi'] = $rwt_pesanan;
        }

        if ($data_akun || $rwt_pesanan) {
            $this->response([
                'status' => true,
                'data_akun' => $data_akun,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Tidak Ada',
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

}

<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class RiwayatSaldo extends REST_Controller
{

    public function index_get()
    {
        $id_plg = $this->get('id_plg');

        if ($id_plg != null) {
            //ambil semua data
            $data_riwayat_saldo = $this->m_api->ambil_data_where('riwayat_saldo', 'id_plg', $id_plg);
            if ($data_riwayat_saldo != null) {
                $this->response([
                    'status' => 1,
                    'data_riwayat_saldo' => $data_riwayat_saldo,
                    'message' => 'Data Ada',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 0,
                    'message' => 'Data Tidak Ada',
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

}

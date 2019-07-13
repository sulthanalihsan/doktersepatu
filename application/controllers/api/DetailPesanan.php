<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class DetailPesanan extends REST_Controller
{

    public function index_get()
    {
        $id_pesanan = $this->get('id_pesanan');

        if ($id_pesanan != null) {
            $data_detail_pesanan = $this->m_api->ambil_data_where('detail_pesanan', 'id_pesanan', $id_pesanan);

            if ($data_detail_pesanan != null) {
                $this->response([
                    'status' => 1,
                    'data_detail_pesanan' => $data_detail_pesanan,
                    'message' => 'Data Ada',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 0,
                    'message' => 'Data Tidak Ada',
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Parameter Salah',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}

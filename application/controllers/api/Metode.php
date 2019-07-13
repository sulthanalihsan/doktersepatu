<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Metode extends REST_Controller
{

    public function index_get()
    {
        $data_metode_bayar = $this->m_api->ambil_data('metode_bayar');

        if ($data_metode_bayar != null) {
            //ambil semua data
            $this->response([
                'status' => 1,
                'data_metode_bayar' => $data_metode_bayar,
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

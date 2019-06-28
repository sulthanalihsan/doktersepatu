<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Jasa extends REST_Controller
{

    public function index_get()
    {
        $data_jasa_perawatan = $this->m_api->ambil_data_where('jasa', 'id_kategori', 1);
        $data_jasa_reparasi = $this->m_api->ambil_data_where('jasa', 'id_kategori', 2);
        $data_detail_jasa = $this->m_api->ambil_data('detail_jasa');

        if ($data_jasa_perawatan != null && $data_jasa_reparasi != null) {
            //ambil semua data
            $this->response([
                'status' => 1,
                'data_jasa_perawatan' => $data_jasa_perawatan,
                'data_jasa_reparasi' => $data_jasa_reparasi,
                'data_detail_jasa' => $data_detail_jasa,
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

<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rekening extends REST_Controller
{
    public function index_get()
    {

        $data_rekening = $this->m_api->ambil_data('rekening_bank');
        if ($data_rekening != null) {
            $this->response([
                'status' => 1,
                'data_rekening' => $data_rekening,
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

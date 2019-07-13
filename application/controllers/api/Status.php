<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Status extends REST_Controller
{

    public function index_get()
    {
        $data_status = $this->m_api->ambil_data('status');

        if ($data_status != null) {
            //ambil semua data
            $this->response([
                'status' => 1,
                'data_status' => $data_status,
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

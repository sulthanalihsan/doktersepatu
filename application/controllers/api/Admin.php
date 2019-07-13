<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller
{

    public function index_get()
    {
        //ambil semua data
        $admin = $this->m_api->ambil_data('admin');

        foreach ($admin as $key => $value) {
            unset($value[$key]['pass_adm']);
        }

        if ($admin != null) {
            $this->response([
                'status' => 1,
                'data_admin' => $admin,
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

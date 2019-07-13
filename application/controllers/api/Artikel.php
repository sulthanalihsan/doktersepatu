<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Artikel extends REST_Controller
{

    public function index_get()
    {
        //ambil semua data
        $artikel = $this->m_api->ambil_data('artikel');
        if ($artikel != null) {
            $this->response([
                'status' => 1,
                'data_artikel' => $artikel,
                'message' => 'Data Ada',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Data Tidak Ada',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function terbaru_get()
    {
        $artikel = $this->m_api->ambil_data_decrement('artikel', 'id_artikel', 5);
        if ($artikel != null) {
            $this->response([
                'status' => 1,
                'data_artikel' => $artikel,
                'message' => 'Data Ada',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Data Tidak Ada',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function favorit_get()
    {
        $artikel = $this->m_api->ambil_data_decrement('artikel', 'dilihat', 5);
        if ($artikel != null) {
            $this->response([
                'status' => 1,
                'data_artikel' => $artikel,
                'message' => 'Data Ada',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Data Tidak Ada',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function dilihat_post()
    {
        $id_artikel = $this->post('id_artikel');
        if ($id_artikel != null) {

            $data_lain = [
                'primary' => ['id_artikel' => $id_artikel],
            ];
            $_POST = $data_lain;

            if ($this->m_api->update_nilai('artikel', 'dilihat', 'dilihat+1')) {
                $this->response([
                    'status' => 1,
                    'message' => 'Dilihat berhasil ditambahkan',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 0,
                    'message' => 'Gagal ditambahkan',
                ], REST_Controller::HTTP_NOT_FOUND);
            }

        }
    }

}

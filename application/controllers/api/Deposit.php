<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Deposit extends REST_Controller
{

    public function index_get()
    {
        $id_plg = $this->get('id_plg');
        $id_deposit = $this->get('id_deposit');

        if ($id_deposit == null) {
            //ambil semua data
            $data_deposit = $this->m_api->ambil_data_where('deposit_saldo', 'id_plg', $id_plg);
            if ($data_deposit != null) {
                $this->response([
                    'status' => 1,
                    'data_deposit' => $data_deposit,
                    'message' => 'Data Ada',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 0,
                    'message' => 'Data Tidak Ada',
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            //ambil data detail
            $cari = [
                "id_plg" => $id_plg,
                "id_deposit" => $id_deposit,
            ];
            $data_deposit = $this->m_api->ambil_data_wheres('deposit_saldo', $cari);
            if ($data_deposit != null) {
                $this->response([
                    'status' => 1,
                    'data_deposit' => $data_deposit,
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

    public function index_post()
    {
        $id_plg = $this->post('id_plg');
        $jml_deposit = $this->post('jml_deposit');

        $data_kode_unik = $this->m_api->ambil_data_kode_unik();

        a:
        $kode_unik = rand(1, 999);
        $array_temp = [];
        foreach ($data_kode_unik as $anu) {
            $array_temp[] = $anu['total'];
        }

        $ttl_deposit = $jml_deposit + $kode_unik;

        if (in_array($ttl_deposit, $array_temp)) {
            goto a;
        }

        $data_lain = [
            'id_plg' => $id_plg,
            'jml_deposit' => $jml_deposit,
            'id_status' => 1,
            'waktu_deposit' => date("Y-m-d H:i:s"),
            'kode_unik' => $kode_unik,
        ];

        if ($this->m_api->tambah_data('deposit_saldo', $data_lain)) {
            $this->response([
                'status' => 1,
                'message' => 'Deposit Berhasil',
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Gagal Deposit',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function lastdeposit_get()
    {
        $id_plg = $this->get('id_plg');
        $data_deposit = $this->m_api->ambil_data_where('deposit_saldo', 'id_plg', $id_plg);
        if ($data_deposit != null) {
            $this->response([
                'status' => 1,
                'data_deposit' => $data_deposit[sizeOf($data_deposit) - 1], // ambil data paling terbaru / terakhir
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

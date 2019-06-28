<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pesanan extends REST_Controller
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

        $data_post = $this->input->post(null, true);

        $data_detail_jasa_tb = $this->m_pelanggan->ambil_data('detail_jasa');
        $data_ongkir = $this->m_pelanggan->ambil_data('ongkir');
        $id_plg = array_pop($data_post);

        $data_plg = $this->m_admin->ambil_data('pelanggan', 'id_plg', $id_plg);
        $saldo_plg = $data_plg['saldo_plg'];

        // array_shift($data_post);
        // array_pop($data_post);

        // echo json_encode($data_post);
        // exit;

        $jumlah_jasa = $this->m_pelanggan->ambil_jumlah_row('detail_jasa');
        $data_pesanan = array_slice($data_post, 0, $jumlah_jasa, true);
        $data_pesanan = array_diff($data_pesanan, array(0));
        $data_ket_pesanan = array_slice($data_post, $jumlah_jasa, sizeof($data_post), true);

        $acak = rand(01, 99);
        $id_pesanan = date('dmy') . "-" . date('His') . "-" . $acak;

        $data_lain = [
            'id_pesanan' => $id_pesanan,
            'id_plg' => $id_plg,
            'id_status' => "1",
            'waktu_pesan' => date("Y-m-d H:i:s"),
        ];

        /*
        $data_pesanan = tabel detail_pesanan di database, klue: data_pesanan berisi jasa yang dipilih pelanggan
        $data_ket_pesanan = tabel pesanan di database, klue: data_ket_pesanan berisi data keterangan pesanan spt alamat, metode-bayar dll
         */

        $data_ket_pesanan = array_merge($data_ket_pesanan, $data_lain);
        $key_pesanan = array_keys($data_pesanan); //key dari array assoc-nya data_pesanan jasa

        $array_detail_pesanan = [];
        //array detail pesanan adalah array yang akan mengisi tabel detail_pesanan
        //berisi data yang terdiri dari jenis jasa yang dipilih plg dengan jumlah yang ditentukan saat plg meinput

        for ($i = 0; $i < sizeof($key_pesanan); $i++) {
            for ($n = 0; $n < $data_pesanan[$key_pesanan[$i]]; $n++) {
                array_push($array_detail_pesanan, $this->add_array($id_pesanan, $key_pesanan[$i]));
            }
        }

        $ongkir = $data_ongkir[$data_ket_pesanan['id_ongkir'] - 1]['tarif_ongkir'];
        $total = 0;
        for ($i = 0; $i < sizeof($key_pesanan); $i++) { //mendapatkan data total pesanan gasan dikurangi saldo plgnya
            $total += $data_pesanan[$key_pesanan[$i]] * $data_detail_jasa_tb[$key_pesanan[$i] - 1]['tarif'];
        }

        $metode_bayar = $data_ket_pesanan['id_metode_bayar'];
        $total += $ongkir;
        $field = 'saldo_plg-' . $total;

        // area MENGURANGI saldo pelanggan
        unset($_POST);
        $data_lain = [
            'primary' => ['id_plg' => $id_plg],
        ];
        $_POST = $data_lain;
        if ($metode_bayar == 1) {
            $this->m_pelanggan->update_nilai('pelanggan', 'saldo_plg', 'saldo_plg-' . $total);
        }

        // $this->m_pelanggan->kurangi_saldo($field,$id_plg);
        // area MENGURANGI saldo pelanggan

        if ($this->m_pelanggan->tambah_data('pesanan', $data_ket_pesanan)) { //jika pesanan dibuat
            // area TAMBAH riwayat saldo
            unset($_POST);
            $data_lain = [
                'id_plg' => $id_plg,
                'id_transaksi' => $id_pesanan,
                'tgl_riwayat' => date("Y-m-d H:i:s"),
                'type' => 'kredit',
                'nominal' => $total,
                'saldo_awal' => $saldo_plg,
                'submit' => '',
            ];
            $_POST = $data_lain;
            $this->m_pelanggan->tambah_data('riwayat_saldo');
            // area TAMBAH riwayat saldo
        }

        if ($this->m_pelanggan->insert_banyak('detail_pesanan', $array_detail_pesanan)) {
            $this->response([
                'status' => 1,
                'message' => 'Berhasil Membuat Pesanan',
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => 0,
                'message' => 'Gagal Membuat Pesanan',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function add_array($id_pesanan, $yeah)
    {

        $array_temp = [
            'id_pesanan' => $id_pesanan,
            "id_detail_jasa" => $yeah,
            'id_status' => 1,
        ];

        return $array_temp;
    }

}

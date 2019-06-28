<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{

    public function login_kah()
    {
        if (!$this->session->has_userdata('email_plg')) {
            redirect(base_url());
        } else {
            return true;
        }

    }

    public function index($id = false)
    {
        $this->login_kah();
        $this->load->library('format_uang');
        $data['title'] = "Halaman Deposit Proses";
        $data['content'] = "pelanggan/deposit/index";
        $id_plg = $this->session->userdata('id_plg');

        $array_cari = [
            "id_plg" => $id_plg,
            "id_status" => 1,
        ];

        $data['data_deposit'] = $this->m_pelanggan->ambil_data_wheres('deposit_saldo', $array_cari);
        $data['data_rekening'] = $this->m_pelanggan->ambil_data('rekening_bank');

        $this->load->view('pelanggan/template', $data);
    }

    public function tambah()
    {
        $this->login_kah();
        $this->load->library('format_uang');
        $data['title'] = "Halaman Deposit Saldo";
        $data['content'] = "pelanggan/deposit/tambah";
        $data['data_rekening'] = $this->m_pelanggan->ambil_data('rekening_bank');

        $this->load->view('pelanggan/template', $data);
    }

    public function simpan()
    {
        $this->login_kah();
        $data['content'] = 'admin/deposit/tambah';
        $id_plg = $this->session->userdata('id_plg');
        $data_kode_unik = $this->m_pelanggan->ambil_data_kode_unik();

        a:
        $kode_unik = rand(1, 999);
        $array_temp = [];
        foreach ($data_kode_unik as $anu) {
            $array_temp[] = $anu['total'];
        }

        $this->form_validation->set_rules('jml_deposit', 'Jumlah Deposit', 'required');
        $this->form_validation->set_rules('id_rek_bank', 'Bank', 'required');

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $jml_deposit = $this->input->post('jml_deposit');
            $ttl_deposit = $jml_deposit + $kode_unik;

            if (in_array($ttl_deposit, $array_temp)) {
                goto a;
            }

            $data_lain = [
                'id_plg' => $id_plg,
                'id_status' => 1,
                'waktu_deposit' => date("Y-m-d H:i:s"),
                'kode_unik' => $kode_unik,
            ];

            if ($this->m_pelanggan->tambah_data('deposit_saldo', $data_lain)) {
                $data['content'] = "pesan";
                $data['page'] = 'pesan';
                $data['mode'] = 'SUKSES'; //SUKSES GAGAL
                $data['isi'] = 'Deposit Berhasil Silahkan Lakukan Pembayaran';
                $data['go'] = 'pelanggan/deposit';
            } else {
                $data['content'] = "pesan";
                $data['page'] = 'pesan';
                $data['mode'] = 'GAGAL'; //SUKSES GAGAL
                $data['isi'] = 'Deposit Gagal ';
                $data['go'] = 'pelanggan/deposit';
            }

            $this->load->view('pelanggan/template', $data);

        }
    }

    public function hapus($id)
    {
        $this->login_kah();
        $data['content'] = "pesan";
        if ($this->m_pelanggan->hapus_data('deposit_saldo', 'id_deposit', $id)) {
            $data['page'] = 'pesan';
            $data['mode'] = 'SUKSES'; //SUKSES GAGAL
            $data['isi'] = 'Data deposit Berhasil Dihapus';
            $data['go'] = 'pelanggan/deposit';
        } else {
            $data['page'] = 'pesan';
            $data['mode'] = 'GAGAL'; //SUKSES GAGAL
            $data['isi'] = 'Data deposit Gagal Dihapus ';
            $data['go'] = 'pelanggan/deposit';
        }
        $this->load->view('pelanggan/template', $data);
    }

    public function data_json($id)
    {
        $this->login_kah();
        $data['deposit'] = $this->m_pelanggan->get_data_deposit_byid('deposit_saldo', 'id_deposit', $id);
        echo json_encode($data['deposit']);
    }

}

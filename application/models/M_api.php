<?php

class M_api extends CI_model
{
    public function ambil_data($tabel, $primary = false, $id = false)
    {
        if ($id === false && $primary === false) {
            $query = $this->db->get($tabel);
            return $query->result_array();
        }
        $query = $this->db->get_where($tabel, array($primary => $id));
        // return $query->result();
        return $query->row_array();
    }

    public function ambil_data_where($tabel, $where, $identity)
    {
        $query = $this->db->get_where($tabel, array($where => $identity));
        return $query->result_array();
    }

    public function ambil_data_wheres($tabel, $array_cari)
    {
        $this->db->order_by('1', 'DESC');
        $query = $this->db->get_where($tabel, $array_cari);
        return $query->result_array();
    }

    public function tambah_data($tabel, $data_lain = [], $get_last_id = false) //$file gasan memuat nama foto = array assoc

    {
        $data = $this->input->post(null, true); //returns all POST items with XSS filter
        array_pop($data); //pototng arrray terakhir $data yaitu submit

        $key = array_keys($data);
        if (array_search('pass_adm', $key)) {
            $password = $data['pass_adm'];
            $data['pass_adm'] = md5($data['pass_adm']);
        }
        $data_baru = array_merge($data, $data_lain);
        if ($get_last_id) {
            $this->db->insert($tabel, $data_baru);
            return $this->db->insert_id();
        } else {
            return $this->db->insert($tabel, $data_baru);
        }
    }

    public function edit_data($tabel, $data = []) //paling kiri itu harus id nya, paling kanan harus apikeynya

    {
        // $this->db->trans_start();        // untuk cek sukses update tidak
        $primary = array_slice($data, 0, 1); //ambil primary dan data paling kiri
        array_shift($data); //Hapus primary, paling kiri
        array_pop($data); //Hapus paing kanan (apikey)

        $key = array_keys($data);
        if (array_search('pass_adm', $key)) {
            $password = $data['pass_adm'];
            $data['pass_adm'] = md5($data['pass_adm']);
        }
        // $data=array_merge($data,$data_lain);
        $this->db->where($primary);
        $this->db->update($tabel, $data);
        return $this->db->affected_rows();
        // $this->db->trans_complete();

        // if ($this->db->trans_status() === FALSE)  // untuk cek sukses update tidak
        //     return(FALSE);
        // else
        //     return(TRUE);
    }

    public function hapus_data($tabel, $kolom, $id)
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows()) {
            return (false);
        } else {
            return (true);
        }

    }

    public function get_data_by_id($tabel, $primary, $id)
    {
        $query = $this->db->get_where($tabel, array($primary => $id));
        return $query->result();
    }

    public function get_data_deposit_byid($tabel, $primary, $id)
    {
        $this->db->join('rekening_bank', 'rekening_bank.id_rek_bank = deposit_saldo.id_rek_bank');
        $query = $this->db->get_where($tabel, array($primary => $id));
        return $query->result();
    }

    public function cek_login($tabel)
    {
        $email = $this->input->post('email_plg');
        $password = md5($this->input->post('pass_plg'));

        // echo $password;
        $query = $this->db->get_where($tabel, array('email_plg' => $email, 'pass_plg' => $password));
        return $query->row_array();
    }

    public function ambil_data_decrement($tabel, $primary, $limit)
    {
        $this->db->from($tabel);
        $this->db->order_by($primary, "desc");
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function ambil_data_kode_unik()
    {
        $sql = "SELECT jml_deposit,kode_unik, jml_deposit+kode_unik as total FROM deposit_saldo WHERE id_status = 1";
        return $this->db->query($sql)->result_array();
    }

    public function ambil_jumlah_row($tabel)
    {
        $query = $this->db->get($tabel);
        return $query->num_rows();
    }

    public function insert_banyak($table, $array)
    {
        $this->db->insert_batch($table, $array);
        if (!$this->db->affected_rows()) {
            return (false);
        } else {
            return (true);
        }

    }

    public function kurangi_saldo($data, $id)
    {
        $this->db->set('saldo_plg', $data, false);
        $this->db->where('id_plg', $id);
        $this->db->update('pelanggan');
    }

    public function total_pesanan($id_plg)
    { //data pesanan yang ada total tagihannya
        $this->db->select('pesanan.*, sum(detail_jasa.tarif)+tarif_ongkir as total');
        $this->db->join('ongkir', 'ongkir.id_ongkir = pesanan.id_ongkir');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
        $this->db->join('detail_jasa', 'detail_jasa.id_detail_jasa = detail_pesanan.id_detail_jasa');
        $this->db->group_by("pesanan.id_pesanan");
        $query = $this->db->get_where('pesanan', array('id_plg' => $id_plg));
        return $query->result_array();
    }

    public function total_tarif_pesanan($id_pesanan)
    {
        $this->db->select('SUM(detail_jasa.tarif)+ongkir.tarif_ongkir AS total');
        $this->db->join('ongkir', 'ongkir.id_ongkir = pesanan.id_ongkir');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
        $this->db->join('detail_jasa', 'detail_jasa.id_detail_jasa = detail_pesanan.id_detail_jasa');
        $query = $this->db->get_where('pesanan', array('pesanan.id_pesanan' => $id_pesanan));
        return $query->result_array();
    }

    public function update_nilai($tabel, $field, $data)
    {
        $primary = $this->input->post('primary');
        $this->db->set($field, $data, false);
        $this->db->where($primary);
        $this->db->update($tabel);
        if (!$this->db->affected_rows()) {
            return (false);
        } else {
            return (true);
        }

    }
}

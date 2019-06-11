<?php

class M_deposit extends CI_model{

    function ubah_status_deposit($jumlah_saldo){

        $sql = "update deposit_saldo
        SET id_status = 4
        WHERE id_deposit in (SELECT id_deposit FROM (SELECT * from deposit_saldo) AS depo
        WHERE (jml_deposit+kode_unik) = $jumlah_saldo)";

        return $this->db->query($sql);

    }

}
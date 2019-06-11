<?php

class Ambil_data{
    
    function data_tb_lain($tb_lain,$tb_sekarang,$field_tb_lain){
        return $tb_lain[$tb_sekarang-1][$field_tb_lain];
      }

      // usage : <?= $this->ambil_data->data_tb_lain($data_status,$data_pesanan_tb['id_status'],'nama_status');

    function ambil_by_kata($string, $word_count = 10) {
        $string = explode(' ', $string);
        if (empty($string) == false) {
            $string = array_chunk($string, $word_count);
            $string = $string[0];
        }
        $string = implode(' ', $string);
        return $string;
      }
      

}
<?php

class Convert_tanggal{

    public $bulan = [
        'Januari' => '01',
        'Februari' => '02',
        'Maret' => '03',
        'April' => '04',
        'Mei' => '05',
        'Juni' => '06',
        'Juli' => '07',
        'Agustus' => '08',
        'September' => '09',
        'Oktober' => '10',
        'November' => '11',
        'Desember' => '12'
    ];
    
    function getValue($tanggal){
        $tanggal = explode(" ",$tanggal);
		$temp = $tanggal[0];
		$tanggal[0] = $tanggal[2];
		$tanggal[2] = $temp;
		$tanggal[1] = "-".$this->bulan[$tanggal[1]]."-";
		$tanggal[3] = " ".$tanggal[3];

        $tanggal = implode("",$tanggal);
        return $tanggal;
    }

    function getStr($tanggal){
		$tanggal = explode("-",$tanggal);
		$temp=$tanggal[2];
		unset($tanggal[2]);

		$tanggal = array_merge($tanggal,explode(" ",$temp));
		$temp=$tanggal[2];
		$tanggal[2] = $tanggal[0];
		$tanggal[0]=$temp;

		$tanggal[1] = array_keys($this->bulan,$tanggal[1])[0];
        $tanggal = implode(" ",$tanggal);
        
        return $tanggal;
    }
}
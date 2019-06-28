<?php


DEFINE('HOST','localhost');
DEFINE('USER','root');
DEFINE('PASS','');
DEFINE('DB','doktersepatu');

$conn = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect');



// $query = "update deposit_saldo
// SET id_status = 4
// WHERE id_deposit in (SELECT id_deposit FROM (SELECT * from deposit_saldo) AS depo
// WHERE (jml_deposit+kode_unik) = 10050)";
// $sql = mysqli_query($conn,$query);

// while($data = mysqli_fetch_array($sql)){
//     echo $data['nama_plg'];
// }
// exit;

$config = array(
    "cekmutasi_api_signature" => "38b8a46a95bb04e3bf3f8e9ae99f0d1d4b71e995"
);

$incomingApiSignature = isset($_SERVER['HTTP_API_SIGNATURE']) ? $_SERVER['HTTP_API_SIGNATURE'] : null;

if( !hash_equals($config['cekmutasi_api_signature'], $incomingApiSignature) ) {
    exit("Invalid Signature");
}

$post = file_get_contents("php://input");
$json = json_decode($post);

if( json_last_error() !== JSON_ERROR_NONE ) {
    exit("Invalid JSON");
}

if( $json->action == "payment_report" )
{
    foreach( $json->content->data as $data )
    {
        # Waktu transaksi dalam format unix timestamp
        $time = $data->unix_timestamp;

        # Tipe transaksi : credit / debit
        $type = $data->type;

        # Jumlah (2 desimal) : 50000.00
        $amount = $data->amount;

        # Berita transfer
        $description = $data->description;

        # Saldo rekening (2 desimal) : 1500000.00
        $balance = $data->balance;
        
        // if( $type == "credit" )
        // {
        //     $sql = "SELECT * FROM tabel_invoice WHERE jumlah_tagihan = '".$conn->real_escape_string($amount)."' AND status = 'UNPAID' ORDER BY id ASC LIMIT 1";
        //     if( ($exec = $conn->query($sql)) )
        //     {
        //         while( $row = $conn->fetch_object($exec) )
        //         {
        //             // Invoice dengan nominal ini ditemukan, lanjutkan proses
        //         }
        //     }
        // }

        if( $type == "credit" )
        {
            $sql = "update deposit_saldo
            SET id_status = 4
            WHERE id_deposit in (SELECT id_deposit FROM (SELECT * from deposit_saldo) AS depo
            WHERE (jml_deposit+kode_unik) = $conn->real_escape_string($amount))";
            if( ($exec = $conn->query($sql)) )
            {
                while( $row = $conn->fetch_object($exec) )
                {
                    // Invoice dengan nominal ini ditemukan, lanjutkan proses
                }
            }
        }

    }
}
?>
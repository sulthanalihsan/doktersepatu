<?php
$total = [];
$bulan = array_keys($convert->bulan)[$_POST['filter_bulan'] - 1];
$tahun = $_POST['filter_tahun'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan Pesanan Bulan <?=$bulan?> Dokter Sepatu</title>

  <!-- <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet"> -->

  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->

  <!-- DATE TIME PICKER-->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="<?=base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <!-- <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script> -->
  <style>
  .table-hover tr {
        cursor: pointer;
    }
  </style>
</head>


<body id="page-top">
      <h4 class="font-weight-bold text-primary text-center" style="margin-top:40px">Laporan Pesanan Dokter Sepatu</h4>
      <h4 class="m-10 font-weight-bold text-primary text-center">Bulan <?=$bulan?> Tahun <?=$tahun?></h4>
      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>ID. Pesanan</th>
            <th>Nama Pemesan</th>
            <th>Total Pesanan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;foreach ($data_pesanan as $pesanan): ?>
          <tr class="pesanan" id="<?=$pesanan['id_pesanan'];?>">
            <?php array_push($total, $pesanan['total']);?>
            <td><?=$i;?></td>
            <td>
            <?=returnDate($pesanan['waktu_pesan']);?>
            </td>
            <td><?=$pesanan['id_pesanan'];?></td>
            <td><?=$data_plg[cariDataPlg($pesanan['id_plg'],$data_plg)]['nama_plg'];?></td>
            <td><?=$this->format_uang->rupiah_aja($pesanan['total']);?></td>
          </tr>
          <?php $i++;endforeach;?>
          <tr class="bg-gray-300 text-center">
            <th colspan=4>Total Pemasukan Bulan <?=$bulan?></th>
            <th colspan=1 class="text-left"><?=$this->format_uang->rupiah_aja(array_sum($total));?></th>
          </tr>
          <caption class="text-right">Jumlah Pesanan Bulan <?=$bulan . " " . $tahun?> : <?=$i - 1;?> Pesanan</caption>
        </tbody>
      </table>

</body>
<script>
window.load = print_d();
function print_d(){
  window.print();
}
</script>
</html>

<?php
function returnDate($tanggal)
{
    $hari = new DateTime($tanggal);
    $hari = $hari->format('D');
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    $date = new DateTime($tanggal);
    echo $hari_ini . ", " . $date->format('d-m-Y');

}

function cariDataPlg($id_plg, $data_plg)
{
    $index;
    for ($i = 0; $i < sizeof($data_plg); $i++) {
        if ($id_plg == $data_plg[$i]["id_plg"]) {
            $index = $i;
        }
    }
    return $index;
}
// echo date()
?>
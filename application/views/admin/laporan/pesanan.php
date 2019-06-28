<?php
// echo json_encode($data_pesanan);
// exit;
?>

  <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <?=json_encode($data_plg[0]['nama_plg']);?> -->
  <h1 class="h3 mb-2 text-gray-800"><?=$title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pesanan</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h5 class="text-center text-gray-700">Pilih Filter Laporan Pesanan</h5>
          <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="form-group">
              <select name="filter_bulan" id="filter_bulan" class="form-control" required>
              <option value="">Select Bulan</option>
              <option value="1" <?=cekValueBulan(1);?>>Januari</option>
              <option value="2" <?=cekValueBulan(2);?>>Februari</option>
              <option value="3" <?=cekValueBulan(3);?>>Maret</option>
              <option value="4" <?=cekValueBulan(4);?>>April</option>
              <option value="5" <?=cekValueBulan(5);?>>Mei</option>
              <option value="6" <?=cekValueBulan(6);?>>Juni</option>
              <option value="7" <?=cekValueBulan(7);?>>Juli</option>
              <option value="8" <?=cekValueBulan(8);?>>Agustus</option>
              <option value="9" <?=cekValueBulan(9);?>>September</option>
              <option value="10" <?=cekValueBulan(10);?>>Oktober</option>
              <option value="11" <?=cekValueBulan(11);?>>November</option>
              <option value="12" <?=cekValueBulan(12);?>>Desember</option>
              </select>
            </div>
            <div class="form-group">
              <select name="filter_tahun" id="filter_tahun" class="form-control" required>
              <option value="">Select Tahun</option>
              <option value="2019" <?=cekValueTahun(2019);?> >2019</option>
              </select>
            </div>
            <div class="form-group" align="center">
              <button type="submit" name="filter" id="filter" class="btn btn-info">Filter</button>
            </div>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
      <?php if (!empty($_POST)): ?>
      <?=form_open_multipart('admin/laporan/print_pesanan', 'target=_blank');?>
      <?=form_hidden('filter_bulan', $_POST['filter_bulan']);?>
      <?=form_hidden('filter_tahun', $_POST['filter_tahun']);?>
      <?=form_button(['name' => 'submit', 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm', 'type' => 'submit', 'content' => '<i class="fas fa-download fa-sm text-white-50"></i> Print Laporan']);?>
      <?=form_close();?>
      <table class="table table-bordered table-hover" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Pemesan</th>
            <th>Waktu Jemput</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1;foreach ($data_pesanan as $pesanan): ?>
          <tr class="pesanan" id="<?=$pesanan['id_pesanan'];?>">
            <td><?=$i;?></td>
            <td><?=$pesanan['id_pesanan'];?></td>
            <td><?=$data_plg[cariDataPlg($pesanan['id_plg'], $data_plg)]['nama_plg'];?></td>
            <td><?=$pesanan['waktu_jemput'];?></td>
            <td><?=$data_metode[$pesanan['id_metode_bayar'] - 1]['nama_metode'];?></td>
            <td>
              <span class="badge
                <?php switch ($pesanan['id_status']) {
    case '1':
        echo "badge-warning";
        break;
    case '2':
        echo "badge-success";
        break;
    case '3':
        echo "badge-primary";
        break;
    default:
        echo "badge-primary";
        break;
}?>">
                <?=$data_status[$pesanan['id_status'] - 1]['nama_status']?>
              </span>
            </td>
            <td><?=$this->format_uang->rupiah_aja($pesanan['total']);?></td>
          </tr>
          <?php $i++;endforeach;?>
        </tbody>
      </table>
      <?php endif;?>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

<?php
function cekValueBulan($value)
{
    if (!empty($_POST)) {
        if ($_POST['filter_bulan'] == $value) {
            return "selected";
        } else {
            return " ";
        }
    } else if (date('n') == $value) {
        return "selected";
    } else {
        return " ";
    }
}

function cekValueTahun($value)
{
    if (!empty($_POST)) {
        if ($_POST['filter_tahun'] == $value) {
            return "selected";
        } else {
            return " ";
        }
    } else if (date('Y') == $value) {
        return "selected";
    } else {
        return " ";
    }
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

?>
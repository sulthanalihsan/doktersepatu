<?php
// echo json_encode($data_pesanan);
// exit;
?>

  <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <?= json_encode($data_plg[0]['nama_plg']);?> -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pesanan</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
          <?php $i=1; foreach($data_pesanan as $pesanan):?>
          <tr class="pesanan" id="<?= $pesanan['id_pesanan'];?>">
            <td><?= $i;?></td>
            <td><?= $pesanan['id_pesanan'];?></td>
            <td><?= $data_plg[$pesanan['id_plg']-1]['nama_plg'];?></td>
            <td><?= $pesanan['waktu_jemput'];?></td>
            <td><?= $data_metode[$pesanan['id_metode_bayar']-1]['nama_metode'];?></td>
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
                <?= $data_status[$pesanan['id_status']-1]['nama_status']?>
              </span>
            </td>
            <td><?= $this->format_uang->rupiah_aja($pesanan['total']);?></td>
          </tr>
          <?php $i++; endforeach;?>
        </tbody>
      </table>
    </div>
  </div>


</div>
<!-- /.container-fluid -->



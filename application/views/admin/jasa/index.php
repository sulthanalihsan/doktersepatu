          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Jasa</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a style ="text-decoration:none" href="<?= base_url()?>admin/jasa/tambah">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Tambah Data</span></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Jasa</th>
              <th>Nama Jasa</th>
              <th>Tarif Jasa</th>
              <th>Deskripsi</th>
              <!-- <th>Foto</th> -->
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Jasa</th>
              <th>Nama Jasa</th>
              <th>Tarif Jasa</th>
              <th>Deskripsi</th>
              <!-- <th>Foto</th> -->
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_detail_jasa as $detail_jasa): ?>
            <tr>
              <td><?= $detail_jasa['id_detail_jasa']?></td>
              <td><?= $data_jasa[ambilIndexData($detail_jasa['id_jasa'],$data_jasa)]['nama_jasa']?></td>
              <td><?= $detail_jasa['nama_detail_jasa']?></td>
              <td><?= $this->format_uang->rupiah_aja($detail_jasa['tarif']);?></td>
              <td><?= $detail_jasa['deskripsi']?></td>
              <!-- <td><?= $detail_jasa['nama_detail_jasa']?></td> -->
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
function ambilIndexData($id, $data)
{
    $index;
    for ($i = 0; $i < sizeof($data); $i++) {
        if ($id == $data[$i]["id_jasa"]) {
            $index = $i;
        }
    }
    return $index;
}

?>



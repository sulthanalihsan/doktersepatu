          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?=$title;?></h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a style ="text-decoration:none" href="<?=base_url()?>admin/deposit/tambah">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Tambah Data</span></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Pelanggan</th>
              <th>Waktu Deposit</th>
              <th>Jumlah Deposit</th>
              <th>Kode Unik</th>
              <th>Jumlah</th>
              <th>Status</th>
              <!-- <th>Aksi</th> -->
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Pelanggan</th>
              <th>Waktu Deposit</th>
              <th>Jumlah Deposit</th>
              <th>Kode Unik</th>
              <th>Jumlah</th>
              <th>Status</th>
              <!-- <th>Aksi</th> -->
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_deposit as $deposit): ?>
            <tr class="confirm-deposit" id="<?=$deposit['id_deposit'];?>">
              <td><?=$deposit['id_deposit'];?></td>
              <td><?=$deposit['id_plg'] . '-' . $this->ambil_data->data_tb_lain($data_plg, cariDataPlg($deposit['id_plg'], $data_plg) + 1, 'nama_plg');?></td>
              <td><?=$deposit['waktu_deposit'];?></td>
              <td><?=$this->format_uang->rupiah($deposit['jml_deposit']);?></td>
              <td><?=$deposit['kode_unik'];?></td>
              <td><?=($this->format_uang->rupiah($deposit['jml_deposit'] + $deposit['kode_unik']));?></td>
              <td>
                  <span class="badge badge-<?=($deposit['id_status'] == 1) ? "warning" : "success";?>">
                    <?=$this->ambil_data->data_tb_lain($data_status, $deposit['id_status'], 'nama_status');?>
                  </span>
              </td>
              <!-- <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <a class="btn btn-secondar btn-warning btn-circle btn-md" href="<?php echo base_url('admin/deposit/edit/') . $deposit['id_deposit']; ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-secondar btn-danger btn-circle btn-md" href="<?php echo base_url('admin/deposit/hapus/') . $deposit['id_deposit']; ?>" onclick = "return confirm('Yakin akan hapus deposit ke-<?=$deposit['id_deposit']?> ?');" >
                        <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </div>
              </td> -->
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
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


          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a style ="text-decoration:none" href="<?= base_url()?>admin/artikel/tambah">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Tambah Data</span></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Penulis</th>
              <th>Judul</th>
              <th>Tanggal Dibuat</th>
              <th>Isi Artikel</th>
              <th>Foto Header</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Penulis</th>
              <th>Judul</th>
              <th>Tanggal Dibuat</th>
              <th>Isi Artikel</th>
              <th>Foto Header</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_artikel as $artikel): ?>
            <tr>
              <td><?php echo $artikel['id_artikel']; ?></td>
              <td><?= $this->ambil_data->data_tb_lain($data_admin,$artikel['id_adm'],'nama_adm');?></td>
              <td><?php echo $artikel['judul_artikel']; ?></td>
              <td><?php echo $artikel['tgl_artikel']; ?></td>
              <td><?php echo trim_by_words($artikel['isi_artikel']); ?></td>
              <td>
                <img width=75 src="<?= base_url('uploads/foto-artikel/').$artikel['foto_header'];?> ">
              </td>
              <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <a class="btn btn-secondar btn-primary btn-circle btn-md view-detail-artikel" id="<?= $artikel['id_artikel']; ?>" href="#">
                      <i class="fas fa-info-circle"></i>
                    <a class="btn btn-secondar btn-warning btn-circle btn-md" href="<?php echo base_url('admin/artikel/edit/').$artikel['id_artikel'];?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-secondar btn-danger btn-circle btn-md" href="<?php echo base_url('admin/artikel/hapus/').$artikel['id_artikel']; ?>" onclick = "return confirm('Yakin akan hapus artikel ke-<?= $artikel['id_artikel'] ?> ?');" >
                        <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


<div class="modal fade" id="detail_artikel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Preview Artikel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="judul_artikel"></div>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<?php
function trim_by_words($string, $word_count = 10) {
  $string = explode(' ', $string);
  if (empty($string) == false) {
      $string = array_chunk($string, $word_count);
      $string = $string[0];
  }
  $string = implode(' ', $string);
  return $string;
}

?>
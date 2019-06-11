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
              <th>Kategori</th>
              <th>Nama Jasa</th>
              <th>Tarif Jasa</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Kategori</th>
              <th>Nama Jasa</th>
              <th>Tarif Jasa</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_jasa as $jasa): ?>
            <tr>
              <td><?php echo $jasa['id_jasa']; ?></td>
              <td><?php echo $data_kategori[$jasa['id_kategori']-1]['nama_kategori']; ?></td>
              <td><?php echo $jasa['nama_jasa']; ?></td>
              <td><?php echo $jasa['tarif_jasa']; ?></td>
              <td><?php echo $jasa['desk_jasa']; ?></td>
              <td>
                <img width=75 src="<?= base_url('uploads/foto-jasa/').$jasa['foto_jasa'];?> ">
              </td>
              <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <a class="btn btn-secondar btn-warning btn-circle btn-md" href="<?php echo base_url('admin/jasa/edit/').$jasa['id_jasa'];?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-secondar btn-danger btn-circle btn-md" href="<?php echo base_url('admin/jasa/hapus/').$jasa['id_jasa']; ?>" onclick = "return confirm('Yakin akan hapus <?= $jasa['nama_jasa'] ?> ?');" >
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



?>
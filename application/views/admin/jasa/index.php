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
            
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->




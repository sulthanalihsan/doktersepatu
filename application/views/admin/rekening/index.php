          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Rekening Bank</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a style ="text-decoration:none" href="<?= base_url()?>admin/rekening/tambah">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Tambah Data</span></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Bank</th>
              <th>Atas Nama</th>
              <th>No Rekening</th>
              <th>Logo</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nama Bank</th>
              <th>Atas Nama</th>
              <th>No Rekening</th>
              <th>Logo</th>
              <th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_rekening as $rekening): ?>
            <tr>
              <td><?= $rekening['id_rek_bank']; ?></td>
              <td><?= $rekening['nama_bank']; ?></td>
              <td><?= $rekening['atas_nama_rek']; ?></td>
              <td><?= $rekening['no_rek']; ?></td>
              <td><img src="<?= base_url('uploads/logo-bank/'.$rekening['logo_bank'])?>" class="img-fluid" width="100"></td>
              <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <a class="btn btn-secondar btn-warning btn-circle btn-md" href="<?= base_url('admin/rekening/edit/').$rekening['id_rek_bank'];?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-secondar btn-danger btn-circle btn-md" href="<?= base_url('admin/rekening/hapus/').$rekening['id_rek_bank']; ?>" 
                    onclick = "return confirm('Yakin akan hapus rekening id ke-<?= $rekening['id_rek_bank'] ?> ?');" >
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
          <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a style ="text-decoration:none" href="<?= base_url()?>admin/pelanggan/tambah">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Tambah Data</span></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Nama</th>
              <th>JK</th>
              <th>No.HP</th>
              <th>Saldo</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Nama</th>
              <th>JK</th>
              <th>No.HP</th>
              <th>Saldo</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($data_plg as $plg): ?>
            <tr>
              <td><?php echo $plg['id_plg']; ?></td>
              <td><?php echo $plg['username_plg']; ?></td>
              <td><?php echo $plg['email_plg']; ?></td>
              <td><?php echo $plg['nama_plg']; ?></td>
              <td><?php echo $plg['jk_plg']; ?></td>
              <td><?php echo $plg['nohp_plg']; ?></td>
              <td><?php echo $plg['saldo_plg']; ?></td>
              <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <a class="btn btn-secondar btn-primary btn-circle btn-md view-detail-pelanggan" id="<?= $plg['id_plg']; ?>" href="#">
                      <i class="fas fa-info-circle"></i>
                    <a class="btn btn-secondar btn-warning btn-circle btn-md" href="<?php echo base_url('admin/pelanggan/edit/').$plg['id_plg'];?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-secondar btn-danger btn-circle btn-md" href="<?php echo base_url('admin/pelanggan/hapus/').$plg['id_plg']; ?>" onclick = "return confirm('Yakin akan hapus <?= $plg['nama_plg'] ?> ?');" >
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

<div class="modal fade" id="detail_keluarga">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detail Data Pelanggan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-12">
              <div class="card">
                <div class="foto_plg"></div>
                <div class="card-body text-center">
                  <h5 class="card-title text-center">Transaksi Pelanggan</h5>
                  <table class="table text-left">
                  <tr><td>Saldo</td><td>:</td><td class="saldo_plg"></td></tr>
                  <tr><td>Riwayat Pesanan</td><td>:</td></td><td>24</td></tr>
                  </table>

                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                  <a href="#" class="btn btn-secondar btn-info card-link ">Riwayat Transaksi</a>
                  <a href="#" class="btn btn-secondar btn-success card-link ">Riwayat Deposit</a>
                      
                  </div>
                  <!-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item text-center">
                    </li>
                  </ul> -->
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-12">
              <div class="px-1 py-2 bg-gradient-success text-white text-center">Profil Pelanggan</div>
              <table class="table table-bordered">
                <tr><td>Id Pelanggan </td><td>:</td> </td><td class="id_plg"></td></tr>
                <tr><td>Nama </td><td>:</td> </td><td class="nama_plg"></td></tr>
                <tr><td>Jenis Kelamin </td><td>:</td> </td><td class="jk_plg"></td></tr>
                <tr><td>No Hp </td><td>:</td> </td><td class="nohp_plg"></td></tr>
                <tr><td>TL </td><td>:</td> </td><td class="tgllhr_plg"></td></tr>
                <tr><td>Alamat </td><td>:</td> </td><td class="alamat_plg"></td></tr>
              </table>
              <div class="px-1 py-2 bg-gradient-info text-white text-center">Akun Pelanggan</div>
              <table class="table table-bordered">
                <tr><td>Email </td><td>:</td> </td><td class="email_plg"></td></tr>
                <tr><td>Username </td><td>:</td> </td><td class="username_plg"></td></tr>
                <tr><td>Apikey </td><td>:</td> </td><td class="apikey_plg"></td></tr>
              </table>
            </div>
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

          <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title;?></h1>
  <p class="mb-4"></a></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4">
          <img height="250" src="<?= base_url('uploads/foto-plg/').$data_akun['foto_plg'];?>" class="rounded mx-auto d-block">
        </div>
        <div class="col-lg-6">
          <div class="text-gray-900" style="margin-bottom:20px">
            <h3 class="h3 mb-2">
              <?= $data_akun['nama_plg']?>
            </h3>
          </div>
          <div class="text-gray-900" style="margin-bottom:30px">
            <h5 class="h5 mb-2">
            Saldo: <?= $this->format_uang->rupiah_aja($data_akun['saldo_plg']);?>
            </h5>
          </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="transaksi-tab" data-toggle="tab" href="#transaksi" role="tab" aria-controls="transaksi" aria-selected="false">Transaksi</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
              <table class="table table-borderless">
                <tr>
                  <td>Nama</td><td><?= $data_akun['nama_plg'];?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamain</td><td><?= $data_akun['jk_plg'];?></td>
                </tr>
                <tr>
                  <td>Email</td><td><?= $data_akun['email_plg'];?></td>
                </tr>
                <tr>
                  <td>No Handphone</td><td><?= $data_akun['nohp_plg'];?></td>
                </tr>
                <tr>
                  <td>Alamat</td><td><?= $data_akun['alamat_plg'];?></td>
                </tr>
              </table>
            </div>

            <div class="tab-pane fade" id="transaksi" role="tabpanel" aria-labelledby="transaksi-tab">
              <table class="table table-borderless">
                <tr>
                  <td>Saldo</td><td><?= $this->format_uang->rupiah_aja($data_akun['saldo_plg']);?></td>
                </tr>
                <tr>
                  <td>Riwayat Pemesanan</td><td><?= $rwt_pesanan;?>x</td>
                </tr>
                <tr>
                  <td>Point</td><td><span class="badge badge-warning">Next Feature</span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <a href="<?= base_url('pelanggan/akun/edit/').$data_akun['id_plg'];?>" class="btn btn-success mx-auto">Edit Profil</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->


<!-- 
<div class="card-body">
      
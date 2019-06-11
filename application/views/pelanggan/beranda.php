        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= base_url('pelanggan/deposit/tambah');?>" style="text-decoration:none">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Deposit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?= $this->format_uang->rupiah_aja($data_plg[0]['saldo_plg']);?>
                            </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration:none">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Riwayat Pemesanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rwt_pesanan;?>x</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration:none">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Belum Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_blm_selesai;?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration:none">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Point</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dot-circle fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          



        </div>
        <!-- /.container-fluid -->
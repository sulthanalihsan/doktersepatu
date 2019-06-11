<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">USER DS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
    <a class="nav-link" href="<?= base_url(); ?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Transaksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanJasa" aria-expanded="true" aria-controls="collapsePesanJasa">
        <i class="fas fa-fw fa-shopping-basket"></i>
        <span>Pesan Jasa</span>
    </a>
    <div id="collapsePesanJasa" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Detail :</h6>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/pesanan">Pesanan Proses</a>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/pesanan/tambah">Tambah Pesanan</a>
        </div>
    </div>
    </li>

    <!-- Deposit -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepositSaldo" aria-expanded="true" aria-controls="collapseDepositSaldo">
        <i class="fas fa-fw fa-shopping-basket"></i>
        <span>Deposit Saldo</span>
    </a>
    <div id="collapseDepositSaldo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Detail :</h6>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/deposit">Deposit Proses</a>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/deposit/tambah">Tambah Saldo</a>
        </div>
    </div>
    </li>

        <!-- Heading -->
    <div class="sidebar-heading">
    Artikel
    </div>

    <!-- Pesanan -->
    <li class="nav-item">
    <a class="nav-link"  href="<?= base_url(); ?>pelanggan/artikel">
        <i class="fas fa-fw fa-bars"></i>
        <span>Artikel</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Riwayat
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Riwayat</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Riwayat Detail:</h6>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/riwayat/pesanan">Riwayat Pesanan</a>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/riwayat/deposit">Riwayat Deposit</a>
        <a class="collapse-item" href="<?= base_url(); ?>pelanggan/riwayat/saldo">Riwayat Saldo</a>
        </div>
    </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
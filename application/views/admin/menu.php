<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN DS</div>
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
    Pendataan
    </div>

    <!-- Data Master -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Master Detail:</h6>
        <a class="collapse-item" href="<?= base_url(); ?>admin/pelanggan">Data Pelanggan</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/jasa">Data Jasa</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/ongkir">Data Ongkir</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/rekening">Data Rekening Bank</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/artikel">Data Artikel</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/akun">Data Admin</a>
        </div>
    </div>
    </li>

    <!-- Pesanan -->
    <li class="nav-item">
    <a class="nav-link"  href="<?= base_url(); ?>admin/pesanan">
        <i class="fas fa-fw fa-shopping-basket"></i>
        <span>Pesanan</span></a>
    </li>

    <!-- Deposit -->
    <li class="nav-item">
    <a class="nav-link"  href="<?= base_url(); ?>admin/deposit">
        <i class="fas fa-fw fa-credit-card"></i>
        <span>Deposit Pelanggan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Pelaporan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Laporan</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">laporan Detail:</h6>
        <a class="collapse-item"  href="<?= base_url(); ?>admin/laporan/pesanan">Laporan Pesanan</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/laporan/deposit">Laporan Deposit</a>
        <a class="collapse-item" href="<?= base_url(); ?>admin/laporan/saldo">Laporan Saldo</a>
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
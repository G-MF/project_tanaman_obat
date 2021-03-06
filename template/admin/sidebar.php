<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo1.png') ?>" style="width: 50px; height: 50px;">
        </div>
        <div class=" sidebar-brand-text text-left mt-3 ml-2" style="font-size: 12px;">
            Sistem Informasi <br> Obat Tradisional
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= page_active('admin') ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= page_active('kelompok-tanaman') ?>">
        <a class="nav-link" href="<?= base_url('admin/kelompok-tanaman') ?>">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Kelompok Tanaman</span>
        </a>
    </li>

    <li class="nav-item <?= page_active('tanaman-obat') ?>">
        <a class="nav-link" href="<?= base_url('admin/tanaman-obat') ?>">
            <i class="fas fa-fw fa-leaf"></i>
            <span>Tanaman Obat</span>
        </a>
    </li>

    <li class="nav-item <?= page_active('obat-tradisional') ?>">
        <a class="nav-link" href="<?= base_url('admin/obat-tradisional') ?>">
            <i class="fas fa-fw fa-pills"></i>
            <span>Obat</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-report">
            <i class="fas fa-fw fa-list"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Akun
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-edit-pw">
            <i class="fas fa-fw fa-lock"></i>
            <span>Ubah Password</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
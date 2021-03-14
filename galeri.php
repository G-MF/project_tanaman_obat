<?php
require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'template/public/head.php'; ?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once 'template/public/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-cover">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h1 class="m-0 text-dark">Galeri Tanaman Obat</h1>
                        </div>
                    </div>
                    <?php include_once 'template/public/menu.php'; ?>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <?php
                        $batas         = 8;
                        $halaman       = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal  = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous      = $halaman - 1;
                        $next          = $halaman + 1;

                        $data          = $koneksi->query("SELECT * FROM tanaman_obat");
                        $jumlah_data   = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);

                        $foto_tanaman  = $koneksi->query("SELECT * FROM tanaman_obat LIMIT $halaman_awal, $batas");
                        $nomor         = $halaman_awal + 1;
                        foreach ($foto_tanaman as $item) :
                        ?>
                            <div class="col-sm-3 col-xl-3 mb-4 ahover">
                                <a href="#" id="detail-tanaman" data-id="<?= $item['id_tanaman'] ?>">
                                    <div class="card">
                                        <img class="card-img-top" src="<?= base_url('assets/gambar-tanaman/' . $item['gambar_tanaman']) ?>" style="height: 180px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-gray-900" style="word-break: break-all;"><?= $item['nama_tanaman'] ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>

                        <div class="col-sm-12">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= $halaman < $total_halaman ? 'disabled' : '' ?>">
                                        <a class="page-link" <?php if ($halaman > 1) {
                                                                    echo "href='?halaman=$previous'";
                                                                } ?>>Previous</a>
                                    </li>
                                    <?php
                                    $url = explode('=', $_SERVER['REQUEST_URI']);
                                    $get_url = end($url);

                                    for ($x = 1; $x <= $total_halaman; $x++) {
                                    ?>
                                        <li class="page-item <?= $x == $get_url ? 'active' : '' ?>">
                                            <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <li class="page-item <?= $halaman > 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                    echo "href='?halaman=$next'";
                                                                } ?>>Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include_once 'template/public/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once 'template/public/script.php'; ?>
</body>

</html>
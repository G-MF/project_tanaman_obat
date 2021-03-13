<?php require_once '../../config/config.php'; ?>

<?php
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM obat WHERE id_obat = '$id'")->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once '../../template/admin/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../../template/admin/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../../template/admin/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo "<script>toastr.error('$_SESSION[alert]')</script>";
                        unset($_SESSION['alert']);
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Detail Data Obat Tradisional</h1>
                        <a href="../obat-tradisional" class="btn bg-gradient-secondary btn-icon-split">
                            <span class="icon text-white">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text text-white">Kembali</span>
                        </a>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <table class="table table-striped" style="width: 100%; font-weight: bold;">
                                        <tr>
                                            <th>Nama Obat</th>
                                            <td>:</td>
                                            <td><?= $data['nama_obat'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>:</td>
                                            <td><?= $data['deskripsi'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Indikasi</th>
                                            <td>:</td>
                                            <td><?= $data['indikasi'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Aturan Pakai</th>
                                            <td>:</td>
                                            <td><?= $data['aturan_pakai'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Tanaman</th>
                                            <td>:</td>
                                            <td><?= $data['nama_tanaman'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Komposisi</th>
                                            <td>:</td>
                                            <td><?= $data['komposisi'] ?></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../../template/admin/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include_once '../../template/admin/script.php'; ?>

</body>

</html>
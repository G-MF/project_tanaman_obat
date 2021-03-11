<?php require_once '../../config/config.php'; ?>

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
                        <h1 class="h3 mb-0 text-gray-900">Tambah Data Tanaman Obat</h1>
                        <a href="../tanaman-obat" class="btn bg-gradient-secondary btn-icon-split">
                            <span class="icon text-white">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text text-white">Kembali</span>
                        </a>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <form action="proses" method="POST" enctype="multipart/form-data">
                                <div class="card shadow mb-4">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="nama_tanaman" class="col-sm-2 col-form-label">Nama Tanaman</label>
                                            <div class="col-sm-10">
                                                <input autocomplete="off" type="text" class="form-control" name="nama_tanaman" id="nama_tanaman" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="indikasi" class="col-sm-2 col-form-label">Indikasi</label>
                                            <div class="col-sm-10">
                                                <input autocomplete="off" type="text" class="form-control" name="indikasi" id="indikasi" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gambar_tanaman" class="col-sm-2 col-form-label">Gambar Tanaman</label>
                                            <div class="col-sm-10">
                                                <input autocomplete="off" type="file" class="form-control" name="gambar_tanaman" id="gambar_tanaman" required>
                                                <span style="font-style: italic; color: red; font-size: 10px;">*Ukuran Maksimal 1 Mb dengan Format JPG, JPEG, PNG</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kelompok" class="col-sm-2 col-form-label">Kelompok</label>
                                            <div class="col-sm-10">
                                                <select class="form control select2" name="kelompok" id="kelompok" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $kel = $koneksi->query("SELECT * FROM kelompok_tanaman ORDER BY id_kelompok DESC");
                                                    foreach ($kel as $item) {
                                                    ?>
                                                        <option value="<?= $item['nama'] ?>"><?= $item['nama'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="tambah" class="btn bg-gradient-primary btn-md btn-icon-split" style="float: right;">
                                            <span class="icon text-white">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text text-white">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

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
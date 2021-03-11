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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Tanaman Obat</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="tambah" class="btn bg-gradient-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text text-white">Tambah Data</span>
                                    </a>
                                    <!-- <a href="#" class="btn bg-gradient-primary text-white">
                                        <i class="fas fa-plus-square"> Tambah Data</i>
                                    </a> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Tanaman</th>
                                                    <th>Deskripsi</th>
                                                    <th>Indikasi</th>
                                                    <th>Gambar</th>
                                                    <th>Kelompok</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $data = $koneksi->query("SELECT * FROM tanaman_obat ORDER BY id_tanaman DESC");
                                                foreach ($data as $row) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?= $no++; ?></td>
                                                        <td><?= $row['nama_tanaman']; ?></td>
                                                        <td><?= $row['deskripsi']; ?></td>
                                                        <td><?= $row['indikasi']; ?></td>
                                                        <td align="center">
                                                            <img src="<?= base_url('assets/gambar-tanaman/' . $row['gambar_tanaman']) ?>" style="width: 70px; height: 70px;">
                                                        </td>
                                                        <td><?= $row['kelompok']; ?></td>
                                                        <td align="center">
                                                            <a href="detail?id=<?= $row['id_tanaman'] ?>" class="btn bg-gradient-info btn-sm btn-icon-split">
                                                                <span class="icon text-white">
                                                                    <i class="fas fa-info"></i>
                                                                </span>
                                                                <span class="text text-white">Detail</span>
                                                            </a>
                                                            <a href="edit?id=<?= $row['id_tanaman'] ?>" class="btn bg-gradient-success btn-sm btn-icon-split">
                                                                <span class="icon text-white">
                                                                    <i class="fas fa-edit"></i>
                                                                </span>
                                                                <span class="text text-white">Edit</span>
                                                            </a>
                                                            <button type="button" class="btn bg-gradient-danger btn-sm btn-icon-split delete" data-link="proses?id=<?= $row['id_tanaman'] ?>" data-name="<?= $row['nama_tanaman'] ?>">
                                                                <span class="icon text-white">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text text-white">Hapus</span>
                                                            </button>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
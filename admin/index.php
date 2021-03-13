<?php require_once '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once '../template/admin/head.php'; ?>

<style>
    .ahover:hover .card {
        /*box-shadow: 8px 8px 15px black;*/
        box-shadow: 0 2px 30px 0 rgba(1, 7, 49);
        border-style: none;
        -webkit-transform: scale(1.08);
        transform: scale(1.08);
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../template/admin/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../template/admin/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-6 col-md-6 mb-4">
                            <a href="<?= base_url('admin/tanaman-obat') ?>" title="Lihat Selengkapnya...">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                                    Jumlah Data Tanaman
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $count_tanaman = $koneksi->query("SELECT COUNT(*) AS total FROM tanaman_obat")->fetch_array();
                                                    echo $count_tanaman['total'];
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4">
                            <a href="<?= base_url('admin/obat-tradisional') ?>" title="Lihat Selengkapnya...">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text font-weight-bold text-success text-uppercase mb-1">
                                                    Jumlah Data Obat Tradisional
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $count_obat = $koneksi->query("SELECT COUNT(*) AS total FROM obat")->fetch_array();
                                                    echo $count_obat['total'];
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php
                        $foto_tanaman = $koneksi->query("SELECT * FROM tanaman_obat ORDER BY id_tanaman DESC");
                        foreach ($foto_tanaman as $item) :
                        ?>
                            <div class="col-sm-3 col-xl-3 mb-4 ahover">
                                <a href="#" id="detail-tanaman" data-id="<?= $item['id_tanaman'] ?>">
                                    <div class="card">
                                        <img class="card-img-top" src="<?= base_url('assets/gambar-tanaman/' . $item['gambar_tanaman']) ?>" style="height: 180px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-gray-900"><?= $item['nama_tanaman'] ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../template/admin/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="modal-detail-tanaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900 text-bold" id="exampleModalLabel">Detail Tanaman Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <dl class="row">
                                <dt class="col-md-4">Nama Tanaman</dt>
                                <dd class="col-md-8" id="nama_tanaman"></dd>
                                <dt class="col-md-4">Deskripsi</dt>
                                <dd class="col-md-8" id="deskripsi"></dd>
                                <dt class="col-md-4">Indikasi</dt>
                                <dd class="col-md-8" id="indikasi"></dd>
                                <dt class="col-md-4">Kelompok</dt>
                                <dd class="col-md-8" id="kelompok"></dd>
                            </dl>
                        </div>
                        <div class="col-md-4 gambar"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        <i class="fa fa-times"> Tutup</i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../template/admin/script.php'; ?>

    <script>
        $(document).on('click', '#detail-tanaman', function(e) {
            e.preventDefault();
            $("#modal-detail-tanaman").modal('show');
            $.post('detail.php', {
                    id: $(this).attr('data-id')
                },
                function(data) {
                    let item = JSON.parse(data);
                    $('#nama_tanaman').html(item.nama_tanaman);
                    $('#deskripsi').html(item.deskripsi);
                    $('#indikasi').html(item.indikasi);
                    $('#kelompok').html(item.kelompok);
                    $('.gambar').append('<img src="<?= base_url() ?>/assets/gambar-tanaman/' + item.gambar_tanaman + '" style="width: 240px; height: 200px; border-radius: 25px;">');
                });
        });
    </script>

</body>

</html>
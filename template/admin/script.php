<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url() ?>/assets/select2/js/select2.full.min.js"></script>

<!-- Lightbox -->
<script src="<?= base_url() ?>/assets/lightbox/js/lightbox.js"></script>

<!-- Summernote -->
<script src="<?= base_url() ?>/assets/summernote/summernote-bs4.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/assets/js/demo/datatables-demo.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        // Summernote
        $('.textarea').summernote()

        // LIGHTBOX
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });

    $(".delete").click(function() {
        let data = $(this).data("link");
        let name = $(this).data("name");
        $('.tombol-delete').attr("href", data);
        $('#name').empty();
        $('#name').append(name);
        $('#modal-delete').modal('show');
    });

    // LIHAT PASSWORD
    function lihatpass(id) {
        var getid = document.getElementById(id).id;
        let tipe = document.getElementById(id).type;

        if (getid == 'pass_lama') {
            if (tipe == 'password') {
                document.getElementById(id).type = 'text';
                document.getElementById('btn_lama').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass("pass_lama") title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById(id).type = 'password';
                document.getElementById('btn_lama').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass("pass_lama"); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }

        if (getid == 'pass_baru') {
            if (tipe == 'password') {
                document.getElementById(id).type = 'text';
                document.getElementById('btn_baru').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass("pass_baru") title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById(id).type = 'password';
                document.getElementById('btn_baru').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass("pass_baru"); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }
    }
</script>
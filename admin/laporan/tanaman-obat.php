<?php
require_once '../../config/config.php';
$data = $koneksi->query("SELECT * FROM tanaman_obat ORDER BY nama_tanaman ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tanaman Obat</title>

    <style>
        .kop {
            justify-content: space-between;
            font-size: 35px;
            font-weight: bold;
            line-height: 30px;
            text-align: center;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .judul {
            justify-content: center;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="kop">
        <img src="<?= base_url('assets/img/logo-prov.png') ?>" width="60" height="75" alt="">
        DINAS KESEHATAN <br>
        KALIMANTAN SELATAN
        <img src="<?= base_url('assets/img/blank.jpg') ?>" width="60" height="75" alt="">
    </div>

    <hr size="2" color="black">

    <div class="judul">
        Laporan Tanaman Obat
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tanaman</th>
                <th>Deskripsi</th>
                <th>Indikasi</th>
                <th>Gambar</th>
                <th>Kelompok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $row) {
            ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $row['nama_tanaman']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['indikasi']; ?></td>
                    <td align="center">
                        <img src="<?= base_url('assets/gambar-tanaman/' . $row['gambar_tanaman']) ?>" style="width: 70px; height: 70px; margin-top: 5px; margin-bottom: 5px;">
                    </td>
                    <td align="center"><?= $row['kelompok']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</body>


<script type="text/javascript">
    window.print();
</script>

</html>
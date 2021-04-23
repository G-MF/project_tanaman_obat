<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
include_once '../../template/admin/script.php';

// Simpan
if (isset($_POST['tambah'])) {
    $kode_tanaman = $_POST['kode_tanaman'];
    $nama_tanaman = strip_tags($_POST['nama_tanaman']);
    $deskripsi    = $_POST['deskripsi'];
    $indikasi     = strip_tags($_POST['indikasi']);
    $kelompok     = strip_tags($_POST['kelompok']);

    $gambar      = $_FILES['gambar_tanaman']['name'];
    $size_gambar = $_FILES['gambar_tanaman']['size'];
    $x_gambar    = explode('.', $gambar);
    $ext_gambar  = end($x_gambar);
    $ext_allow   = array('png', 'jpg', 'jpeg');
    $nama_gambar = $x_gambar[0] . rand(1, 99999) . '.' . $ext_gambar;
    $tmp_gambar  = $_FILES['gambar_tanaman']['tmp_name'];
    $dir_gambar  = '../../assets/gambar-tanaman/';


    if ($size_gambar > 1000000) {
        $_SESSION['alert'] = "Ukuran Gambar Terlalu Besar!";
        header("location: tambah", true, 301);
    }
    if (in_array($ext_gambar, $ext_allow) === false) {
        $_SESSION['alert'] = "Format Gambar Tidak Diterima!";
        header("location: tambah", true, 301);
    }

    $submit = $koneksi->query("INSERT INTO tanaman_obat VALUES (
        NULL, '$kode_tanaman', '$nama_tanaman', '$deskripsi', '$indikasi', '$nama_gambar', '$kelompok'
    )");

    if ($submit) {
        move_uploaded_file($tmp_gambar, $dir_gambar . $nama_gambar);
        $_SESSION['alert'] = "Data Berhasil Disimpan";
        header("location: ../tanaman-obat", true, 301);
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_tanaman   = strip_tags($_POST['id_tanaman']);
        $nama_tanaman = strip_tags($_POST['nama_tanaman']);
        $deskripsi    = $_POST['deskripsi'];
        $indikasi     = strip_tags($_POST['indikasi']);
        $kelompok     = strip_tags($_POST['kelompok']);

        $cekgambar   = $koneksi->query("SELECT * FROM tanaman_obat WHERE id_tanaman = '$id_tanaman'")->fetch_array();
        $gambar_lama = $cekgambar['gambar_tanaman'];

        if (!empty($_FILES['gambar_tanaman']['name'])) {
            $gambar      = $_FILES['gambar_tanaman']['name'];
            $size_gambar = $_FILES['gambar_tanaman']['size'];
            $x_gambar    = explode('.', $gambar);
            $ext_gambar  = end($x_gambar);
            $ext_allow   = array('png', 'jpg', 'jpeg');
            $nama_gambar = $x_gambar[0] . rand(1, 99999) . '.' . $ext_gambar;
            $tmp_gambar  = $_FILES['gambar_tanaman']['tmp_name'];
            $dir_gambar  = '../../assets/gambar-tanaman/';


            if ($size_gambar > 1000000) {
                $_SESSION['alert'] = "Ukuran Gambar Terlalu Besar!";
                header("location: tambah", true, 301);
            }
            if (in_array($ext_gambar, $ext_allow) === false) {
                $_SESSION['alert'] = "Format Gambar Tidak Diterima!";
                header("location: tambah", true, 301);
            }
        } else {
            $nama_gambar = $gambar_lama;
        }

        $submit = $koneksi->query("UPDATE tanaman_obat SET
             nama_tanaman     = '$nama_tanaman', 
             deskripsi        = '$deskripsi', 
             indikasi         = '$indikasi', 
             gambar_tanaman   = '$nama_gambar', 
             kelompok         = '$kelompok'
             WHERE id_tanaman = '$id_tanaman'
        ");

        if ($submit) {
            if (!empty($_FILES['gambar_tanaman']['name'])) {
                move_uploaded_file($tmp_gambar, $dir_gambar . $nama_gambar);
                if (file_exists($dir_gambar . $gambar_lama)) {
                    unlink($dir_gambar . $gambar_lama);
                }
            }
            $_SESSION['alert'] = "Data Berhasil Diubah";
            header("location: ../tanaman-obat", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $cek = $koneksi->query("SELECT * FROM tanaman_obat WHERE id_tanaman = '$_GET[id]'")->fetch_array();
            $gambar_lama = $cek['gambar_tanaman'];

            $hapus = $koneksi->query("DELETE FROM tanaman_obat WHERE id_tanaman = '$_GET[id]'");

            if ($hapus) {
                unlink('../../assets/gambar-tanaman/' . $gambar_lama);
                $_SESSION['alert'] = "Data Berhasil Dihapus";
                header("location: ../tanaman-obat", true, 301);
            }
        }

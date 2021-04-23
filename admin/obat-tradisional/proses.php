<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
include_once '../../template/admin/script.php';

// Simpan
if (isset($_POST['tambah'])) {
    $kode_obat    = $_POST['kode_obat'];
    $nama_obat    = strip_tags($_POST['nama_obat']);
    $deskripsi    = $_POST['deskripsi'];
    $indikasi     = preg_replace("/(\r|\n)/", " ", strip_tags($_POST['indikasi']));
    $aturan_pakai = strip_tags($_POST['aturan_pakai']);
    $nama_tanaman = strip_tags($_POST['nama_tanaman']);
    $komposisi    = $_POST['komposisi'];

    $submit = $koneksi->query("INSERT INTO obat VALUES (
        NULL, '$kode_obat', '$nama_obat', '$deskripsi', '$indikasi', '$aturan_pakai', '$nama_tanaman', '$komposisi'
        )");

    if ($submit) {
        $_SESSION['alert'] = "Data Berhasil Disimpan";
        header("location: ../obat-tradisional", true, 301);
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_obat      = strip_tags($_POST['id_obat']);
        $nama_obat    = strip_tags($_POST['nama_obat']);
        $deskripsi    = $_POST['deskripsi'];
        $indikasi     = preg_replace("/(\r|\n)/", " ", strip_tags($_POST['indikasi']));
        $aturan_pakai = strip_tags($_POST['aturan_pakai']);
        $nama_tanaman = strip_tags($_POST['nama_tanaman']);
        $komposisi    = $_POST['komposisi'];

        $submit = $koneksi->query("UPDATE obat SET
            nama_obat     = '$nama_obat', 
            deskripsi     = '$deskripsi', 
            indikasi      = '$indikasi', 
            aturan_pakai  = '$aturan_pakai', 
            nama_tanaman  = '$nama_tanaman', 
            komposisi     = '$komposisi'
            WHERE id_obat = '$id_obat'
        ");

        var_dump($submit, $koneksi->error);

        if ($submit) {
            $_SESSION['alert'] = "Data Berhasil Diubah";
            header("location: ../obat-tradisional", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM obat WHERE id_obat = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Berhasil Dihapus";
                header("location: ../obat-tradisional", true, 301);
            }
        }

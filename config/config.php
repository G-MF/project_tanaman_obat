<?php
function base_url($url = null)
{
    $base_url = "http://obat-tradisional.test";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$password = "";
$name = "project_tanaman_obat";

$koneksi = mysqli_connect($host, $user, $password, $name);

if (!$koneksi) {
    die("Gagal Terkoneksi" . mysqli_connect_errno() . " - " . mysqli_connect_error());
    exit();
}

// ZONA WAKTU INDONESIA
date_default_timezone_set('Asia/Makassar');

session_start();
$no = 1;

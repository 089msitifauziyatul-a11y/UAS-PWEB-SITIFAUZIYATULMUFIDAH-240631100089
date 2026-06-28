<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "inventaris_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Fungsi Kustom 1: Mengubah format angka menjadi Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi Kustom 2: Sanitasi data input form untuk keamanan
function sanitasiInput($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, htmlspecialchars(trim($data)));
}
?>
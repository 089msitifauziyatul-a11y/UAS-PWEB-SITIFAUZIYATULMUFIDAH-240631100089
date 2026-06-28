<?php 
include 'koneksi.php'; 
global $koneksi; 

$pesan = "";

if (isset($_POST['submit'])) {
    $nama   = sanitasiInput($_POST['nama_barang']);
    $kat    = sanitasiInput($_POST['kategori']);
    $stok   = (int)$_POST['stok'];
    $harga  = (int)$_POST['harga'];
    $ket    = sanitasiInput($_POST['keterangan']);

    if(!empty($nama) && !empty($kat)) {
        $query = "INSERT INTO barang (nama_barang, kategori, stok, harga, keterangan) VALUES ('$nama', '$kat', $stok, $harga, '$ket')";
        if(mysqli_query($koneksi, $query)) {
            $pesan = "Data barang berhasil ditambahkan!";
        } else {
            $pesan = "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    } else {
        $pesan = "Nama dan Kategori wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - Inventaris</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Tambah Barang Baru</h1>
            <nav>
                <a href="index.php">Beranda & Daftar Barang</a> | 
                <a href="tambah.php">Tambah Barang Baru</a>
            </nav>
        </header>

        <?php if(!empty($pesan)) echo "<div class='alert'>$pesan</div>"; ?>

        <form action="tambah.php" method="POST">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furnitur">Furnitur</option>
                    <option value="Alat Tulis">Alat Tulis</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="stok" min="0" value="0" required>
            </div>
            <div class="form-group">
                <label>Harga Satuan (Rp)</label>
                <input type="number" name="harga" min="0" value="0" required>
            </div>
            <div class="form-group">
                <label>Keterangan / Deskripsi</label>
                <textarea name="keterangan" rows="4"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Simpan Barang</button>
        </form>
    </div>
</body>
</html>
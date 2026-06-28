<?php 
include 'koneksi.php'; 
global $koneksi; 

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$query_select = "SELECT * FROM barang WHERE id = $id";
$result = mysqli_query($koneksi, $query_select);
$data = mysqli_fetch_assoc($result);

if(!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

$pesan = "";

if (isset($_POST['update'])) {
    $nama   = sanitasiInput($_POST['nama_barang']);
    $kat    = sanitasiInput($_POST['kategori']);
    $stok   = (int)$_POST['stok'];
    $harga  = (int)$_POST['harga'];
    $ket    = sanitasiInput($_POST['keterangan']);

    $query_update = "UPDATE barang SET nama_barang='$nama', kategori='$kat', stok=$stok, harga=$harga, keterangan='$ket' WHERE id=$id";
    
    if(mysqli_query($koneksi, $query_update)) {
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang - Inventaris</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Edit Data Barang</h1>
            <nav>
                <a href="index.php">Beranda & Daftar Barang</a> | 
                <a href="tambah.php">Tambah Barang Baru</a>
            </nav>
        </header>

        <?php if(!empty($pesan)) echo "<div class='alert' style='background-color:#e74c3c;'>$pesan</div>"; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="Elektronik" <?php if($data['kategori']=='Elektronik') echo 'selected'; ?>>Elektronik</option>
                    <option value="Furnitur" <?php if($data['kategori']=='Furnitur') echo 'selected'; ?>>Furnitur</option>
                    <option value="Alat Tulis" <?php if($data['kategori']=='Alat Tulis') echo 'selected'; ?>>Alat Tulis</option>
                    <option value="Lain-lain" <?php if($data['kategori']=='Lain-lain') echo 'selected'; ?>>Lain-lain</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="stok" min="0" value="<?php echo $data['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Satuan (Rp)</label>
                <input type="number" name="harga" min="0" value="<?php echo $data['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan / Deskripsi</label>
                <textarea name="keterangan" rows="4"><?php echo $data['keterangan']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-success">Perbarui Data</button>
            <a href="index.php" class="btn" style="background-color:#7f8c8d;">Batal</a>
        </form>
    </div>
</body>
</html>
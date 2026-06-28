<?php 
include 'koneksi.php'; 
global $koneksi; 

// Mengambil data barang
$query = "SELECT * FROM barang";
$result = mysqli_query($koneksi, $query);

// Menghitung total jenis barang
$total_barang = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Inventaris Barang</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistem Inventaris Gudang</h1>
            <nav>
                <a href="index.php">Beranda & Daftar Barang</a> | 
                <a href="tambah.php">Tambah Barang Baru</a>
            </nav>
        </header>

        <section>
            <h2>Selamat Datang di Dashboard Inventaris</h2>
            <p>Saat ini terdapat <strong><?php echo $total_barang; ?></strong> jenis aset yang terdaftar dalam sistem.</p>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga Satuan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td>
                            <?php 
                            if($row['stok'] <= 3) {
                                echo "<span style='color:red; font-weight:bold;'>".$row['stok']." (Kritis)</span>";
                            } else {
                                echo $row['stok'];
                            }
                            ?>
                        </td>
                        <td><?php echo formatRupiah($row['harga']); ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success" style="padding:4px 8px;">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="padding:4px 8px;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
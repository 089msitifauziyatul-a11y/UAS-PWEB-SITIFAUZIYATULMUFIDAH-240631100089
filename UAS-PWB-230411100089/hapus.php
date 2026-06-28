<?php 
include 'koneksi.php'; 
global $koneksi; 

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $query = "DELETE FROM barang WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
?>
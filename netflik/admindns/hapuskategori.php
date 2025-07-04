<?php
include ("COMPONENT/db.php");

// Ambil id_pengguna dari URL
$id = $_GET['id'];

// Query untuk menghapus pengguna berdasarkan id_pengguna
$query = "DELETE FROM kategori WHERE id_kategori = '$id'";

if (mysqli_query($dbb, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
<?php
include("COMPONENT/db.php");

// Ambil data dari form
$nama_pengguna = $_POST['nama_pengguna'];
    $nama_admin = $_POST['nama_admin'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];

// Query untuk menyimpan data pengguna baru
$query = "INSERT INTO langganan (nama_pengguna, nama_admin, tanggal_mulai, tanggal_berakhir) VALUES ('$nama_pengguna', '$nama_admin', '$tanggal_mulai', '$tanggal_berakhir')";

if (mysqli_query($dbb, $query)) {
    echo "Pengguna berhasil ditambahkan.";
    header("Location: langganan.php"); // Redirect ke halaman daftar pengguna
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
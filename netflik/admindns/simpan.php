<?php
include("COMPONENT/db.php");

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$kata_sandi = password_hash($_POST['kata_sandi'], PASSWORD_DEFAULT); // Hash kata sandi
$tanggal_bergabung = $_POST['tanggal_bergabung'];

// Query untuk menyimpan data pengguna baru
$query = "INSERT INTO pengguna (nama, email, kata_sandi, tanggal_bergabung) VALUES ('$nama', '$email', '$kata_sandi', '$tanggal_bergabung')";

if (mysqli_query($dbb, $query)) {
    echo "Pengguna berhasil ditambahkan.";
    header("Location: pengguna.php"); // Redirect ke halaman daftar pengguna
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
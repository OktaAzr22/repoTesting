<?php
include("COMPONENT/db.php");

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$kata_sandi = password_hash($_POST['kata_sandi'], PASSWORD_DEFAULT); // Hash kata sandi

// Query untuk menyimpan data pengguna baru
$query = "INSERT INTO admin (nama, email, kata_sandi) VALUES ('$nama', '$email', '$kata_sandi')";

if (mysqli_query($dbb, $query)) {
    echo "Pengguna berhasil ditambahkan.";
    header("Location: admin.php"); // Redirect ke halaman daftar pengguna
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
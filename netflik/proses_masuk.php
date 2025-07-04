<?php
session_start();
include 'db.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $kata_sandi = $_POST['kata_sandi'];

    // Cek apakah pengguna dengan email atau nomor ponsel dan sandi yang dimasukkan ada di database
    $sql = "SELECT * FROM pengguna WHERE email = '$email' AND kata_sandi = '$kata_sandi'";
    $result = $dbb->query($sql);

    if ($result->num_rows > 0) {
        // Jika data cocok, simpan informasi pengguna di session dan redirect ke halaman lain
        $_SESSION['pengguna'] = $email;
        echo "Login berhasil! Selamat datang.";
        // Redirect ke halaman beranda atau halaman lain
        header("Location: index.php");
    } else {
        // Jika data tidak cocok, tampilkan pesan error
        echo "Email atau sandi salah. Silakan coba lagi.";
    }
}

$dbb->close();
?>
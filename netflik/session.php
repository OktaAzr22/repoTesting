<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    // Jika belum login, arahkan ke halaman sign-in
    header("Location: signin.php");
    exit();
}

// Konten untuk pengguna yang sudah login
echo "<h1>Selamat datang, " . $_SESSION['pengguna'] . "!</h1>";
?>
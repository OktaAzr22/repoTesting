<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "netflix";

// Membuat koneksi
$dbb = new mysqli($servername, $username, $password, $dbname,);

// Cek koneksi
if ($dbb->connect_error) {
    die("Koneksi gagal: " . $dbb->connect_error);
}
?>
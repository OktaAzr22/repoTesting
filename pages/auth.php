<?php
// Cek apakah session belum dimulai
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit(); 
}
?>


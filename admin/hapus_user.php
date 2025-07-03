<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Mendapatkan id_user dari parameter URL
if (isset($_GET['id_user'])) {
    $id_user = intval($_GET['id_user']);

    // Query untuk menghapus pengguna
    $query = "DELETE FROM users WHERE id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_user);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman daftar pengguna
        header("Location: user.php?message=User berhasil dihapus");
    } else {
        echo "Gagal menghapus pengguna.";
    }

    $stmt->close();
} else {
    echo "ID pengguna tidak ditemukan.";
}

$conn->close();
?>

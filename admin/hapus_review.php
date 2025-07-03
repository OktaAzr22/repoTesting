<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Mendapatkan id_order dari parameter URL
if (isset($_GET['id_order'])) {
    $id_order = intval($_GET['id_order']);

    // Query untuk menghapus review berdasarkan id_order
    $query = "DELETE FROM reviews WHERE id_order = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_order);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman daftar review
        header("Location: reviews.php?message=Review berhasil dihapus");
    } else {
        echo "Gagal menghapus review.";
    }

    $stmt->close();
} else {
    echo "ID order tidak ditemukan.";
}

$conn->close();
?>

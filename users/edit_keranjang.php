<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user'];

// Pastikan ada data yang diterima
if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $id_produk => $quantity) {
        $quantity = intval($quantity);

        // Pastikan quantity tidak kurang dari 1
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Perbarui jumlah produk di keranjang
        $query = "UPDATE cart SET quantity = ? WHERE id_user = ? AND id_produk = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $quantity, $id_user, $id_produk);
        $stmt->execute();
    }

    // Redirect kembali ke halaman keranjang
    header("Location: cart.php?success=Keranjang berhasil diperbarui.");
    exit();
} else {
    // Jika tidak ada data quantity, redirect dengan error
    header("Location: cart.php?error=Tidak ada produk untuk diperbarui.");
    exit();
}
?>
<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
   header("Location: ../login.php");
   exit();
}

$id_user = $_SESSION['id_user']; 



if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Query untuk menghapus item dari keranjang
    $query = "DELETE FROM cart WHERE id_produk = ? AND id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $product_id, $id_user);
    if ($stmt->execute()) {
        echo "Produk berhasil dihapus dari keranjang.";
    } else {
        echo "Terjadi kesalahan saat menghapus produk.";
    }

    // Redirect kembali ke halaman keranjang
    header("Location: cart.php");
    exit();
} else {
    echo "ID produk tidak ditemukan.";
}
?>
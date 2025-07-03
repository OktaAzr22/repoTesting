<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit(); 
}
include '../db/config.php';

if (isset($_GET['id_produk'])) {
    $id = $_GET['id_produk'];

    // Hapus dulu dari tabel cart
    $sqlCart = "DELETE FROM cart WHERE id_produk = $id";
    if ($conn->query($sqlCart) === TRUE) {
        // Setelah berhasil hapus di cart, hapus dari tabel products
        $sqlProduct = "DELETE FROM products WHERE id_produk = $id";
        if ($conn->query($sqlProduct) === TRUE) {
            echo "<script>
                    alert('Produk berhasil dihapus');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID produk tidak ditemukan";
}

$conn->close();

?>
<?php
session_start(); 

include '../db/config.php'; 

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Mendapatkan ID user dari sesi, pastikan user sudah login
if (isset($_SESSION['id_user'])) {
    $user_id = $_SESSION['id_user']; // Ambil id_user dari session
} else {
    echo "User tidak teridentifikasi!";
    exit();
}

// Mengecek apakah data produk dan jumlah dikirimkan melalui POST
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id']; // ID produk dari form
    $quantity = (int)$_POST['quantity'];

    // Query untuk memeriksa stok produk
    $stmt = $conn->prepare("SELECT stok FROM products WHERE id_produk = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $available_stock = $product['stok'];

        // Memeriksa apakah jumlah yang dimasukkan melebihi stok
        if ($quantity > $available_stock) {
            echo "Jumlah yang dimasukkan melebihi stok yang tersedia!";
            exit();
        }

        // Query untuk memeriksa apakah produk sudah ada di keranjang
        $stmt = $conn->prepare("SELECT quantity FROM cart WHERE id_user = ? AND id_produk = ?");
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Jika produk sudah ada di keranjang, tambahkan quantity yang ada
            $cart_item = $result->fetch_assoc();
            $new_quantity = $cart_item['quantity'] + $quantity;

            // Periksa lagi apakah jumlah total masih dalam batas stok
            if ($new_quantity > $available_stock) {
               echo "<script>
                        alert('Total quantity melebihi stok yang tersedia!');
                        window.location.href = 'index.php';
                     </script>";
                exit();
            }

            // Update quantity di keranjang
            $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id_user = ? AND id_produk = ?");
            $stmt->bind_param("iii", $new_quantity, $user_id, $product_id);
            $stmt->execute();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            $stmt = $conn->prepare("INSERT INTO cart (id_user, id_produk, quantity) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);
            $stmt->execute();
        }

        echo "<script>
               alert('Produk berhasil ditambahkan ke keranjang');
               window.location.href = 'index.php';
             </script>";
    } else {
        echo "Produk tidak ditemukan!";
    }
} else {
    echo "Data tidak lengkap!";
}
?>
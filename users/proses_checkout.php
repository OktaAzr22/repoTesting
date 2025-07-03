<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user']; 



/// Ambil produk yang dipilih
if (!isset($_POST['selected_products']) || empty($_POST['selected_products'])) {
    // Jika tidak ada produk yang dipilih, redirect kembali ke keranjang
    header("Location: cart.php?error=No products selected");
    exit();
}

$selected_products = $_POST['selected_products'];
$quantities = $_POST['quantity']; // Array quantity sesuai dengan ID produk

$total = 0;
$order_items = [];

// Ambil detail produk yang dipilih dari database
$placeholders = implode(',', array_fill(0, count($selected_products), '?'));
$query = "SELECT id_produk, nama, harga, diskon FROM products WHERE id_produk IN ($placeholders)";
$stmt = $conn->prepare($query);

// Bind parameter secara dinamis
$stmt->bind_param(str_repeat('i', count($selected_products)), ...$selected_products);
$stmt->execute();
$result = $stmt->get_result();

// Hitung total dan siapkan data order_items
while ($row = $result->fetch_assoc()) {
    $id_produk = $row['id_produk'];
    $quantity = $quantities[$id_produk];
    $harga = $row['harga'];
    $diskon = $row['diskon'];

    // Hitung harga dengan diskon (jika ada)
    $harga_diskon = ($diskon > 0) ? $harga - ($harga * $diskon / 100) : $harga;
    $subtotal = $harga_diskon * $quantity;
    $total += $subtotal;

    $order_items[] = [
        'id_produk' => $id_produk,
        'quantity' => $quantity,
        'harga' => $harga_diskon,
    ];
}

// Simpan pesanan ke tabel orders
$alamat_pengiriman = ''; // Bisa ditambahkan dari form
$catatan = ''; // Sama dengan alamat
$query = "INSERT INTO orders (id_user, alamat_pengiriman, catatan, total_harga, status) 
          VALUES (?, ?, ?, ?, 'pending')";
$stmt = $conn->prepare($query);
$stmt->bind_param("issd", $id_user, $alamat_pengiriman, $catatan, $total);
$stmt->execute();
$id_order = $stmt->insert_id;

// Simpan item pesanan ke tabel order_items
foreach ($order_items as $item) {
    $query = "INSERT INTO order_items (id_order, id_produk, quantity, harga) 
              VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiid", $id_order, $item['id_produk'], $item['quantity'], $item['harga']);
    $stmt->execute();
}

// Hapus hanya produk yang dipilih dari keranjang
$delete_query = "DELETE FROM cart WHERE id_user = ? AND id_produk IN ($placeholders)";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("i" . str_repeat('i', count($selected_products)), $id_user, ...$selected_products);
$stmt->execute();

// Redirect ke halaman sukses checkout
header("Location: checkout_success.php?id_order=" . $id_order);
exit();
?>
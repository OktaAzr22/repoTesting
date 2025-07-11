<?php
session_start();
include '../db/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user']; 


$query = "
    SELECT 
        o.id_order, 
        o.total_harga, 
        o.status, 
        o.tanggal_order, 
        p.gambar_produk AS gambar_pertama, 
        p.nama AS nama_produk,
        p.diskon,
        p.harga,
        c.nama_kategori AS kategori,
        o.total_harga
        
    FROM orders o
    JOIN order_items oi ON o.id_order = oi.id_order
    JOIN products p ON oi.id_produk = p.id_produk
    LEFT JOIN kategori c ON p.id_kategori = c.id
    WHERE o.id_user = ?
    GROUP BY o.id_order
    ORDER BY o.tanggal_order DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <link rel="stylesheet" href="../style/my_orders.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 20px;
        }  
        .orders-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Menampilkan 3 kolom per baris */
            gap: 20px;
            justify-items: center;
            margin: 0 5%; /* Margin kiri dan kanan 5% */
            padding: 20px; /* Padding untuk memberikan ruang di dalam kontainer */
        }

            /* Tambahkan media query untuk memastikan responsif pada perangkat mobile */
        @media (max-width: 768px) {
            .orders-container {
            grid-template-columns: repeat(1, 1fr); /* 1 kolom untuk layar kecil */
            margin: 0 5%; /* Menjaga margin kiri dan kanan tetap */
                }
            }
        .order-box {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .order-box img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }
        .order-box-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .order-box h3 {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
        .order-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }
        .order-status {
            font-weight: bold;
            font-size: 14px;
        }
        .order-status.completed {
            color: green;
        }
        .order-status.processing {
            color: orange;
        }
        .order-status.cancelled {
            color: red;
        }
        .btn {
            padding: 8px 16px;
            background-color: #a0522d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            float: right; /* Memposisikan tombol di kanan */
        }
        .btn:hover {
            background-color: #c19a6b;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            
        }
        /* Styling untuk harga yang dicoret */
        .original-price {
            text-decoration: line-through;
            color: #999;
            margin-right: 10px;
            font-size: 16px;
        }

        /* Styling untuk harga asli yang dicoret */
        .original-price {
            text-decoration: line-through; /* Garis coret pada harga asli */
            color: #999; /* Warna abu-abu untuk harga yang dicoret */
            font-size: 16px;
            display: block;
        }

        /* Styling untuk harga setelah diskon (yang tidak dicoret) */
        .discounted-price {
            color: black; /* Warna merah untuk harga diskon */
    
            font-size: 18px;
            margin-top: 5px; /* Memberikan jarak antara harga asli dan harga setelah diskon */
        }

        /* Styling untuk harga normal jika tidak ada diskon */
        .total-price {
            color: #333;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php include '../pages/navbar.php'; ?> 
    <style>
    body {
            margin: 0;
            font-family: 'Georgia', serif; /* Gaya vintage dengan font serif */
            background-color: #f5f5f5; /* Warna latar belakang terang */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8f8f8;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo a {
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: black;
            font-size: 16px;
            padding: 5px 10px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        .nav-links li a:hover {
            background-color: #555;
        }

        .search-cart {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-cart input {
            padding: 5px;
            border: none;
            border-radius: 4px;
            outline: none;
        }

        .cart-icon {
            font-size: 20px;
            color: #fff;
            cursor: pointer;
        }

        .search-cart {
            display: flex;
            align-items: center;
        }

        .search-cart input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .button {
            background-color: #333;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }

</style>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="#">AOU</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" data-section="home">Home</a></li>
            <li><a href="cart.php" data-section="cart">Cart</a></li>
            <li><a href="women.php" data-section="women">Women</a></li>
            <li><a href="men.php" data-section="men">Men</a></li>
            <li><a href="aksesoris.php" data-section="men">Accesoris</a></li>
            <li><a href="products.php" data-section="collection">Collection</a></li>
             <li><a href="my_orders.php" data-section="my_orders">Pesanan</a></li>
        </ul>
        <div class="search-cart">
            <a href="../logout.php" class="logout-icon button">Logout</a>
                <form action="../users/search_results.php" method="GET">
                    <input type="text" name="query" placeholder="Cari..." autocomplete="off" required>
                    <button type="submit" class="search-button">🔍</button>
                </form>
        </div>
    </nav>
</header>
    <br>
    <h1>Pesanan Saya</h1>
    <div class="orders-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="order-box" id="order-<?php echo $row['id_order']; ?>">
                <div class="order-box-header">
                    <img src="../uploads/<?php echo $row['gambar_pertama']; ?>" alt="Gambar Produk">
                    <p class="order-status <?php echo strtolower($row['status']); ?>"><?php echo ucfirst($row['status']); ?></p>
                </div>
                <h3><?php echo $row['nama_produk']; ?></h3>
                <p class="product-info">Kategori: <?php echo $row['kategori']; ?></p>

                <!-- Tampilkan harga diskon dan harga setelah diskon -->
                <p class="price">
                    <?php if ($row['diskon'] > 0): ?>

                        <!-- Harga Asli yang Dicoret -->
                        <span class="original-price">Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                        <!-- <span class="discounted-price">Rp ' . number_format($row["harga"] - ($row["harga"] * ($row["diskon"] / 100)), 0, ',', '.') . '</span></p>'; -->
                        <!-- Harga Setelah Diskon -->
                        <span class="discounted-price">Rp. <?php echo number_format($row['harga'] - ($row['harga'] * $row['diskon'] / 100), 0, ',', '.'); ?></span>
                    <?php else: ?>
                        <!-- Jika tidak ada diskon, tampilkan harga normal -->
                        <span class="total-price">Rp. <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></span>
                    <?php endif; ?>
                </p>

                <a href="detail_pesanan.php?id_order=<?php echo $row['id_order']; ?>" class="btn">Lihat Detail</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Belum ada pesanan yang dibuat.</p>
    <?php endif; ?>
</div>


</body>
</html>

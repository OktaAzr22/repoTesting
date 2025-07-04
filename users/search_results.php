<?php
session_start();
include '../db/config.php'; // Pastikan koneksi database Anda disertakan di sini

// Ambil query pencarian dari parameter GET
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Escape input untuk mencegah SQL Injection
$query = $conn->real_escape_string($query);

// Cari produk yang cocok dengan nama
$sql = "SELECT * FROM products WHERE nama LIKE '%$query%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian: <?php echo htmlspecialchars($query); ?></title>
    <link rel="stylesheet" href="style/user_search.css">
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
<section class="categories-section">
    <h2>Hasil Pencarian untuk: <?php echo htmlspecialchars($query); ?></h2>
    <hr><br>
    <div class="product-grid">
        <?php
        // Memeriksa apakah ada produk yang ditemukan
        if ($result->num_rows > 0) {
            // Mengeluarkan data setiap baris
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="../uploads/' . $row["gambar_produk"] . '" alt="' . $row["nama"] . '">';
                echo '<h4>' . $row["nama"] . '</h4>';
                
                // Tampilkan harga dengan logika diskon
                if ($row["diskon"] > 0) {
                    $hargaDiskon = $row["harga"] - ($row["harga"] * $row["diskon"] / 100);
                    echo '<div class="original-price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</div>'; // Harga asli
                    echo '<div class="discounted-price">Rp ' . number_format($hargaDiskon, 0, ',', '.') . '</div>'; // Harga diskon
                } else {
                    echo '<div class="price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</div>'; // Harga tanpa diskon
                }

                // Form untuk menambahkan ke keranjang
                echo '<form action="add_to_cart.php" method="POST" onsubmit="return validateForm(' . $row["stok"] . ', ' . $row["id_produk"] . ')">';
                echo '<input type="hidden" name="product_id" value="' . $row["id_produk"] . '">';
                echo '<input type="number" name="quantity" id="quantity-' . $row["id_produk"] . '" value="1" min="1" max="' . $row["stok"] . '" required>';
                echo '<button type="submit" class="btn" onclick="disableButton(this)">Tambah ke Keranjang</button>';
                echo '</form>';

                echo '</div>'; // Tutup div.product-card
            }
        } else {
            echo "<p>Tidak ada produk yang ditemukan.</p>";
        }
        ?>
    </div>
</section>

<?php include '../pages/footer.php'; ?>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
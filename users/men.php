<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Mengambil produk laki-laki tanpa diskon
$sql = "SELECT * FROM products WHERE id_kategori = 8 AND diskon = 0"; // Ganti 10 dengan ID kategori yang sesuai
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style/user_women.css">
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

<section class="highlight-section">
    <h2>Koleksi Pria Eksklusif</h2>
    <p>Penampilan modern yang tak pernah ketinggalan zaman.</p>
</section>

<!-- Seasonal Collection Section -->
<div class="seasonal-collection">
    <h2>Koleksi Musim Gugur</h2>
    <div class="seasonal-grid">
        <div class="season-card">
            <img src="style/hodie2.jpg" alt="hodie vintage">
            <h3>Hoodie Vintage</h3>
        </div>
        <div class="season-card">
            <img src="style/jam1.jpg" alt="jam tangan coklat">
            <h3>Jam Tangan Kulit Coklat</h3>
        </div>
        <div class="season-card">
            <img src="style/tass.jpg" alt="tas hitam kerja">
            <h3>Tas Kulit Hitam Elegan</h3>
        </div>
        <div class="season-card">
            <img src="style/kacamata2.jpg" alt="kacamata cream">
            <h3>Kacamata Retro Cream</h3>
        </div>
    </div>
</div>


<section class="categories-section">
    <h2>Produk Kategori Laki-laki</h2>
    <hr>
    <br>
    <div class="product-grid">
        <?php
        // Memeriksa apakah ada produk
        if ($result->num_rows > 0) {
            // Mengeluarkan data setiap baris
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="../uploads/' . $row["gambar_produk"] . '" alt="' . $row["nama"] . '">';
                echo '<h4>' . $row["nama"] . '</h4>';
                echo '<div class="price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</div>';
                echo '<form action="add_to_cart.php" method="POST" onsubmit="return validateForm(' . $row["stok"] . ', ' . $row["id_produk"] . ')">';

                echo '<input type="hidden" name="product_id" value="' . $row["id_produk"] . '">';
                echo '<input type="number" name="quantity" id="quantity-' . $row["id_produk"] . '" value="1" min="1" max="' . $row["stok"] . '" required>';

                echo '<button type="submit" class="btn" onclick="disableButton(this)">Tambah ke Keranjang</button>';

                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<p>Tidak ada produk untuk kategori Perempuan yang tidak memiliki diskon.</p>";
        }
        ?>
    </div>
</section>

   <section class="highlight-section">
          <h2>Maskulin, klasik, dan selalu stylish.</h2>
    <p>Lihat Lebih Lanjut</p>
    <div class="highlight-button">
        <a href="products.php">Lihat Koleksi</a>
    </div>
    
</section>

<?php include '../pages/footer.php'; ?>
<?php
// Menutup koneksi
$conn->close();
?>
<script>
function validateForm(maxStock, productId) {
    var quantityInput = document.getElementById('quantity-' + productId);
    var quantity = parseInt(quantityInput.value);

    // Validasi: jumlah tidak boleh 0 atau kurang
    if (quantity <= 0) {
        alert("Jumlah tidak boleh 0 atau kurang.");
        quantityInput.value = 1; // Reset ke 1 jika invalid
        return false;
    }

    // Validasi: jumlah tidak boleh melebihi stok
    if (quantity > maxStock) {
        alert("Jumlah melebihi stok yang tersedia.");
        quantityInput.value = maxStock; // Reset ke stok jika lebih
        return false;
    }

    // Jika valid, biarkan form dikirim ke server
    return true;
    function disableButton(button) {
    button.disabled = true;
    button.innerText = 'Processing...';
}
}
</script>

</body>
</html>
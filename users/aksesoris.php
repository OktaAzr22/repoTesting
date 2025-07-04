<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit(); // Jangan lupa tambahkan exit setelah header
}

// Query untuk mengambil produk dari kategori aksesoris (ID 1) yang tidak memiliki diskon
$sql = "SELECT * FROM products WHERE id_kategori = 7 AND diskon = 0"; // Memastikan diskon = 0
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Kategori Aksesoris Tanpa Diskon</title>
    <link rel="stylesheet" href="style/user_women.css">
    <style>
        body {
        margin: 0;
        font-family: "Georgia", serif; /* Gaya vintage dengan font serif */
        background-color: #f5f5f5; /* Warna latar belakang terang */
        }

        .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        }

        button {
        background-color: #b6d0e2; /* Warna cokelat untuk tombol */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        text-decoration: none;
        }

        button:hover {
        background-color: #c19a6b; /* Warna lebih terang saat hover */
        }


        /* Highlight Section */
        .highlight-section {
        background: linear-gradient(120deg, #2c2c2c, #4d4d4d);
        padding: 50px 20px;
        text-align: center;
        color: white;
        font-family: "Georgia", serif;
        }
        .highlight-section h2 {
        font-size: 34px;
        margin: 0;
        }
        .highlight-section p {
        font-size: 18px;
        margin: 10px 0 20px;
        }
        .highlight-button a {
        text-decoration: none;
        color: #fff;
        background-color: grey;
        padding: 12px 30px;
        border-radius: 8px;
        font-size: 16px;
        transition: background-color 0.3s;
        }
        .highlight-button a:hover {
        background-color: rebeccapurple;
        }

        .seasonal-collection {
        padding: 60px 20px;
        text-align: center;
        }

        .seasonal-collection h2 {
        font-size: 32px;
        margin-bottom: 20px;
        }

        .seasonal-grid {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        }

        .season-card {
        width: 150px;
        padding: 15px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        text-align: center;
        }

        .season-card:hover {
        transform: translateY(-5px);
        }

        .season-card img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
        }
        .season-card h3 {
        margin: 0;
        font-size: 16px;
        }
        .categories-section {
        padding: 60px 20px;
        text-align: center;
        }

        .categories-section h2 {
        font-size: 36px;
        margin-bottom: 40px;
        }

        .category h3 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
        }

        .product-grid {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        }

        .product-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 200px;
        transition: transform 0.3s;
        }
        .product-card:hover {
        transform: translateY(-5px);
        }

        .product-card img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        }

        .product-card h4 {
        font-size: 18px;
        margin: 10px 0;
        }
        .price {
        color: #e60000; /* Warna merah untuk harga */
        font-size: 18px;
        margin-bottom: 15px;
        }

        .btn {
        padding: 10px 20px;
        background-color: #8b4513; /* Warna cokelat */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .btn:hover {
        background-color: #c19a6b; /* Warna lebih terang saat hover */
        }

        .category {
        position: relative;
        margin-top: 20px;
        }

        .btn-more {
        position: absolute;
        bottom: 10px; /* Posisi di bawah */
        right: 10px; /* Posisi di kanan */
        padding: 10px 20px;
        background-color: #8b4513;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .btn-more:hover {
        background-color: #c19a6b; /* Warna lebih terang saat hover */
        }


    </style>
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
    <h2>Koleksi Aksesoris Terbaru</h2>
    <p>Tingkatkan gaya dengan aksesoris yang dirancang untuk kesempurnaan.</p>
</section>

<section class="categories-section">
    <h2>Produk Kategori Aksesoris</h2>
    <hr><br>
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
          <h2>Sentuhan Elegan untuk Penampilanmu</h2>
    <p>Lihat Lebih Lanjut</p>
    <div class="highlight-button">
        <a href="products.php">Lihat Koleksi</a>
    </div>
    
</section>


<?php include '../pages/footer.php'; ?>
<style>
    footer {
            background-color: #eaeaea;
            padding: 20px 0;
            font-family: 'Georgia', serif;
        }
        .footer-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .footer-links {
            flex: 1;
            margin: 0 20px;
        }
        .footer-links h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        .footer-links ul li {
            margin: 8px 0;
        }
        .footer-links a {
            text-decoration: none;
            color: #333;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
</style>
    <footer>
        <div class="footer-container">
            <div class="footer-links">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="terms.php">Syarat dan Ketentuan</a></li>
                    <li><a href="privacy.php">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Bantuan</h4>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Ikuti Kami</h4>
                <ul>
                    <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                    <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 AOU. Semua hak dilindungi.
        </div>
    </footer>
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
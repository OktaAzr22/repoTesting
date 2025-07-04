<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit(); // Jangan lupa tambahkan exit setelah header
}

// Ambil produk dari database yang memiliki diskon
$sql = "SELECT * FROM products WHERE diskon > 0";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk dengan Diskon</title>
    <link rel="stylesheet" href="style/main.css">
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
    <div class="banner">
        <section class="main-content">
            <h1 class="welcome-text">Selamat Datang di AOU Fashion, <?= htmlspecialchars($_SESSION['username']); ?></h1>
            <p>Nikmati koleksi produk fashion eksklusif kami.</p>
        </section>
    </div>

    <div class="main-container">
        <h1>Produk dengan Diskon!</h1>
        <br>
            <div class="product-grid">
            <?php
                // Memeriksa apakah ada produk
                if ($result->num_rows > 0) {
                    // Mengeluarkan data setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '<span class="discount-label">-' . $row["diskon"] . '%</span>'; // Menampilkan diskon
                    echo '<img src="../uploads/' . $row["gambar_produk"] . '" alt="' . $row["nama"] . '">';
                    echo '<h3>' . $row["nama"] . '</h3>';
                    echo '<p><span class="original-price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</span>' .
                         '<span class="discounted-price">Rp ' . number_format($row["harga"] - ($row["harga"] * ($row["diskon"] / 100)), 0, ',', '.') . '</span></p>';

                // Form untuk menambahkan produk ke keranjang
                    echo '<form action="add_to_cart.php" method="POST" onsubmit="return validateForm(' . $row["stok"] . ', ' . $row["id_produk"] . ')">';
                    echo '<input type="hidden" name="product_id" value="' . $row["id_produk"] . '">';
                    echo '<input type="number" name="quantity" id="quantity-' . $row["id_produk"] . '" value="1" min="1" max="' . $row["stok"] . '" required>';
                    echo '<button type="submit" class="btn add" onclick="disableButton(this)">Tambah ke Keranjang</button>';
                    echo '</form>'; // Tutup form

                    echo '</div>';
                }
                   } else{
                            echo "<p>Tidak ada produk yang sedang diskon.</p>";
                        }
        ?>
    </div>
    <br>


    
<br>

    <?php include '../pages/footer.php'; ?>
  
    <script>
        function addToCart(productName, productPrice, stock) {
    const quantityInput = document.getElementById('quantity-' + productName);
    const errorMessage = document.getElementById('error-' + productName);
    const quantity = parseInt(quantityInput.value);

    // Reset error message
    errorMessage.textContent = '';

    // Validasi: tidak boleh kosong dan tidak boleh melebihi stok
    if (isNaN(quantity) || quantity <= 0) {
        errorMessage.textContent = 'Jumlah tidak boleh kosong atau kurang dari 1.';
        return;
    }

    if (quantity > stock) {
        errorMessage.textContent = 'Jumlah tidak boleh melebihi stok yang tersedia (' + stock + ').';
        return;
    }

    // Menggunakan Ajax untuk menambahkan produk ke keranjang
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                alert(response.message); // Menampilkan pesan sukses
            } else {
                alert('Gagal menambahkan ke keranjang.');
            }
        }
    };
    xhr.send('product_name=' + encodeURIComponent(productName) + '&quantity=' + encodeURIComponent(quantity));
}

    </script>
</body>
</html>
<?php
// Menutup koneksi
$conn->close();
?>
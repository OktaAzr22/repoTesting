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
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
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
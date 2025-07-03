<?php
include '../db/config.php';

$kategori = 'perempuan';  // Nama kategori yang ingin ditampilkan
$limit = 6;

// Ambil produk berdasarkan kategori 'perempuan' (6 produk pertama)
$sql = "SELECT * FROM products WHERE id_kategori = (SELECT id FROM kategori WHERE nama_kategori = ?) LIMIT ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $kategori, $limit);  // Menyertakan kategori dan limit
$stmt->execute();
$result = $stmt->get_result();

// Ambil semua produk dari kategori 'perempuan' setelah tombol diklik
$sql_all = "SELECT * FROM products WHERE id_kategori = (SELECT id FROM kategori WHERE nama_kategori = ?)";
$stmt_all = $conn->prepare($sql_all);
$stmt_all->bind_param("s", $kategori);  // Hanya menggunakan kategori
$stmt_all->execute();
$result_all = $stmt_all->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Kategori Perempuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-card {
            width: 30%;
            background-color: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .product-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card p {
            font-size: 16px;
            color: #333;
        }
        .btn-show-all, .btn-show-more {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }
        .btn-show-all:hover, .btn-show-more:hover {
            background-color: #0056b3;
        }
        .btn-show-more {
            background-color: #28a745;
        }
        .btn-show-more:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Produk Kategori Perempuan</h1>

        <div class="product-grid" id="product-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<img src='../uploads/" . htmlspecialchars($row['gambar_produk']) . "' alt='" . htmlspecialchars($row['nama']) . "' />";
                    echo "<h3>" . htmlspecialchars($row['nama']) . "</h3>";
                    echo "<p>Rp" . number_format($row['harga'], 0, ',', '.') . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada produk ditemukan.</p>";
            }
            ?>
        </div>

        <!-- Tombol Tampilkan Semua Produk -->
        <button class="btn-show-all" id="show-all-btn">Tampilkan Semua Produk</button>

        <!-- Tombol Kembali ke Semula (Awal) -->
        <button class="btn-show-more" id="back-btn" style="display:none;">Kembali ke Semula</button>

        <div class="product-grid" id="all-products" style="display:none;">
            <?php
            if ($result_all->num_rows > 0) {
                while ($row_all = $result_all->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<img src='../uploads/" . htmlspecialchars($row_all['gambar_produk']) . "' alt='" . htmlspecialchars($row_all['nama']) . "' />";
                    echo "<h3>" . htmlspecialchars($row_all['nama']) . "</h3>";
                    echo "<p>Rp" . number_format($row_all['harga'], 0, ',', '.') . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <script>
        // Ketika tombol "Tampilkan Semua Produk" diklik
        document.getElementById('show-all-btn').addEventListener('click', function() {
            document.getElementById('all-products').style.display = 'flex';  // Menampilkan produk tambahan
            this.style.display = 'none';  // Menyembunyikan tombol "Tampilkan Semua Produk"
            document.getElementById('back-btn').style.display = 'block';  // Menampilkan tombol "Kembali ke Semula"
        });

        // Ketika tombol "Kembali ke Semula" diklik
        document.getElementById('back-btn').addEventListener('click', function() {
            document.getElementById('all-products').style.display = 'none';  // Menyembunyikan produk tambahan
            document.getElementById('show-all-btn').style.display = 'block';  // Menampilkan tombol "Tampilkan Semua Produk"
            this.style.display = 'none';  // Menyembunyikan tombol "Kembali ke Semula"
        });
    </script>

    <?php
    // Tutup koneksi
    $conn->close();
    ?>
</body>
</html>

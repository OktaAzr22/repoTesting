<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Query untuk mendapatkan semua produk
$query = "SELECT id_produk, nama, harga, gambar_produk, diskon FROM products";
$result = $conn->query($query);
?>

<style>
  
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        
        margin: 0;
    }
    .products-container {
        max-width: 1000px;
        margin: auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }
    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        padding: 10px;
    }
    .product-card img {
        max-width: 100%;
        height: auto;
    }
    .product-card h4 {
        margin: 10px 0;
    }
    .product-card .price {
        font-size: 16px;
        margin: 10px 0;
    }
    .original-price {
        text-decoration: line-through;
        color: red; /* Warna merah untuk harga asli */
    }
    .discounted-price {
        color: brown; /* Warna coklat untuk harga diskon */
    }
    .btn {
        background-color: #8b4513;;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
    }
/*   batas */
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

<?php include '../pages/navbar.php'; ?>

<br>

<div class="products-container">
    <h2>Semua Produk</h2>
    <div class="product-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="../uploads/' . $row['gambar_produk'] . '" alt="' . $row['nama'] . '">';
                echo '<h4>' . $row['nama'] . '</h4>';

                // Tampilkan harga dengan logika diskon
                if ($row["diskon"] > 0) {
                    $hargaDiskon = $row["harga"] - ($row["harga"] * $row["diskon"] / 100);
                    echo '<p class="original-price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</p>'; // Harga asli
                    echo '<p class="discounted-price">Rp ' . number_format($hargaDiskon, 0, ',', '.') . '</p>'; // Harga diskon
                } else {
                    echo '<p class="price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</p>'; // Harga tanpa diskon
                }

                // Form untuk menambah ke keranjang
                echo '<form action="add_to_cart.php" method="POST">';
                echo '<input type="hidden" name="product_id" value="' . $row['id_produk'] . '">';
                echo '<input type="number" name="quantity" value="1" min="1" max="10" required>';
                echo '<button type="submit" class="btn">Tambah ke Keranjang</button>';
                echo '</form>';
                echo '</div>'; // end of product-card
            }
        } else {
            echo '<p>Tidak ada produk yang tersedia.</p>';
        }
        ?>
    </div>
</div>
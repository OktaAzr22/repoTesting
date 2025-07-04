<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya user yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user']; 

// Query untuk mendapatkan data dari keranjang
$query = "SELECT cart.id_produk, cart.quantity, products.nama, products.harga, products.gambar_produk, products.diskon 
          FROM cart 
          JOIN products ON cart.id_produk = products.id_produk 
          WHERE cart.id_user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_user); 
$stmt->execute();
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="style/user_cart.css">

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

<div class="cart-container">
    <h2>Keranjang Belanja</h2>
    <form action="proses_checkout.php" method="POST" id="checkoutForm">
        <div class="cart-items">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subtotal = $row['harga'] * $row['quantity'];

                    echo '<div class="cart-item" id="product-' . $row['id_produk'] . '" data-price="' . $row['harga'] . '" data-discount="' . $row['diskon'] . '">';

                    echo '<div class="cart-image">';
                    echo '<img src="../uploads/' . $row['gambar_produk'] . '" alt="' . $row['nama'] . '">';
                    echo '</div>';
                    echo '<div class="cart-details">';
                    echo '<h4>' . $row['nama'] . '</h4>';

                    // Tampilkan harga dengan logika diskon
                    if ($row["diskon"] > 0) {
                        $hargaDiskon = $row["harga"] - ($row["harga"] * $row["diskon"] / 100);
                        echo '<p class="original-price">Rp ' . number_format($row["harga"], 0, ',', '.') . '</p>'; // Harga asli
                        echo '<p class="discounted-price">Rp ' . number_format($hargaDiskon, 0, ',', '.') . '</p>'; // Harga diskon
                    } else {
                        echo '<p>Rp ' . number_format($subtotal, 0, ',', '.') . '</p>'; // Harga tanpa diskon
                    }

                    echo '</div>';
                    echo '<div class="cart-qty">';
                    echo '<input type="hidden" name="product_id[]" value="' . $row['id_produk'] . '">';
                    echo '<input type="number" name="quantity[' . $row['id_produk'] . ']" value="' . $row['quantity'] . '" min="1">';
                    echo '</div>';

                    // Tambahkan checkbox untuk memilih produk
                    echo '<div class="cart-select">';
                    echo '<input type="checkbox" name="selected_products[]" value="' . $row['id_produk'] . '" class="product-checkbox"> Pilih';
                    echo '</div>';

                    echo '<a href="hapus_keranjang.php?product_id=' . $row['id_produk'] . '" class="remove-btn">Hapus</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>Keranjang belanja kosong.</p>';
            }
            ?>
        </div>

        <div class="cart-footer">
            <!-- Menampilkan total produk yang dipilih -->
            <h3>Total Produk: <span id="totalQuantity">0</span> produk</h3> 
            <h3>Total: Rp <span id="totalPrice">0</span></h3>

            <!-- Tombol Update Keranjang dan Checkout -->
            <button type="submit" formaction="edit_keranjang.php" class="update-cart-btn">Update Keranjang</button>
            <button type="submit" id="checkoutBtn" class="checkout-btn">Checkout</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    // Fungsi untuk menghitung total harga dan jumlah produk
    function updateCart() {
        let total = 0;
        let totalQuantity = 0;

        // Looping melalui checkbox dan menghitung total yang dicentang
        $('input[name="selected_products[]"]:checked').each(function() {
            let productId = $(this).val();
            let quantity = $('input[name="quantity[' + productId + ']"]').val();
            let price = parseFloat($('#product-' + productId).data('price')); // Mendapatkan harga
            let discount = parseFloat($('#product-' + productId).data('discount')); // Mendapatkan diskon

            // Pastikan harga dan diskon valid
            if (isNaN(price)) {
                price = 0;
            }
            if (isNaN(discount)) {
                discount = 0;
            }

            // Kalkulasi harga setelah diskon jika ada
            if (discount > 0) {
                price = price - (price * discount / 100);
            }

            let subtotal = price * quantity;
            total += subtotal;
            totalQuantity += parseInt(quantity);
        });

        // Update total dan jumlah produk
        $('#totalPrice').text('Rp ' + total.toLocaleString('id-ID'));

        $('#totalQuantity').text(totalQuantity);
    }

    // Menjalankan fungsi updateCart ketika checkbox atau quantity berubah
    $('input[name="selected_products[]"], input[name^="quantity"]').on('change', function() {
        updateCart();
    });

    // Panggil fungsi awal untuk update total dan jumlah produk
    updateCart();
});

</script>
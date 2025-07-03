<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

.detail-container {
    width: 90%;
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.detail-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.detail-container p {
    font-size: 16px;
    color: #555;
}

.detail-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 8px;
    overflow: hidden;
}

.detail-table th, .detail-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.detail-table th {
    background-color: #f7f7f7;
    font-weight: bold;
    text-transform: uppercase;
}

.detail-table td {
    vertical-align: middle;
}

.product-img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    object-fit: cover;
}

tfoot td {
    font-weight: bold;
    text-align: right;
    font-size: 16px;
}

.review-section {
    margin-top: 20px;
    padding: 15px;
    background-color: #fafafa;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.review-section h4 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}

.review-section p {
    font-size: 14px;
    color: #555;
}

.action-buttons {
    margin-top: 20px;
    text-align: center;
}

.btn {
    display: inline-block;
    background-color: #007BFF;
    color: white;
    padding: 10px 15px;
    font-size: 14px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-review {
    background-color: #28a745;
}

.btn-review:hover {
    background-color: #218838;
}

.btn-dashboard, .btn-home {
    margin-top: 10px;
    background-color: #6c757d;
}

.btn-dashboard:hover, .btn-home:hover {
    background-color: #5a6268;
}


    </style>
<?php
session_start();
include '../db/config.php';

// Pengecekan role user
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Ambil ID Pesanan dari URL
$id_order = isset($_GET['id_order']) ? intval($_GET['id_order']) : 0;

// Ambil detail pesanan
$query = "SELECT orders.status, orders.catatan, products.nama, products.gambar_produk, order_items.harga, 
                 order_items.quantity, products.diskon
          FROM order_items
          JOIN products ON order_items.id_produk = products.id_produk
          JOIN orders ON order_items.id_order = orders.id_order
          WHERE orders.id_order = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_order);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Pesanan tidak ditemukan.";
    exit();
}

// Ambil status pesanan dan catatan jika ada
$row_status = $result->fetch_assoc();
$status = $row_status['status'];
$catatan = $row_status['catatan'];

// Cek apakah ulasan sudah ada untuk pesanan ini
$query_review = "SELECT * FROM reviews WHERE id_order = ?";
$stmt_review = $conn->prepare($query_review);
$stmt_review->bind_param("i", $id_order);
$stmt_review->execute();
$review_result = $stmt_review->get_result()->fetch_assoc();

$review_exists = $review_result ? true : false;
$review_text = $review_exists ? $review_result['review'] : '';
$review_rating = $review_exists ? $review_result['rating'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="style/detail_pesanan.css">
</head>
<body>
  <div class="detail-container">
    <h2>Detail Pesanan</h2>
    <p>Status: <strong><?php echo ucfirst($status); ?></strong></p>

    <?php if ($status == 'pending'): ?>
        <p><strong>Mohon ditunggu, pesanan sedang diproses.</strong></p>
        <a href="my_orders.php" class="btn btn-dashboard">Kembali</a>
    <?php elseif ($status == 'rejected'): ?>
        <p><strong>Pesan dari Admin:</strong> <?php echo htmlspecialchars($catatan); ?></p>
    <?php else: ?>
        <table class="detail-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $result->data_seek(0);
                $total = 0;
                while ($item = $result->fetch_assoc()): 
                    $harga_diskon = $item['diskon'] > 0 
                        ? $item['harga'] - ($item['harga'] * $item['diskon'] / 100) 
                        : $item['harga'];
                    $subtotal = $harga_diskon * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><img src="../uploads/<?php echo $item['gambar_produk']; ?>" alt="<?php echo $item['nama']; ?>" class="product-img"></td>
                        <td><?php echo $item['nama']; ?></td>
                        <td>Rp<?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $item['diskon']; ?>%</td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>Rp<?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Total Harga:</td>
                    <td>Rp<?php echo number_format($total, 0, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>

    <?php if ($status == 'approved' || $status == 'rejected'): ?>
        <div class="action-buttons">
            <?php if (!$review_exists): ?>
                <form action="ulasan_pesanan.php" method="GET" style="display: inline;">
                    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
                    <button type="submit" class="btn btn-review">Beri Ulasan</button>
                </form>
            <?php else: ?>
                <div class="review-section">
                    <h4>Ulasan Pesanan</h4>
                    <p>Rating: <?php echo str_repeat('★', $review_rating) . str_repeat('☆', 5 - $review_rating); ?></p>
                    <p><?php echo $review_text; ?></p>
                </div>
            <?php endif; ?>
            <a href="my_orders.php" class="btn btn-dashboard">Kembali</a>
        </div>
    <?php endif; ?>

</div>

</body>
</html>

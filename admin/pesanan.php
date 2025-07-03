<?php
include '../db/config.php';

// Ambil daftar pesanan dengan status pending
$query = "SELECT orders.*, users.username 
          FROM orders 
          JOIN users ON orders.id_user = users.id_user 
          WHERE orders.status = 'pending'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Produk - Admin</title>
    <style type="text/css">
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; /* Latar belakang halaman abu-abu terang */
}

/* Wrapper untuk daftar pengguna */
.users-container {
    margin: 20px auto;
    max-width: 900px; /* Lebar maksimal */
    padding: 20px;
    background-color: #fdfdfd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    border: 1px solid #ddd;
}

/* Heading Daftar Pengguna */
.users-container h2 {
    text-align: center;
    font-family: 'Arial', sans-serif;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Styling tabel */
.users-container table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    color: #333;
}

/* Header tabel */
.users-container table thead th {
    padding: 12px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-bottom: 2px solid #ddd;
}

/* Baris dan sel tabel */
.users-container table tbody td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Baris ganjil memiliki warna latar berbeda */
.users-container table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Hover efek pada baris tabel */
.users-container table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Kolom kosong atau pesan jika tidak ada data */
.users-container table tbody tr td[colspan] {
    text-align: center;
    font-style: italic;
    color: #777;
    padding: 15px;
}

    </style>
</head>
<body>
  <?php include 'navbar_admin.php' ?>
<br>
<br>
<br>
<div class="users-container">
    <h2>Daftar Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Alamat Pengiriman</th>
                <th>Catatan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['alamat_pengiriman']; ?></td>
                        <td><?php echo $row['catatan']; ?></td>
                        <td>Rp<?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td>
                            <form action="proses_persetujuan.php" method="POST">
                                <input type="hidden" name="id_order" value="<?php echo $row['id_order']; ?>">
                                <button type="submit" name="action" value="approve">Setujui</button>
                                <button type="submit" name="action" value="reject">Tolak</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Belum ada permintaan cuy</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php include 'histori_pesanan.php' ?>

</body>
</html>
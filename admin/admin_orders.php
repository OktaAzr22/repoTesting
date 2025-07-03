<?php
include '../db/config.php';

// Ambil daftar pesanan dengan status pending
$query = "SELECT orders.*, users.username 
          FROM orders 
          JOIN users ON orders.id_user = users.id_user 
          WHERE orders.status = 'pending'";
$result = $conn->query($query);
?>

<h2>Daftar Pesanan</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Alamat Pengiriman</th>
        <th>Catatan</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>
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
</table>

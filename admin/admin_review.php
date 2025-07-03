<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Query untuk mendapatkan semua review
$query = "SELECT reviews.id_order, reviews.id_user, reviews.rating, reviews.review, users.username
          FROM reviews
          JOIN users ON reviews.id_user = users.id_user";
$result = $conn->query($query);
?>
<link rel="stylesheet" href="style/admin_user.css">
<?php include 'navbar_admin.php' ?>
<br>
<br>
<br>

<div class="users-container">
    <h2>Daftar Review</h2>
    <table>
        <thead>
            <tr>
                <th>ID Order</th>
                <th>User</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id_order'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['rating'] . '</td>';
                    echo '<td>' . $row['review'] . '</td>';
                    echo '<td><a href="hapus_review.php?id_order=' . $row['id_order'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus review ini?\')" class="btn-delete">Hapus</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">Tidak ada review yang masuk.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

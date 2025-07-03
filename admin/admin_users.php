<?php
session_start();
include '../db/config.php';

// Pengecekan role: hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Query untuk mendapatkan semua pengguna
$query = "SELECT id_user, username, password FROM users";
$result = $conn->query($query);
?>
<link rel="stylesheet" href="style/admin_user.css">
<?php include 'navbar_admin.php' ?>
<br>
<br>
<br>

<div class="users-container">
    <h2>Daftar Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id_user'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td><a href="hapus_user.php?id_user=' . $row['id_user'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus pengguna ini?\')" class="btn-delete">Hapus</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Tidak ada pengguna terdaftar.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<td>
<?php
include("COMPONENT/db.php");

// Ambil id_film dari URL
$id = $_GET['id'];

// Query untuk menghapus film berdasarkan id_film
$query = "DELETE FROM film WHERE id_film = '$id'";

if (mysqli_query($dbb, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='film.php';</script>";
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
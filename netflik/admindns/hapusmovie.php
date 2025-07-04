<?php
include("COMPONENT/db.php");

// Ambil id_film dari URL
$id = $_GET['id'];

// Query untuk menghapus film berdasarkan id_film
$query = "DELETE FROM movie WHERE id_movie = '$id'";

if (mysqli_query($dbb, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='movies.php';</script>";
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
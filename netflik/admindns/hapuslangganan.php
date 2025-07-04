<?php
include("COMPONENT/db.php");

// Ambil id_film dari URL
$id = $_GET['id_langganan'];

// Query untuk menghapus film berdasarkan id_film
$query = "DELETE FROM langganan WHERE id_langganan = '$id'";

if (mysqli_query($dbb, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='langganan.php';</script>";
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
<?php
include("COMPONENT/db.php");

// Ambil id_film dari URL
$id = $_GET['id'];

// Query untuk menghapus film berdasarkan id_film
$query = "DELETE FROM seriess WHERE id_seriess = '$id'";

if (mysqli_query($dbb, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='seriess.php';</script>";
} else {
    echo "Error: " . mysqli_error($dbb);
}
?>
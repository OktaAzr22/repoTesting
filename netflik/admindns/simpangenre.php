<?php
include("COMPONENT/db.php");

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $nama_genre = $_POST['nama_genre'];

    // Query untuk menyimpan data genre
    $query = "INSERT INTO genre (nama_genre) VALUES ('$nama_genre')";

    // Eksekusi query dan periksa hasil
    if (mysqli_query($dbb, $query)) {
        echo "<script>alert('Genre berhasil ditambahkan'); window.location='genre.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbb);
    }
}
?>
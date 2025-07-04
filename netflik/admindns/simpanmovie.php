<?php
include("COMPONENT/db.php");

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $durasi = $_POST['durasi'];
    $sutradara = $_POST['sutradara'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $rating = $_POST['rating'];
    $deskripsi = $_POST['deskripsi'];
    $url = $_POST['url_video'];
    
    // Proses upload foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    
    // Pastikan folder uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo "URL video tidak valid. Harap masukkan URL yang benar.";
        exit; // Stop eksekusi jika URL tidak valid
    }

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Query untuk menyimpan data film
        $query = "INSERT INTO movie (judul, durasi, sutradara, tahun_rilis, rating, deskripsi, url_video, foto) VALUES ('$judul', '$durasi', '$sutradara', '$tahun_rilis', '$rating', '$deskripsi', '$url', '$target_file')";

        // Eksekusi query dan periksa hasil
        if (mysqli_query($dbb, $query)) {
            echo "<script>alert('movie berhasil ditambahkan'); window.location='movies.php';</script>";
        } else {
            echo "Error: " . mysqli_error($dbb);
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload foto.";
    }
}
?>
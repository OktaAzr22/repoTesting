<?php
include 'COMPONENT/db.php'; // Koneksi ke database

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $durasi = $_POST['durasi'];
    $sutradara = $_POST['sutradara'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $deskripsi = $_POST['deskripsi'];
    $rating = $_POST['rating'];

    // Proses unggah foto
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $folder = "uploads/"; // Pastikan folder ini ada dan writable

    if ($foto) {
        $fotoPath = $folder . basename($foto);
        move_uploaded_file($tmp_name, $fotoPath);
    } else {
        $fotoPath = null; // Jika foto tidak diunggah
    }

    // Query untuk memasukkan data ke database
    $stmt = $dbb->prepare("INSERT INTO film (judul, durasi, sutradara, tahun_rilis, deskripsi, rating, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $judul, $durasi, $sutradara, $tahun_rilis, $deskripsi, $rating, $fotoPath);

    if ($stmt->execute()) {
        echo "Film berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan film.";
    }

    $stmt->close();
    $dbb->close();
}
?>
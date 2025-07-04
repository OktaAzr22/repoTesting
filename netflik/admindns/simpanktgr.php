<?php
// Koneksi ke database
include("COMPONENT/db.php");

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_kategori = $_POST['nama_kategori'];
    $nama_film = $_POST['nama_film'];

    // Query untuk menyimpan data pengguna
    $query = "INSERT INTO kategori (nama_kategori, nama_film) 
              VALUES ('$nama_kategori', '$nama_film' )";

    // Eksekusi query dan cek keberhasilan
    if (mysqli_query($dbb, $query)) {
         echo "<script>alert('Kategori berhasi ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($dbb);
    }

    // Tutup koneksi
    mysqli_close($dbb);
}
?>
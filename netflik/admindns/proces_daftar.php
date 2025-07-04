<?php
include 'COMPONENT/db.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $kata_sandi = $_POST['kata_sandi'];

    // Periksa apakah email atau nomor ponsel sudah ada
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $dbb->query($sql);

    if ($result->num_rows == 0) {
        // Jika tidak ada, simpan pengguna baru dengan paket yang dipilih
        $sql = "INSERT INTO admin (email, kata_sandi) VALUES ('$email', '$kata_sandi')";
        if ($dbb->query($sql) === TRUE) {
            echo "Pendaftaran berhasil! Silakan <a href='masuk.php'>masuk</a>.";
        } else {
            echo "Error: " . $sql . "<br>" . $dbb->error;
        }
    } else {
        echo "Pengguna dengan email atau nomor ponsel ini sudah terdaftar. Silakan <a href='masuk.php'>masuk</a>.";
    }
}

$dbb->close();
?>
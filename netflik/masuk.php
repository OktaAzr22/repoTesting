<?php
session_start();
include 'db.php'; // Sambungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $kata_sandi = $_POST['kata_sandi'];

    // Periksa data di database
    $stmt = $dbb->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi kata sandi
        if (password_verify($kata_sandi, $user['kata_sandi'])) {
            $_SESSION['pengguna'] = $user['email']; // Simpan ke sesi
            header("Location: index.php"); // Arahkan ke index
            exit();
        } else {
            echo "<script>alert('Kata sandi salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #000; color: #fff; }
        .container { max-width: 400px; margin: 100px auto; padding: 20px; background-color: #222; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #444; background-color: #333; color: #fff; }
        button { width: 100%; padding: 10px; background-color: #e50914; border: none; border-radius: 5px; color: #fff; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #f6121d; }
        .remember { display: flex; align-items: center; }
        .remember input { width: auto; margin-right: 10px; }
        .additional-options { margin-top: 10px; text-align: center; }
        .additional-options a { color: #fff; text-decoration: none; }
        .additional-options a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Masuk</h2>
        <form action="proses_masuk.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="kata_sandi">Sandi</label>
                <input type="password" id="kata_sandi" name="kata_sandi" required>
            </div>
            <button type="submit">Masuk</button>
            <div class="additional-options">
                <a href="#">Gunakan Kode Masuk</a> | <a href="#">Lupa sandi?</a>
            </div>
            <div class="remember">
                <input type="checkbox" id="ingat" name="ingat">
                <label for="ingat">Ingat saya</label>
            </div>
            <div class="additional-options">
                Baru di flix? <a href="daftar.php">Daftar sekarang.</a>
            </div>
        </form>
    </div>
</body>
</html>
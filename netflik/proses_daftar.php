<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pengguna</title>
    <style>
        body {
            background-color: #1a1a1a; /* Latar belakang hitam pekat */
            color: #ffffff; /* Teks warna putih */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #2a2a2a; /* Abu-abu gelap untuk kontainer */
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: #ff4c4c; /* Warna merah terang */
            margin-bottom: 15px;
        }
        p {
            margin: 10px 0;
        }
        a {
            color: #ff4c4c; /* Warna merah */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            background-color: #ff4c4c; /* Tombol merah */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #e43b3b; /* Efek hover lebih gelap */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include 'db.php'; // Koneksi ke database

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $kata_sandi = $_POST['kata_sandi'];

            // Periksa apakah email sudah ada
            $sql = "SELECT * FROM pengguna WHERE email = '$email'";
            $result = $dbb->query($sql);

            if ($result->num_rows == 0) {
                // Simpan pengguna baru
                $sql = "INSERT INTO pengguna (email, kata_sandi) VALUES ('$email', '$kata_sandi')";
                if ($dbb->query($sql) === TRUE) {
                    echo "<h1>Terima Kasih</h1>";
                    echo "<p>Email: <strong>$email</strong></p>";
                    echo "<p>Pendaftaran berhasil! Silakan <a href='masuk.php' class='btn'>Masuk</a>.</p>";
                } else {
                    echo "<p>Error: " . $dbb->error . "</p>";
                }
            } else {
                echo "<h1>Perhatian</h1>";
                echo "<p>Email ini sudah terdaftar. Silakan <a href='masuk.php' class='btn'>Masuk</a></p>";
            }
        }

        $dbb->close();
        ?>
    </div>
</body>
</html>

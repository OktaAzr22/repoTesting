<?php
include './db/config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user';

    // Cek apakah username sudah terdaftar
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      echo "<script>
               alert('Username sudah terdaftar. Silakan pilih username lain.');
            </script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param('sss', $username, $hashed_password, $role);

        if ($stmt->execute()) {
         echo "<script>
                  alert('Registrasi berhasil !');
                  window.location.href='login.php';
               </script>"; 
        } else { 
         echo "<script>
                  alert('Gagal registrasi!');
               </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AOU Fashion - Daftar</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Gaya umum halaman */
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fafafa;
        }

        .register-container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #333;
        }

        .register-container input[type="text"], .register-container input[type="email"], .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-container button {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .register-container button:hover {
            background-color: #555;
        }

        .register-container p {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .register-container p a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .register-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="register-container">
        <h2>Buat Akun AOU Fashion</h2>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Nama Pengguna" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <input type="hidden" name="role" value="user">
            <button type="submit" name="register">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
        
    </div>
</body>
</html>
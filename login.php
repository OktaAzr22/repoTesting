<?php
session_start();
include './db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Prepared Statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Simpan user ID ke dalam session
            $_SESSION['id_user'] = $row['id_user']; // Menggunakan id_user dari database
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header("Location: admin/index.php");
                exit();
            } else {
                header("Location: users/index.php");
                exit();
            }
        } else {
            echo "<script>
                    alert('Password tidak valid. Silakan coba lagi.');
                    window.location.href='login.php';
                 </script>";
        }
    } else {
        echo "<script>
                alert('Pengguna tidak ditemukan. Silakan coba lagi.');
                window.location.href='login.php';
             </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      /* Gaya Form Login */
/* Gaya Form Login */
body {
    font-family: 'Georgia', serif;
    margin: 0;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.login-container {
    width: 100%;
    max-width: 360px; /* Membatasi lebar maksimal form */
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    box-sizing: border-box;
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Georgia', serif;
    font-size: 24px;
    font-weight: bold; /* Membuat tulisan judul bold */
}

.login-container form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Memberikan jarak antar elemen form */
    font-weight: bold; /* Membuat teks di dalam form bold */
}

.login-container label {
    font-size: 14px;
    color: #333;
    font-weight: bold; /* Membuat label bold */
}

.login-container input, 
.login-container select {
    padding: 10px;
    font-size: 14px;
    font-weight: bold; /* Membuat placeholder dan teks input bold */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 100%; /* Menjaga agar input mengikuti lebar container */
}

.login-container input::placeholder {
    color: #aaa;
    font-style: italic;
    font-weight: bold; /* Membuat placeholder bold */
}

.login-container button {
    padding: 12px;
    font-size: 16px;
    font-weight: bold; /* Membuat tulisan pada tombol bold */
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.login-container button:hover {
    background-color: #555;
}

.login-container .error {
    color: red;
    margin-bottom: 15px;
    text-align: center;
    font-size: 14px;
    font-weight: bold; /* Membuat pesan error bold */
}

.login-container a {
    color: #6a1b9a;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
    font-weight: bold; /* Membuat link bold */
    display: block;
    margin-top: 10px;
}

.login-container a:hover {
    text-decoration: underline;
}

/* Mobile Responsive */
@media (max-width: 600px) {
    .login-container {
        padding: 15px;
        max-width: 90%; /* Memperlebar form untuk perangkat kecil */
    }
}


    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required>

        <label for="role">Login sebagai:</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <button type="submit" name="login">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Klik Disini</a></p>
   
</div>

</body>
</html>
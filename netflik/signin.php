<?php
session_start();
include("db.php");

// Query untuk mengambil semua data pengguna
if(!$dbb){
    die("koneksi gagal: ". mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="index.php"></a>
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global settings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .login-box {
            background-color: #000;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-box h2 {
            color: #ff0000;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .login-form .input-group {
            display: flex;
            align-items: center;
            background-color: #333;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px;
        }

        .login-form .input-group i {
            color: #ff0000;
            font-size: 18px;
            margin-right: 10px;
        }

        .login-form .input-box {
            width: 100%;
            position: relative;
        }

        .login-form .input-box input, 
        .login-form .input-box select {
            width: 100%;
            padding: 10px;
            background: none;
            border: none;
            outline: none;
            color: #fff;
            font-size: 16px;
        }

        .login-form .input-box label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #aaa;
            pointer-events: none;
            transition: 0.3s;
        }

        .login-form .input-box input:focus ~ label,
        .login-form .input-box input:valid ~ label,
        .login-form .input-box select:focus ~ label,
        .login-form .input-box select:valid ~ label {
            top: -10px;
            left: 10px;
            color: #ff0000;
            font-size: 12px;
        }

        .login-btn {
            background-color: #ff0000;
            border: none;
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background-color: #e60000;
        }

        .login-links {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-links a {
            color: #ff0000;
            text-decoration: none;
            margin: 0 10px;
        }

        .login-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Sign In</h2>
            <form action="index.php" method="POST" class="login-form">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <div class="input-box">
                        <input type="text" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <div class="input-box">
                        <input type="password" id="kata_sandi" name="kata_sandi" required>
                        <label for="kata_sandi">Kata Sandi</label>
                    </div>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <div class="input-box">
                        <select id="tipe_akun" name="tipe_akun" required>
                            <option value="" disabled selected>Pilih Tipe Akun</option>
                            <option value="Basic">Basic</option>
                            <option value="Premium">Premium</option>
                            <option value="VIP">VIP</option>
                        </select>
                        <label for="tipe_akun"></label>
                    </div>
                </div>
                <button type="submit" class="login-btn"> <a href=""></a>Sign In</button>
                <div class="login-links">
                    <a href="#">Forgot Password?</a>
                    
                </div>
                <div>
                    <?php 
                    if (isset($_POST['login-btn'])) {
                        $email = htmlspecialchars($_POST['email']);
                        $kata_sandi = htmlspecialchars($_POST['kata_sandi']);
                        $tipe_akun = htmlspecialchars($_POST['tipe_akun']);

                        $stmt = $dbb->prepare("SELECT * FROM pengguna where email=?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        $data = $result->fetch_assoc();
                        echo "<pre>";
                        print_r($data);
                        echo "</pre>";

                        if ($data){
                            if (password_verify($kata_sandi, $data['kata_sandi'])) {
                            $_SESSION['email'] = $data['email'];
                            $_SESSION['signin'] = true;
                            header('location: ../index.php');
                            exit();
                            } else{
                                echo "<div class= 'alert alert-warning' role='alert'>kata_sandi salah</div>";
                            }
                        }else{
                            echo "<div class= 'alert alert-warning' role='alert'>Akun tidak tersedia</div>";
                        }

                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
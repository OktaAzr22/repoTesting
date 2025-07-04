<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Styling dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #444;
            background-color: #333;
            color: #fff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #e50914;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #f6121d;
        }
        .additional-options {
            margin-top: 15px;
            text-align: center;
        }
        .additional-options a {
            color: #e50914;
            text-decoration: none;
            transition: color 0.3s;
        }
        .additional-options a:hover {
            color: #f6121d;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Masuk</h2>
        <form action="proces_masuk.php" method="POST">
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
                <a href="dashboard.php">Daftar</a>
            </div>
        </form>
    </div>
</body>
</html>
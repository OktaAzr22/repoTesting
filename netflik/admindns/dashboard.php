<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #000; color: #fff; }
        .container { max-width: 400px; margin: 100px auto; padding: 20px; background-color: #222; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"], select { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #444; background-color: #333; color: #fff; }
        button { width: 100%; padding: 10px; background-color: #e50914; border: none; border-radius: 5px; color: #fff; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #f6121d; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar</h2>
        <form action="proces_daftar.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="kata_sandi">Sandi</label>
                <input type="password" id="kata_sandi" name="kata_sandi" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
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
        .plan-details {
            background-color: #333;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .plan-details h3 {
            margin: 0;
            font-size: 1.1em;
        }
        .plan-details ul {
            margin: 10px 0 0 0;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
        }
        .plan-details ul li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar</h2>
        <form action="proses_daftar.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="kata_sandi">Sandi</label>
                <input type="password" id="kata_sandi" name="kata_sandi" placeholder="Masukkan kata sandi" required>
            </div>
          

            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
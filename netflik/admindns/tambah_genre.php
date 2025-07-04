<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Genre</title>
</head>
<body>
    <h1>Tambah Genre</h1>
    <form action="simpangenre.php" method="POST" enctype="multipart/form-data">
        <label for="nama_genre">Nama Genre:</label>
        <input type="text" id="nama_genre" name="nama_genre" required><br><br>

        <button type="submit" name="simpan">Simpan Genre</button>
    </form>
</body>
</html>
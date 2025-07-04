<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Movie</title>
</head>
<body>
    <h1>Tambah Movie</h1>
    <form action="simpanmovie.php" method="POST" enctype="multipart/form-data">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" required><br><br>

        <label for="durasi">Durasi:</label>
        <input type="time" id="durasi" name="durasi" required><br><br>

        <label for="sutradara">Sutradara:</label>
        <input type="text" id="sutradara" name="sutradara" required><br><br>

        <label for="tahun_rilis">Tahun Rilis:</label>
        <input type="number" id="tahun_rilis" name="tahun_rilis" min="1900" max="2100" required><br><br>

        <label for="rating">Rating:</label>
        <input type="rate" id="rating" name="rating" min="1" max="10" required><br><br>

        <label for="deskripsi">Deskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" required><br><br>

        <label for="url">URL Film:</label>
        <input type="url" id="url_video" name="url_video" required><br><br>


        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <button type="submit" name="simpan">Simpan Movie</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>
</head>
<body>
    <h1>Tambah Kategori</h1>
    <form action="simpanktgr.php" method="POST">
        <label for="nama">nama_kategori:</label>
        <input type="text" id="nama_kategori" name="nama_kategori" required><br><br>

        <label for="nama">nama_film:</label>
        <input type="text" id="nama_film" name="nama_film" required><br><br>


        <button type="submit">Simpan Kategori</button>
    </form>

    <?php 
    include("simpankategori.php");
    ?>

</body>
</html>





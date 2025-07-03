<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Produk - Admin</title>
    <link rel="stylesheet" href="style/admin_editproduk.css">
</head>
<body>
<?php

include '../db/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id_produk = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    echo "ID produk tidak ditemukan.";
    exit;
}
?>
<div class="container">
    <h1>Edit Produk</h1>
    <form action="proces_edit_produk.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <table class="form-table">
            <tr>
               <td><label for="nama_produk">Nama Produk</label></td>
                <td><input type="text" id="nama_produk" name="nama_produk" value="<?php echo $row['nama']; ?>" required /></td>
            </tr>
            <tr>
                <td> <label for="harga_produk">Harga Produk</label></td>
                <td><input type="number" id="harga_produk" name="harga_produk" value="<?php echo $row['harga']; ?>" required /></td>
            </tr>
            <tr>
                <td><label for="kategori">Kategori Produk</label></td>
                <td>
                <select id="kategori" name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                        <?php
                            $sql_kategori = "SELECT * FROM kategori";
                            $result_kategori = $conn->query($sql_kategori);
                            while ($row_kategori = $result_kategori->fetch_assoc()) {
                                // Cek apakah id kategori ini sama dengan id kategori produk
                                $selected = ($row_kategori['id'] == $row['id_kategori']) ? "selected" : "";
                                echo "<option value='" . $row_kategori['id'] . "' $selected>" . $row_kategori['nama_kategori'] . "</option>";
                            }
                        ?>
                </select>
                </td>
            </tr>
            <tr>
                <td><label for="stok_produk">Stok Produk</label></td>
                <td><input type="number" id="stok_produk" name="stok_produk" value="<?php echo $row['stok']; ?>" required /></td>
            </tr>
            <tr>
                <td><label for="diskon_produk">Diskon%</label></td>
                <td><input type="number" id="diskon_produk" name="diskon_produk" value="<?php echo $row['diskon']; ?>" /></td>
            </tr>
          
            <tr>
                <td><label for="gambar_produk">Ganti Gambar</label></td>
                <td><input type="file" id="gambar_produk" name="gambar_produk" accept="image/*"></td>
            </tr>
            <tr>
                <td><label for="deskripsi_produk">Deskripsi Produk</label></td>
                <td><textarea id="deskripsi_produk" name="deskripsi_produk" rows="4" required><?php echo $row['deskripsi_produk']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" class="submit-button" name="submit">Simpan Perubahan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit(); 
}
include '../db/config.php';

if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $harga_produk = $_POST['harga_produk'];
    $stok_produk = $_POST['stok_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $target_dir = "../uploads/";
    
    // Mengambil nama file asli
    $gambar_produk = $_FILES['gambar_produk']['name']; 
    $target_file = $target_dir . basename($gambar_produk); // Perbaiki penempatan $target_file

    // Validasi file
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check keaslian gambar
    $check = getimagesize($_FILES["gambar_produk"]["tmp_name"]);
    if ($check === false) {
        echo "<script>
               alert('Bukan Gambar Cuy');
               window.location.href = 'index.php';
             </script>";
        exit;
    }

    if ($_FILES["gambar_produk"]["size"] > 3 * 1024 * 1024) {
        echo "<script>
               alert('Maaf cuy, file yang diupload kegedean');
               window.location.href = 'index.php';
             </script>";
        exit;
    }

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {  
        echo "<script>
               alert('Maaf cuy, khusus JPG, JPEG, PNG');
               window.location.href = 'index.php';
             </script>";
        exit;
    }

    // Memindahkan file ke direktori tujuan
    if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
        // Menyimpan data produk ke dalam database
        $query = "INSERT INTO products (nama, id_kategori, harga, stok, deskripsi_produk, gambar_produk) VALUES ('$nama_produk', '$id_kategori', '$harga_produk', '$stok_produk', '$deskripsi_produk', '$gambar_produk')"; // Gunakan $gambar_produk di sini
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                   alert('Hore Produk Berhasil Ditambahkan Cuy!');
                   window.location.href = 'index.php';
                 </script>";
        } else {
            echo "<script>
                   alert('Gagal menambahkan produk: " . mysqli_error($conn) . "');
                   window.location.href = 'index.php';
                 </script>";
        }
    } else {
        echo "<script>
               alert('Gagal mengupload gambar Cuy.');
               window.location.href = 'index.php';
             </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Produk - Admin</title>
     <link rel="stylesheet" href="style/amin_addproduk.css">
</head>
<body>
  <?php include 'navbar_admin.php' ?>
<br>
  <br>
  <br>

    <div class="form-wrapper">
<div class="container">
    <h1>Tambah Produk</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="form-table">
            <tr>
                <td><label for="nama_produk">Nama Produk</label></td>
                <td><input type="text" id="nama_produk" name="nama_produk" required></td>
            </tr>
            <tr>
                <td><label for="harga_produk">Harga Produk</label></td>
                <td><input type="number" id="harga_produk" name="harga_produk" required></td>
            </tr>
            <label for="kategori">Kategori</label>

                <select id="kategori" name="id_kategori" required>
                    <option value="" ></option>
                        <?php
                            include'../db/config.php';
                                $sql_kategori = "SELECT * FROM kategori";
                                $result_kategori = $conn->query($sql_kategori);
                                while ($row_kategori = $result_kategori->fetch_assoc()) {
                                echo "<option value='" . $row_kategori['id'] . "'>" . $row_kategori['nama_kategori'] . "</option>";
                                }
                        ?>
                </select>
                <tr>
                    <td><label for="stok_produk">Stok Produk</label></td>
                    <td><input type="number" id="stok_produk" name="stok_produk" required></td>
                </tr>

                </tr>
            <tr>
                <td><label for="gambar_produk">Unggah Gambar</label></td>
                <td><input type="file" id="gambar_produk" name="gambar_produk" accept="image/*" required></td>
            </tr>
            
            <tr>
                <td><label for="deskripsi_produk">Deskripsi Produk</label></td>
                <td><textarea id="deskripsi_produk" name="deskripsi_produk" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" class="submit-button"  name="submit">Tambah Produk</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
</body>
</html>
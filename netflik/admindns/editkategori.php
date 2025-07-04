<?php
include ("COMPONENT/db.php");

// Ambil id_pengguna dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data pengguna berdasarkan id_pengguna
$query = "SELECT * FROM kategori WHERE id_kategori = '$id'";
$result = mysqli_query($dbb, $query);
$data = mysqli_fetch_array($result);

// Jika form disubmit
if (isset($_POST['update'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $nama_film = $_POST['nama_film'];

    // Query untuk mengupdate data pengguna
    $update_query = "UPDATE kategori SET 
                        nama_kategori = '$nama_kategori',
                        nama_film = '$nama_film'
                    WHERE id_kategori = '$id'";

    if (mysqli_query($dbb, $update_query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbb);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>
    <h2>Edit Kategori</h2>
    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama_kategori" value="<?php echo $data['nama_kategori']; ?>"><br>

        <label>Email:</label><br>
        <input type="text" name="nama_film" value="<?php echo $data['nama_film']; ?>"><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
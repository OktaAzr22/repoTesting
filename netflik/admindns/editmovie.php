<?php
include("COMPONENT/db.php");

// Ambil id_film dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data film berdasarkan id_film
$query = "SELECT * FROM movie WHERE id_movie = '$id'";
$result = mysqli_query($dbb, $query);
$data = mysqli_fetch_array($result);

// Jika form disubmit
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $durasi = $_POST['durasi'];
    $sutradara = $_POST['sutradara'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $rating = $_POST['rating'];
    $deskripsi = $_POST['deskripsi'];
    $url = $_POST['url_video'];
    
    // Mengelola upload foto
    $target_dir = "uploads/"; // Pastikan folder 'uploads' ada dan memiliki izin yang tepat
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek jika ada file foto yang diupload
    if (!empty($_FILES["foto"]["tmp_name"])) {
        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Cek ukuran file (maksimal 2MB)
        if ($_FILES["foto"]["size"] > 2000000) { // Batas ukuran file 2MB
            echo "Maaf, ukuran file terlalu besar. Maksimal 2MB.";
            $uploadOk = 0;
        }

        // Cek tipe file
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Cek apakah $uploadOk diset ke 0 oleh kesalahan
        if ($uploadOk == 0) {
            echo "Maaf, file tidak diupload.";
        } else {
            // Jika semua cek lolos, maka upload file
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // Query untuk mengupdate data film dengan foto
                $update_query = "UPDATE movie SET 
                                    judul = '$judul',
                                    durasi = '$durasi',
                                    sutradara = '$sutradara',
                                    tahun_rilis = '$tahun_rilis',
                                    rating = '$rating',
                                    deskripsi = '$deskripsi',
                                    url_video = '$url',
                                    foto = '$target_file'
                                WHERE id_movie = '$id'";

                if (mysqli_query($dbb, $update_query)) {
                    echo "<script>alert('Data berhasil diperbarui'); window.location='movies.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($dbb);
                }
            } else {
                echo "Maaf, ada kesalahan saat mengupload file.";
            }
        }
    } else {
        // Jika tidak ada file baru yang diupload, update data tanpa mengganti foto
        $update_query = "UPDATE movie SET 
                            judul = '$judul',
                            durasi = '$durasi',
                            sutradara = '$sutradara',
                            tahun_rilis = '$tahun_rilis',
                            rating = '$rating',
                            deskripsi = '$deskripsi',
                            url_video = '$url'
                        WHERE id_movie = '$id'";

        if (mysqli_query($dbb, $update_query)) {
            echo "<script>alert('Data berhasil diperbarui'); window.location='movies.php';</script>";
        } else {
            echo "Error: " . mysqli_error($dbb);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
</head>
<body>
    <h2>Edit Movie</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required><br>

        <label>Durasi:</label><br>
        <input type="time" name="durasi" value="<?php echo $data['durasi']; ?>" required><br>

        <label>Sutradara:</label><br>
        <input type="text" name="sutradara" value="<?php echo $data['sutradara']; ?>" required><br>

        <label>Tahun Rilis:</label><br>
        <input type="number" name="tahun_rilis" value="<?php echo $data['tahun_rilis']; ?>" required><br>

        <label>Rating:</label><br>
        <input type="rate" name="rating" value="<?php echo $data['rating']; ?>" required><br>

        <label>Deskripsi:</label><br>
        <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($data['deskripsi']); ?>" required><br>

        <label>URL Video:</label><br>
        <input type="url" name="url_video" value="<?php echo htmlspecialchars($data['url_video']); ?>" required><br>

        <label>Foto:</label><br>
        <input type="file" name="foto" accept="image/*"><br>
        <small>(Opsional: JPG, JPEG, PNG, GIF, maks 2MB)</small><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
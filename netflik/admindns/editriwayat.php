<?php
include("COMPONENT/db.php");

// Ambil id dari URL dan validasi
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan id
    $query = "SELECT * FROM riwayatt WHERE idriwayat = '$id'";
    $result = mysqli_query($dbb, $query);

    // Cek apakah hasil query ada
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        // Jika tidak ada data, tampilkan pesan dan alihkan
        echo "<script>alert('Data tidak ditemukan!'); window.location='riwayat_tonton.php';</script>";
        exit;
    }
} else {
    // Jika id tidak ada di URL, alihkan ke halaman lain
    echo "<script>alert('ID tidak valid!'); window.location='riwayat_tonton.php';</script>";
    exit;
}

// Jika form disubmit
if (isset($_POST['update'])) {
    $Nama_pengguna = $_POST['Nama_pengguna'];
    $film = $_POST['film'];
    $tanggal_tonton = $_POST['tanggal_tonton'];
    $durasi_tonton = $_POST['durasi_tonton'] . ':00'; // Tambahkan ':00' untuk memenuhi format TIME

    if (preg_match('/^\d{2}:\d{2}:\d{2}$/', $durasi_tonton)) {
    // Format valid
} 

    // Query untuk update data
    $update_query = "UPDATE riwayatt SET 
                        namaa_pengguna = '$namaapengguna', 
                        Filmm = '$Filmm',
                        tanggaltonton = '$tanggaltonton', 
                        durasitonton = '$durasitonton' 
                     WHERE idriwayat = '$id'";

    // Eksekusi query update
    if (mysqli_query($dbb, $update_query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='riwayat_tonton.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbb);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Tonton</title>
</head>
<body>
    <h2>Edit Film</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Nama pengguna:</label><br>
<input type="text" name="Nama_pengguna" value="<?php echo htmlspecialchars($data['Nama_pengguna']); ?>" required><br>

<label>Film:</label><br>
<input type="text" name="film" value="<?php echo htmlspecialchars($data['film']); ?>" required><br>


        <label>Tanggal Tonton:</label><br>
        <input type="date" name="tanggal_tonton" value="<?php echo htmlspecialchars($data['tanggal_tonton']); ?>" required><br>

        <label>Durasi Tonton:</label><br>
        <input type="time" name="durasi_tonton" value="<?php echo htmlspecialchars($data['durasi_tonton']); ?>" required><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

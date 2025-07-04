<?php
include("COMPONENT/db.php");

// Cek jika ada ID yang diberikan
if (isset($_GET['id_pengguna']) && !empty($_GET['id_pengguna'])) {
    $id = $_GET['id_pengguna'];

    // Ambil data pengguna berdasarkan ID
    $query = "SELECT * FROM pengguna WHERE id_pengguna = ?";
    $stmt = $dbb->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Pengguna tidak ditemukan.";
        exit;
    }
} else {
    echo "ID pengguna tidak diberikan.";
    exit;
}

// Proses saat formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tanggal_bergabung = $_POST['tanggal_bergabung'];

    // Update data pengguna
    $updateQuery = "UPDATE pengguna SET nama = ?, email = ?, , tanggal_bergabung = ? WHERE id_pengguna = ?";
    $updateStmt = $dbb->prepare($updateQuery);
    // Menggunakan $id untuk mengupdate
    $updateStmt->bind_param("ssssi", $nama, $email,  $tanggal_bergabung, $id);

    if ($updateStmt->execute()) {
        header("Location: pengguna.php"); // Arahkan kembali ke daftar pengguna
        exit;
    } else {
        echo "Gagal memperbarui pengguna.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required><br><br>

        <label for="tanggal_bergabung">Tanggal Bergabung:</label>
        <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" value="<?php echo htmlspecialchars($data['tanggal_bergabung']); ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
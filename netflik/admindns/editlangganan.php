<?php
include("COMPONENT/db.php");

// Cek jika ada ID yang diberikan
if (isset($_GET['id_langganan']) && !empty($_GET['id_langganan'])) {
    $id = $_GET['id_langganan'];

    // Ambil data pengguna berdasarkan ID
    $query = "SELECT * FROM langganan WHERE id_langganan = ?";
    $stmt = $dbb->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "langganan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID langganan tidak diberikan.";
    exit;
}

// Proses saat formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengguna = $_POST['nama_pengguna'];
    $nama_admin = $_POST['nama_admin'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];

    // Update data pengguna
    $updateQuery = "UPDATE langganan SET nama_pengguna = ?, nama_admin = ?, tanggal_mulai = ?, tanggal_berakhir = ? WHERE id_langganan = ?";
    $updateStmt = $dbb->prepare($updateQuery);
    // Menggunakan $id untuk mengupdate
    $updateStmt->bind_param("ssssi", $nama_pengguna, $nama_admin, $tanggal_mulai, $tanggal_berakhit, $id);

    if ($updateStmt->execute()) {
        header("Location: langganan.php"); // Arahkan kembali ke daftar pengguna
        exit;
    } else {
        echo "Gagal memperbarui langganan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Langganan</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="" method="POST">
        <label for="nama">Nama_Pengguna:</label>
        <input type="text" id="nama_pengguna" name="nama_pengguna" value="<?php echo htmlspecialchars($data['nama_pengguna']); ?>" required><br><br>

        <label for="email">Nama_Admin:</label>
        <input type="text" id="nama_admin" name="nama_admin" value="<?php echo htmlspecialchars($data['nama_admin']); ?>" required><br><br>

        <label for="tanggal_bergabung">Tanggal Berakhir:</label>
        <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" value="<?php echo htmlspecialchars($data['tanggal_berakhir']); ?>" required><br><br>

        <label for="tanggal_bergabung">Tanggal Berakhir:</label>
        <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" value="<?php echo htmlspecialchars($data['tanggal_berakhir']); ?>" required><br><br>


        <label for="status_langganan">Status Langganan:</label>
        <select id="status_langganan" name="status_langganan" required>
            <option value="aktif" <?php echo $data['status_langganan'] == 'Basic' ? 'selected' : ''; ?>>aktif</option>
            <option value="nonaktif" <?php echo $data['status_langganan'] == 'VIP' ? 'selected' : ''; ?>>nonaktif</option>
        </select><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
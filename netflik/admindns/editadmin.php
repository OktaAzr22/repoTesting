<?php
include("COMPONENT/db.php");

// Cek jika ada ID yang diberikan
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pengguna berdasarkan ID
    $query = "SELECT * FROM admin WHERE id = ?";
    $stmt = $dbb->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Admin tidak ditemukan.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID admin tidak diberikan.";
    exit;
}

// Proses saat formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kata_sandi = password_hash($_POST['kata_sandi'], PASSWORD_DEFAULT); // Menggunakan hash untuk password

    // Update data Admin
    $updateQuery = "UPDATE admin SET nama = ?, email = ?, kata_sandi = ? WHERE id = ?";
    $updateStmt = $dbb->prepare($updateQuery);
    $updateStmt->bind_param("sssi", $nama, $email, $kata_sandi, $id);

    if ($updateStmt->execute()) {
        header("Location: admin.php"); // Arahkan kembali ke daftar admin
        exit;
    } else {
        echo "Gagal memperbarui admin.";
    }

    $updateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
</head>
<body>
    <h1>Edit Admin</h1>
    <form action="" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required><br><br>

        <label for="kata_sandi">Kata Sandi:</label>
        <input type="password" id="kata_sandi" name="kata_sandi" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
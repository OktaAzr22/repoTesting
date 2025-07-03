<?php
session_start();
include '../db/config.php';

// Cek apakah ID order ada di URL
if (!isset($_GET['id_order'])) {
    header("Location: ../index.php"); // Redirect jika tidak ada ID order
    exit();
}

$id_order = $_GET['id_order'];

// Ambil data pesanan berdasarkan ID order
$query = "SELECT status, alamat_pengiriman, catatan FROM orders WHERE id_order = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_order);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

// Jika data tidak ditemukan, redirect
if (!$order) {
    header("Location: ../index.php");
    exit();
}

// Variabel untuk ditampilkan
$status = $order['status'];
$alamat_pengiriman = $order['alamat_pengiriman'];
$catatan = $order['catatan'];

// Simpan data jika form di-submit
$show_message = false; // Variabel untuk menampilkan pesan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alamat_pengiriman = $_POST['alamat_pengiriman'];
    $catatan = $_POST['catatan'];

    // Update data ke database
    $update_query = "UPDATE orders SET alamat_pengiriman = ?, catatan = ? WHERE id_order = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $alamat_pengiriman, $catatan, $id_order);

    if ($update_stmt->execute()) {
        $show_message = true; // Tampilkan pesan setelah berhasil disimpan
    } else {
        $error_message = "Gagal memperbarui data. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #c19a6b;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            color: #a0522d;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .info-box {
            text-align: left;
            margin-bottom: 20px;
        }

        .info-box label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .info-box textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #a0522d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #c19a6b;
        }

        .message-box {
            margin-top: 20px;
        }

        .success-message {
            color: green;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($show_message): ?>
            <h1>Data Berhasil Disimpan!</h1>
            <p>Status pesanan Anda saat ini adalah:</p>
            <h2><?php echo htmlspecialchars($status); ?></h2>
            <a href="index.php" class="btn">Selesai</a>
        <?php else: ?>
            <h1>Detail Pesanan</h1>
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="info-box">
                    <label for="alamat_pengiriman">Alamat Pengiriman:</label>
                    <textarea name="alamat_pengiriman" id="alamat_pengiriman" rows="4"><?php echo htmlspecialchars($alamat_pengiriman); ?></textarea>
                </div>

                <div class="info-box">
                    <label for="catatan">Catatan:</label>
                    <textarea name="catatan" id="catatan" rows="4"><?php echo htmlspecialchars($catatan); ?></textarea>
                </div>

                <button type="submit" class="btn">Simpan</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

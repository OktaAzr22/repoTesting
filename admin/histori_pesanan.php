<?php
include '../db/config.php';

$filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';

$sql = "SELECT orders.*, users.username FROM orders JOIN users ON orders.id_user = users.id_user";
if (!empty($filter_status)) {
    $sql .= " WHERE orders.status = '$filter_status'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            color: #444;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .filter-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .filter-container select {
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #fff;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #1e88e5;
            color: #ffffff;
        }

        thead th {
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f5fa;
            cursor: pointer;
        }

        tbody td {
            padding: 12px 15px;
            font-size: 14px;
            text-align: left;
        }

        .status-pending {
            color: #f39c12;
            font-weight: bold;
        }

        .status-approved {
            color: #27ae60;
            font-weight: bold;
        }

        .status-rejected {
            color: #e74c3c;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Histori Pesanan</h1>

        <!-- Filter Dropdown -->
        <div class="filter-container">
            <form method="GET" action="">
                <label for="filter_status"></label>
                <select name="filter_status" id="filter_status" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="Pending" <?php if ($filter_status == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Approved" <?php if ($filter_status == 'Approved') echo 'selected'; ?>>Approved</option>
                    <option value="Rejected" <?php if ($filter_status == 'Rejected') echo 'selected'; ?>>Rejected</option>
                </select>
            </form>
        </div>

        <!-- Tabel Histori -->
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Total Harga</th>
                    <th>Tanggal Order</th>
                    <th>Alamat Pengiriman</th>
                    <th>Catatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";     
                        echo "<td>Rp" . number_format($row['total_harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . htmlspecialchars($row['tanggal_order']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat_pengiriman']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
                        echo "<td class='status-" . strtolower($row['status']) . "'>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='text-align: center; font-style: italic; color: #999;'>Tidak ada data cuy.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Tutup koneksi
    $conn->close();
    ?>
</body>
</html>

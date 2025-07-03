<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <title> Produk - Admin</title>
   <style type="text/css">


 body {
            margin: 0;
            font-family: 'Georgia', serif; /* Gaya vintage dengan font serif */
            background-color: #f5f5f5; /* Warna latar belakang terang */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

      h2 {
      text-align: center; /* Untuk memposisikan teks di tengah secara horizontal */
      font-size: 24px; /* Ukuran teks */
      font-weight: bold; /* Ketebalan teks */
      color: #333; /* Warna teks */
      margin: 20px 0; /* Jarak atas dan bawah */
    }



    /* Grid Layout for Products */
    /* Tabel Styling */
.table-container {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.table th {
    background-color: #333;
    color: #fff;
    font-weight: bold;
}

.table td img {
    max-width: 100px;
    height: auto;
    border-radius: 4px;
}

.table .action-buttons a {
    margin: 0 5px;
    text-decoration: none;
}

.table .action-buttons .btn-edit {
    background-color: #ffc107;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
}

.table .action-buttons .btn-delete {
    background-color: #dc3545;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
}

.table .action-buttons .btn-edit:hover {
    background-color: #e0a800;
}

.table .action-buttons .btn-delete:hover {
    background-color: #c82333;
}

   </style>
</head>
<body>
  <?php
    include '../db/config.php';
    include '../pages/auth.php';

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
  ?>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Diskon (%)</th>
                <th>Harga Diskon</th>
                <th>Jumlah Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <img src="../uploads/<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['nama']; ?>">
                </td>
                <td><?php echo $row['nama']; ?></td>
                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                <td>
                    <?php echo ($row['diskon'] > 0) ? $row['diskon'] . '%' : '-'; ?>
                </td>
                <td>
                    <?php 
                    if ($row['diskon'] > 0) {
                        echo 'Rp ' . number_format($row['harga_diskon'], 0, ',', '.');
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
                <td><?php echo $row['stok']; ?></td> <!-- Menampilkan jumlah stok -->
                <td class="action-buttons">
                    <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>" class="btn-edit">Edit</a>
                    <a href="delete_product.php?id_produk=<?php echo $row['id_produk']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="btn-delete">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="8">Tidak ada produk yang ditambahkan.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("COMPONENT/db.php");

// Query untuk mengambil semua data film
$query = "SELECT * FROM riwayat_tonton";
$result = mysqli_query($dbb, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Riwayat Tonton</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Daftar Riwayat Tonton</h2>
        <a href="tambahriwayat.php" class="btn btn-primary mb-3">Tambah Riwayat</a>
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th>ID Riwayat</th>
                    <th>Nama_Pengguna</th>
                    <th>Film</th>
                    <th>Tanggal_Tonton</th>
                    <th>Durasi_Tonton</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $data['id_riwayat']; ?></td> 
                        <td><?php echo $data['namaa_pengguna']; ?></td>
                        <td><?php echo $data['film']; ?></td> 
                        <td><?php echo $data['tanggal_tonton']; ?></td>
                        <td><?php echo $data['durasi_tonton']; ?></td>
                        <td>
                            <a href="editriwayat.php?id=<?php echo $data['id_riwayat']; ?>" class="btn btn-warning btn-sm">Edit</a> 
                            
                            <a href="hapusriwayat.php?id=<?php echo $data['id_riwayat']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
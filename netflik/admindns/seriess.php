<?php
include("COMPONENT/db.php");

// Query untuk mengambil semua data film
$query = "SELECT * FROM seriess";
$result = mysqli_query($dbb, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Series</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Daftar Series</h2>
        <a href="tambah_seriess.php" class="btn btn-primary mb-3">Tambah Series</a>
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Durasi</th>
                    <th>Sutradara</th>
                    <th>Tahun Rilis</th>
                    <th>Rating</th>
                    <th>deskripsi</th>
                    <th>URL</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><img src="<?php echo $data['foto']; ?>" alt="Foto" style="width: 100px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($data['judul']); ?></td>
                        <td><?php echo htmlspecialchars($data['durasi']); ?></td>
                        <td><?php echo htmlspecialchars($data['sutradara']); ?></td>
                        <td><?php echo htmlspecialchars($data['tahun_rilis']); ?></td>
                        <td><?php echo htmlspecialchars($data['rating']); ?></td>
                        <td><?php echo htmlspecialchars($data['deskripsi']); ?></td>
                        <td>
                            <?php if (!empty($data['url_video']) && filter_var($data['url_video'], FILTER_VALIDATE_URL)) { ?>
                                <a href="<?php echo htmlspecialchars($data['url_video']); ?>" target="_blank">Lihat Video</a>
                            <?php } else { ?>
                                <span>Tidak Ada URL</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="editseriess.php?id=<?php echo $data['id_seriess']; ?>" class="btn btn-warning btn-sm">Edit</a> 
                            
                            <a href="hapusseriess.php?id=<?php echo $data['id_seriess']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?');">Hapus</a>
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
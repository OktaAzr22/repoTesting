<?php
include("db.php"); // Menghubungkan file koneksi

// Cek apakah ada parameter query dalam URL
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($dbb, $_GET['query']); // Mengamankan input dari user

    // Query untuk mencari film berdasarkan judul
    $sql = "SELECT * FROM film WHERE judul LIKE '%$query%'";
    $result = mysqli_query($dbb, $sql);
    
    // Mulai HTML untuk hasil pencarian
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasil Pencarian - Flix</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h2>Hasil Pencarian untuk: <?php echo htmlspecialchars($query); ?></h2>
        <a href="index.php" class="btn btn-primary mb-3">Kembali</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Judul</th>
                <th>Durasi</th>
                <th>Sutradara</th>
                <th>Tahun Rilis</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . htmlspecialchars($data['foto']) . "' alt='Foto' style='width: 100px; height: auto;'></td>";
                    echo "<td>" . htmlspecialchars($data['judul']) . "</td>";
                    echo "<td>" . htmlspecialchars($data['durasi']) . " menit</td>";
                    echo "<td>" . htmlspecialchars($data['sutradara']) . "</td>";
                    echo "<td>" . htmlspecialchars($data['tahun_rilis']) . "</td>";
                    echo "<td>" . htmlspecialchars($data['rating']) . "</td>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada hasil untuk: " . htmlspecialchars($query) . "</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "<h2>Silakan masukkan pencarian</h2>";
}
?>
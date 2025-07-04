<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Langganan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Tambah Langganan</h1>
        <form action="simpanlgg.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama_Pengguna</label>
                <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama_Admin:</label>
                <input type="text" id="nama_admin" name="nama_admin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal_Mulai:</label>
                <input type="date" id="tanggal_mulai" name="tanggal_berakhir" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir:</label>
                <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status_langganan">Status Langganan:</label>
                <select id="status_langganan" name="status_langganan" class="form-control" required>
                    <option value="aktif">aktif</option>
                    <option value="nonaktif">nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Pengguna</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
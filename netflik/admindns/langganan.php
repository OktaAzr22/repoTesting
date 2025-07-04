<?php include('header.php'); ?>

<body>
    <div class="container">
        <h2 class="mt-4">Daftar Langganan</h2>
        <a href="simpanlangganan.php" class="btn btn-primary mb-3">Tambah Pengguna</a>
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th>ID_Langganan</th>
                    <th>Nama_Pengguna</th>
                    <th>Nama_Admin</th>
                    <th>Tanggal_mulai/th>
                    <th>Tanggal_Berakhir</th>
                    <th>Status_Langganan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("COMPONENT/db.php");

                // Query untuk mengambil semua data pengguna
                $query = "SELECT * FROM langganan";
                $result = mysqli_query($dbb, $query);

                // Cek jika hasil query ada
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($data['id_langganan']) . '</td>'; // Menampilkan ID
                        echo '<td>' . htmlspecialchars($data['nama_pengguna']) . '</td>'; // Menampilkan nama
                        echo '<td>' . htmlspecialchars($data['nama_admin']) . '</td>'; // Menampilkan email
                        echo '<td>' . htmlspecialchars($data['tanggal_mulai']) . '</td>'; // Menampilkan tipe akun
                        echo '<td>' . htmlspecialchars($data['tanggal_berakhir']) . '</td>'; 
                        echo '<td>' . htmlspecialchars($data['status_langganan']) . '</td>';
                        echo '<td>
                                <a href="editlangganan.php?id_langganan=' . htmlspecialchars($data['id_langganan']) . '" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapuslangganan.php?id_langganan=' . htmlspecialchars($data['id_langganan']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus pengguna ini?\');">Hapus</a>
                              </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">Tidak ada data pengguna.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
</body>
</html>
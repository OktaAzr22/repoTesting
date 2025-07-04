<?php include('header.php'); ?>

<body>
    <div class="container">
        <h2 class="mt-4">Daftar Admin</h2>
        <a href="simpanadmin.php" class="btn btn-primary mb-3">Tambah Admin</a>
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("COMPONENT/db.php");

                // Query untuk mengambil semua data pengguna
                $query = "SELECT * FROM admin";
                $result = mysqli_query($dbb, $query);

                // Cek jika hasil query ada
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($data['id']) . '</td>'; // Menampilkan ID
                        echo '<td>' . htmlspecialchars($data['nama']) . '</td>'; // Menampilkan nama
                        echo '<td>' . htmlspecialchars($data['email']) . '</td>'; // Menampilkan email
                        echo '<td>
                                <a href="editadmin.php?id=' . htmlspecialchars($data['id']) . '" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapusadmin.php?id=' . htmlspecialchars($data['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus pengguna ini?\');">Hapus</a>
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
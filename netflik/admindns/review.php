<?php include('header.php'); ?>

<body>
    <div class="container mt-5">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manajemen Ulasan</h4>
                    <table class="table table-bordered table-hover">
                        <thead class="table-info text-center">
                            <tr>
                                <th>ID_Ulasan</th>
                                <th>Username</th>
                                <th>Ulasan</th>
                                <th>Tanggal Ulasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Sertakan koneksi database
                            include("COMPONENT/db.php");

                            // Query data ulasan
                            $query = "SELECT * FROM reviews ORDER BY date DESC";
                            $result = mysqli_query($dbb, $query);

                            // Validasi hasil query
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td class="text-center">' . htmlspecialchars($data['id_review']) . '</td>';
                                    echo '<td>' . htmlspecialchars($data['username']) . '</td>';
                                    echo '<td>' . htmlspecialchars($data['comment']) . '</td>';
                                    echo '<td class="text-center">' . htmlspecialchars($data['date']) . '</td>';
                                    echo '<td class="text-center">';
                                    echo '<a href="hapusreview.php?id_review=' . $data['id_review'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus ulasan ini?\')">Hapus</a>';

                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                echo '<td colspan="7" class="text-center text-danger">Tidak ada data ulasan</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
</body>
</html>

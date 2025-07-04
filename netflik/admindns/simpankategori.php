<?php include ('header.php'); ?>

<body>
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kategori</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-info">
                            <th>id_kategori</th>
                            <th>nama_kategori</th>
                            <th>nama_film</th>
                            <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ("COMPONENT/db.php");

                        // Query untuk mengambil semua data pengguna
                        $query = "SELECT * FROM kategori";
                        $result = mysqli_query($dbb, $query);

                        // Looping untuk menampilkan data
                        while ($data = mysqli_fetch_array($result)) {
                            echo '<tr class="table-danger">';
                            echo '<td class="table-warning">'.$data['id_kategori']."</td>";
                            echo '<td class="table-success">'.$data['nama_kategori']."</td>";
                            echo '<td class="table-primary">'.$data['nama_film']."</td>";
                            // Tambahkan kolom untuk aksi edit dan hapus
                            echo '<td>
                                    <a href="editkategori.php?id='.$data['id_kategori'].'" ">Edit</a>
                                    <a href="hapuskategori.php?id='.$data['id_kategori'].'"onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>
                                  </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
</body>
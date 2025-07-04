<?php include ('header.php'); ?>

<body>
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Genre</h4>
                <a href="tambah_genre.php" class="btn btn-primary mb-3">Tambah Genre</a>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-info">
                            <th>Nama Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("COMPONENT/db.php");

                        $query = "SELECT * FROM genre";
                        $result = mysqli_query($dbb, $query);

                        while ($data = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td class="table-success">' . htmlspecialchars($data['nama_genre']) . '</td>';
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
</html>
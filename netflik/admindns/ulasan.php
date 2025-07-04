<?php include ('header.php'); ?>

  <body>
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ulasan</h4>
                    <table class="table table-bordered">
                      <thead>
                          <tr class="table-info">
                            <th>id_ulasan</th>
                            <th>id_pengguna</th>
                            <th>id_film</th>
                            <th>isi_ulasan</th>
                            <th>tanggal_ulasan</th>
                            <th>rating</th>
                          </tr>
                        </thead>
                        <?php
                        include ("COMPONENT/db.php");

                        $query = "select * from ulasan";
                        $result = mysqli_query($dbb, $query);

                        while ($data = mysqli_fetch_array ($result)) {
                        echo '<tr class = "table-danger">';
                        echo '<td class = "table-warning">'.$data['id_ulasan']. "</td>";
                        echo '<td class = "table-success">'.$data['id_pengguna']. "</td>";
                        echo '<td>'.$data['id_film']. "</td>";
                        echo '<td class = "table-primary">'.$data['isi_ulasan']. "</td>";
                        echo '<td>'.$data['tanggal_ulasan']. "</td>";
                        echo '<td>'.$data['rating']. "</td>";
                        echo '</tr>';
                        }
                      ?>
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
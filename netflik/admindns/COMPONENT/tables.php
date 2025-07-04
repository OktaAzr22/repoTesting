<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th> Type </th>
                            <th> Genre </th>
                          </tr>
                        </thead>
                        <?php
                        include ("COMPONENT/db.php");

                        $query = "select * from flix";
                        $result = mysqli_query($dbb, $query);

                        while ($data = mysqli_fetch_array ($result)) {
                        echo '<tr>';
                        echo '<td>'.$data['ID']. "</td>";
                        echo '<td>'.$data['Title']. "</td>";
                        echo '<td>'.$data['Type']. "</td>";
                        echo '<td>'.$data['Genre']. "</td>";
                        echo '</tr>';
                        }
                      ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
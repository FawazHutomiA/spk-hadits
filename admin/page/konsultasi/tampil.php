<div class="panel panel-default">
  <div class="panel-heading"><strong>DATA KONSULTASI TAKHRIJ HADIST</strong></div>
  <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <td width="30px"><strong> No. </strong></td>
            <td width="80px"><strong> Tanggal </strong></td>
            <td width="400px"><strong> Nama </strong></td>
            <td width="100px"><strong> Hasil </strong></td>
            <td width="80px"><strong> Detail </strong></td>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $sql = "SELECT*FROM konsultasi ORDER BY idkonsultasi DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td> <?php echo $i++; ?> </td>
              <td> <?php echo $row["tanggal"]; ?> </td>
              <td> <?php echo $row["nama"]; ?> </td>
              <td> <?php echo $row["hasil"]; ?> </td>
              <td align="center">
                <a href="?page=konsultasi&action=detail&idkonsultasi=<?php echo $row['idkonsultasi']; ?>" class="btn btn-info">
                  <span class="glyphicon glyphicon-list-alt"></span>
                </a>
              </td>
            </tr>
          <?php
              }
              mysqli_close($conn);
          ?>
        </tbody>
        </table>
    </div>
  </div>
</div>


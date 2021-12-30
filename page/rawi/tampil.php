<div class="panel panel-default">
  <div class="panel-heading"><strong>DATA RAWI</strong></div>
  <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <td width="30px"><strong> No. </strong></td>
            <td width="400px"><strong> Nama Rawi </strong></td>
            <td width="80px"><strong> Tahun Lahir </strong></td>
            <td width="80px"><strong> Tahun Wafat </strong></td>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $sql = "SELECT*FROM rawi";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td> <?php echo $i++; ?> </td>
              <td> <?php echo $row["nmrawi"]; ?> </td>
              <td> <?php echo $row["thn_lahir"]; ?> </td>
              <td> <?php echo $row["thn_wafat"]; ?> </td>
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


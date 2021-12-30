<div class="panel panel-default">
  <div class="panel-heading"><strong>DATA BASIS ATURAN</strong></div>
  <div class="panel-body">
    <a href="?page=aturan&action=tambah" class="btn btn-primary" style="margin-bottom: 20px">
    <span class="glyphicon glyphicon-plus"></span> Tambah
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <td width="30px"><strong> No. </strong></td>
            <td><strong> Keterangan </strong></td>
            <td width="150px"></td>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $sql = "SELECT * FROM aturan";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td> <?php echo $i++; ?> </td>
              <td> <?php echo $row["ket"];?></td>
              <td align="center">
                <a href="?page=aturan&action=detail&idaturan=<?php echo $row["idaturan"]; ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-list-alt"></span>
                </a>
                <a href="?page=aturan&action=update&idaturan=<?php echo $row["idaturan"]; ?>" class="btn btn-warning">
                    <span class="glyphicon glyphicon-wrench"></span>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" href="?page=aturan&action=hapus&idaturan=<?php echo $row["idaturan"]; ?>" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php
              }
          ?>
        </tbody>
        </table>
    </div>
  </div>
</div>


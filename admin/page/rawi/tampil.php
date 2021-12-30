<?php
  if($_GET["msg"]=="ada"){
  ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Data tidak boleh dihapus, karena sudah digunakan</strong>
  </div>
<?php
  }
?>

<div class="panel panel-default">
  <div class="panel-heading"><strong>DATA RAWI</strong></div>
  <div class="panel-body">
    <a href="?page=rawi&action=tambah" class="btn btn-primary" style="margin-bottom: 20px">
    <span class="glyphicon glyphicon-plus"></span> Tambah
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <td width="30px"><strong> No. </strong></td>
            <td width="400px"><strong> Nama Rawi </strong></td>
            <td width="80px"><strong> Tahun Lahir </strong></td>
            <td width="80px"><strong> Tahun Wafat </strong></td>
            <td width="80px"></td>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $sql = "SELECT*FROM rawi ORDER BY nmrawi ASC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td> <?php echo $i++; ?> </td>
              <td> <?php echo $row["nmrawi"]; ?> </td>
              <td> <?php echo $row["thn_lahir"]; ?> </td>
              <td> <?php echo $row["thn_wafat"]; ?> </td>
              <td align="center">
                <a href="?page=rawi&action=update&idrawi=<?php echo $row['idrawi']; ?>" class="btn btn-warning">
                    <span class="glyphicon glyphicon-wrench"></span>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" href="?page=rawi&action=hapus&idrawi=<?php echo $row['idrawi']; ?>" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
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


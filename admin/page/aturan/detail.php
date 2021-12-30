<?php 
$idaturan=$_GET["idaturan"];
$sql = "SELECT * FROM aturan WHERE idaturan='$idaturan'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)
?>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <form method="POST">
      <div class="panel panel-default">
        <div class="panel panel-heading"><strong>DETAIL DATA BASIS ATURAN</strong></div>
        <div class="panel-body">
          <div class="form-group">
            <label>Keterangan : </label>
            <input class="form-control" name="nama" value="<?php echo $row["ket"]; ?>" readonly>
          </div>
          <div class="table-responsive">
                <table class="table table-striped table-bordered" id="">
                <thead>
                <tr>
                    <td width="30px"><strong> No. </strong></td>
                    <td><strong> Nama Rawi </strong></td>
                    <td><strong> Tahun Lahir </strong></td>
                    <td><strong> Tahun Wafat </strong></td>
                    <td><strong> Adil </strong></td>
                    <td><strong> Tsiqah </strong></td>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    $sql = "SELECT detail_aturan.idaturan,detail_aturan.idrawi,rawi.nmrawi,rawi.thn_lahir,rawi.thn_wafat,detail_aturan.adil,detail_aturan.tsiqah
                            FROM detail_aturan INNER JOIN rawi ON detail_aturan.idrawi=rawi.idrawi WHERE idaturan='$idaturan'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row["nmrawi"]; ?> </td>
                    <td> <?php echo $row["thn_lahir"]; ?> </td>
                    <td> <?php echo $row["thn_wafat"]; ?> </td>
                    <td> <?php echo $row["adil"]; ?> </td>
                    <td> <?php echo $row["tsiqah"]; ?> </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
            </div>
            <a class="btn btn-danger" href="?page=aturan">Kembali</a>
        </div>
      </div>
    </form>
  </div>
</div> 

<?php
mysqli_close($conn);
?>
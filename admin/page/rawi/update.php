<?php 
$idrawi=$_GET["idrawi"];
$sql = "SELECT*FROM rawi WHERE idrawi='$idrawi'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>UPDATE DATA RAWI</strong></div>
        <div class="panel-body">
          <div class="form-group">
              <label>Nama Rawi :</label>
              <input type="text" class="form-control" value="<?php echo $row['nmrawi'] ?>" name="nama" maxlength="100" autocomplete="off" required>
          </div>   
          <div class="form-group">
              <label>Tahun Lahir :</label>
              <input type="text" class="form-control" value="<?php echo $row['thn_lahir'] ?>" name="lahir" maxlength="7" autocomplete="off" required>
          </div>  
          <div class="form-group">
              <label>Tahun Wafat :</label>
              <input type="text" class="form-control" value="<?php echo $row['thn_wafat'] ?>" name="wafat" maxlength="7" autocomplete="off" required>
          </div>  
          <input class="btn btn-primary" type="submit" name="update" value="Update" >
          <a href="?page=rawi&msg=" class="btn btn-danger">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
if (isset($_POST["update"])){
  $nama=$_POST["nama"];
  $lahir=$_POST["lahir"];
  $wafat=$_POST["wafat"];

  $sql="UPDATE rawi SET nmrawi='$nama',thn_lahir='$lahir',thn_wafat='$wafat' WHERE idrawi='$idrawi'";
  if (mysqli_query($conn, $sql)){
    header("location:index.php?page=rawi&msg=");
  }
}
mysqli_close($conn);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>INPUT DATA RAWI</strong></div>
        <div class="panel-body">
          <div class="form-group">
              <label>Nama Rawi :</label>
              <input type="text" class="form-control" name="nama" maxlength="100" autocomplete="off" required>
          </div>   
          <div class="form-group">
              <label>Tahun Lahir :</label>
              <input type="text" class="form-control" name="lahir" maxlength="7" autocomplete="off" required>
          </div>  
          <div class="form-group">
              <label>Tahun Wafat :</label>
              <input type="text" class="form-control" name="wafat" maxlength="7" autocomplete="off" required>
          </div>  
          <input class="btn btn-primary" type="submit" name="simpan" value="Simpan" >
          <a href="?page=rawi&msg=" class="btn btn-danger">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
if (isset($_POST['simpan'])){
    $nama=$_POST["nama"];
    $lahir=$_POST["lahir"];
    $wafat=$_POST["wafat"];

    $sql = "SELECT*FROM rawi WHERE nmrawi='$nama'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        ?>
            <script>alert("Nama rawi sudah ada");</script>    
        <?php
    }else{
        $sql = "INSERT INTO rawi VALUES(Null,'$nama','$lahir','$wafat')";
        if (mysqli_query($conn, $sql)){
            header("location:index.php?page=rawi&msg=");
        }
    }
}
mysqli_close($conn);
?>
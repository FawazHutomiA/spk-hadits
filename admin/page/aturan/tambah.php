<?php

if (isset($_POST['simpan'])){

  $idrawi = $_POST['idrawi'];
  $ket = $_POST['ket'];

  $sql = "SELECT * FROM aturan WHERE ket='$ket'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
      ?>
        <script>alert("Keterangan aturan sudah digunakan");</script>  
      <?php
    }else{
      
      $sql = "INSERT INTO aturan VALUES(Null,'$ket')";
      mysqli_query($conn, $sql);
    
      $sql = "SELECT idaturan FROM aturan ORDER BY idaturan DESC";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $idaturane=$row["idaturan"];
      
      $i = 0;
      $prawi = count($idrawi);
      while ($i < $prawi)
      {
        $idrawie=$idrawi[$i];
        $adile=$adil[$i];
        $tsiqahe=$tsiqah[$i];
        $sql = "INSERT INTO detail_aturan VALUES('$idaturane','$idrawie','Ya','Ya')";
        mysqli_query($conn, $sql);
        $i++;
      }
      header("location:index.php?page=aturan");
    }
}
?>

<form method ="POST">
  <div class="panel panel-default">
    <div class="panel-heading"><strong>INPUT DATA BASIS ATURAN</strong></div>
    <div class="panel-body">
      <div class="form-group">
        <label>Keterangan :</label>
        <input type="text" class="form-control" name="ket" maxlength="50" autocomplete="off" required> 
      </div>
      <div class="form-group">
        <label>Pilih nama rawi dibawah ini :</label>
      </div>          
      <div class="table-responsive" id="div_table">
          <table class="table table-striped table-bordered" id="mytable">
          <thead>
            <tr>
              <th width="20px"></th>
              <th width="20px"><strong> No. </strong></th>
              <th width="300px"><strong> Nama Rawi </strong></th>
              <th width="30px"><strong> Tahun Lahir </strong></th>
              <th width="30px"><strong> Tahun Wafat </strong></th>
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
                <td> <input type="checkbox" class="check-item" name="<?php echo 'idrawi[]'; ?>" value="<?php echo $row['idrawi']; ?>"> </td>
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
      </div><br>
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
        <a href="?page=aturan" class="btn btn-danger">Batal</a>
    </div>
  </div>
</form>


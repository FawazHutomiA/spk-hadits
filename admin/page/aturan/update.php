<?php

$idaturan=$_GET["idaturan"];
$sql = "SELECT * FROM aturan WHERE idaturan='$idaturan'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])){
  $idrawi = $_POST['idrawi'];

  $panjang = count($idrawi);
  $i = 0;
  while ($i < $panjang)
  {
    $idrawie=$idrawi[$i];
    $sql = "INSERT INTO detail_aturan VALUES('$idaturan','$idrawie')";
    mysqli_query($conn, $sql);
    $i++;
  }
  header("location:index.php?page=aturan");
}

?>

<form method ="POST">
  <div class="panel panel-default">
    <div class="panel-heading"><strong>UPDATE DATA BASIS ATURAN</strong></div>
    <div class="panel-body">
    <div class="form-group">
      <label>Keterangan : </label>
      <input class="form-control" name="nama" maxlenght="100" value="<?php echo $row["ket"]; ?>" readonly>
    </div>
    <div class="form-group">
      <label>Update nama rawi dibawah ini :</label>  
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytable">
        <thead>
          <tr>
            <th width="20px"></th>
            <th width="30px"><strong> No. </strong></th>
            <th><strong> Nama Rawi </strong></th>
            <th><strong> Tahun Lahir </strong></th>
            <th><strong> Tahun Wafat </strong></th>
            <th width="150px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $sql = "SELECT*FROM rawi ORDER BY idrawi ASC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {

                $idrawie=$row['idrawi'];

                $sql2 = "SELECT*FROM detail_aturan WHERE idaturan='$idaturan' AND idrawi='$idrawie'";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0){
                  ?>
                  <tr>
                    <td> <input type="checkbox" class="check-item" disabled="disabled"> </td>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row["nmrawi"]; ?> </td>
                    <td> <?php echo $row["thn_lahir"]; ?> </td>
                    <td> <?php echo $row["thn_wafat"]; ?> </td>
                    <td align="center">
                      <a onclick="return confirm('Yakin menghapus rawi ?')" href="?page=aturan&action=hapus_detail&idaturan=<?php echo $idaturan; ?>&idrawi=<?php echo $row['idrawi']; ?>" class="btn btn-danger">
                          <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    </td>
                  </tr>
                  <?php
                }else{
                  ?>
                  <tr>
                    <td> <input type="checkbox" class="check-item" name=" <?php echo 'idrawi[]'; ?>" value="<?php echo $row['idrawi']; ?>"> </td>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row["nmrawi"]; ?> </td>
                    <td> <?php echo $row["thn_lahir"]; ?> </td>
                    <td> <?php echo $row["thn_wafat"]; ?> </td>
                    <td align="center">
                      <a>
                          <span class="glyphicon glyphicon-trash" ></span>
                      </a>
                    </td>
                  </tr>
                <?php
                }
              }
          mysqli_close($conn);
          ?>
        </tbody>
        </table>
      </div>        
    </div>
      <input class="btn btn-primary" type="submit" name="update" value="Update" >
      <a href="?page=aturan" class="btn btn-danger">Kembali</a>
    </div>
  </div>
</form>



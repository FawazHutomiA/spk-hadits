<?php
$idkonsultasi=$_GET["idkonsultasi"];
$sql="SELECT*FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<form method ="POST" name="Form">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>HASIL KONSULTASI TAKHRIJ HADIST</strong></div>
        <div class="panel-body">
        <div class="form-group">
            <label>Nama :</label>
            <input class="form-control" name="nama" value="<?php echo $row["nama"] ?>" readonly>
        </div> 
        <label>Rawi yang dipilih :</label>         
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td width="10px"><strong> No. </strong></td>
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
                $sql2 = "SELECT detail_konsultasi.idrawi,rawi.nmrawi,rawi.thn_lahir,rawi.thn_wafat,detail_konsultasi.adil,detail_konsultasi.tsiqah
                        FROM detail_konsultasi INNER JOIN rawi
                        ON detail_konsultasi.idrawi=rawi.idrawi WHERE idkonsultasi='$idkonsultasi'";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
                <tr>
                <td> <?php echo $i++; ?> </td>
                <td> <?php echo $row2["nmrawi"]; ?> </td>
                <td> <?php echo $row2["thn_lahir"]; ?> </td>
                <td> <?php echo $row2["thn_wafat"]; ?> </td>
                <td> <?php echo $row2["adil"]; ?> </td>
                <td> <?php echo $row2["tsiqah"]; ?> </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </div>
        <div class="form-group">
        <label>Hasil Konsultasi :</label>         
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td width="400px"><strong> Kalimat Hadist </strong></td>
                <td width="80px"><strong> Hasil </strong></td>
            </tr>
            </thead>
            <tbody>
            <?php
                $sql2 = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
                <tr>
                    <td> <?php echo $row2["kalimat"]; ?> </td>
                    <td> <?php echo $row2["hasil"]; ?> </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </div> 
        <a href="index.php" class="btn btn-danger">Keluar</a>
    </div>
</form>
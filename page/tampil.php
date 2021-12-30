<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['btn'])){
    print_r($_POST['idrawi']);
    print_r($_POST['adil']);
    print_r($_POST['tsiqah']);
}

if (isset($_POST['proses'])){
    $idrawi = $_POST['idrawi'];
    $tanggal=date("Y/m/d");
    $nama = $_POST['nama'];
    $kalimat = $_POST['kalimat'];

    // simpan data konsultasi
    $sql = "INSERT INTO konsultasi VALUES(Null,'$tanggal','$nama','$kalimat','Tidak Diterima')";
    mysqli_query($conn, $sql);

    // mengambil idkonsultasi
    $sql = "SELECT idkonsultasi FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idkonsultasine=$row["idkonsultasi"];

    // simpan data detail konsultasi
    $panjang = count($idrawi);
    $i = 0;
    while ($i < $panjang)
    {
        $idrawie=$idrawi[$i];
        $adile=$adil[$i];
        $tsiqahe=$tsiqah[$i];

        
        if($adile=="on"){
            $nadil="Ya";
        }else{
            $nadil="Tidak";
        }

        if($tsiqahe=="on"){
            $ntsiqah="Ya";
        }else{
            $ntsiqah="Tidak";
        }

        $sql = "INSERT INTO detail_konsultasi VALUES('$idkonsultasine','$idrawie','$nadil','$ntsiqah')";
        mysqli_query($conn, $sql);
        $i++;
    }

    // mencari jumlah rawi pada tabel detail konsultasi
    $sql = "SELECT COUNT(idkonsultasi) AS jml_rawi FROM detail_konsultasi WHERE idkonsultasi='$idkonsultasine'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jml_rawi=$row["jml_rawi"];

   // mencari jumlah rawi yang sama pada tabel aturan
   $sql = "SELECT aturan.idaturan,aturan.ket
   FROM aturan INNER JOIN detail_aturan ON aturan.idaturan=detail_aturan.idaturan
   INNER JOIN rawi ON detail_aturan.idrawi=rawi.idrawi
   GROUP BY aturan.idaturan
   HAVING COUNT(detail_aturan.idrawi)='$jml_rawi'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {

        $jyes=0;
        $idaturan=$row["idaturan"];

        // mencari gejala per pada detail aturan berdasarkan aturan
        $sql2 = "SELECT detail_aturan.idrawi
        FROM aturan INNER JOIN detail_aturan ON aturan.idaturan=detail_aturan.idaturan
        WHERE aturan.idaturan='$idaturan'";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_assoc($result2)) {

            $idrawie=$row2["idrawi"];

            //  membandingkan dengan data di detail_konsultasi
            $sql3 = "SELECT idrawi FROM detail_konsultasi WHERE idkonsultasi='$idkonsultasine' AND idrawi='$idrawie'";
            $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0){
                $jyes+=1;
            }
        }

        // jika jumlah sama
        if ($jyes==$jml_rawi){

            $sql4 = "SELECT idkonsultasi FROM konsultasi ORDER BY idkonsultasi DESC";
            $result4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($result4);
            $idkonsultasine=$row4["idkonsultasi"];

            // update data konsultasi
            $sql5 = "UPDATE konsultasi SET hasil='Diterima' WHERE idkonsultasi='$idkonsultasine'";
            mysqli_query($conn, $sql5);
            header("location:index.php?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasine");
            exit();
        }
    }

    $sql = "SELECT idkonsultasi FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idkonsultasine=$row["idkonsultasi"];

    header("location:index.php?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasine");
}
?>

<form method ="POST" name="Form">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>KONSULTASI TAKHRIJ HADIST</strong></div>
        <div class="panel-body">
            <div class="form-group">
                <label>Masukkan Nama Lengkap Anda :</label>
                <input type="text" class="form-control" name="nama" maxlength="50" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Masukkan Kalimat Hadist :</label>
                <textarea type="text" class="form-control" rows="5" name="kalimat" maxlength="1000" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
            <label>Pilih rawi dibawah ini :</label>
            </div>          
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="mytable">
                <thead>
                <tr>
                    <th width="30px"></th>
                    <th width="30px"><strong> No. </strong></th>
                    <th><strong> Nama Rawi </strong></th>
                    <th><strong> Tahun Lahir </strong></th>
                    <th><strong> Tahun Wafat </strong></th>
                    <th><strong> Adil </strong></th>
                    <th><strong> Tsiqah </strong></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    $sql = "SELECT*FROM rawi ORDER BY idrawi ASC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                    <td>
                        <input type="checkbox" class="check-item" id="cRawi" name="<?php echo 'idrawi[]' ?>" value="<?php echo $row['idrawi']; ?>" onclick="cekDisable()">
                    </td>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row["nmrawi"]; ?> </td>
                    <td> <?php echo $row["thn_lahir"]; ?> </td>
                    <td> <?php echo $row["thn_wafat"]; ?> </td>
                    <td>
                        <label class="checkbox-inline"><input type="checkbox" class="check-item" id="cAdil" name="<?php echo 'adil[]' ?>">Tidak</label>
                    </td>
                    <td>
                        <label class="checkbox-inline"><input type="checkbox" class="check-item" id="cTsiqah" name="<?php echo 'tsiqah[]' ?>">Tidak</label>
                    </td>

                    </tr>
                <?php
                    }
                    mysqli_close($conn);
                ?>
                </tbody>
                </table>
            </div><br>
            <input class="btn btn-primary" type="submit" name="proses" value="Proses">
            <a href="index.php" class="btn btn-danger">Batal</a>
        </div>
    </div>
</form>



<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$idkonsule=$_GET['idkonsultasi'];

// tombol tambah
if (isset($_POST['tambah'])){
    $idrawi = $_POST['nmrawi'];
    $adil = $_POST['adil'];
    $tsiqah = $_POST['tsiqah'];

    $tanggal=date("Y/m/d");
    $nama = $_POST['nama'];
    $kalimat = $_POST['kalimat'];

    // cek data konsultasi sudah ada atau belum
    $sql = "SELECT idkonsultasi FROM konsultasi WHERE idkonsultasi='$idkonsule'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0){
        // simpan data konsultasi
        $sql = "INSERT INTO konsultasi VALUES(Null,'$tanggal','$nama','$kalimat','Tidak Diterima')";
        mysqli_query($conn, $sql);
    }

    // mengambil idkonsultasi
    $sql = "SELECT idkonsultasi FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idkonsultasine=$row["idkonsultasi"];

    $sql = "SELECT idkonsultasi,idrawi FROM detail_konsultasi WHERE idkonsultasi='$idkonsultasine' AND idrawi='$idrawi'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        ?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Data Rawi Sudah Dimasukkan</strong>
            </div>
        <?php
    }else{
        // simpan detail konsultasi
        $sql = "INSERT INTO detail_konsultasi VALUES('$idkonsultasine','$idrawi','$adil','$tsiqah')";
        mysqli_query($conn, $sql);
        header("location:index.php?page=takhrij&idkonsultasi=$idkonsultasine");
    }
}

// tombol proses
if (isset($_POST['proses'])){
   
    // mencari jumlah rawi pada tabel detail konsultasi
    $sql = "SELECT COUNT(idkonsultasi) AS jml_rawi FROM detail_konsultasi WHERE idkonsultasi='$idkonsule'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jml_rawi=$row["jml_rawi"];
    print_r("Jumlah Rawi : " . $jml_rawi);

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
        $sql2 = "SELECT detail_aturan.idrawi,detail_aturan.adil,detail_aturan.tsiqah
        FROM aturan INNER JOIN detail_aturan ON aturan.idaturan=detail_aturan.idaturan
        WHERE aturan.idaturan='$idaturan'";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_assoc($result2)) {

            $idrawie=$row2["idrawi"];
            $adile=$row2["adil"];
            $tsiqahe=$row2["tsiqah"];

            //  membandingkan dengan data di detail_konsultasi
            $sql3 = "SELECT idrawi FROM detail_konsultasi WHERE idkonsultasi='$idkonsule' AND idrawi='$idrawie' AND adil='$adile' AND tsiqah='$tsiqahe'";
            $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0){
                $jyes+=1;
            }
        }

        
        print_r("jml yes :" . $idaturan . " " .  $jyes);

        // jika jumlah sama
        if ($jyes==$jml_rawi){

            // update data konsultasi
            $sql5 = "UPDATE konsultasi SET hasil='Diterima' WHERE idkonsultasi='$idkonsule'";
            mysqli_query($conn, $sql5);
            header("location:index.php?page=takhrij&action=hasil&idkonsultasi=$idkonsule");
            exit();
        }
    }

    header("location:index.php?page=takhrij&action=hasil&idkonsultasi=$idkonsule");
}

// menampilkan data setelah proses simpan detail konsultasi
$sql = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsule'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form method ="POST" name="Form">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>KONSULTASI TAKHRIJ HADIST</strong></div>
        <div class="panel-body">
            <div class="form-group">
                <label>Masukkan Nama Lengkap Anda :</label>
                <?php
                    if ($idkonsule <> ""){
                ?>
                    <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama" readonly>
                <?php
                    }else{
                ?>
                    <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama" maxlength="50" autocomplete="off" required>
                <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label>Masukkan Kalimat Hadist :</label>
                <?php
                    if ($idkonsule <> ""){
                ?>
                    <textarea type="text" class="form-control" rows="5" name="kalimat" readonly><?php echo $row['kalimat']; ?></textarea>
                <?php
                    }else{
                ?>
                    <textarea type="text" class="form-control" rows="5" name="kalimat" maxlength="1000" autocomplete="off" required><?php echo $row['kalimat']; ?></textarea>
                <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <select class="form-control chosen" data-placeholder="Pilih Nama Rawi" name="nmrawi">
                            <option value=""></option>
                            <?php
                                $sql = "SELECT * FROM rawi ORDER BY nmrawi ASC";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['idrawi']; ?>"><?php echo $row['nmrawi']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control chosen" data-placeholder="Pilih Adil" name="adil">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control chosen" data-placeholder="Pilih Tsiqah" name="tsiqah">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Tambah" onclick="return validateForm()">
                    </div>
                </div>
            </div>
            <label>Nama-nama Rawi Yang Dipilih :</label>          
            <div class="table-responsive" style="margin-top: 10px;">
                <table class="table table-striped table-bordered" id="mytable">
                <thead>
                <tr>
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
                    $sql = "SELECT*FROM vdetail_konsultasi WHERE idkonsultasi='$idkonsule'";
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

<script type="text/javascript">
    function validateForm()
    {
        var nmrawi=document.forms["Form"]["nmrawi"].value;

        if (nmrawi=="")
        {
            alert("Masukkan Nama Rawi");
            return false;
        }

        var adil=document.forms["Form"]["adil"].value;

        if (adil=="")
        {
            alert("Masukkan adil");
            return false;
        }

        var tsiqah=document.forms["Form"]["tsiqah"].value;

        if (tsiqah=="")
        {
            alert("Masukkan tsiqah");
            return false;
        }
    }
</script>



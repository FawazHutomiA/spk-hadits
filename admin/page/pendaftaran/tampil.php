<?php
    if (isset($_POST['acc'])){
    $usr=$_GET['usr'];    

    $sql = "UPDATE users SET level='Pasien' WHERE username='$usr'";
    if (mysqli_query($conn, $sql)){
        header("location:?page=pendaftaran&usr=");
    }
}

?>
<div class="panel panel-default">
<div class="panel-heading "><strong>DATA REGISTRASI</strong></div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <td width="80px"><strong> No. </strong></td>
                    <td width="500px"><strong> User Name</strong></td>
                    <td width="400px"><strong> Nama </strong></td>
                    <td width="100px"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    $sql = "SELECT*FROM users WHERE level='P'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $row['nama']; ?> </td>
                        <td align="center">
                            <a href="?page=pendaftaran&action=acc&usr=<?php echo $row["username"]; ?>" class="btn btn-warning">
                                <span class="glyphicon glyphicon-check"></span>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" href="?page=users&action=hapus&username=<?php echo $row['username']; ?>" class="btn btn-danger">
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
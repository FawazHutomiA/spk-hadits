<div class="panel panel-default">
<div class="panel-heading "><strong>DATA USERS</strong></div>
    <div class="panel-body">
        <a href="?page=users&action=tambah" class="btn btn-primary" style="margin-bottom: 20px">
            <span class="glyphicon glyphicon-plus"></span> Tambah
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <td><strong> No. </strong></td>
                    <td><strong> User Name</strong></td>
                    <td><strong> Nama </strong></td>
                    <td><strong> Level </strong></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    $sql = "SELECT*FROM users";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td width="20"> <?php echo $i++; ?> </td>
                        <td width="120"> <?php echo $row['username']; ?> </td>
                        <td width="120"> <?php echo $row['nama']; ?> </td>
                        <td width="120"> <?php echo $row['level']; ?> </td>
                        <td align="center" width="50">
                            <a href="?page=users&action=update&username=<?php echo $row['username']; ?>" class="btn btn-warning">
                                <span class="glyphicon glyphicon-wrench"></span>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" href="?page=users&action=hapus&username=<?php echo $row['username']; ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
$username=$_GET['username'];

$sql = "SELECT*FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3"> 
        <form method="POST" name="Form"  onsubmit="return validateForm()">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>EDIT DATA USER</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="<?php echo $row['username']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" value="">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control chosen" data-placeholder="<?php echo $row['level']; ?>" name="level">
                        <option value="<?php echo $row['level'];?>"></option>;
                        <option value="Pimpinan">Pimpinan</option>;
                        <option value="Admin">Admin</option>;
                    </select>
                </div>
                
                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=users">Batal</a>
            </div>
        </form>
    </div>
</div> 

<?php
if (isset($_POST['update'])){
    
    $username=$_POST['username'];

    $sql = "SELECT*FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($_POST['pass']==''){
        $pass=$row['pass'];
    }else{
        $pass=md5($_POST['pass']);
    }

    $nama=$_POST['nama'];
    $level=$_POST['level'];
    
    $sql="UPDATE users SET pass='$pass',nama='$nama',level='$level' WHERE username='$username'";
    if (mysqli_query($conn, $sql)){
        header("location:?page=users");
    }
}
mysqli_close($conn);
?>

<script type="text/javascript">
    function validateForm()
    {
        var levele=document.forms["Form"]["level"].value;

        if (levele=="")
        {
            alert("Masukkan level");
            return false;
        }
    }
</script>
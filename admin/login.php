<?php
session_start();
require "../config.php";

if(isset($_POST["submit"])){

    $username=$_POST["username"];
    $pass=md5($_POST["pass"]);

    $sql = "SELECT*FROM users where username='$username' and pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
       
        $levele=$row["level"];

        if($levele=='Admin' || $levele=='Pimpinan'){
            $_SESSION['username'] = $row["username"];
            $_SESSION['nama'] = $row["nama"];
            $_SESSION['level'] = $row["level"];
            $_SESSION['last_activity'] = time();
            $_SESSION['status'] = "succes";
            header("Location:../admin/index.php");
        }else{
            header("Location:?msg=login_fail");
        }
    }else{
        header("Location:?msg=login_fail");
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
      body{
            background: lightsteelblue;
        }
    </style>
</head>
<body>

<?php 
if(isset($_GET['msg'])== "login_fail"){
    ?>
        <div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Login Gagal</strong>
        </div>
    <?php
}       

?>

<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form method="POST">
                <div class="panel panel-default">
                    <div class="panel-heading "><strong>LOGIN</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <a href="../index.php" class="btn btn-danger">Exit</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>




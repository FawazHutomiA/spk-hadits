<?php
    $username=$_GET["usr"];

    $sql="UPDATE users SET level='Pasien' WHERE username='$username'";
    if (mysqli_query($conn, $sql)){
        header("location:index.php?page=pendaftaran&usr=");
    }
    mysqli_close($conn);
?>
<?php
    $idrawi=$_GET['idrawi'];

    $sql = "SELECT*FROM detail_aturan WHERE idrawi='$idrawi'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        header("location:index.php?page=rawi&msg=ada");
    }else{
        $sql = "SELECT*FROM detail_konsultasi WHERE idrawi='$idrawi'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            header("location:index.php?page=rawi&msg=ada");
        }else{
            $sql = "DELETE FROM rawi WHERE idrawi='$idrawi'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("location:index.php?page=rawi&msg=");
        }
    }
?>